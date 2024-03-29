@extends('layouts.main')
@section('content')

    {{-- Header --}}
    <div class="bg-white shadow-sm">
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                <a href="{{ url('/') }}" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-8 w-auto bg-gray-900 rounded-full" src="{{ asset('logo.png') }}" alt="">
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
                            class="fixed inset-0 bg-slate-900/25 backdrop-blur-sm transition-opacity"
                            >
                        </div>

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
                                                            <img class="h-8 w-auto bg-gray-900 rounded-full" src="{{ asset('logo.png') }}" alt="logo">
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
                                                                href="{{ url('/join-dropshipper') }}">Dropshipper
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
                <a href="{{ url('join-dropshipper') }}" class="text-sm font-semibold leading-6 text-gray-900">Dropshipper</a>
                <a href="{{ url('/about-us') }}" class="text-sm font-semibold leading-6 text-gray-900">About Us</a>
                <a href="{{ route('list-blog') }}" class="text-sm font-semibold leading-6 text-gray-900">Blog & Activity</a>
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    @if (Route::has('login'))
                        @auth
                            @if (Auth::user()->hasRole('admin'))
                            <a href="{{ url('/dashboard') }}" class="text-sm font-semibold leading-6 text-slate-900">Dashboard <span aria-hidden="true">&rarr;</span></a>
                            @elseif (Auth::user()->hasRole('reseller'))
                            <a href="{{ url('/dashboard-reseller') }}" class="text-sm font-semibold leading-6 text-slate-900">Dashboard <span aria-hidden="true">&rarr;</span></a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 lg:pr-2 text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-sm font-semibold leading-6 text-gray-900">Register<span aria-hidden="true">&rarr;</span></a>
                            @endif
                        @endauth
                    @endif
                </div>
            </nav>
        </header>

        <div class="relative isolate px-6 pt-14 lg:px-8">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
            <svg class="relative left-[calc(50%-11rem)] -z-10 h-[21.1875rem] max-w-none -translate-x-1/2 rotate-[30deg] sm:left-[calc(50%-30rem)] sm:h-[42.375rem]" viewBox="0 0 1155 678">
            <path fill="url(#45de2b6b-92d5-4d68-a6a0-9b9b2abad533)" fill-opacity=".3" d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z" />
            <defs>
                <linearGradient id="45de2b6b-92d5-4d68-a6a0-9b9b2abad533" x1="1155.49" x2="-78.208" y1=".177" y2="474.645" gradientUnits="userSpaceOnUse">
                <stop stop-color="#9089FC" />
                <stop offset="1" stop-color="#FF80B5" />
                </linearGradient>
            </defs>
            </svg>
        </div>
        <div class="mx-auto max-w-2xl py-16 mb-8">
            {{-- <div class="sm:mb-8 mb-8 sm:flex sm:justify-center">
                <div class="text-center relative rounded-full py-1 px-3 text-sm leading-6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                    Announcing our next round of funding. <a href="#" class="font-semibold text-indigo-600"><span class="absolute inset-0" aria-hidden="true"></span>Read more <span aria-hidden="true">&rarr;</span></a>
                </div>
            </div> --}}
            <div class="text-center">
            <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Gabung Dengan Kami Menjadi Droopshipper</h1>
            <p class="mt-6 text-lg leading-8 text-gray-600">
                Gabunglah menjadi bagian dari komunitas dropshipper Mama Parfum yang terus berkembang, dan jadilah bagian dari kesuksesan kami.
            </p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="{{ route('register') }}" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Join Sekarang</a>
                <a href="#technical" class="text-sm font-semibold leading-6 text-gray-900">Lebih Lanjut <span aria-hidden="true">→</span></a>
            </div>
            </div>
        </div>
        </div>
    </div>
    {{-- End Header --}}

    {{-- Technical --}}
    <div class="overflow-hidden bg-white py-8 sm:py-16 shadow-sm" id="technical">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto grid max-w-2xl grid-cols-1 gap-y-16 gap-x-8 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2">
            <div class="lg:pr-8 lg:pt-4">
              <div class="lg:max-w-lg">
                <h2 class="text-base font-semibold leading-7 text-indigo-600">Teknis Menjadi</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Dropshipper Mama Parfum</p>
                <p class="mt-6 text-lg leading-8 text-gray-600">
                    Anda dapat menjadi dropshipper dengan cara mendaftar, lalu lakukan validasi akun anda, dan mendapatkan link unik untuk produk-produk yang kami jual.
                </p>
                <dl class="grid max-w-xl grid-cols-1 gap-y-10 gap-x-8 lg:max-w-none lg:gap-y-8 mt-4">
                    <div class="relative pl-16">
                      <dt class="text-base font-semibold leading-7 text-gray-900">
                        <div class="absolute top-0 left-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                          <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                          </svg>
                        </div>
                        Promosikan Produk
                      </dt>
                      <dd class="mt-2 text-base leading-7 text-gray-600">Promosikan produk kami di situs web, media sosial, dan platform e-commerce lainnya. Setiap kali ada penjualan melalui link yang Anda bagikan, Anda akan mendapatkan komisi yang telah disepakati.</dd>
                    </div>

                    <div class="relative pl-16">
                      <dt class="text-base font-semibold leading-7 text-gray-900">
                        <div class="absolute top-0 left-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                          <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                          </svg>
                        </div>
                        Mudah & Praktis
                      </dt>
                      <dd class="mt-2 text-base leading-7 text-gray-600">
                        Kami akan menangani semua proses pengiriman dan pemrosesan pesanan, sehingga Anda tidak perlu memikirkan stok atau pengiriman produk. Setelah pesanan diproses, kami akan mengirimkan produk langsung ke pelanggan Anda.
                    </dd>
                    </div>

                    <div class="relative pl-16">
                      <dt class="text-base font-semibold leading-7 text-gray-900">
                        <div class="absolute top-0 left-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                          <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                          </svg>
                        </div>
                        Akses ke Dashboard Powerfull
                      </dt>
                      <dd class="mt-2 text-base leading-7 text-gray-600">
                       Dapatkan akses ke dashboard yang powerfull untuk melihat penjualan, komisi, dan laporan lainnya, sehingga Anda dapat mengawasi performa bisnis Anda dan melacak pendapatan Anda dengan mudah.
                    </dd>
                    </div>

                    <div class="relative pl-16">
                      <dt class="text-base font-semibold leading-7 text-gray-900">
                        <div class="absolute top-0 left-0 flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-600">
                          <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                          </svg>
                        </div>
                        Referral
                      </dt>
                      <dd class="mt-2 text-base leading-7 text-gray-600">
                        Dapatkan bonus langsung dengan menjadi bagian dari program referral Mama Parfum. Ajak teman-teman Anda untuk bergabung dan semua akan mendapatkan bonus.
                    </dd>
                    </div>
                </dl>
                {{-- <dl class="mt-10 max-w-xl space-y-8 text-base leading-7 text-gray-600 lg:max-w-none">

                </dl> --}}
              </div>
            </div>
            <div class="grid lg:col-start-2 px-4 justify-start">
                <img src="{{ asset('screenshot-dropshipper-dashboard.png') }}" alt="Product screenshot" class="w-[48rem] max-w-none rounded-xl shadow-xl ring-1 ring-gray-400/10 sm:w-[57rem] md:-ml-4 lg:-ml-0" width="2432" height="1442">
                <dl class="block gap-y-8 text-center pt-2 grid-cols-2 mt-8 mr-24 justify-start">
                    <div class="flex flex-col gap-y-2 items-start py-4">
                        <dt class="text-base leading-7 text-gray-600">Pilihan Berkualitas</dt>
                        <dd class="order-first text-2xl font-semibold tracking-tight text-gray-900 sm:text-4xl">44 Produk</dd>
                    </div>

                    <div class="flex flex-col gap-y-2 items-start py-4">
                        <dt class="text-base leading-7 text-gray-600">Pelayanan</dt>
                        <dd class="order-first text-2xl font-semibold tracking-tight text-gray-900 sm:text-4xl">24 Jam</dd>
                    </div>
                </dl>
            </div>
          </div>
        </div>
    </div>

    {{-- End Technical --}}

    {{-- Pricing --}}
    <div class="bg-white lg:py-16 sm:py-16">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto max-w-2xl sm:text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Membership Dropshipper</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600">Bergabunglah menjadi Dropshipper Mama Parfum dan dapatkan keuntungan nyata per produk yang anda jual. Serta akses ke produk-produk terbaru dan penawaran eksklusif lainnya.</p>
          </div>
          <div class="mx-auto mt-12 max-w-2xl rounded-3xl ring-1 ring-gray-200 sm:mt-12 lg:mx-0 lg:flex lg:max-w-none">
            <div class="p-8 sm:p-10 lg:flex-auto">
              <h3 class="text-2xl font-bold tracking-tight text-gray-900">Sekali Bayar, Seumur Hidup, Terus Hasilkan Keuntungan</h3>
              <p class="mt-6 text-base leading-7 text-gray-600">Dengan menjadi member Mama Parfum, Anda dapat menghemat lebih banyak uang dan memperkuat bisnis dropshipping Anda</p>
              <div class="mt-10 flex items-center gap-x-4">
                <h4 class="flex-none text-sm font-semibold leading-6 text-indigo-600">Apa Yang Didapat?</h4>
                <div class="h-px flex-auto bg-gray-100"></div>
              </div>
              <ul role="list" class="mt-8 grid grid-cols-1 gap-4 text-sm leading-6 text-gray-600 sm:grid-cols-2 sm:gap-6">
                <li class="flex gap-x-3">
                  <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                  </svg>
                  Link Katalog Anda
                </li>

                <li class="flex gap-x-3">
                  <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                  </svg>
                  Akses Ke Dashboard Powerfull
                </li>

                <li class="flex gap-x-3">
                  <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                  </svg>
                  Kode Referral
                </li>

                <li class="flex gap-x-3">
                  <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                  </svg>
                  Kemudahan Bantuan Pelayanan
                </li>
              </ul>
            </div>
            <div class="-mt-2 p-2 lg:mt-0 lg:w-full lg:max-w-md lg:flex-shrink-0">
              <div class="rounded-2xl bg-gray-50 py-10 text-center ring-1 ring-inset ring-gray-900/5 lg:flex lg:flex-col lg:justify-center lg:py-16">
                <div class="mx-auto max-w-xs px-8">
                  <p class="text-base font-semibold text-gray-600">Biaya Yang Diperlukan</p>
                  <p class="mt-6 flex items-baseline justify-center gap-x-2">
                    <span class="text-5xl font-bold tracking-tight text-gray-900">50.000</span>
                    <span class="text-sm font-semibold leading-6 tracking-wide text-gray-600">Rp</span>
                  </p>
                  <a href="{{ route('register') }}" class="mt-10 block w-full rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Dapatkan Akses</a>
                  <p class="mt-6 text-xs leading-5 text-gray-600">Setelah Mendaftar, Anda akan diarahkan ke dashboard untuk melakukan pembayaran melalui admin kami</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    {{-- End Pricing --}}

    {{-- Testimonials --}}
    <div class="bg-white py-18 sm:py-18">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Lihat Apa Kata Dropshipper Kami</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">Belajar bagaimana mengembangkan bisnis anda dengan dropshipper berpengalaman kami.</p>
            </div>
        {{-- <div class="mx-auto mt-6 grid max-w-2xl grid-cols-1 gap-y-2 gap-x-8 border-t border-gray-200 pt-18 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            <article class="flex max-w-xl flex-col items-start justify-between mb-8">

            <div class="group relative">
                <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                <a href="#">
                    <span class="absolute inset-0"></span>
                    Boost your conversion rate
                </a>
                </h3>
                <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-3">Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.</p>
            </div>
            <div class="relative mt-8 flex items-center gap-x-4">
                <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-10 w-10 rounded-full bg-gray-50">
                <div class="text-sm leading-6">
                <p class="font-semibold text-gray-900">
                    <a href="#">
                    <span class="absolute inset-0"></span>
                    Michael Foster
                    </a>
                </p>
                <p class="text-gray-600">Dropshipper Mama Parfum</p>
                </div>
            </div>
            </article>

            <!-- More posts... -->
        </div> --}}
        </div>
    </div>
    {{-- End Testimonials --}}

    @include('layouts.footer')

@endsection
