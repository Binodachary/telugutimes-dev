@php
    $items = include_once(resource_path('/views/menu-items-array.php'));
@endphp
<header id="header">
        <x-header-ads/>
<!--    <div class="logo-wrapper flex flex-col-reverse md:flex-row items-center lg:space-x-2">
        <div class="lg:w-3/12 w-full">
            <a href="/" class="block"> <img src="/images/tt_logo.png" class="w-56 lg:w-full mx-auto" alt="Logo"> </a>
        </div>
        <div class="lg:w-9/12">
            <img src="https://via.placeholder.com/840x95?text=Advertisement" class="my-2 mx-auto" alt="advertisement">
        </div>
    </div>-->
    <x-reuse.menu :items="$items"/>
</header>
