<?php

namespace App\Http\Controllers\cms;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('backend.product.index',compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.product.show', compact('product'));
    }

    public function create()
    {
        $brands = Brand::all();
        $categorys = Category::all();
        return view('backend.product.create',compact('categorys','brands'));
    }


    public function store(Request $request)
    {
        // dd($request);
        $categorys = Category::pluck('id')->toArray();
        $brands = Brand::pluck('id')->toArray();
        $sub_categorys = SubCategory::pluck('id')->toArray();
        $request->validate([
            'name' => 'required|min:3|max:40|unique:products,name,',
           'descriptions' => 'nullable|min:3|max:250',
           'mrp' => 'required|numeric',
           'final_price' => 'required|numeric',
           'stock' => 'required|numeric',
           'sku' => 'required|string|unique:products,sku,',
           'category_id' => ['required', Rule::in($categorys)],
           'brand_id' => ['nullable', Rule::in($brands)],
           'sub_category_id' => ['nullable', Rule::in($sub_categorys)],
        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->mrp = $request->mrp;
        $product->final_price = $request->final_price;
        $product->stock = $request->stock;
        $product->sku = $request->sku;
        $product->descriptions = $request->descriptions;
        if ($product->save()) {
            return redirect()->route('backend.product.index')->with(['alert-type' => 'success', 'message' => 'Product Stored Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $brands = Brand::all();
        $categorys = Category::all();
        return view('backend.product.edit', compact('product','categorys','brands'));
    }

    public function update(Request $request, $id)
    {
        $categorys = Category::pluck('id')->toArray();
        $brands = Brand::pluck('id')->toArray();
        $sub_categorys = SubCategory::pluck('id')->toArray();
        $product = Product::findOrFail($id);
        $request->validate([
            'name' => 'required|min:3|max:40|unique:products,name,' .$id,
           'descriptions' => 'nullable|min:3|max:250',
           'mrp' => 'required|numeric',
           'final_price' => 'required|numeric',
           'stock' => 'required|numeric',
           'sku' => 'required|string|unique:products,sku,' .$id,
           'category_id' => ['required', Rule::in($categorys)],
           'brand_id' => ['nullable', Rule::in($brands)],
           'sub_category_id' => ['nullable', Rule::in($sub_categorys)],
        ]);
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->mrp = $request->mrp;
        $product->final_price = $request->final_price;
        $product->stock = $request->stock;
        $product->sku = $request->sku;
        $product->descriptions = $request->descriptions;
        if ($product->save()) {
            return redirect()->route('backend.product.index')->with(['alert-type' => 'success', 'message' => 'Product Update Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);

    }

    public function getSubCategory($id)
    {
        $category = Category::findOrFail($id);
        $subCategory = SubCategory::where('category_id', $id)->get();
        return response()->json([
            'success' => true,
            'data' => $subCategory,
        ]);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->delete()) {
            return redirect()->route('backend.product.index')->with(['alert-type' => 'success', 'message' => 'Product Deleted Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }
}
