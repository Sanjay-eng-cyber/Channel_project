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
        $category = Category::where('slug', $catSlug)->with('subCategories')->firstOrFail();
        $products = $category->products();
        $products = $products->latest();
        $products = $this->filterResults($request, $products);
        $products = $products->paginate(10);
        //dd($products);
        return view('frontend.product.index', compact('products', 'category'));
    }

    protected function filterResults($request, $products)
    {

        if ($request !== null && $request->has('sort_by')) {
            if ($request['sort_by'] == 'low_to_high') {
                $products = $products->orderBy('mrp', 'asc');
            } elseif ($request['sort_by'] == 'high_to_low') {
                $products = $products->orderBy('mrp', 'desc');
            } elseif ($request['sort_by'] == 'featured') {
                $products = $products->whereHas('showcases', function ($query) {
                    $query->where('name', 'Featured');
                });
            }
        }

        return $products;
    }
}
