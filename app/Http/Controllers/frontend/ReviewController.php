<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request,$product_slug)
    {
        $request->validate([
            'title' => 'required|min:3|max:80',
            'body' => 'required|min:3|max:120',
            'rating' => 'required',
        ]);
        $review = new Review();
        $review->user_id = auth()->user()->id;
        $review->title = $request->title;
        $review->body = $request->body;
        $review->rating = $request->rating;
        $review->product_id = $request->product_id;
        // if ($review->save()) {
        //     return redirect()->route('backend.showcase.index')->with(['alert-type' => 'success', 'message' => 'Showcase Stored Successfully']);
        // }
        // return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }
}
