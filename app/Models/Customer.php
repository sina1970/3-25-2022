<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';

    protected $primaryKey = 'id';

    protected $fillable = ['fName','lName','mobile_number','username','password','is_registered','register_time','introduce_code','used_intro_code_times'];

    public function invoiceModel(){
        return $this->hasMany(Invoice::class);
    }
}
