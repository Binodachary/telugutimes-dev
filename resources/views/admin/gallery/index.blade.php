<x-admin-layout>
    <x-slot name="title">Gallery - Telugu Times</x-slot>
    <div class="container">
        <x-reuse.card class="rounded-b-none">
            <x-slot name="cardHeader">
                <div class="flex justify-between w-full items-center">
                    Gallery
                    <form class="flex space-x-3 items-center" x-data="{category: '{{ request("selection.category") ?? "" }}',association:'{{ request("selection.association") ?? "" }}',sub_category: '{{ request("selection.sub_category") ?? "" }}',categories:{{ $categories }},associations:{{ $associations }} }">
                        <select class="block rounded-sm border-gray-300 w-full text-xs capitalize" name="selection[category]" x-model="category" id="category">
                            <option value="">Select a Category</option>
                            <template x-for="cat in Object.keys(categories)" :key="cat">
                                <option :value="cat" :selected="category == cat" x-text="cat"/>
                            </template>
                        </select>
                        <template x-if="category && categories[category][0]">
                            <select class="block rounded-sm border-gray-300 w-full capitalize text-xs" name="selection[sub_category]" x-model="sub_category" id="sub_category">
                                <option value="">Select a Sub Category</option>
                                <template x-for="sub in categories[category]" :key="sub">
                                    <option :value="sub" :selected="sub_category == sub" x-text="sub"/>
                                </template>
                            </select>
                        </template>
                        <select class="block text-xs rounded-sm border-gray-300 w-full capitalize" name="selection[association]" x-model="association" id="association">
                            <option value="">Select an Association</option>
                            <template x-for="assoc in associations" :key="assoc">
                                <option :value="assoc" :selected="association == assoc" x-text="assoc"/>
                            </template>
                        </select>
                        <input type="text" value="{{ request('search') }}" class="dark:bg-gray-700 focus:border-current focus:ring-transparent text-xs" placeholder="Search title" name="search" title="Search">
                        <button type="submit" class="btn primary md">Search</button>
                        <a href="{{ route("admin.gallery.index") }}" class="btn danger md">Reset</a>
                    </form>
                    <a href="{{ route('admin.gallery.create') }}" class="btn primary sm rounded-lg font-bold">
                        <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add Gallery </a>
                </div>
            </x-slot>
            <x-reuse.gallery-body>
                @forelse($galleries as $gallery)
                    <x-reuse.gallery-item>
                        @php
                            $file = getFiles("public/{$gallery->gallery_path}",true);
                            $file = basename($file);
                        @endphp
                        <img src="{{ asset("/images/medium/{$gallery->gallery_path}/{$file}") }}" class="w-full lg:h-52 object-cover object-left-top" alt="{{ $gallery->name }}">
                        <div class="gallery-title p-2 text-center">{{ $gallery->name }}</div>
                        <x-slot name="actionBar">
                            <div class="action-bar border-t-2 mt-auto dark:border-gray-700 flex flex-col justify-between divide-y-2 dark:divide-gray-700 text-gray-500">
                                <div class="category-info flex justify-between p-2">
                                    <span>{{ \Str::of($gallery->category)->title() }}</span>
                                    <span>{{ $gallery->association }}</span>
                                    <span>{{ \Str::of($gallery->sub_category)->title() }}</span>
                                </div>
                                <div class="actions flex justify-between p-2">
                                    @if(auth()->user()->role == "ADMIN")
                                        <a href="{{ route('admin.gallery.edit',$gallery) }}" title="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                            </svg>
                                        </a>
                                        <form method="POST" action="{{ route('admin.gallery.destroy',$gallery->id) }}" class="inline-flex">
                                            @csrf @method("DELETE")
                                            <button title="Delete" onclick="return confirm('Are you sure you want to delete this gallery?');" class="focus:outline-none">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    @else
                                        You don't have permission.
                                    @endif
                                </div>
                            </div>
                        </x-slot>
                    </x-reuse.gallery-item>
                @empty
                    <h1 class="text-xl">No Gallery has been added.</h1>
                @endforelse
            </x-reuse.gallery-body>
        </x-reuse.card>
        <div class="px-4 py-3 text-xs font-semibold tracking-wide rounded-b text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            {{ $galleries->appends(request()->all())->links() }}
        </div>
    </div>
</x-admin-layout>
