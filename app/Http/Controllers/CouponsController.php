<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Support\Facades\DB;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        $coupon=Coupon::orderby('id','desc')->get()->toArray();
        $coupon=DB::select("SELECT * FROM coupons");
        $coupon_data = response()->json($coupon);
        dd($coupon_data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->store();
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
        Coupon::create([
            'coupon_name' => $request->coupon_name,
            'active' =>$request->active,
            'total_amount' => $request->total_amount,
            'used_amount' => 0,
            'discount_percent' => $request->discount_percent,
            'discount_percent_toman'=>$request->discount_percent_toman
        ]);

        return response()->json('coupons created successfully');

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
        //this one may cause error... must double check it again
        $active = $request->active;
        Coupon::where('id',$id)->update(array('active'=>$active));
        return response()->json('coupons updated successfully');

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
        $coupon = Coupon::find($id);
        $coupon->delete();
        return response()->json('coupon deleted successfully');
    }
}
