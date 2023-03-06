<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $categories = Category::all();
        foreach ($categories as $category) {
            for ($i = 1; $i <= 5; $i++) {
                DB::table('products')->insert([
                    'brand_id' => null,
                    'category_id' => $category->id,
                    'sub_category_id' => null,
                    'name' => 'Product ' . $category->name . ' - ' . $i,
                    'slug' => Str::slug('Product ' . $category->name . ' - ' . $i),
                    'descriptions' => $faker->sentence(6,true),
                    'mrp' => $faker->randomFloat(3,3,100),
                    'final_price' => $faker->randomFloat(3,3,100),
                    'stock' => $faker->numberBetween(1,100),
                    'sku' => $faker->uuid,
                ]);
            }
        }
    }
}
