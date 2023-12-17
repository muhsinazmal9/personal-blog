<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tags') }}
        </h2>
    </x-slot>

    <div class="py-12 container mx-auto grid lg:grid-cols-6 gap-4 lg:gap-0 max-w-7xl">
        <div class="sm:px-6 col-span-full">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    <h1 class="text-center text-xl font-semibold">Add / Create Tag</h1>
                    <form action="{{ route('tags.store') }}" method="POST">
                        @csrf
                        <div class="mx-auto md:py-0 mt-5 flex flex-col gap-5">
                            @error('name')
                                <div class="alert">{{ $message }}</div>
                            @enderror
                            <input type="text" placeholder="Enter Tag Name" class="input input-bordered w-full"
                                name="name" />
                            <div class="flex flex-col md:flex-row gap-2 md:gap-4 justify-center items-center">
                                <a href="{{ route('tags.index') }}" class="btn btn-outline md:grow">Back to all tags</a>
                                <button type="submit" class="btn btn-active btn-primary md:grow">Add Tag</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
