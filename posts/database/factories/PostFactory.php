<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array{
        return
        [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph
        ];
    }
}
