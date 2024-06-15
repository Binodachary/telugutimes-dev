<x-main-layout>
    <x-slot name="pageTitle">{{ $gallery->name }}</x-slot>
    <x-slot name="pageDescription">{{ $gallery->name }}</x-slot>
    <x-slot name="pageKeywords">{{ $gallery->name }}</x-slot>
    @if(\File::exists("storage/{$gallery->gallery_path}/"))
        @php
            $file = getFiles("public/{$gallery->gallery_path}",true);
            $img = basename($file)
        @endphp
        @if(!empty($img))
            <x-slot name="pageImage">{{ asset("storage/{$gallery->gallery_path}/{$img}") }}</x-slot>
        @endif
    @endif
    <section class="col-span-full space-y-3">
        <x-reuse.gallery-wrapper>
            <x-slot name="header">
                <h1>{{ $gallery->name }}</h1>
            </x-slot>
            <x-reuse.gallery-body>
                @if(\File::exists("storage/{$gallery->gallery_path}/"))
                    @php
                        $files = getFiles("public/{$gallery->gallery_path}");
                    @endphp
                    @forelse($files as $image)
                        @php($file = basename($image))
                        <x-reuse.gallery-item linkClass="glightbox" :link='asset("storage/{$gallery->gallery_path}/{$file}")'>
                            <img src="{{ asset("/images/medium/{$gallery->gallery_path}/{$file}") }}" class="w-full object-cover object-left-top" alt="{{ $gallery->name }}">
                        </x-reuse.gallery-item>
                    @empty
                        <h1 class="text-xl text-center text-red-500 w-full">No Images has been added in this
                                                                            gallery.</h1>
                    @endforelse
                @else
                    <h1 class="text-xl text-center text-red-500 w-full">Sorry..! this folder has been deleted.</h1>
                @endif
            </x-reuse.gallery-body>
        </x-reuse.gallery-wrapper>
    </section>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/glightbox.min.css') }}">
    </x-slot>
    <x-slot name="scripts">
        <script src="{{ asset('js/glightbox.min.js') }}"></script>
        <script>
            const lightbox = GLightbox();
        </script>
    </x-slot>
</x-main-layout>
