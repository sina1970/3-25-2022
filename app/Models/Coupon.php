<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'coupons';
    protected $primaryKey = 'id';
    protected $fillable = ['coupon_name','active','total_amount','used_amount','discount_percent','discount_percent_toman'];

    public function invoiceModelCoupon(){
        return $this->hasMany(Invoice::class);
    }
}
