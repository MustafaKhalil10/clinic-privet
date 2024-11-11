<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoktorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Doctor::create([
            'name'=>'mustafa khalil',
            'specialization'=>'Engineer',
            'email'=>'mustafa@gmail.com',
            'phone'=>'963',
        ]);
    }
}
