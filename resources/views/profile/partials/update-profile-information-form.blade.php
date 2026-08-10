<p class="text-sm text-gray-600 mt-1">
    {{ __("Update your account's profile information and email address.") }}
</p>
</header>

<form id="send-verification" action="{{ route('verification.send') }}" method="POST">
    @csrf
</form>

<form action="{{ route('profile.update') }}" method="POST" class="mt-6 space-y-5">
    @csrf
    @method('PATCH')

    {{-- Name --}}
    <div class="space-y-2">
        <x-input-label for="name" :value="__('Name')" />

        <x-text-input
            id="name"
            name="name"
            type="text"
            class="block w-full"
            :value="old('name', $user->name)"
            autocomplete="name"
            autofocus
            required
        />

        <x-input-error
            class="mt-1"
            :messages="$errors->get('name')"
        />
    </div>

    {{-- Email --}}
    <div class="space-y-2">
        <x-input-label for="email" :value="__('Email')" />

        <x-text-input
            id="email"
            name="email"
            type="email"
            class="block w-full"
            :value="old('email', $user->email)"
            autocomplete="username"
            required
        />

        <x-input-error
            class="mt-1"
            :messages="$errors->get('email')"
        />

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div class="mt-3">
                <p class="text-sm text-gray-800">
                    {{ __('Your email address is unverified.') }}

                    <button
                        type="submit"
                        form="send-verification"
                        class="ml-1 underline text-sm text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-md"
                    >
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 text-sm font-medium text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            </div>
        @endif
    </div>

    {{-- Action --}}
    <div class="flex items-center gap-4 pt-2">
        <x-primary-button>
            {{ __('Save') }}
        </x-primary-button>

        @if (session('status') === 'profile-updated')
            <span
                x-data="{ show: true }"
                x-show="show"
                x-transition.opacity
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600"
            >
                {{ __('Saved.') }}
            </span>
        @endif
    </div>
</form>
