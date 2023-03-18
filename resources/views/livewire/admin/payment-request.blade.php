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
        <select name="search_filter" id="search_filter" wire:model="search_filter">
            <option value="reseller_id">Reseller ID</option>
            <option value="payment_id">Payment ID</option>
        </select>
        <select name="status_filter" id="status_filter" wire:model="status_filter">
            <option value="">Select Status</option>
            <option value="paid">Paid</option>
            <option value="pending">Pending</option>
        </select>
    </div>
    <div class="overflow-x-auto">
        <div class="overflow-hidden">
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Reseller ID</th>
                            <th class="py-3 px-6 text-left">Payment ID</th>
                            <th class="py-3 px-6 text-left">Reseller Name</th>
                            <th class="py-3 px-6 text-left">Withdraw Amount</th>
                            <th class="py-3 px-6 text-center">Requested At</th>
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
                                <span>{{ $payment->id }}</span>
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
                            <td class="py-3 px-6 text-center">
                                @if ($payment->is_paid == 'paid')
                                <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">{{ $payment->is_paid }}</span>
                                @else
                                <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">{{ $payment->is_paid }}</span>
                                @endif
                            </td>
                            <td class="py-3 px-6 text-center">
                                <a href="{{ route('payments.show', $payment) }}" class="bg-blue-200 text-blue-600 py-1 px-3 rounded-full text-xs">View Detail</a>
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
