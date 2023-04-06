<div>
<div class="bg-white">
    {{-- Navbar --}}
        <header class="sticky top-0 z-30 bg-white shadow-md">
            <nav class=" mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="{{ url('/') }}" class="-m-1.5 p-1.5">
                    <span class="sr-only">Mama Parfum</span>
                    <img class="h-8 w-auto" src="{{ asset('logo.png') }}" alt="Logo">
                    </a>
                </div>
                <div class="lg:flex lg:flex-1 lg:justify-end">

                        <div x-cloak
                            x-data="{ open: false }"
                            @keydown.window.escape="open = false">
                            <div class="ml-3 relative inline-flex h-7 items-center">
                                <button @click="open = true" type="button" class="-m-2 p-3 text-sm font-medium text-slate-700 hover:text-gray-500">
                                <span class="sr-only">Open Cart</span>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                                <div class="absolute inline-flex items-center justify-center w-5 h-5 text-xs font-bold text-slate-700 bg-white border-1 border-slate-700 rounded-full -top-2 -right-2 hover:text-gray-500">{{ $content?->count() }}</div>
                                </button>
                            </div>
                            <div  x-show="open" x-transition:enter="ease-in-out duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-500" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
                                <div x-cloak
                                    x-show="open"
                                    x-transition:enter="ease-in-out duration-500"
                                    x-transition:enter-start="opacity-0"
                                    x-transition:enter-end="opacity-100"
                                    x-transition:leave="ease-in-out duration-500"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0"
                                    class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                                >
                                </div>

                                <div class="fixed inset-0 overflow-hidden">
                                    <div class="absolute inset-0 overflow-hidden">
                                        <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                                            <div x-cloak x-show="open"
                                            x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                                            x-transition:enter-start="translate-x-full"
                                            x-transition:enter-end="translate-x-0"
                                            x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                                            x-transition:leave-start="translate-x-0"
                                            x-transition:leave-end="translate-x-full"
                                            @click.away="open = false"
                                            class="pointer-events-auto w-screen max-w-md">
                                                <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                                                <div class="flex-1 overflow-y-auto py-6 px-4 sm:px-6">
                                                    <div class="flex items-start justify-between">
                                                    <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Keranjang Belanja Anda</h2>
                                                    <div class="ml-3 flex h-7 items-center">
                                                        <button @click="open = false" type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500">
                                                        <span class="sr-only">Close panel</span>
                                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                        </button>
                                                    </div>
                                                    </div>

                                                    <div class="mt-8">
                                                    <div class="flow-root">
                                                        <ul role="list" class="-my-6 divide-y divide-gray-200">
                                                    @forelse ($content as $id =>$item)
                                                    <li class="flex py-6">
                                                        <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                        <img src="{{ $item['options']['image'] }}" alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt." class="h-full w-full object-cover object-center">
                                                        </div>

                                                        <div class="ml-4 flex flex-1 flex-col">
                                                        <div>
                                                            <div class="flex justify-between text-base font-medium text-gray-900">
                                                            <h3>
                                                                <a href="#">{{ $item['name'] }}</a>
                                                            </h3>
                                                            <p class="ml-4">{{ $item['price'] * $item['quantity'] }}</p>
                                                            </div>
                                                            <p class="mt-1 text-sm text-gray-500">{{ $item['options']['type'] }}</p>
                                                            <p class="mt-1 text-sm text-gray-500">{{ $item['options']['category'] }}</p>
                                                        </div>
                                                        <div class="flex flex-1 items-end justify-between text-sm mt-2">
                                                            <div class="flex">
                                                            <button type="button" wire:click.debounce.100ms="updateCartItem({{ $id }}, 'minus')" class="font-medium text-indigo-600 hover:text-indigo-500">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                </svg>
                                                            </button>
                                                            <p class="text-gray-500 text-md font-medium mx-4 py-auto mt-1">{{ $item['quantity'] }}</p>
                                                            <button type="button" wire:click.debounce.100ms="updateCartItem({{ $id }}, 'plus')" class="font-medium text-indigo-600 hover:text-indigo-500">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                </svg>
                                                            </button>
                                                            </div>

                                                            <div class="flex">
                                                            <button type="button"  wire:click.debounce.100ms="removeFromCart({{ $id }})" class="font-medium text-red-400 hover:text-red-500">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                                </svg>
                                                            </button>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </li>
                                                    @empty
                                                    No Data !!!
                                                    @endforelse
                                                        <!-- More products... -->
                                                        </ul>
                                                    </div>
                                                    </div>
                                                </div>

                                                <div class="border-t border-gray-200 py-6 px-4 sm:px-6">
                                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                                    <p>Subtotal</p>
                                                    <p>{{ $total }}</p>
                                                    </div>
                                                    <p class="mt-0.5 text-sm text-gray-500">Diskon dan Ongkir akan di kalkulasi oleh admin setelah anda checkout dan menghubungi admin</p>
                                                    <div class="mt-6">
                                                    <a href="{{ route('catalog-checkout',['reseller' => $channel->id],) }}" class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Checkout</a>
                                                    </div>
                                                    <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                                                    <p>
                                                        atau
                                                        <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">
                                                        Lanjutkan Belanja
                                                        <span aria-hidden="true"> &rarr;</span>
                                                        </button>
                                                    </p>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            </nav>
        </header>
    {{-- EndNavbar --}}

    {{-- Header --}}
        <div class="bg-white mb-4 py-2 sm:py-16 sm:mt-8">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:text-center">
                <h2 class="text-base font-semibold leading-7 text-indigo-600">Catalog</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Temukan Parfum Favorit Anda</p>
                <p class="mt-6 text-lg leading-8 text-gray-600">Quis tellus eget adipiscing convallis sit sit eget aliquet quis. Suspendisse eget egestas a elementum pulvinar et feugiat blandit at. In mi viverra elit nunc.</p>
            </div>
            </div>
        </div>
    {{-- End Header --}}

    {{-- Search --}}
    <div class="bg-gray-50 py-8 rounded border-1 my-2 sm:items-center sm:px-24 shadow-md ">
        <div class="grid lg:grid-cols-2 justify-center gap-y-4 sm:grid-cols-1 sm:justify-between w-full">
            <div class="relative lg:px-0 items-end">
                <input type="search" name="search" wire:model.defer="search" id="search" class="block p-2.5 w-full rounded-lg text-sm text-gray-900 bg-gray-50 border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Search...">
                <button type="button" wire:click="$refresh" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <span class="sr-only">Search</span>
                </button>
            </div>
            <div class="grid grid-cols-2 items-center gap-x-6 lg:px-6 w-full">
                <div
                    x-data="{
                        open: false,
                        toggle() {
                            if (this.open) {
                                return this.close()
                            }

                            this.$refs.button.focus()

                            this.open = true
                        },
                        close(focusAfter) {
                            if (! this.open) return

                            this.open = false

                            focusAfter && focusAfter.focus()
                        }
                    }"
                    x-on:keydown.escape.prevent.stop="close($refs.button)"
                    x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                    x-id="['dropdown-button']"
                    class="relative left-0 z-10 origin-top-right rounded-md md:w-48 items-end">
                    <button
                        x-ref="button"
                        x-on:click="toggle()"
                        :aria-expanded="open"
                        :aria-controls="$id('dropdown-button')"
                        type="button"
                        id="dropdown-button" data-dropdown-toggle="dropdown"
                        class="flex-shrink-0 z-10 justify-self-end w-full inline-flex py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100" type="button"
                        >
                        {{ $category_filter == '' ? 'Semua Kategori' : Str::of(Str::of($category_filter)->replace('_', ' '))->title() }}
                        <svg aria-hidden="true" class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div
                        x-ref="panel"
                        x-show="open"
                        x-transition.origin.top.left
                        x-on:click.outside="close($refs.button)"
                        :id="$id('dropdown-button')"
                        style="display: none;"
                        id="dropdown"
                        class="z-10 bg-white divide-y absolute left-0 mt-2 divide-gray-100 rounded-lg shadow w-44">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdown-button">
                            <li>
                                <button type="button" wire:click="filterCategory()"  x-on:click="toggle()" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 ">Semua Kategori</button>
                            </li>
                            @forelse ($categories as $category)
                            <li>
                                <button type="button" wire:click="filterCategory('{{ $category->name }}')"  x-on:click="toggle()" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 ">{{ $category->name }}</button>
                            </li>
                            @empty
                            <li>
                                <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 ">No Data!!!</button>
                            </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <div
                    x-data="{
                        open: false,
                        toggle() {
                            if (this.open) {
                                return this.close()
                            }

                            this.$refs.button.focus()

                            this.open = true
                        },
                        close(focusAfter) {
                            if (! this.open) return

                            this.open = false

                            focusAfter && focusAfter.focus()
                        }
                    }"
                    x-on:keydown.escape.prevent.stop="close($refs.button)"
                    x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                    x-id="['dropdown-button']"
                    class="relative z-10 justify-start">
                    <button
                        x-ref="button"
                        x-on:click="toggle()"
                        :aria-expanded="open"
                        :aria-controls="$id('dropdown-button')"
                        type="button"
                        id="dropdown-button" data-dropdown-toggle="dropdown"
                        id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 w-full  inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100" type="button">
                        {{ $type_filter == '' ? 'Semua Tipe' : Str::of(Str::of($type_filter)->replace('_', ' '))->title() }}
                        <svg aria-hidden="true" class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div
                        x-ref="panel"
                        x-show="open"
                        x-transition.origin.top.left
                        x-on:click.outside="close($refs.button)"
                        :id="$id('dropdown-button')"
                        style="display: none;"
                        id="dropdown"
                        id="dropdown"
                        class="z-10 bg-white divide-y absolute left-0 mt-2 divide-gray-100 rounded-lg shadow w-44">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdown-button">
                            <li>
                                <button type="button" wire:click="filterType()" x-on:click="toggle()" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 ">Semua Tipe</button>
                            </li>
                            <li>
                                <button type="button" wire:click="filterType('top_seller')" x-on:click="toggle()" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 ">Top Seller</button>
                            </li>
                            <li>
                                <button type="button" wire:click="filterType('best_seller')" x-on:click="toggle()" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 ">Best Seller</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @if ($isSearching)
            <div class="relative">
                <button type="button" wire:click="resetSearch()" class="p-2.5 text-sm font-medium text-white bg-red-700 rounded-lg border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300">
                    <span>Reset Pencarian</span>
                </button>
            </div>
            @endif
        </div>
    </div>
    {{-- End Search --}}

    {{-- Content --}}
        <div x-data="{
            open : false,
            product : '',
            viewProduct(product) {
                this.open = true
                this.product = product
                this.product.quantity = 1
                this.product.category_name = product.category.name
            },
            closeModal(){
                this.open = false
            },
            increment() {
                this.product.quantity ++
            },
            decrement() {
                if (this.product.quantity > 1) {
                    this.product.quantity --
                }
            },
            addToCart() {
                {{-- Livewire.emit('addToCart', this.product) --}}
                $wire.addToCart(this.product.id, this.product.quantity)
                this.closeModal()
            },
            }"
            {{-- @view-product.window="open = true" --}}
            @keydown.window.escape="closeModal()"
            class="bg-gray-100 py-12 sm:py-12">
            <div class="mx-auto max-w-7xl px-2 lg:px-0">
                <div class="grid grid-cols-1 gap-y-16 gap-x-8 text-center lg:grid-cols-2">
                    @forelse ($products as $product)
                    <div class="flex bg-white rounded-lg shadow items-stretch">
                        <div class="relative flex-none w-24 h-32 lg:w-40 lg:min-h-fit">
                            <div class="flex p-2">
                                <img
                                src="{{ $product->image }}"
                                alt="shopping image" class="absolute inset-0 object-cover w-full h-full rounded-lg"/>
                            </div>
                        </div>
                        <div class="flex-auto items-start">
                            <div class="flex ml-4 justify-between">
                            <div class="text-base font-semibold leading-7 text-gray-900">{{ $product->name }}</div>
                            </div>
                            <div class="flex text-xs ml-4 mt-2">
                                <span class="relative rounded-full bg-gray-50 px-2 font-medium text-gray-600 hover:bg-gray-100">{{ $product->type }}</span>
                                <span class="relative rounded-full bg-gray-50 px-2 font-medium text-gray-600 hover:bg-gray-100">{{ $product->category->name }}</span>
                            </div>
                            {{-- <div class="flex ml-4 mt-2 items-start">
                                <div class="text-base leading-7 text-gray-900 justify-start">
                                    <p>
                                        @if (Str::of($product->description)->length() > 50)
                                        {{  Str::substrReplace($product->description, '...', 50) }}
                                        @else
                                        {{ $product->description }}
                                        @endif
                                    </p>
                                </div>
                            </div> --}}
                            <div class="flex justify-between pt-8 item-center">
                                <h1 class="text-xl ml-4 font-bold text-gray-700">
                                    {{ number_format($product->price) }}
                                </h1>
                                <button class="px-3 py-2 mr-2 mb-4 text-xs bg-indigo-800 rounded-md border border-transparent font-bold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                 {{-- x-on:click="open = true" --}}
                                 x-on:click="viewProduct({{ $product }})"
                                 {{-- wire:click="viewProduct({{ $product }})" --}}
                                 >
                                    Detail
                                </button>
                            </div>

                        </div>
                    </div>
                    @empty
                    No Data!!!
                    @endforelse
                </div>
            </div>
            <!--Modal -->
            <div x-cloak x-show="open" class="relative z-50" role="dialog" aria-modal="true">
                <div
                x-cloak
                    x-show="open"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 hidden bg-gray-500 bg-opacity-75 transition-opacity md:block">
                </div>

                <div x-cloak class="fixed inset-0 z-10 overflow-y-auto">
                <div x-cloak class="flex min-h-full items-stretch justify-center text-center md:items-center md:px-2 lg:px-4">
                    <div
                        x-cloak
                        x-show="open"
                        x-transition:enter="ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4 md:translate-y-0 md:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 md:scale-100"
                        x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0 md:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 md:translate-y-0 md:scale-95"
                        {{-- @click.away="open = false" --}}
                        @click.away="closeModal()"
                        class="flex w-full transform text-left text-base transition md:my-8 md:max-w-2xl md:px-4 lg:max-w-4xl">
                        <div class="relative flex w-full items-center overflow-hidden bg-white px-4 pt-14 pb-8 shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8">
                            <button type="button" class="absolute top-4 right-4 text-gray-400 hover:text-gray-500 sm:top-8 sm:right-6 md:top-6 md:right-6 lg:top-8 lg:right-8"
                            @click="open = false">
                            <span class="sr-only">Close</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            </button>

                            <div class="grid w-full grid-cols-1 items-start gap-y-8 gap-x-6 sm:grid-cols-12 lg:gap-x-8">
                            <div class="aspect-w-2 aspect-h-3 overflow-hidden rounded-lg bg-gray-100 sm:col-span-4 lg:col-span-5">
                                <img
                                    :src="product.image"
                                    alt="Two each of gray, white, and black shirts arranged on table."
                                    class="object-cover object-center">
                            </div>
                            <div class="sm:col-span-8 lg:col-span-7">
                                {{-- <h2 class="text-2xl font-bold text-gray-900 sm:pr-12">{{ $product_selected?->name }}</h2> --}}
                                <h2 x-text="product.name" class="text-2xl font-bold text-gray-900 sm:pr-12"></h2>

                                <section aria-labelledby="information-heading" class="mt-2">
                                <h3 id="information-heading" class="sr-only">Product information</h3>

                                <p x-text="product.price" class="text-lg text-gray-900"></p>
                                </section>

                                <section aria-labelledby="options-heading" class="mt-2">
                                    <h3 id="options-heading" class="sr-only">Product options</h3>
                                    <div>
                                        <!-- Colors -->
                                        <div>
                                            <p x-text="product.description" class="text-md font-light text-gray-900"></p>
                                        </div>

                                        <div class="mt-2">
                                            <span x-text="product.category_name" class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full border border-blue-400"></span>
                                            <span x-text="product.type" class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full border border-red-400"></span>
                                        </div>

                                        <!-- Sizes -->
                                        <div class="mt-4">
                                            <div class="flex items-center justify-between px-16">
                                                <button @click="decrement()" type="button" class="text-sm font-medium text-indigo-600 hover:text-indigo-500 mr-4">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </button>
                                                <input x-model="product.quantity" type="number" min="1" class="block w-full font-medium text-gray-900 border border-gray-400 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500" autofocus required>
                                                <button @click="increment()" type="button" class="text-sm font-medium text-indigo-600 ml-4">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <button @click="addToCart()" type="submit" class="mt-6 flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 py-3 px-8 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Tambah ke keranjang</button>
                                    </div>
                                </section>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- End Modal -->
            <div class="mt-4 ml-4 lg:ml-8">
                <p class="text-gray-500 dark:text-gray-400"> Menampilkan {{ $products->count() }} dari {{ $products->total() }} produk</p>
                @if ($products->hasMorePages())
                    <button type="button" wire:click.debounce.100ms="loadMore()" class="inline-flex items-center font-medium text-blue-600 dark:text-blue-500 hover:underline">
                        Muat Lebih Banyak
                        <svg aria-hidden="true" class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                @endif
                </p>
            </div>


        </div>
    {{-- End Content --}}

    {{-- Footer --}}
    @include('layouts.footer')
    {{-- End Footer --}}
</div>
</div>
