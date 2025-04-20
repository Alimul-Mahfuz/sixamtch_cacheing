<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->words(3, true);

        return [
            'name' => $name,
            'slug' => Str::slug($name) . '-' . Str::random(5),
            'image' => $this->faker->imageUrl(640, 480, 'products', true),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 100, 10000),
            'discount' => $this->faker->randomFloat(2, 0, 500),
            'stock_count' => $this->faker->numberBetween(1, 100),
            'category_id' => rand(1, 20), // Make sure categories are already seeded
        ];
    }
}
