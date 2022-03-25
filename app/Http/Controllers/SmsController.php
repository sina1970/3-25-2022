<?php

namespace App\Http\Controllers;

use App\Models\SmsSetting;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $SmsSetting= SmsSetting::all()->toArray();
        dd($SmsSetting);
        return response()->json($SmsSetting);
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
        SmsSetting::create([
            'api_username' => $request->api_username,
            'api_password' => $request->api_password,
            'line_number' => $request->line_number,
            'shared_line' => $request->shared_line,
            'normal_text_after_submit' => $request->normal_text_after_submit,
            'normal_text_after_product' =>$request->normal_text_after_product,
            'normal_text_after_payment' =>$request->normal_text_after_payment,
            'normal_text_send_username_and_password' => $request->normal_text_send_username_and_password,
            'shared_text_after_submit' => $request->shared_text_after_submit,
            'shared_tempId_after_submit' => $request->shared_tempId_after_submit,
            'shared_text_after_product' => $request->shared_text_after_product,
            'shared_tempId_after_product' => $request->shared_tempId_after_product,
            'shared_text_after_payment'=>$request->shared_text_after_payment,
            'shared_tempId_after_payment' => $request->shared_tempId_after_payment,
            'shared_text_send_username_and_password' => $request->shared_text_send_username_and_password,
            'shared_tempId_send_username_and_password' => $request->shared_tempId_send_username_and_password

        ]);
        return response()->json('sms setting added successfully');
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
        SmsSetting::where('id',$id)->update([
            'api_username' => $request->api_username,
            'api_password' => $request->api_password,
            'line_number' => $request->line_number,
            'shared_line' => $request->shared_line,
            'normal_text_after_submit' => $request->normal_text_after_submit,
            'normal_text_after_product' =>$request->normal_text_after_product,
            'normal_text_after_payment' =>$request->normal_text_after_payment,
            'normal_text_send_username_and_password' => $request->normal_text_send_username_and_password,
            'shared_text_after_submit' => $request->shared_text_after_submit,
            'shared_tempId_after_submit' => $request->shared_tempId_after_submit,
            'shared_text_after_product' => $request->shared_text_after_product,
            'shared_tempId_after_product' => $request->shared_tempId_after_product,
            'shared_text_after_payment'=>$request->shared_text_after_payment,
            'shared_tempId_after_payment' => $request->shared_tempId_after_payment,
            'shared_text_send_username_and_password' => $request->shared_text_send_username_and_password,
            'shared_tempId_send_username_and_password' => $request->shared_tempId_send_username_and_password

        ]);
        return response()->json('sms setting updated successfully');

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
        $sms=SmsSetting::find($id);
        $sms->delete();
        return response()->json("sms setting deleted successfully");
    }


}
