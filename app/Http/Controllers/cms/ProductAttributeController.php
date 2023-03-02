<?php

namespace App\Http\Controllers\cms;

use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\ProductAttributeValue;

class ProductAttributeController extends Controller
{
    public function index()
    {
        $product_attribute_values = ProductAttributeValue::latest()->paginate(10);
        return view('backend.product_attribute_value.index', compact('product_attribute_values'));
    }

    public function show($id)
    {
        $product_attribute_value = ProductAttributeValue::findOrFail($id);
        return view('backend.product_attribute_value.show', compact('product_attribute_value'));
    }

    public function create()
    {
        $attributes = Attribute::all();
        return view('backend.product_attribute_value.create', compact('attributes'));
    }


    public function store(Request $request)
    {
        $attribute = Attribute::pluck('id')->toArray();
        $request->validate([
            'name' => 'required|min:3|max:40|unique:product_attribute_values,name,',
            'attribute_id' => ['required', Rule::in($attribute)],
        ]);
        $product_attribute_value = new ProductAttributeValue();
        $product_attribute_value->name = $request->name;
        $product_attribute_value->attribute_id = $request->attribute_id;
        if ($product_attribute_value->save()) {
            return redirect()->route('backend.product_attribute_value.index')->with(['alert-type' => 'success', 'message' => 'Product Attribute Value Stored Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }


    public function edit($id)
    {
        $product_attribute_value = ProductAttributeValue::findOrFail($id);
        $attributes = Attribute::all();
        return view('backend.product_attribute_value.edit', compact('product_attribute_value', 'attributes'));
    }

    public function update(Request $request, $id)
    {
        $attribute = Attribute::pluck('id')->toArray();
        $request->validate([
            'name' => 'required|min:3|max:40|unique:product_attribute_values,name,' . $id,
            'attribute_id' => ['required', Rule::in($attribute)],
        ]);

        $product_attribute_value = ProductAttributeValue::findOrFail($id);
        $product_attribute_value->name = $request->name;
        $product_attribute_value->attribute_id = $request->attribute_id;
        if ($product_attribute_value->save()) {
            return redirect()->route('backend.product_attribute_value.index')->with(['alert-type' => 'success', 'message' => 'Product Attribute Value Update Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }

    public function destroy($id)
    {
        $sub_category = ProductAttributeValue::findOrFail($id);
        if ($sub_category->delete()) {
            return redirect()->route('backend.product_attribute_value.index')->with(['alert-type' => 'success', 'message' => 'Product Attribute Value Deleted Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
    }
}
