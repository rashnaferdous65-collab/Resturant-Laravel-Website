<p class="text-sm text-gray-500 mt-2">
    {{ __('Use a strong and unique password to help keep your account secure.') }}
</p>
</header>

<form action="{{ route('password.update') }}" method="POST" class="mt-8 space-y-5">
    @csrf
    @method('put')

    <div class="space-y-2">
        <x-input-label
            for="update_password_current_password"
            :value="__('Current Password')"
        />

        <x-text-input
            id="update_password_current_password"
            name="current_password"
            type="password"
            class="block w-full"
            autocomplete="current-password"
        />

        <x-input-error
            class="mt-1"
            :messages="$errors->updatePassword->get('current_password')"
        />
    </div>

    <div class="space-y-2">
        <x-input-label
            for="update_password_password"
            :value="__('New Password')"
        />

        <x-text-input
            id="update_password_password"
            name="password"
            type="password"
            class="block w-full"
            autocomplete="new-password"
        />

        <x-input-error
            class="mt-1"
            :messages="$errors->updatePassword->get('password')"
        />
    </div>

    <div class="space-y-2">
        <x-input-label
            for="update_password_password_confirmation"
            :value="__('Confirm Password')"
        />

        <x-text-input
            id="update_password_password_confirmation"
            name="password_confirmation"
            type="password"
            class="block w-full"
            autocomplete="new-password"
        />

        <x-input-error
            class="mt-1"
            :messages="$errors->updatePassword->get('password_confirmation')"
        />
    </div>

    <div class="flex items-center justify-between pt-2">
        <x-primary-button>
            {{ __('Save Password') }}
        </x-primary-button>

        @if (session('status') === 'password-updated')
            <span
                x-data="{ show: true }"
                x-show="show"
                x-transition.opacity
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-green-600"
            >
                {{ __('Password updated successfully.') }}
            </span>
        @endif
    </div>
</form>
