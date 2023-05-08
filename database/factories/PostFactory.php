<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;

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
        return [
            //
            'user_id'=>User::factory(),//this will create in the users table too
            'category_id'=>Category::factory(),//this will create in the categories table too
            'title'=>$this->faker->sentence(),
            'slug'=>$this->faker->slug(),
            'excerpt'=>'<p>'.implode('</p><p>', $this->faker->paragraphs(2)). '</p>',//meaning to have 2 paragraphs, we added the p and implode so that it will not return as array, but to String
            'body'=>'<p>'.implode('</p><p>', $this->faker->paragraphs(6)). '</p>'
        ];
    }
}