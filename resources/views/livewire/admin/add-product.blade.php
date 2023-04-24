<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Tambah Produk') }}
                        </h2>
                    </header>

                    <form wire:submit.prevent="store" action="" class="mt-6 space-y-6">
                        <div>
                            <x-input-label for="name" :value="__('Nama')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model.defer="name" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Deskripsi')" />
                            <textarea id="description" class="block mt-1 w-full" type="text" name="description" wire:model.defer="description" required />
                            </textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <div>
                            <x-input-label for="type" :value="__('Tipe')" />
                            <select wire:model.defer="type" name="type" id="type">
                                <option value="">Pilih Satu Tipe</option>
                                    <option value="best_seller">Best Seller</option>
                                    <option value="top_seller">Top Seller</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('type')" />
                        </div>
                        <div>
                            <x-input-label for="price" :value="__('Harga (otomatis)')" />
                            <x-text-input disabled id="price" class="block mt-1 w-full" type="number" name="price" value="{{ $price }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('price')" />
                        </div>

                        <div>
                            <x-input-label for="stock" :value="__('Stok')" />
                            <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock" wire:model.defer="stock" required />
                            <x-input-error class="mt-2" :messages="$errors->get('stock')" />
                        </div>

                        <div>
                            <x-input-label for="category" :value="__('Kategori')" />
                            <select wire:model.defer="category_id" name="category_id" id="category_id">
                                <option value="">Pilih Satu Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('category')" />
                        </div>

                        {{-- <x-input-label for="photo" :value="__('Photo')" />
                        <div>
                            <x-filepond
                            wire:model="image"
                            allowImagePreview
                            imagePreviewMaxHeight="200"
                            allowFileTypeValidation
                            acceptedFileTypes="['image/png', 'image/jpg', 'image/jpeg']"
                            allowFileSizeValidation
                            maxFileSize="8mb"
                            />
                            @error('image') <p class="mt-2 text-sm text-red-800">{{ $message }}</p> @enderror
                        </div> --}}

                        <div class="flex items-center gap-4">
                            <x-primary-button>
                                {{ __('Simpan') }}
                            </x-primary-button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
