<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include("partials.meta-tags",[$pageTitle ?? "",$pageKeywords ?? "",$pageDescription ?? "",$pageImage ?? ""])
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ycp.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"> --}}
    {{ $styles ?? "" }}
    @livewireStyles
    <style>
        #st-1 {
            z-index: 40 !important;
        }
    </style> 
	
	<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-MLXHE0E115"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-MLXHE0E115');
</script> 
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9191323709031905"
     crossorigin="anonymous"></script>
</head>
<body class="font-sans antialiased">
<section class="lg:w-12/12 mx-auto min-h-screen flex flex-col justify-start" id="app">
    <div class="lg:w-12/12">
    @if(!empty($headerPartial))
        {{ $headerPartial }}
    @else
        @include("header1")
    </div>
    @endif
    <x-banner class="skyad1"/>
    <div class="lg:w-8/12 flex space-x-3 mt-3 flex-col lg:flex-row mx-auto">
        <?php //print_r($ads);?>
        @if(!empty($ads['menu-below']))
            @foreach($ads['menu-below'] as $ad)
            <?php //print_r($ad);?>
                <a href="{{ $ad->url }}" target="_blank" class="block" title="{{ $ad->name }}">
                    <img class="w-full object-cover" src="{{ asset("storage/advertisements/{$ad->image}") }}"
                         alt="{{ $ad->name }}">
                </a>
                
            @endforeach
        @endif
    </div>
    {{ $welcomeNote ?? "" }}
    <main class="lg:w-8/12 md:grid  grid-cols-3 items-start md:divide-x-2 md:gap-x-3 px-2 lg:px-0 mx-auto">
        {{ $slot }}
    </main>
    <x-banner class="skyad2"/>
</section>
@livewireScripts
<!-- @include("partials.social-sticky") -->
@include("footer")
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <script src="{{ asset('js/plugins.js')}}"></script> --}}
<!-- ycp JS -->
<script src="{{ asset('js/ycp.js')}}"></script>
<!-- Main JS -->
<script src="{{ asset('js/main.js')}}"></script>
    <!-- Slick Carousel JS -->
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
   

    <script>
        $(document).ready(function(){
            $('.post-carousel-1').slick({
                autoplay: true,
                autoplaySpeed: 2000, // 2 seconds
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
            });
        });
        
        document.addEventListener("DOMContentLoaded", function() {
        // Get all tab links
        const tabLinks = document.querySelectorAll('.tab-link');

        // Add click event listeners to each tab link
        tabLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();

                // Remove active class from all tab links
                tabLinks.forEach(function(tab) {
                    tab.classList.remove('active');
                });

                // Add active class to the clicked tab link
                link.classList.add('active');

                // Get the target tab content ID
                const targetId = link.getAttribute('data-tab-target');

                // Hide all tab panes
                const tabContents = document.querySelectorAll('.tab-pane');
                tabContents.forEach(function(tab) {
                    tab.classList.remove('active');
                });

                // Show the target tab pane
                const targetTabPane = document.querySelector(targetId);
                if (targetTabPane) {
                    targetTabPane.classList.add('active');
                }
            });
        });
    });
    </script>
{{ $scripts ?? "" }}
</body>
</html>