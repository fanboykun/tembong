<div>
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Users Withdrawl Request') }}
                </h2>
            </div>
        </div>
    </header>
    <div class="flex">
        <x-text-input wire:model="search" type="search" class="ml-2 py-0" placeholder="seacrh here"></x-text-input>
    </div>
    <div class="overflow-x-auto">
        <div class="overflow-hidden">
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Reseller ID</th>
                            <th class="py-3 px-6 text-left">Reseller Name</th>
                            <th class="py-3 px-6 text-left">Withdraw Amount</th>
                            <th class="py-3 px-6 text-center">Requested At</th>
                            <th class="py-3 px-6 text-center">Bank Info</th>
                            <th class="py-3 px-6 text-center">Account Name</th>
                            <th class="py-3 px-6 text-center">Account Number</th>
                            <th class="py-3 px-6 text-center">Status</th>
                            <th class="py-3 px-6 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @forelse ($payments as $payment)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">
                                <span>{{ $payment->user->id }}</span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span>{{ $payment->user->name }}</span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span>{{ $payment->amount }}</span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span>{{ $payment->created_at }}</span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span>{{ $payment->bank_info }}</span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span>{{ $payment->account_name }}</span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span>{{ $payment->account_number }}</span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <span class="bg-blue-200 text-blue-600 py-1 px-3 rounded-full text-xs">{{ $payment->is_payed ? 'Payed' : 'Pending' }}</span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <a href="{{ route('payments.show') }}" class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">View</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="py-3 px-6 text-center">
                                <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">No Data Found</span>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
