<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="max-w-xl">
                            {{-- @include('profile.partials.update-profile-information-form') --}}
                            <div class="flex">
                                <svg class="relative h-6 w-6 text-red-700 p-0.5 my-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                                </svg>
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Akun Anda Belum Tervalidasi') }}
                                </h2>

                            </div>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __("Segera hubungi admin kami dengan menekan tombol dibawa untuk melakukan pembayaran dan mendapatkan validasi.") }}
                            </p>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __("Anda dapat mulai menggunakan seluruh akses penuh sebagai reseller dan mulai hasilkan keuntungan setelah akun anda tervalidasi.") }}
                            </p>
                            <div class="flex pt-4">
                                <svg class="relative h-6 w-6 text-green-600 p-0.5 my-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                                </svg>
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    Benefit
                                </h2>
                            </div>
                            <dl>
                                <div class="bg-gray-50  py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-indigo-600">Mendapat Link Dari Katalog Anda</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Anda tidak perlu repot-repot lagi untuk mengatur website untuk tampilan produk, semua telah kami siapkan, anda dapat fokus untuk membagikan link tersebut </dd>
                                </div>
                                <div class="bg-gray-50  py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-indigo-600">Penjualan Dengan Sistem Dropshipping</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Tidak perlu repot-repot mengurus produk, kami akan langsung kirim barangnya ke konsumen tanpa melalui anda, hasilkan keuntungan dari penjualan tanpa memiliki barangnya.</dd>
                                </div>
                                <div class="bg-gray-50  py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-indigo-600">Kode Referral</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Anda dapat mulai mengajak siapapun untuk bergabung, minta mereka untuk menggunakan kode referral anda, dan semua orang akan mendapatkan bonus berupa saldo.</dd>
                                </div>
                                <div class="bg-gray-50  py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-indigo-600">Akses Ke Dahboard Powerfull</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Anda mendapatkan akses penuh ke dashboard, anda dapat terus memantau penjualan anda melalui dashboard, seperti berapa pengunjung katalog anda, berapa penjualan yang menggunakan katalog anda, dll.</dd>
                                </div>
                                <div class="bg-gray-50  py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-indigo-600">Penarikan Saldo Yang Mudah</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Tentu ketika anda mengumpulkan saldo cukup banyak, anda mungkin akan menariknya, dapatkan saldo minimal Rp 100.000 untuk bisa melakukan penarikan. tidak perlu ribet, anda hanya perlu mengirim request penarikan melalui dashboard dan admin akan mengirimnya langsung ke rekening anda.</dd>
                                </div>
                                <div class="bg-gray-50  py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                    <dt class="text-sm font-medium text-indigo-600">Bantuan Yang Sigap</dt>
                                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Jika anda mengalami masalah,kami akan sigap membatu, memberi saran dan solusi kapanpun anda mau.</dd>
                                </div>
                            </dl>
                            <x-primary-button wire:click="sendValidationInfo()" class="mt-2">{{ __('Validasi Sekarang') }}</x-primary-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
