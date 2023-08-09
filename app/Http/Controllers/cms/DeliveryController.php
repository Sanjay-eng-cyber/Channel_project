<?php

namespace App\Http\Controllers\cms;

use App\Models\Delivery;
use Illuminate\Http\Request;
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
}
