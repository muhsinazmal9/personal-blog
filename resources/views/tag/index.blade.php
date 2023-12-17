<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tags') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <a href="{{ route('tags.create') }}" class="btn btn-primary">Create a tag</a>
                    <div class="overflow-x-auto my-7">
                        <table class="table table-lg table-pin-rows table-pin-cols">
                            <!-- head -->
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Tag Name</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tags as $tag)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $tag->name }}</td>
                                        <td>{{ $tag->created_at->diffForHumans() }}</td>
                                        <td class="flex flex-col md:flex-row gap-2">
                                            <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-link link-info">Edit</a>

                                            <form action="{{ route('tags.destroy', $tag->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-link link-error">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No tags found <a href="{{ route('tags.create') }}" class="btn btn-link link-primary">Create one</a></td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        {{ $tags->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>