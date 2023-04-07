<div>
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
                        <div x-data="{open : @entangle('showDropdown')}" class="relative inline-block text-left w-full">
                            <div class="flex w-full">
                            <x-text-input wire:model.delay="search_user" x-on:click="open = true" type="number" class="flex-1 w-full" placeholder="cari reseller berdasarkan ID" required></x-text-input>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('reseller_id')" />
                            <div x-cloak x-show="open" @click.outside="open = false" class="absolute right-0 z-10 mt-2 w-full origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none overflow-x-auto overflow-y-auto max-h-32" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                              <div class="py-1" role="none">
                                @if(!empty($users))
                                    @forelse ($users as $user)
                                    <button type="button" wire:click="selectReseller({{ $user->id }})" class="font-medium text-slate-900 block px-4 py-2 text-md w-full text-left" role="menuitem" tabindex="-1" id="menu-item-1">
                                        ({{ $user->id }}) <span class="text-gray-700">{{ $user->name }}</span>
                                    </button>
                                    @empty
                                        <p class="text-gray-700 block px-4 py-2 text-sm w-full text-left">No Data!</p>
                                    @endforelse
                                @endif
                              </div>
                              </div>

                            </div>
                        </div>
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Nama Pembeli</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <div class="flex w-full">
                            <x-text-input wire:model="buyer_name" type="text" class="flex-1" placeholder="nama pembeli" required></x-text-input>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('buyer_name')" />
                    </dd>
                </div>
                <div class="bg-green-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Nomor Telpon Pembeli</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <div class="flex w-full">
                            <x-text-input wire:model="buyer_phone" type="text" class="flex-1" placeholder="nomor telpon pembeli" required></x-text-input>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('buyer_phone')" />
                    </dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Alamat Pembeli</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <div class="flex w-full">
                            <x-text-input wire:model="full_address" type="text" class="flex-1" placeholder="alamat lengkap pembeli" required></x-text-input>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('full_address')" />
                    </dd>
                </div>
                <div class="bg-green-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Ongkos Kirim</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <div class="flex w-full">
                            <x-text-input wire:model="ongkir" type="number" class="flex-1" placeholder="ongkos pengiriman" required></x-text-input>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('ongkir')" />
                    </dd>
                </div>
                <div class="bg-green-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Status</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <div class="flex w-full">
                            <select id="status" name="status" wire:model="status" autocomplete="status" class="flex-shrink min-w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option value="placed">Belum Dikirim</option>
                                <option value="shipped">Sudah Dikirim</option>
                            </select>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('status')" />
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
                                            <div>
                                                <input type="number" min="1" wire:model.defer="quantity.{{ $product->id }}" name="quantity" id="quantity" class="bg-gray-50 w-32 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                            </div>
                                            <x-input-error class="mt-2" :messages="$errors->get('quantity.{{ $product->id }}')" />
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
                    <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0" aria-label="Table navigation">
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                            Menampilkan
                            <span class="font-semibold text-gray-900 dark:text-white">{{ empty($products) ? 0 : $products->count() }}</span>
                            dari
                            <span class="font-semibold text-gray-900 dark:text-white">{{ $products == [] ? 0 : $products->total() }}</span>
                        </span>
                        <button type="button" wire:click="loadMore()" class="text-sm font-normal text-indigo-600 ">
                            Muat Lebih ...
                        </button>
                    </nav>
                    @elseif($content_state == 'cart')
                    <header class="bg-white dark:bg-gray-800 shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            <div class="flex">
                                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                    {{ __('Detail Keranjang Orderan') }}
                                </h2>
                            </div>
                        </div>
                    </header>
                    <div class="overflow-x-auto max-h-96">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Nama Produk</th>
                                    <th scope="col" class="px-4 py-3 text-center">Qty</th>
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
                        <button wire:click="clearCart()" wire:loading.attr="disabled" wire:target="saveOrder" type="button" class="flex items-center justify-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">
                            <svg class="h-3.5 w-3.5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                            Reset Keranjang
                        </button>
                        <button wire:click="saveOrder()" wire:loading.attr="disabled" wire:target="saveOrder" type="button" class="flex items-center justify-center text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">
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

    <x-modal name="empty-cart" focusable>
        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                </svg>
            </div>
            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Keranjang Kosong !!!</h3>
                <div class="mt-2">
                <p class="text-sm text-gray-500">Mohon masukkan data ke keranjang dulu sebelum menyelesaikan Orderan</p>
                </div>
            </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
            <button type="button" x-on:click="$dispatch('close')" class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 sm:ml-3 sm:w-auto">Oke, Mengerti</button>
            </div>
        </div>
    </x-modal>

</div>
