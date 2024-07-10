<x-main-layout>
    <x-slot name="pageTitle">Latest Telugu News | తెలుగు వార్తలు | NRI Telugu News Paper in USA - Telugu Times</x-slot>
    <x-slot name="pageDescription"> Read all the Latest Telugu News. Online edition of the largest circulated Telugu
        daily News, Telangana News, Andra Pradesh News, USA Nris News, తెలుగు తాజా వార్తలు, బ్రేకింగ్ న్యూస్. </x-slot>
    <x-slot name="pageKeywords">telugu news, latest telugu news, telugu news today, latest news in telugu, telugu news
        online, breaking news telugu, flash news telugu, latest telugu news today, today breaking news in telugu, telugu
        varthalu,Telugu News Headlines, Telugu Breaking News,తెలుగు తాజా వార్తలు, బ్రేకింగ్ న్యూస్,తెలుగు వార్తలు,
        Andhra News, Telangana News, Telugu News, Exclusive News, daily news Updates, Best News App, Sharing news, news
        Updates, News Today, Today News Updates, Village News, constituency news, mandal news, huge reporters, reporter
        news, reporters are the real hero's, district news, state news, heroin hot photo gallery</x-slot>
    <x-slot name="welcomeNote">
        @includeWhen(!empty($welcomeNote), 'partials.welcomeNote', compact('welcomeNote'))
    </x-slot>
    @if (isset($header_partial))
        <x-slot name="headerPartial">
            @include($header_partial)
        </x-slot>
    @endif
   
                <!-- News Headlines Section -->
                <div class="w-full md:w-11/12 lg:w-full h-full mt-3">
                    <div class="headlines">
                        <h4 class="telugu">ముఖ్యాంశాలు | News Headlines</h4>
                    </div>

                    <!-- Hero Post Slider Start -->
                    <div class="post-carousel-1 newshighlights">
                        <!-- Overlay Post Start -->
                       
                        @foreach ($highlights as $highlight)
                            <div class="post post-large post-overlay hero-post">
                                <div class="post-wrap">
                                    <!-- Image -->
                                    <div class="image"><img src="{{ asset("/images/small/{$highlight->image}") }}"
                                            alt="{{ $highlight->title }}"></div>
                                    <!-- Category -->
                                    <a href="{{ route('article', $highlight)}}" class="category politic"></a>
                                    <!-- Content -->
                                    <div class="content">
                                        <!-- Title -->
                                        <h2 class="title telugu"><a href="{{route('article', $highlight)}}">{{ shortText($highlight->description, 5) }}</a></h2>
                                    </div>
                                </div>
                            </div><!-- Overlay Post End -->
                        @endforeach
                        
                        
                        <!-- Overlay Post End -->
                        <!-- Overlay Post End -->
                    </div>

                    <!-- Google Square Ad -->
                    <div class="squaread mt-10 hidden lg:block">
                        <p>Google Adspace</p>
                        <p>"medium rectangle 300x160"</p>
                    </div>
                </div>
                <div class="w-full md:w-11/12 lg:w-full h-full mt-3">
                    <div class="sidebar-block-wrapper">
                        <!-- Sidebar Block Head Start -->
                        <div class="head education-head">
                            <!-- Tab List -->
                            <div class="sidebar-tab-list education-sidebar-tab-list nav">
                                <a class="tab-link active" data-tab-target="#community">Community News</a>
                                <a class="tab-link" data-tab-target="#usanri">Associations</a>
                            </div>
                        </div><!-- Sidebar Block Head End -->

                        <!-- Sidebar Block Body Start -->
                        <div class="body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="community">
                                    <ul class="post telugu">
                                        @foreach ($news_details as $news_data)
                                        <li><a href="#">{{shortText($news_data->title,10)}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="tab-pane assoications" id="usanri">
                                    {{-- <ul class="">
                                        @foreach ($uri_news as $usa_news)
                                        <li><a href="#">{{shortText($usa_news->title,9)}}</a></li>
                                        @endforeach
                                    </ul> --}}
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

                                </div>
                            </div>
                        </div><!-- Sidebar Block Body End -->
                    </div>

                    <!-- Google Square Ad -->
                    <div class="squaread mt-10 hidden lg:block">
                        <p>Google Adspace</p>
                        <p>"medium rectangle 300x160"</p>
                    </div>
                </div>
                <!-- NRI News Section -->
                <div class="w-full md:w-11/12 lg:w-full h-full mt-3">
                    <div class="post-carousel-1 adspace">
                        <!-- Overlay Post Start -->
                        {{-- @php print_r($ads);  @endphp --}}
                        @foreach($ads['home-right-slider'] as $ad)
                        
                        <div class="post post-large post-overlay hero-post">
                            <div class="post-wrap">

                                <!-- Image -->
                                <div class="image"><a href="#!"><img src="{{ asset("storage/advertisements/{$ad->image}") }}" alt="{{ $ad->name }}"></a>
                                </div>

                                <!-- Category -->
                                <a href="#!" class="category politic">Ad Space</a>

                            </div>
                        </div>
                        @endforeach
                        
                    </div> 
                </div>
                <div class="w-full md:w-11/12 lg:w-full h-full mt-3">

                    <!-- Political news -->

                    <div class="sidebar-block-wrapper">

                        <!-- Sidebar Block Head Start -->
                        <div class="head feature-head bluebg">

                            <!-- Title -->
                            <h4 class="title telugu">రాజకీయం | Political News</h4>

                        </div><!-- Sidebar Block Head End -->

                        <!-- Sidebar Block Body Start -->
                        <div class="body">

                            <ul class="post telugu">
                                @foreach ($poli_news_details as $poli_news_data)
                               
                                <li><a href="#">{{shortText($poli_news_data->title,10)}}</a></li>
                                @endforeach
                                {{-- <li><a href="#!">లోకేష్ ఫోన్ ట్యాప్! ఈసీకి టీడీపీ కంప్లైంట్</a></li>
                                <li><a href="#!">ధాన్యం కొనుగోలు, నీటి సరఫరా అంశాలపై స్పందించిన రేవంత్
                                        రెడ్డి</a></li>
                                <li><a href="#!">షర్మిలపై విజయ్ సాయి రెడ్డి సంచలన వ్యాఖ్యలు</a></li>
                                <li><a href="#!">ప్రచార బరిలో బాలయ్య</a></li>
                                <li><a href="#!">గుంటూరు లో వైసీపీ కి ఊహించని ఎదురుదెబ్బ..</a></li>
                                <li><a href="#!">ఆ పార్టీ ఒక్క సీటు గెలిస్తే.. తాను దేనికైనా సిద్ధమే : మంత్రి
                                        కోమటిరెడ్డి</a></li>
                                <li><a href="#!">షర్మిలపై విజయ్ సాయి రెడ్డి సంచలన వ్యాఖ్యలు</a></li> --}}
                            </ul>

                        </div><!-- Sidebar Block Body End -->

                        <!-- Read More Button -->
                        <a href="#" class="read-more">Read more...</a>
                    </div>
                    <!-- Political news ends-->
                </div>

     
</x-main-layout>
