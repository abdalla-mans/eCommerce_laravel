<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $arr = [
            'product-8.jpg|product-11.jpg|product-9.jpg|product-7.jpg',
            'product-7.jpg|product-10.jpg|product-11.jpg|product-12.jpg',
            'product-6.jpg|product-7.jpg|product-11.jpg|product-12.jpg',
            'product-4.jpg|product-2.jpg|product-3.jpg|product-1.jpg',
        ];

        return [
            'title' => $this->faker->text(20),
            'description' => $this->faker->realText(),
            'salary' => fake()->numberBetween(800, 50000),
            'image' => $arr[rand(0, 3)],
            'category_id' => DB::table('categories')->inRandomOrder()->first()->id,
        ];
    }
}
