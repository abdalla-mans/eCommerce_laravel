<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $arr = ['phones', 'laptops', 'watches', 'shoes', 'electronics', 'clothes'];

        foreach ($arr as $val) {
            DB::table('categories')->insert([
                'name' => $val,
            ]);
        }
    }
}
