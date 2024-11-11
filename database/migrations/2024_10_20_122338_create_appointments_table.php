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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->constrained('doctors')->cascadeOnDelete();  // ->  (الطبيب - علاقة بجدول الأطباء_di)
            $table->foreignId('patient_id')->constrained('patients')->cascadeOnDelete();  // ->  (المريض - علاقة بجدول المرضى_di)
            $table->date('appointment_date')->nullable();  //  ->  (تاريخ الموعد)
            $table->time('appointment_time')->nullable();  // ->  (وقت الموعد)
            $table->enum('review_type',['review','first_time'])->default('first_time');  // ->  (نوع المراجعة : اول مرة , مراجعة)
            $table->enum('status', ['certain', 'canceled', 'panding'])->default('certain');  // ->  (حالة الموعد: مؤكد ، ملغى ، قيد الانتظار)
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
        Schema::dropIfExists('appointments');
    }
};
