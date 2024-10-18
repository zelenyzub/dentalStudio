<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Admin User
        DB::table('users')->insert([
            'name' => 'admin',
            'lastName' => 'admin',
            'email' => 'admin@example.com',
            'role' => 0, // 0 is admin
            'password' => Hash::make('12345678'), // Make sure to use a strong password
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Create Regular User
        DB::table('users')->insert([
            'name' => 'user',
            'lastName' => 'user',
            'email' => 'user@example.com',
            'role' => 1, // 1 is user
            'password' => Hash::make('12345678'), // Make sure to use a strong password
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
