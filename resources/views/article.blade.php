<x-main-layout>
    <x-slot name="pageTitle">{{ $news->title }}</x-slot>
    <x-slot name="pageImage">{{ asset("storage/news/{$news->image}") }}</x-slot>
    <x-slot name="pageDescription">{{ shortText($news->description,15) }}</x-slot>
    <x-slot name="pageKeywords">{{ $news->keywords }}</x-slot>
    <div class="col-span-full">
        <div class="md:flex">
           <section class="article-content md:w-7/12 px-4 pb-4 lg:px-0">
                <div class="flex justify-end mt-3">
                    <div class="sharethis-inline-share-buttons"></div>
                </div>
                <h1 class="{{ $news->title_language == "telugu" ? 'telugu1 text-3xl' : "english text-xl" }} my-4">{{ $news->title }}</h1>
                <div class="flex flex-col">
                    @if($news->image)
                        <img src="{{ asset("storage/news/{$news->image}") }}" alt="{{ $news->title }}" class="w-full">
                    @endif
                    <div class="telugu2 text-xl space-y-4 leading-relaxed font-bold mt-4 text-gray-500">
						{!! $news->description !!}
						{!! $news->description2 !!}						 
						<a href="https://radhaspaces.com/radha-county/" target="_blank"><img src="/storage/article-ads/radha-county.jpg" alt="praneet"></a>                 
						<a href="https://asbl.in/loft/" target="_blank"><img src="/storage/article-ads/loft.jpeg" alt="praneet"></a>                 
						<a href="https://praneeth.com/" target="_blank"><img src="/storage/article-ads/praneet-ads.jpg" alt="praneet"></a>                 
						<a href="#" target="_blank"><img src="/storage/article-ads/obili-garuda-ads.jpg" alt="obili-garuda"></a>
						{!! $news->description3 !!}
                        {!! $news->description4 !!}
						<a href="https://vertexhomes.com/vertex-projects/vertex-33-west" target="_blank"><img src="/storage/article-ads/vertex.jpeg" alt="Vertex"></a> 
						<!--<a href="https://www.aha.video/" target="_blank"><img src="/storage/article-ads/aha-ads.jpg" alt="AHA"></a> -->
						<a href="https://www.poulomi.in/residential/avante/" target="_blank"><img src="/storage/article-ads/poulomi-ads.jpg" alt="poulomi"></a> 
                        {!! $news->description5 !!}
						<a href="https://www.pngjewellers.com/" target="_blank"><img src="/storage/article-ads/png-jewelry-ads.jpg" alt="Png-jewelry"></a> 
						<!--<a href="https://www.aurobindorealty.com/portfolio/the-pearl/" target="_blank"><img src="/storage/article-ads/aurobindo-ads.jpg" alt="aurobindo"></a> 
						<a href="https://muppaprojects.com/muppas-melody/" target="_blank"><img src="/storage/article-ads/muppa-ads.jpg" alt="MUPPA"></a> -->
                    </div>
                    <div class="font-bold">Tags :</div>
                    <div class="keyword-bar py-1 flex flex-wrap space-y-1 space-x-3">
                        @if(!empty($news->keywords))
                            @php
                                $keywords = array_map('trim',explode(',',$news->keywords));
                            @endphp
                            @if(!empty($keywords))
                                @foreach($keywords as $keyword)
                                    <a href="#" class="btn sm rounded-md border-gray-400"># {{ $keyword }}</a>
                                @endforeach
                            @endif
                        @endif
                    </div>
                </div>
            </section> 
			 <section class="ad-column md:flex md:w-2/12">
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9191323709031905"
     crossorigin="anonymous"></script>
<!-- TT_Article_Ad -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9191323709031905"
     data-ad-slot="4003383360"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script> 
                
				<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9191323709031905"
     crossorigin="anonymous"></script>
<!-- TT_Article_ad_2 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9191323709031905"
     data-ad-slot="8872566666"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
            </section>
            <aside class="md:w-3/12">
                <x-sidebar-news/>
            </aside>
        </div>
    </div>
</x-main-layout>
