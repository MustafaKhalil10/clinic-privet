<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $fillable = ['appointment_id', 'doctor_notes', 'medications'];


    // كل موعد له وصفة طبية واحدة (أو لا يوجد وصفة)
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
