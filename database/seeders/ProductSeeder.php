<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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
        $products = [
            [
                'category_id' => 1,
                'sub_category_id' => 2,
                'name' => 'Simple Kind-Skin-Protecting Moisturisers',
                'short_descriptions' => 'simple-kind-skin-protecting-moisturisers',
                'descriptions' => '<h1 class="a-size-base-plus a-text-bold" style="box-sizing: border-box; padding: 0px 0px 4px; margin: 0px; text-rendering: optimizelegibility; color: #0f1111; font-family: "Amazon Ember", Arial, sans-serif; font-size: 16px !important; line-height: 24px !important;">About this item</h1>
                    <ul class="a-unordered-list a-vertical a-spacing-mini" style="box-sizing: border-box; margin: 0px 0px 0px 18px; color: #0f1111; padding: 0px; font-family: "Amazon Ember", Arial, sans-serif;">
                    <li class="a-spacing-mini" style="box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">SPF 15 to protct your skin from any harmful UVA and UVB rays</span></li>
                    <li class="a-spacing-mini" style="box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">Contains no artificial perfume</span></li>
                    <li class="a-spacing-mini" style="box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">Has no added color or dye</span></li>
                    </ul>',
                'thumbnail_image' => 'skin-1.png',
                'mrp' => '485',
                'final_price' => '305',
                'stock' => '50',
            ],
            [
                'category_id' => 1,
                'sub_category_id' => 3,
                'name' => 'Lacto Calamine Light moisturising gel',
                'short_descriptions' => 'Brand	Lacto Calamine Item Form	Gel',
                'descriptions' => '<h1 class="a-size-base-plus a-text-bold" style="box-sizing: border-box; padding: 0px 0px 4px; margin: 0px; text-rendering: optimizelegibility; color: #0f1111; font-family: "Amazon Ember", Arial, sans-serif; font-size: 16px !important; line-height: 24px !important;">About this item</h1>
                <ul class="a-unordered-list a-vertical a-spacing-mini" style="box-sizing: border-box; margin: 0px 0px 0px 18px; color: #0f1111; padding: 0px; font-family: "Amazon Ember", Arial, sans-serif;">
                <li class="a-spacing-mini" style="box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">Burst of hydration with non-sticky feel</span></li>
                <li class="a-spacing-mini" style="box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">Maintains skin&rsquo;s natural glow. Skin feels soft &amp; smooth</span></li>
                <li class="a-spacing-mini" style="box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">Hyaluronic Acid is known to hold 1000 times its weight in water. It gives the skin a burst of hydration that it needs</span></li>
                <li class="a-spacing-mini" style="box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">Niacinamide is known to control excess oil on face by minimising pores. This helps keep skin smooth &amp; glowing</span></li>
                <li class="a-spacing-mini" style="box-sizing: border-box; list-style: disc; overflow-wrap: break-word; margin: 0px;"><span class="a-list-item" style="box-sizing: border-box;">Vitamin E &amp; Vitamin B5 helps in retaining skin moisture &amp; enhances skin&rsquo;s natural repair process. Vitamin E also has antioxidant properties that hydrates &amp; soothes skin</span></li>
                </ul>',
                'thumbnail_image' => 'skin-2.png',
                'mrp' => '299',
                'final_price' => '199',
                'stock' => '25',
            ],
        ];
        foreach ($products as $product) {
            DB::table('products')->insert([
                'brand_id' => null,
                'category_id' => $product['category_id'],
                'sub_category_id' => $product['sub_category_id'],
                'name' => 'Product ' . $product['name'],
                'slug' => Str::slug($product['name']),
                'short_descriptions' => $product['short_descriptions'],
                'thumbnail_image' => $product['thumbnail_image'],
                'descriptions' => $product['descriptions'],
                'mrp' => $product['mrp'],
                'final_price' => $product['final_price'],
                'stock' => $product['stock'],
                'sku' => now()->format('dmy-his-dmy') . rand(1, 999),
            ]);
            try {
                File::copy(public_path('frontend/images/seeders/products/' . $product['thumbnail_image']), public_path('storage/images/products/' . $product['thumbnail_image']));
            } catch (\Throwable $th) {
                // Log::info("file" . $eas->image);
            }
        }
    }
}
