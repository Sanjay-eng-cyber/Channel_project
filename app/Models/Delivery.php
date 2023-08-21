<?php

namespace App\Models;

use App\Models\User;
use Seshac\Shiprocket\Shiprocket;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Delivery extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected const API_STATUS = [
        1 => "Awb Assigned",
        2 => "Label Generated",
        3 => "Pickup Scheduled/Generated",
        4 => "Pickup Queued",
        5 => "Manifest Generated",
        6 => "Shipped",
        7 => "Delivered",
        8 => "Cancelled",
        9 => "RTO Initiated",
        10 => "RTO Delivered",
        11 => "Pending",
        12 => "Lost",
        13 => "Pickup Error",
        14 => "RTO Acknowledged",
        15 => "Pickup Rescheduled",
        16 => "Cancellation Requested",
        17 => "Out For Delivery",
        18 => "In Transit",
        19 => "Out For Pickup",
        20 => "Pickup Exception",
        21 => "Undelivered",
        22 => "Delayed",
        23 => "Partial_Delivered",
        24 => "Destroyed",
        25 => "Damaged",
        26 => "Fulfilled",
        38 => "Reached at Destination",
        39 => "Misrouted",
        40 => "RTO NDR",
        41 => "RTO OFD",
        42 => "Picked Up",
        43 => "Self Fulfilled",
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function items(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\DeliveryItem::class);
    }

    public function order(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(order::class);
    }

    public function addItems($ordersItems): void
    {
        foreach ($ordersItems as $product) {
            \DB::table('delivery_items')->insert([
                'order_id' => $this->order_id,
                'delivery_id' => $this->id,
                'product_id' => $ordersItems->product_id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }

    protected function prepareOrder(): array
    {
        $items = [];
        $user = User::find($this->user_id);
        $userAddress = $user->address;
        $order = $this->order;
        // dd($order);
        // $payment_method = 'COD';
        $payment_method = 'Prepaid';

        foreach ($order->items as $item) {
            $items[$item->product->name] = [
                'name' => $item->product->name,
                'sku' => $item->product->sku,
                'units' => $item->quantity,
                'selling_price' => $item->amount,
                "hsn" => 000000
            ];
        }
        // dd($items);

        return [
            'order_id' => $this->order_id,
            'order_date' => $this->created_at ?? now(),
            'pickup_location' => 'Primary',
            "billing_customer_name" => $user->first_name,
            "billing_last_name" => $user->last_name,
            "billing_address" => $order->street_address,
            "billing_address_2" => $order->landmark,
            "billing_city" => $order->city,
            "billing_pincode" => $order->postal_code,
            "billing_state" => $order->state,
            "billing_country" => $order->country ?? "India",
            "billing_email" => $user->email,
            "billing_phone" => $user->phone,
            "shipping_is_billing" => true,
            "order_items" => $items,
            "payment_method" => $payment_method,
            "shipping_charges" => 0,
            "giftwrap_charges" => 0,
            "transaction_charges" => 0,
            "total_discount" => 0,
            "sub_total" => $this->order->total_amount,
            "length" => $this->length,
            "breadth" => $this->breadth,
            "height" => $this->height,
            "weight" => $this->weight
        ];
    }

    public function sendOrderToShiprocketApi()
    {
        $user = User::find($this->user_id);
        $details = $this->prepareOrder();
        // dd($details);
        $token = getShiprocketToken();
        // dd($token);
        $response = Shiprocket::order($token)->create($details);
        Log::info('Order Create');
        Log::info($response);
        // dd($response);
        if ($response['status_code'] === 422) {
            foreach ($response['errors'] as $key => $err) {
                $string = str_replace(['order_items', '.'], ['', ' '], $key);
                session()->flash('error', "{$string}: $err[0]");
            }
            return [
                'success' => false,
                'message' => $response['message']
            ];
        }

        if ($response['status_code'] === 1) {
        } else {
            if ($response->has('message')) {
                session()->flash('error', $response['message']);

                return [
                    'success' => false,
                    'message' => $response['message']
                ];
            } else {
                session()->flash('error', $response['status']);

                return [
                    'success' => false,
                    'message' => $response['status']
                ];
            }
        }


        $checkServiceablity = Shiprocket::courier($token)->checkServiceability([
            'pickup_postcode' => env('APP_POSTAL_CODE'),
            'delivery_postcode' => $details['billing_pincode'],
            'order_id' => $response['order_id']
        ]);
        // Log::info('Check Serviceability');
        // Log::info($checkServiceablity);

        if ($checkServiceablity['status']  !== 200) {
            session()->flash('error', 'Not deliverable in this location');
            return  [
                'success' => false,
                'message' => $checkServiceablity['message']
            ];
        }

        $response = $this->generateAWB($token, $response);

        $this->storeShiprocketData($response);

        return [
            'success' => true,
            'message' => 'Details Updated'
        ];
    }

    public function generateAWB($token, $response)
    {
        if (in_array($response['awb_code'], [0, '', null], true)) {

            $paramForAwb = ['shipment_id' => $response['shipment_id'], 'courier_id' => $response['courier_company_id']];
            $awb = Shiprocket::courier($token)->generateAWB($paramForAwb);
            Log::info('Generate AWB');
            Log::info($awb);
            if ($awb->has('status_code')) {
                session()->flash('error', "Your AWB could not be generated. {$awb['message']}");
                $response['status_code'] = $awb['status_code'];
            }

            if ($awb->has('awb_assign_status') && $awb['awb_assign_status'] === 1) {
                $response['awb_code'] = $awb['response']['data']['awb_code'];
                $response['status_code'] = $awb['awb_assign_status'];
                $response = $this->prepareForPickup($response, $token);
            }
        } else {
            $response = $this->prepareForPickup($response, $token);
            if (array_key_exists('pickup_data', $response)) {
                $manifest = Shiprocket::generate($token)->manifest(['shipment_id' => [$response['shipment_id']]]);
                Log::info('Generate Manifest');
                Log::info($manifest);
            }
        }
        return $response;
    }

    /**
     * @param $response
     * @param $token
     * @return mixed
     */
    public function prepareForPickup($response, $token)
    {
        $requestPickup = Shiprocket::courier($token)->requestPickup(['shipment_id' => $response['shipment_id']]);
        Log::info('Prepare For Pickup');
        Log::info($requestPickup);

        if ($requestPickup->has('message')) {
            session()->flash('error', $requestPickup['message']);
            $response['status_code'] = $requestPickup['status_code'];
            $response['message'] = $requestPickup['message'];
        }

        if ($requestPickup->has('pickup_status') && $requestPickup['pickup_status'] === 0 && $requestPickup['response']['data'] === 'Pickup queued') {
            $response['pickup_data'] = ['message' => $requestPickup['response']['data']];
        }

        if ($requestPickup->has('pickup_status') && $requestPickup['pickup_status'] === 1) {

            $response['pickup_data'] = [
                'pickup_status' =>  $requestPickup['pickup_status'],
                'pickup_scheduled_date' => $requestPickup['response']['pickup_scheduled_date'],
                'pickup_token_number' => $requestPickup['response']['pickup_token_number'],
                'message' => $requestPickup['response']['data']
            ];
            session()->flash('success', $requestPickup['response']['data']);
        }
        return $response;
    }


    public function storeShiprocketData($shiprocketDetails): void
    {

        Log::info('Storing Data');
        Log::info($shiprocketDetails);
        $this->update([
            'partner_order_id' => $shiprocketDetails['order_id'],
            'shipment_id' => $shiprocketDetails['shipment_id'],
            'awb_code' => $shiprocketDetails['awb_code'] ?: null,
            'courier_company_id' => $shiprocketDetails['courier_company_id'] ?: null,
            'courier_name' => $shiprocketDetails['courier_name'] ?: null,
            'partner_status_code' => $shiprocketDetails['status_code'],
            'partner_status' => self::API_STATUS[$shiprocketDetails['status_code']] ?? null,
            'pickup_status' => $shiprocketDetails['pickup_data']['pickup_status'] ?? null,
            'pickup_date' => $shiprocketDetails['pickup_data']['pickup_scheduled_date'] ?? null,
            'pickup_token_number' => $shiprocketDetails['pickup_data']['pickup_token_number'] ?? null,
            'message' => $shiprocketDetails['pickup_data']['message'] ?? null
        ]);
    }
}
