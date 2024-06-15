@props(['link'])
<div {{ $attributes->merge(['class'=>"grid-item bg-gray-200 shadow-xl p-3 flex flex-col justify-top items-center telugu-content font-bold"]) }}>
    <a href="{{ $link ?? "" }}" class="flex space-x-2 w-full" {!! !empty($link) ? "" : 'onclick = "return false"' !!}>
        <div class="grid-item-thumb">{{ $image ?? "" }}</div>
        <div class="grid-item-content">
            <h5 class="telugu-content leading-5 text-sm font-bold">{{ $title ?? "" }}</h5>
            <p class="post-date text-xs text-gray-500 mt-1 english">{{ $postedOn ?? "" }}</p>
        </div>
    </a>
    {{ $galleryBar ?? "" }}
</div>
