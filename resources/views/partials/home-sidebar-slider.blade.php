<div class="sidebar-component flex flex-col">
    <div class="main-heading justify-center">{{ $heading ?? "" }}</div>
    @if($items->count()>0)
        <x-reuse.slider class="shadow-md">
            @foreach($items as $item)
                @php
                    $showImage = !empty($folder) ? implode('/',[$item->{$folder},basename(getFiles('public/'.$item->{$folder},true))]) : (!empty($image) ? $item->{$image} : "");
                    $textArray = explode(',',$text);
                @endphp
                @if(count($textArray) > 1)
                    @foreach ($textArray as $key => $textItem)
                        @php($textArray[$key] = $item->{$textItem})
                    @endforeach
                    @php($showText = implode(" ",$textArray))
                @else
                    @php($showText = $item->{$text})
                @endif
                <x-reuse.slider-item :link="route($linkRoute,$item)" class="flex flex-col justify-start items-center">
                    <img class="w-full h-64 object-fill" src="{{ asset("/images/{$filter}/{$showImage}") }}" alt="{{ $showText }}">
                    <div class="bg-white p-2 text-black {{ ($item->title_language && $item->title_language == 'telugu') ? "telugu2 text-lg" : "english text-sm" }}">{{ $showText }}</div>
                </x-reuse.slider-item>
            @endforeach
        </x-reuse.slider>
        <a href="{{ $url ?? "#" }}" class="btn justify-center mb-1 ml-auto primary sm mt-2">View all</a>
    @else
        <h3>{{ $notAdded ?? "Items" }} are not added yet.</h3>
    @endif
</div>
