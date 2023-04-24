<div>
    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 ">
            <div class="border-t border-gray-200 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="flex">
                    <svg class="relative h-6 w-6 text-blue-500 p-0.5 my-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                      </svg>
                    <span class="text-base font-semibold leading-6 text-gray-900 mx-2">Informasi Saldo Anda</span>
                </div>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Rangkuman dari saldo anda, saldo di dapat dari penjualan, dan referral</p>
                <dl>
                    <div class="bg-gray-50  py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Total Perolehan Saldo Dari Penjualan</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Rp {{ number_format($sales_balance, 0, ",", ".") }}</dd>
                    </div>
                    <div class="bg-white  py-5 sm:grid sm:grid-cols-3 sm:gap-4 ">
                        <dt class="text-sm font-medium text-gray-500">Total Perolehan Saldo Dari Referral</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Rp {{ number_format($referral_balance, 0, ",", ".") }}</dd>
                    </div>
                    <div class="bg-gray-50  py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Akumulasi Perolehan Saldo Yang Anda Dapatkan</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Rp {{ number_format($total_balance, 0, ",", ".") }}</dd>
                    </div>
                    <div class="bg-white  py-5 sm:grid sm:grid-cols-3 sm:gap-4 ">
                        <dt class="text-sm font-medium text-gray-500">Saldo Bersih Anda (Saldo yang dapat ditarik)</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Rp {{ number_format($withdrawabe_balance, 0, ",", ".") }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @livewire('reseller.withdraw-request')

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="flex">
                        <svg class="relative h-6 w-6 p-0.5 my-auto text-sm text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M75 75L41 41C25.9 25.9 0 36.6 0 57.9V168c0 13.3 10.7 24 24 24H134.1c21.4 0 32.1-25.9 17-41l-30.8-30.8C155 85.5 203 64 256 64c106 0 192 86 192 192s-86 192-192 192c-40.8 0-78.6-12.7-109.7-34.4c-14.5-10.1-34.4-6.6-44.6 7.9s-6.6 34.4 7.9 44.6C151.2 495 201.7 512 256 512c141.4 0 256-114.6 256-256S397.4 0 256 0C185.3 0 121.3 28.7 75 75zm181 53c-13.3 0-24 10.7-24 24V256c0 6.4 2.5 12.5 7 17l72 72c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-65-65V152c0-13.3-10.7-24-24-24z"/></svg>
                        <span class="text-base font-semibold leading-6 text-gray-900 mx-2">Riwayat Penarikan Anda</span>
                    </div>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Anda dapat melihat riwayat penarikan yang anda lakukan, jika ada permintaan penarikan yang belum dibayarkan, harap segera hubungi admin</p>
                    <div class="overflow-x-auto">
                        <div class="overflow-hidden">
                            <div class="relative overflow-x-auto bg-white shadow-md rounded my-6">
                                <table class="min-w-max w-full table-auto">
                                    <thead>
                                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                            <th class="py-3 px-6 text-left">Jumlah Penarikan</th>
                                            <th class="py-3 px-6 text-left">Dibuat Pada</th>
                                            <th class="py-3 px-6 text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 text-sm font-light">
                                        @forelse ($payments as $payment)
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <span class="font-medium">Rp {{ number_format($payment->amount, 0, ",", ".") }}</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-left">
                                                <span>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $payment->created_at)->format('d M Y') }}</span>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                @if ($payment->is_paid  == 'paid')
                                                <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full border-green-400">
                                                    Telah Dibayar
                                                </span>
                                                @elseif ($payment->is_paid == 'pending')
                                                <span class="bg-yellow-100 text-yellow-400 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full border-yellow-400">
                                                    Belum Dibayar
                                                </span>
                                                @else
                                                <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full border-red-400">
                                                    Ditolak atau terjadi kesalahan
                                                </span>
                                                @endif
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
                                    @if ($payments->hasMorePages())
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
