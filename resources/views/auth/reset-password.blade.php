<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        {{-- Hidden Token --}}
        <input
            type="hidden"
            name="token"
            value="{{ $request->route('token') }}"
        >

        {{-- Email --}}
        <div class="space-y-2">
            <x-input-label
                for="email"
                value="Email"
            />

            <x-text-input
                id="email"
                name="email"
                type="email"
                class="w-full"
                :value="old('email', $request->email)"
                required
                autofocus
                autocomplete="username"
            />

            <x-input-error
                :messages="$errors->get('email')"
            />
        </div>

        {{-- New Password --}}
        <div class="mt-5 space-y-2">
            <x-input-label
                for="password"
                value="New Password"
            />

            <x-text-input
                id="password"
                name="password"
                type="password"
                class="w-full"
                required
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->get('password')"
            />
        </div>

        {{-- Confirm Password --}}
        <div class="mt-5 space-y-2">
            <x-input-label
                for="password_confirmation"
                value="Confirm Password"
            />

            <x-text-input
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                class="w-full"
                required
                autocomplete="new-password"
            />

            <x-input-error
                :messages="$errors->get('password_confirmation')"
            />
        </div>

        {{-- Submit --}}
        <div class="mt-6 flex justify-end">
            <x-primary-button>
                Reset Password
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>