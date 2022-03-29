<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Post;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create(),
            'post_id' => Post::factory()->create(),
            'body' => $this->faker->paragraph(),
        ];
    }
}
