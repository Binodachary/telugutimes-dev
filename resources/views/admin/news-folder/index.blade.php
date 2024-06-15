<x-admin-layout>
    <x-slot name="title">News Folders - Telugu Times</x-slot>
    <div class="container">
        <x-reuse.card class="rounded-b-none">
            <x-slot name="cardHeader">
                News Folders
                <a href="{{ route('admin.news-folder.create') }}" class="btn primary sm ml-auto rounded-lg font-bold">
                    <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add News Folder </a>
            </x-slot>
            <x-reuse.gallery-body>
                @forelse($news_folders as $news_folder)
                    <x-reuse.gallery-item>
                        <img src="{{ asset("/images/medium/{$news_folder->image}") }}" class="w-full lg:h-52 object-cover object-left-top" alt="{{ $news_folder->name }}">
                        <div class="gallery-title {{ $news_folder->title_language == "telugu" ? "telugu2 text-lg " : "english text-sm " }}p-2 text-center">{{ $news_folder->name }}</div>
                        <x-slot name="actionBar">
                            <div class="action-bar border-t-2 mt-auto dark:border-gray-700 flex flex-col justify-between divide-y-2 dark:divide-gray-700 text-gray-500">
                                <div class="actions flex justify-between p-2">
                                    @if(auth()->user()->role == "ADMIN")
                                        <a href="{{ route('admin.news-folder.edit',$news_folder) }}" title="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                            </svg>
                                        </a>
                                        <form method="POST" action="{{ route('admin.news-folder.destroy',$news_folder->id) }}" class="inline-flex">
                                            @csrf @method("DELETE")
                                            <button title="Delete" onclick="return confirm('Are you sure you want to delete this news folder?');" class="focus:outline-none">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    @else
                                        You don't have permission.
                                    @endif
                                </div>
                            </div>
                        </x-slot>
                    </x-reuse.gallery-item>
                @empty
                    <h1 class="text-xl">No News Folder has been added.</h1>
                @endforelse
            </x-reuse.gallery-body>
        </x-reuse.card>
        <div class="px-4 py-3 text-xs font-semibold tracking-wide rounded-b text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            {{ $news_folders->links() }}
        </div>
    </div>
</x-admin-layout>
