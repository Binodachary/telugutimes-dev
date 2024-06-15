{{--
<x-reuse.news-grid-body>
    @forelse($newsItems as $newsItem)
        <x-reuse.grid-item :link="route('article',$newsItem->slug)">
            <x-slot name="image">
                <img class="w-full" src="{{ asset("/images/medium/{$newsItem['image']}") }}" alt="{{ $newsItem['title'] }}">
            </x-slot>
            <x-slot name="title">{{ $newsItem->title }}</x-slot>
            <x-slot name="postedOn">{{ formatDate($newsItem->created_at) }}</x-slot>
            <x-slot name="description">{{ shortText($newsItem->description,10) }}</x-slot>
        </x-reuse.grid-item>
    @empty
        <h2 class="col-span-full text-center">No News added in this category.</h2>
    @endforelse
</x-reuse.news-grid-body>
--}}
@include("partials.home-tab-content",['items'=> $newsItems,'viewAllKey'=>$category])