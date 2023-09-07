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

        $delivery = Delivery::create([
            'order_id' => $order->id,
            'user_id' => $order->user_id,
            'status' => 'Pending',
            "length" => $request->length,
            "breadth" => $request->breadth,
            "height" => $request->height,
            "weight" => $request->weight
        ]);

        $shiprocketDetails = $delivery->sendOrderToShiprocketApi();

        // Log::info('store method shipRocket Details');
        // Log::info($shiprocketDetails);

        // dd($shiprocketDetails);

        if (!$shiprocketDetails['success']) {
            $delivery->update([
                "message" => isset($shiprocketDetails['message']) ? $shiprocketDetails['message'] : "Something Went Wrong",
            ]);
            Log::info("Delivery ID : " . $delivery->id);
            Log::info($shiprocketDetails['message']);
            // $delivery->delete();
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
        // $order = $delivery->order;
        return view('backend.delivery.edit', compact('delivery'));
        // return view('backend.delivery.edit', compact('order', 'delivery'));
    }

    public function update(Request $request, $delivery_id)
    {
        $request->validate([
            'delivered_date' => 'nullable|date',
            'status' => 'required|in:Pending,Intransit,Delivered',
        ]);

        $delivery = Delivery::findOrFail($delivery_id);

        $delivery->delivered_date = $request->delivered_date;
        $delivery->status = $request->status;
        if ($delivery->save()) {
            return redirect()->route('backend.delivery.index')->with(['alert-type' => 'success', 'message' => 'Delivery Updated Successfully']);
        }
        return redirect()->back()->with(['alert-type' => 'error', 'message' => 'Something Went Wrong']);
        // $request->validate([
        //     'length' => 'required|numeric|min:0.5,max:1000',
        //     'breadth' => 'required|numeric|min:0.5,max:1000',
        //     'height' => 'required|numeric|min:0.5,max:1000',
        //     'weight' => 'required|numeric|min:0.1|max:25'
        // ]);

        // $delivery = Delivery::whereStatus('Intransit')->findOrFail($delivery_id);
        // $order = $delivery->order;
        // $delivery->update([
        //     "length" => $request->length,
        //     "breadth" => $request->breadth,
        //     "height" => $request->height,
        //     "weight" => $request->weight
        // ]);

        // $shiprocketDetails = $delivery->sendOrderToShiprocketApi();
        // dd($shiprocketDetails);
        // if (!$shiprocketDetails['success']) {
        //     $delivery->update([
        //         "message" => isset($shiprocketDetails['message']) ? $shiprocketDetails['message'] : "Something Went Wrong",
        //     ]);
        //     Log::info("Delivery ID : " . $delivery->id);
        //     Log::info($shiprocketDetails['message']);
        //     return redirect()->back()->with(toast('Failed To Deliver', 'error'));
        // }

        // Log::info("Delivery ID : " . $delivery->id);
        // Log::info($shiprocketDetails['message']);
        // dd($delivery);
        // return redirect()->back()->with(toast('Delivery Updated', 'success'));
    }

    public function fetchDelivery($id)
    {
        $delivery = Delivery::where('status', '!=', 'Delivered')->findOrFail($id);
        // dd($delivery);
        $token = getShiprocketToken();
        $time = now()->format('d-m-y h:is');
        $response =  Shiprocket::track($token)->throwShipmentId($delivery->shipment_id);
        Log::info('ShipRocket FetchDelivery ThrowShipmentId Response @ ' . $time);
        Log::info($response);
        // dd($response);
        $time = now()->format('d-m-y h:is');
        $shipment = Shiprocket::shipment($token)->getSpecific($delivery->shipment_id);
        Log::info('ShipRocket FetchDelivery getSpecific Response @ ' . $time);
        Log::info($shipment);
        // dd($shipment['data']);
        if ($shipment && isset($shipment['data'])) {
            $delivery->update([
                'awb_code' => isset($shipment['data']['awb']) ? $shipment['data']['awb'] : null,
                'courier_name' => isset($shipment['data']['courier']) ? $shipment['data']['courier'] : null,
                'partner_status_code' => isset($shipment['data']['status']) ? $shipment['data']['status'] : null,
                'partner_status' => isset($shipment['data']['status']) ? Delivery::API_STATUS[$shipment['data']['status']] : null,
                'pickup_token_number' => isset($shipment['data']['pickup_token_number']) ? $shipment['data']['pickup_token_number'] : null,
                'delivered_date' => isset($shipment['data']['delivered_date']) ? $shipment['data']['delivered_date'] : null
            ]);
            return redirect()->back()->with(toast('Delivery Fetched Successfully', 'success'));
        }

        // $awbResponse =  Shiprocket::track($token)->throughAwb($delivery->awb_code);
        // // dd($awbResponse);
        // if ($awbResponse && isset($awbResponse['tracking_data']) && isset($awbResponse['tracking_data']['track_status'])) {
        //     // dd($awbResponse);
        //     $pickup_date = null;
        //     if (isset($awbResponse['tracking_data']['shipment_track'])) {
        //         $pickup_date = isset($awbResponse['tracking_data']['shipment_track']['pickup_date']) ? $awbResponse['tracking_data']['shipment_track']['pickup_date'] : null;
        //     }
        //     $delivery->update([
        //         'pickup_date' => $pickup_date
        //     ]);
        // }
        // dd($awbResponse);
        return redirect()->back()->with(toast('Something Went Wrong', 'error'));
    }

    // public function generateAwb($id)
    // {
    //     $delivery = Delivery::findOrFail($id);
    //     // dd($delivery);
    //     $token = getShiprocketToken();
    //     $generateAwbResponse = Shiprocket::courier($token)->generateAWB(['shipment_id' => $delivery->shipment_id]);
    //     Log::info($generateAwbResponse);

    //     if ($generateAwbResponse->has('status_code')) {
    //         $delivery->update([
    //             'partner_status_code' => $generateAwbResponse['status_code'],
    //             'partner_status' => $generateAwbResponse['message']
    //         ]);
    //         // return response()->json(['error' => "Your awb could not be generated. {$generateAwbResponse['message']}"]);
    //         // return response()->json(['error' => "Your awb could not be generated. {$generateAwbResponse}"]);
    //         return redirect()->back()->with(toast("Your awb could not be generated. {$generateAwbResponse}", 'error'));
    //     }

    //     if ($generateAwbResponse->has('awb_assign_status') && $generateAwbResponse['awb_assign_status'] === 1) {
    //         $data = ['shipment_id' => $delivery->shipment_id];
    //         $response = $delivery->prepareForPickup($data, $token);
    //         $delivery->update($response);
    //     }
    //     return redirect()->back()->with(toast("Pickup requested.", 'success'));
    //     // return response()->json(['success' => 'Pickup requested']);
    // }

    // public function retryPickup(Delivery $delivery)
    // {
    //     $token = getShiprocketToken();

    //     $data = ['shipment_id' => $delivery->shipment_id];
    //     $response = $delivery->prepareForPickup($data, $token);
    //     $delivery->update($response);
    //     Log::info('retry pickup');
    //     Log::info($response);

    //     return redirect()->back()->with(toast("Pickup requested.", 'success'));
    // }

    public function printManifest($id)
    {
        $token = getShiprocketToken();

        $res = Shiprocket::generate($token)->printManifest(['order_ids' =>  [$id]]);
        // dd($res);
        if ($res['manifest_url']) {
            $res = $res['manifest_url'];
        } else {
            return redirect()->back()->with(toast('Manifest Not Available', 'error'));
        }

        header("Content-type:application/pdf");
        header("Content-Disposition:attachment;filename=manifest.pdf");
        return readfile($res);
    }

    public function printLabel($id)
    {
        $token = getShiprocketToken();

        $res = Shiprocket::generate($token)->label(['shipment_id' => [$id]]);
        if ($res['label_created']) {
            $res = $res['label_url'];
        } else {
            return redirect()->back()->with(toast('Label Not Available', 'error'));
        }

        header("Content-type:application/pdf");
        header("Content-Disposition:attachment;filename=label.pdf");
        return readfile($res);
    }
}
