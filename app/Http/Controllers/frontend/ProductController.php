<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Review;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        dd($products);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($productSlug)
    {
        $product = Product::where('slug', $productSlug)->firstOrFail();
        $reviews = $product->reviews()->latest()->paginate(5);
        $cProducts = Product::Where('id', '!=', $product->id)->where('connection_no', $product->connection_no)->paginate(5);
        $reviewRatingAvg =  number_format($reviews->avg('rating'));
        //dd($reviewRatingAvg);
        return view('frontend.product.show', compact('product', 'reviews', 'cProducts', 'reviewRatingAvg'));
    }

    public function checkout(Request $request, $product_slug)
    {
        $product = Product::whereSlug($product_slug)->first();
        if ($product) {
            $user = auth()->user();
            if ($user) {
                $cart = Cart::updateOrCreate([
                    'user_id' => $user->id
                ]);
            } else {
                $cart_session_id = session()->get('cart_session_id');
                if (!$cart_session_id) {
                    $cart_session_id = now()->format('dmyhis') . rand(100, 999);
                    session()->put('cart_session_id', now()->format('dmyhis') . rand(100, 999));
                }
                $cart = Cart::updateOrCreate([
                    'session_id' => $cart_session_id
                ]);
            }
            $productInCart = CartItem::where('cart_id', $cart->id)->where('product_id', $product->id)->first();
            if ($productInCart) {
                $productInCart->update(['quantity' => $request->quantity]);
            } else {
                CartItem::create([
                    'cart_id' => $cart->id,
                    'product_id' => $product->id,
                    'quantity' => $request->quantity
                ]);
            }
            return redirect()->route('frontend.cart.index');
        }
        return redirect()->back()->with(toast('Something went Wrong, Please try again later.', 'error'));
    }

    // public function storeReview(Request $request, $product_slug)
    // {
    //     $product = Product::where('slug', $product_slug)->firstOrFail();

    //     $review = new Review();
    //     $review->user_id = auth()->user()->id;
    //     $review->product_id = $product->id;
    //     $review->title = $request->title;
    //     $review->body = $request->body;
    //     if ($review->save()) {
    //         return redirect()->back()->with(toast('Review Added Successfully', 'success'));
    //     }
    //     return redirect()->back()->with(toast('Something Went Wrong', 'error'))->withInput();
    // }
}
