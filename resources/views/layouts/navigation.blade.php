<nav x-data="{ open: false }" class="bg-white shadow border-b border-gray-200">

    <div class="max-w-7xl mx-auto px-5 lg:px-8">

        <div class="flex items-center justify-between h-16">

            <!-- Left Section -->
            <div class="flex items-center gap-8">

                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center">
                    <x-application-logo class="h-9 w-auto text-gray-800 fill-current" />
                </a>

                <!-- Desktop Menu -->
                <div class="hidden sm:flex items-center gap-6">
                    <x-nav-link
                        :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')">

                        {{ __('Dashboard') }}

                    </x-nav-link>
                </div>

            </div>

            <!-- Right Section -->
            <div class="hidden sm:flex items-center">

                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">

                        <button
                            class="flex items-center gap-2 rounded-lg px-3 py-2 text-sm font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-100 transition">

                            <span>{{ Auth::user()->name }}</span>

                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>

                        </button>

                    </x-slot>

                    <x-slot name="content">

                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">

                                {{ __('Log Out') }}

                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>

            <!-- Mobile Button -->
            <button
                @click="open = !open"
                class="sm:hidden p-2 rounded-md text-gray-500 hover:bg-gray-100">

                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path
                        :class="{ 'hidden': open, 'block': !open }"
                        class="block"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />

                    <path
                        :class="{ 'block': open, 'hidden': !open }"
                        class="hidden"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 6l12 12M6 18L18 6" />

                </svg>

            </button>

        </div>

    </div>

    <!-- Mobile Navigation -->
    <div x-show="open" class="sm:hidden border-t border-gray-200">

        <div class="py-2">

            <x-responsive-nav-link
                :href="route('dashboard')"
                :active="request()->routeIs('dashboard')">

                {{ __('Dashboard') }}

            </x-responsive-nav-link>

        </div>

        <div class="border-t border-gray-200 py-4">

            <div class="px-4">

                <p class="font-semibold text-gray-800">
                    {{ Auth::user()->name }}
                </p>

                <p class="text-sm text-gray-500">
                    {{ Auth::user()->email }}
                </p>

            </div>

            <div class="mt-3 space-y-1">

                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link
                        :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">

                        {{ __('Log Out') }}

                    </x-responsive-nav-link>

                </form>

            </div>

        </div>

    </div>

</nav>
