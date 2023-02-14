<div>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                <a href="{{ route('products.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    Back To List Products
                </a>
            </h2>
        </div>

    </x-slot>
    @if ($product != null)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    {{-- @include('profile.partials.update-profile-information-form') --}}
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Create New Product') }}
                        </h2>

                        {{-- <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Update your account's profile information and email address.") }}
                        </p> --}}
                    </header>

                    <form wire:submit.prevent="update" action="" class="mt-6 space-y-6">
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
                                {{-- <option value="">Select Type</option> --}}
                                @foreach ($types as $key => $list_type )
                                {{-- @if ($type != $key)
                                <option selected value="{{ $key }}">{{ $list_type }}</option>
                                @endif --}}
                                    <option {{ $type == $key ? 'selected' : '' }} value="{{ $key }}">{{ $list_type }}</option>
                                @endforeach
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
                                    <option value="{{ $category->id }}" class="{{ $category->id == $category_id ? 'selected' : ''}}" >{{ $category->name }}</option>
                                @endforeach
                            </select>
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
