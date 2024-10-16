<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PatientsTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('patients')->insert([
                'first_name' => 'Patient' . $i,
                'last_name' => 'LastName' . $i,
                'date_of_birth' => '198' . rand(0, 9) . '-0' . rand(1, 9) . '-' . rand(10, 28),
                'address' => rand(100, 999) . ' Street Name',
                'tel' => '+12345678' . rand(0, 9),
                'email' => 'patient' . $i . '@example.com',
                'jmbg' => Str::random(13),
                'passportNum' => Str::random(9),
                'gender' => rand(0, 1),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
