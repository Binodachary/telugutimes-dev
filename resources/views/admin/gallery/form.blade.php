<x-admin-layout>
    <x-slot name="title">{{ $gallery->id ? "Update" : "Add" }} Gallery - Telugu Times</x-slot>
    <div class="container">
        <x-reuse.card>
            <x-slot name="cardHeader">{{ $gallery->id ? "Update" : "Add" }} Gallery</x-slot>
            <form method="POST" enctype="multipart/form-data" action="{{ $gallery->id ? route('admin.gallery.update',$gallery->id) : route('admin.gallery.store') }}">
                @csrf @if($gallery->id) @method('PUT') @endif
                <div class="flex items-start">
                    <div class="lg:w-3/4">
                        <div class="field-wrapper space-y-4">
                            <div class="lg:flex space-y-3 space-x-3 lg:space-y-0 items-center xl:h-16" x-data="{category: '{{ old("category",$gallery->category) ?? "" }}',association: '{{ old("association",$gallery->association) ?? "" }}',sub_category: '{{ old("sub_category",$gallery->sub_category) ?? "" }}',categories:{{ $categories }},associations:{{$associations}} }">
                                <div class="w-full lg:w-1/3">
                                    <x-reuse.label for="category" class="mb-1" value="Category"/>
                                    <select class="block rounded-sm border-gray-300 w-full capitalize" name="category" x-model="category" id="category">
                                        <option value="">Select a Category</option>
                                        <template x-for="cat in Object.keys(categories)" :key="cat">
                                            <option :value="cat" :selected="category == cat" x-text="cat"/>
                                        </template>
                                    </select>
                                    @error('category')
                                    <x-reuse.error :error="$message"/> @enderror
                                </div>
                                <template x-if="category && categories[category][0]">
                                    <div class="w-full lg:w-1/3">
                                        <x-reuse.label for="sub_category" class="mb-1" value="Sub Category"/>
                                        <select class="block rounded-sm border-gray-300 w-full capitalize" name="sub_category" x-model="sub_category" id="sub_category">
                                            <option value="">Select a Sub Category</option>
                                            <template x-for="sub in categories[category]" :key="sub">
                                                <option :value="sub" :selected="sub_category == sub" x-text="sub"/>
                                            </template>
                                        </select>
                                        @error('sub_category')
                                        <x-reuse.error :error="$message"/> @enderror
                                    </div>
                                </template>
                                <div class="w-full lg:w-1/3">
                                    <x-reuse.label for="association" class="mb-1" value="Association"/>
                                    <select class="block rounded-sm border-gray-300 w-full capitalize" name="association" x-model="association" id="association">
                                        <option value="">Select an Association</option>
                                        <template x-for="assoc in associations" :key="assoc">
                                            <option :value="assoc" :selected="association == assoc" x-text="assoc"/>
                                        </template>
                                    </select>
                                </div>
                            </div>
                            <div class="lg:flex space-y-3 space-x-3 lg:space-y-0 items-center xl:h-16">
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.label for="name" class="mb-1" value="Name"/>
                                    <x-reuse.input type="text" name="name" id="name" :value="old('name',$gallery->name)" class="w-full block"/>
                                    @error('name')
                                    <x-reuse.error :error="$message"/> @enderror
                                </div>
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.label for="images" class="mb-1" value="Images"/>
                                    <x-reuse.input type="file" name="images[]" id="images" multiple class="w-full block"/>
                                    @error('images')
                                    <x-reuse.error :error="$message"/> @enderror
                                </div>
                            </div>
                            <div class="inline-flex space-x-3">
                                <button type="submit" class="bg-purple-500 text-white btn rounded-lg border-purple-700">{{ $gallery->id ? "Update" : "Add" }}
                                    Gallery
                                </button>
                                <a href="{{ route('admin.gallery.index') }}" class="btn rounded-lg danger inline-flex">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </x-reuse.card>
    </div>
</x-admin-layout>
