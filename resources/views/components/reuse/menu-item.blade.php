@props(['active','hasDropdown'=>false,'align' => 'left','dropdownText','dropdownClass'=>'md:w-48 bg-white'])

@php
    $classes = ($active ?? false)
                ? 'inline-flex items-center text-xs xl:text-sm p-2 pt-3 text-white f-13'
                : 'inline-flex items-center text-xs xl:text-sm p-2 pt-3 text-white f-13';
@endphp

@php
    switch ($align) {
        case 'left':
            $alignmentClasses = 'top-full left-0';
            break;
        case 'top':
            $alignmentClasses = 'bottom-full';
            break;
        case 'right':
        default:
            $alignmentClasses = 'top-full right-0';
            break;
    }
@endphp
@if($hasDropdown)
    <div class='dropdown-menu relative items-center' @mouseenter="menuOpen ='{{ $dropdownText }}'" @mouseleave="menuOpen = false" v-click-outside="closeDropdown">
        <span class="flex items-center">
            <a {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
            </a>
            </span>
        <transition enter-active-class="transition ease-out duration-200" enter-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
            <div class="relative md:absolute z-50 {{ $dropdownClass ?? "" }} md:rounded-md shadow-lg {{ $alignmentClasses }}" style="display: none;" @mouseenter="menuOpen ='{{ $dropdownText }}'" @mouseleave="menuOpen = false" v-show="menuOpen == '{{ $dropdownText }}'">
                {!! $links ?? "" !!}
            </div>
        </transition>
    </div>
@else
    <a {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
@endif
