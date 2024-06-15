<x-main-layout>
    <x-slot name="pageTitle">Latest Telugu News | తెలుగు వార్తలు | NRI Telugu News Paper in USA - Telugu Times</x-slot>
    <x-slot name="pageDescription"> Read all the Latest Telugu News. Online edition of the largest circulated Telugu daily News, Telangana News, Andra Pradesh News, USA Nris News, తెలుగు తాజా వార్తలు, బ్రేకింగ్ న్యూస్.    </x-slot>
    <x-slot name="pageKeywords">telugu news, latest telugu news, telugu news today, latest news in telugu, telugu news online, breaking news telugu, flash news telugu, latest telugu news today, today breaking news in telugu, telugu varthalu,Telugu News Headlines, Telugu Breaking News,తెలుగు తాజా వార్తలు, బ్రేకింగ్ న్యూస్,తెలుగు వార్తలు, Andhra News, Telangana News, Telugu News, Exclusive News, daily news Updates, Best News App, Sharing news, news Updates, News Today, Today News Updates, Village News, constituency news, mandal news, huge reporters, reporter news, reporters are the real hero's, district news, state news, heroin hot photo gallery</x-slot>
    <x-slot name="welcomeNote">
        @includeWhen(!empty($welcomeNote),'partials.welcomeNote',compact('welcomeNote'))
    </x-slot>
    @if(isset($header_partial))
        <x-slot name="headerPartial">
            @include($header_partial)
        </x-slot>
    @endif
    <section class="col-span-2">
        <div class="slider-below-ads w-full space-y-2 mb-3">
            @if(!empty($ads['highlight-news-below']))
                @foreach($ads['highlight-news-below'] as $ad)
                    <a href="{{ $ad->url }}" target="_blank" class="block" title="{{ $ad->name }}">
                        <img class="w-full object-cover" src="{{ asset("storage/advertisements/{$ad->image}") }}"
                             alt="{{ $ad->name }}">
                    </a>
                @endforeach
            @endif
        </div>
        <div class="md:hidden">
            <div class="main-heading justify-center">
                <a href="{{ route('advertise') }}"> Advertise With Us !!!</a>
            </div>
            @if(!empty($ads['home-right-slider']))
                <div class="sidebar-component">
                    <x-reuse.slider class="my-4 shadow">
                        @foreach($ads['home-right-slider'] as $ad)
                            <x-reuse.slider-item :link="$ad->url" newPage="true">
                                <img class="w-full object-cover"
                                     src="{{ asset("storage/advertisements/{$ad->image}") }}"
                                     alt="{{ $ad->name }}">
                                <div class="bg-white border border-t-0 p-2 text-black">{{ $ad->name }}</div>
                            </x-reuse.slider-item>
                        @endforeach
                    </x-reuse.slider>
                </div>
                @if(!empty($ads['home-right-top']))
                    @foreach($ads['home-right-top'] as $ad)
                        <a href="{{ $ad->url }}" target="_blank" class="block" title="{{ $ad->name }}">
                            <img class="w-full object-cover" src="{{ asset("storage/advertisements/{$ad->image}") }}"
                                 alt="{{ $ad->name }}">
                        </a>
                    @endforeach
                @endif
                <div loading="lazy" data-mc-src="9c8a2176-bc25-44f7-8be0-28ef887be051#youtube"></div>
            @endif
        </div>
        <x-highlight-news :language="$language"/>
        <div class="slider-below-ads grid gap-4 grid-cols-4 mb-3">
            @if(!empty($ads['advertise-title-below']))
                @foreach($ads['advertise-title-below'] as $ad)
                    <a href="{{ $ad->url }}" target="_blank" class="block" title="{{ $ad->name }}">
                        <img class="w-full object-cover" src="{{ asset("storage/advertisements/{$ad->image}") }}"
                             alt="{{ $ad->name }}">
                    </a>
                @endforeach
            @endif
        </div>
        <div class="tab-boxes space-y-3">
            @foreach($categories as $key=>$category)
                <tabs heading="{{ $category }}" link-class="text-white" active-class="border-b-2 border-white">
                    <tab title="All">
                        @include("partials.home-tab-content",['items'=> $news[$key],'viewAllKey'=>$key])
                    </tab>
                    @foreach($tabs[$key] as $tab)
                        <tab title="{{ $tab->name }}">
                            @livewire('fetch-posts', ['category' => $tab])
                        </tab>
                    @endforeach
                </tabs>
            @endforeach
        </div>
        <div class="association-wrapper">
            @include("partials.associations-carousel",$associations)
        </div>
        <div class="sidebar-components-adjusted lg:grid grid-cols-2 gap-2 mt-4">
            <!-- @include('partials.home-sidebar-slider',
            [
                'heading'=>'Political Articles',
                'items'=> $sidebarNews['political-articles'],
                'linkRoute'=> 'article',
                'filter' => 'review',
                'image' => 'image',
                'text' => 'title',
                'notAdded' => 'Political articles',
                'url' => route("categoryNews",'political-articles')
            ])-->
            @include('partials.home-sidebar-slider',
            [
                'heading'=>'Cinema Reviews',
                'items'=> $sidebarNews['cinema-reviews'],
                'linkRoute'=> 'article',
                'filter' => 'review',
                'image' => 'image',
                'text' => 'title',
                'notAdded' => 'Cinema reviews',
                'url' => route("categoryNews",'cinema-reviews')
            ])
            @include('partials.home-sidebar-slider',
            [
                'heading'=>'Cinema Interviews',
                'items'=> $sidebarNews['cinema-interviews'],
                'linkRoute'=> 'article',
                'filter' => 'review',
                'image' => 'image',
                'text' => 'title',
                'notAdded' => 'Cinema Interviews',
                'url' => route("categoryNews",'cinema-interviews')
            ])
        </div>
    </section>
    <aside class="col-span-1 pl-3 py-2">
        <div class="hidden md:block">
            <div class="main-heading justify-center">
                <a href="{{ route('advertise') }}"> Advertise With Us !!!</a>
            </div>
            @if(!empty($ads['home-right-slider']))
                <div class="sidebar-component">
                    <x-reuse.slider class="my-4 shadow">
                        @foreach($ads['home-right-slider'] as $ad)
                            <x-reuse.slider-item :link="$ad->url" newPage="true">
                                <img class="w-full object-cover"
                                     src="{{ asset("storage/advertisements/{$ad->image}") }}"
                                     alt="{{ $ad->name }}">
                                <div class="bg-white border border-t-0 p-2 text-black">{{ $ad->name }}</div>
                            </x-reuse.slider-item>
                        @endforeach
                    </x-reuse.slider>
                </div>
                @if(!empty($ads['home-right-top']))
                    @foreach($ads['home-right-top'] as $ad)
                        <a href="{{ $ad->url }}" target="_blank" class="block" title="{{ $ad->name }}">
                            <img class="w-full object-cover" src="{{ asset("storage/advertisements/{$ad->image}") }}"
                                 alt="{{ $ad->name }}">
                        </a>
                    @endforeach
                @endif
                <div loading="lazy" data-mc-src="9c8a2176-bc25-44f7-8be0-28ef887be051#youtube"></div>
            @endif
        </div>
        @include('partials.home-sidebar-slider',
        [
            'heading'=>'TT e-Paper (Fort Night)',
            'items'=> $epapers,
            'linkRoute'=> 'edition',
            'filter' => 'review',
            'folder' => 'folder',
            'text' => 'edition_year,edition_month,name',
            'notAdded' => 'Epapers',
            'url' => route("epapers")
        ])
        <!--<a href="https://www.youtube.com/@telugutimesyoutube" target="_blank">
            <img class="w-full object-cover" src="/images/tt-yt.jpg" alt="TeluguTimes-Youtube-Channel">
        </a> -->
        @include('partials.home-sidebar-slider',
        [
            'heading'=>'Upcoming Events',
            'items'=> $sidebarNews['events'],
            'linkRoute'=> 'article',
            'filter' => 'review',
            'image' => 'image',
            'text' => 'title',
            'notAdded' => 'Upcoming events',
            'url' => route("categoryNews",'events')
        ])
        @include('partials.home-sidebar-slider',
        [
            'heading'=>'Cinema Gallery',
            'items'=> $cinema_gallery,
            'linkRoute'=> 'photos',
            'filter' => 'review',
            'folder' => 'gallery_path',
            'text' => 'name',
            'notAdded' => 'Cinema galleries',
            'url' => route("gallery.category","cinema")
        ])
        @include('partials.home-sidebar-slider',
        [
            'heading'=>'Community Gallery',
            'items'=> $community_gallery,
            'linkRoute'=> 'photos',
            'filter' => 'review',
            'folder' => 'gallery_path',
            'text' => 'name',
            'notAdded' => 'Community galleries',
            'url' => route("gallery.category",'america')
        ])
        <!-- <div class="embed-responsive embed-responsive-16by9 mb-3 shadow-lg">
            <iframe class="embed-responsive-item w-full h-64 lg:h-48" src="https://www.youtube.com/embed/BXehN2VysLc"
                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen=""></iframe>
        </div>-->
    </aside>
    @include('home-scripts')
</x-main-layout>
