<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12 container mx-auto grid lg:grid-cols-6 gap-4 lg:gap-0 max-w-7xl">
        <div class="sm:px-6 col-span-full">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    <h1 class="text-center text-xl font-semibold">You are editing ({{ $category->name }})</h1>
                    <form action="{{ route('categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mx-auto md:py-0 mt-5 flex flex-col gap-5">
                            @if ($errors->any())
                                <div class="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <input type="text" placeholder="Enter Category Name" class="input input-bordered" name="name" value="{{ old('name', $category->name) }}"/>
                            <textarea placeholder="Enter Category Description (optional)" name="description" id="description" rows="3" class="textarea textarea-bordered">{{ old('description', $category->description) }}</textarea>

                            <div class="flex flex-col md:flex-row gap-2 md:gap-4 justify-center items-center">
                                <a href="{{ route('categories.index') }}" class="btn btn-outline md:grow">Back to all categories</a>
                                <button type="submit" class="btn btn-active btn-primary md:grow">Update Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>