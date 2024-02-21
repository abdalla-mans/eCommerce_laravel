<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        // for ($i = 0; $i < 5; $i++) {
        //     DB::table('users')->insert([
        //         'name' => 'abdalla mansour',
        //         'email' => 'bode@gmail.com' . $i,
        //         'password' => 'abdalla mansour 2001',
        //         'remember_token' => $i == 3 ? true : false,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now(),
        //     ]);
        // }

        \App\Models\User::factory(100)->create();
    }
}
