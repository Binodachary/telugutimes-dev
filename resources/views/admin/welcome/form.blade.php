<x-admin-layout>
    <x-slot name="title">{{ $welcome->id ? "Update" : "Add" }} Welcome Note - Telugu Times</x-slot>
    <div class="container">
        <x-reuse.card>
            <x-slot name="cardHeader">{{ $welcome->id ? "Update" : "Add" }} Welcome Note</x-slot>
            <form method="POST" enctype="multipart/form-data" action="{{ $welcome->id ? route('admin.welcome.update',$welcome->id) : route('admin.welcome.store') }}">
                @csrf
                @if($welcome->id) @method('PUT') @endif
                <div class="flex items-start space-x-3">
                    <div class="lg:w-3/4">
                        <div class="field-wrapper space-y-4">
                            <div class="lg:flex space-y-3 space-x-3 lg:space-y-0 items-center xl:h-16">
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.label class="mb-1" for="schedule_to" value="Schedule to"/>
                                    <x-reuse.input type="text" name="schedule_to" id="schedule_to" :value="old('schedule_to',$welcome->schedule_to)" class="w-full block"/>
                                </div>
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.label for="image" class="mb-1" value="Image"/>
                                    <x-reuse.input type="file" name="image" id="image" class="w-full block"/>
                                    @error('image')
                                    <x-reuse.error :error="$message"/> @enderror
                                </div>
                            </div>
                            <div class="lg:flex space-y-3 space-x-3 lg:space-y-0 items-center xl:h-16">
                                <div class="w-full lg:w-1/2">
                                    <x-reuse.label class="mb-1" for="url" value="URL"/>
                                    <x-reuse.input type="text" name="url" id="url" :value="old('url',$welcome->url)" class="w-full block"/>
                                </div>
                            </div>
                            <div class="block space-y-3 lg:space-y-0">
                                <x-reuse.label for="description" class="mb-1 flex justify-between"> Description </x-reuse.label>
                                @error('description')
                                <x-reuse.error :error="$message"/> @enderror
                                <textarea class="tinymce" title="Description" id="description" name="description">{!! old('description',$welcome->description) ?? "" !!}</textarea>
                            </div>
                            <div class="inline-flex space-x-3">
                                <button type="submit" class="bg-purple-500 text-white btn rounded-lg border-purple-700">{{ $welcome->id ? "Update" : "Add" }}
                                    Welcome Note
                                </button>
                                <a href="{{ route('admin.welcome.index') }}" class="btn rounded-lg danger inline-flex">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-1/4 hidden lg:flex">
                        @if($welcome->image)
                            <img src="{{ asset('storage/welcomes/'.$welcome->image) }}" class="w-full" alt="{{ $welcome->image }}">
                        @endif
                    </div>
                </div>
            </form>
        </x-reuse.card>
    </div>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    </x-slot>
    <x-slot name="scripts">
        <script src="https://cdn.tiny.cloud/1/nf9d9h8wydroobl01sz2xbx0q35ztuac2fkiuo56tw94zxjx/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="{{ asset('js/flatpickr.min.js') }}"></script>
        <script>
            flatpickr('#schedule_to', {
                minDate: 'today',
                enableTime:true,
                altInput:true,
                altFormat: 'M J,Y h:i K'
            });
            tinymce.init({
                selector: "textarea.tinymce",
                plugins: ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table paste"],
                convert_urls: false,
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                height: 300
            });
        </script>
    </x-slot>
</x-admin-layout>
