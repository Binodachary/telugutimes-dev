@props(['link','linkClass','newPage'])
<slider-item {{ $attributes->merge(['class'=>"relative overflow-x-hidden"]) }}>
    <a href="{{ $link ?? "" }}" {!! !empty($link) ? "" : 'onclick = "return false"' !!} {{ isset($newPage) ? 'target=_blank' : '' }} class="w-full {{ $linkClass ?? "" }}" data-gallery="epaper">
        {{ $slot }}
    </a>
</slider-item>
