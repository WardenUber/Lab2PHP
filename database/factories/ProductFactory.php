<?php

namespace Database\Factories;
use App\Models\Category;
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
        return [
            'name' => $this->faker->unique()->text(20),
            'slug' => $this->faker->unique()->slug(2),
            'description' => $this->faker->text(100),
            'cost' => $this->faker->numberBetween(1, 10000),
            'photo' => $this->faker->imageUrl(),
            'count' => $this->faker->numberBetween(0, 10),
            'category_id' => Category::factory(),
        ];

    }
}
