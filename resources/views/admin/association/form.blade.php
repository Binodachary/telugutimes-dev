<x-admin-layout>
    <x-slot name="title">{{ $association->id ? "Update" : "Add" }} Association - Telugu Times</x-slot>
    <div class="container">
        <x-reuse.card>
            <x-slot name="cardHeader">{{ $association->id ? "Update" : "Add" }} Association</x-slot>
            <form method="POST" enctype="multipart/form-data" action="{{ $association->id ? route('admin.association.update',$association->id) : route('admin.association.store') }}">
                @csrf @if($association->id) @method('PUT') @endif
                <div class="flex space-x-3 items-start">
                    <div class="lg:w-3/4">
                        <div class="field-wrapper space-y-4">
                            <div class="lg:flex space-y-3 space-x-3 lg:space-y-0 items-center xl:h-16">
                                <div class="w-full lg:w-1/3">
                                    <x-reuse.label for="name" class="mb-1" value="Name"/>
                                    <x-reuse.input type="text" name="name" id="name" :value="old('name',$association->name)" class="w-full block"/>
                                </div>
                                <div class="w-full lg:w-1/3">
                                    <x-reuse.label for="logo" class="mb-1" value="Logo"/>
                                    <x-reuse.input type="file" name="logo" id="logo" class="w-full block"/>
                                    @error('logo') <x-reuse.error :error="$message"/> @enderror
                                </div>
                                <div class="w-full lg:w-1/3">
                                    <x-reuse.label for="site_url" class="mb-1" value="Association site"/>
                                    <x-reuse.input type="text" name="site_url" :value="old('site_url',$association->site_url)" id="site_url" class="w-full block"/>
                                    @error('site_url') <x-reuse.error :error="$message"/> @enderror
                                </div>
                            </div>

                            <div class="inline-flex space-x-3">
                                <button type="submit" class="bg-purple-500 text-white btn rounded-lg border-purple-700">{{ $association->id ? "Update" : "Add" }} Association</button>
                                <a href="{{ route('admin.association.index') }}" class="btn rounded-lg danger inline-flex">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-1/4">
                        <img src="{{ asset("storage/gallery/association-logos/{$association->name}/{$association->logo}") }}" alt="{{ $association->name }}"/>
                    </div>
                </div>
            </form>
        </x-reuse.card>
    </div>
</x-admin-layout>
