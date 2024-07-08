<nav v-click-outside="closeSidebar" :class="{'lg:fixed lg:top-0 lg:w-12/12': stickyHeader }" style="background-image: linear-gradient(#032870, #264d98);;" class="border-b w-full z-10">
   
    <div class=" lg:w9/12 h-10 flex justify-center">
        
        <div class="  hidden md:flex items-center   justify-center">
            {{-- <x-reuse.menu-item href="/" style="padding-top: 8px!important;" :active="request()->routeIs('home')"> --}}
                <x-reuse.menu-item href="/" style="padding-top: 8px!important;">
                Home
            </x-reuse.menu-item>
            @foreach($items as $item)
                <x-reuse.menu-item href="{{ url($item['url']) }}" :active="menuActiveHelper($item)" dropdownText="{{ $item['text'] }}" hasDropdown="{{ $item['dropdown'] }}"> {{ $item['text'] }}
                    @if($item['dropdown'])
                        <x-slot name="links">
                            @foreach($item['items'] as $link)
                                <x-reuse.dropdown-link href="{{ url($link['url']) }}" :active="menuActiveHelper($link)">{{ $link['text'] }}</x-reuse.dropdown-link>
                            @endforeach
                        </x-slot>
                    @endif
                </x-reuse.menu-item>
            @endforeach
            <x-reuse.menu-item href="/epaper" class="highlight-menu-item text-xs">E-paper</x-reuse.menu-item>
            @if(request()->routeIs('homeEng'))
                <x-reuse.menu-item href="/" class="highlight-menu-item text-xs">TT in తెలుగు.</x-reuse.menu-item>
            @else
                <x-reuse.menu-item href="{{ route('homeEng','eng') }}" class="highlight-menu-item" :active="request()->routeIs('homeEng')">TT in ENGLISH</x-reuse.menu-item>
            @endif
        </div>
        <div class=" md:hidden flex justify-center items-center mx-auto">
            <a href="/">
                <img src="/images/logo-white.png" alt="Logo" class="h-8 md:h-10">
            </a>
        </div>

        <!-- Hamburger -->
        <div class="flex items-center md:hidden w-1/12">
            <button @click="open = !open" class="inline-flex items-center w-full text-white p-2 rounded-md focus:outline-none transition duration-150 ease-in-out justify-start">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    <path :class="{'hidden': ! open, 'inline-flex': open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>
    <!-- Responsive Navigation Menu -->
    <div :class="{'translate-x-0': open, '-translate-x-full': ! open}" v-cloak class="bg-blue-500 divide-black divide-solid divide-y fixed inset-y-0 left-0 md:hidden transform-gpu z-10 transition w-full duration-300 ease-linear" style="margin-top: 69px;">
        <x-reuse.menu-item href="/" style="padding-top: 8px!important;" :active="request()->routeIs('home')" class="w-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-white h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
            </svg>
        </x-reuse.menu-item>
        @foreach($items as $item)
            <x-reuse.menu-item href="{{ url($item['url']) }}" :active="menuActiveHelper($item)" dropdownText="{{ $item['text'] }}" hasDropdown="{{ $item['dropdown'] }}" class="w-full justify-between">
                {{ $item['text'] }}
                @if($item['dropdown'])
                    <x-slot name="links">
                        @foreach($item['items'] as $link)
                            <x-reuse.dropdown-link href="{{ url($link['url']) }}" :active="menuActiveHelper($link)">{{ $link['text'] }}</x-reuse.dropdown-link>
                        @endforeach
                    </x-slot>
                @endif
            </x-reuse.menu-item>
        @endforeach
    </div>
</nav>
