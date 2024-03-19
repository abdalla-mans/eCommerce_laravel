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

        return [
            'title' => $this->faker->text(20),
            'description' => $this->faker->realText(),
            'salary' => fake()->numberBetween(800, 50000),
            'category_id' => DB::table('categories')->inRandomOrder()->first()->id,
        ];
    }
}
