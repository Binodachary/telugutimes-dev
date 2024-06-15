@if($highlights->isNotEmpty())
    <div class="main-heading">
        NEWS HIGHLIGHTS
        <a href="https://play.google.com/store/apps/details?id=net.telugutimes.news&hl=en_US" target="_blank"
           class="btn sm ml-auto text-purple-600 font-bold rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 pr-2" viewBox="0 0 24 26">
                <path d="M.465.441l-.012 12.34v12.762L14.04 12.781zm0 0" fill-rule="evenodd" fill="#00d8dd"/>
                <path d="M17.566 9.316l-5.398-3.035L.453.441l13.586 12.34zm0 0" fill-rule="evenodd" fill="#30ec4c"/>
                <path d="M.453 25.543v.016l11.715-6.278 5.395-3.035-3.524-3.465zm0 0" fill-rule="evenodd"
                      fill="#dc006c"/>
                <path d="M17.566 9.316l-3.527 3.465 3.527 3.465 5.489-3.082c.3-.172.3-.594 0-.766zm0 0"
                      fill-rule="evenodd" fill="#ff7e00"/>
                <path d="M.027.002L0 28.004v28.959l30.002-28.96zm0 0" transform="matrix(.45283 0 0 .44068 .453 .44)"
                      fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke="#000"/>
                <path d="M37.792 20.141l-11.921-6.887L0 .002l30.002 28.002zm0 0M0 56.963v.035l25.87-14.244 11.914-6.888-7.781-7.862zm0 0"
                      transform="matrix(.45283 0 0 .44068 .453 .44)" fill="none" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" stroke="#000"/>
                <path d="M37.792 20.141l-7.79 7.863 7.79 7.862 12.12-6.994a1.006 1.006 0 000-1.737zm0 0"
                      transform="matrix(.45283 0 0 .44068 .453 .44)" fill="none" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" stroke="#000"/>
            </svg>
            Download App </a>
    </div>
    <x-reuse.slider class="mb-4 shadow" options="{
            type: 'fade',
            perPage: 1,
            autoplay: true,
            pauseOnHover: true,
            interval: 8000,
            pagination: false
        }">
        @foreach($highlights as $highlight)
            <x-reuse.slider-item :link="route('article',$highlight)">
                <img class="h-96 w-full object-cover" src="{{ asset("/images/slider/{$highlight->image}") }}"
                     alt="{{ $highlight->title }}">
                <div class="truncate bg-white border border-t-0 p-2 text-black {{ $highlight->title_language == 'telugu' ? "telugu-heading text-2xl" : "english" }}">{{ $highlight->title }}</div>
            </x-reuse.slider-item>
        @endforeach
    </x-reuse.slider>
@endif