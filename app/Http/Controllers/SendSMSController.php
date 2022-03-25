<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Helpers\ShortCodeHelper;
use Illuminate\Support\Facades\DB;
use App\Helpers\TestHelper;
use App\Helpers\Soap;

class SendSMSController extends Controller
{
    //

    private $text;
    public function ChooseTypeOfSend(){

    }
    public function sendbulk(Request $request){
//         $this->text = "this is a text for {username} and {password} which we can have {firstname} and {lastname} in texts";
//        $id = 5;
        $this->text = $request->text;
        $receiver = $request->receiver;
        $phone = $request->phone;


        if($receiver == "all"){

            Customer::chunk(100,function ($customerss){
                $arr= array();

                foreach ($customerss as $users){
                    array_push($arr,$users->mobile_number);
                }
                Soap::SendBulkSMS($arr,$this->text);
            });

        }elseif($receiver == "custom") {
            //
                Soap::SendBulkSMS($phone,$this->text);


        }
        else{
            return \response()->json("no match");
        }

    }

    public function send_for_custom_numbers(){

    }


}
