<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagStoreRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'tags' => Tag::latest()->paginate(5),
        ];
        return view('tag.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagStoreRequest $request)
    {
        $request->user()->tags()->create($request->validated());
        flash()->addSuccess('Tag created successfully. <a href="'.route('tags.index').'">View all Tags</a>');
        return redirect()->route('tags.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('tag.edit', [
            'tag' => $tag
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagStoreRequest $request, Tag $tag)
    {
        $request->user()->tags()->update($request->validated());
        flash()->addSuccess('Tag updated successfully.');
        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Tag $tag)
    {
        $request->user()->tags($tag)->delete();
        flash()->addSuccess('Tag deleted successfully.');
        return redirect()->route('tags.index');
    }
}
