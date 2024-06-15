<x-admin-layout>
    <x-slot name="title">Update Profile - Telugu Times</x-slot>
    <div class="container">
        <x-reuse.card>
            <x-slot name="cardHeader">Update Profile</x-slot>
            <form method="POST" action="{{ route("admin.profileUpdate") }}">
                @csrf
                <div class="flex items-start space-x-3">
                    <div class="lg:w-3/4">
                        <div class="field-wrapper space-y-4">
                            <div class="lg:flex space-y-3 space-x-3 lg:space-y-0 items-center xl:h-16">
                                <x-reuse.label for="name" class="mb-1" value="Name"/>
                                <x-reuse.input type="text" name="name" id="name" :value="old('name',$category->name)" class="w-full block"/>
                                @error('name')
                                <x-reuse.error :error="$message"/> @enderror
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
                            <img src="{{ asset('storage/advertisements/'.$category->image) }}" class="w-full" alt="{{ $category->name }}">
                        @endif
                    </div>
                </div>
            </form>
        </x-reuse.card>
    </div>
</x-admin-layout>
