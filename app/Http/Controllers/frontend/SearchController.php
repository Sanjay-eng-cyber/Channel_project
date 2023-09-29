<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    // create a index function below
    public function index(Request $request)
    {
        $search = $request->q;
        // dd($search);
        $products = Product::orWhere('name', 'like', '%' . $search . '%')
            ->orWhereHas('category', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orWhereHas('subCategory', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orWhereHas('brand', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->orWhereHas('tags', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->paginate(12);
        return view('frontend.search.index', compact('search', 'products'));
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
