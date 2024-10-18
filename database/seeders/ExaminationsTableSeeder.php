<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExaminationsTableSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 40; $i++) {
            DB::table('examinations')->insert([
                'patient_id' => rand(1, 10),
                'user_id' => rand(1, 2),
                'oral_hygiene' => ['Good', 'Average', 'Poor'][rand(0, 2)],
                'gum_condition' => ['Healthy', 'Inflamed', 'Receding'][rand(0, 2)],
                'other_conditions' => ['None', 'Cavities', 'Plaque buildup'][rand(0, 2)],
                'examination_date' => '2024-' . rand(1, 12) . '-' . rand(1, 28),
                'description' => 'Description for examination ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
