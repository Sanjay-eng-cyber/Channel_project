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

    public function createDelivery($order_id)
    {
        $order = Order::with('items')->findOrFail($order_id);
        foreach ($order->items as $item) {
            if ($item->product->stock < $item->quantity) {
                return redirect()->back()->with(toast("Product Quantity is less than ordered quantity", 'info'));
            }
        }
        return view('backend.order.create-delivery', compact('order'));
    }

    public function storeDelivery(Request $request, $order_id)
    {
        // return redirect()->back(toast("Work In Progress", 'info'));

        $request->validate([
            'length' => 'required|numeric|min:0.5,max:1000',
            'breadth' => 'required|numeric|min:0.5,max:1000',
            'height' => 'required|numeric|min:0.5,max:1000',
            'weight' => 'required|numeric|min:0.1|max:25'
        ]);
        // dd($request);

        $order = Order::with('items')->findOrFail($order_id);
        foreach ($order->items as $item) {
            if ($item->product->stock < $item->quantity) {
                return redirect()->back()->with(toast("Product Quantity is less than ordered quantity", 'info'));
            }
        }

        $delivery = Delivery::updateOrCreate([
            'order_id' => $order->id,
            'user_id' => $order->user_id,
            'status' => 'Pending',
            "length" => $request->length,
            "breadth" => $request->breadth,
            "height" => $request->height,
            "weight" => $request->weight
        ]);

        $shiprocketDetails = $delivery->sendOrderToShiprocketApi();
        // dd($shiprocketDetails);

        if (!$shiprocketDetails['success']) {
            $delivery->update([
                "message" => isset($shiprocketDetails['message']) ? $shiprocketDetails['message'] : "Something Went Wrong",
            ]);
            Log::info("Delivery ID : " . $delivery->id);
            Log::info($shiprocketDetails['message']);
            return redirect()->back()->with(toast('Failed To Deliver', 'error'));
        }

        Log::info("Delivery ID : " . $delivery->id);
        Log::info($shiprocketDetails['message']);
        $delivery->update(['status' => 'Intransit']);

        return redirect()->back()->with(toast('Delivery created', 'success'));
    }
}
