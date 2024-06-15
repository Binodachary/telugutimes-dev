@props(['white'=>false])
<img src="{{ $white ? asset('images/tt-logo-w.png') : asset('images/tt_logo.png') }}" {{ $attributes->merge(['class'=>'']) }} alt="Logo">
