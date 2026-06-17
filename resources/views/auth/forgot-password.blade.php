```php
<x-guest-layout>

    <!-- Header -->
    <div class="space-y-2 mb-6">
        <h2 class="text-xl font-semibold">
            {{ __('Reset Password') }}
        </h2>

        <p class="text-sm text-gray-600">
            {{ __('Enter your email address and we will send you a password reset link.') }}
        </p>
    </div>

    <!-- Success Message -->
    <x-auth-session-status
        class="mb-4"
        :status="session('status')"
    />

    <form action="{{ route('password.email') }}" method="POST">
        @csrf

        <!-- Email Field -->
        <div class="mb-5">
            <x-input-label
                for="email"
                :value="__('Email Address')"
            />

            <x-text-input
                id="email"
                name="email"
                type="email"
                class="w-full mt-2"
                :value="old('email')"
                required
                autofocus
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('email')"
            />
        </div>

        <!-- Submit -->
        <div class="flex justify-end">
            <x-primary-button>
                {{ __('Send Reset Link') }}
            </x-primary-button>
        </div>

    </form>

</x-guest-layout>
```
