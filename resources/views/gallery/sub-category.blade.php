<x-main-layout>
    <section class="col-span-full space-y-3">
        <x-reuse.gallery-wrapper>
            <x-slot name="header">
                <h1>{{ \Str::of($sub)->title() }}</h1>
            </x-slot>
            <x-reuse.gallery-body>
                @forelse($gallery as $image)
                    <x-reuse.gallery-item :link="route('photos',$image)">
                        @php
                            $file = getFiles("public/{$image->gallery_path}",true);
                            $file = basename($file);
                        @endphp
                        <img src="{{ asset("/images/medium/{$image->gallery_path}/{$file}") }}" class="w-full object-cover object-left-top" alt="{{ $image->name }}">
                        <div class="gallery-title p-2 text-center">{{ $image->name }}</div>
                    </x-reuse.gallery-item>
                @empty
                    <h1 class="text-xl">No galleries has been added in this category</h1>
                @endforelse
            </x-reuse.gallery-body>
        </x-reuse.gallery-wrapper>
        <div class="pb-4 w-full">
            {{ $gallery->links() }}
        </div>
    </section>
</x-main-layout>
