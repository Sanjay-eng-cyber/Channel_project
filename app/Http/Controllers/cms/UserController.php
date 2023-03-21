<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::latest();
        $users = $this->filterResults($request, $users);
        $users = $users->paginate(10);
        return view('backend.users.index', compact('users'));
    }

    protected function filterResults($request, $users)
    {
        if ($request->q !== '' && !is_null($request->q)) {
            if (is_numeric($request->q)) {
                $request->validate(['q' => 'digits_between:3,40'], ['q.*' => 'Please enter proper Number']);
            } else {
                $request->validate(['q' => 'min:3']);
            }
        }

        if ($request !== null && $request->has('q') && $request['q'] !== '') {
            $search = $request['q'];

            // $temp_appointment = $temp_appointment->where('mobile', 'LIKE', '%' . $search . '%')
            //     ->orWhere('name', 'LIKE', '%' . $search . '%')
            //     ->orWhere('email', 'LIKE', '%' . $search . '%');

            $users = $users->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%')->
                orWhere('email', 'LIKE', '%' . $search . '%')->
                orWhere('phone', 'LIKE', '%' . $search . '%');
            });
        }
        return $users;
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $userPrimaryAddress =  $user->userAddress->where('type','primary')->first();
        $userOtherAddress =  $user->userAddress->where('type','!=','primary')->first();
        // dd($userPrimaryAddress);
        return view('backend.users.show', compact('user','userPrimaryAddress','userOtherAddress'));
    }
}
