<x-main-layout>
    <section class="article-content col-span-2 px-4 pb-4 lg:px-0">
        <div class="main-heading">
            {{ $heading }} Videos
        </div>
        <div class="grid grid-cols-2 gap-4 md:grid-cols-3 xl:grid-cols-3">
            @if($videos->count() > 0)
                @foreach($videos as $video)
                    <x-site.video-card :video="$video" class="glightbox" href="https://www.youtube.com/embed/{{ $video->video_id }}" data-gallery="videos" :data-title="$video->title"/>
                @endforeach
            @else
                <h1>No Videos has been added till now...!</h1>
            @endif
        </div>
        <div class="font-semibold mt-4 py-3 text-gray-500 text-xs tracking-wide uppercase">
            {{ $videos->links() }}
        </div>
    </section>
    <aside class="col-span-1">
        <x-sidebar-news/>
    </aside>
</x-main-layout>
