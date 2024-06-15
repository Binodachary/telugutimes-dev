<x-admin-layout>
    <x-slot name="title">News Folders Items- Telugu Times</x-slot>
    <div class="container">
        <x-reuse.card class="rounded-b-none">
            <x-slot name="cardHeader">
                <h1 {{ $news_folder->title_language == 'telugu' ? "telugu1 text-xl" : "english text-base" }}>{{ $news_folder->name }}</h1>
                <a href="{{ route('admin.news-folder.news-folder-items.create',$news_folder) }}" class="btn primary sm ml-auto rounded-lg font-bold">
                    <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add News Folder Item</a>
            </x-slot>
            <x-reuse.gallery-body>
                @forelse($news_folder_items as $news_folder_item)
                    <x-reuse.gallery-item linkClass="pointer-events-none">
                        <img src="{{ asset("/images/medium/{$news_folder_item->image}") }}" class="w-full lg:h-52 object-cover object-left-top" alt="{{ $news_folder_item->title }}">
                        <div class="gallery-title {{ $news_folder_item->title_language == "telugu" ? "telugu2 text-lg " : "english text-sm " }}p-2 text-center">{{ $news_folder_item->title }}</div>
                        <x-slot name="actionBar">
                            <div class="action-bar border-t-2 mt-auto dark:border-gray-700 flex flex-col justify-between divide-y-2 dark:divide-gray-700 text-gray-500">
                                <div class="actions flex justify-between p-2">
                                    <a href="{{ route('admin.news-folder.news-folder-items.edit',[$news_folder,$news_folder_item]) }}" title="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </a>
                                    @if($news_folder_item->gallery_id > 0)
                                        <a href="{{ route('photos',$news_folder_item->gallery) }}" target="_blank">
                                            <svg class="w-6 h-6 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                            </svg>
                                        </a>
                                    @endif
                                    @if($news_folder_item->video_id != '')
                                        <a href="https://www.youtube.com/embed/{{ $news_folder_item->video_id }}" data-title="{{ $news_folder_item->title }}" class="glightbox flex english items-center leading-loose text-purple-600">
                                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path>
                                            </svg>
                                        </a>
                                    @endif
                                    <form method="POST" action="{{ route('admin.news-folder.news-folder-items.destroy',[$news_folder,$news_folder_item]) }}" class="inline-flex">
                                        @csrf @method("DELETE")
                                        <button title="Delete" onclick="return confirm('Are you sure you want to delete this news folder item?');" class="focus:outline-none">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </x-slot>
                    </x-reuse.gallery-item>
                @empty
                    <h1 class="text-xl text-gray-700 dark:text-gray-400">No articles has been added.</h1>
                @endforelse
            </x-reuse.gallery-body>
        </x-reuse.card>
        <div class="px-4 py-3 text-xs font-semibold tracking-wide rounded-b text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            {{ $news_folder_items->links() }}
        </div>
    </div>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/glightbox.min.css') }}">
    </x-slot>
    <x-slot name="scripts">
        <script src="{{ asset('js/glightbox.min.js') }}"></script>
        <script>
            const lightbox = GLightbox();
        </script>
    </x-slot>
</x-admin-layout>
