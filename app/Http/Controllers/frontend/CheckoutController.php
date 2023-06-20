<?php

namespace App\Http\Controllers\frontend;

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
        $user = auth()->user();
        if ($product_slug) {
            $products = Product::whereSlug($product_slug)->get();
            $productsTotalAmount = 0;
            foreach ($products as $product) {
                if ($request->quantity > $product->stock) {
                    return redirect()->back('The given product quantity is not available. Please Try after some time.');
                }
                $productsTotalAmount += $product->final_price;
            }
        } else {
            $cartItems = $user->cart->items();
            $productsTotalAmount = 0;
            foreach ($cartItems as $item) {
                if ($item->quantity > $item->product->stock) {
                    return redirect()->back('The given product quantity is not available. Please Try after some time.');
                }
                $productsTotalAmount += $item->product->final_price;
            }
            $products = $cartItems->with('product')->get()->pluck('product');
        }

        if ($products) {
            [$subTotal, $discount, $grandTotal, $gst] = $this->calculated($productsTotalAmount);
            // dd($this->calculated($productsTotalAmount));
            $userAddresses = $user->userAddresses()->get();
            return view('frontend.checkout', compact('userAddresses', 'products', 'gst', 'subTotal', 'grandTotal', 'discount'));
        }
        abort(404);
    }

    public function showPaymentPage(Request $request, $product_slug, Razorpay $api)
    {
        // dd($request);
        $user = auth()->user();
        $selectedAddress = $user->userAddresses()->find($request->address);
        if (!$selectedAddress) {
            return redirect()->back()->with(toast('Selected Address is Invalid'));
        }

        $products = Product::whereSlug($product_slug)->get();
        if ($products) {
            $productsTotalAmount = 0;
            foreach ($products as $product) {
                if ($request->quantity > $product->stock) {
                    return redirect()->back('The given product quantity is not available. Please Try after some time.');
                }
                $productsTotalAmount += $product->final_price;
            }
            [$subTotal, $discount, $grandTotal, $gst] = $this->calculated($productsTotalAmount);

            $order = $this->getOrderOrCreateNew($user, $api, $subTotal, $discount, $grandTotal, $products);

            return view('frontend.payment', compact('selectedAddress', 'products', 'gst', 'subTotal', 'grandTotal', 'discount'));
        }
        abort(404);
    }



    public function index(Request $request, $product_slug, Razorpay $api)
    {
        // dd($request);
        $products = Product::whereSlug($product_slug)->get();
        // dd($product);
        if ($products) {
            $productsTotalAmount = 0;
            foreach ($products as $product) {
                if ($request->quantity > $product->stock) {
                    return redirect()->back('The given product quantity is not available. Please Try after some time.');
                }
                $productsTotalAmount += $product->final_price;
            }
            $user = auth()->user();
            [$subTotal, $discount, $grandTotal, $gst] = $this->calculated($productsTotalAmount);
            // dd($api);
            // dd($this->calculated($product->final_price));
            // $order = $this->getOrderOrCreateNew($user, $api, $subTotal, $discount, $grandTotal, $products);
            // dd($order);
            $userAddresses = auth()->user()->userAddresses()->get();

            return view('frontend.checkout', compact('userAddresses', 'product', 'gst', 'subTotal', 'grandTotal', 'discount'));
        }
        abort(404);
    }

    protected function getOrderOrCreateNew($user, Razorpay $api, $subTotal, $discount, $grandTotal, $products)
    {
        // dd($user->orders()->whereStatus('initial')->latest()->first()->item);
        // dd($api);
        if ($user->orders()->whereStatus('initial')->exists()) {
            $order = $user->orders()->whereStatus('initial')->latest()->first();
            $apiOrder = $api->createOrder($grandTotal);
            $order->update(['api_order_id' => $apiOrder['id'], 'sub_total' => $subTotal, 'total_amount' => $grandTotal, 'discount_amount' => $discount]);
            optional($order->item)->delete();
            self::createOrderItems($order, $products);
        } else {
            $apiOrder = $api->createOrder($grandTotal);
            $order = $this->createOrder($grandTotal, [
                'api_order_id' => $apiOrder['id'],
                'discount' => $discount
            ]);
            self::createOrderItems($order, $products);
        }
        return $order;
    }
}
