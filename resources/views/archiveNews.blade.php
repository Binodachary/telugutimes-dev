<x-main-layout>
    <section class="article-content col-span-2 px-4 lg:px-0">
        <div class="flex items-start h-full flex-wrap">
            <h1 class="main-heading w-full justify-between">
                {{ $page['heading'] }}
            </h1>
            <div class="article-list mb-4 w-full">
                <div class="tab-pane space-y-3">
                    @forelse($newsItems as $newsItem)
                        <div class="article-list-item p-2 bg-gray-100 break-all w-full shadow-md rounded">
                            <a href="{{ route('archived',$newsItem->slug) }}" class="flex flex-col md:flex-row">
                                <img src="{{ asset("/images/medium/{$newsItem->image}") }}" class="w-full break-words rounded md:w-52 lg:h-32 h-52 object-cover object-center" alt="{{ $newsItem->title }}">
                                <div class="article-description flex-1 pl-4">
                                    <h3 class="mb-3 {{ $newsItem->title_language == "telugu" ? 'telugu1 text-xl' : "english text-base" }}">{{ $newsItem->title }}</h3>
                                    <p class="telugu2 text-lg leading-relaxed font-bold text-black">{{ shortText($newsItem->description,15) }}</p>
                                    <p class="text-purple-600 font-bold text-xs">{{ formatDate($newsItem->created_at) }}</p>
                                </div>
                            </a>
                        </div>
                    @empty
                        <h1>No News present in this archive.</h1>
                    @endforelse
                </div>
            </div>
            <div class="my-3 w-full">
                {{ $newsItems->onEachSide(0)->links() }}
            </div>
        </div>
    </section>
    <aside class="col-span-1">
        <x-sidebar-news/>
    </aside>
</x-main-layout>
