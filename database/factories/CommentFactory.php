<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\User;

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
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'website' => $this->faker->domainName(),
            'comment' => $this->faker->text(),
            'post_id' => rand(1,Post::count()),
            'user_id' => rand(1,User::count())
        ];
    }
}
