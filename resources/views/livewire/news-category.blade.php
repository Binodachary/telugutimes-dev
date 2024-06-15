<div class="space-y-4">
    @forelse($newsItems as $newsItem)
        <div class="article-list-item p-2 bg-gray-100 shadow-md w-full rounded break-all">
            <a href="{{ route('article',$newsItem) }}" class="flex flex-col md:flex-row">
                <img src="{{ asset("/images/medium/{$newsItem->image}") }}" class="w-full break-words rounded md:w-52 lg:h-32 h-52 object-cover object-center" alt="{{ $newsItem->title }}">
                <div class="article-description flex-reuse.1 pl-4">
                    <h3 class="mb-3 {{ $newsItem->title_language == "telugu" ? 'telugu1 text-xl' : "english text-base" }}">{{ $newsItem->title }}</h3>
                    <p class="telugu2 text-lg leading-relaxed font-bold text-black">{{ shortText($newsItem->description,15) }}</p>
                    <p class="text-purple-600 font-bold text-xs">{{ formatDate($newsItem->created_at) }}</p>
                </div>
            </a>
        </div>
    @empty
        <h1>No News has been added in this category.</h1>
    @endforelse
    <div class="my-3 w-full">
        {{ $newsItems->onEachSide(0)->links() }}
    </div>
</div>