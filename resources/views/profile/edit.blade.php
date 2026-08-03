<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-800">
                {{ __('Profile') }}
            </h2>
        </div>
    </x-slot>

    <section class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid gap-6">

                <!-- Profile Information -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="mb-5 border-b pb-3">
                        <h3 class="text-lg font-semibold text-gray-800">
                            Profile Information
                        </h3>
                    </div>

                    <div class="max-w-2xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <!-- Update Password -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="mb-5 border-b pb-3">
                        <h3 class="text-lg font-semibold text-gray-800">
                            Change Password
                        </h3>
                    </div>

                    <div class="max-w-2xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <!-- Delete Account -->
                <div class="bg-white rounded-xl shadow-md p-6">
                    <div class="mb-5 border-b pb-3">
                        <h3 class="text-lg font-semibold text-red-600">
                            Delete Account
                        </h3>
                    </div>

                    <div class="max-w-2xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>

            </div>

        </div>
    </section>

</x-app-layout>
