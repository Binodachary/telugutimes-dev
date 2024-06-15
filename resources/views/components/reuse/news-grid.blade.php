@props(['heading'])
<section {{ $attributes->merge(["class" => "grid-wrapper mb-4"]) }}>
    <div class="grid-header bg-blue-600 mb-3 p-2 pr-0 xl:flex flex-wrap justify-between items-center">
        <h1 class="xl:text-base md:flex block text-sm font-bold text-white border-l-4 pl-3 border-white">{{ $heading }}</h1>
        {{ $tabNavigation ?? "" }}
    </div>
    {{ $slot }}
</section>
