<div>
    <div class="border-t border-gray-200 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <div class="flex">
            <svg class="relative h-6 w-6 p-0.5 my-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M312 24V34.5c6.4 1.2 12.6 2.7 18.2 4.2c12.8 3.4 20.4 16.6 17 29.4s-16.6 20.4-29.4 17c-10.9-2.9-21.1-4.9-30.2-5c-7.3-.1-14.7 1.7-19.4 4.4c-2.1 1.3-3.1 2.4-3.5 3c-.3 .5-.7 1.2-.7 2.8c0 .3 0 .5 0 .6c.2 .2 .9 1.2 3.3 2.6c5.8 3.5 14.4 6.2 27.4 10.1l.9 .3 0 0c11.1 3.3 25.9 7.8 37.9 15.3c13.7 8.6 26.1 22.9 26.4 44.9c.3 22.5-11.4 38.9-26.7 48.5c-6.7 4.1-13.9 7-21.3 8.8V232c0 13.3-10.7 24-24 24s-24-10.7-24-24V220.6c-9.5-2.3-18.2-5.3-25.6-7.8c-2.1-.7-4.1-1.4-6-2c-12.6-4.2-19.4-17.8-15.2-30.4s17.8-19.4 30.4-15.2c2.6 .9 5 1.7 7.3 2.5c13.6 4.6 23.4 7.9 33.9 8.3c8 .3 15.1-1.6 19.2-4.1c1.9-1.2 2.8-2.2 3.2-2.9c.4-.6 .9-1.8 .8-4.1l0-.2c0-1 0-2.1-4-4.6c-5.7-3.6-14.3-6.4-27.1-10.3l-1.9-.6c-10.8-3.2-25-7.5-36.4-14.4c-13.5-8.1-26.5-22-26.6-44.1c-.1-22.9 12.9-38.6 27.7-47.4c6.4-3.8 13.3-6.4 20.2-8.2V24c0-13.3 10.7-24 24-24s24 10.7 24 24zM568.2 336.3c13.1 17.8 9.3 42.8-8.5 55.9L433.1 485.5c-23.4 17.2-51.6 26.5-80.7 26.5H192 32c-17.7 0-32-14.3-32-32V416c0-17.7 14.3-32 32-32H68.8l44.9-36c22.7-18.2 50.9-28 80-28H272h16 64c17.7 0 32 14.3 32 32s-14.3 32-32 32H288 272c-8.8 0-16 7.2-16 16s7.2 16 16 16H392.6l119.7-88.2c17.8-13.1 42.8-9.3 55.9 8.5zM193.6 384l0 0-.9 0c.3 0 .6 0 .9 0z"/></svg>
            <span class="text-base font-semibold leading-6 text-gray-900 mx-2">
                Permintaan Penarikan Saldo
            </span>
        </div>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">Anda dapat menarik saldo yang telah anda peroleh, dengan ketentuan sebagai berikut : </p>
        <dl>
            <div class="bg-gray-50  py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">Minimal Penarikan</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Rp 100.000</dd>
            </div>
            <div class="bg-gray-50  py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">Saldo Anda Yang Dapat Ditarik</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Rp {{ number_format($balance, 0, ",", ".") }}</dd>
            </div>
            <div class="bg-gray-50  py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500">Akun Bank Tujuan Penarikan Anda</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">MANDIRI, BCA, BRI, DUMUT, DANAMON, DANA</dd>
            </div>
            <div class="bg-gray-50  py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                <dt class="text-sm font-medium text-gray-500 col-span-2">
                    Catatan : pastikan mengisi form dengan benar, isi dengan teliti, jangan sampai ada kesalahan. Jika terdapat kesalahan nomor rekening, kami tidak bertanggung jawab.
                    Setelah mengisi form, admin akan segera memproses permintaan anda. Jika tidak diproses dalam waktu paling lambar 24 jam, segera hubungi admin.
                    Permintaan yang telah dikirim tidak dapat dibatalkan.
                </dt>
            </div>
        </dl>
        <div class="max-w-xl block">
            <div class="mt-4">
                <div>
                    <x-input-label for="Amount" :value="__('Jumlah Penarikan')" />
                    <x-text-input wire:model="amount" name="amount" type="number" class="mt-1 block w-full"/>
                    <x-input-error class="mt-2" :messages="$errors->get('amount')" />
                </div>
            </div>
            <div class="mt-4">
                <div>
                    <x-input-label for="Bank_Info" :value="__('Bank Tujuan')" />
                    <select wire:model="bank_info" name="bank_info" id="bank_info">
                        <option value="">Pilih Satu</option>
                        @foreach ($banks as $key => $bank )
                            <option value="{{ $bank }}">{{ $bank }}</option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('bank_info')" />
                </div>
            </div>
            @if (is_null($bank_info) == false)
            @if ($bank_info == 'DANA')
            <div class="mt-4">
                <div>
                    <x-input-label for="account_name" :value="__('Nama Akun Dana Anda')" />
                    <x-text-input wire:model="account_name" name="account_name" type="text" class="mt-1 block w-full"/>
                <x-input-error class="mt-2" :messages="$errors->get('account_name')" />
                </div>
            </div>
            <div class="mt-4">
                <div>
                    <x-input-label for="account_number" :value="__('Nomor Akun Dana Anda Dana')" />
                    <x-text-input wire:model="account_number" name="account_number" type="text" class="mt-1 block w-full"/>
                    <x-input-error class="mt-2" :messages="$errors->get('account_number')" />
                </div>
            </div>
            @elseif($bank_info !== 'DANA')
            <div class="mt-4">
                <div>
                    <x-input-label for="account_name" :value="__('Nama Akun Tujuan')" />
                    <x-text-input wire:model="account_name" name="account_name" type="text" class="mt-1 block w-full"/>
                    <x-input-error class="mt-2" :messages="$errors->get('account_name')" />
                </div>
            </div>
            <div class="mt-4">
                <div>
                    <x-input-label for="account_number" :value="__('Nomor Akun Tujuan')" />
                    <x-text-input wire:model="account_number" name="account_number" type="text" class="mt-1 block w-full"/>
                    <x-input-error class="mt-2" :messages="$errors->get('account_number')" />
                </div>
            </div>
            @endif
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Pastikan lagi kredensial yang anda masukkan sudah benar, kesalan apapun dalam penarikan saldo tidak akan kami tanggung jawab, tidak ada refund yang kami berikan
            </p>
            <div class="flex items-center gap-4 mt-2">
                <x-primary-button wire:click="sendWithdrawRequest()">{{ __('Kirim permintaan penarikan') }}</x-primary-button>
            </div>
            @endif
        </div>
    </div>
</div>

