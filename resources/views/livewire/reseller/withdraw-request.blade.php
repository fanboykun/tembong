<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Your Balance Information') }}
        </h2>
    </x-slot>
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
        <div class="max-w-xl">
            <header>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Withdrawl Request') }}
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    minimum withdrawl request is Rp. 100.000
                </p>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Your Withdrawlable Balance is Rp. {{ $balance }}
                </p>
            </header>
            <div class="mt-4">
                <div>
                    <x-input-label for="Amount" :value="__('Withdrawl Amount')" />
                    <x-text-input wire:model="amount" name="amount" type="number" class="mt-1 block w-full"/>
                </div>
            </div>
            <div class="mt-4">
                <div>
                    <x-input-label for="Bank_Info" :value="__('Bank Info')" />
                    <select wire:model="bank_info" name="bank_info" id="bank_info">
                        <option value="">Choose One</option>
                        @foreach ($banks as $key => $bank )
                            <option value="{{ $bank }}">{{ $bank }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @if (is_null($bank_info) == false)
            @if ($bank_info == 'DANA')
            <div class="mt-4">
                <div>
                    <x-input-label for="account_name" :value="__('Dana Account Name')" />
                    <x-text-input wire:model="account_name" name="account_name" type="text" class="mt-1 block w-full"/>
                </div>
            </div>
            <div class="mt-4">
                <div>
                    <x-input-label for="account_number" :value="__('Dana Account Phone Number')" />
                    <x-text-input wire:model="account_number" name="account_number" type="text" class="mt-1 block w-full"/>
                </div>
            </div>
            @elseif($bank_info !== 'DANA')
            <div class="mt-4">
                <div>
                    <x-input-label for="account_name" :value="__('Account Name')" />
                    <x-text-input wire:model="account_name" name="account_name" type="text" class="mt-1 block w-full"/>
                </div>
            </div>
            <div class="mt-4">
                <div>
                    <x-input-label for="account_number" :value="__('Account Number')" />
                    <x-text-input wire:model="account_number" name="account_number" type="text" class="mt-1 block w-full"/>
                </div>
            </div>
            @endif
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Make sure the credential you inserted is correct, any wrong credential will cause your withdrawl request to be rejected and no refund
            </p>
            <div class="flex items-center gap-4 mt-2">
                <x-primary-button wire:click="sendWithdrawRequest()">{{ __('Send Withdrawl Request') }}</x-primary-button>
            </div>
            @endif
        </div>
    </div>
</div>

