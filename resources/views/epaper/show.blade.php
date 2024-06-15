<x-main-layout>
    <section class="article-content col-span-2 px-4 pb-4 lg:px-0">
        <div class="main-heading justify-between">
            <h1>e Paper Edition
                of {{ $epaper->edition_month.' '.$epaper->edition_year }} {{ $epaper->name ? "({$epaper->name})" : "" }}</h1>
            <a href="{{ route('epapers') }}" class="btn sm primary rounded-md primary">Read all issues</a>
        </div>
        <x-reuse.slider options='{"autoplay":false,"pagination":false}' class="mb-4">
            @foreach($images as $image)
                <x-reuse.slider-item :link='asset("storage/{$epaper->folder}/{$image}")' linkClass="glightbox">
                    <img class="w-full border border-gray-300 object-cover" src="{{ asset("images/epaper/{$epaper->folder}/{$image}") }}" alt="{{ $image }}">
                </x-reuse.slider-item>
            @endforeach
        </x-reuse.slider>
    </section>
    <aside class="col-span-1">
        <x-sidebar-news/>
    </aside>
    <x-slot name="styles">
        <style>
            .glightbox-container .gslider {
                align-items: baseline!important;-webkit-box-align: baseline!important;-ms-flex-align: baseline!important;
            }
        </style>
    </x-slot>
	
	<!--<iframe style='width:900px;height:500px' src='https://online.pubhtml5.com/baaxt/wpzg/'  seamless='seamless' scrolling='no' frameborder='0' allowtransparency='true' allowfullscreen='true' ></iframe>-->
</x-main-layout>
