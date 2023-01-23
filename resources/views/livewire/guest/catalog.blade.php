<div>
    <div class=" justify-start pt-5 pb-5 px-10 ml-10">
        <h2 class="font-bold text-2xl">Add to Cart: Demo</h2>

            <div class="w-full sm:max-w-2xl mt-6 mb-6 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div class="mb-4 px-4 py-3 leading-normal text-blue-700 bg-blue-100 rounded-lg text-right" role="alert">
                    <i class="fa fa-shopping-cart"></i>
                    Cart (@if($content != NULL)
                        {{-- {{ $content->products_count }} --}}
                    @endif)
                </div>
                <table class="table min-w-full">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Name</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Price</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                                <a href="{{ route('catalog-product', ['reseller' => $channel->id, 'product' => $product->id]) }}"> {{ $product->name }} </a>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                                ${{ number_format($product->price) }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">
                                {{-- @if ($content != NULL && $content->products->whereIn('id', $product->id)->count())
                                <button type="submit" wire:click.debounce.100ms="removeFromCart({{ $product->id }})"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Remove From Cart
                                </button> --}}
                                {{-- @else --}}
                                        {{-- <input wire:model="quantity.{{ $product->id }}" type="number"
                                               class="text-sm sm:text-base px-2 pr-2 rounded-lg border border-gray-400 py-1 focus:outline-none focus:border-blue-400"
                                               style="width: 50px"/> --}}
                                        <button type="submit"
                                                wire:click.debounce.100ms="addToCart({{ $product->id }})"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            Add to Cart
                                        </button>
                                </td>
                                {{-- @endif --}}
                        </tr>
                    @empty
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5" colspan="3">No
                                products found.
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
    </div>
    <div class="fixed inset-y-0 right-0 max-w-full flex">
        <div class="w-screen max-w-md">
            <div class="h-full flex flex-col py-6 bg-white shadow-xl overflow-y-scroll">
                <div class="px-6 sm:px-6">
                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                    Shopping Cart
                </h2>
                </div>
                <div class="mt-6 relative flex-1 px-6 sm:px-6">
                <!-- Replace with your content -->
                <div class="absolute inset-0 px-4 sm:px-6 text-sm">
                    <table class="table min-w-full">
                        <thead>
                            <tr>
                                <th class="px-2 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Name</th>
                                <th class="px-2 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Quantity</th>
                                <th class="px-2 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Price</th>
                                <th class="px-2 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Total</th>
                            </tr>
                        </thead>
                        @if ($content != NULL)
                        <tbody>
                            @forelse ($content as $id => $item)
                            <tr class="bg-blue-50">
                                <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5 text-gray">
                                {{ $item['name'] }}
                                </td>
                                <td class="px2 py-4 whitespace-no-wrap text-sm leading-5">
                                    <button wire:click="updateCartItem({{ $id }}, 'plus')" class="p-auto"> <i class="fa fa-plus"></i> </button>
                                    <input type="number" value="{{ $item['quantity'] }}" class="text-sm sm:text-base px-2 pr-2 rounded-lg border border-gray-400 py-1 focus:outline-none focus:border-blue-400" disabled
                                    style="width: 50px">
                                    <button wire:click="updateCartItem({{ $id }}, 'minus')" class="p-auto"> <i class="fa fa-minus"></i> </button>
                                </td>
                                <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5">
                                    {{ $item['price'] }}
                                </td>
                                <td class="px-2 py-4 whitespace-no-wrap text-sm leading-5">
                                    {{ $item['price'] * $item['quantity'] }}
                                </td>
                                <td class="whitespace-no-wrap text-sm leading-5">
                                    <Button wire:click.debounce.100ms="removeFromCart({{ $id }})">
                                        <i class="fa fa-trash"></i>
                                    </Button>
                                </td>
                            </tr>
                                @empty
                                <tr>
                                    No Product(s) On Cart Yet!
                                </tr>
                                @endforelse
                        </tbody>
                    </table>
                    <div class="flex justify-between mt-5 border border-gray">
                        <label for="" class="border-b-2 tracking-wider text-white">Total Price : </label>
                        <label for=""> {{ $total }}</label>
                    </div>
                    @endif
                    <a href="{{ route('catalog-checkout',['reseller' => $channel->id],) }}" class="button w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded py-2 mt-5"> <i class="fa fa-credit-card">  </i> <span>Checkout</span> </a>
                </div>
                <!-- /End replace -->
                </div>
            </div>
        </div>
    </div>
</div>
