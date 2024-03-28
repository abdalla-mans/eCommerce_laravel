<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call(CategorySeeder::class);
        // $this->call(ProductSeeder::class);
        // $this->call(UserSeeder::class);
        // \App\Models\Category::factory(50)->create();
        $categories = ['phones', 'laptops', 'watches', 'shoes', 'electronics', 'clothes'];
        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
        
        $this->call(LaratrustSeeder::class);
        
        \App\Models\User::create([
            'name' => 'abdalla mansour',
            'email' => 'eng.abdalla.mansour@gmail.com',
            'phone' => '01019113472',
            // 'type' => 'super_admin',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::create([
            'name' => 'abdalla mansour',
            'email' => 'a.mansour.code@gmail.com',
            'phone' => '123412345634',
            // 'type' => 'admin',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::create([
            'name' => 'abdalla mansour',
            'email' => 'bodemansour8@gmail.com',
            'phone' => '23412341234',
            // 'type' => 'user',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        \App\Models\Product::factory(200)->create();
        \App\Models\User::factory(100)->create();
        \App\Models\Image::factory(500)->create();

    }
}
