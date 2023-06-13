<?php

namespace App\Http\Controllers\frontend;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $middleSlider = Slider::where('type', 'middle slider')->first();
        $leftSliders = Slider::where('type', 'left slider')->get();
        $rightSliders = Slider::where('type', 'right slider')->get();

        $skin = Category::where('slug', 'skin')->first();
        $skinProducts = $skin ? $skin->products()->limit(16)->get() : [];
        $latestSkinProducts = $skin ? $skin->products()->latest()->limit(16)->get() : [];

        $fragrances = Category::where('slug', 'fragrances')->first();
        $fragrancesProducts = $fragrances ? $fragrances->products()->limit(16)->get() : [];
        $latestFragrancesProducts = $fragrances ? $fragrances->products()->latest()->limit(16)->get() : [];

        $home_decor = Category::where('slug', 'home-decor')->first();
        $homeDecorProducts = $home_decor ? $home_decor->products()->limit(16)->get() : [];
        $latestHomeDecorProducts = $home_decor ? $home_decor->products()->latest()->limit(16)->get() : [];

        $cProduct = Product::where('connection_no', 457820)->get();
       // dd($cProduct);

        // dd($latestSkinProducts, $latestFragrancesProducts, $latestHomeDecorProducts);

        return view('frontend.index', compact('middleSlider', 'leftSliders', 'rightSliders', 'skinProducts', 'latestSkinProducts', 'fragrancesProducts', 'latestFragrancesProducts', 'homeDecorProducts', 'latestHomeDecorProducts'));
    }
}
