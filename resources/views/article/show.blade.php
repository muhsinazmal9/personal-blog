<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Article</h2>
    </x-slot>

    <div class="py-12 container mx-auto grid lg:grid-cols-6 gap-4 lg:gap-0 max-w-7xl">
        <div class="sm:px-6 col-span-full">
            <div class="card bg-base-100 shadow-xl">
                @if ($article->thumbnail_image)
                    <figure>
                        <img src="{{ asset($article->thumbnail_image) }}" alt="thumbnail_image" />
                    </figure>
                @endif

                <div class="card-body">
                    <h2 class="card-title">{{ $article->title }}</h2>
                    <div class="badge badge-outline">Category: {{ $article->category->name }}</div>
                    <div class="prose lg:prose-lg">
                        {!! nl2br(__($article->content)) !!}
                    </div>
                    <div class="card-actions justify-end">
                        @foreach ($article['tags'] as $tag)
                            <div class="badge badge-outline badge-primary">{{ $tag->name }}</div>
                        @endforeach
                        {{-- <button class="btn btn-primary">Buy Now</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>