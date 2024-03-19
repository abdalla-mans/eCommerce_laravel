<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $all_images = 'product-8.jpg|product-11.jpg|product-9.jpg|product-7.jpg|product-7.jpg|product-10.jpg|product-11.jpg|product-12.jpg|product-6.jpg|product-7.jpg|product-11.jpg|product-12.jpg|product-4.jpg|product-2.jpg|product-3.jpg|product-1.jpg';
        $arr = explode('|', $all_images);

        return [
            'name' => $arr[array_rand($arr)],
            'imageable_id' => Product::inRandomOrder()->first()->id,
            'imageable_type' => Product::class,
        ];
    }
}
