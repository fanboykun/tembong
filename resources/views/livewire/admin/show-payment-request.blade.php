<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Withdrawl Request Detail
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
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
                            <x-input-label for="id" :value="__('Reseller ID')" />
                            <x-text-input disabled type="text" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="name" :value="__('Reseller Name')" />
                            <x-text-input  disabled type="text" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="phone" :value="__('Reseller Phone')" />
                            <x-text-input  disabled type="text" class="mt-1 block w-full" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Payment Information') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("This is the information of the payment and bank detail") }}
                        </p>
                    </header>
                    <div class="mt-6 space-y-6">
                        <div>
                            <x-input-label for="requested_at" :value="__('Requested At')" />
                            <x-text-input disabled type="text" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="amount" :value="__('Withdrawl Amount')" />
                            <x-text-input disabled type="text" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="bank" :value="__('Bank Name')" />
                            <x-text-input  disabled type="text" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="account_name" :value="__('Account Name')" />
                            <x-text-input  disabled type="text" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="account_number" :value="__('Account Number')" />
                            <x-text-input  disabled type="text" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="status" :value="__('Payment Status')" />
                            <x-text-input  disabled type="text" class="mt-1 block w-full" />
                        </div>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        If you want to finish the withdrawl status, make sure you have already transfer the money to the user.
                        </p>
                        <div class="flex items-center gap-4 mt-2">
                            <x-primary-button wire:click="updateStatus()">{{ __('Finish Withdrawl Request') }}</x-primary-button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
