@props(['value'])

<label {{ $attributes->merge(['class' => 'dark:text-gray-400 block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
