<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
class PatientsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('patients')->insert([
                'user_id' => rand(1, 2),
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $faker->date($format = 'Y-m-d', $max = '2000-01-01'),
                'address' => $faker->buildingNumber . ' ' . $faker->streetName,
                'tel' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'jmbg' => Str::random(13),
                'passportNum' => Str::random(9),
                'gender' => rand(0, 1), // You can also use $faker->randomElement(['male', 'female'])
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
