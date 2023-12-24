<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <a href="{{ route('articles.create') }}" class="btn btn-primary">Create an article</a>
                    <div class="overflow-x-auto my-7">
                        <table class="table table-lg table-pin-rows table-pin-cols">
                            <!-- head -->
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Tags</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($articles as $article)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td class="leading-relaxed max-w-xs">{{ $article->title }}
                                            <br>
                                            <div class="badge bacge-outline">Category: {{ $article->category->name ?? 'uncategorized' }}</div>
                                        </td>

                                        {{-- content with thumbnail image --}}
                                        <td class=" max-w-sm">
                                            @if ($article->thumbnail_image != null || $article->thumbnail_image != '')
                                                <img src="{{ asset($article->thumbnail_image) }}" alt="">
                                            @endif
                                            {!! Str::words($article->content, 5 , '... <a href="'.route('articles.show', $article->id).'" class="link link-primary">Read more</a>') !!}
                                        </td>

                                        <td class="max-w-[100px]">
                                            @foreach ($article->tags as $tag)
                                            <div class="badge badge-outline badge-{{ ['primary', 'secondary','accent', 'success'][array_rand(['primary', 'secondary','accent', 'success'])] }}">{{ $tag->name }}</div>
                                            @endforeach
                                        </td>

                                        {{-- created --}}
                                        <td class="leading-relaxed">
                                            <div class="badge bacge-outline">Created at: {{ $article->created_at->diffForHumans() }}</div>
                                            <br>
                                            <div class="badge bacge-outline">Created by: {{ $article->user->name }}</div>
                                        </td>

                                        {{-- actions --}}
                                        <td class="max-w-[100px]">
                                            <a href="{{ route('articles.show', $article->id) }}" class="btn btn-link link-primary">View</a>
                                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-link link-info">Edit</a>

                                            <form action="{{ route('articles.destroy', $article->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-link link-error">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No articles found <a href="{{ route('articles.create') }}" class="btn btn-link link-primary">Create one</a></td>
                                    </tr>
                                    @endforelse
                            </tbody>
                        </table>
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>