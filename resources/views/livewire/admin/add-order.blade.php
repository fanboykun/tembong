<div>
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div> --}}
                <div class="flex">
                    <x-text-input wire:model="search_user" type="search" class="ml-2 py-0" placeholder="seacrh reseller here"></x-text-input>
                    <select wire:model="filter_user" name="filter" id="filter">
                        <option value="">Pilih Filter</option>
                        <option value="id">Reseller ID</option>
                        <option value="name">Reseller Name</option>
                        <option value="email">Reseller Email</option>
                        <option value="phone">Reseller Phone</option>
                    </select>
                </div>
                @if ($users != null && $search_user != null)
                <div class="overflow-x-auto">
                    <div class="overflow-hidden">
                        <div class="bg-white shadow-md rounded my-6">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">Reseller ID</th>
                                        <th class="py-3 px-6 text-left">Name</th>
                                        <th class="py-3 px-6 text-left">Email</th>
                                        <th class="py-3 px-6 text-left">Phone Number</th>
                                        <th class="py-3 px-6 text-left"></th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                    @forelse ($users as $user)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $user->id }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $user->name }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $user->email }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $user->phone }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <button type="button" wire:click="selectReseller({{ $user->id }})" class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">Pilih</button>
                                        </td>
                                        @empty
                                            <td>
                                                No Data!
                                            </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex">
                    <x-primary-button class="m-auto" wire:click="$set('content_state', 'list_all_product')">All Products</x-primary-button>
                    <x-primary-button class="m-auto" wire:click="$set('content_state', 'in_cart_product')">In Cart Product</x-primary-button>
                    <x-primary-button class="m-auto" wire:click="$set('content_state', 'buyer_info')">Buyer Info</x-primary-button>
                </div>
            </div>
        </div>
    </div>
    @if ($content_state == 'list_all_product')
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex">
                    <x-text-input wire:model="search_product" type="search" class="ml-2 py-0" placeholder="seacrh product"></x-text-input>
                    <select wire:model="filter_product_category" name="filter_product_category" id="filter_product_category">
                        <option value="">All Category</option>
                        @forelse ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                            <option value="">No Data</option>
                        @endforelse
                    </select>
                    <select wire:model="filter_product_type" name="filter_product_type" id="filter_product_type">
                        <option value="">All Type</option>
                        @foreach ($types as $key => $type)
                            <option value="{{ $key }}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- @if ($products != null && $search_product != null) --}}
                <div class="overflow-x-auto">
                    <div class="overflow-hidden">
                        <div class="bg-white shadow-md rounded my-6">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">Name</th>
                                        <th class="py-3 px-6 text-left">Type</th>
                                        <th class="py-3 px-6 text-left">Price</th>
                                        <th class="py-3 px-6 text-left">Category</th>
                                        <th class="py-3 px-6 text-left">Quantity</th>
                                        <th class="py-3 px-6 text-left"></th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                    @forelse ($products as $product)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $product->name }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $product->type }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $product->price }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $product->category->name }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <input type="number" min="1" name="quantity" id="quantity">
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <button type="button" wire:click="addProduct({{ $product->id }})" class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Add To Cart</button>
                                        </td>
                                        @empty
                                            <td>
                                                No Data!
                                            </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- @endif --}}
            </div>
        </div>
    </div>
    @elseif ($content_state == 'in_cart_product')
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                {{-- @if ($products != null && $search_product != null) --}}
                <div class="overflow-x-auto">
                    <div class="overflow-hidden">
                        <div class="bg-white shadow-md rounded my-6">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">Name</th>
                                        <th class="py-3 px-6 text-left">Price</th>
                                        <th class="py-3 px-6 text-left">Quantity</th>
                                        <th class="py-3 px-6 text-left"></th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                    @forelse ($products as $product)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $product->name }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <span>{{ $product->price }}</span>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <button type="button" wire:click="addProduct({{ $product->id }})" class="bg-blue-200 text-blue-600 py-1 px-3 rounded-full text-xs">+</button>
                                            <input type="number" min="1" disabled name="quantity" id="quantity">
                                            <button type="button" wire:click="addProduct({{ $product->id }})" class="bg-purple-200 text-purple-600 py-1 px-3 rounded-full text-xs">-</button>
                                        </td>
                                        <td class="py-3 px-6 text-left">
                                            <button type="button" wire:click="addProduct({{ $product->id }})" class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Remove From Cart</button>
                                        </td>
                                        @empty
                                            <td>
                                                No Data!
                                            </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- @endif --}}
            </div>
        </div>
    </div>
    @endif
</div>
