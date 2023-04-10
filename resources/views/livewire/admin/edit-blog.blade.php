<div>
    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="w-full">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Bikin Blog') }}
                        </h2>
                    </header>

                    <form action="" class="mt-6 space-y-6">
                        <x-input-label for="photo" :value="__('Cover')" />
                        <div x-data="{open: false}">
                            <x-secondary-button x-on:click="open = ! open" class="mb-2" x-text="open ? 'Batal Ganti Cover' : 'Ganti Cover' ">Ganti Cover</x-secondary-button>
                            <div :class="open ? 'hidden' : ''">
                                <img src="{{ $image }}" alt="cover">
                            </div>
                            <div x-cloak x-show="open" x-transition>
                                <x-filepond
                                wire:model="new_image"
                                allowImagePreview
                                imagePreviewMaxHeight="200"
                                allowFileTypeValidation
                                acceptedFileTypes="['image/png', 'image/jpg', 'image/jpeg']"
                                allowFileSizeValidation
                                maxFileSize="8mb"
                                />
                            </div>
                        </div>
                        @error('image') <p class="mt-2 text-sm text-red-800">{{ $message }}</p> @enderror
                        <div>
                            <x-input-label for="title" :value="__('Judul')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" wire:model="title" required />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>


                        <div wire:ignore class="pb-4">
                            <x-input-label for="content" :value="__('Content')" />
                            <textarea name="content" id="paragraph" cols="" rows="" wire:model="content">{!! $content !!}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button wire:loading.attr="disabled" wire:target="storeBlog" type="submit" wire:click.prevent="storeBlog">
                                {{ __('Simpan') }}
                            </x-primary-button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@once
@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<script>
     ClassicEditor
        .create( document.querySelector( '#paragraph' ),{
            ckfinder: {
                uploadUrl: '{{route('blogs.upload').'?_token='.csrf_token()}}',
            },
        })
        .then( editor => {
                window.editor = editor;
                editor.model.document.on( 'change:data', () => {
                    @this.set('content', editor.getData());
                } );
            } )
        .catch( error => {
            console.error( error );
        } );
</script>
@endpush
@endonce
</div>
