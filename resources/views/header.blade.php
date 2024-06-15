@php
    $items = include_once(resource_path('/views/menu-items-array.php'));
@endphp
<header id="header">
    <x-header-ads/>
<!--    <div class="w-full">
        <img src="https://via.placeholder.com/1140x95?text=Advertisement" class="my-2 mx-auto" alt="advertisement">
    </div>
    <div class="logo-wrapper flex flex-col md:flex-row items-center lg:space-x-2">
        <div class="lg:w-3/12 w-full">
            <a href="/" class="block"> <img src="/images/tt_logo.png" class="w-56 lg:w-full mx-auto" alt="Logo"> </a>
        </div>
        <div class="lg:w-9/12">
            <img src="https://via.placeholder.com/840x95?text=Advertisement" class="my-2 mx-auto" alt="advertisement">
        </div>
    </div>-->
<!--    <div class="special-menu-items flex flex-wrap space-y-2 pb-2 justify-center items-baseline space-x-1 lg:justify-between">
        <a class="bg-blue-600 inline-flex lg:mb-0 text-xs text-white xl:text-sm xl:font-bold px-2 py-1 rounded-md hover:text-yellow-400 transition ease-in duration-300" href="{{ route('epaper') }}" target="_blank">
            e - Paper </a>
        <a class="bg-blue-600 inline-flex lg:mb-0 text-xs text-white xl:text-sm xl:font-bold my-2 px-2 py-1 rounded-md hover:text-yellow-400 transition ease-in duration-300" href="/events" target="_blank">Events</a>
        <a class="bg-blue-600 inline-flex lg:mb-0 text-xs text-white xl:text-sm xl:font-bold px-2 py-1 rounded-md hover:text-yellow-400 transition ease-in duration-300" href="{{ route('news-folders') }}" target="_blank">
            News Folders </a>
        <a class="bg-blue-600 inline-flex lg:mb-0 text-xs text-white xl:text-sm xl:font-bold my-2 px-2 py-1 rounded-md hover:text-yellow-400 transition ease-in duration-300" href="{{ route('gallery.category','america') }}" target="_blank">
            NRI Galleries </a>
        <a class="bg-blue-600 inline-flex lg:mb-0 text-xs text-white xl:text-sm xl:font-bold px-2 py-1 rounded-md hover:text-yellow-400 transition ease-in duration-300" href="{{ route('nats-pdf') }}" target="_blank">
            NATS Sevalu in Covid Period (eBook) </a>
        <a class="bg-blue-600 inline-flex lg:mb-0 text-xs text-white xl:text-sm xl:font-bold px-2 py-1 rounded-md hover:text-yellow-400 transition ease-in duration-300" href="{{ route('tana-pdf') }}" target="_blank">
            TANA Sevalu in Covid Period (eBook) </a>
    </div>-->
    <x-reuse.menu :items="$items"/>
</header>

