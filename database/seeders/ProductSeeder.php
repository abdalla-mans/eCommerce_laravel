<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // for ($i = 0; $i < 10; $i++) {
        //     DB::table('products')->insert([
        //         'title' => 'i phone pro max',
        //         'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam quidem ratione, debitis, corrupti dignissimos consectetur dolorem libero beatae natus illo suscipit quisquam hic modi, obcaecati id facilis totam voluptas ipsum.',
        //         'salary' => '5000',
        //         'image' => 'my_image.jpg|product-2.jpg|product-4.jpg',
        //         'category_id' => 1,
        //     ]);
        // }


        \App\Models\Product::factory(1000)->create();
    }
}
