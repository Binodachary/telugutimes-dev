<x-main-layout>
    <section class="article-content col-span-2 px-4 pb-4 lg:px-0">
        @include("partials.associations",$associations)
    </section>
    <aside class="col-span-1">
        <x-sidebar-news/>
    </aside>
</x-main-layout>
