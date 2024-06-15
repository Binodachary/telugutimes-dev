<x-admin-layout>
    <x-slot name="title">{{ $category->id ? "Update" : "Add" }} Category - Telugu Times</x-slot>
    <div class="container">
        <x-reuse.card>
            <x-slot name="cardHeader">{{ $category->id ? "Update" : "Add" }} Category</x-slot>
            <form method="POST" enctype="multipart/form-data" action="{{ $category->id ? route('admin.category.update',$category->id) : route('admin.category.store') }}">
                @csrf @if($category->id) @method('PUT') @endif
                <div class="flex items-start space-x-3">
                    <div class="lg:w-3/4">
                        <div class="field-wrapper space-y-4">
                            <div class="lg:flex space-y-3 space-x-3 lg:space-y-0 items-center xl:h-16">
                                <div class="w-full lg:w-1/3">
                                    <x-reuse.label for="name" class="mb-1" value="Name"/>
                                    <x-reuse.input type="text" name="name" id="name" :value="old('name',$category->name)" class="w-full block"/>
                                    @error('name')
                                    <x-reuse.error :error="$message"/> @enderror
                                </div>
                                <div class="w-full lg:w-1/3">
                                    <x-reuse.label for="slug" class="mb-1" value="Slug"/>
                                    <x-reuse.input type="text" name="slug" min="0" id="slug" :value="old('slug',$category->slug)" class="w-full block"/>
                                    @error('slug')
                                    <x-reuse.error :error="$message"/> @enderror
                                </div>
                                <div class="w-full lg:w-1/3">
                                    <x-reuse.label for="parent_id" class="mb-1" value="Parent Category"/>
                                    <select title="category" class="dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="parent_id">
                                        <option value="">Select a category</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}"{{ (!empty($category->id) && ($category->parent_id == $cat->id)) ? " selected" : "" }}>{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="lg:flex space-y-3 space-x-3 lg:space-y-0 items-center xl:h-16">
                                <div class="w-full lg:w-1/3">
                                    <x-reuse.label for="title" class="mb-1" value="Title"/>
                                    <x-reuse.input type="text" name="title" id="title" :value="old('title',$category->title)" class="w-full block"/>
                                    @error('title')
                                    <x-reuse.error :error="$message"/> @enderror
                                </div>
                                <div class="w-full lg:w-1/3">
                                    <x-reuse.label for="keywords" class="mb-1" value="Key Words"/>
                                    <x-reuse.input type="text" name="keywords" id="keywords" :value="old('keywords',$category->keywords)" class="w-full block"/>
                                </div>
                                <div class="w-full lg:w-1/3">
                                    <x-reuse.label for="image" class="mb-1" value="Image"/>
                                    <x-reuse.input type="file" name="image" id="image" class="w-full block"/>
                                    @error('image')
                                    <x-reuse.error :error="$message"/> @enderror
                                </div>
                            </div>
                            <div class="w-full space-y-3">
                                <x-reuse.label for="description" class="mb-1" value="Description"/>
                                <textarea name="description" id="description" class="dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:focus:shadow-outline-gray rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full h-16">{{ old('description',$category->description) }}</textarea>
                            </div>
                            <div class="inline-flex space-x-3">
                                <button type="submit" class="bg-purple-500 text-white btn rounded-lg border-purple-700">{{ $category->id ? "Update" : "Add" }}
                                    Category
                                </button>
                                <a href="{{ route('admin.category.index') }}" class="btn rounded-lg danger inline-flex">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-1/4 hidden lg:flex">
                        @if($category->image)
                            <img src="{{ asset('storage/categories/'.$category->image) }}" class="w-full" alt="{{ $category->name }}">
                        @endif
                    </div>
                </div>
            </form>
        </x-reuse.card>
    </div>
</x-admin-layout>
