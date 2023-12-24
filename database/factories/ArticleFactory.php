<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'content' => fake()->paragraph(10),
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ];
    }
}
