<?php

namespace App\Http\Controllers\cms;

use App\Models\Brand;
use App\Models\Media;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Showcase;
use App\Models\ShowcaseProduct;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('backend.product.index', compact('products'));
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
        $showcases = Showcase::all();
        // dd($showcases);
        return view('backend.product.create', compact('categorys', 'brands', 'showcases'));
    }


    public function store(Request $request)
    {
        $categorys = Category::pluck('id')->toArray();
        $brands = Brand::pluck('id')->toArray();
        $sub_categorys = SubCategory::pluck('id')->toArray();
        $showcases_id = Showcase::pluck('id')->toArray();
        // dd($categorys);
        // dd($request);
        // dd($showcases_id);
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
            'image' => 'required|max:10',
            'image.*' => 'mimes:png,jpg,jpeg|max:1024',
            'showcases' => ['nullable', 'array'],
            'showcases.*' => [Rule::in($showcases_id)],
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
            $files = $request->file('image');
            foreach ($files as $file) {
                $file_details = uploadFile($file, 'images/products');
                $media = new Media();
                $media->model_id = $product->id;
                $media->model_type = Product::class;
                $media->mime_type = $file_details['type'];
                $media->file_name = $file_details['filename'];
                $media->save();
            }
            $showcases = $request->showcases;
            foreach ($showcases as $showcase) {
                $showcase_product = new ShowcaseProduct();
                $showcase_product->showcase_id = $showcase;
                $showcase_product->product_id = $product->id;
                $showcase_product->save();
            }
            return redirect()->route('backend.product.index')->with(['alert-type' => 'success', 'message' => 'Product Stored Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $brands = Brand::all();
        $categorys = Category::all();
        $showcases = Showcase::all();
        // $showcase_product = $product->showcaseProduct->pluck('id')->toArray();
        // dd($showcase_product);
        return view('backend.product.edit', compact('product', 'categorys', 'brands', 'showcases'));
    }

    public function update(Request $request, $id)
    {
        $categorys = Category::pluck('id')->toArray();
        $brands = Brand::pluck('id')->toArray();
        $sub_categorys = SubCategory::pluck('id')->toArray();
        $product = Product::findOrFail($id);
        // dd($media);
        $request->validate([
            'name' => 'required|min:3|max:40|unique:products,name,' . $id,
            'descriptions' => 'nullable|min:3|max:250',
            'mrp' => 'required|numeric',
            'final_price' => 'required|numeric',
            'stock' => 'required|numeric',
            'sku' => 'required|string|unique:products,sku,' . $id,
            'category_id' => ['required', Rule::in($categorys)],
            'brand_id' => ['nullable', Rule::in($brands)],
            'sub_category_id' => ['nullable', Rule::in($sub_categorys)],
            'image' => 'required|max:10',
            'image.*' => 'mimes:png,jpg,jpeg|max:1024',
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

        if ($request->file('image')) {
            $medias = Media::where('model_id', $id)->where('model_type', Product::class)->get();
            foreach ($medias as $media) {
                if (Storage::disk('public')->delete('images/products/' . $media->file_name)) {
                    $media->delete();
                }
            }
            //insert multiple image
            $files = $request->file('image');
            foreach ($files as $file) {
                $file_details = uploadFile($file, 'images/products');
                $media = new Media();
                $media->model_id = $product->id;
                $media->model_type = Product::class;
                $media->mime_type = $file_details['type'];
                $media->file_name = $file_details['filename'];
                $media->save();
            }
        }
        $showcases = $request->showcases;
        if ($showcases) {
            $showcase_products = ShowcaseProduct::where('product_id', $id)->get();
            foreach ($showcase_products as $showcase_product) {
                $showcase_product->delete();
            }
            //insert multiple image

            foreach ($showcases as $showcase) {
                $showcase_product = new ShowcaseProduct();
                $showcase_product->showcase_id = $showcase;
                $showcase_product->product_id = $product->id;
                $showcase_product->save();
            }
        }
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
        $medias = Media::where('model_id', $id)->where('model_type', Product::class)->get();
        foreach ($medias as $media) {
            if (Storage::disk('public')->delete('images/products/' . $media->file_name)) {
                $media->delete();
            }
        }
        $showcase_products = ShowcaseProduct::where('product_id', $id)->get();
        foreach ($showcase_products as $showcase_product) {
            $showcase_product->delete();
        }
        if ($product->delete()) {
            return redirect()->route('backend.product.index')->with(['alert-type' => 'success', 'message' => 'Product Deleted Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }
}
