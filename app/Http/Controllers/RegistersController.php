<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class RegistersController extends Controller
{
    //
    public function save_user_in_database(Request $request){

        $request->validate([
            'fName' => 'string|required|min:5|max:20',
            'lName' => 'string|required|min:5|max:40',
            'username' => 'required|string|regex:/^([a-z])+?(-|_)([a-z])+$/i|unique:customer',
            'password' => 'required|min:5|max:30',
            'mobile_number' => 'required',
        ]);


        Customer::create([
            'fName' => $request->fName,
            'lName' => $request->lName,
            'username' => $request->username,
            'password' => $request->password,
            'mobile_number' => $request->mobile_number,
            'is_registered' => 0,
            'register_time' =>date('Y-m-d H:i:s'),
            'introduce_code' => $request->username.range(10000,500000),
            'used_intro_code_times' => 0
        ]);
        return response()->json('user created');
    }


}
