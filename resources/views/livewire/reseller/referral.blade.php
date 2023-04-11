<div>
    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 ">
            <div class="border-t border-gray-200 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="flex">
                    <svg class="relative h-6 w-6 text-blue-500 p-0.5 my-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm11.378-3.917c-.89-.777-2.366-.777-3.255 0a.75.75 0 01-.988-1.129c1.454-1.272 3.776-1.272 5.23 0 1.513 1.324 1.513 3.518 0 4.842a3.75 3.75 0 01-.837.552c-.676.328-1.028.774-1.028 1.152v.75a.75.75 0 01-1.5 0v-.75c0-1.279 1.06-2.107 1.875-2.502.182-.088.351-.199.503-.331.83-.727.83-1.857 0-2.584zM12 18a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                      </svg>
                    <span class="text-base font-semibold leading-6 text-gray-900 mx-2">Bagaimana Keuntungan Didapatkan Melalui Referral</span>
                </div>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Informasi ini berisi tentang bagaimana anda mendapatkan keuntungan melalui sistem referral</p>
                <dl>
                    <div class="bg-gray-50  py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Kode referral digunakan</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Rp 10.000</dd>
                    </div>
                    <div class="bg-white  py-5 sm:grid sm:grid-cols-3 sm:gap-4 ">
                        <dt class="text-sm font-medium text-gray-500">Memasukkan kode referral</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Rp 5000</dd>
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
                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                          </svg>
                        <h2 class="text-base font-semibold leading-6 text-gray-900 mx-2">
                            {{ __('Kode Referral Anda :') }}
                        </h2>

                    </div>
                    <h4 class="text-md my-2 font-medium text-gray-900">
                        {{ $own_referral_code }}
                    </h4>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __("Bagikan kode ini ke pengguna lain nya, minta mereka memasukkan kode anda, dan anda akan mendapatkan bonus tiap kali kode referral anda digunakan, bonus yang di dapatkan untuk setiap pengguna adalah Rp 10.000") }}
                    </p>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">

                    @if ($current_code != null)
                    <div class="flex">
                        <svg class="relative h-6 w-6 text-blue-500 p-0.5 my-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" clip-rule="evenodd" />
                          </svg>
                        <h2 class="text-base font-semibold leading-6 text-gray-900 mx-2">
                            {{ __('Anda telah memasukkan kode Referral') }}
                        </h2>

                    </div>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __("Ini adalah informasinya, anda hanya dapat memasukkan kode referral sekali saja, anda akan mendapat bonus ketika memasukkan kode referral milik pengguna lain, Bonus yang anda peroleh adalah Rp 5000") }}
                    </p>
                    <div class="overflow-x-auto">
                        <div class="overflow-hidden">
                            <div class="bg-white shadow-md rounded my-6 relative overflow-x-auto">
                                <table class="min-w-max w-full table-auto">
                                    <thead>
                                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                            <th class="py-3 px-6 text-left">Nama</th>
                                            <th class="py-3 px-6 text-left">Waktu Memasukkan</th>
                                            <th class="py-3 px-6 text-center">Kode Referral</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 text-sm font-light">
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="py-3 px-6 text-left whitespace-nowrap">
                                                <span class="font-medium">{{ $code_owner->name }}</span>
                                            </td>
                                            <td class="py-3 px-6 text-left">
                                                <span>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $referral_information->created_at)->format('d M Y')  }}</span>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">{{ $referral_information->code }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @else
                    <header>
                        <h2 class="text-base font-semibold leading-6 text-gray-900">
                            {{ __('Masukkan Kode Referral Milik Pengguna Lain') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Dengan memasukkan kode referral milik orang lain, anda juga akan mendapatkan bonus, anda hanya bisa memasuukan kode referral sekali saja") }}
                        </p>
                    </header>
                    <form wire:submit.prevent="storeReferralCode()" method="post" action="" class="mt-6 space-y-6">
                        <div>
                            <x-input-label for="code" :value="__('Kode Referral')" />
                            <x-text-input wire:model="inserted_referral_code" id="code" name="code" type="text" class="mt-1 block w-full" :value="old('code', $inserted_referral_code)" required autocomplete="code" />
                            <x-input-error class="mt-2" :messages="$message_code" />
                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Simpan') }}</x-primary-button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="flex">
                        <svg class="relative h-6 w-6 text-blue-500 p-0.5 my-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M360 72a40 40 0 1 0 -80 0 40 40 0 1 0 80 0zM144 208a40 40 0 1 0 0-80 40 40 0 1 0 0 80zM32 416c-17.7 0-32 14.3-32 32s14.3 32 32 32H608c17.7 0 32-14.3 32-32s-14.3-32-32-32H32zM496 208a40 40 0 1 0 0-80 40 40 0 1 0 0 80zM200 313.5l26.9 49.9c6.3 11.7 20.8 16 32.5 9.8s16-20.8 9.8-32.5l-36.3-67.5c1.7-1.7 3.2-3.6 4.3-5.8L264 217.5V272c0 17.7 14.3 32 32 32h48c17.7 0 32-14.3 32-32V217.5l26.9 49.9c1.2 2.2 2.6 4.1 4.3 5.8l-36.3 67.5c-6.3 11.7-1.9 26.2 9.8 32.5s26.2 1.9 32.5-9.8L440 313.5V352c0 17.7 14.3 32 32 32h48c17.7 0 32-14.3 32-32V313.5l26.9 49.9c6.3 11.7 20.8 16 32.5 9.8s16-20.8 9.8-32.5l-37.9-70.3c-15.3-28.5-45.1-46.3-77.5-46.3H486.2c-16.3 0-31.9 4.5-45.4 12.6l-33.6-62.3c-15.3-28.5-45.1-46.3-77.5-46.3H310.2c-32.4 0-62.1 17.8-77.5 46.3l-33.6 62.3c-13.5-8.1-29.1-12.6-45.4-12.6H134.2c-32.4 0-62.1 17.8-77.5 46.3L18.9 340.6c-6.3 11.7-1.9 26.2 9.8 32.5s26.2 1.9 32.5-9.8L88 313.5V352c0 17.7 14.3 32 32 32h48c17.7 0 32-14.3 32-32V313.5z"/></svg>
                        <h2 class="text-base font-semibold leading-6 text-gray-900 mx-2">
                            {{ __('List Pengguna Yang Menggunakan Kode Referral Anda') }}
                        </h2>
                    </div>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                       Total Bonus : {{ $total_referral_fee }}
                    </p>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                       Total Pengguna : {{ $total_referral_user }}
                    </p>

                    <div class="overflow-x-auto">
                        <div class="overflow-hidden">
                            <div class="bg-white shadow-md rounded my-6">
                                <div class="relative overflow-x-auto max-h-64 border shadow-md sm:rounded-lg">
                                    <table class="w-full text-sm text-left text-gray-500">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Nama
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Waktu Menggunakan Referral
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Bonus
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($referral_users as $referral)
                                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $referral->user->name }}
                                                </th>
                                                <td class="px-6 py-4">
                                                    {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $referral->created_at)->format('d M Y') }}
                                                </td>
                                                <td class="px-6 py-4">
                                                   Rp {{ number_format($referral->balance->first()->amount,  0, ",", ".") }}
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
                                        @if ($referral_users->hasMorePages())
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
</div>
