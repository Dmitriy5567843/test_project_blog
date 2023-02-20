<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        $category = Category::inRandomOrder()->first();

        return [
            'category_id' => $category ? $category->id : Category::factory()->create()->id,
            'user_id' => $user ? $user->id : User::factory()->create()->id,
            'title' => $this->faker->title,
            'content' => $this->faker->realText,
        ];
    }
}
