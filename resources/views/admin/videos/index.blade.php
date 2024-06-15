<x-admin-layout>
    <x-slot name="title">Videos - Telugu Times</x-slot>
    <div class="container">
        <x-reuse.card class="rounded-b-none">
            <x-slot name="cardHeader">
                Videos <a href="{{ route('admin.videos.create') }}" class="btn primary sm ml-auto rounded-lg font-bold">
                    <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add Video </a>
            </x-slot>
            <x-site.video-wrapper :videos="$videos"/>
        </x-reuse.card>
        <div class="px-4 py-3 text-xs font-semibold tracking-wide rounded-b text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            {{ $videos->links() }}
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
