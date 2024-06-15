@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        {{--<div class="font-medium text-red-600">
            {{ __('Whoops! Something went wrong.') }}
        </div>--}}

        <ul class="list-disc space-y-2 text-sm text-white">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
