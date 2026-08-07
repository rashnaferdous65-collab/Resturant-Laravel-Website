<x-slot name="header">
    <h2 class="font-bold text-2xl text-gray-900">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-4xl mx-auto px-6">
        <div class="rounded-2xl bg-white shadow-md overflow-hidden">
            <div class="border-b px-6 py-4">
                <h3 class="text-lg font-medium text-gray-800">
                    {{ __('Welcome') }}
                </h3>
            </div>

            <div class="px-6 py-6">
                <p class="text-base text-gray-600">
                    {{ __("You're logged in!") }}
                </p>
            </div>
        </div>
    </div>
</div>
