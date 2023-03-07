<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            {{-- @include('profile.partials.update-profile-information-form') --}}
                            <header>
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Account Validation') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __("This show your account validation information. If you haven't validate your account yet, please contact the admin") }}
                                </p>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __("You can start using the appication's full feature and start gain benefits after you validated") }}
                                </p>
                            </header>
                            <header>
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    Benefit
                                </h2>
                            </header>
                            <x-primary-button wire:click="sendValidationInfo()" class="mt-2">{{ __('Contact Admin') }}</x-primary-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
