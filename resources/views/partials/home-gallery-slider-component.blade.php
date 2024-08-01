
<div class="sidebar-block-wrapper {{$viwetype ?? ""}} ">

    <!-- Sidebar Block Head Start -->
    <div class="head {{ $hbg ?? "feature-head bluebg"}}">

        <!-- Title -->
        <h4 class="title">{{ $heading ?? "" }}</h4>

    </div><!-- Sidebar Block Head End -->

    <!-- Sidebar Block Body Start -->
    <div class="body">
       
        @if($items->count()>0)
        <!-- Sidebar Post Slider Start -->
        <div class="sidebar-post-carousel post-block-carousel life-style-post-carousel">
            @foreach($items as $item)
            @php
           // echo $gallery;
            $showImage = !empty($gallery) ? implode('/',[$item->{$gallery},basename(getFiles('public/'.$item->{$gallery},true))]) : "";
            $textArray = explode(',',$text);
            //echo $item->{$gallery};
        @endphp
        @if(count($textArray) > 1)
            @foreach ($textArray as $key => $textItem)
                @php $textArray[$key] = $item->{$textItem};  @endphp
            @endforeach
            @php $showText = implode(" ",$textArray);  @endphp
        @else
            @php $showText = $item->{$text} ;  @endphp
        @endif
            <div class="epaper post life-style-post">
                <div class="post-wrap epaper">

                    <!-- Image -->
                    <a class="image" href="{{route($linkRoute,$item)}}"><img src="{{asset("/images/review/{$showImage}")}}" alt="post"></a>

                    <!-- Content -->
                    <div class="content">

                        <!-- Title -->
                        <h4 class="title"><a href="{{route($linkRoute,$item)}}">{{ $showText }}</a></h4>

                    </div>

                </div>
            </div><!-- Post End -->

            <!-- Post Start -->
            

            @endforeach

            <!-- Post Start -->





        </div>
        <a href="{{ $url ?? "#" }}" class="read-more">View all</a>
        @else
        <h3>{{ $notAdded ?? "Items" }} are not added yet.</h3>
        @endif
    </div>

</div>