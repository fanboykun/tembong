<div>
    @if ($product != null)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Edit Data Produk') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Lihat dan perbarui data produk") }}
                        </p>
                    </header>

                    <form wire:submit.prevent="update" action="" class="mt-6 space-y-6">
                        <div>
                            <x-input-label for="name" :value="__('name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model="name" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Deskripsi')" />
                            <textarea id="description" class="block mt-1 w-full" type="text" name="description" wire:model="description" required />
                            </textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <div>
                            <x-input-label for="type" :value="__('tipe')" />
                            <select wire:model="type" name="type" id="type">
                                {{-- <option value="">Select Type</option> --}}
                                @foreach ($types as $key => $list_type )
                                {{-- @if ($type != $key)
                                <option selected value="{{ $key }}">{{ $list_type }}</option>
                                @endif --}}
                                    <option {{ $type == $key ? 'selected' : '' }} value="{{ $key }}">{{ $list_type }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('type')" />
                        </div>

                        <div>
                            <x-input-label for="price" :value="__('Harga (otomatis)')" />
                            <x-text-input disabled id="price" class="block mt-1 w-full" type="number" name="price" wire:model="price" required />
                            <x-input-error class="mt-2" :messages="$errors->get('price')" />
                        </div>

                        <div>
                            <x-input-label for="stock" :value="__('Stok')" />
                            <x-text-input id="stock" class="block mt-1 w-full" type="number" name="stock" wire:model="stock" required />
                            <x-input-error class="mt-2" :messages="$errors->get('stock')" />
                        </div>

                        <div>
                            <x-input-label for="category" :value="__('Category')" />
                            <select wire:model="category_id" name="category_id" id="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" class="{{ $category->id == $category_id ? 'selected' : ''}}" >{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('category')" />
                        </div>
                        <x-input-label for="photo" :value="__('Photo')" />

                        <div>
                            <x-secondary-button wire:click="$toggle('isEdit')" class="mb-2">{{ $isEdit  ? 'Cancel Change Photo' : 'Change Photo' }}</x-secondary-button>
                            @if ($isEdit)
                            <x-filepond
                            wire:model="new_image"
                            allowImagePreview
                            imagePreviewMaxHeight="200"
                            allowFileTypeValidation
                            acceptedFileTypes="['image/png', 'image/jpg', 'image/jpeg']"
                            allowFileSizeValidation
                            maxFileSize="8mb"
                            />
                                @error('image') <p class="mt-2 text-sm text-red-800">{{ $message }}</p> @enderror
                            @else
                            <img src="{{ $product->getFirstMediaUrl('image') }}" alt="">
                            @endif

                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@push('styles')
    @once
        <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
    @endonce
@endpush

@push('scripts')
    @once
        <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
        <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
        <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
        <script>
            FilePond.registerPlugin(FilePondPluginFileValidateType);
            FilePond.registerPlugin(FilePondPluginFileValidateSize);
            FilePond.registerPlugin(FilePondPluginImagePreview);
        </script>
    @endonce
@endpush
