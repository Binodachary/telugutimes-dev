@props(['name','text','hidden'])

<input type="hidden" name="{{ $name }}" value="{{ $hidden }}">
<div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
    <input type="checkbox" name="{{ $name }}" id="{{ $name }}" {{ $attributes->merge(['class' => 'absolute appearance-none block border-0 cursor-pointer duration-300 focus:outline-none focus:ring-0 h-5 rounded-full toggle-checkbox transition w-5']) }}/>
    <label for="{{ $name }}" class="toggle-label block overflow-hidden h-5 rounded-full bg-gray-300 cursor-pointer"></label>
</div>
<label for="{{ $name }}" class="text-sm text-gray-700 dark:text-gray-400">{{ $text }}</label>
