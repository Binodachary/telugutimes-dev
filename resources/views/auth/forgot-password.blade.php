<x-guest-layout>
    <x-auth.auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-auth.application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth.auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth.auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-reuse.label for="email" :value="__('Email')" />

                <x-reuse.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-auth.button>
                    {{ __('Email Password Reset Link') }}
                </x-auth.button>
            </div>
        </form>
    </x-auth.auth-card>
</x-guest-layout>
