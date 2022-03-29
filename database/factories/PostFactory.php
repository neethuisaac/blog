<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $this->faker->sentence(),
            'excerpt' => $this->faker->paragraph(),
            'slug' => $this->faker->slug(),
            'body' => '<p>'.implode('</p><p>',$this->faker->paragraphs()).'</p>',
        ];
    }
}
