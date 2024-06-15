<x-admin-layout>
    <x-slot name="title">{{ $news->id ? "Update" : "Add" }} News - Telugu Times</x-slot>
    <div class="container">
        <x-reuse.card>
            <x-slot name="cardHeader">{{ $news->id ? "Update" : "Add" }} News</x-slot>
            <form method="POST"
                  action="{{ $news->id ? route('admin.news.update',$news->id) : route('admin.news.store') }}"
                  enctype="multipart/form-data">
                @csrf @if($news->id)
                    @method('PUT')
                @endif
                <div class="flex space-x-3 items-start">
                    <div class="lg:w-3/5">
                        <div class="field-wrapper space-y-4">
                            <div class="block">
                                <x-reuse.label for="title" class="mb-1" value="Title"/>
                                <x-reuse.input type="text" name="title" id="title" :value="old('title',$news->title)"
                                               class="w-full block"/>
                                @error('title')
                                <x-reuse.error :error="$message"/> @enderror
                            </div>
                            <div class="block">
                                <x-reuse.label for="slug" class="mb-1" value="Alias or Slug (Only english)"/>
                                <x-reuse.input type="text" name="slug" id="slug" :value="old('slug',$news->slug)"
                                               class="w-full block"/>
                                @error('slug')
                                <x-reuse.error :error="$message"/> @enderror
                            </div>
                            <div class="block">
                                <x-reuse.label for="keywords" class="mb-1" value="Keywords"/>
                                <x-reuse.input type="text" name="keywords" id="keywords"
                                               :value="old('keywords',$news->keywords)" class="w-full block"/>
                                @error('keywords')
                                <x-reuse.error :error="$message"/> @enderror
                            </div>
                            <div class="lg:flex space-y-3 lg:space-y-0 items-center xl:h-16">
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.label for="image" class="mb-1" value="Image"/>
                                    <input type="file" class="focus:outline-none text-sm" accept="image/*" name="image"
                                           id="image"/>
                                    @error('image')
                                    <x-reuse.error :error="$message"/> @enderror
                                </div>
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.label class="mb-1" for="schedule_to" value="Schedule to"/>
                                    <x-reuse.input type="text" name="schedule_to" id="schedule_to"
                                                   :value="old('schedule_to',$news->schedule_to)" class="w-full block"/>
                                </div>
                            </div>
                            @php
                                $description = 1
                            @endphp
                            @if($news->id)
                                @for($i=5;$i > 1;$i--)
                                    @if(shortText($news->{'description'.$i}) != '')
                                        @php
                                            $description = $i
                                        @endphp
                                        @break
                                    @endif
                                @endfor
                            @endif
                            <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-2">
                                @if($news->id)
                                    @php
                                        $splitted = collect(explode(',',$news->category));
                                    @endphp
                                @else
                                    @php($splitted = collect())
                                @endif
                                @forelse($categories as $category)
                                    <div class="category-box bg-gray-200 px-2 py-2 items-start inline-flex flex-wrap dark:bg-gray-800 text-gray-700 dark:text-gray-400">
                                        @if(count($category->children) > 0)
                                            <h4 class="text-bold w-full leading-relaxed">{{ $category->name }}</h4>
                                            <div class="flex flex-wrap text-sm justify-between w-full">
                                                @foreach($category->children as $subCategory)
                                                    <label for="{{ $subCategory['slug'] }}"
                                                           class="inline-flex space-x-1 items-center">
                                                        <input type="checkbox" name="category[]"
                                                               id="{{ $subCategory['slug'] }}"
                                                               {{ $splitted->contains($subCategory->id) ? " checked='checked'" : ""}} value="{{ $subCategory->id }}">
                                                        <span class="font-bold">{{ $subCategory['name'] }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        @else
                                            <label for="{{ $category['slug'] }}"
                                                   class="inline-flex space-x-1 items-center">
                                                <input type="checkbox" name="category[]" id="{{ $category['slug'] }}"
                                                       {{ $splitted->contains($category->id) ? " checked='checked'" : ""}} value="{{ $category->id }}">
                                                <span class="font-bold">{{ $category['name'] }}</span>
                                            </label>
                                        @endif
                                    </div>
                                @empty
                                    <h1 class="text-xl">No categories added till now.</h1>
                                @endforelse
                            </div>
                            @error('category')
                            <x-reuse.error :error="$message"/> @enderror
                        </div>
                    </div>
                    <div class="lg:w-2/5 flex flex-col space-y-4">
                        @if($news->image)
                            <div class="w-full">
                                <img src="{{ asset('storage/news/'.$news->image) }}" class="w-full"
                                     alt="{{ $news->title }}">
                            </div>
                        @endif
                        <div class="video-text-wrapper space-y-4"
                             x-data="{hasVideo: {{ old('has_video',$news->has_video)==='YES' ? "true" : "false"}}}">
                            <div class="w-full">
                                <x-reuse.toggle name="has_video" text="Want to add Video?" x-model="hasVideo"
                                                hidden="NO" value="YES"/>
                            </div>
                            <div class="w-full" x-show="hasVideo">
                                <x-reuse.label for="video_id" class="mb-1" value="Youtube Video ID"/>
                                <x-reuse.input type="text" name="video_id" :value="old('video_id',$news->video_id)"
                                               id="video_id" class="w-full block"/>
                                @error('video_id')
                                <x-reuse.error :error="$message"/> @enderror
                            </div>
                        </div>
                        <div class="w-full">
                            <x-reuse.toggle name="is_highlighted" text="Need to highlight?"
                                            :checked="old('is_highlighted',$news->is_highlighted) === 'YES'" hidden="NO"
                                            value="YES"/>
                        </div>
                        <div class="w-full">
                            <x-reuse.toggle name="has_english" text="English Post?"
                                            :checked="old('has_english',$news->has_english) === 'YES'" hidden="NO"
                                            value="YES"/>
                        </div>
                        <div class="w-full">
                            <x-reuse.label class="mb-1" for="title_language" value="Title Language"/>
                            <div class="dark:text-gray-400 text-gray-700 inline-flex space-x-3">
                                <label for="telugu" class="items-center inline-flex space-x-1">
                                    <input type="radio" name="title_language" value="telugu"
                                           id="telugu"{{ empty($news->id) ? " checked='checked'" : ""}}{{ $news->title_language === 'telugu' ? " checked='checked'" : ""}}>
                                    <span>Telugu</span>
                                </label> <label for="english" class="items-center inline-flex space-x-1">
                                    <input type="radio" name="title_language" value="english"
                                           id="english"{{ $news->title_language === 'english' ? " checked='checked'" : ""}}>
                                    <span>English</span>
                                </label>
                            </div>
                        </div>
                        <div class="news-folder-wrapper space-y-4" x-data="{
                            hasNewsFolder: {{ (!empty($news->id) && !empty($news->news_folder_id)) ? "true" : "false" }},
                            hasGallery: {{ (!empty($news->id) && !empty($news->gallery_id)) ? "true" : "false" }}}">
                            <div class="w-full">
                                <x-reuse.toggle text="Want to add this to news folder?" name="hasNewsFolder"
                                                x-model="hasNewsFolder" hidden="NO" value="YES"/>
                            </div>
                            <div class="w-full" x-show="hasNewsFolder">
                                <x-reuse.label for="news_folder_id" class="mb-1" value="News Folders"/>
                                @if($news_folders)
                                    <select id="news_folder_id" title="News Folders" name="news_folder_id[]" multiple
                                            placeholder="Select News folders..." autocomplete="off">
                                        <option value="">Select a news folder..</option>
                                    </select>
                                @endif
                            </div>
                            <div class="news-folder-gallery space-y-4" x-show="hasNewsFolder">
                                <div class="w-full">
                                    <x-reuse.toggle text="Want to add gallery to news folder?" name="hasGallery"
                                                    x-model="hasGallery" hidden="NO" value="YES"/>
                                </div>
                                <div class="w-full" x-show="hasGallery">
                                    <x-reuse.label for="gallery_id" class="mb-1" value="Gallery"/>
                                    @if($galleries)
                                        <select id="gallery_id" title="Gallery" placeholder="Select a Gallery..."
                                                name="gallery" autocomplete="off">
                                            <option value="">Select a gallery</option>
                                        </select>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="textarea-wrapper space-y-4 w-full mb-4" x-data="{description:{{ $description }}}">
                    <div class="block">
                        <x-reuse.label for="description" class="mb-1 flex justify-between">
                            Description
                            <div class="link-wrapper space-x-2">
                                <a href="#" @click.prevent="description++" class="text-green-600 font-bold"
                                   x-show="description<5">
                                    Add Description </a>
                                <a href="#" @click.prevent="description--" class="text-red-600 font-bold"
                                   x-show="description>1">
                                    Remove Description </a>
                            </div>
                        </x-reuse.label>
                        @error('description')
                        <x-reuse.error :error="$message"/> @enderror
                        <textarea class="tinymce" title="Description" id="description"
                                  name="description">{!! old('description',$news->description) ?? "" !!}</textarea>
                    </div>
                    <div :class="description>1 ? 'block' : 'hidden'">
                        <textarea class="tinymce" title="Description" id="description2"
                                  name="description2">{!! old('description2',$news->description2) ?? "" !!}</textarea>
                    </div>
                    <div :class="description>2 ? 'block' : 'hidden'">
                        <textarea class="tinymce" title="Description" id="description3"
                                  name="description3">{!! old('description3',$news->description3) ?? "" !!}</textarea>
                    </div>
                    <div :class="description>3 ? 'block' : 'hidden'">
                        <textarea class="tinymce" title="Description" id="description4"
                                  name="description4">{!! old('description4',$news->description4) ?? "" !!}</textarea>
                    </div>
                    <div :class="description>4 ? 'block' : 'hidden'">
                        <textarea class="tinymce" title="Description" id="description5"
                                  name="description5">{!! old('description5',$news->description5) ?? "" !!}</textarea>
                    </div>
                </div>
                <div class="inline-flex space-x-3">
                    <button type="submit"
                            class="bg-purple-500 text-white btn rounded-lg border-purple-700">{{ $news->id ? "Update" : "Add" }}
                        News
                    </button>
                    <a href="{{ route('admin.news.index') }}" class="btn rounded-lg danger inline-flex">Cancel</a>
                </div>
            </form>
        </x-reuse.card>
    </div>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/tom-select.min.css') }}">
        <!--        <link rel="stylesheet" href="{{ asset('css/telugu-keyboard.css') }}">-->
    </x-slot>
    <x-slot name="scripts">
        <script src="https://cdn.tiny.cloud/1/nf9d9h8wydroobl01sz2xbx0q35ztuac2fkiuo56tw94zxjx/tinymce/5/tinymce.min.js"
                referrerpolicy="origin"></script>
        <script src="{{ asset('js/flatpickr.min.js') }}"></script>
        <script src="{{ asset('js/tom-select.min.js') }}"></script>
        {{--        <script src="{{ asset('js/telugu-keyboard.js') }}"></script>--}}
        <script>
            let news_folder = new TomSelect("#news_folder_id", {
                allowEmptyOption: true,
                maxItems: null,
                valueField: 'id',
                labelField: 'name',
                searchField: 'name',
                options: @json($news_folders,JSON_UNESCAPED_UNICODE),
                @if(!empty($news->id))
                onInitialize: function (values) {
                    this.setValue({{ $news->news_folder_id }})
                },
                @endif
                create: false
            });
            new TomSelect("#gallery_id", {
                allowEmptyOption: true,
                maxItems: null,
                valueField: 'id',
                labelField: 'name',
                searchField: 'name',
                options: @json($galleries,JSON_UNESCAPED_UNICODE),
                @if(!empty($news->id))
                onInitialize: function (values) {
                    this.setValue({{ $news->gallery_id }})
                },
                @endif
                create: false
            });
            flatpickr('#schedule_to', {
                minDate: 'today',
                enableTime: true,
                altInput: true,
                altFormat: 'M J,Y h:i K'
            });
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
