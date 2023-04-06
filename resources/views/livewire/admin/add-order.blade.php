<div>
    {{-- <div class="py-4">
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
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @elseif ($content_state == 'in_cart_product')
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
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
                            <textarea name="full_address" class="mt-1 block w-full" id="" cols="" rows="" wire:model="full_address"></textarea>
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
            <div class="bg-white text-black overflow-hidden shadow-sm sm:rounded-lg">
                <p class="">Reseller ID : {{ $reseller?->id }}</p>
                <p class="">Reseller Name : {{ $reseller?->name }}</p>
                <h1 class="">Buyer Info</h1>
                <p class="">Buyer Name : {{ $buyer_name }}</p>
                <p class="">Buyer Phone : {{ $buyer_phone }}</p>
                <p class="">Buyer Address : {{ $full_address }}</p>
                <h1 class="">Order Info</h1>
                <p class="">Ongkir : {{ $ongkir }}</p>
                <p class="">Best Seller Item : {{ $best_seller_item }}</p>
                <p class="">Top Seller Item : {{ $top_seller_item }}</p>
                <p class="">Discount Type : {{ $discount_type }}</p>
                <p class="">Total Discount : {{ $total_discount }}</p>
                <p class="">Price Before Discount : {{ $total_price }}</p>
                <p class="">Price After Discount : {{ $price_after_discount }}</p>
                <p class="">Total Price With Ongkir : {{ $total_price_with_ongkir }}</p>
                <p class="">Total Quantity : {{ $total_qty }}</p>
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
    @endif --}}

    <div class="overflow-hidden bg-white shadow sm:rounded-lg pt-6">
        <div class="px-4 py-5 sm:px-6">
          <h3 class="text-base font-semibold leading-6 text-gray-900">Tambah Order</h3>
          <p class="mt-1 max-w-2xl text-sm text-gray-500">
              <span class="font-semibold text-gray-900 dark:text-white">
              </span>
        </p>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-green-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Reseller Id</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <div class="relative inline-block text-left">
                            <div class="flex w-full">
                            <x-text-input wire:model="reseller_id" type="text" class="flex-1 w-full" placeholder="cari reseller berdasarkan ID"></x-text-input>
                            </div>

                            <!--
                              Dropdown menu, show/hide based on menu state.

                              Entering: "transition ease-out duration-100"
                                From: "transform opacity-0 scale-95"
                                To: "transform opacity-100 scale-100"
                              Leaving: "transition ease-in duration-75"
                                From: "transform opacity-100 scale-100"
                                To: "transform opacity-0 scale-95"
                            -->
                            <div class="absolute right-0 z-10 mt-2 w-full origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                              <div class="py-1" role="none">
                                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                <button type="button" class="text-gray-700 block px-4 py-2 text-sm w-full text-left" role="menuitem" tabindex="-1" id="menu-item-1">
                                    Duplicate
                                </button>
                              </div>
                              <div class="py-1" role="none">
                                <button type="button" class="text-gray-700 block px-4 py-2 text-sm w-full text-left" role="menuitem" tabindex="-1" id="menu-item-1">
                                    Duplicate
                                </button>
                              </div>

                            </div>
                        </div>
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Nama Pembeli</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <div class="flex w-full">
                            <x-text-input wire:model="buyer_name" type="text" class="flex-1" placeholder="nama pembeli"></x-text-input>
                        </div>
                    </dd>
                </div>
                <div class="bg-green-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Nomor Telpon Pembeli</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <div class="flex w-full">
                            <x-text-input wire:model="buyer_phone" type="text" class="flex-1" placeholder="nomor telpon pembeli"></x-text-input>
                        </div>
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Alamat Pembeli</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <div class="flex w-full">
                            <x-text-input wire:model="full_address" type="text" class="flex-1" placeholder="alamat lengkap pembeli"></x-text-input>
                        </div>
                    </dd>
                </div>
                <div class="bg-green-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Ongkos Kirim</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <div class="flex w-full">
                            <x-text-input wire:model="ongkir" type="text" class="flex-1" placeholder="ongkos pengiriman"></x-text-input>
                        </div>
                    </dd>
                </div>
                <div class="bg-green-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Status</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <select id="status" name="status" wire:model="status" autocomplete="status" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <option value="placed">Belum Dikirim</option>
                            <option value="shipped">Sudah Dikirim</option>
                        </select>
                    </dd>
                </div>
            </dl>
          <!-- Product List -->
            <section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
            <div class="px-2 mx-auto max-w-screen-2xl lg:px-2">
                <div class="relative overflow-hidden bg-white shadow-md">

                    <div class="flex justify-center border-b border-gray-200">
                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500">
                            <li class="mr-2">
                                <button type="button" wire:click="$set('content_state', 'product')" class="inline-flex p-4 border-b-2 border-transparent rounded-t-lg {{ $content_state == 'product' ? ' text-blue-600 border-blue-600 active' : 'hover:text-gray-600 hover:border-gray-300' }} ">
                                    <svg aria-hidden="true" class="w-5 h-5 mr-2 {{ $content_state == 'product' ? ' text-blue-600' : 'text-gray-400 group-hover:text-gray-500' }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                                    List Produk
                                </button>
                            </li>
                            <li class="mr-2">
                                <button type="button" wire:click="$set('content_state', 'cart')" class="inline-flex p-4 border-b-2 rounded-t-lg {{ $content_state == 'cart' ? ' text-blue-600 border-blue-600 active' : 'hover:text-gray-600 hover:border-gray-300' }}" aria-current="page">
                                    <svg class="w-5 h-5 mr-2 {{ $content_state == 'cart' ? ' text-blue-600' : 'text-gray-400 group-hover:text-gray-500' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                    Keranjang
                                </button>
                            </li>
                        </ul>
                    </div>
                    @if ($content_state == 'product')
                    <header class="bg-white dark:bg-gray-800 shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            <div class="flex">
                                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                    {{ __('Pilih Produk') }}
                                </h2>
                            </div>
                        </div>
                    </header>
                    <div class="flex flex-col md:flex-row items-center justify-center space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-1/2">
                            <form class="flex items-center">
                                <label for="simple-search" class="sr-only">Cari</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input wire:model="search_product" type="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Cari nama produk" required="">
                                </div>
                            </form>
                        </div>
                        <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                            <div class="flex items-center space-x-3 w-full md:w-auto">
                                <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                                    <svg class="-ml-1 mr-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                    </svg>
                                    {{ $selected_type ?? 'Semua Tipe' }}
                                </button>
                                <div id="actionsDropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="actionsDropdownButton">
                                        <li>
                                            <button type="button" wire:click="$set('filter_product_type', '')" class="inline-flex w-full py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                Semua Tipe
                                            </button>
                                        </li>
                                        @foreach ($types as $key => $value)
                                        <li>
                                            <button type="button" wire:click="updateType('{{ $key }}', '{{ $value }}')" class="inline-flex w-full py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                {{ $value }}
                                            </button>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                                    {{ $selected_cat == '' ? 'Semua Kategori' : $selected_cat }}
                                    <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                    </svg>
                                </button>
                                <div id="filterDropdown" class="z-10 hidden w-48 bg-white rounded-lg shadow dark:bg-gray-700">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="actionsDropdownButton">
                                        <li>
                                            <button type="button" wire:click="updateCategory('')" class="inline-flex w-full py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                Semua Kategori
                                            </button>
                                        </li>
                                        @forelse ($categories as $category)
                                        <li>
                                            <button type="button" wire:click="updateCategory({{ $category->id }}, '{{ $category->name }}')" class="inline-flex w-full py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                {{ $category->name }}
                                            </button>
                                        </li>
                                        @empty
                                        <li>

                                        </li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table -->
                    <div class="overflow-x-auto max-h-96">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Nama Produk</th>
                                    <th scope="col" class="px-4 py-3 text-right">Harga Satuan</th>
                                    <th scope="col" class="px-4 py-3">Tipe</th>
                                    <th scope="col" class="px-4 py-3">Kuantitas</th>
                                    <th scope="col" class="px-4 py-3 text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $product->name }}
                                        <div class="text-sm">
                                            <div class="text-gray-400">{{ $product->category->name }}</div>
                                          </div>
                                    </td>
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap text-right dark:text-white">
                                        {{ number_format($product->price, 0, ',', '.') }}
                                    </td>
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
                                            {{ $product->type }}
                                        </span>
                                    </td>
                                    <td class="text-right px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center space-x-3">
                                            {{-- <button class="inline-flex items-center p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                                                <span class="sr-only">Quantity button</span>
                                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                                            </button> --}}
                                            <div>
                                                <input type="number" min="1" wire:model="quantity.{{ $product->id }}" name="quantity" id="quantity" class="bg-gray-50 w-32 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                            </div>
                                            {{-- <button class="inline-flex items-center p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                                                <span class="sr-only">Quantity button</span>
                                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                            </button> --}}
                                        </div>
                                    </td>
                                    @if ($content->has($product->id))
                                        @if ($content[$product->id]['quantity'] == $quantity[$product->id])
                                        <td class="py-3 px-6 text-left">
                                            <button type="button" wire:click="removeFromCart({{ $product->id }})" class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Hapus</button>
                                        </td>
                                        @else
                                        <td class="py-3 px-6 text-left">
                                            <button type="button" wire:click="updateQuantity({{ $product }})" class="bg-blue-200 text-blue-600 py-1 px-3 rounded-full text-xs">Update Quantity</button>
                                        </td>
                                        @endif
                                    @else
                                    <td class="py-3 px-6 text-left">
                                        <button type="button" wire:click="addToCart({{ $product }})" class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Tambah</button>
                                    </td>
                                    @endif
                                </tr>
                                @empty
                                <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Tidak ada data
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @elseif($content_state == 'cart')
                    <div class="overflow-x-auto max-h-96">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Nama Produk</th>
                                    <th scope="col" class="px-4 py-3 text-right">Harga Satuan</th>
                                    <th scope="col" class="px-4 py-3 text-center">Kuantitas</th>
                                    <th scope="col" class="px-4 py-3 text-center">Aksi</th>
                                    <th scope="col" class="px-4 py-3 text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($content as $id => $item)
                                <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item['name'] }}
                                    </td>
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap text-right dark:text-white">
                                        {{ number_format($item['price'], 0, ',', '.') }}
                                    </td>
                                    <td class="text-right px-4 py-2 font-medium justify-center text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex justify-center space-x-3">
                                            <button type="button" wire:click="decrementQty({{ $id }})" class="inline-flex items-center p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                                                <span class="sr-only">Quantity button</span>
                                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                                            </button>
                                            <div>
                                                <input type="number" disabled value="{{ $item['quantity'] }}" name="ic_quantity" id="ic_quantity" class="bg-gray-50 w-32 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </div>
                                            <button type="button" wire:click="incrementQty({{ $id }})" class="inline-flex items-center p-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                                                <span class="sr-only">Quantity button</span>
                                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <button type="button" wire:click="removeFromCart({{ $id }})" class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Hapus</button>
                                    </td>
                                    <td class="text-right py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                                    </td>
                                </tr>
                                @empty
                                <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        Tidak ada data
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <tfoot class="bg-gray-100">
                                <tr class="font-semibold text-gray-900 border-y-2">
                                    <td class="px-4 py-3 text-center" colspan="2" class="px-6 py-3 text-base">Total</td>
                                    <td class="px-4 py-3 text-right mr-12"></td>
                                    <td class="px-4 py-3 text-right">{{ number_format($total_price, 0, ',', '.') }}</td>
                                </tr>
                                <tr class="font-semibold text-gray-900 border-y-2">
                                    <th scope="row" class="px-6 py-3 text-base"></th>
                                    <td colspan="2" class="px-4 py-3">Total Quantity</td>
                                    <td class="px-4 py-3 text-right">{{ $total_qty }}</td>
                                </tr>
                                <tr class="font-semibold text-gray-900 border-y-2">
                                    <th scope="row" class="px-6 py-3 text-base"></th>
                                    <td colspan="2" class="px-4 py-3">Tipe Diskon</td>
                                    <td class="px-4 py-3 text-right"></td>
                                </tr>
                                <tr class="font-semibold text-gray-900 border-y-2">
                                    <th scope="row" class="px-6 py-3 text-base"></th>
                                    <td colspan="2" class="px-4 py-3">Total Diskon</td>
                                    <td class="px-4 py-3 text-right ">{{ number_format($total_discount, 0, ',', '.') }}</td>
                                </tr>
                                <tr class="font-semibold text-gray-900 border-y-2">
                                    <th scope="row" class="px-6 py-3 text-base"></th>
                                    <td colspan="2" class="px-4 py-3">Harga Setelah Diskon</td>
                                    <td class="px-4 py-3 text-right ">{{ number_format($price_after_discount, 0, ',', '.') }}</td>
                                </tr>
                                <tr class="font-semibold text-gray-900 border-y-2">
                                    <th scope="row" class="px-6 py-3 text-base"></th>
                                    <td colspan="2" class="col-start-2 px-4 py-3">Ongkir</td>
                                    <td class="px-4 py-3 text-right ">{{ number_format($ongkir, 0, ',', '.') }}</td>
                                </tr>
                                <tr class="font-semibold text-gray-900 border-y-2">
                                    <th scope="row" class="px-6 py-3 text-base"></th>
                                    <td colspan="2" class="px-4 py-3">Total Harga Dengan Diskon Dan Ongkir</td>
                                    <td class="px-4 py-3 text-right ">{{ number_format($total_price_with_ongkir, 0, ',', '.') }}</td>
                                </tr>
                            </tfoot>

                        </table>
                    </div>
                    @endif
                    <!-- Actions -->
                    <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0" aria-label="Table navigation">
                        <button wire:click="clearCart()" type="button" class="flex items-center justify-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">
                            <svg class="h-3.5 w-3.5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                            Reset Keranjang
                        </button>
                        <button wire:click="saveOrder()" type="button" class="flex items-center justify-center text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">
                            <svg class="h-3.5 w-3.5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Simpan
                        </button>
                    </nav>
                </div>
            </div>
            </section>
        </div>
    </div>

</div>
