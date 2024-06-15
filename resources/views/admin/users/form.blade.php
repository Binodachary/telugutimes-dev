<x-admin-layout>
    <x-slot name="title">{{ $user->id ? "Update" : "Add" }} User - Telugu Times</x-slot>
    <div class="container">
        <x-reuse.card>
            <x-slot name="cardHeader">{{ $user->id ? "Update" : "Add" }} User</x-slot>
            <form method="POST" action="{{ $user->id ? route('admin.users.update',$user->id) : route('admin.users.store') }}">
                @csrf @if($user->id) @method('PUT') @endif
                <div class="flex items-start space-x-3">
                    <div class="lg:w-3/4">
                        <div class="field-wrapper space-y-4">
                            <div class="lg:flex space-y-3 space-x-3 lg:space-y-0 items-center xl:h-16">
                                <div class="w-full lg:w-1/3">
                                    <x-reuse.label for="name" class="mb-1" value="Name"/>
                                    <x-reuse.input type="text" name="name" id="name" :value="old('name',$user->name)" class="w-full block"/>
                                    @error('name')
                                    <x-reuse.error :error="$message"/> @enderror
                                </div>
                                <div class="w-full lg:w-1/3">
                                    <x-reuse.label for="email" class="mb-1" value="Email"/>
                                    <x-reuse.input type="email" name="email" id="email" :value="old('email',$user->email)" class="w-full block"/>
                                    @error('email')
                                    <x-reuse.error :error="$message"/> @enderror
                                </div>
                                <div class="w-full lg:w-1/3">
                                    <x-reuse.label for="mobile" class="mb-1" value="Mobile"/>
                                    <x-reuse.input type="number" name="mobile" id="mobile" :value="old('mobile',$user->mobile)" class="w-full block"/>
                                    @error('mobile')
                                    <x-reuse.error :error="$message"/> @enderror
                                </div>
                            </div>
                            <div class="lg:flex space-y-3 space-x-3 lg:space-y-0 items-center xl:h-16">
                                <div class="w-full lg:w-1/3">
                                    <x-reuse.label for="password" class="mb-1" value="Password"/>
                                    <x-reuse.input type="password" name="password" id="password" class="w-full block"/>
                                    @error('password')
                                    <x-reuse.error :error="$message"/> @enderror
                                </div>
                                @if(!empty($roles))
                                    <div class="w-full lg:w-1/3">
                                        <x-reuse.label for="role" class="mb-1" value="Role"/>
                                        <div class="dark:text-gray-400 text-gray-700 inline-flex space-x-3">
                                            @foreach($roles as $key=>$role)
                                                <label for="{{ $key }}" class="items-center inline-flex space-x-1">
                                                    <input type="radio" name="role" value="{{ $key }}" id="{{ $key }}"{{ (empty($user->id) && ($loop->iteration == 1)) ? " checked='checked'" : ""}}{{ old('role',$user->role) == $key ? " checked='checked'" : ""}}>
                                                    <span>{{ $role }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="inline-flex space-x-3">
                                <button type="submit" class="bg-purple-500 text-white btn rounded-lg border-purple-700">{{ $user->id ? "Update" : "Add" }}
                                    User
                                </button>
                                <a href="{{ route('admin.users.index') }}" class="btn rounded-lg danger inline-flex">Cancel</a>
                            </div>
                            <x-reuse.label for="role" class="mb-1" value="Note: Password is not mandatory while updating the user, if you want to update user's password then only you need to fill it."/>
                        </div>
                    </div>
                </div>
            </form>
        </x-reuse.card>
    </div>
</x-admin-layout>
