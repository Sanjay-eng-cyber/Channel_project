<?php

namespace App\Http\Controllers\frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()->with('items')->paginate(10);
        // dd($orders);
        return view('frontend.order.index', compact('orders'));
    }

    public function show($order_id)
    {
        // return $order_id;
        $user = auth()->user();
        $order = Order::whereStatus('completed')->where('user_id', $user->id)->with('items')->findOrFail($order_id);
        // dd($order);
        return view('frontend.order.show', compact('order'));
    }
}
