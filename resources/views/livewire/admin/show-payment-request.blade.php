<div>
    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Informasi Dropshipper ') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("berikut adalah informasi permintaan penarikan oleh dropshipper") }}
                        </p>
                    </header>
                    <div class="mt-6 space-y-6">
                        <div>
                            <x-input-label for="id" :value="__('Dropshipper ID')" />
                            <x-text-input disabled type="text" value="{{ $payment->user->id }}" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="name" :value="__('Nama Dropshipper')" />
                            <x-text-input  disabled type="text" value="{{ $payment->user->name }}" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="phone" :value="__('Nomor Telpon Dropshipper')" />
                            <x-text-input  disabled type="text" value="{{ $payment->user->phone }}" class="mt-1 block w-full" />
                        </div>
                    </div>
                </div>
            </div>
            @if($payment->amount < $payment->user->withdrawable)
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Informasi Permintaan Penarikan') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Berikut adalah informasi tentang jumlah permintaan penarikan dan bank tujuan pengiriman") }}
                        </p>
                    </header>
                    <div class="mt-6 space-y-6">
                        <div>
                            <x-input-label for="payment_id" :value="__('Payment ID')" />
                            <x-text-input disabled type="text" value="{{ $payment->id }}" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="requested_at" :value="__('Diminta Pada')" />
                            <x-text-input disabled type="text" value="{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $payment->created_at)->format('d M Y') }}" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="amount" :value="__('Jumlah Permintaan')" />
                            <x-text-input disabled type="text" value="{{ number_format($payment->amount, 0, ',', '.') }}" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="bank" :value="__('Nama Bank')" />
                            <x-text-input  disabled type="text" value="{{ $payment->bank_info }}" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="account_name" :value="__('Nama Akun')" />
                            <x-text-input  disabled type="text" value="{{ $payment->account_name }}" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="account_number" :value="__('Nomor Akun')" />
                            <x-text-input  disabled type="text" value="{{ $payment->account_number }}" class="mt-1 block w-full" />
                        </div>
                        <div>
                            <x-input-label for="status" :value="__('Status')" />
                            <x-text-input  disabled type="text" value="{{ $payment->is_paid == 'paid' ? 'Paid' : 'Pending' }}" class="mt-1 block w-full" />
                        </div>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Jika ingin mengupdate status pembayaran, pastikan admin telah mentransfer uang yang diminta dengan jumlah dan tujuan yang benar. Minta Dropshipper memastikan apakah uang sudah diterima atau belum.
                        </p>
                        <div class="flex items-center gap-4 mt-2">
                            @if($payment->is_paid == 'paid')
                            <x-danger-button wire:click="updateStatus()">{{ __('Batalkan Status Telah Dibayar') }}</x-danger-button>
                            @else
                            <x-primary-button wire:click="updateStatus()">{{ __('Perbarui Status Ke Telah Dibayar') }}</x-primary-button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-red-700 dark:text-gray-100">
                            {{ __('Terdapat Kejanggalan') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Ini mengindikasikan bahwa permintaan jumlah penarikan lebih besar dari pada saldo") }}
                        </p>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                           Jumlah Permintaan Penarikan : {{ number_format($payment->amount, 0, ',', '.') }}
                           Saldo Dropshipper : {{ number_format($payment->user->withdrawable, 0, ',', '.') }}
                        </p>
                    </header>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
