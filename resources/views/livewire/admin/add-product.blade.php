<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <a href="{{ route('products.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                Back To Products
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Create New Product') }}
                        </h2>
                    </header>

                    <form wire:submit.prevent="store" action="" class="mt-6 space-y-6">
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model="name" required autofocus />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Descripiton')" />
                            <textarea id="description" class="block mt-1 w-full" type="text" name="description" wire:model="description" required autofocus />
                            </textarea>
                        </div>

                        <div>
                            <x-input-label for="type" :value="__('Type')" />
                            <select wire:model="type" name="type" id="type">
                                <option value="">Select Type</option>
                                    <option value="best_seller">Best Seller</option>
                                    <option value="top_seller">Top Seller</option>
                            </select>
                        </div>
                        <div>
                            <x-input-label for="price" :value="__('Price')" />
                            <x-text-input disabled id="price" class="block mt-1 w-full" type="number" name="price" wire:model="price" required autofocus />

                        </div>

                        <div>
                            <x-input-label for="stock" :value="__('Stock')" />
                            <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock" wire:model="stock" required autofocus />
                        </div>

                        <div>
                            <x-input-label for="category" :value="__('Category')" />
                            <select wire:model="category_id" name="category_id" id="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <x-input-label for="photo" :value="__('Photo')" />

                        <div>
                            <x-filepond
                            wire:model="image"
                            {{-- multiple --}}
                            allowImagePreview
                            imagePreviewMaxHeight="200"
                            allowFileTypeValidation
                            acceptedFileTypes="['image/png', 'image/jpg', 'image/jpeg']"
                            allowFileSizeValidation
                            maxFileSize="8mb"
                            />
                            @error('image') <p class="mt-2 text-sm text-red-800">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
