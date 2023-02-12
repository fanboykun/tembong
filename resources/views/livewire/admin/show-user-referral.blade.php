<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Referral Information
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ $user->name }}'s Referral Information
                        </h2>
                    </header>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="mt-6 space-y-6">
                        <div>
                            <x-input-label for="code" :value="__('Code')" />
                            <x-text-input id="code" name="code" type="text" class="mt-1 block w-full" value="{{ $user->referral_code }}" disabled />
                        </div>
                        <div>
                            <x-input-label :value="__('Count Of Referral User')" />
                            <x-text-input id="code" name="count" type="number" class="mt-1 block w-full" value="{{ $count_referral_user }}" disabled />
                        </div>
                        <div>
                            <x-input-label :value="__('Total Referral Fee')" />
                            <x-text-input id="code" name="total" type="text" class="mt-1 block w-full" value="{{ $total_referral_fee }}" disabled />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
