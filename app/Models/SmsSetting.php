<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsSetting extends Model
{
    use HasFactory;
    protected $table = 'sms_settings';
    protected $primaryKey = 'id';

    protected $fillable = ['api_username','api_password','line_number','shared_line',
        'normal_text_after_submit','normal_text_after_product','normal_text_after_payment',
        'normal_text_send_username_and_password','shared_text_after_submit',
        'shared_tempId_after_submit','shared_text_after_product','shared_tempId_after_product',
        'shared_text_after_payment','shared_tempId_after_payment','shared_text_send_username_and_password',
        'shared_tempId_send_username_and_password'
        ];
}
