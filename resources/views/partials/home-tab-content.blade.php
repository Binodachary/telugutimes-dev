<div class="tab-wrapper max-w-full w-full">
    @if($items->isNotEmpty())
        <x-reuse.slider options="{
                            type: 'loop',
                            perPage: 1,
                            autoplay: true,
                            pauseOnHover: true,
                            interval: 8000,
                            pagination: true,
                            arrows:false
                            }">
            @foreach($items->chunk(9) as $newsItems)
                <x-reuse.carousel-item class="max-w-full">
                    <x-reuse.news-grid-body>
                        @foreach($newsItems as $newsItem)
                            <x-reuse.grid-item-small :link="route('article',$newsItem->slug)">
                                <x-slot name="image">
                                    <img class="w-24 h-14 object-cover object-center text-xs font-light"
                                         src="{{ asset("/images/small/{$newsItem->image}") }}"
                                         alt="{{ $newsItem->title }}">
                                </x-slot>
                                <x-slot name="title">{{ $newsItem->title }}</x-slot>
                                <x-slot name="postedOn">{{ formatDate($newsItem->created_at) }}</x-slot>
                            </x-reuse.grid-item-small>
                        @endforeach
                    </x-reuse.news-grid-body>
                </x-reuse.carousel-item>
            @endforeach
        </x-reuse.slider>
    @else
        <h2 class="col-span-full text-center">No News added in this category.</h2>
    @endif
    <a href="{{ route('categoryNews',$viewAllKey) }}" class="btn sm primary ml-auto mt-3 max-w-max">View all</a>
</div>