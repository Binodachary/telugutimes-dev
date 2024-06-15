<x-admin-layout>
    <x-slot name="title">Subscribers - Telugu Times</x-slot>
    <div class="container">
        <x-reuse.card>
            <x-slot name="cardHeader">
                <div class="flex justify-between w-full items-center">
                    Subscribers
                </div>
            </x-slot>
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-md">
                <div class="w-full overflow-x-auto">
                    <table class="w-full table-fixed">
                        <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3 w-1/3">Email</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @forelse($subscribers as $subscriber)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-2 py-1">{{ $loop->iteration }}</td>
                                <td class="px-2 py-1">{{ $subscriber->email }}</td>
                                <td class="px-2 py-1">
                                    <div class="flex space-x-2 items-center h-full">
                                        @if(auth()->user()->role == "ADMIN")
                                            <form method="POST" action="{{ route('admin.subscriber.destroy',$subscriber->id) }}" class="inline-flex">
                                                @csrf @method("DELETE")
                                                <button title="Delete" onclick="return confirm('Are you sure you want to delete this subscriber?');" class="focus:outline-none">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-4 py-3">No Subscribers has been added till now...!</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    {{ $subscribers->appends(request()->all())->links() }}
                </div>
            </div>
        </x-reuse.card>
    </div>
</x-admin-layout>
