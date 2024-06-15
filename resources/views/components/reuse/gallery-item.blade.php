<div {{ $attributes->merge(['class'=>'flex flex-col justify-start bg-white shadow-md text-sm font-bold dark:text-gray-300 dark:bg-gray-800']) }}>
    <a href="{{ $link ?? "#" }}" class="block {{ $linkClass ?? "" }} w-full" data-gallery="photos">
        {{ $slot }}
    </a>
    {{ $actionBar ?? "" }}
</div>
