<x-main-layout>
    <section class="col-span-full space-y-3">
		<iframe scrolling=no src="/subscribe.html" frameborder="no" style="width:99%; height:90px; margin:9px"></iframe>
        <x-reuse.gallery-wrapper>
            <x-slot name="header">
                <h1>Telugu Times ePaper: All Issues</h1>
            </x-slot>
            <x-reuse.gallery-body>
                @forelse($epapers as $epaper)
                    <x-reuse.gallery-item :link="route('edition',$epaper)">
                        <img src="{{ asset("/images/medium/{$epaper->folder}/1.jpg") }}" class="w-full object-cover object-left-top" alt="{{ $epaper->edition_year.'-'.$epaper->edition_month }}">
                        <div class="gallery-title p-2 text-center">{{ $epaper->edition_year.' '.$epaper->edition_month.' '.$epaper->name }}</div>
                    </x-reuse.gallery-item>
                @empty
                    <h1 class="text-xl">No Epapers has been added.</h1>
                @endforelse
            </x-reuse.gallery-body>
        </x-reuse.gallery-wrapper>
        <div class="pb-4 w-full">
            {{ $epapers->links() }}
        </div>
    </section>
</x-main-layout>
