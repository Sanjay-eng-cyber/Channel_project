<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Wishlist;

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
        $reviews = $product->review()->latest()->paginate(5);
        // dd($product);
        return view('frontend.product.show', compact('product', 'reviews'));
    }

    public function addToWishlist(Request $request)
    {
        //dd($$request->product_id);
        $product = Product::findOrFail($request->product_id);
        // dd($product->id);
        $user = auth()->user();
        if ($user) {
            $productInWish = Wishlist::where('product_id', $product->id)->where('user_id', $user->id)->first();
            // dd($productInWish);
            if ($productInWish) {
                $productInWish->delete();
                return response()->json(['status' => true, 'addToWishlist' => 0, 'message' => 'Product Removed from Wishlist']);
            } else {
                if ($user) {
                    $wish = Wishlist::create([
                        'user_id' => $user->id,
                        'product_id' => $product->id,
                    ]);
                }
                return response()->json(['status' => true, 'addToWishlist' => 1, 'message' => 'Product Added to Wishlist']);
            }
        }
        return response()->json(['status' => false, 'message' => 'Please Login']);
    }
}
