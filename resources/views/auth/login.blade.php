<x-guest-layout>

    <div class="w-full max-w-md mx-auto">

        <div class="text-center mb-6">
            <h2 class="text-2xl font-bold">Welcome Back</h2>
            <p class="text-gray-500">Login to continue</p>
        </div>

        <!-- Session Message -->
        <x-auth-session-status
            class="mb-4"
            :status="session('status')"
        />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
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
                    autocomplete="username"
                />

                <x-input-error
                    :messages="$errors->get('email')"
                    class="mt-2"
                />
            </div>

            <!-- Password -->
            <div class="mb-5">
                <x-input-label
                    for="password"
                    :value="__('Password')"
                />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="w-full mt-2"
                    required
                    autocomplete="current-password"
                />

                <x-input-error
                    :messages="$errors->get('password')"
                    class="mt-2"
                />
            </div>

            <!-- Remember + Forgot -->
            <div class="flex items-center justify-between mb-6">

                <label class="flex items-center gap-2">
                    <input
                        id="remember_me"
                        name="remember"
                        type="checkbox"
                        class="rounded border-gray-300"
                    >

                    <span class="text-sm text-gray-600">
                        Remember Me
                    </span>
                </label>

                @if(Route::has('password.request'))
                    <a
                        href="{{ route('password.request') }}"
                        class="text-sm text-indigo-600 hover:underline"
                    >
                        Forgot Password?
                    </a>
                @endif

            </div>

            <!-- Login Button -->
            <div>
                <x-primary-button class="w-full justify-center">
                    Login
                </x-primary-button>
            </div>

        </form>

    </div>

</x-guest-layout>
