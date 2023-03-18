<div>
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('All User`s Balance Info') }}
                </h2>
            </div>
        </div>
    </header>
    <div class="flex">
        <x-text-input wire:model="search" type="search" class="ml-2 py-0" placeholder="seacrh here"></x-text-input>
        <select name="filter" id="filter" wire:model="filter">
            <option value="">Select Filter</option>
            <option value="name">Name</option>
            <option value="id">ID</option>
        </select>
    </div>
    <div class="overflow-x-auto">
        <div class="overflow-hidden">
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Reseller ID</th>
                            <th class="py-3 px-6 text-left">Reseller Name</th>
                            <th class="py-3 px-6 text-left">Total Referral Fee</th>
                            <th class="py-3 px-6 text-left">Total Sales Fee</th>
                            <th class="py-3 px-6 text-left">Total Gained Profit</th>
                            <th class="py-3 px-6 text-left">Withdrawable Fee</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @forelse ($resellers as $reseller)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">
                                <span>{{ $reseller->id }}</span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span>{{ $reseller->name }}</span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span>{{ $reseller->referral_fee }}</span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span>{{ $reseller->sales_fee }}</span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span>{{ $reseller->total_fee }}</span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span>{{ $reseller->withdrawable }}</span>
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
