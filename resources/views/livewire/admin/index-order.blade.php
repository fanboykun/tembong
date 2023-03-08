<div>
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('List of All Orders') }}
                </h2>
            </div>
        </div>
    </header>
    <div class="flex">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="{{ route('orders.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                {{ __('Create New Order') }}
            </a>
        </h2>
        <x-text-input wire:model="search" type="search" class="ml-2 py-0" placeholder="seacrh here"></x-text-input>
    </div>
    <div class="overflow-x-auto">
        <div class="overflow-hidden">
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Order ID</th>
                            <th class="py-3 px-6 text-left">Reseller ID</th>
                            <th class="py-3 px-6 text-left">Product Info</th>
                            <th class="py-3 px-6 text-center">Buyer Info</th>
                            <th class="py-3 px-6 text-left">Created At</th>
                            <th class="py-3 px-6 text-center">Discount</th>
                            <th class="py-3 px-6 text-center">Ongkir</th>
                            <th class="py-3 px-6 text-center">Total Price</th>
                            <th class="py-3 px-6 text-center">Order Status</th>
                            <th class="py-3 px-6 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        @forelse ($orders as $order)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">
                                <span>{{ $order->id }}</span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span>{{ $order->reseller_id }}</span>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <a href="{{ route('orders.product', ['order' => $order]) }}" class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">View Products</a>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <a href="" class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">View Buyer</a>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <span>{{ $order->created_at }}</span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <span>{{ $order->discount_type ?? 0 }}</span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <span>{{ $order->shipping_cost }}</span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <span>{{ $order->total_price }}</span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <span class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">{{ $order->status}}</span>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <a href="" class="bg-blue-200 text-blue-600 py-1 px-3 rounded-full text-xs">View</a>
                            </td>
                            @empty
                                <td>
                                    No Data!
                                </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
