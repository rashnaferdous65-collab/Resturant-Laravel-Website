<div class="space-y-6">

    <div>
        <h2 class="text-lg font-semibold text-gray-900">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-2 text-sm text-gray-600 leading-relaxed">
            {{ __('Deleting your account is permanent and cannot be undone. Please save any important information before proceeding.') }}
        </p>
    </div>

    <div>
        <x-danger-button
            x-data
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        >
            {{ __('Delete Account') }}
        </x-danger-button>
    </div>

    <x-modal
        name="confirm-user-deletion"
        :show="$errors->userDeletion->isNotEmpty()"
        focusable
    >
        <form
            method="POST"
            action="{{ route('profile.destroy') }}"
            class="p-6 space-y-5"
        >
            @csrf
            @method('delete')

            <div>
                <h2 class="text-xl font-semibold text-gray-900">
                    {{ __('Confirm Account Deletion') }}
                </h2>

                <p class="mt-2 text-sm text-gray-600">
                    {{ __('Please enter your password to permanently delete your account and all associated data.') }}
                </p>
            </div>

            <div>
                <x-input-label
                    for="password"
                    value="{{ __('Password') }}"
                    class="sr-only"
                />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="block w-full md:w-3/4 mt-2"
                    placeholder="{{ __('Enter your password') }}"
                />

                <x-input-error
                    :messages="$errors->userDeletion->get('password')"
                    class="mt-2"
                />
            </div>

            <div class="flex justify-end gap-3">
                <x-secondary-button
                    type="button"
                    x-on:click="$dispatch('close')"
                >
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button>
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>

</div>