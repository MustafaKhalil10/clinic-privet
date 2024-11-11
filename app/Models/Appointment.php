<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [ 'doktor_id','patient_id', 'appointment_date', 'appointment_time', 'status'];


   // "كل موعد له وصفة طبية واحدة "أو لا يوجد وصفة
    public function prescription()
    {
        return $this->hasOne(Prescription::class);
    }

    // كل موعد له مبلغ مالي واحد
    public function Payment()
    {
        return $this->hasOne(Payment::class);
    }

   // كل المواعيد تنتمي للطبيب
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    // كل المواعيد تنتمي للمرضى
    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id','id');
    }
}
