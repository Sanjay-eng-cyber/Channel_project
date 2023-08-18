<?php

namespace App\Http\Controllers\cms;

use App\Models\Order;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Seshac\Shiprocket\Shiprocket;

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

    public function edit($delivery_id)
    {
        $delivery = Delivery::findOrFail($delivery_id);
        $order = $delivery->order;
        return view('backend.delivery.edit', compact('order', 'delivery'));
    }

    public function update(Request $request, $delivery_id)
    {
        // $request->validate([
        //     'length' => 'required|numeric|min:0.5,max:1000',
        //     'breadth' => 'required|numeric|min:0.5,max:1000',
        //     'height' => 'required|numeric|min:0.5,max:1000',
        //     'weight' => 'required|numeric|min:0.1|max:25'
        // ]);

        $delivery = Delivery::whereStatus('Intransit')->findOrFail($delivery_id);
        $order = $delivery->order;
        // $delivery->update([
        //     "length" => $request->length,
        //     "breadth" => $request->breadth,
        //     "height" => $request->height,
        //     "weight" => $request->weight
        // ]);

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
        // dd($delivery);
        return redirect()->back()->with(toast('Delivery Updated', 'success'));
    }

    public function generateAwb(Delivery $delivery)
    {
        $token = getShiprocketToken();

        $generateAwbResponse = Shiprocket::courier($token)->generateAWB(['shipment_id' => $delivery->shipment_id]);

        if ( $generateAwbResponse->has('status_code') ) {
            $delivery->update([
                'partner_status_code' => $generateAwbResponse['status_code'],
                'partner_status' => $generateAwbResponse['message']
            ]);

            // return response()->json(['error' => "Your awb could not be generated. {$generateAwbResponse['message']}"]);
            return response()->json(['error' => "Your awb could not be generated. {$generateAwbResponse}"]);
        }

        if ( $generateAwbResponse->has('awb_assign_status') && $generateAwbResponse['awb_assign_status'] === 1) {
            $data = ['shipment_id' => $delivery->shipment_id];
            $response = $delivery->prepareForPickup($data, $token);
            $delivery->update($response);
        }
        return response()->json(['success' => 'Pickup requested']);
    }

    public function retryPickup(Delivery $delivery)
    {
        $token = Shiprocket::getToken();

        $data = ['shipment_id' => $delivery->shipment_id];
        $response = $delivery->prepareForPickup($data, $token);
        $delivery->update($response);

        return response()->json(['success' => 'Pickup requested']);
    }

    public function getTrackingDetails(Request $request): JsonResponse
    {
        if ( $request->scans[0]['activity'] === "SHIPMENT DELIVERED" ) {
            Delivery::where('partner_order_id', $request->order_id)->update([
                'partner_status' => $request->scans[0]['activity'],
                'status' => 'Delivered'
            ]);
        } else {
            Delivery::where('partner_order_id', $request->order_id)->update([
                'partner_status' => $request->scans[0]['activity']
            ]);
        }
        return response()->json(['success' => 'Details updated']);
    }

    public function printManifest($id)
    {
        $token = Shiprocket::getToken();

        $res = Shiprocket::generate($token)->printManifest(['order_ids' =>  [$id] ])['manifest_url'];

        header("Content-type:application/pdf");
        header("Content-Disposition:attachment;filename=manifest.pdf");
        return readfile($res);

    }

    public function printLabel($id)
    {
        $token = Shiprocket::getToken();

        $res = Shiprocket::generate($token)->label(['shipment_id' => [ $id ]])['label_url'];

        header("Content-type:application/pdf");
        header("Content-Disposition:attachment;filename=label.pdf");
        return readfile($res);
    }
}
