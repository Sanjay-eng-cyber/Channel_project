<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        dd($categories);
    }

    public function show($catSlug, Request $request)
    {
        $category = Category::where('slug', $catSlug)->firstOrFail();
        $products = $category->products();
        $products = $products->latest();
        $products = $this->filterResults($request, $products);
        $products = $products->paginate(10);
       // dd($products);
        return view('frontend.product.index', compact('products', 'category'));
    }

    protected function filterResults($request, $products)
    {
       //dd($request);
        if ($request->q !== '' && !is_null($request->q)) {
            if (is_numeric($request->q)) {
                $request->validate(['q' => 'digits_between:1,40'], ['q.*' => 'Please enter proper Number']);
            } else {
                $request->validate(['q' => 'min:3']);
            }
        }
        if ($request !== null && $request->has('q') && $request->q = 1) {
            $products = $products->orderBy('mrp', 'desc');
            //dd($products);
        }
        return $products;
    }
}
