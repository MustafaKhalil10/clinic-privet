<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'specialization', 'email', 'phone', 'working_hours'];

    // الطبيب يمكن أن يكون له عدة مواعيد
    public function appointment()
    {
        return $this->hasMany(Appointment::class,'doctor_id' , 'id');
    }
}
