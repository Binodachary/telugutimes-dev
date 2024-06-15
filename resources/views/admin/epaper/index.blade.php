<x-admin-layout>
    <x-slot name="title">Epapers - Telugu Times</x-slot>
    <div class="container">
        <x-reuse.card class="rounded-b-none">
            <x-slot name="cardHeader">
                Epapers
                <a href="{{ route('admin.epaper.create') }}" class="btn primary sm ml-auto rounded-lg font-bold">
                    <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add Epaper </a>
            </x-slot>
            <x-reuse.gallery-body>
                @forelse($epapers as $epaper)
                    <x-reuse.gallery-item class="rounded-md overflow-hidden">
                        <img src="{{ asset("/images/medium/{$epaper->folder}/1.jpg") }}" class="w-full object-cover object-left-top" alt="{{ $epaper->edition_year.'-'.$epaper->edition_month }}">
                        <div class="gallery-title p-2 text-center">{{ $epaper->edition_year.' '.$epaper->edition_month.' '.$epaper->name }}</div>
                        <x-slot name="actionBar">
                            <div class="action-bar border-t-2 dark:border-gray-700 flex justify-between p-3 space-x-2 text-gray-500">
                                @if(auth()->user()->role == "ADMIN")
                                    <a href="{{ route('admin.epaper.edit',$epaper) }}" title="Edit" class="">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.epaper.destroy',$epaper->id) }}" class="inline-flex">
                                        @csrf @method("DELETE")
                                        <button title="Delete" onclick="return confirm('Are you sure you want to delete this epaper?');" class="focus:outline-none">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </form>
                                @else
                                    You don't have permission.
                                @endif
                            </div>
                        </x-slot>
                    </x-reuse.gallery-item>
                @empty
                    <h1 class="text-xl">No Epapers has been added.</h1>
                @endforelse
            </x-reuse.gallery-body>
        </x-reuse.card>
        <div class="px-4 py-3 text-xs font-semibold tracking-wide rounded-b text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            {{ $epapers->links() }}
        </div>
    </div>
</x-admin-layout>
