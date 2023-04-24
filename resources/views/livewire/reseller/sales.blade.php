<div>
    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 ">
            <div class="border-t border-gray-200 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="flex">
                    <svg class="relative h-6 w-6 text-blue-500 p-0.5 my-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm11.378-3.917c-.89-.777-2.366-.777-3.255 0a.75.75 0 01-.988-1.129c1.454-1.272 3.776-1.272 5.23 0 1.513 1.324 1.513 3.518 0 4.842a3.75 3.75 0 01-.837.552c-.676.328-1.028.774-1.028 1.152v.75a.75.75 0 01-1.5 0v-.75c0-1.279 1.06-2.107 1.875-2.502.182-.088.351-.199.503-.331.83-.727.83-1.857 0-2.584zM12 18a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                    </svg>
                    <span class="text-base font-semibold leading-6 text-gray-900 mx-2">Bagaimana Keuntungan Didapatkan Melalui Penjualan</span>
                </div>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Informasi ini berisi tentang bagaimana anda mendapatkan keuntungan melalui penjualan per barang nya</p>
                <dl>
                    <div class="bg-white  py-5 sm:grid sm:grid-cols-3 sm:gap-4 ">
                        <dt class="text-sm font-medium text-gray-500">Penjualan Per Produk</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Rp 20.000</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 ">
            <div class="border-t border-gray-200 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="flex">
                    <svg class="relative h-6 w-6 text-blue-500 p-0.5 my-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                      </svg>
                    <span class="text-base font-semibold leading-6 text-gray-900 mx-2">Informasi Penjualan Anda</span>
                </div>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Informasi ini berisi tentang pembelian barang oleh konsumen yang menggunakan link katalog anda</p>
                <dl>
                    <div class="bg-gray-50  py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Total Penjualan</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $total_sales_count }}</dd>
                    </div>
                    <div class="bg-white  py-5 sm:grid sm:grid-cols-3 sm:gap-4 ">
                        <dt class="text-sm font-medium text-gray-500">Total Perolehan Saldo Dari Penjualan</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Rp {{ number_format($total_sales_fee, 0, ",", ".") }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="flex">
                        <svg class="relative h-6 w-6 text-blue-500 p-0.5 my-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 000-1.5h-3.75V6z" clip-rule="evenodd" />
                          </svg>
                        <h2 class="text-base font-semibold leading-6 text-gray-900 mx-2">
                            {{ __('Riwayat Penjualan') }}
                        </h2>

                    </div>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __("Riwayat penjualan di dapat dari penjualan yang menggunakan link katalog anda") }}
                    </p>
                    <div class="overflow-x-auto">
                        <div class="overflow-hidden">
                            <div class="bg-white shadow-md rounded my-6 relative overflow-x-auto">
                                <table class="min-w-max w-full table-auto">
                                    <thead>
                                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                            <th class="py-3 px-6 text-left">Waktu Order</th>
                                            <th class="py-3 px-6 text-left">Saldo Didapat</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 text-sm font-light">
                                        @forelse ($sales as $sale)
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="py-3 px-6 text-left">
                                                <span>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $sale->created_at)->format('d M Y') }}</span>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">
                                                    Rp {{ number_format($sale->balance->amount, 0, ",", ".") }}
                                                </span>
                                            </td>
                                        </tr>
                                        @empty
                                        <td colspan="3" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="flex justify-center">
                                                <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">
                                                    Belum Ada Data
                                                </span>
                                            </div>
                                        </td>
                                        @endforelse
                                    </tbody>
                                    @if($sales->hasMorePages())
                                    <tfoot class="border-t-2">
                                        <tr>
                                            <td scope="row" class=" py-4 font-medium text-gray-900 whitespace-nowrap">
                                                <div class="flex justify-start px-2">
                                                    <button type="button" wire:click="loadMore()">
                                                        <span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full border border-blue-400">
                                                            Muat Lebih
                                                        </span>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
