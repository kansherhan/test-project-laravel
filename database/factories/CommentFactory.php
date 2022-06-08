<?php

declare(strict_types=1);

namespace Database\Factories;

use Faker\Provider\Lorem;
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
            'author' => 'user',
            'content' => Lorem::paragraph(random_int(3, 7)),
            'image_url' => null,
            'post_id' => random_int(1, 3),
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ];
    }
}
