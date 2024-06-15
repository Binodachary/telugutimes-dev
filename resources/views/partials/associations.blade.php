<div class="association-header main-heading justify-between">
    <h1 class="text-xl">Associations</h1>
    @if(request()->routeIs('home'))
        <a href="{{ route('associations') }}" class="btn text-base primary rounded">View all</a>
    @endif
</div>
@if($associations->count() > 0)
    <div class="association-body gap-1 grid grid-cols-3 justify-items-stretch lg:grid-cols-4 xl:grid-cols-5">
        @foreach($associations as $association)
            <div class="association">
                <a href="{{ route('association',$association->name) }}">
                    <img class="w-full" src="{{ asset("storage/gallery/association-logos/{$association->name}/{$association->logo}") }}" alt="{{ $association->name }}">
                </a>
            </div>
        @endforeach
    </div>
@else
    <h1 class="text-lg">No association has been added yet.</h1>
@endif
