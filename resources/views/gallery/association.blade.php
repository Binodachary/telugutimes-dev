<x-main-layout>
    <section class="col-span-full space-y-3">
        <x-reuse.gallery-wrapper>
            <x-slot name="header">
                <h1>{{ $association->name }} Association Galleries</h1>
                @if(!empty($association->site_url))
                    <a href="{{ $association->site_url }}" class="btn primary rounded-md" target="_blank">
                        Goto {{ $association->name }} association Website
                        <svg class="w-6 h-6 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                    </a>
                @endif
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
                    <h1 class="text-xl">No galleries has been added in this Association.</h1>
                @endforelse
            </x-reuse.gallery-body>
        </x-reuse.gallery-wrapper>
        <div class="pb-4 w-full">
            {{ $gallery->links() }}
        </div>
    </section>
</x-main-layout>
