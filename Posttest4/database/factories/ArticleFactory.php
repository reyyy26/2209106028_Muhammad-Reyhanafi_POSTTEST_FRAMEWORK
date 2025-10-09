<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Article>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition(): array
    {
        $title = $this->faker->unique()->sentence(6);
        $paragraphs = $this->faker->paragraphs(mt_rand(5, 8));

        return [
            'title' => Str::title($title),
            'slug' => Str::slug($title) . '-' . Str::lower(Str::random(4)),
            'excerpt' => $this->faker->sentence(18),
            'content' => collect($paragraphs)->map(fn ($p) => $p)->join("\n\n"),
            'author' => $this->faker->name(),
            'published_at' => $this->faker->dateTimeBetween('-2 months', 'now'),
            'category_id' => Category::factory(),
        ];
    }
}
