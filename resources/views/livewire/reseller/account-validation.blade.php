<div>
    @if (auth()->user()->validated_at != null)
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <div class="max-w-xl">
            {{-- @include('profile.partials.update-profile-information-form') --}}
            <div class="flex">
                <svg class="relative h-6 w-6 text-blue-500 p-0.5 my-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M11.484 2.17a.75.75 0 011.032 0 11.209 11.209 0 007.877 3.08.75.75 0 01.722.515 12.74 12.74 0 01.635 3.985c0 5.942-4.064 10.933-9.563 12.348a.749.749 0 01-.374 0C6.314 20.683 2.25 15.692 2.25 9.75c0-1.39.223-2.73.635-3.985a.75.75 0 01.722-.516l.143.001c2.996 0 5.718-1.17 7.734-3.08zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zM12 15a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75H12z" clip-rule="evenodd" />
                  </svg>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Validasi Akun') }}
                </h2>
            </div>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __("Akun anda telah tervalidasi, sekarang anda dapat menggunakan seluruh fitur dari aplikasi, mulailah mendapatkan keuntungan, bagikan link katalog anda dan kode referral anda.") }}
            </p>
        </div>
    </div>
    @else
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <div class="max-w-xl">
            {{-- @include('profile.partials.update-profile-information-form') --}}
            <div class="flex">
                <svg class="relative h-6 w-6 text-red-600 p-0.5 my-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                </svg>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Validasi Akun') }}
                </h2>

            </div>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Ini menunjukan apakah akun anda telah tervalidasi atau belum, jika akun anda belum tervalidasi mohon untuk segera menghubungi admin dan lakukan pembayaran. Dengan melakukan pembayaran anda dapat menggunakan seluruh fitur dari aplikasi dan dapat memulai menghasilkan keuntungan
                <a href="{{ route('dashboard-reseller') }}" class="text-indigo-600">...selengkapnya -></a>
            </p>
            <x-primary-button wire:click="sendValidationInfo()" class="mt-2">{{ __('Validasi Sekarang') }}</x-primary-button>
        </div>
    </div>
    @endif
</div>
