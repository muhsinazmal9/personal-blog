<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         ** NOTE: Copied from chatgpt , didn't understand state function
         */
        $articles = Article::factory()->count(10)->state(function (array $attributes) {
            return [
                'user_id' => User::first()->id,
                'category_id' => Category::inRandomOrder()->first()->id,
            ];
        })->create();

        foreach ($articles as $article) {
            $tags = Tag::inRandomOrder()->limit(5)->get();
            $article->tags()->sync($tags->pluck('id'));
        }
    }
}
