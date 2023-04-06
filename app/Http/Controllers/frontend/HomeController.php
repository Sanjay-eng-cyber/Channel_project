<?php

namespace App\Http\Controllers\frontend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
  public function index(){
    $middleSlider = Slider::where('type','middle slider')->first();
    $leftSliders = Slider::where('type','left slider')->get();
    $rightSliders = Slider::where('type','right slider')->get();
    return view('frontend.index', compact('middleSlider','leftSliders','rightSliders'));
  }
}
