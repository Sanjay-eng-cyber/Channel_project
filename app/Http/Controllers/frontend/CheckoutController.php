<?php

namespace App\Http\Controllers\frontend;

use App\Models\Order;
use App\Models\Product;
use App\Traits\Taxable;
use Illuminate\Http\Request;
use App\Traits\Transactional;
use App\Lib\Razorpay\Razorpay;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    use Transactional, Taxable;

    public function selectAddress(Request $request, $product_slug = null)
    {
        // dd($product_slug);
        $user = auth()->user();
        $productsArray = null;
        if ($product_slug) {
            $products = Product::whereSlug($product_slug)->get();
            $productsTotalAmount = 0;
            foreach ($products as $key => $product) {
                if ($request->quantity > $product->stock) {
                    return redirect()->back('The given product quantity is not available. Please Try after some time.');
                }
                $productsTotalAmount += $product->final_price * $request->quantity;
                $productsArray[$key]['product'] = $product;
                $productsArray[$key]['quantity'] = $request->quantity;
            }
        } else {
            $cartItems = $user->cart->items();
            $productsTotalAmount = 0;
            // dd($cartItems->get());
            foreach ($cartItems->get() as $key => $item) {
                if ($item->quantity > $item->product->stock) {
                    return redirect()->back('The given product quantity is not available. Please Try after some time.');
                }
                $productsTotalAmount += $item->product->final_price * $item->quantity;
                $productsArray[$key]['product'] = $item->product;
                $productsArray[$key]['quantity'] = $item->quantity;
                // dd($productsArray);
            }
            $products = $cartItems->with('product')->get()->pluck('product');
        }

        if ($products) {

            [$subTotal, $discount, $grandTotal, $gst] = $this->calculated($productsTotalAmount);
            // dd($this->calculated($productsTotalAmount));
            $userAddresses = $user->userAddresses()->get();
            // dd($productsArray);
            return view('frontend.order.checkout', compact('userAddresses', 'productsArray', 'gst', 'subTotal', 'grandTotal', 'discount'));
        }
        abort(404);
    }

    public function showPaymentPage(Request $request, $product_slug = null, Razorpay $api)
    {
        // dd($request);
        $user = auth()->user();
        $productsArray = null;
        $selectedAddress = $user->userAddresses()->find($request->address);
        if (!$selectedAddress) {
            return redirect()->back()->with(toast('Selected Address is Invalid'));
        }

        if ($product_slug) {
            $products = Product::whereSlug($product_slug)->get();
            $productsTotalAmount = 0;
            foreach ($products as $key => $product) {
                if ($request->quantity > $product->stock) {
                    return redirect()->back('The given product quantity is not available. Please Try after some time.');
                }
                $productsTotalAmount += $product->final_price * $request->quantity;
                $productsArray[$key]['product'] = $product;
                $productsArray[$key]['quantity'] = $request->quantity;
            }
        } else {
            $cartItems = $user->cart->items();
            $productsTotalAmount = 0;
            // dd($cartItems->get());
            foreach ($cartItems->get() as $key => $item) {
                if ($item->quantity > $item->product->stock) {
                    return redirect()->back('The given product quantity is not available. Please Try after some time.');
                }
                $productsTotalAmount += $item->product->final_price * $item->quantity;
                $productsArray[$key]['product'] = $item->product;
                $productsArray[$key]['quantity'] = $item->quantity;
                // dd($productsArray);
            }
            $products = $cartItems->with('product')->get()->pluck('product');
        }

        if ($products) {
            [$subTotal, $discount, $grandTotal, $gst] = $this->calculated($productsTotalAmount);
            $order = $this->getOrderOrCreateNew($user, $api, $subTotal, $discount, $grandTotal, $products, $selectedAddress);
            // dd($grandTotal);
            return view('frontend.order.payment', compact('selectedAddress', 'products', 'order', 'gst', 'subTotal', 'grandTotal', 'discount'));
        }
        abort(404);
    }

    public function handleCallback(Request $request)
    {
        $order = Order::where('api_order_id', $request->razorpay_order_id)->first();
        // if(session()->has('coupon')){
        //     $coupon=session('coupon');
        //     $coupon_usage=new CouponUsage;
        //     $coupon_usage->coupon_id=$coupon->id;
        //     $coupon_usage->order_id=$order->id;
        //     $coupon_usage->user_id=$order->user_id;
        //     $coupon_usage->save();
        //     session()->forget('coupon');
        //     session()->forget('discount');
        // }
        $order->update(['status' => 'completed']);
        return view('callback', compact('order'));
    }

    protected function getOrderOrCreateNew($user, Razorpay $api, $subTotal, $discount, $grandTotal, $products, $selectedAddress)
    {
        // dd($user->orders()->whereStatus('initial')->latest()->first()->item);
        // dd($api);
        if ($user->orders()->whereStatus('initial')->exists()) {
            $order = $user->orders()->whereStatus('initial')->latest()->first();
            $apiOrder = $api->createOrder($grandTotal);
            $order->update([
                'api_order_id' => $apiOrder['id'],
                'sub_total' => $subTotal,
                'total_amount' => $grandTotal,
                'discount_amount' => $discount,
                'street_address' => $selectedAddress->street_address,
                'landmark' => $selectedAddress->landmark,
                'city' => $selectedAddress->city,
                'state' => $selectedAddress->state,
                'country' => $selectedAddress->country,
                'postal_code' => $selectedAddress->postal_code
            ]);
            optional($order->item)->delete();
            self::createOrderItems($order, $products);
        } else {
            $apiOrder = $api->createOrder($grandTotal);
            $order = $this->createOrder($grandTotal, [
                'api_order_id' => $apiOrder['id'],
                'discount' => $discount
            ], $selectedAddress);
            self::createOrderItems($order, $products);
        }
        return $order;
    }
}
