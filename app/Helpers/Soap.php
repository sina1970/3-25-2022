<?php
namespace App\Helpers;
use App\Models\SmsSetting;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\This;
use App\Helpers\ShortCodeHelper;


class Soap{

    public static function GetCreditAdmin(){
        $data = self::getAdminInfoForSendSMS();
        return self::getCredit($data->api_username,$data->api_password,$data->api_url);
    }
    public static function getCredit($username,$password,$url){
        ini_set("soap.wsdl_cache_enabled",0);
        $sms = new \SoapClient($url,array("encoding"=>"UTF-8"));
        $data = array("username"=>$username,"password"=>$password);
        return $sms->GetCredit($data)->GetCreditResult;

    }
    public static function SendBulkSMS($phones,$text){
        $info=self::getAdminInfoForSendSMS();
        if(!is_array($phones)) {
            $phones = explode(",", $phones);
        }
        try {
            ini_set("soap.wsdl_cache_enabled",0);
            $sms = new \SoapClient($info->api_url,array("encoding"=>"UTF-8"));
            $data = array(
                "username" => $info->api_username,
                "password" =>$info->api_password,
                "to" => $phones,
                "from" => $info->line_number,
                "text" => $text,
                "isflash" => false
            );
            $sms->SendSimpleSMS($data)->SendSimpleSMSResult;
        }catch (\Exception $e){

        }

    }
    public static function getAdminInfoForSendSMS(){
        $user_data = DB::table('sms_settings')
            ->select('*')
            ->first();
        return $user_data;
    }

    public static function SendDedicated($text,$phone){
        $info=self::getAdminInfoForSendSMS();
        if(!is_array($phone)) {
            $phone = explode(",", $phone);
        }
        try {
            ini_set("soap.wsdl_cache_enabled",0);
            $sms = new \SoapClient($info->api_url,array("encoding"=>"UTF-8"));
            $data = array(
                "username" => $info->api_username,
                "password" =>$info->api_password,
                "to" => $phone,
                "from" => $info->line_number,
                "text" => $text,
                "isflash" => false
            );
            $sms->SendSimpleSMS($data)->SendSimpleSMSResult;
        }catch (\Exception $e){
            //
        }
    }

    public static function SendShared($bodyId,$text,$phone){
        $info=self::getAdminInfoForSendSMS();

        try {
            ini_set("soap.wsdl_cache_enabled",0);
            $sms = new \SoapClient($info->api_url,array("encoding"=>"UTF-8"));
            $data = array(
                "username"=>$info->api_username,
                "password"=>$info->api_password,
                "text"=>$text,
                "to"=>$phone,
                "bodyId"=>$bodyId
            );
            $send_Result = $sms->SendByBaseNumber2($data)->SendByBaseNumber2Result;

            }catch (\Exception $e){

        }
    }

}
