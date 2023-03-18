<div>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <p class="text-white">Reseller ID : {{ $order->reseller->id }}</p>
                <p class="text-white">Reseller Name : {{ $order->reseller->name }}</p>
                <h1 class="text-white">Buyer Info</h1>
                <p class="text-white">Buyer Name : {{ $order->buyer->buyer_name }}</p>
                <p class="text-white">Buyer Phone : {{ $order->buyer->buyer_phone }}</p>
                <p class="text-white">Buyer Address : {{ $order->full_address }}</p>
                {{-- <p class="text-white">Buyer Address Description : {{ $order->buyer->buyer_address_description }}</p> --}}
                <h1 class="text-white">Order Info</h1>
                <p class="text-white">Ongkir : {{ $order->shipping_cost }}</p>
                <p class="text-white">Best Seller Item : {{ $order->best_seller_item }}</p>
                <p class="text-white">Top Seller Item : {{ $order->top_seller_item }}</p>
                <p class="text-white">Discount Type : {{ $order->discount_type }}</p>
                <p class="text-white">Total Discount : {{ $order->total_discount }}</p>
                <p class="text-white">Price Before Discount : {{ $order->total_price }}</p>
                <p class="text-white">Price After Discount : {{ $order->price_after_discount }}</p>
                <p class="text-white">Total Price With Ongkir : {{ $order->total_price_with_ongkir }}</p>
                <p class="text-white">Total Quantity : {{ $order->total_qty }}</p>
                <div class="overflow-x-auto">
                    <div class="overflow-hidden">
                        <div class="bg-white shadow-md rounded my-6">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">Item Name</th>
                                        <th class="py-3 px-6 text-left">Quantity</th>
                                        <th class="py-3 px-6 text-left">@</th>
                                        <th class="py-3 px-6 text-left">Total Price</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                    @forelse ($order->products as $id => $product)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $product->name }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $product->pivot->quantity }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $product->price }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $product->price *  $product->quantity }}</span>
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
                <div class="flex items-center gap-4 mt-2">
                    <x-primary-button wire:click="updateOrder()" type="submit">{{ __('Finish Order') }}</x-primary-button>
                </div>
            </div>
        </div>
    </div>
</div>
