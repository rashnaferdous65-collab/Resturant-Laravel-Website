```php
<x-guest-layout>

    <div class="space-y-5">

        <div class="text-center">
            <h2 class="text-xl font-semibold text-gray-800">
                Verify Your Email
            </h2>

            <p class="mt-2 text-sm text-gray-600">
                {{ __('Welcome! Please confirm your email address using the verification link we sent. Didn’t receive it? Request another one below.') }}
            </p>
        </div>

        @if(session('status') === 'verification-link-sent')
            <div class="rounded-lg bg-green-100 px-4 py-3 text-sm text-green-700">
                {{ __('A fresh verification email has been sent successfully.') }}
            </div>
        @endif

        <div class="flex flex-col gap-3">

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <x-primary-button class="w-full justify-center">
                    {{ __('Send Verification Again') }}
                </x-primary-button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    type="submit"
                    class="w-full rounded-md border border-gray-300 py-2 text-sm text-gray-700 hover:bg-gray-100 transition"
                >
                    {{ __('Sign Out') }}
                </button>
            </form>

        </div>

    </div>

</x-guest-layout>
```


