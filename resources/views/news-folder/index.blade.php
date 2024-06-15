<x-main-layout>
    <section class="col-span-full space-y-3">
        <x-reuse.gallery-wrapper>
            <x-slot name="header">
                <h1>News Folders</h1>
            </x-slot>
            <x-reuse.gallery-body>
                @forelse($newsFolders as $newsFolder)
                    <x-reuse.gallery-item :link="route('news-folder-items',$newsFolder)">
                        <img src="{{ asset("/images/medium/{$newsFolder->image}") }}" class="w-full object-cover object-left-top" alt="{{ $newsFolder->name }}">
                        <div class="gallery-title {{ $newsFolder->title_language == "telugu" ? "telugu2 text-lg " : "english text-sm " }}p-2 text-center">{{ $newsFolder->name }}</div>
                    </x-reuse.gallery-item>
                @empty
                    <h1 class="text-xl">No News Folders has been added.</h1>
                @endforelse
            </x-reuse.gallery-body>
        </x-reuse.gallery-wrapper>
        <div class="pb-4 w-full">
            {{ $newsFolders->links() }}
        </div>
    </section>
</x-main-layout>
