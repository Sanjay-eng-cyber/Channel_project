<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit(){
        $user = auth()->user();
        //dd($user);
        return view('frontend.profile', compact('user') );
    }

    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|min:3|max:30',
            'last_name' => 'required|string|min:3|max:30',
            'phone' => 'required|string|digits:10',
            'email' => 'required|string|email:rfc,dns|min:5|max:40',
            'gender' => 'required|string|in:male,female',
        ]);

        $profile = auth()->user();
        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->email = $request->email;
        $profile->phone = $request->phone;
        $profile->gender = $request->gender;
        if ($profile->save()) {
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
