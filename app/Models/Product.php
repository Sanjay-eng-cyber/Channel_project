<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function medias()
    {
        return $this->morphMany(Media::class, 'model');
    }

    public function showcaseProducts()
    {
        return $this->hasMany(ShowcaseProduct::class);
    }

     public function ProductAttribute()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function storeProductAttributes($attributes, $values, $product)
    {
        foreach($attributes as $key => $item)
        {
            ProductAttribute::create([
                'product_id' => $product,
                'attribute_id' => $item,
                'product_attribute_value_id' => $values[$key],
            ]);
        }
    }

    public function updateProductAttributes($attributes, $values, $product)
    {
        foreach($attributes as $key => $item)
        {
           $attribute = ProductAttribute::where('product_id', $product)->where('attribute_id', $item)->first();
          if($attribute == null){
            ProductAttribute::create([
                'product_id' => $product,
                'attribute_id' => $item,
                'product_attribute_value_id' => $values[$key],
            ]);
          } else {
            $attribute->update([
                'product_attribute_value_id' => $values[$key],
            ]);
          }

        }

    }
}
