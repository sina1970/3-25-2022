<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoices';
    protected $primaryKey='id';
//    protected $fillable = ['']


    public function customerModel(){
        return $this->belongsTo(Customer::class);
    }

//    public function customerModel2(){
//        return $this->hasOne(Customer::class);
//    }
    public function couponModelInvoice(){
        return $this->belongsTo(Coupon::class);
    }
}
