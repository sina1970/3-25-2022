<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Helpers\Soap;
use App\Helpers\CustomersHelper;

class HomeController extends Controller
{
    //
    public function index(){

        $adminCredit = Soap::GetCreditAdmin();
        $customerCount = CustomersHelper::getCustomersCount();
        $invoiceFullPayment = CustomersHelper::getFullPaymentInvoice();
        $withDiscountInvoiceNumbers = CustomersHelper::getDiscountNumbers();
        $NoDiscountInvoiceNumbers = CustomersHelper::getNoDiscountNumbers();
        $fullPaymentCurrentMonth = CustomersHelper::fullPaymentInCurrentMonth();
        $data = array(
            "adminCredit" => $adminCredit,
            "customerCount" => $customerCount,
            "invoiceFullPayment" => $invoiceFullPayment,
            "withDiscountInvoiceNumbers" => $withDiscountInvoiceNumbers,
            "NoDiscountInvoiceNumbers" => $NoDiscountInvoiceNumbers,
            "fullPaymentCurrentMonth" => $fullPaymentCurrentMonth
        );
        return response()->json($data);
    }


}
