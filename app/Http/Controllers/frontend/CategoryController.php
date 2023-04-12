<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        dd($categories);
    }

    public function show($catSlug)
    {
        $category = Category::where('slug', $catSlug)->firstOrFail();
        $products = $category->products();
        $products = $products->get();
        dd($products);
    }
}
