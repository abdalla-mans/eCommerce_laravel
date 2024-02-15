<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => 'abdalla mansour',
                'email' => 'abdalla@gmail.com' . $i,
                'password' => 'abdalla mansour 2001',
                'remember_token' => $i == 3 ? true : false,
            ]);
        }
    }
}
