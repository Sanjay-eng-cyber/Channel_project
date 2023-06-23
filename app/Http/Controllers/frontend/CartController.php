<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{

    public function index(Request $request)
    {
        $user = auth()->user();
        if ($user) {
            $cart = $user->cart;
            // dd($cart);
        } else {
            $cart_session_id = session()->get('cart_session_id');
            $cart = Cart::where('session_id', $cart_session_id)->first();
        }
        $cartItems = $cart ? $cart->items()->paginate(10) : [];
        $subTotal = 0;
        foreach ($cartItems as $cart) {
            $subTotal = $subTotal += $cart->product->final_price * $cart->quantity;
        }
        //dd($subTotal);
        return view('frontend.cart', compact('cart', 'cartItems', 'subTotal'));
    }

    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        // dd($product);
        $user = auth()->user();
        if ($user) {
            $cart = Cart::updateOrCreate([
                'user_id' => $user->id
            ]);
            // dd($cart);
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
            $productInCart->delete();
            return response()->json(['status' => true, 'addToCart' => 0, 'count' => $cart->items()->count(), 'message' => 'Product Removed from Cart']);
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id
            ]);
            return response()->json(['status' => true, 'addToCart' => 1, 'count' => $cart->items()->count(), 'message' => 'Product Added to Cart']);
        }
    }

    public function delete($id)
    {
        //$user = auth()->user();
        $cart = CartItem::findOrFail($id);
        //dd($cart);
        if ($cart->delete()) {
            return redirect()->route('frontend.cart.index')->with(['alert-type' => 'success', 'message' => 'Cart Deleted Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }
}
