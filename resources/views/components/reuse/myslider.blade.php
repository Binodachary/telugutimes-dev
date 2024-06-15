@props(['options'])

<my-splide {{ $attributes->merge(['class'=>'']) }} :options="{{ $options ?? "{
            type: 'loop',
            perPage: 1,
            autoplay: true,
            pauseOnHover: true,
            interval: 4000,
            pagination: false
        }" }}">
    <template v-slot:controls>
        {{ $buttons ?? "" }}
    </template>
    {{ $slot }}
</my-splide>
