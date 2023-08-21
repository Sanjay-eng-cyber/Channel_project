<?php

namespace App\Http\Controllers\frontend;

use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class ShipRocketWebhookController extends Controller
{
    public function manage(Request $request)
    {
        Log::info($request);
        if (isset($request->scans[0]) && $request->scans[0]['activity'] === "SHIPMENT DELIVERED") {
            Delivery::where('partner_order_id', $request->order_id)->update([
                'partner_status' => $request->scans[0]['activity'],
                'status' => 'Delivered'
            ]);
        } else {
            Delivery::where('partner_order_id', $request->order_id)->update([
                'partner_status' => isset($request->scans[0]) ? $request->scans[0]['activity'] : null,
                'pickup_scheduled_date' => $request->pickup_scheduled_date ?? null,
                'status' => $request->shipment_status
            ]);
        }
        return response()->json(['success' => 'Details Updated']);
    }
}
