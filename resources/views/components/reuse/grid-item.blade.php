@props(['link'])
<div {{ $attributes->merge(['class'=>"grid-item bg-gray-200 shadow-xl p-3 flex flex-col justify-top items-center telugu-content font-bold"]) }}>
    <a href="{{ $link ?? "" }}" class="flex flex-col justify-start w-full" {!! !empty($link) ? "" : 'onclick = "return false"' !!}>
        <div class="grid-item-thumb">{{ $image ?? "" }}</div>
        <div class="grid-item-content mt-2">
            <h5 class="font-light leading-5 mb-4 telugu-heading text-indigo-600 text-xl">{{ $title ?? "" }}</h5>
            <p class="post-date text-xs text-gray-500 my-2 english">{{ $postedOn ?? "" }}</p>
            <p class="telugu-content font-bold">{{ $description ?? "" }}</p>
        </div>
    </a>
    {{ $galleryBar ?? "" }}
</div>
