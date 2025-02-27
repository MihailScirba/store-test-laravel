<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
        $word = fake()->word();
        return [
            'image' => 'storage/images/uploads/' . $word,
            'name' => $word,
            'description' => fake()->paragraph(),
            'price' => random_int(100, 5000),
            'stock' => random_int(0, 5)
        ];
    }
}
