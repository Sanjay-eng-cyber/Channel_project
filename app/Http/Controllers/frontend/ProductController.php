<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
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
        $reviews = $product->review()->latest()->paginate(5);
        // dd($product);
        return view('frontend.product.show', compact('product', 'reviews'));
    }

}
