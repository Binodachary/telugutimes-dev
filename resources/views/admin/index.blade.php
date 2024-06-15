<x-admin-layout>
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Dashboard </h2>

        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <div class="p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <a class="flex items-center" href="{{ route('admin.news.index') }}">
                    <div class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full dark:text-yellow-100 dark:bg-yellow-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            News Articles </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            {{ $todayNewsCount }}/{{ $newsCount }}
                        </p>
                    </div>
                </a>
            </div>
            <div class="p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <a class="flex items-center" href="{{ route('admin.gallery.index') }}">
                    <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Gallery </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            {{ $todayGalleryCount }}/{{ $galleryCount }}
                        </p>
                    </div>
                </a>
            </div>
            <div class="p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <a class="flex items-center" href="{{ route('admin.association.index') }}">
                    <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            Associations </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            {{ $todayAssociationCount }}/{{ $associationCount }}
                        </p>
                    </div>
                </a>
            </div>
            <div class="p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <a class="flex items-center" href="{{ route('admin.news-folder.index') }}">
                    <div class="p-3 mr-4 text-purple-500 bg-purple-100 rounded-full dark:text-purple-100 dark:bg-purple-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            News Folders </p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                            {{ $todayNewsFolderCount }}/{{ $newsFolderCount }}
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-admin-layout>
