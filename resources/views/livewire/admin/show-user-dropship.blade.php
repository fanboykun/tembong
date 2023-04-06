<div>

    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 ">
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="flex">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            Detail Penjualan Reseller {{ $user->name }}
                        </h2>
                    </div>
                </div>
            </header>
            <div class="border-t border-gray-200 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="flex">
                    <svg class="relative h-6 w-6 text-blue-500 p-0.5 my-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                      </svg>
                    <span class="text-base font-semibold leading-6 text-gray-900 mx-2">Informasi Penjualan</span>
                </div>
                <dl class="max-w-xl">
                    <div class="bg-gray-50  py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Total Penjualan</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $user->dropshippings->count() }}</dd>
                    </div>
                    <div class="bg-white  py-5 sm:grid sm:grid-cols-3 sm:gap-4 ">
                        <dt class="text-sm font-medium text-gray-500">Total Perolehan Saldo Dari Penjualan</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Rp {{ number_format($user->sales_fee, 0, ",", ".") }}</dd>
                    </div>
                    <div class="overflow-x-auto">
                        <div class="overflow-hidden">
                            <div class="bg-white shadow-md max-h-96 rounded my-6 relative overflow-x-auto">
                                <table class="min-w-max w-full table-auto">
                                    <thead>
                                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                            <th class="py-3 px-6 text-left">Order Id</th>
                                            <th class="py-3 px-6 text-left">Waktu Order</th>
                                            <th class="py-3 px-6 text-left">Saldo Didapat</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 text-sm font-light">
                                        @forelse ($dropshippings as $dropshipping)
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="py-3 px-6 text-left">
                                                <span>{{ $dropshipping->id }}</span>
                                            </td>
                                            <td class="py-3 px-6 text-left">
                                                <span>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $dropshipping->created_at)->format('d M Y') }}</span>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">
                                                    Rp {{ number_format($dropshipping->balance->amount, 0, ",", ".") }}
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
                                    @if($dropshippings->hasMorePages())
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
                </dl>
            </div>
        </div>
    </div>
</div>
