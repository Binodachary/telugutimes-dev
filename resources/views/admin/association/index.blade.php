<x-admin-layout>
    <x-slot name="title">Associations - Telugu Times</x-slot>
    <div class="container">
        <x-reuse.card>
            <x-slot name="cardHeader">
                Associations
                <a href="{{ route('admin.association.create') }}" class="btn primary sm ml-auto rounded-lg font-bold">
                    <svg class="w-6 h-6 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add Association </a>
            </x-slot>
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-md">
                <div class="w-full overflow-x-auto">
                    <table class="w-full table-fixed">
                        <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Site URL</th>
                            <th class="px-4 py-3">Image</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @forelse($associations as $association)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-2 py-1">{{ $loop->iteration }}</td>
                                <td class="px-2 py-1">{{ $association->name }}</td>
                                <td class="px-2 py-1 overflow-hidden overflow-ellipsis">{{ $association->site_url }}</td>
                                <td class="px-2 py-1">
                                    <img src="{{ asset("storage/gallery/association-logos/{$association->name}/{$association->logo}") }}" class="w-16 h-16 object-cover object-center" alt="">
                                </td>
                                <td class="px-2 py-1">
                                    <div class="flex space-x-2 items-center h-full">
                                        @if(auth()->user()->role == "ADMIN")
                                            <a href="{{ route('admin.association.edit',$association) }}" title="Edit">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                                </svg>
                                            </a>
                                            <form method="POST" action="{{ route('admin.association.destroy',$association) }}" class="inline-flex">
                                                @csrf @method("DELETE")
                                                <button title="Delete" onclick="return confirm('Are you sure you want to delete this association?');" class="focus:outline-none">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        @else
                                            You don't have permission.
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-3">No Association has been added till now...!</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    {{ $associations->links() }}
                </div>
            </div>
        </x-reuse.card>
    </div>
</x-admin-layout>
