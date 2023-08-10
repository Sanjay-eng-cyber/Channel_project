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
        $order = Order::findOrFail($id);
        return view('backend.order.show', compact('order'));
    }


}
