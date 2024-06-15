<x-admin-layout>
    <x-slot name="title">{{ $mobileAd->id ? "Update" : "Add" }} Mobile Ad - Telugu Times</x-slot>
    <div class="container">
        <x-reuse.card>
            <x-slot name="cardHeader">{{ $mobileAd->id ? "Update" : "Add" }} Mobile Ad</x-slot>
            <form method="POST" enctype="multipart/form-data"
                  action="{{ $mobileAd->id ? route('admin.mobileAd.update',$mobileAd->id) : route('admin.mobileAd.store') }}">
                @csrf @if($mobileAd->id)
                    @method('PUT')
                @endif
                <div class="lg:flex items-start lg:space-x-2">
                    <div class="lg:w-3/4 w-full">
                        <div class="field-wrapper lg:space-y-4">
                            <div class="lg:flex lg:space-y-3 lg:space-x-3 lg:space-y-0 items-center xl:h-16 w-full">
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.label for="name" class="mb-1" value="Name"/>
                                    <x-reuse.input type="text" name="name" id="name"
                                                   :value="old('name',$mobileAd->name)" class="w-full block"/>
                                    @error('name')
                                    <x-reuse.error :error="$message"/> @enderror
                                </div>
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.label for="sort_order" class="mb-1" value="Sort Order"/>
                                    <x-reuse.input type="number" name="sort_order" min="0" id="sort_order"
                                                   :value="old('sort_order',$mobileAd->sort_order)"
                                                   class="w-full block"/>
                                </div>
                            </div>
                            <div class="lg:flex lg:space-y-3 lg:space-x-3 lg:space-y-0 items-center xl:h-16 w-full">
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.label for="url" class="mb-1" value="URL"/>
                                    <x-reuse.input type="text" name="url" id="url" :value="old('url',$mobileAd->url)"
                                                   class="w-full block"/>
                                </div>
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.label for="image" class="mb-1" value="Image"/>
                                    <x-reuse.input type="file" name="image" id="image" class="w-full block"/>
                                    @error('image')
                                    <x-reuse.error :error="$message"/> @enderror
                                </div>
                            </div>
                            <div class="w-full lg:w-1/2">
                                <x-reuse.label for="position" class="mb-1" value="Position"/>
                                <x-reuse.input type="text" name="position" id="position" :value="old('position',$mobileAd->position)"
                                               class="w-full block"/>
                            </div>
                            <div class="inline-flex lg:space-x-3">
                                <button type="submit"
                                        class="bg-purple-500 text-white btn rounded-lg border-purple-700">{{ $mobileAd->id ? "Update" : "Add" }}
                                    Mobile Ad
                                </button>
                                <a href="{{ route('admin.mobileAd.index') }}" class="btn rounded-lg danger inline-flex">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-1/4 w-full lg:space-y-2 flex flex-col">
                        @if($mobileAd->image)
                            <img src="{{ asset('storage/mobileAds/'.$mobileAd->image) }}" class="w-full"
                                 alt="{{ $mobileAd->name }}">
                        @endif
                    </div>
                </div>
            </form>
        </x-reuse.card>
    </div>
</x-admin-layout>
