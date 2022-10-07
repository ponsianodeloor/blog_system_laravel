<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    public function definition()
    {
        $name = $this->faker->unique()->word(10);
        $slug = Str::slug($name);
        return [
            'name' => $name,
            'slug' => $slug
        ];
    }
}
