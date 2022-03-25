<?php
namespace App\Helpers;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\Coupon;
use App\Models\Product;
use http\Env\Response;
use Illuminate\Support\Facades\DB;

class ShortCodeHelper{
    public static function customerShortCodes($id , $text){
        $customer = DB::table('customers')
            ->find($id);
//        dd($customer);
        if ($customer != null){
            $invoice = DB::table('invoices')->select('*')
                ->where('customer_id',$id)
                ->first();
            $shortcodes = array(
                "{username}" => $customer->username,
                "{password}" => $customer->password,
                "{firstname}" => $customer->fName,
                "{lastname}" => $customer->lName,
                "{phone}" => $customer->mobile_number,

            );
          return self::replaceShortcodes($shortcodes,$text);
        }else{
            return $text;
        }

    }
    public static function invoiceShortcodes($id,$text){
        $invoice = DB::table('invoices')->select('*')
            ->where('customer_id',$id)
            ->first();
        if($invoice!=null) {
                $product = DB::table('products')->select('product_name')
                    ->where('id',$invoice->product_id)
                    ->first();

//        dd($product);
            $shortcodes = array(
                "{price}" => $invoice->pay_price,
                "{panel}" => $invoice->panel,
                "{invoice_url}" => request()->getHost() . "/admin/" . $invoice->invoice_code,
                "{product_name}" => $product->product_name
            );

           return self::replaceShortcodes($shortcodes,$text);
        }
        else{
            return $text;
        }
    }


    public static function replaceShortcodes($shortcodes,$text){
        $find = array_keys($shortcodes);
        $replace = array_values($shortcodes);

        $text = str_replace($find, $replace, $text);
//        dd($text);
        return $text;
    }
}
