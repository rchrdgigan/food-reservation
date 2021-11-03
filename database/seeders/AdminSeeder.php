<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Admin',
            'email' => 'j4s_restaurant@gmail.com',
            'password' => Hash::make('q1w2e3r4t5y6'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
