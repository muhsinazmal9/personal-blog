<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleStoreRequest;
use App\Traits\ImageSaveTrait;

class ArticleController extends Controller
{
    use ImageSaveTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'articles' => Article::latest()->paginate(5),
        ];

        return view('article.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ];
        return view('article.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleStoreRequest $request)
    {
        if($request->hasFile('thumbnail_image')) {
            $thumbnail_image_path = $this->saveImage('thumbnail_image', $request->file('thumbnail_image'), 1200, 630);
        }

        $article = $request->user()->articles()->create(array_merge($request->validated(), [
            'thumbnail_image' => $thumbnail_image_path ?? null,
        ]));

        $article->tags()->sync($request['tags']);

        flash()->addSuccess('Article Created Successfully');
        return redirect()->route('articles.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', [
            'article' => $article,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article.edit', [
            'article' => $article,
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleStoreRequest $request, Article $article)
    {
        if($request->hasFile('thumbnail_image')) {
            $thumbnail_image_path = '';
            /**
             * TODO: enable after fixing below error otherwise image is gonna delete for no reason
             */
            // $this->updateImage($article->thumbnail_image, 'thumbnail_image', $request->file('thumbnail_image'), 1200, 630);
        }

        $updated_article = $request->user()->articles()->update(array_merge($request->validated(), [
            'thumbnail_image' => $thumbnail_image_path ?? null,
        ]));

        $updated_article->tags()->sync($request['tags']);

        flash()->addSuccess('Article Updated Successfully');
        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $this->deleteImage($article->thumbnail_image);
        $article->tags()->detach();
        $article->delete();

        flash()->addSuccess('Article Deleted Successfully');
        return redirect()->route('articles.index');
    }
}
