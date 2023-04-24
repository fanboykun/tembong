<x-guest-layout>
    <div class="py-24">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8 space-y-6 ">
            <div class="border-t border-gray-200 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Terimakasih sudah mendaftar, sebelum memulai, anda harus verifikasi email anda dengan klik tombol atau link dari email yang telah kami kirim kepada anda. Jika anda belum menerima email, kami dengan senang mengirim lagi email verifikasi kepada anda.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ __('Kami telah mengirim email verifikasi yang baru ke email yang anda berikan saat proses registrasi.') }}
                    </div>
                @endif

                <div class="mt-4 flex items-center justify-between">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div>
                            <x-primary-button>
                                {{ __('Kirim ulang email verifikasi') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
