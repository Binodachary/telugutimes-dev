<x-admin-layout>
    <x-slot name="title">{{ $video->id ? "Update" : "Add" }} Video - Telugu Times</x-slot>
    <div class="container">
        <x-reuse.card>
            <x-slot name="cardHeader">{{ $video->id ? "Update" : "Add" }} Video</x-slot>
            <form method="POST" action="{{ $video->id ? route('admin.videos.update',$video->id) : route('admin.videos.store') }}">
                @csrf @if($video->id) @method('PUT') @endif
                <div class="flex space-x-3 items-start">
                    <div class="lg:w-3/4">
                        <div class="field-wrapper space-y-4">
                            <div class="lg:flex space-y-3 space-x-3 lg:space-y-0 items-center xl:h-16">
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.label for="title" class="mb-1" value="Title"/>
                                    <x-reuse.input type="text" name="title" id="title" :value="old('title',$video->title)" class="w-full block"/>
                                    @error('title')
                                    <x-reuse.error :error="$message"/> @enderror
                                </div>
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.label for="video_id" class="mb-1" value="Youtube Video ID"/>
                                    <x-reuse.input type="text" name="video_id" :value="old('video_id',$video->video_id)" id="video_id" class="w-full block"/>
                                    @error('video_id')
                                    <x-reuse.error :error="$message"/> @enderror
                                </div>
                            </div>
                            <div class="lg:flex space-y-3 space-x-3 lg:space-y-0 items-center xl:h-16">
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.label class="mb-1" for="title_language" value="Title Language"/>
                                    <div class="dark:text-gray-400 text-gray-700 inline-flex space-x-3">
                                        <label for="telugu" class="items-center inline-flex space-x-1">
                                            <input type="radio" name="title_language" value="telugu" id="telugu"{{ empty($video->id) ? " checked='checked'" : ""}}{{ $video->title_language === 'telugu' ? " checked='checked'" : ""}}>
                                            <span>Telugu</span>
                                        </label> <label for="english" class="items-center inline-flex space-x-1">
                                            <input type="radio" name="title_language" value="english" id="english"{{ $video->title_language === 'english' ? " checked='checked'" : ""}}>
                                            <span>English</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.label class="mb-1" for="category" value="Category"/>
                                    <div class="dark:text-gray-400 text-gray-700 inline-flex space-x-3">
                                        <label for="cinema" class="items-center inline-flex space-x-1">
                                            <input type="radio" name="category" value="cinema" id="cinema"{{ empty($video->id) ? " checked='checked'" : ""}}{{ $video->category === 'cinema' ? " checked='checked'" : ""}}>
                                            <span>Cinema Video</span>
                                        </label> <label for="nri" class="items-center inline-flex space-x-1">
                                            <input type="radio" name="category" value="nri" id="nri"{{ $video->category === 'nri' ? " checked='checked'" : ""}}>
                                            <span>NRI Video</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="inline-flex space-x-3">
                                <button type="submit" class="bg-purple-500 text-white btn rounded-lg border-purple-700">{{ $video->id ? "Update" : "Add" }}
                                    Video
                                </button>
                                <a href="{{ route('admin.videos.index') }}" class="btn rounded-lg danger inline-flex">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </x-reuse.card>
    </div>
</x-admin-layout>
