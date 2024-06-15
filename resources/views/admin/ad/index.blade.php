<x-admin-layout>
    <x-slot name="title">Advertisements - Telugu Times</x-slot>
    <div class="container">
        <x-reuse.card class="rounded-b-none">
            <x-slot name="cardHeader">
                Advertisements
                <a href="{{ route('admin.ad.create') }}" class="btn primary sm ml-auto rounded-lg font-bold">
                    <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add Advertisement </a>
            </x-slot>
            <x-reuse.gallery-body>
                @forelse($ads as $ad)
                    <x-reuse.gallery-item class="rounded-md overflow-hidden">
                        <img src="{{ asset("/images/medium/advertisements/{$ad->image}") }}" class="w-full object-cover object-left-top" alt="{{ $ad->name }}">
                        <div class="gallery-title p-2 text-center">{{ $ad->name }}</div>
                        <div class="details flex justify-between p-2 text-center">
                            <span>{{ formatDate($ad->start_date) }}</span>
                            <span>{{ formatDate($ad->end_date) }}</span>
                        </div>
                        <div class="border-t-2 dark:border-gray-700 text-gray-500 py-2 position-of-ad text-center">
                            {{ $ad->position }}
                        </div>
                        <x-slot name="actionBar">
                            <div class="action-bar border-t-2 dark:border-gray-700 flex justify-between p-3 space-x-2 text-gray-500">
                                <a href="{{ route('admin.ad.edit',$ad) }}" title="Edit" class="">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </a>
                                @if(auth()->user()->role == "ADMIN")
                                    <a href="{{ route('admin.ad.status',$ad) }}" title="{{ !empty($ad->is_active) ? "Active" : "In Active" }}">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            @if(!empty($ad->is_active))
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            @else
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                                            @endif
                                        </svg>
                                    </a>
                                    <form method="POST" action="{{ route('admin.ad.destroy',$ad) }}" class="inline-flex">
                                        @csrf @method("DELETE")
                                        <button title="Delete" onclick="return confirm('Are you sure you want to delete this advertisement?');" class="focus:outline-none">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </x-slot>
                    </x-reuse.gallery-item>
                @empty
                    <h1 class="text-xl">No Advertisements has been added.</h1>
                @endforelse
            </x-reuse.gallery-body>
        </x-reuse.card>
        <div class="px-4 py-3 text-xs font-semibold tracking-wide rounded-b text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            {{ $ads->links() }}
        </div>
    </div>
</x-admin-layout>
