<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(6);

        return [
            'title' => $title,
            'slug' => Str::slug($title).'-'.fake()->unique()->numberBetween(1, 9999),
            'excerpt' => fake()->paragraph(2),
            'content' => '<p>'.implode('</p><p>', fake()->paragraphs(5)).'</p>',
            'featured_image' => null,
            'published_at' => fake()->dateTimeBetween('-2 years', 'now'),
        ];
    }

    public function draft(): static
    {
        return $this->state(['published_at' => null]);
    }
}
