<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Lib\MSG91\MSG91;
use App\Lib\MSG91\SMSCode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout', 'reset');
    }

    public function loginShow()
    {
        // return view('frontend.login');
    }

    public function sendOtp(Request $request)
    {
        if ($request->method() === 'POST') {
            $request->validate(['phone' => 'required|unique:users,phone|digits:10']);
        }
        // if ($request->method() === 'PATCH') {
        //     $request->validate(['phone' => 'required|digits:10']);
        //     if (!User::wherePhone($request->phone)->exists()) {
        //         return response()->json(['success' => false, 'message' => 'User not found', 'errors' => ['password' => 'This number does not exists in our records']], 422);
        //     }
        // }

        $otp = MSG91::sendOTP([
            'mobile' => config('msg91.country') . $request->phone,
            "message" =>  Lang::get(config('msg91.map')[SMSCode::SEND_OTP]),
            "template_id" => SMSCode::SEND_OTP,
        ]);

        if ($otp['message']->type !== 'success') {
            return response()->json(['success' => false, 'message' => 'There was an error sending otp']);
        }

        return response()->json(['success' => true, 'phone' => $request->phone, 'message' => 'OTP Sent']);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['phone' => 'required|digits:10', 'otp' => 'required|numeric']);
        $verify = MSG91::verifyOTP([
            "mobile" => config('msg91.country') . request("phone"),
            "otp" => request("otp"),
            "country" => 91,
        ]);

        if ($verify['message']->type === 'success') {
            return response()->json(['success' => true, 'message' => 'Otp verified']);
        }

        return response()->json(['success' => false, 'message' => 'INVALID OTP']);
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/')->with(toast('Logged Out Successfully'));
    }
}
