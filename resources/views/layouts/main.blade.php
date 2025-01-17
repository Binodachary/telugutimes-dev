<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include("partials.meta-tags",[$pageTitle ?? "",$pageKeywords ?? "",$pageDescription ?? "",$pageImage ?? ""])
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ycp.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <meta name="google-adsense-account" content="ca-pub-1037561410743863">

    {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css"/> --}}
    
    {{ $styles ?? "" }}
    @livewireStyles
    <style>
        #st-1 {
            z-index: 40 !important;
        }
    </style> 
	
	<!-- Google tag (gtag.js) -->
{{-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-MLXHE0E115"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-MLXHE0E115');
</script>  --}}
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YPKCM69VL9"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YPKCM69VL9');
</script>
{{-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1037561410743863"
     crossorigin="anonymous"></script> --}}
{{-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9191323709031905"
     crossorigin="anonymous"></script> --}}
     <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1037561410743863"
     crossorigin="anonymous"></script>
</head>
<body class="font-sans antialiased">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1037561410743863"
     crossorigin="anonymous"></script>
<section class="lg:w-full mx-auto min-h-screen  flex-col justify-start overflow-hidden" id="app">
   
        @if(!empty($headerPartial))
            {{ $headerPartial }}
        @else
            @include("header1")
    @endif
    
    <x-banner class="skyad1"/>
    <div class="container flex lg:space-x-3 space-y-1  mt-3 flex-col lg:flex-row mx-auto">
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
    {{-- <main class="container items-start md:divide-x-2 md:gap-x-3 px-1 lg:px-0 mx-auto flex flex-wrap"> --}}
    <main class="lg:grid grid-cols-3 container items-start  md:gap-x-3 px-1 lg:px-0 mx-auto flex flex-wrap">
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
<script src="{{ asset('js/plugins.js')}}"></script>
    <!-- Slick Carousel JS -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> --}}
    
   

    <script>
        $(document).ready(function(){
            $('.post-carousel-1').slick({
                autoplay: true,
                autoplaySpeed: 5000,
                pauseOnFocus: false,
                pauseOnHover: false,
                infinite: true,
                arrows: true,
                slidesToShow: 1,
                prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
                responsive: [
                    {
                    breakpoint: 350,
                    settings: {
                        arrows: false,
                    }
                    }
                ]
            });
            $('.sidebar-post-carousel').slick({
                autoplay: true,
                autoplaySpeed: 5000,
                pauseOnFocus: false,
                pauseOnHover: false,
                infinite: true,
                arrows: true,
                slidesToShow: 1,
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
                const tabContents = document.querySelectorAll('.tab-pane2');
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