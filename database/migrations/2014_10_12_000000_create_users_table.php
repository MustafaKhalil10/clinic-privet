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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

            //     $table->id();
            // $table->string('name');  // ->  اسم المستخدم أو الطبيب
            // $table->string('email')->unique();  // ->  البريد الإلكتروني (فريد)
            // $table->string('password');  // ->  كلمة المرور (تُخزن مشفرة)
            // $table->string('phone')->nullable();  // ->  رقم الهاتف (اختياري)
            // $table->enum('role',['admin','doktor'])->default('admin'); // ->  دور المستخدم (مدير، طبيب)
            // $table->text('address')->nullable(); // ->  العنوان (اختياري)
            // $table->string('profile_picture')->nullable(); // ->  صورة الملف الشخصي (اختياري)
            // $table->timestamps();

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
