<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Full Name -->
        <div>
            <x-input-label for="name" value="Full Name" />

            <x-text-input
                id="name"
                name="name"
                type="text"
                class="w-full mt-1"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
            />

            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email & Phone -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div>
                <x-input-label for="email" value="Email Address" />

                <x-text-input
                    id="email"
                    name="email"
                    type="email"
                    class="w-full mt-1"
                    :value="old('email')"
                    required
                    autocomplete="username"
                />

                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>

            <div>
                <x-input-label for="phone" value="Phone Number" />

                <x-text-input
                    id="phone"
                    name="phone"
                    type="tel"
                    class="w-full mt-1"
                    :value="old('phone')"
                    required
                    autocomplete="tel"
                />

                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div>

        </div>

        <!-- Address -->
        <div>
            <x-input-label for="address" value="Address" />

            <x-text-input
                id="address"
                name="address"
                type="text"
                class="w-full mt-1"
                :value="old('address')"
                required
                autocomplete="street-address"
            />

            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        <!-- Password Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div>
                <x-input-label for="password" value="Password" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="w-full mt-1"
                    required
                    autocomplete="new-password"
                />

                <x-input-error class="mt-2" :messages="$errors->get('password')" />
            </div>

            <div>
                <x-input-label for="password_confirmation" value="Confirm Password" />

                <x-text-input
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    class="w-full mt-1"
                    required
                    autocomplete="new-password"
                />

                <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
            </div>

        </div>

        <!-- Action -->
        <div class="flex items-center justify-between mt-6">

            <a href="{{ route('login') }}"
               class="text-sm text-gray-600 underline hover:text-gray-900">
                Already have an account?
            </a>

            <x-primary-button>
                Create Account
            </x-primary-button>

        </div>
    </form>
</x-guest-layout>
