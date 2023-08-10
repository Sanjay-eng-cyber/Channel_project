<?php

namespace App\Http\Controllers\cms;

use App\Models\Order;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class DeliveryController extends Controller
{
    public function index(Request $request)
    {
        $deliveries = Delivery::latest()->paginate(10);
        return view('backend.delivery.index', compact('deliveries'));
    }

    public function show($deliveryId)
    {
        $delivery = Delivery::findOrFail($deliveryId);
        return view('backend.delivery.show', compact('delivery'));
    }

    public function create($order_id)
    {
        $order = Order::whereStatus('completed')->with('items')->findOrFail($order_id);
        if ($order->deliveries->count()) {
            return redirect()->route('backend.order.show', $order_id)->with(toast("Delivery Already Created", 'info'));
        }
        foreach ($order->items as $item) {
            if ($item->product->stock < $item->quantity) {
                return redirect()->back()->with(toast("Product Quantity is less than ordered quantity", 'info'));
            }
        }
        return view('backend.order.create-delivery', compact('order'));
    }

    public function store(Request $request, $order_id)
    {
        // return redirect()->back(toast("Work In Progress", 'info'));

        $order = Order::whereStatus('completed')->with('items')->findOrFail($order_id);
        if ($order->deliveries->count()) {
            return redirect()->route('backend.order.show', $order_id)->with(toast("Delivery Already Created", 'info'));
        }
        $request->validate([
            'length' => 'required|numeric|min:0.5,max:1000',
            'breadth' => 'required|numeric|min:0.5,max:1000',
            'height' => 'required|numeric|min:0.5,max:1000',
            'weight' => 'required|numeric|min:0.1|max:25'
        ]);
        // dd($request);

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
