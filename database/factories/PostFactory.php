<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    public function definition()
    {
        $name = $this->faker->unique()->sentence();
        $slug = Str::slug($name);

        return [
            'name' => $name,
            'slug' => $slug,
            'extract' => $this->faker->text(150),
            'body' => $this->faker->text(191),
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->random()->id
        ];
    }
}
