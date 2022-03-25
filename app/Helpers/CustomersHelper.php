<?php

namespace App\Helpers;
use App\Helpers\jdf;
use App\Models\Customer;
use App\Models\Invoice;

use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;


class CustomersHelper{

    public static function getCustomersCount(){
        return Customer::all()->count();

    }

    public static function getFullPaymentInvoice(){
        $id = 'pay_price';
        return Invoice::all()->sum($id);

    }

    public static function getDiscountNumbers(){
        return Invoice::all()->where('coupon_id','!=',Null)->count();
    }

    public static function getNoDiscountNumbers(){
        return Invoice::all()->where('coupon_id','=',Null)->count();
    }

    public static function fullPaymentInCurrentMonth(){
        $current_date = date("Y-m-d");
        $gdate=jdf::convert_gerogian_to_array($current_date);
        $first = $gdate["begin"][0]."-".$gdate["begin"][1]."-".$gdate["begin"][2];
        $last = $gdate["end"][0]."-".$gdate["end"][1]."-".$gdate["end"][2];
        return DB::select("SELECT sum(pay_price) from migration.invoices where payment_time BETWEEN '$first' AND '$last'");
    }
}
