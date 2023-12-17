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
        $articles = Article::factory()->count(10)->create([
            'user_id' => User::first()->id,
            'category_id' => Category::first()->id,
        ]);


        foreach ($articles as $article) {
            $tags = Tag::inRandomOrder()->limit(5)->get();
            $article->tags()->sync($tags->pluck('id'));
        }
    }
}
