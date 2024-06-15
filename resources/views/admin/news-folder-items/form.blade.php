<x-admin-layout>
    <x-slot name="title">{{ $news_folder_item->id ? "Update" : "Add" }} News Folder Item - Telugu Times</x-slot>
    <div class="container">
        <x-reuse.card>
            <x-slot name="cardHeader">{{ $news_folder_item->id ? "Update" : "Add" }} News Folder Item</x-slot>
            <form method="POST" action="{{ $news_folder_item->id ? route('admin.news-folder.news-folder-items.update',[$news_folder,$news_folder_item]) : route('admin.news-folder.news-folder-items.store',$news_folder) }}" enctype="multipart/form-data">
                @csrf @if($news_folder_item->id) @method('PUT') @endif
                <div class="flex items-start space-x-3">
                    <div class="lg:w-3/4">
                        <div class="field-wrapper space-y-4">
                            <div class="block">
                                <x-reuse.label for="title" class="mb-1" value="Title"/>
                                <x-reuse.input type="text" name="title" id="title" :value="old('title',$news_folder_item->title)" class="w-full block"/>
                                @error('title')
                                <x-reuse.error :error="$message"/> @enderror
                            </div>
                            <div class="block">
                                <x-reuse.label for="slug" class="mb-1" value="Alias or Slug (Only english)"/>
                                <x-reuse.input type="text" name="slug" id="slug" :value="old('slug',$news_folder_item->slug)" class="w-full block"/>
                                @error('slug')
                                <x-reuse.error :error="$message"/> @enderror
                            </div>
                            <div class="lg:flex space-y-3 lg:space-y-0 items-center xl:h-16" x-data="{hasVideo: {{ old('video_id',$news_folder_item->video_id) != '' ? "true" : "false"}}}">
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.toggle name="has_video" text="Want to add Video?" x-model="hasVideo" hidden="NO" value="YES"/>
                                </div>
                                <div class="w-full lg:w-1/2" x-show="hasVideo">
                                    <x-reuse.label for="video_id" class="mb-1" value="Youtube Video ID"/>
                                    <x-reuse.input type="text" name="video_id" :value="old('video_id',$news_folder_item->video_id)" id="video_id" class="w-full block"/>
                                    @error('video_id')
                                    <x-reuse.error :error="$message"/> @enderror
                                </div>
                            </div>
                            <div class="lg:flex space-y-3 space-x-3 lg:space-y-0 items-center xl:h-16 dark:text-gray-400 text-gray-700">
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.label for="news_folder_id" class="mb-1" value="News Folders"/>
                                    @if($news_folders)
                                        <select id="news_folder_id" title="News Folders" name="news_folder_id[]" multiple placeholder="Select News folders..." autocomplete="off">
                                            @foreach($news_folders as $folder)
                                                <option value="{{ $folder->id }}"{{ ($news_folder->id == $folder->id || (!empty($news_folder_item->id) && in_array($folder->id,json_decode($news_folder_item->news_folder_id,true)))) ? ' selected' : '' }}>{{ $folder->name }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.label for="image" class="mb-1" value="Image"/>
                                    <input type="file" class="focus:outline-none text-sm" accept="image/*" name="image" id="image"/>
                                    @error('image')
                                    <x-reuse.error :error="$message"/> @enderror
                                </div>
                            </div>
                            <div class="lg:flex space-y-3 lg:space-y-0 items-center xl:h-16">
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.label class="mb-1" for="title_language" value="Title Language"/>
                                    <div class="dark:text-gray-400 text-gray-700 inline-flex space-x-3">
                                        <label for="telugu" class="items-center inline-flex space-x-1">
                                            <input type="radio" name="title_language" value="telugu" id="telugu"{{ empty($news_folder_item->id) ? " checked='checked'" : ""}}{{ $news_folder_item->title_language === 'telugu' ? " checked='checked'" : ""}}>
                                            <span>Telugu</span>
                                        </label> <label for="english" class="items-center inline-flex space-x-1">
                                            <input type="radio" name="title_language" value="english" id="english"{{ $news_folder_item->title_language === 'english' ? " checked='checked'" : ""}}>
                                            <span>English</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.label for="gallery_id" class="mb-1" value="Gallery"/>
                                    @if($galleries)
                                        <select id="gallery_id" title="Gallery" name="gallery" autocomplete="off">
                                            <option value="">Select a gallery</option>
                                            @foreach($galleries as $gallery)
                                                <option value="{{ $gallery->id }}"{{ ($news_folder_item->gallery_id == $gallery->id) ? ' selected' : '' }}>{{ $gallery->name }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            </div>
                            @php
                                $description = 1
                            @endphp
                            @if($news_folder_item->id)
                                @for($i=5;$i > 1;$i--)
                                    @if(shortText($news_folder_item->{'description'.$i}) != '')
                                        @php
                                            $description = $i
                                        @endphp
                                        @break
                                    @endif
                                @endfor
                            @endif
                            <div class="textarea-wrapper space-y-4" x-data="{description:{{ $description }}}">
                                <div class="block">
                                    <x-reuse.label for="description" class="mb-1 flex justify-between">
                                        Description
                                        <div class="link-wrapper space-x-2">
                                            <a href="#" @click.prevent="description++" class="text-green-600 font-bold" x-show="description<5">
                                                Add Description </a>
                                            <a href="#" @click.prevent="description--" class="text-red-600 font-bold" x-show="description>1">
                                                Remove Description </a>
                                        </div>
                                    </x-reuse.label>
                                    @error('description')
                                    <x-reuse.error :error="$message"/> @enderror
                                    <textarea class="tinymce" title="Description" id="description" name="description">{!! old('description',$news_folder_item->description) ?? "" !!}</textarea>
                                </div>
                                <div :class="description>1 ? 'block' : 'hidden'">
                                    <textarea class="tinymce" title="Description" id="description2" name="description2">{!! old('description2',$news_folder_item->description2) ?? "" !!}</textarea>
                                </div>
                                <div :class="description>2 ? 'block' : 'hidden'">
                                    <textarea class="tinymce" title="Description" id="description3" name="description3">{!! old('description3',$news_folder_item->description3) ?? "" !!}</textarea>
                                </div>
                                <div :class="description>3 ? 'block' : 'hidden'">
                                    <textarea class="tinymce" title="Description" id="description4" name="description4">{!! old('description4',$news_folder_item->description4) ?? "" !!}</textarea>
                                </div>
                                <div :class="description>4 ? 'block' : 'hidden'">
                                    <textarea class="tinymce" title="Description" id="description5" name="description5">{!! old('description5',$news_folder_item->description5) ?? "" !!}</textarea>
                                </div>
                            </div>
                            <div class="inline-flex space-x-3">
                                <button type="submit" class="bg-purple-500 text-white btn rounded-lg border-purple-700">{{ $news_folder_item->id ? "Update" : "Add" }}
                                    News Folder Item
                                </button>
                                <a href="{{ route('admin.news-folder.news-folder-items.index',$news_folder) }}" class="btn rounded-lg danger inline-flex">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-1/4 hidden lg:flex">
                        @if($news_folder_item->image)
                            <img src="{{ asset('storage/news/'.$news_folder_item->image) }}" class="w-full" alt="{{ $news_folder_item->title }}">
                        @endif
                    </div>
                </div>
            </form>
        </x-reuse.card>
    </div>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/tom-select.min.css') }}">
    </x-slot>
    <x-slot name="scripts">
        <script src="https://cdn.tiny.cloud/1/nf9d9h8wydroobl01sz2xbx0q35ztuac2fkiuo56tw94zxjx/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="{{ asset('js/tom-select.min.js') }}"></script>
        <script>
            new TomSelect("#news_folder_id", {allowEmptyOption: true, create: true});
            new TomSelect("#gallery_id", {create: true, allowEmptyOption: true});
            tinymce.init({
                selector: "textarea.tinymce",
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table paste"],
                convert_urls: false,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                height: 300
            });
        </script>
    </x-slot>
</x-admin-layout>
