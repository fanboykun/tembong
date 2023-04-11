<div>
    <section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
        <div class="px-2 mx-auto max-w-screen-2xl lg:px-2">
            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <div class="flex">
                            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                {{ __('List dari Semua Permintaan Penarikan') }}
                            </h2>
                        </div>
                    </div>
                </header>
                <!-- Header -->
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="flex items-center space-x-3 w-full md:w-auto">
                        <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                            <svg class="-ml-1 mr-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                            <span class="md:block">Cari Berdasarkan : {{ Str::title($search_filter) }}</span>
                        </button>
                        <div id="actionsDropdown" class="hidden z-10 w-44 h-44 overflow-y-auto bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="actionsDropdownButton">
                                <li>
                                    <button type="button" wire:click="$set('search_filter', '')" class="inline-flex w-full py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Default (Res ID)
                                    </button>
                                </li>
                                <li>
                                    <button type="button" wire:click="$set('search_filter', 'reseller_id')" class="inline-flex w-full py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Reseller ID
                                    </button>
                                </li>
                                <li>
                                    <button type="button" wire:click="$set('search_filter', 'payment_id')" class="inline-flex w-full py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Payment ID
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input wire:model="search" type="search" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                            </div>
                        </form>

                    </div>
                    <div class="flex items-center space-x-3 w-full md:w-auto">
                        <button id="filterDropdownButton" data-dropdown-toggle="filterDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                            @if ($status_filter == '')
                                <span class="text-gray-500">Status</span>
                            @elseif($status_filter == 'pending')
                                <span class="text-yellow-500">Belum Dibayar</span>
                            @elseif($status_filter == 'paid')
                                <span class="text-purple-500">Sudah Dibayar</span>
                            @endif
                            <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                            </svg>
                        </button>
                        <div id="filterDropdown" class="z-10 hidden w-48 bg-white rounded-lg shadow dark:bg-gray-700">
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="actionsDropdownButton">
                                <li>
                                    <button type="button" wire:click="$set('status_filter', '')" class="inline-flex w-full py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Semua Status
                                    </button>
                                </li>
                                <li>
                                    <button type="button" wire:click="$set('status_filter', 'pending')" class="inline-flex w-full py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Belum Dibayar
                                    </button>
                                </li>
                                <li>
                                    <button type="button" wire:click="$set('status_filter', 'paid')" class="inline-flex w-full py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        Sudah Dibayar
                                    </button>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Table -->
                <div class="overflow-x-auto max-h-96">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Payment Id</th>
                                <th scope="col" class="px-4 py-3">Reseller Id</th>
                                <th scope="col" class="px-4 py-3">Nama Res</th>
                                <th scope="col" class="px-4 py-3 text-right">Jumlah Permintaan</th>
                                <th scope="col" class="px-4 py-3">Diminta Pada</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($payments as $payment)
                            @if($payment->amount < $payment->user->withdrawable)
                            <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <th scope="row" class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $payment->id }}
                                </th>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $payment->user->id }}
                                </td>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $payment->user->name }}
                                </td>
                                <td class="px-4 py-2 font-medium text-right text-gray-900 whitespace-nowrap dark:text-white">
                                    Rp. {{ number_format($payment->amount, 0, ',', '.') }}
                                </td>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $payment->created_at)->format('d M Y') }}
                                </td>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    @if ($payment->is_paid == 'paid')
                                    <span class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                        Sudah Dibayar
                                    </span>
                                    @else
                                    <span class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                        Belum Dibayar
                                    </span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="relative top-0 left-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-700">
                                        <a href="{{ route('payments.show', $payment) }}">
                                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0" aria-label="Table navigation">
                    <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        Menampilkan
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $payments != [] ? $payments->count() : '0' }}</span>
                        dari
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $payments != [] ? $payments->total() : '0' }}</span>
                    </span>
                    <button type="button" wire:click="loadMore()" class="text-sm font-normal text-indigo-600 ">
                        Muat Lebih ...
                    </button>
                </nav>
            </div>
        </div>
    </section>

</div>
