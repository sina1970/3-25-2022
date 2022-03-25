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
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fName');
            $table->string('lName');
            $table->string('username');
            $table->string('password');
            $table->string('mobile_number');
            $table->boolean('is_registered');
            $table->dateTime('register_time')->nullable();
            $table->bigInteger('introduce_code');
            $table->integer('used_intro_code_times')->nullable();
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
        Schema::dropIfExists('customers');
    }
};
