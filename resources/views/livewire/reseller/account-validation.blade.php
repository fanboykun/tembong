<div>
    @if (auth()->user()->validated_at != null)
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <div class="max-w-xl">
            {{-- @include('profile.partials.update-profile-information-form') --}}
            <header>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Account Validation') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __("Your Account has been validated, now you can use all aplication resources") }}
                </p>
        </div>
    </div>
    @else
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
            <x-primary-button wire:click="sendValidationInfo()" class="mt-2">{{ __('Contact Admin') }}</x-primary-button>
        </div>
    </div>
    @endif
</div>
