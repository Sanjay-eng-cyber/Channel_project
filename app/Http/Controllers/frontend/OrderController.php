<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()->with('items')->paginate(10);
        // dd($orders);
        return view('frontend.order.index', compact('orders'));
    }
}
