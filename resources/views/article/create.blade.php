<x-app-layout>

    @push("head_stack")
        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
        <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>


    <div class="py-12 container mx-auto grid lg:grid-cols-6 gap-4 lg:gap-0 max-w-7xl">
        <div class="sm:px-6 col-span-full">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    <h1 class="text-center text-xl font-semibold">Add / Create Article</h1>
                    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
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

                            <input type="text" placeholder="Enter Article Title" class="input input-bordered" name="title" value="{{ old('title') }}" />

                            <div class="min-w-full prose">
                                <div class="label">
                                    <span class="label-text">Article Content</span>
                                </div>
                                <textarea placeholder="Write Article Content" name="content" id="content" rows="5" class="ck__editor">{{ old('content') }}</textarea>
                            </div>

                            <label class="form-control w-full">
                                <div class="label">
                                    <span class="label-text">Thumbnail / featured image</span>
                                </div>
                                <input type="file" name="thumbnail_image" class="file-input file-input-bordered" accept="image/*"/>
                            </label>

                            <select name="category_id" id="select-beast" class="select__single">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option @selected(old('category_id') == $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                            <select name="tags[]" multiple="multiple" class="select__multiple">
                                <option value="">Select or create tags</option>
                                @foreach ($tags as $tag)
                                    <option @selected(collect(old('tags'))->contains($tag->id)) value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>

                            <div class="flex flex-col md:flex-row gap-2 md:gap-4 justify-center items-center">
                                <a href="{{ route('articles.index') }}" class="btn btn-outline md:grow">Back to all articles</a>
                                <button type="submit" class="btn btn-active btn-primary md:grow">Add Article</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    @push('body_stack')
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
        <script>
            $(document).ready(function() {
                new TomSelect(".select__single",{
                    // create: true,
                    // plugins: ['dropdown_input'],
                    sortField: {
                        // field: "text",
                        direction: "asc"
                    }
                });

                new TomSelect(".select__multiple",{
                    create: true,
                    plugins: ['remove_button'],

                    onItemAdd:function(){
                        this.setTextboxValue('');
                        this.refreshOptions();
                    },

                    sortField: {
                        // field: "text",
                        direction: "asc"
                    }
                });

                // Initialize CKEditor
                ClassicEditor
                .create(document.querySelector( '.ck__editor') )
                .catch(error => {
                    console.error( error );
                });
            });
        </script>
    @endpush

</x-app-layout>