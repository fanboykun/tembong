<div>
    <form wire:submit.prevent="prefilMessage()">
        {{-- @csrf --}}
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 items-center bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="buyer_name" class="block mt-1 w-full" type="text" name="name" required autofocus />
        </div>

        <div class="mt-4">
            <x-input-label for="buyer_phone" :value="__('Whatsapp Number')" />
            <x-text-input wire:model="buyer_phone" class="block mt-1 w-full" type="number" name="buyer_phone" required />
        </div>

        <div>
            <x-input-label for="buyer_province" :value="__('Province')" />
            <select wire:model="buyer_province" name="buyer_province" id="buyer_province">
                @foreach ($provincies as $province)
                <option value="{{ $province->id ?? '' }}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    {{ $province->name ?? '' }}
                </option>
                @endforeach
            </select>
        </div>
        <div>
            <x-input-label for="buyer_city" :value="__('City')" />
            <select wire:model="buyer_city" name="buyer_city" id="buyer_city">
                @if ($cities != null)
                @forelse ($cities as $city)
                <option value="{{ $city->id }}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    {{ $city->name }}
                </option>
                @empty
                <option value=""></option>
                @endforelse
                @endif@forelse($cities as $city)
            </select>
        </div>
        <div>
            <x-input-label for="buyer_district" :value="__('District')" />
            <select wire:model="buyer_district" name="buyer_district" id="buyer_district">
                @if ($districts != null)
                @forelse ($districts as $district)
                <option value="{{ $district->id }}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    {{ $district->name }}
                </option>
                @empty
                @endforelse
                @endif
            </select>
        </div>
        <div>
            <x-input-label for="buyer_village" :value="__('Village')" />
            <select wire:model="buyer_village" name="buyer_village" id="buyer_village">
                @if ($villages != null)
                @forelse ($villages as $village)
                <option value="{{ $village->id }}" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    {{ $village->name }}
                </option>
                @empty
                @endforelse
                @endif
            </select>
        </div>

        <div class="mt-4">
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input wire:model="address_description" class="block mt-1 w-full" type="text" name="buyer_address" required />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Send') }}
            </x-primary-button>
        </div>
    </div>
    </form>
</div>
