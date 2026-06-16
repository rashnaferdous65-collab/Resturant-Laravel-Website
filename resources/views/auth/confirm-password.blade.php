<x-guest-layout>

    <p class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure section. Please verify your password to proceed.') }}
    </p>

    <form action="{{ route('password.confirm') }}" method="POST">
        @csrf

        <div class="space-y-2">

            <x-input-label
                for="password"
                :value="__('Password')"
            />

            <x-text-input
                id="password"
                name="password"
                type="password"
                class="w-full mt-1 block"
                autocomplete="current-password"
                required
            />

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2"
            />

        </div>

        <div class="mt-5 flex justify-end">
            <x-primary-button>
                {{ __('Confirm Password') }}
            </x-primary-button>
        </div>

    </form>

</x-guest-layout>