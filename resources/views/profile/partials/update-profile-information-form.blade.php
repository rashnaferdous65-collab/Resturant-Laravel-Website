<p class="mt-1 text-sm text-gray-500">
    {{ __("Update your account's profile information and email address.") }}
</p>
</header>

<form id="send-verification" method="POST" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="POST" action="{{ route('profile.update') }}" class="mt-6">

    @csrf
    @method('PATCH')

    <div class="space-y-6">

        <div>
            <x-input-label
                for="name"
                :value="__('Name')"
            />

            <x-text-input
                id="name"
                name="name"
                type="text"
                :value="old('name', $user->name)"
                class="block w-full mt-1"
                autocomplete="name"
                autofocus
                required
            />

            <x-input-error
                :messages="$errors->get('name')"
                class="mt-2"
            />
        </div>

        <div>
            <x-input-label
                for="email"
                :value="__('Email')"
            />

            <x-text-input
                id="email"
                name="email"
                type="email"
                :value="old('email', $user->email)"
                class="block w-full mt-1"
                autocomplete="username"
                required
            />

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2"
            />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

                <div class="mt-4">

                    <p class="text-sm text-gray-700">
                        {{ __('Your email address is unverified.') }}

                        <button
                            form="send-verification"
                            type="submit"
                            class="ml-2 rounded underline text-sm text-gray-600 hover:text-gray-900 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                        >
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <div class="mt-2 text-sm font-medium text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </div>
                    @endif

                </div>

            @endif

        </div>

        <div class="flex items-center space-x-4">

            <x-primary-button>
                {{ __('Save') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')

                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-500"
                >
                    {{ __('Saved.') }}
                </p>

            @endif

        </div>

    </div>

</form>