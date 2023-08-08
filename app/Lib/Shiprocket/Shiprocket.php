<?php

namespace App\Lib\Shiprocket;

use Seshac\Shiprocket\Shiprocket as ShiprocketApi;

class Shiprocket
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

    public function checkServiceablity()
    {
        $checkServiceablity = ShiprocketApi::courier($this->getShiprocketToken())->checkServiceability([
            'pickup_postcode' => env('APP_POSTAL_CODE'),
            'delivery_postcode' => (int)$selectedAddress->postal_code
        ]);
    }
}
