<x-guest-layout>
    <x-auth.auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-auth.application-logo class="w-full sm:max-w-md" />
            </a>
        </x-slot>
        <x-auth.auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <x-reuse.label for="name" :value="__('Name')" />
                <x-reuse.input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>
            <div class="mt-4">
                <x-reuse.label for="email" :value="__('Email')" />
                <x-reuse.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <div class="mt-4">
                <x-reuse.label for="mobile" value="Mobile" />
                <x-reuse.input id="mobile" class="block mt-1 w-full" type="number" name="mobile" :value="old('mobile')" required />
            </div>
            <div class="mt-4">
                <x-reuse.label for="password" :value="__('Password')" />
                <x-reuse.input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>
            <div class="mt-4">
                <x-reuse.label for="password_confirmation" :value="__('Confirm Password')" />
                <x-reuse.input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <x-auth.button class="ml-4">
                    {{ __('Register') }}
                </x-auth.button>
            </div>
        </form>
    </x-auth.auth-card>
</x-guest-layout>
