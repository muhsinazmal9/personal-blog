<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <a href="{{ route('categories.create') }}" class="btn btn-primary">Create a category</a>
                    <div class="overflow-x-auto my-7">
                        <table class="table table-lg table-pin-rows table-pin-cols">
                            <!-- head -->
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Category Name</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $tag)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $tag->name }}</td>
                                        <td>{!! nl2br($tag->description) ?: '<span class="text-warning italic">null</span>' !!}</td>
                                        <td>{{ $tag->created_at->diffForHumans() }}</td>
                                        <td class="flex flex-col md:flex-row gap-2">
                                            <a href="{{ route('categories.edit', $tag->id) }}" class="btn btn-link link-info">Edit</a>

                                            <form action="{{ route('categories.destroy', $tag->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-link link-error">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No categories found <a href="{{ route('categories.create') }}" class="btn btn-link link-primary">Create one</a></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>