<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Cassandra\Custom;
use http\Client\Response;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $customers = Customer::orderby('id','desc')->get()->toArray();
//        $customer_data = response()->json($customers);
//        dd(date('Y-m-d H:i:s'));
//        dd(array(rand(100,500000)));
//        dd($customer_data);

        return response()->json($customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        Customer::create([
            'fName' => $request->fName,
            'lName' => $request->lName,
            'username' => $request->username,
            'password' => $request->password,
            'mobile_number' => $request->mobile_number,
            'is_registered' => $request->is_registered,
            'register_time' =>date('Y-m-d H:i:s'),
            'introduce_code' => $request->username.range(10000,500000),
            'used_intro_code_times' => 0
        ]);
        return response()->json('user created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $customer = Customer::find($id);
        return response()->json($customer);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Customer::where('id',$id)->update([
            'fName' => $request->fName,
            'lName' => $request->lName,
            'username' => $request->username,
            'password' => $request->password,
            'mobile_number' => $request->mobile_number,
        ]);
        return response()->json('customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $customer = Customer::find($id);
        $customer->delete();
        return response()->json('customer deleted successfully');
    }

}
