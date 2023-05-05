<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
    public function index(Request $request)
    {
        $wishlists = auth()->user()->wishlist()->get();
        // dd($wishlist);
        return view('frontend.wishlist', compact('wishlists'));
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
