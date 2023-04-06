<div>


    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <header class="bg-white dark:bg-gray-800 shadow rounded-lg">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="flex">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            Informasi Akun {{ $user->name }}
                        </h2>
                    </div>
                </div>
            </header>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="space-y-6">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Status Akun') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Status Akun menunjukan apakah user ini sudah tervalidasi atau belum. If the user have already payed for using the apps, update the users status') }}
                            </p>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Jika ingin memvalidasi status akun, pastikan akun tersebut sudah membayar untuk menggunakan seluruh fitur Reseller') }}
                            </p>
                        </header>
                        <div>
                            <x-input-label for="status" :value="__('Status')" />
                            <x-text-input value="{{ $user->validated_at ? 'Sudah Tervalidasi' : 'Belum Tervalidasi' }}" disabled type="text" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="validated_at" :value="__('Waktu Tervalidasi')" />
                            <x-text-input value="{{ $user->validated_at ? Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->validated_at)->format('d M Y') : '' }}" disabled type="text" class="mt-1 block w-full" />
                        </div>
                        @if ($user->validated_at != null)
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Akun ini Sudah Tervalidasi, jika ingin merubah status validasi, klik tombol Batalkan Validasi, Pastikan lagi jika ingin merubah status validasi') }}
                        </p>
                            <x-danger-button type="submit" wire:click.prevent="unvalidateAccount" >{{ __('Batalkan Validasi Akun') }}</x-danger-button>
                        @else
                            <x-primary-button type="submit" wire:click.prevent="validateAccount" >{{ __('Validasi Akun') }}</x-primary-button>
                        @endif
                    </div>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Informasi Reseller') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Informasi dari akun reseller") }}
                        </p>
                    </header>
                    <div class="mt-6 space-y-6">
                        <div>
                            <x-input-label for="name" :value="__('Nama')" />
                            <x-text-input value="{{ $user->name }}" disabled type="text" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input value="{{ $user->email }}" disabled type="text" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="address" :value="__('Alamat')" />
                            <x-text-input value="{{ $user->address }}" disabled type="text" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="phone" :value="__('Nomor Telpon')" />
                            <x-text-input value="{{ $user->phone }}" disabled type="text" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="Status" :value="__('Mendaftar Pada')" />
                            <x-text-input value="{{ $user->created_at }}" disabled type="text" class="mt-1 block w-full" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
