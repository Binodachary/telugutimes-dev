<x-main-layout>
    <section class="col-span-full space-y-3">
        @if(!empty($subs))
            @foreach($subs as $sub)
                <x-reuse.gallery-wrapper>
                    <x-slot name="header">
                        <h1>{{ \Str::of($sub)->title() }}</h1>
                        <a href="{{ route('gallery.subCategory',[$category,$sub]) }}" class="btn sm rounded-md primary">
                            View all </a>
                    </x-slot>
                    <x-reuse.gallery-body>
                        @forelse($gallery[$sub] as $images)
                            <x-reuse.gallery-item :link="route('photos',$images)">
                                @php
                                    $file = getFiles("public/{$images->gallery_path}",true);
                                    $file = basename($file);
                                @endphp
                                <img src="{{ asset("/images/medium/{$images->gallery_path}/{$file}") }}" class="w-full object-cover object-left-top" alt="{{ $images->name }}">
                                <div class="gallery-title p-2 text-center">{{ $images->name }}</div>
                            </x-reuse.gallery-item>
                        @empty
                            <h1 class="text-xl">No galleries has been added in this category</h1>
                        @endforelse
                    </x-reuse.gallery-body>
                </x-reuse.gallery-wrapper>
            @endforeach
        @else
            <x-reuse.gallery-wrapper>
                <x-slot name="header">
                    <h1>{{ \Str::of($category)->title() }}</h1>
                    <a href="{{ route('gallery.subCategory',[$category,'all']) }}" class="btn sm rounded-full primary">
                        View all</a>
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
        @endif
    </section>
</x-main-layout>
