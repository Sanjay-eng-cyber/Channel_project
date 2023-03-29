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
        $request->validate(['phone' => 'required|digits:10']);
        // dd($request);
        // $otp = MSG91::sendOTP([
        //     'mobile' => config('msg91.country') . $request->phone,
        //     "message" =>  Lang::get(config('msg91.map')[SMSCode::SEND_OTP]),
        //     "template_id" => SMSCode::SEND_OTP,
        // ]);

        // if ($otp['message']->type !== 'success') {
        //     return response()->json(['success' => false, 'message' => 'There was an error sending otp']);
        // }

        // return response()->json(['success' => false, 'message' => 'There was an error sending otp']);
        return response()->json(['success' => true, 'phone' => $request->phone, 'message' => 'OTP Sent']);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['phone' => 'required|digits:10', 'otp' => 'required|numeric']);

        // $verify = MSG91::verifyOTP([
        //     "mobile" => config('msg91.country') . request("phone"),
        //     "otp" => request("otp"),
        //     "country" => 91,
        // ]);

        // if ($verify['message']->type === 'success') {
        //     return response()->json(['success' => true, 'message' => 'Otp verified']);
        // }

        if ($request->otp == '1234') {
            $user = User::firstOrCreate(
                ['phone' => $request->phone],
                ['created_at' => now(), 'updated_at' => now()]
            );
            if ($user) {
                Auth::guard('web')->login($user);
                return response()->json(['success' => true, 'message' => 'OTP Verified']);
            }
            return response()->json(['success' => false, 'message' => 'Something Went Wrong']);
        }
        return response()->json(['success' => false, 'message' => 'Invalid OTP']);
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/')->with(toast('Logged Out Successfully'));
    }
}
