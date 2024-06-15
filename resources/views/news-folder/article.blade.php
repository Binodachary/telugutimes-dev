<x-main-layout>
    <x-slot name="pageTitle">{{ $article->title }}</x-slot>
    <x-slot name="pageImage">{{ asset("storage/news/{$article->image}") }}</x-slot>
    <x-slot name="pageDescription">{{ shortText($article->description,15) }}</x-slot>
    <x-slot name="pageKeywords">{{ $article->keywords }}</x-slot>
    <div class="col-span-full">
        <div class="md:flex">
            <section class="article-content md:w-7/12 px-4 pb-4 lg:px-0">
                <div class="flex justify-end mt-3">
                    <div class="sharethis-inline-share-buttons"></div>
                </div>
                <h1 class="{{ $article->title_language == "telugu" ? 'telugu1 text-3xl' : "english text-xl" }} my-4">{{ $article->title }}</h1>
                <div class="flex flex-col">
                    @if($article->image)
                        <img src="{{ asset("/storage/news/{$article->image}") }}" alt="{{ $article->title }}" class="w-full">
                    @endif
                    <div class="telugu2 text-xl leading-relaxed space-y-4 font-bold mt-4 text-gray-500">
                        {!! $article->description !!}
                        {!! $article->description2 !!}
                        {!! $article->description3 !!}
                        {!! $article->description4 !!}
                        {!! $article->description5 !!}
                    </div>
                    <div class="font-bold">Tags :</div>
                    <div class="keyword-bar py-1 flex flex-wrap space-x-2 space-y-1">
                        @if(!empty($article->keywords))
                            @php
                                $keywords = array_map('trim',explode(',',$article->keywords));
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
            <section class="ad-column hidden md:flex md:w-2/12">
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- TT_USA_2021_Verticle_Ad_3 -->
                <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-3422284713546733" data-ad-slot="5016385082" data-ad-format="auto" data-full-width-responsive="true"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- TT_USA_2021_Verticle_Ad_3 -->
                <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-3422284713546733" data-ad-slot="5016385082" data-ad-format="auto" data-full-width-responsive="true"></ins>
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
