<x-admin-layout>
    <x-slot name="title">{{ $epaper->id ? "Update" : "Add" }} Epaper - Telugu Times</x-slot>
    <div class="container">
        <x-reuse.card>
            <x-slot name="cardHeader">{{ $epaper->id ? "Update" : "Add" }} Epaper</x-slot>
            <div class="flex bg-red-500 max-w-sm mb-4 shadow-md rounded-md p-3">
                <div class="w-auto text-white opacity-75 items-center">
                    <div class="leading-tight text-sm">
                        <p><span class="font-bold text-base">Note :</span> All the image file names must be numbers, starting from 1.</p>
                        <p>Ex: 1.jpg,2.jpg...etc.</p>
                    </div>
                </div>
            </div>
            <form method="POST" enctype="multipart/form-data" action="{{ $epaper->id ? route('admin.epaper.update',$epaper->id) : route('admin.epaper.store') }}">
                @csrf @if($epaper->id) @method('PUT') @endif
                <div class="flex items-start space-x-3">
                    <div class="lg:w-3/4">
                        <div class="field-wrapper space-y-4">
                            <div class="lg:flex space-y-3 space-x-3 lg:space-y-0 items-center xl:h-16">
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.label for="edition_year" class="mb-1" value="Year"/>
                                    <x-reuse.input type="text" name="edition_year" id="edition_year" :value="old('edition_year',$epaper->edition_year ?? date('Y'))" readonly class="w-full block bg-gray-300"/>
                                </div>
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.label for="edition_month" class="mb-1" value="Month"/>
                                    <x-reuse.input type="text" name="edition_month" id="edition_month" :value="old('edition_month',$epaper->edition_month ?? date('F'))" readonly class="w-full block bg-gray-300"/>
                                </div>
                            </div>
                            <div class="lg:flex space-y-3 space-x-3 lg:space-y-0 items-center xl:h-16">
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.label for="name" class="mb-1" value="Name"/>
                                    <x-reuse.input type="text" name="name" id="name" :value="old('name',$epaper->name)" class="w-full block"/>
                                </div>
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.label for="images" class="mb-1" value="Images"/>
                                    <x-reuse.input type="file" name="images[]" id="images" multiple class="w-full block"/>
                                    @error('images') <x-reuse.error :error="$message"/> @enderror
                                </div>
                            </div>
                            <div class="inline-flex space-x-3">
                                <button type="submit" class="bg-purple-500 text-white btn rounded-lg border-purple-700">{{ $epaper->id ? "Update" : "Add" }} Epaper</button>
                                <a href="{{ route('admin.epaper.index') }}" class="btn rounded-lg danger inline-flex">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </x-reuse.card>
    </div>
</x-admin-layout>
