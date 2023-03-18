<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your Balance Information') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Your Balance Info') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            minimum withdrawl request is Rp. 100.000
                        </p>
                    </header>
                    <div class="mt-4">
                        <div>
                            <x-input-label for="sales" :value="__('Sales Balance')" />
                            <x-text-input wire:model="sales_balance" name="sales" disabled type="number" class="mt-1 block w-full"/>
                        </div>
                        <div>
                            <x-input-label for="referral" :value="__('Referral Balance')" />
                            <x-text-input wire:model="referral_balance" name="referral" disabled type="number" class="mt-1 block w-full"/>
                        </div>
                        <div>
                            <x-input-label for="total" :value="__('Total Balance')" />
                            <x-text-input wire:model="total_balance" name="total" disabled type="number" class="mt-1 block w-full"/>
                        </div>
                        <div>
                            <x-input-label for="withdrawable" :value="__('Withdrawable Balance')" />
                            <x-text-input wire:model="withdrawabe_balance" name="withdrawable" disabled type="number" class="mt-1 block w-full"/>
                        </div>
                    </div>
                </div>
            </div>

            @livewire('reseller.withdraw-request')

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Your Withdrawl History') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Here is the list of withdrawl history") }}
                        </p>
                    </header>
                    <div class="overflow-x-auto">
                        <div class="overflow-hidden">
                            <div class="bg-white shadow-md rounded my-6">
                                <table class="min-w-max w-full table-auto">
                                    <thead>
                                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                            <th class="py-3 px-6 text-left">Balance Amount</th>
                                            <th class="py-3 px-6 text-left">Requested At</th>
                                            <th class="py-3 px-6 text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 text-sm font-light">
                                        @forelse ($payments as $payment)
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span class="font-medium">{{ $payment->amount }}</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-left">
                                                <span>{{ $payment->created_at }}</span>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">{{ $payment->is_paid ? 'Paid' : 'Pending' }}</span>
                                            </td>
                                        </tr>
                                        @empty
                                        No Data!!!
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
