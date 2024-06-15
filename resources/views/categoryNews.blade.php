<x-main-layout>
    <x-slot name="pageTitle">{{ $category->title }}</x-slot>
    <x-slot name="pageImage">{{ asset("storage/categories/{$category->image}") }}</x-slot>
    <x-slot name="pageDescription">{{ shortText($category->description,15) }}</x-slot>
    <x-slot name="pageKeywords">{{ $category->keywords }}</x-slot>
    <section class="article-content col-span-2 px-4 lg:px-0">
        <div class="flex items-start h-full flex-wrap">
            <h1 class="main-heading w-full justify-between">
                {{ $category->name }}
                @if($category->children->count() > 0)
                    <x-reuse.tabs class="-mb-2">
                        <x-reuse.tab-item class="text-black border-blue-600 -mb-px" @click.prevent="openTab = 'all';setSelected('')" v-bind:class="[openTab === 'all' ? activeClasses : '']">
                            All
                        </x-reuse.tab-item>
                        @foreach($tabs as $tab)
                            <x-reuse.tab-item class="text-black border-blue-600 -mb-px" @click.prevent="openTab = '{{ $tab->slug }}';setSelected('{{ $tab->slug }}')" v-bind:class="[openTab === '{{ $tab->slug }}' ? activeClasses : '']">{{ $tab->name }}</x-reuse.tab-item>
                        @endforeach
                    </x-reuse.tabs>
                @endif
            </h1>
            <div class="article-list mb-4 w-full">
                <div class="tab-pane space-y-3" v-show="openTab === 'all'">
                    @livewire("news-category",['category' => $category,'selected'=>''])
                </div>
                @if($category->children->count() > 0)
                    @foreach($tabs as $tab)
                        <div class="tab-pane space-y-3" v-show="openTab === '{{ $tab->slug  }}'">
                            @livewire("news-category",['category' =>
                            $category,'selected'=>$tab->slug],key($loop->index))
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <aside class="col-span-1">
        <x-sidebar-news/>
    </aside>
</x-main-layout>
