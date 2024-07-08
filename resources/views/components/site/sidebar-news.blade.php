<section class="pl-3 sidebar-news space-y-3 pb-3">
    <div class="sidebar-news-wrapper">
        <div class="main-heading">Highlight Nes</div>
        <div class="sidebar-news-body space-y-2">
            @forelse($highlights as $highlight)
                <div class="sidebar-news-item bg-gray-200 shadow-md telugu2 text-sm font-bold text-gray-500 overflow-hidden overflow-ellipsis">
                    <a href="{{ route('article',$highlight) }}" class="flex space-x-2 items-center">
                        <img src="{{ asset("/images/small/{$highlight->image}") }}" class="w-32 h-28 lg:h-16 lg:w-24 object-fill" alt="{{ $highlight->title }}">
                        <div class="content-wrapper">
                            <h5 class="text-lg lg:text-sm telugu1 mb-1 font-normal text-gray-700">{{ $highlight->title }}</h5>
                            {{ shortText($highlight->description,5) }}
                        </div>
                    </a>
                </div>
            @empty
                <h3 class="text-lg">No highlights added yet.</h3>
            @endforelse
        </div>
    </div>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9191323709031905"
     crossorigin="anonymous"></script>
<ins class="adsbygoogle"
     style="display:block; text-align:center;"
     data-ad-layout="in-article"
     data-ad-format="fluid"
     data-ad-client="ca-pub-9191323709031905"
     data-ad-slot="7976032360"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script> 
    <div class="sidebar-news-wrapper">
        <div class="main-heading">Cinema News</div>
        <div class="sidebar-news-body space-y-2">
            @forelse($cinemaNews as $cinema)
                <div class="sidebar-news-item bg-gray-200 shadow-md telugu2 text-sm font-bold text-gray-500 overflow-hidden overflow-ellipsis">
                    <a href="{{ route('article',$cinema) }}" class="flex space-x-2 items-center">
                        <img src="{{ asset("/images/small/{$cinema->image}") }}" class="w-32 h-28 lg:h-16 lg:w-24 object-fill" alt="{{ $cinema->title }}">
                        <div class="content-wrapper">
                            <h5 class="text-lg lg:text-sm telugu1 mb-1 font-normal text-gray-700">{{ $cinema->title }}</h5>
                            {{ shortText($cinema->description,5) }}
                        </div>
                    </a>
                </div>
            @empty
                <h3 class="text-lg">No Cinema news added yet.</h3>
            @endforelse
        </div>
    </div>
</section>
