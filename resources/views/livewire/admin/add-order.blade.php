<div>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex">
                    <x-primary-button class="m-auto" wire:click="$set('content_state', 'select_reseller')">Select Reseller</x-primary-button>
                    <x-primary-button class="m-auto" wire:click="$set('content_state', 'list_all_product')">All Products</x-primary-button>
                    <x-primary-button class="m-auto" wire:click="$set('content_state', 'in_cart_product')">In Cart Product</x-primary-button>
                    <x-primary-button class="m-auto" wire:click="$set('content_state', 'buyer_info')">Buyer Info</x-primary-button>
                    <x-primary-button class="m-auto" wire:click="$set('content_state', 'summary')">Summary</x-primary-button>
                </div>
            </div>
        </div>
    </div>
    @if ($content_state == 'select_reseller')
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div> --}}
                <div class="flex">
                    <x-text-input wire:model="search_user" type="search" class="ml-2 py-0" placeholder="seacrh reseller here"></x-text-input>
                    <select wire:model="filter_user" name="filter" id="filter">
                        <option value="">Pilih Filter</option>
                        <option value="id">Reseller ID</option>
                        <option value="name">Reseller Name</option>
                        <option value="email">Reseller Email</option>
                        <option value="phone">Reseller Phone</option>
                    </select>
                </div>
                @if ($users != null && $search_user != null)
                <div class="overflow-x-auto">
                    <div class="overflow-hidden">
                        <div class="bg-white shadow-md rounded my-6">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">Reseller ID</th>
                                        <th class="py-3 px-6 text-left">Name</th>
                                        <th class="py-3 px-6 text-left">Email</th>
                                        <th class="py-3 px-6 text-left">Phone Number</th>
                                        <th class="py-3 px-6 text-left"></th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                    @forelse ($users as $user)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $user->id }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $user->name }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $user->email }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $user->phone }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <button type="button" wire:click="selectReseller({{ $user->id }})" class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Pilih</button>
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
                @endif
            </div>
        </div>
    </div>
    @elseif ($content_state == 'list_all_product')
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex">
                    <x-text-input wire:model="search_product" type="search" class="ml-2 py-0" placeholder="seacrh product"></x-text-input>
                    <select wire:model="filter_product_category" name="filter_product_category" id="filter_product_category">
                        <option value="">All Category</option>
                        @forelse ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                            <option value="">No Data</option>
                        @endforelse
                    </select>
                    <select wire:model="filter_product_type" name="filter_product_type" id="filter_product_type">
                        <option value="">All Type</option>
                        @foreach ($types as $key => $type)
                            <option value="{{ $key }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- @if ($products != null && $search_product != null) --}}
                <div class="overflow-x-auto">
                    <div class="overflow-hidden">
                        <div class="bg-white shadow-md rounded my-6">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">Name</th>
                                        <th class="py-3 px-6 text-left">Type</th>
                                        <th class="py-3 px-6 text-left">Price</th>
                                        <th class="py-3 px-6 text-left">Category</th>
                                        <th class="py-3 px-6 text-left">Quantity</th>
                                        <th class="py-3 px-6 text-left"></th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                    {{-- @forelse ($content as $k => $item )

                                    @empty --}}
                                    @foreach ($products as $key => $product)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $product->name }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $product->type }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $product->price }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $product->category->name }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <input type="number" min="1" wire:model="quantity.{{ $product->id }}" name="quantity" id="quantity">
                                        </td>
                                        @if ($content->has($product->id))
                                            @if ($content[$product->id]['quantity'] == $quantity[$product->id])
                                            <td class="py-3 px-6 text-left">
                                                <button type="button" wire:click="removeFromCart({{ $product->id }})" class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Remove From Cart</button>
                                            </td>
                                            @else
                                            <td class="py-3 px-6 text-left">
                                                <button type="button" wire:click="updateQuantity({{ $product }})" class="bg-blue-200 text-blue-600 py-1 px-3 rounded-full text-xs">Update Quantity</button>
                                            </td>
                                            @endif
                                        @else
                                        <td class="py-3 px-6 text-left">
                                            <button type="button" wire:click="addToCart({{ $product }})" class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Add To Cart</button>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                    {{-- @endforelse --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- @endif --}}
            </div>
        </div>
    </div>
    @elseif ($content_state == 'in_cart_product')
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                {{-- @if ($products != null && $search_product != null) --}}
                <x-danger-button wire:click="clearCart"> Clear Cart</x-danger-button>
                <p class="text-white">Total : <x-text-input disabled value="{{ $total_price }}"></x-text-input></p>
                <div class="overflow-x-auto">
                    <div class="overflow-hidden">
                        <div class="bg-white shadow-md rounded my-6">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">Name</th>
                                        <th class="py-3 px-6 text-left">Price</th>
                                        <th class="py-3 px-6 text-left">Quantity</th>
                                        <th class="py-3 px-6 text-left"></th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                    @forelse ($content as $id => $item)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $item['name'] }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $item['price'] *  $item['quantity'] }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <button type="button" wire:click="decrementQty({{ $id }})" class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">-</button>
                                            <input type="number" disabled value="{{ $item['quantity'] }}" name="ic_quantity" id="ic_quantity">
                                            <button type="button" wire:click="incrementQty({{ $id }})" class="bg-blue-200 text-blue-600 py-1 px-3 rounded-full text-xs">+</button>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <button type="button" wire:click="removeFromCart({{ $id }})" class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Remove From Cart</button>
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
                {{-- @endif --}}
            </div>
        </div>
    </div>
    @elseif ($content_state == 'buyer_info')
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="mt-6 space-y-6">
                        <div>
                            <x-input-label for="name" :value="__('Buyer Name')" />
                            <x-text-input wire:model="buyer_name" type="text" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="phone" :value="__('Buyer Phone')" />
                            <x-text-input wire:model="buyer_phone" type="text" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="buyer_province" :value="__('Province')" />
                            <select wire:model="buyer_province" name="buyer_province" id="buyer_province">
                                @foreach ($provincies as $province)
                                <option value="{{ $province->id ?? '' }}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    {{ $province->name ?? '' }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <x-input-label for="buyer_city" :value="__('City')" />
                            <select wire:model="buyer_city" name="buyer_city" id="buyer_city">
                                @if ($cities != null)
                                @forelse ($cities as $city)
                                <option value="{{ $city->id }}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    {{ $city->name }}
                                </option>
                                @empty
                                <option value=""></option>
                                @endforelse
                                @endif@forelse($cities as $city)
                            </select>
                        </div>
                        <div>
                            <x-input-label for="buyer_district" :value="__('District')" />
                            <select wire:model="buyer_district" name="buyer_district" id="buyer_district">
                                @if ($districts != null)
                                @forelse ($districts as $district)
                                <option value="{{ $district->id }}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    {{ $district->name }}
                                </option>
                                @empty
                                @endforelse
                                @endif
                            </select>
                        </div>
                        <div>
                            <x-input-label for="buyer_village" :value="__('Village')" />
                            <select wire:model="buyer_village" name="buyer_village" id="buyer_village">
                                @if ($villages != null)
                                @forelse ($villages as $village)
                                <option value="{{ $village->id }}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    {{ $village->name }}
                                </option>
                                @empty
                                @endforelse
                                @endif
                            </select>
                        </div>
                        <div>
                            <x-input-label for="address_description" :value="__('Description')" />
                            <x-text-input wire:model="address_description" type="text" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="ongkir" :value="__('Ongkir')" />
                            <x-text-input wire:model="ongkir" type="text" class="mt-1 block w-full" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elseif ($content_state == 'summary')
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <p class="text-white">Reseller ID : {{ $reseller?->id }}</p>
                <p class="text-white">Reseller Name : {{ $reseller?->name }}</p>
                <h1 class="text-white">Buyer Info</h1>
                <p class="text-white">Buyer Name : {{ $buyer_name }}</p>
                <p class="text-white">Buyer Phone : {{ $buyer_phone }}</p>
                <p class="text-white">Buyer Address : {{ $full_address }}</p>
                <p class="text-white">Buyer Address Description : {{ $address_description }}</p>
                <h1 class="text-white">Order Info</h1>
                <p class="text-white">Ongkir : {{ $ongkir }}</p>
                <p class="text-white">Best Seller Item : {{ $best_seller_item }}</p>
                <p class="text-white">Top Seller Item : {{ $top_seller_item }}</p>
                <p class="text-white">Discount Type : {{ $discount_type }}</p>
                <p class="text-white">Total Discount : {{ $total_discount }}</p>
                <p class="text-white">Price Before Discount : {{ $total_price }}</p>
                <p class="text-white">Price After Discount : {{ $price_after_discount }}</p>
                <p class="text-white">Total Price With Ongkir : {{ $total_price_with_ongkir }}</p>
                <p class="text-white">Total Quantity : {{ $total_qty }}</p>
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
                                    @forelse ($content as $id => $item)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $item['name'] }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $item['quantity'] }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $item['price'] }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $item['price'] *  $item['quantity'] }}</span>
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
                    <x-primary-button wire:click="saveOrder()" type="submit">{{ __('Save Order') }}</x-primary-button>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
