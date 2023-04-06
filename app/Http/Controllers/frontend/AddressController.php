<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'street_address' => 'required|string|min:5|max:80',
            'city' => 'required|string|min:3|max:20',
            'state' => 'required|string|min:3|max:50',
            'country' => 'required|string|min:3|max:50',
            'postal_code' => 'required|string|min:3|max:20',
        ]);
        $userAddresscount = auth()->user()->userAddress()->count();
      //dd($userAddresscount);
        if ($userAddresscount >= 3) {
            return redirect()->back()->with(['alert-type' => 'info', 'message' => 'Maximum 3 address allow for one user.']);
        }
        $address = new UserAddress;
       $address->type = $userAddresscount < 1 ? 'primary' : 'secondary';
        $address->user_id = auth()->user()->id;
        $address->street_address = $request->street_address;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->country = $request->country;
        $address->postal_code = $request->postal_code;
        if ($address->save()) {
            return redirect()->back()->with([
                "message" => "Message Sent Successfully",
                "alert-type" => "success"
            ]);
        }
        return redirect()->back()->with([
            "message" => "Something went wrong. Please contact us via email or phone.",
            "alert-type" => "error"
        ]);
    }
}
