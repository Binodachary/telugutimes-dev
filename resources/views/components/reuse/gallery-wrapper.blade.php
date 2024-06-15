<div class="gallery-wrapper mb-4">
    <div {{ $attributes->merge(['class'=>'main-heading justify-between']) }}>
        {{ $header ?? "" }}
    </div>
    {{ $slot }}
</div>
