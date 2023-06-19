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

    public function index($product_slug, Razorpay $api)
    {
        $products = Product::whereSlug($product_slug)->get();
        // dd($product);
        if ($products) {
            $productsTotalAmount = 0;
            foreach ($products as $product) {
                $productsTotalAmount += $product->final_price;
            }
            $user = auth()->user();
            [$subTotal, $discount, $grandTotal, $gst] = $this->calculated($productsTotalAmount);
            // dd($api);
            // dd($this->calculated($product->final_price));
            $order = $this->getOrderOrCreateNew($user, $api, $subTotal, $discount, $grandTotal, $products);
            // dd($order);

            return view('frontend.checkout', compact('product', 'gst', 'subTotal', 'grandTotal', 'order', 'discount'));
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
