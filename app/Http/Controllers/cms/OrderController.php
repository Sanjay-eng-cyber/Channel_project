<?php

namespace App\Http\Controllers\cms;

use App\Models\Order;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::latest();
        $orders = $this->filterResults($request, $orders);
        $orders = $orders->paginate(10);
        return view('backend.order.index', compact('orders'));
    }

    public function orderItems($id)
    {
        $order = Order::with('user')->findOrFail($id);
        $order_items = $order->items()->with('product')->latest()->paginate(10);
        // dd($order_items);
        return view('backend.order.order_items', compact('order', 'order_items'));
    }

    protected function filterResults($request, $orders)
    {
        $request->validate([
            'q' => 'nullable|min:3|max:40'
        ]);

        if ($request !== null && $request->has('status') && $request['status'] == 'initial') {
            $orders = $orders->where('status', '=', 'initial');
        } elseif ($request !== null && $request->has('status') && $request['status'] == 'failed') {
            $orders = $orders->where('status', '=', 'failed');
        } elseif ($request !== null && $request->has('status') && $request['status'] == 'completed') {
            $orders = $orders->where('status', '=', 'completed');
        }
        return $orders;
    }

    public function show($id)
    {
        $order = Order::with('user')->findOrFail($id);
        $transaction = $order->transactions()->orderBy('status', 'asc')->first();
        //dd($transaction);
        return view('backend.order.show', compact('order', 'transaction'));
    }
}
