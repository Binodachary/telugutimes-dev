@if($videos->count() > 0)
    <div class="grid grid-cols-2 gap-4 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5">
        @foreach($videos as $video)
            <x-site.video-card class="glightbox" href="https://www.youtube.com/embed/{{ $video->video_id }}" data-gallery="videos" :data-title="$video->title" :video="$video">
                <x-slot name="actionBar">
                    <div class="action-bar border-t border-t-2 dark:border-gray-700 flex justify-between p-3 space-x-2 text-gray-500">
                        @if(auth()->user()->role == "ADMIN")
                            <a href="{{ route('admin.videos.edit',$video) }}" title="Edit" class="">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                </svg>
                            </a>
                            <span class="capitalize">{{ $video->category }}</span>
                            <form method="POST" action="{{ route('admin.videos.destroy',$video->id) }}" class="inline-flex">
                                @csrf @method("DELETE")
                                <button title="Delete" onclick="return confirm('Are you sure you want to delete this video?');" class="focus:outline-none">
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
            </x-site.video-card>
        @endforeach
    </div>
@else
    <h1>No Videos has been added till now...!</h1>
@endif
