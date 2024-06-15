<div class="association-header main-heading justify-between">
    <h1 class="text-xl">Associations</h1>
    @if(request()->routeIs('home'))
        <a href="{{ route('associations') }}" class="btn sm primary">View all</a>
    @endif
</div>
@if($associations->count() > 0)
    <x-reuse.slider options="{type:'loop',perPage: 1,autoplay: true,pauseOnHover: true,interval: 6000,pagination: true,arrows:false}">
        @foreach($associations->chunk(10) as $newsItems)
            <x-reuse.carousel-item class="max-w-full">
                <div class="association-body gap-1 grid grid-cols-4 justify-items-stretch lg:grid-cols-4 xl:grid-cols-5">
                    @foreach($newsItems as $association)
                        <div class="association">
                            <a href="{{ route('association',$association->name) }}">
                                <img class="w-full" src="{{ asset("storage/gallery/association-logos/{$association->name}/{$association->logo}") }}" alt="{{ $association->name }}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </x-reuse.carousel-item>
        @endforeach
    </x-reuse.slider>
@else
    <h1 class="text-lg">No association has been added yet.</h1>
@endif
