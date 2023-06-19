<?php

namespace App\Http\Controllers\frontend;

use App\Models\Review;
use App\Models\Product;
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
        $reviews = $product->review()->latest()->paginate(5);
        $cProducts = Product::Where('id', '!=', $product->id)->where('connection_no', $product->connection_no)->paginate(5);
        $reviewRatingAvg =  number_format($reviews->avg('rating'), 2);
        //dd($reviewRatingAvg);
        return view('frontend.product.show', compact('product', 'reviews', 'cProducts','reviewRatingAvg'));
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
