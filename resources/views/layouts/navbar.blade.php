{{-- Navbar --}}
<header class="bg-white">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="{{ url('/') }}" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img class="h-8 w-auto bg-gray-900 rounded-full" src="{{ asset('logo.png') }}"
                    alt="">
            </a>
        </div>

        <div x-cloak x-data="{ open: false }" class="flex lg:hidden">
            <button @click="open = true" type="button"
                class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Open main menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>

            <!-- Mobile menu -->
            <div x-show="open" @keydown.window.escape="open = false" class="relative z-10"
                aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
                <div x-cloak x-show="open" x-transition:enter="ease-in-out duration-500"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    x-transition:leave="ease-in-out duration-500" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="fixed inset-0 bg-slate-900/25 backdrop-blur-sm transition-opacity"></div>

                <div class="fixed inset-0 overflow-hidden">
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                            <div x-cloak x-show="open"
                                x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                                x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                                x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                                x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                                @click.away="open = false" class="pointer-events-auto relative w-screen max-w-md">
                                <div x-show="open" x-transition:enter="ease-in-out duration-500"
                                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                    x-transition:leave="ease-in-out duration-500" x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0"
                                    class="absolute top-0 left-0 -ml-8 flex pt-4 pr-2 sm:-ml-10 sm:pr-4">
                                </div>

                                <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                                    {{-- <div class="px-4 sm:px-6"> --}}
                                        <h2 class="sr-only" id="headlessui-dialog-title-188" data-headlessui-state="open">Navigation</h2>
                                        <button @click="open = false" type="button"
                                            class="absolute top-5 right-6 flex h-8 w-8 items-center justify-center z-40"
                                            tabindex="0"><span class="sr-only">Close navigation</span><svg
                                                class="h-3.5 w-3.5 overflow-visible stroke-slate-900" fill="none"
                                                stroke-width="1.5" stroke-linecap="round"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0 0L14 14M14 0L0 14"></path>
                                            </svg>
                                        </button>
                                    {{-- </div> --}}
                                    <div class="relative mt-6 flex-1 px-4 sm:px-6">
                                        <!-- Your content -->
                                        <nav class="divide-y divide-slate-900/10 text-base leading-7 text-slate-900">
                                            <div class="px-8 mb-8">
                                                <a class="block w-9 overflow-hidden" href="/">
                                                    <span class="sr-only">Mama Parfum</span>
                                                    <img class="h-8 w-auto bg-gray-900 rounded-full" src="{{ asset('logo.png') }}" alt="">
                                                    {{-- <svg class="h-6 w-auto" aria-hidden="true" viewBox="0 0 160 24"
                                                        fill="none">
                                                        <path
                                                            d="M18.724 1.714c-4.538 0-7.376 2.286-8.51 6.857 1.702-2.285 3.687-3.143 5.957-2.57 1.296.325 2.22 1.271 3.245 2.318 1.668 1.706 3.6 3.681 7.819 3.681 4.539 0 7.376-2.286 8.51-6.857-1.701 2.286-3.687 3.143-5.957 2.571-1.294-.325-2.22-1.272-3.245-2.32-1.668-1.705-3.6-3.68-7.819-3.68zM10.214 12c-4.539 0-7.376 2.286-8.51 6.857 1.701-2.286 3.687-3.143 5.957-2.571 1.294.325 2.22 1.272 3.245 2.32 1.668 1.705 3.6 3.68 7.818 3.68 4.54 0 7.377-2.286 8.511-6.857-1.702 2.286-3.688 3.143-5.957 2.571-1.295-.326-2.22-1.272-3.245-2.32-1.669-1.705-3.6-3.68-7.82-3.68z"
                                                            class="fill-sky-400">
                                                        </path>
                                                        <path
                                                            d="M51.285 9.531V6.857h-3.166v-3.6l-2.758.823v2.777h-2.348v2.674h2.348v6.172c0 3.343 1.686 4.526 5.924 4.011V17.22c-2.094.103-3.166.129-3.166-1.517V9.53h3.166zm12.087-2.674v1.826c-.97-1.337-2.476-2.16-4.468-2.16-3.472 0-6.357 2.931-6.357 6.763 0 3.805 2.885 6.763 6.357 6.763 1.992 0 3.498-.823 4.468-2.186v1.851h2.758V6.857h-2.758zM59.338 17.4c-2.297 0-4.034-1.723-4.034-4.114 0-2.392 1.736-4.115 4.034-4.115s4.034 1.723 4.034 4.115c0 2.391-1.736 4.114-4.034 4.114zM70.723 4.929c.97 0 1.762-.823 1.762-1.775 0-.977-.792-1.774-1.762-1.774s-1.762.797-1.762 1.774c0 .952.792 1.775 1.762 1.775zm-1.379 14.785h2.758V6.857h-2.758v12.857zm5.96 0h2.757V.943h-2.758v18.771zM95.969 6.857l-2.502 8.872-2.655-8.872h-2.63L85.5 15.73l-2.477-8.872h-2.91l4.008 12.857h2.707l2.68-8.665 2.656 8.665h2.706L98.88 6.857h-2.911zm6.32-1.928c.97 0 1.762-.823 1.762-1.775 0-.977-.792-1.774-1.762-1.774s-1.762.797-1.762 1.774c0 .952.792 1.775 1.762 1.775zm-1.379 14.785h2.758V6.857h-2.758v12.857zm12.674-13.191c-1.736 0-3.115.643-3.957 1.98V6.857h-2.758v12.857h2.758v-6.891c0-2.623 1.43-3.703 3.242-3.703 1.737 0 2.86 1.029 2.86 2.983v7.611h2.757V11.82c0-3.343-2.042-5.297-4.902-5.297zm17.982-4.809v6.969c-.971-1.337-2.477-2.16-4.468-2.16-3.473 0-6.358 2.931-6.358 6.763 0 3.805 2.885 6.763 6.358 6.763 1.991 0 3.497-.823 4.468-2.186v1.851h2.757v-18h-2.757zM127.532 17.4c-2.298 0-4.034-1.723-4.034-4.114 0-2.392 1.736-4.115 4.034-4.115 2.297 0 4.034 1.723 4.034 4.115 0 2.391-1.737 4.114-4.034 4.114z"
                                                            fill="currentColor">
                                                        </path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M145.532 3.429h8.511c.902 0 1.768.36 2.407 1.004.638.643.997 1.515.997 2.424v8.572c0 .909-.359 1.781-.997 2.424a3.394 3.394 0 01-2.407 1.004h-8.511a3.39 3.39 0 01-2.407-1.004 3.438 3.438 0 01-.997-2.424V6.857c0-.91.358-1.781.997-2.424a3.39 3.39 0 012.407-1.004zm-5.106 3.428c0-1.364.538-2.672 1.495-3.636a5.09 5.09 0 013.611-1.507h8.511c1.354 0 2.653.542 3.61 1.507a5.16 5.16 0 011.496 3.636v8.572a5.16 5.16 0 01-1.496 3.636 5.086 5.086 0 01-3.61 1.506h-8.511a5.09 5.09 0 01-3.611-1.506 5.164 5.164 0 01-1.495-3.636V6.857zm10.907 6.251c0 1.812-1.359 2.916-3.193 2.916-1.823 0-3.182-1.104-3.182-2.916v-5.65h1.633v5.52c0 .815.429 1.427 1.549 1.427 1.12 0 1.549-.612 1.549-1.428v-5.52h1.644v5.652zm1.72 2.748V7.457h1.644v8.4h-1.644z"
                                                            fill="currentColor">
                                                        </path>
                                                    </svg> --}}
                                                </a>
                                            </div>
                                            <div class="py-6 px-8">
                                                <div class="-my-2 items-start space-y-2">
                                                    <a
                                                        class="block w-full py-2 font-semibold"
                                                        href="{{ url('/') }}">Home
                                                    </a>
                                                    <a
                                                        class="block w-full py-2 font-semibold"
                                                        href="{{ url('/product') }}">Produk
                                                    </a>
                                                    <a
                                                        class="flex w-full items-center py-2 font-semibold"
                                                        href="{{ url('/join-reseller') }}">Reseller
                                                    </a>
                                                    <a class="block w-full py-2 font-semibold"
                                                        href="{{ url('about-us') }}">About Us
                                                    </a>
                                                    <a class="block w-full py-2 font-semibold"
                                                        href="{{ route('list-blog') }}">Blog & Activity
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="py-6 px-8">
                                                <div class="-my-2 space-y-4">
                                                    @if(Route::has('login'))
                                                        @auth
                                                            @if (Auth::user()->hasRole('admin'))
                                                                <a class="inline-flex justify-center rounded-lg text-sm font-semibold py-3 px-4 bg-slate-900 text-white hover:bg-slate-700 w-full"
                                                                    href="{{ route('dashboard') }}">
                                                                    <span>Dashboard
                                                                        <span aria-hidden="true">→</span>
                                                                    </span>
                                                                </a>
                                                            @elseif (Auth::user()->hasRole('reseller'))
                                                                <a class="inline-flex justify-center rounded-lg text-sm font-semibold py-3 px-4 bg-slate-900 text-white hover:bg-slate-700 w-full"
                                                                    href="{{ route('dashboard-reseller') }}">
                                                                    <span>Dashboard
                                                                        <span aria-hidden="true">→</span>
                                                                    </span>
                                                                </a>
                                                            @endif
                                                        @else
                                                            <a class="inline-flex justify-center rounded-lg text-sm font-semibold py-3 px-4 bg-slate-900 text-white hover:bg-slate-700 w-full"
                                                                href="{{ route('login') }}">
                                                                <span>Login
                                                                    <span aria-hidden="true">→</span>
                                                                </span>
                                                            </a>
                                                            @if (Route::has('register'))
                                                                <a class="inline-flex justify-center rounded-lg text-sm font-semibold py-3 px-4 bg-white text-slate-900 hover:bg-slate-700 w-full"
                                                                    href="{{ route('register') }}">
                                                                    <span>Register
                                                                        <span aria-hidden="true">→</span>
                                                                    </span>
                                                                </a>
                                                            @endif
                                                        @endauth
                                                    @endif
                                                </div>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Mobile Menu -->

        </div>


        <div class="hidden lg:flex lg:gap-x-12">
            <a href="{{ url('/') }}" class="text-sm font-semibold leading-6 text-gray-900">Home</a>
            <a href="{{ url('/product') }}" class="text-sm font-semibold leading-6 text-gray-900">Produk</a>
            <a href="{{ url('join-reseller') }}" class="text-sm font-semibold leading-6 text-gray-900">Reseller</a>
            <a href="{{ url('/about-us') }}" class="text-sm font-semibold leading-6 text-gray-900">About Us</a>
            <a href="{{ route('list-blog') }}" class="text-sm font-semibold leading-6 text-gray-900">Blog & Activity</a>
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            @if (Route::has('login'))
                @auth
                    @if (Auth::user()->hasRole('admin'))
                        <a href="{{ url('/dashboard') }}" class="text-sm font-semibold leading-6 text-gray-900">Dashboard
                            <span aria-hidden="true">&rarr;</span></a>
                    @elseif (Auth::user()->hasRole('reseller'))
                        <a href="{{ url('/dashboard-reseller') }}"
                            class="text-sm font-semibold leading-6 text-gray-900">Dashboard <span
                                aria-hidden="true">&rarr;</span></a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 lg:pr-2 text-gray-900">Log in
                        <span aria-hidden="true">&rarr;</span></a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="text-sm font-semibold leading-6 text-gray-900">Register<span
                                aria-hidden="true">&rarr;</span></a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>
</header>
{{-- End Navbar --}}
