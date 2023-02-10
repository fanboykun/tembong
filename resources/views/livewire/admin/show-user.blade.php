<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $user->name }}'s Account Information
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    {{-- @include('profile.partials.update-password-form') --}}
                    <div class="space-y-6">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Account Status') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('This is the status of the account, wether it is been validated or not. If the user have already payed for using the apps, update the users status') }}
                            </p>
                        </header>
                        <div>
                            <x-input-label for="status" :value="__('Status')" />
                            <x-text-input value="{{ $user->validated_at ? 'Validated' : 'Unvalidated' }}" disabled type="text" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="validated_at" :value="__('Validated At')" />
                            <x-text-input value="{{ $user->validated_at ?? '' }}" disabled type="text" class="mt-1 block w-full" />
                        </div>
                        @if ($user->validated_at != null)
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('This account has already beed validated, if you want to change it, click the unvalidate account button') }}
                        </p>
                            <x-danger-button type="submit" wire:click.prevent="unvalidateAccount" >{{ __('Unvalidate Account') }}</x-danger-button>
                        @else
                            <x-primary-button type="submit" wire:click.prevent="validateAccount" >{{ __('Validate Account') }}</x-primary-button>
                        @endif
                    </div>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    {{-- @include('profile.partials.update-profile-information-form') --}}
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Users Information') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("This is the information of this user (reseller)") }}
                        </p>
                    </header>
                    <div class="mt-6 space-y-6">
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input value="{{ $user->name }}" disabled type="text" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input value="{{ $user->email }}" disabled type="text" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input value="{{ $user->address }}" disabled type="text" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="phone" :value="__('Phone')" />
                            <x-text-input value="{{ $user->phone }}" disabled type="text" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="Status" :value="__('Created At')" />
                            <x-text-input value="{{ $user->created_at }}" disabled type="text" class="mt-1 block w-full" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
