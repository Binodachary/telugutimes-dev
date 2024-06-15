<x-main-layout>
    <section class="article-content col-span-3 px-4 pb-4 lg:px-0">
        <iframe scrolling=no src="/subscribe.php" frameborder="no" style="width:99%; height:90px; margin:9px"></iframe>
		<div class="main-heading justify-between">
            <h1>Telugu Times ePaper: {{ $epaper->edition_year.' '.$epaper->edition_month }} {{ $epaper->name ? "{$epaper->name}" : "" }}</h1>
            <a href="{{ route('epapers') }}" class="btn sm primary rounded-md primary">Read all issues</a>
        </div>
        <div class="flex space-x-3">
            <div id="epaperCarousel" class="w-full">
                <epaper-carousel :items='@json($images)' :epaper='{{ $epaper }}'></epaper-carousel>
            </div>
        </div>
    </section>
    <x-slot name="styles">
        <style>
            .glightbox-container .gslider {
                align-items: baseline !important;
                -webkit-box-align: baseline !important;
                -ms-flex-align: baseline !important;
            }
        </style>
    </x-slot>
	<!--section class="col-span-full article-content lg:px-0">
        <div class="flex" style="justify-content: center">
                <iframe style='width:90%;height:540px' src='https://pubhtml5.com/bookcase/qchny//gold'  seamless='seamless' scrolling='no' frameborder='0' allowtransparency='true' allowfullscreen ></iframe></center>
        </div>
	  <div class="main-heading justify-between">
            <h1><a href=# class="btn sm primary rounded-md primary">TT ePaper - Last Year's Issues</a></h1>
            <a href="https://telugutimes.net/epaper/all" class="btn sm primary rounded-md primary">TT ePaper - Previous Issues Archive</a>
        </div>
    </section-->
</x-main-layout>
