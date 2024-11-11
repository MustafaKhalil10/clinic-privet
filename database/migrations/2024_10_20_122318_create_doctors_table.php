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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');  //  -> (اسم الطبيب)
            $table->string('specialization');  //  (التخصص)
            $table->string('email');  //  -> (البريد الإلكتروني)
            $table->integer('phone');  //  -> (رقم الهاتف)
            $table->integer('working_hours')->nullable();  //  -> (ساعات العمل)
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
        Schema::dropIfExists('doctors');
    }
};
