<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DelhiveryService
{
    protected $client;
    protected $baseURI;
    protected $accessToken;

    public function __construct()
    {
        $this->accessToken = config('delhivery.access_token');
        $this->baseURI = config('delhivery.base_uri');

        $this->client = Http::withHeaders([
            'Authorization' => 'Token ' . $this->accessToken,
            'Content-Type' => 'application/json',
        ])->withOptions(["verify" => false]);
    }

    public function checkPincodeAvailability($pincode)
    {
        $response = $this->client->get($this->baseURI . '/c/api/pin-codes/json', [
            'filter_codes' => $pincode
        ]);

        $this->formatResponse($response);

        if ($response->getStatusCode() == 200) {
            $json = $response->json();
            if (isset($json['delivery_codes']) && isset($json['delivery_codes'][0]['postal_code'])) {
                return ['status' => true, 'message' => 'Pincode Available'];
            }
            return ['status' => false, 'message' => 'Pincode Service Not Available'];
        }
        return ['status' => false, 'message' => 'Something Went Wrong. Please Try Again Later'];
    }

    // public function createOrder($orderData)
    // {
    //     $body = $orderData;
    //     $response = $this->client->post($this->baseURI . '/api/cmu/create.json', $body);

    //     $this->formatResponse($response);

    //     if ($response->getStatusCode() == 200) {
    //         $json = $response->json();
    //         return ['status' => false, 'message' => 'Success'];
    //     }
    //     return ['status' => false, 'message' => 'Something Went Wrong'];
    // }

    protected function formatResponse($response)
    {
        if ($response->getStatusCode() == 401) {
            Log::info('Delhivery: Unauthenticated.');
            return ['status' => false, 'message' => 'Something Went Wrong'];
        }
    }
}
