<?php

namespace App\Lib\Shiprocket;

use App\Models\User;
use Seshac\Shiprocket\Shiprocket;

class ShiprocketLib
{
    protected function getShiprocketToken()
    {
        $configToken = \App\Models\ShiprocketConfig::where('name', 'token')->where('validity', '>', now())->first();
        // dd($configToken);
        if ($configToken) {
            $token = $configToken->value;
        } else {
            // dd(config('shiprocket.credentials.email'),config('shiprocket.credentials.password'));
            $loginDetails =  ShiprocketApi::login([
                'email' => config('shiprocket.credentials.email'),
                'password' => config('shiprocket.credentials.password')
            ]);
            // dd($loginDetails);
            $token =  isset($loginDetails['token']) ? $loginDetails['token'] : null;
            if ($token) {
                $configToken = \App\Models\ShiprocketConfig::updateOrCreate(
                    ['name' => 'token'],
                    [
                        'value' => $token,
                        'validity' => \Carbon\Carbon::now()->addHours(9)
                    ]
                );
            }
        }
        return $token;
    }

    // public function generateAWB($token, $response)
    // {
    //     if (in_array($response['awb_code'], [0, '', null], true)) {

    //         $paramForAwb = ['shipment_id' => $response['shipment_id'], 'courier_id' => $response['courier_company_id']];
    //         $awb = Shiprocket::courier($token)->generateAWB($paramForAwb);
    //         Log::info('Generate AWB');
    //         Log::info($awb);
    //         if ($awb->has('status_code')) {
    //             session()->flash('error', "Your AWB could not be generated. {$awb['message']}");
    //             $response['status_code'] = $awb['status_code'];
    //         }

    //         if ($awb->has('awb_assign_status') && $awb['awb_assign_status'] === 1) {
    //             $response['awb_code'] = $awb['response']['data']['awb_code'];
    //             $response['status_code'] = $awb['awb_assign_status'];
    //             $response = $this->prepareForPickup($response, $token);
    //         }
    //     } else {
    //         $response = $this->prepareForPickup($response, $token);
    //         if (array_key_exists('pickup_data', $response)) {
    //             $manifest = Shiprocket::generate($token)->manifest(['shipment_id' => [$response['shipment_id']]]);
    //             Log::info('Generate Manifest');
    //             Log::info($manifest);
    //         }
    //     }
    //     return $response;
    // }

    // /**
    //  * @param $response
    //  * @param $token
    //  * @return mixed
    //  */
    // public function prepareForPickup($response, $token)
    // {
    //     $requestPickup = Shiprocket::courier($token)->requestPickup(['shipment_id' => $response['shipment_id']]);
    //     Log::info('Prepare For Pickup');
    //     Log::info($requestPickup);

    //     if ($requestPickup->has('message')) {
    //         session()->flash('error', $requestPickup['message']);
    //         $response['status_code'] = $requestPickup['status_code'];
    //         $response['message'] = $requestPickup['message'];
    //     }

    //     if ($requestPickup->has('pickup_status') && $requestPickup['pickup_status'] === 0 && $requestPickup['response']['data'] === 'Pickup queued') {
    //         $response['pickup_data'] = ['message' => $requestPickup['response']['data']];
    //     }

    //     if ($requestPickup->has('pickup_status') && $requestPickup['pickup_status'] === 1) {

    //         $response['pickup_data'] = [
    //             'pickup_status' =>  $requestPickup['pickup_status'],
    //             'pickup_scheduled_date' => $requestPickup['response']['pickup_scheduled_date'],
    //             'pickup_token_number' => $requestPickup['response']['pickup_token_number'],
    //             'message' => $requestPickup['response']['data']
    //         ];
    //         session()->flash('success', $requestPickup['response']['data']);
    //     }
    //     return $response;
    // }
}
