<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include("partials.meta-tags",[$pageTitle ?? "",$pageKeywords ?? "",$pageDescription ?? "",$pageImage ?? ""])
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ycp.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
   
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
<section class="lg:w-9/12 mx-auto min-h-screen flex flex-col justify-start" id="app">
{{-- <section class="mx-auto min-h-screen flex flex-col justify-center" id="app"> --}}
    @if(!empty($headerPartial))
        {{ $headerPartial }}
    @else
        @include("header1")
    @endif
</section>
<section class="lg:w-9/12 mx-auto min-h-screen flex flex-col justify-start" id="app">
    <div class="flex space-x-3 mt-3 flex-col lg:flex-row">
        @if(!empty($ads['menu-below']))
            @foreach($ads['menu-below'] as $ad)
                <a href="{{ $ad->url }}" target="_blank" class="block" title="{{ $ad->name }}">
                    <img class="w-full object-cover" src="{{ asset("storage/advertisements/{$ad->image}") }}"
                         alt="{{ $ad->name }}">
                </a>
            @endforeach
        @endif
    </div>
    {{ $welcomeNote ?? "" }}
    <main class="md:grid grid-cols-3 items-start md:divide-x-2 md:gap-x-3 px-2 lg:px-0">
        {{ $slot }}
    </main>
</section>
@livewireScripts
{{-- @include("partials.social-sticky") --}}
@include("footer")
<script src="{{ asset('js/app.js') }}" defer></script>
{{ $scripts ?? "" }}
</body>
</html>