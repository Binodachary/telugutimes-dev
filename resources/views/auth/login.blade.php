<x-guest-layout>
    <x-auth.auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-auth.application-logo class="w-full sm:max-w-md"/>
            </a>
        </x-slot>
        <x-auth.auth-session-status class="mb-4" :status="session('status')"/>
        <x-auth.auth-validation-errors class="bg-red-500 mb-4 p-2 rounded shadow-lg" :errors="$errors"/>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <x-reuse.label for="email" :value="__('Email')"/>
                <x-reuse.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus/>
            </div>
            <div class="mt-4">
                <x-reuse.label for="password" :value="__('Password')"/>
                <x-reuse.input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password"/>
            </div>
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                <x-auth.button class="ml-3">
                    {{ __('Login') }}
                </x-auth.button>
            </div>
        </form>
    </x-auth.auth-card>
</x-guest-layout>
