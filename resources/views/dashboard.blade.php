<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-800">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <section class="py-10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-md border border-gray-200">
                <div class="px-8 py-6">
                    <p class="text-lg font-medium text-gray-700">
                        {{ __("You're logged in!") }}
                    </p>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
