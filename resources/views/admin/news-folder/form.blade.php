<x-admin-layout>
    <x-slot name="title">{{ $news_folder->id ? "Update" : "Add" }} News Folder - Telugu Times</x-slot>
    <div class="container">
        <x-reuse.card>
            <x-slot name="cardHeader">{{ $news_folder->id ? "Update" : "Add" }} News Folder</x-slot>
            <form method="POST" enctype="multipart/form-data" action="{{ $news_folder->id ? route('admin.news-folder.update',$news_folder->id) : route('admin.news-folder.store') }}">
                @csrf @if($news_folder->id) @method('PUT') @endif
                <div class="flex space-x-3 items-start">
                    <div class="lg:w-3/4">
                        <div class="field-wrapper space-y-4">
                            <div class="lg:flex space-y-3 space-x-3 lg:space-y-0 items-center xl:h-16">
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.label for="name" class="mb-1" value="Name"/>
                                    <x-reuse.input type="text" name="name" id="name" :value="old('name',$news_folder->name)" class="w-full block bg-gray-300"/>
                                    @error('name')
                                    <x-reuse.error :error="$message"/> @enderror
                                </div>
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.label for="slug" class="mb-1" value="Alias or Slug (Only english)"/>
                                    <x-reuse.input type="text" name="slug" id="slug" :value="old('slug',$news_folder->slug)" class="w-full block bg-gray-300"/>
                                    @error('slug')
                                    <x-reuse.error :error="$message"/> @enderror
                                </div>
                            </div>
                            <div class="lg:flex space-y-3 space-x-3 lg:space-y-0 items-center xl:h-16">
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.label class="mb-1" for="title_language" value="Title Language"/>
                                    <div class="dark:text-gray-400 text-gray-700 inline-flex space-x-3">
                                        <label for="telugu" class="items-center inline-flex space-x-1">
                                            <input type="radio" name="title_language" value="telugu" id="telugu"{{ empty($news_folder->id) ? " checked='checked'" : ""}}{{ $news_folder->title_language === 'telugu' ? " checked='checked'" : ""}}>
                                            <span>Telugu</span>
                                        </label> <label for="english" class="items-center inline-flex space-x-1">
                                            <input type="radio" name="title_language" value="english" id="english"{{ $news_folder->title_language === 'english' ? " checked='checked'" : ""}}>
                                            <span>English</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.label for="image" class="mb-1" value="Image"/>
                                    <x-reuse.input type="file" name="image" id="image" class="w-full block"/>
                                    @error('image')
                                    <x-reuse.error :error="$message"/> @enderror
                                </div>
                            </div>
                            <div class="inline-flex space-x-3">
                                <button type="submit" class="bg-purple-500 text-white btn rounded-lg border-purple-700">{{ $news_folder->id ? "Update" : "Add" }} News Folder</button>
                                <a href="{{ route('admin.news-folder.index') }}" class="btn rounded-lg danger inline-flex">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-1/4 hidden lg:flex">
                        @if($news_folder->image)
                            <img src="{{ asset('storage/'.$news_folder->image) }}" class="w-full" alt="{{ $news_folder->name }}">
                        @endif
                    </div>
                </div>
            </form>
        </x-reuse.card>
    </div>
</x-admin-layout>
