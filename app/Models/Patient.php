<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'date_of_birth', 'gender', 'address'];

    public static function rules()
    {
        return [
            'name' => 'required|min:3|max:40',
            'email' => 'required|min:5|max:200',
            // 'phone' => 'nullable',
            'date_of_birth' => ['required', 'date', 'before:today'],
            'address' => 'required|min:5|max:200',
            'gender' => 'in:male,faminine',
        ];
    }


    // المريض يمكن أن يكون له عدة مواعيد
    public function appointment()
    {
        return $this->hasMany(Appointment::class,'patient_id','id');
    }
}
