<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('api_username');
            $table->string('api_password');
            $table->string('line_number');
            $table->string('api_url');
            $table->string('api_url_users');
            $table->boolean('shared_line');//0 ->inactive, 1-> active
            $table->string('normal_text_after_submit')->nullable();//after entering the name, username, mobile
            $table->string('normal_text_after_product')->nullable();//after choosing the product (sending the invoice and payment link)
            $table->string('normal_text_after_payment')->nullable();//informing user about payment
            $table->string('normal_text_send_username_and_password')->nullable();//if the payment was success
            /////////////////////////
            $table->string('shared_text_after_submit')->nullable();//after entering the name, username, mobile
            $table->string('shared_tempId_after_submit')->nullable();
            $table->string('shared_text_after_product')->nullable();//after choosing the product (sending the invoice and payment link)
            $table->string('shared_tempId_after_product')->nullable();
            $table->string('shared_text_after_payment')->nullable();//informing user about payment
            $table->string('shared_tempId_after_payment')->nullable();
            $table->string('shared_text_send_username_and_password')->nullable();//if the payment was success
            $table->string('shared_tempId_send_username_and_password')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sms_settings');
    }
};
