<div>

    <div class="overflow-hidden bg-white shadow sm:rounded-lg pt-6">
        <div class="px-4 py-5 sm:px-6">
          <h3 class="text-base font-semibold leading-6 text-gray-900">Rincian Order</h3>
          <p class="mt-1 max-w-2xl text-sm text-gray-500">
            order dibuat pada
            <span class="font-semibold text-gray-900 dark:text-white">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->created_at)->format('d M Y') }}</span>
            diupdate pada
            <span class="font-semibold text-gray-900 dark:text-white">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->updated_at)->format('d M Y') }}</span>
            dengan status
            @if ($order->status == 'placed')
            <span class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">belum dikirim</span>
            @elseif ($order->status == 'shipped')
                <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">sudah dikirim</span>
            @endif
        </p>
        </div>
        <div class="border-t border-gray-200">
            <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Order Id</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $order->id }}</dd>
                </div>
                <div x-data="{ open: false, dropdown : @entangle('showDropdown') }" @info-updated.window="open = false" class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Dropshipper Id</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <div x-show="open == false" class="flex w-full justify-between">
                            <span>
                                {{ $order->reseller_id }}
                            </span>
                            <div class="flex">
                                <button x-on:click="open = ! open" type="button" class="px-4 font-medium text-indigo-600 hover:text-indigo-500">Edit</button>
                            </div>
                        </div>
                        <div class="relative inline-block text-left w-full">
                            <div x-cloak x-show="open" class="flex w-full">
                                <x-text-input wire:model="reseller_id" x-on:click="dropdown = true" type="text" class="flex-1" placeholder="seacrh reseller here"></x-text-input>
                                <div class="ml-4 flex-shrink-0">
                                    <button x-cloak x-on:click="open = ! open"  type="button" class="flex font-medium text-red-600 hover:text-red-500">Batal</button>
                                    <button x-cloak wire:click="updateInfo('reseller_id')"  type="button" class="flex font-medium text-indigo-600 hover:text-indigo-500">Simpan</button>
                                </div>
                            </div>
                            <div x-cloak x-show="dropdown" @click.outside="dropdown = false" class="absolute right-0 z-10 mt-2 w-full origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none overflow-x-auto overflow-y-auto max-h-32" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
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
                        <x-input-error class="mt-2" :messages="$errors->get('reseller_id')" />
                    </dd>
                </div>
                <div x-data="{ open: false }" @info-updated.window="open = false" class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Nama Pembeli</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <div class="flex w-full justify-between">
                            <span :class="open ? 'hidden' : ''">
                                {{ $order->buyer->buyer_name }}
                            </span>
                            <div :class="open ? 'hidden' : ''" class="flex">
                                <button x-on:click="open = ! open" type="button" class="px-4 font-medium text-indigo-600 hover:text-indigo-500">Edit</button>
                            </div>
                        </div>
                        <div x-cloak x-show="open" class="flex w-full">
                            <x-text-input wire:model.defer="buyer_name" type="text" class="flex-1" placeholder="seacrh reseller here"></x-text-input>
                            <div class="ml-4 flex-shrink-0">
                                <button x-cloak x-on:click="open = ! open"  type="button" class="flex font-medium text-red-600 hover:text-red-500">Batal</button>
                                <button x-cloak wire:click="updateInfo('buyer_name')"  type="button" class="flex font-medium text-indigo-600 hover:text-indigo-500">Simpan</button>
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('buyer_name')" />
                    </dd>
                </div>
                <div x-data="{ open: false }" @info-updated.window="open = false" class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Nomor Telpon Pembeli</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <div class="flex w-full justify-between">
                            <span :class="open ? 'hidden' : ''">
                                {{ $order->buyer->buyer_phone }}
                            </span>
                            <div :class="open ? 'hidden' : ''" class="flex">
                                <button x-on:click="open = ! open" type="button" class="px-4 font-medium text-indigo-600 hover:text-indigo-500">Edit</button>
                            </div>
                        </div>
                        <div x-cloak x-show="open" class="flex w-full">
                            <x-text-input wire:model.defer="buyer_phone" type="text" class="flex-1" placeholder="seacrh reseller here"></x-text-input>
                            <div class="ml-4 flex-shrink-0">
                                <button x-cloak x-on:click="open = ! open"  type="button" class="flex font-medium text-red-600 hover:text-red-500">Batal</button>
                                <button x-cloak wire:click="updateInfo('buyer_phone')"  type="button" class="flex font-medium text-indigo-600 hover:text-indigo-500">Simpan</button>
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('buyer_phone')" />
                    </dd>
                </div>
                <div x-data="{ open: false }" @info-updated.window="open = false" class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Alamat Pembeli</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <div class="flex w-full justify-between">
                            <span :class="open ? 'hidden' : ''">
                                {{ $order->buyer->full_address }}
                            </span>
                            <div :class="open ? 'hidden' : ''" class="flex">
                                <button x-on:click="open = ! open" type="button" class="px-4 font-medium text-indigo-600 hover:text-indigo-500">Edit</button>
                            </div>
                        </div>
                        <div x-cloak x-show="open" class="flex w-full">
                            <x-text-input wire:model.defer="buyer_address" type="text" class="flex-1" placeholder="seacrh reseller here"></x-text-input>
                            <div class="ml-4 flex-shrink-0">
                                <button x-cloak  x-on:click="open = ! open"  type="button" class="flex font-medium text-red-600 hover:text-red-500">Batal</button>
                                <button x-cloak wire:click="updateInfo('buyer_address')" type="button" class="flex font-medium text-indigo-600 hover:text-indigo-500">Simpan</button>
                            </div>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('buyer_address')" />
                    </dd>
                </div>
                {{-- <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Jumlah Item Best Seller</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                    {{ $order->best_seller_item }}
                    </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Jumlah Item Top Seller</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $order->top_seller_item }}</dd>
                </div> --}}
            </dl>
          <!-- Product List -->
            <section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
            <div class="px-2 mx-auto max-w-screen-2xl lg:px-2">
                <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                    <header class="bg-white dark:bg-gray-800 shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            <div class="flex">
                                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                    {{ __('List Barang') }}
                                </h2>
                            </div>
                        </div>
                    </header>
                    <!-- Table -->
                    <div class="overflow-x-auto max-h-96">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Nama Produk</th>
                                    <th scope="col" class="px-4 py-3">Harga Satuan</th>
                                    <th scope="col" class="px-4 py-3">Quantity</th>
                                    <th scope="col" class="px-4 py-3 text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($order->products as $product)
                                <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $product->name }}
                                    </td>
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ number_format($product->price, 0, ',', '.') }}
                                    </td>
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $product->pivot->quantity }}
                                    </td>
                                    <td class="text-right px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ number_format($product->pivot->quantity * $product->price, 0, ',', '.')  }}
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
                                    <td class="px-4 py-3 text-right">{{ $total_quantity }}</td>
                                </tr>
                                {{-- <tr class="font-semibold text-gray-900 border-y-2">
                                    <th scope="row" class="px-6 py-3 text-base"></th>
                                    <td colspan="2" class="px-4 py-3">Tipe Diskon</td>
                                    <td class="px-4 py-3 text-right">{{ $order->discount_type }}</td>
                                </tr>
                                <tr class="font-semibold text-gray-900 border-y-2">
                                    <th scope="row" class="px-6 py-3 text-base"></th>
                                    <td colspan="2" class="px-4 py-3">Total Diskon</td>
                                    <td class="px-4 py-3 text-right ">{{ number_format($order->total_discount, 0, ',', '.') }}</td>
                                </tr>
                                <tr class="font-semibold text-gray-900 border-y-2">
                                    <th scope="row" class="px-6 py-3 text-base"></th>
                                    <td colspan="2" class="px-4 py-3">Harga Setelah Diskon</td>
                                    <td class="px-4 py-3 text-right ">{{ number_format($order->price_after_discount, 0, ',', '.') }}</td>
                                </tr> --}}
                                <tr class="font-semibold text-gray-900 border-y-2">
                                    <th scope="row" class="px-6 py-3 text-base"></th>
                                    <td colspan="2" class="col-start-2 px-4 py-3">Ongkir</td>
                                    <td class="px-4 py-3 text-right ">{{ number_format($order->shipping_cost, 0, ',', '.') }}</td>
                                </tr>
                                <tr class="font-semibold text-gray-900 border-y-2">
                                    <th scope="row" class="px-6 py-3 text-base"></th>
                                    <td colspan="2" class="px-4 py-3">Total Harga Dengan Ongkir</td>
                                    <td class="px-4 py-3 text-right ">{{ number_format($price_with_discount_and_ongkir, 0, ',', '.') }}</td>
                                </tr>
                            </tfoot>

                        </table>
                    </div>
                    <!-- Actions -->
                    <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0" aria-label="Table navigation">
                        <button x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'delete-order')"
                                class="flex items-center justify-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">
                            <svg class="h-3.5 w-3.5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                            Hapus Orderan
                        </button>
                        @if ($order->status == 'placed')
                        <button wire:click="updateOrder()" type="button" class="flex items-center justify-center text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">
                            <svg class="h-3.5 w-3.5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Update Telah Dikirim
                        </button>
                        @elseif ($order->status == 'shipped')
                        <button wire:click="updateOrder()" type="button" class="flex items-center justify-center text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-400 font-medium rounded-lg text-sm px-4 py-2 focus:outline-none">
                            <svg class="h-3.5 w-3.5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Batalkan Status Dikirim
                        </button>
                        @endif
                    </nav>
                </div>
            </div>
            </section>
        </div>
    </div>

    <x-modal name="delete-order" focusable>
        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
            <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                </svg>
            </div>
            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Hapus Orderan ?</h3>
                <div class="mt-2">
                <p class="text-sm text-gray-500">Apakah anda yakin? Harap berhati-hati, saat data ini terhapus, semua data yang berkaitan juga akan terhapus </p>
                </div>
            </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
            <button type="button" wire:click="deleteOrder()" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Hapus</button>
            <button type="button" x-on:click="$dispatch('close')"  class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Batal</button>
            </div>
        </div>
    </x-modal>


</div>
