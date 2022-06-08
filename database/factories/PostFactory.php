<?php

declare(strict_types=1);

namespace Database\Factories;

use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $index = random_int(1000, 9999);

        return [
            'title' => sprintf('Post %d', $index),
            'author' => 'user',
            'image_url' => '/images/example.jpg',
            'content' => Lorem::paragraph(random_int(40, 75)),
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ];
    }
}
