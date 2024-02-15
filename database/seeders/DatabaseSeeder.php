<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

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
