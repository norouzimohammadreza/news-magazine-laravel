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

        $faker = fake('fa_IR');



        return [
            'title' => $faker->word(),
            'summary' => $faker->paragraph(rand(1, 2), true),
            'body' => $faker->paragraph(rand(5, 7), true),
            'image' => $faker->unique()->sentence(),
            'published_at' => now(),
            'category_id' => function () {
                return Category::factory()->create()->id;
            },
            'user_id' => function () {
                return User::factory()->create()->id;
            },
        ];
    }
}
