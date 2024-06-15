@props(['video'])
<div class="grid-item text-center bg-white rounded-lg overflow-hidden shadow-md text-gray-700 dark:text-gray-300 dark:bg-gray-800 flex flex-col justify-between">
    <a {{ $attributes->merge(['class'=>'']) }}>
        <div class="img-wrapper overflow-hidden">
            <img src="{{ yThumb($video) }}" class='-my-6 w-full object-fill' alt='{{ $video->title }}'/>
        </div>
        <div class="grid-title px-1 py-2">
            <div class="{{ $video->title_language == "telugu" ? "telugu2 text-lg" : "english text-sm" }}">
                {{ $video->title }}
            </div>
        </div>
    </a>
    {{ $actionBar ?? "" }}
</div>
