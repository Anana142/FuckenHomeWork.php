<?php

namespace Database\Factories;

use \Illuminate\Support\Str;
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
        $title = fake()->title();
        $slug = Str::slug($title, '_');
        return [
            'title'=>$title,
            'slug' => $slug,
            'description' =>fake()->realTextBetween(200, 500),
            'image'=>fake()->imageUrl(640, 420),
            'content'=>fake()->realTextBetween(160, 200),
            'active'=>1,
            'category_id' => rand(1, 10)
        ];
    }
}
