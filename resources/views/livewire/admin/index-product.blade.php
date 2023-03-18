<div>
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('List of All Products') }}
                </h2>
            </div>
        </div>
    </header>
    <div class="flex">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="{{ route('products.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                Create New Product
            </a>
        </h2>
        <x-text-input wire:model="search" type="search" class="ml-2 py-0" placeholder="seacrh here"></x-text-input>
        <select name="type_filter" id="type_filter" wire:model="type_filter">
            <option value="">All type</option>
            <option value="best_seller">Best Seller</option>
            <option value="top_seller">Top Seller</option>
        </select>
        <select name="category_filter" id="category_filter" wire:model="category_filter">
            <option value="">Select Category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->name }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    @foreach ($products as $product)
        <div class="mt-6 ml-2 space-y-6">
            <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="{{ $product->getFirstMediaUrl('image')}}" alt="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Products/belt.webp">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $product->name }}</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->description }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->category->name }}</p>
                    <p class="mb-3 font-bold text-black dark:text-gray-400">{{ $product->type }}</p>
                    <p class="mb-3 font-bold text-black dark:text-gray-400">Rp. {{ $product->price }}</p>
                    <div class="flex mt-4 space-x-3 md:mt-6">
                        <a style="none;" href="{{ route('products.edit',['product' => $product->id]) }}">
                            <x-primary-button >
                                {{ __('Edit Product') }}
                            </x-primary-button>
                        </a>
                        <x-danger-button
                         wire:click="confirmProductDeletion({{ $product->id }})" wire:loading.attr="disabled">
                            {{ __('Delete Product') }}
                        </x-danger-button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @if($products->hasMorePages())
    <x-primary-button wire:click="loadMore">
        {{ __('Load More') }}
    </x-primary-button>
    @endif

    <x-confirm-modal wire:model="confirmingProductDeletion">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Are you sure you want to delete') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Once this product is deleted, all of its resources and data will be permanently deleted.') }}
                </p>
                <div class="mt-6 flex justify-end">
                    <x-secondary-button wire:click="$toggle('confirmingProductDeletion')" wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button type="submit" wire:click="deleteProduct" wire:loading.attr="disabled" class="ml-3">
                        {{ __('Delete Product') }}
                    </x-danger-button>
                </div>
            </div>
    </x-confirm-modal>
</div>
