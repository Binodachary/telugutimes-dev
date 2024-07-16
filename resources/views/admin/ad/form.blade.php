<x-admin-layout>
    <x-slot name="title">{{ $ad->id ? "Update" : "Add" }} Advertisement - Telugu Times</x-slot>
    <div class="container">
        <x-reuse.card>
            <x-slot name="cardHeader">{{ $ad->id ? "Update" : "Add" }} Advertisement</x-slot>
            <form method="POST" enctype="multipart/form-data" action="{{ $ad->id ? route('admin.ad.update',$ad->id) : route('admin.ad.store') }}">
                @csrf @if($ad->id) @method('PUT') @endif
                <div class="flex items-start space-x-3">
                    <div class="lg:w-3/4">
                        <div class="field-wrapper space-y-4">
                            <div class="lg:flex space-y-3 space-x-3 lg:space-y-0 items-center xl:h-16">
                                <div class="w-full lg:w-1/3">
                                    <x-reuse.label for="name" class="mb-1" value="Name"/>
                                    <x-reuse.input type="text" name="name" id="name" :value="old('name',$ad->name)" class="w-full block"/>
                                    @error('name')
                                    <x-reuse.error :error="$message"/> @enderror
                                </div>
                                <div class="w-full lg:w-1/3">
                                    <x-reuse.label for="sort_order" class="mb-1" value="Sort Order"/>
                                    <x-reuse.input type="number" name="sort_order" min="0" id="sort_order" :value="old('sort_order',$ad->sort_order)" class="w-full block"/>
                                </div>
                                <div class="w-full lg:w-1/3">
                                    <x-reuse.label for="image" class="mb-1" value="Image"/>
                                    <x-reuse.input type="file" name="image" id="image" class="w-full block"/>
                                    @error('image')
                                    <x-reuse.error :error="$message"/> @enderror
                                </div>
                            </div>
                            <div class="lg:flex space-y-3 space-x-3 lg:space-y-0 items-center xl:h-16">
                                <div class="w-full lg:w-1/3">
                                    <x-reuse.label for="url" class="mb-1" value="URL"/>
                                    <x-reuse.input type="text" name="url" id="url" :value="old('url',$ad->url)" class="w-full block"/>
                                </div>
                                <div class="w-full lg:w-1/3">
                                    <x-reuse.label for="start_date" class="mb-1" value="Start Date"/>
                                    <x-reuse.input type="text" name="start_date" id="start_date" :value="old('start_date',$ad->start_date)" class="w-full block"/>
                                    @error('start_date')
                                    <x-reuse.error :error="$message"/> @enderror
                                </div>
                                <div class="w-full lg:w-1/3">
                                    <x-reuse.label for="end_date" class="mb-1" value="End Date"/>
                                    <x-reuse.input type="text" name="end_date" id="end_date" :value="old('end_date',$ad->end_date)" class="w-full block"/>
                                    @error('end_date')
                                    <x-reuse.error :error="$message"/> @enderror
                                </div>
                            </div>
                            <div class="w-full lg:w-1/3 space-y-3">
                                <x-reuse.label for="position" class="mb-1" value="Position"/>
                                <x-reuse.input type="text" name="position" id="position" :value="old('position',$ad->position)" class="w-full block"/>
                            </div>
                            <div class="inline-flex space-x-3">
                                <button type="submit" class="bg-purple-500 text-white btn rounded-lg border-purple-700">{{ $ad->id ? "Update" : "Add" }}
                                    Advertisement
                                </button>
                                <a href="{{ route('admin.ad.index') }}" class="btn rounded-lg danger inline-flex">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-1/4 w-full space-y-2 flex flex-col">
                        @if($ad->image)
                            <img src="{{ asset('storage/advertisements/'.$ad->image) }}" class="w-full" alt="{{ $ad->name }}">
                        @endif
                        <x-reuse.label for="position" class="mb-1" value="Available positions"/>
                        <div class="available-positions mt-4">
                            <div class="grid grid-cols-3 gap-2 text-white">
                                <p class="bg-gray-500 text-xs p-1">logo-top-left</p>
                                <p class="bg-gray-500 text-xs p-1">logo-top-right</p>
                                <p class="bg-gray-500 text-xs p-1">logo-top-right-full</p>
                                <p class="bg-gray-500 text-xs p-1">home-right-slider</p>
                                <p class="bg-gray-500 text-xs p-1">home-right-top</p>
                                <p class="bg-gray-500 text-xs p-1">highlight-news-below</p>
                                <p class="bg-gray-500 text-xs p-1">advertise-title-below</p>
                                <p class="bg-gray-500 text-xs p-1">menu-below</p>
                                <p class="bg-gray-500 text-xs p-1">home-middle-center</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </x-reuse.card>
    </div>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/litepicker.min.css') }}">
    </x-slot>
    <x-slot name="scripts">
        <script src="{{ asset('js/litepicker.min.js') }}"></script>
        <script>
            let end_date = new Litepicker({
                element: document.getElementById('end_date'),
                minDate: new Date().setDate(new Date().getDate() + 1),
                format: 'MMM DD, YYYY'
            });
            let start_date = new Litepicker({
                element: document.getElementById('start_date'),
                minDate: new Date().setDate(new Date().getDate()),
                format: 'MMM DD, YYYY',
                setup: (picker) => {
                    picker.on('selected', (date1) => {
                        end_date.setOptions({minDate: new Date().setDate(new Date(date1.dateInstance).getDate() + 1)});
                    });
                }
            });
        </script>
    </x-slot>
</x-admin-layout>
