<?php

namespace App\Http\Controllers\frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()->whereIn('status', ['completed', 'cancelled'])->with('items', 'deliveries')->paginate(10);
        // dd($orders);
        return view('frontend.order.index', compact('orders'));
    }

    public function show($order_id)
    {
        // return $order_id;
        $user = auth()->user();
        $order = Order::whereIn('status', ['cancelled', 'completed'])->where('user_id', $user->id)->with('items')->findOrFail($order_id);
        // dd($order);
        return view('frontend.order.show', compact('order'));
    }

    public function cancel($order_id)
    {
        $user = auth()->user();
        $order = Order::whereStatus('completed')->where('user_id', $user->id)->with('deliveries')->findOrFail($order_id);
        // dd($order);
        if ($order->deliveries->count()) {
            return redirect()->back()->with(toast('This Order has been processed already', 'info'));
        }
        if ($order->update(['status' => 'cancelled'])) {
            return redirect()->back()->with(toast('Order has been cancelled', 'success'));
        }
        return redirect()->back()->with(toast('Something Went Wrong', 'error'));
    }
}
