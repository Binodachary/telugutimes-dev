<x-main-layout>
    <section class="col-span-full space-y-3">
        <x-reuse.gallery-wrapper>
            <x-slot name="header">
                <h1>{{ $newsFolder->name }}</h1>
            </x-slot>
            <x-reuse.gallery-body>
                @forelse($newsFolderItems as $newsItem)
                    <x-reuse.grid-item :link="route('news-article',$newsItem)">
                        <x-slot name="image">
                            <img class="w-full" src="{{ asset("/images/medium/{$newsItem->image}") }}" alt="{{ $newsItem->title }}">
                        </x-slot>
                        <x-slot name="title">{{ $newsItem->title }}</x-slot>
{{--                        <x-slot name="postedOn">{{ formatDate($newsItem->created_at) }}</x-slot>--}}
                        <x-slot name="description">
                            {{ shortText($newsItem->description,10) }}
                        </x-slot>
                        <x-slot name="galleryBar">
                            <div class="flex justify-between w-full text-base mt-auto">
                                @if($newsItem->gallery_id > 0)
                                    <a href="{{ route('photos',$newsItem->gallery) }}" class="flex english items-center leading-loose text-purple-600">
                                        <svg class="w-6 h-6 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        <span>View Gallery</span>
                                    </a>
                                @endif
                                @if($newsItem->video_id !='')
                                    <a href="https://www.youtube.com/embed/{{ $newsItem->video_id }}" data-title="{{ $newsItem->title }}" class="glightbox flex english items-center leading-loose text-purple-600">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path>
                                        </svg>
                                        <span>View Video</span>
                                    </a>
                                @endif
                            </div>
                        </x-slot>
                    </x-reuse.grid-item>
                @empty
                    <h1 class="text-xl">No News has been added to this News Folder.</h1>
                @endforelse
            </x-reuse.gallery-body>
        </x-reuse.gallery-wrapper>
        <div class="pb-4 w-full">
            {{ $newsFolderItems->links() }}
        </div>
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
