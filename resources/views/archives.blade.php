<x-main-layout>
    <section class="article-content col-span-2 px-4 lg:px-0">
        <div class="flex items-start h-full flex-wrap">
            <h1 class="main-heading w-full justify-between">
                Archives </h1>
            <div class="archives-wrapper grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                @forelse($folders as $folder)
                    <div class="archive-box text-center text-gray-700">
                        <a href="{{ route('archives.year',$folder) }}">
                            <svg class="w-full" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z"></path>
                            </svg>
                            <p class="py-1">{{ $folder }}</p>
                        </a>
                    </div>
                @empty
                    <h1 class="text-center col-span-full w-full">No Archives found.</h1>
                @endforelse
            </div>
        </div>
    </section>
    <aside class="col-span-1">
        <x-sidebar-news/>
    </aside>
</x-main-layout>
