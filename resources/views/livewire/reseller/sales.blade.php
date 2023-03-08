<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your Sales List') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Your Sales Info') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Information about your sales recap
                        </p>
                    </header>
                    <div class="mt-4">
                        <div>
                            <x-input-label for="sales_count" :value="__('Total Sales Count')" />
                            <x-text-input wire:model="total_sales_count" name="sales_count" disabled type="number" class="mt-1 block w-full"/>
                        </div>
                        <div>
                            <x-input-label for="sales_fee" :value="__('Total Sales Fee')" />
                            <x-text-input wire:model="total_sales_fee" name="sales_fee" disabled type="number" class="mt-1 block w-full"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Sales History') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Here is the list of sales history") }}
                        </p>
                    </header>
                    <div class="overflow-x-auto">
                        <div class="overflow-hidden">
                            <div class="bg-white shadow-md rounded my-6">
                                <table class="min-w-max w-full table-auto">
                                    <thead>
                                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                            <th class="py-3 px-6 text-left">Order Registered at</th>
                                            <th class="py-3 px-6 text-left">Sales Fee</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 text-sm font-light">
                                        @forelse ($sales as $sale)
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="py-3 px-6 text-left">
                                                <span>{{ $sale->created_at }}</span>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">{{ $sale->balance->amount }}</span>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="py-3 px-6 text-left">
                                                <span class="font-medium">No Sales History</span>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs"></span>
                                            </td>
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
