<div>
    <form wire:submit.prevent="prefilMessage()">
        {{-- @csrf --}}
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 items-center bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="buyer_name" class="block mt-1 w-full" type="text" name="name" required autofocus />
        </div>

        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input wire:model="buyer_address" class="block mt-1 w-full" type="text" name="buyer_address" required />
        </div>

        <div class="mt-4">
            <x-input-label for="buyer_phone" :value="__('Whatsapp Number')" />
            <x-text-input wire:model="buyer_phone" class="block mt-1 w-full" type="number" name="buyer_phone" required />
        </div>


        <div class="flex items-center justify-end mt-4">
            {{-- <a href="https://wa.me/+6281992543413?text={{ $prefilled }}" class="ml-4" type="link" target="blank">
                {{ __('Send') }}
            </a> --}}
            <x-primary-button class="ml-4">
                {{ __('Send') }}
            </x-primary-button>
        </div>
    </div>
    </form>
</div>
