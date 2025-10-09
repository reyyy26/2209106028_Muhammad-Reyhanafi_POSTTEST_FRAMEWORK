<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->sentence(2);

        return [
            'name' => Str::title($name),
            'slug' => Str::slug($name) . '-' . Str::lower(Str::random(3)),
        ];
    }
}
