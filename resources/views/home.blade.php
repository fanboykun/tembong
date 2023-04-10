@extends('layouts.main')
@section('content')
    {{-- Navbar --}}
    <header class="absolute inset-x-0 top-0 z-50">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="{{ url('/') }}" class="-m-1.5 p-1.5">
            <span class="sr-only">Your Company</span>
            <img class="h-8 w-auto" src="{{ asset('logo.png') }}" alt="">
            </a>
        </div>

        <div x-cloak x-data="{ open: false }" class="flex lg:hidden">
            <button @click="open = true" type="button"
                class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-white">
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
            <a href="{{ url('/') }}" class="text-sm font-semibold leading-6 text-gray-200">Home</a>
            <a href="{{ url('/product') }}" class="text-sm font-semibold leading-6 text-gray-200">Produk</a>
            <a href="{{ url('join-reseller') }}" class="text-sm font-semibold leading-6 text-gray-200">Reseller</a>
            <a href="{{ url('/about-us') }}" class="text-sm font-semibold leading-6 text-gray-200" >About Us</a>
            <a href="{{ route('list-blog') }}" class="text-sm font-semibold leading-6 text-gray-200">Blog & Activity</a>
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            @if (Route::has('login'))
                @auth
                    @if (Auth::user()->hasRole('admin'))
                    <a href="{{ url('/dashboard') }}" class="text-sm font-semibold leading-6 text-gray-200">Dashboard <span aria-hidden="true">&rarr;</span></a>
                    @elseif (Auth::user()->hasRole('reseller'))
                    <a href="{{ url('/dashboard-reseller') }}" class="text-sm font-semibold leading-6 text-gray-200">Dashboard <span aria-hidden="true">&rarr;</span></a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 lg:pr-2 text-gray-200">Log in <span aria-hidden="true">&rarr;</span></a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-sm font-semibold leading-6 text-gray-200">Register<span aria-hidden="true">&rarr;</span></a>
                    @endif
                @endauth
            @endif
        </div>
        </nav>
    </header>
    {{-- End Navbar --}}

    {{-- Header --}}
    <div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-32">
        {{-- <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&crop=focalpoint&fp-y=.8&w=2830&h=1500&q=80&blend=111827&sat=-100&exp=15&blend-mode=multiply" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center"> --}}
        <svg viewBox="0 0 1097 845" aria-hidden="true" class="hidden transform-gpu blur-3xl sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:w-[68.5625rem]">
            <path fill="url(#10724532-9d81-43d2-bb94-866e98dd6e42)" fill-opacity=".2" d="M301.174 646.641 193.541 844.786 0 546.172l301.174 100.469 193.845-356.855c1.241 164.891 42.802 431.935 199.124 180.978 195.402-313.696 143.295-588.18 284.729-419.266 113.148 135.13 124.068 367.989 115.378 467.527L811.753 372.553l20.102 451.119-530.681-177.031Z" />
            <defs>
            <linearGradient id="10724532-9d81-43d2-bb94-866e98dd6e42" x1="1097.04" x2="-141.165" y1=".22" y2="363.075" gradientUnits="userSpaceOnUse">
                <stop stop-color="#776FFF" />
                <stop offset="1" stop-color="#FF4694" />
            </linearGradient>
            </defs>
        </svg>
        <svg viewBox="0 0 1097 845" aria-hidden="true" class="absolute left-1/2 -top-52 -z-10 w-[68.5625rem] -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0 sm:transform-gpu">
            <path fill="url(#8ddc7edb-8983-4cd7-bccb-79ad21097d70)" fill-opacity=".2" d="M301.174 646.641 193.541 844.786 0 546.172l301.174 100.469 193.845-356.855c1.241 164.891 42.802 431.935 199.124 180.978 195.402-313.696 143.295-588.18 284.729-419.266 113.148 135.13 124.068 367.989 115.378 467.527L811.753 372.553l20.102 451.119-530.681-177.031Z" />
            <defs>
            <linearGradient id="8ddc7edb-8983-4cd7-bccb-79ad21097d70" x1="1097.04" x2="-141.165" y1=".22" y2="363.075" gradientUnits="userSpaceOnUse">
                <stop stop-color="#776FFF" />
                <stop offset="1" stop-color="#FF4694" />
            </linearGradient>
            </defs>
        </svg>
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
            <h2 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">Mama Parfum</h2>
            <p class="mt-6 text-lg leading-8 text-gray-300">Aromanya Selembut Kasih Sayang Mama.</p>
            </div>
            <div class="mx-auto mt-10 max-w-2xl lg:mx-0 lg:max-w-none">
            <div class="grid grid-cols-1 gap-y-6 gap-x-8 text-base font-semibold leading-7 text-white sm:grid-cols-2 md:flex lg:gap-x-10">
                <a href="#about">Tentang Mama Parfum<span aria-hidden="true">&rarr;</span></a>

                <a href="#business">Bisnis <span aria-hidden="true">&rarr;</span></a>

                <a href="#us">Siapa Kami <span aria-hidden="true">&rarr;</span></a>

                <a href="#faq">Faq <span aria-hidden="true">&rarr;</span></a>
            </div>
            <dl class="mt-16 grid grid-cols-1 gap-8 sm:mt-20 sm:grid-cols-2 lg:grid-cols-4">
                <div class="flex flex-col-reverse">
                <dt class="text-base leading-7 text-gray-300">Halal, Non Alkohol</dt>
                <dd class="text-2xl font-bold leading-9 tracking-tight text-white">100%</dd>
                </div>

                <div class="flex flex-col-reverse">
                <dt class="text-base leading-7 text-gray-300">Pilihan Aroma</dt>
                <dd class="text-2xl font-bold leading-9 tracking-tight text-white">300+</dd>
                </div>
            </dl>
            </div>
        </div>
    </div>
    {{-- End Header --}}

    {{-- Feature --}}
    <div class="overflow-hidden bg-white py-12 sm:py-12" id="about">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto grid max-w-2xl grid-cols-1 gap-y-16 gap-x-8 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2">
            <div class="lg:pr-8 lg:pt-4">
              <div class="lg:max-w-lg">
                <h2 class="text-base font-semibold leading-7 text-indigo-600">Sekilas Tentang</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Mama Parfum</p>
                <p class="mt-6 text-lg leading-8 text-gray-600">Eau De Parfum yang di produksi oleh CV. Keluarga Cemara Sukses, berpusat di Lubuk Pakam, Deli Serdang Sumatera Utara. Mama Parfum berdiri pada 22 Desember 2019 tepat pada hari ibu, memiliki historis panjang dilambang dengan Merek, logo, maskot, Slogan, Jingle, tampilan visual.</p>
                <dl class="mt-10 max-w-xl space-y-8 text-base leading-7 text-gray-600 lg:max-w-none">
                  <div class="relative pl-9">
                    <dt class="inline font-semibold text-gray-900">
                        <svg class="absolute top-1 left-1 h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                        </svg>
                      Kualitas Menjadi Prioritas.
                    </dt>
                    <dd class="inline">
                        Dibuat dengan konsentrat import asli Eropa dan Alkohol Khusus Parfum.
                        Wanginya soft, sangat enak dan tidak menyengat.
                        Tahan lama. Tidak mengandung zat-zat berbahaya.
                        Tidak berbekas noda di baju.
                        Tidak lengket, tidak panas di kulit, tidak gatal, tidak bikin kulit iritasi.
                        Harga terjangkau.

                    </dd>
                  </div>

                  <div class="relative pl-9">
                    <dt class="inline font-semibold text-gray-900">
                        <svg class="absolute top-1 left-1 h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M10.5 3.798v5.02a3 3 0 01-.879 2.121l-2.377 2.377a9.845 9.845 0 015.091 1.013 8.315 8.315 0 005.713.636l.285-.071-3.954-3.955a3 3 0 01-.879-2.121v-5.02a23.614 23.614 0 00-3 0zm4.5.138a.75.75 0 00.093-1.495A24.837 24.837 0 0012 2.25a25.048 25.048 0 00-3.093.191A.75.75 0 009 3.936v4.882a1.5 1.5 0 01-.44 1.06l-6.293 6.294c-1.62 1.621-.903 4.475 1.471 4.88 2.686.46 5.447.698 8.262.698 2.816 0 5.576-.239 8.262-.697 2.373-.406 3.092-3.26 1.47-4.881L15.44 9.879A1.5 1.5 0 0115 8.818V3.936z" clip-rule="evenodd" />
                        </svg>
                      Aroma Selembut Kasih Sayang Mama.
                    </dt>
                    <dd class="inline">terinspirasi oleh kasih sayang, kehangatan, serta kepedulian ibu atau biasa disebutMama memiliki ciri khas serta membekas disetiap kita, setiap orang pasti punya cerita yang berbeda dan rasa rindu luar biasa terhadap ibu.</dd>
                  </div>

                  <div class="relative pl-9">
                    <dt class="inline font-semibold text-gray-900">
                        <svg class="absolute top-1 left-1 h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path d="M7.493 18.75c-.425 0-.82-.236-.975-.632A7.48 7.48 0 016 15.375c0-1.75.599-3.358 1.602-4.634.151-.192.373-.309.6-.397.473-.183.89-.514 1.212-.924a9.042 9.042 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75 2.25 2.25 0 012.25 2.25c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H14.23c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23h-.777zM2.331 10.977a11.969 11.969 0 00-.831 4.398 12 12 0 00.52 3.507c.26.85 1.084 1.368 1.973 1.368H4.9c.445 0 .72-.498.523-.898a8.963 8.963 0 01-.924-3.977c0-1.708.476-3.305 1.302-4.666.245-.403-.028-.959-.5-.959H4.25c-.832 0-1.612.453-1.918 1.227z" />
                        </svg>
                      Sukses Jaya Amin
                    </dt>
                    <dd class="inline">adalah harapan dan doa setiap ibu ke anaknya, tidak lupa bermanfaat bagi keluarga, masyarakat, negara, serta agama.</dd>
                  </div>
                </dl>
              </div>
            </div>
            <img src="{{ asset('parfum.jpg') }}" alt="Product screenshot" class="w-[48rem] max-w-none rounded-xl shadow-xl ring-1 ring-gray-400/10 sm:w-[57rem] md:-ml-4 lg:-ml-0" width="2432" height="1442">
            {{-- <img src="https://tailwindui.com/img/component-images/dark-project-app-screenshot.png" alt="Product screenshot" class="w-[48rem] max-w-none rounded-xl shadow-xl ring-1 ring-gray-400/10 sm:w-[57rem] md:-ml-4 lg:-ml-0" width="2432" height="1442"> --}}
          </div>
        </div>
    </div>
    {{-- End Feature --}}

    {{-- Partner --}}
      <div class="bg-white py-16 mb-8 drop-shadow-sm">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <h2 class="text-center text-xl font-semibold leading-8 text-gray-900">Mama Parfum Telah Mendapat Izin Lengkap</h2>
          <dl class="grid grid-cols-2 gap-x-8 gap-y-8 text-center mt-8 lg:grid-cols-5">

            <div class="mx-auto flex max-w-xs flex-col gap-y-4 shadow-lg p-4 rounded-lg hover:shadow-xl">
              <dt class="text-base leading-7 text-indigo-600">NA18220601449</dt>
              <dd class="order-first tracking-tight font-light f-f-l sm:text-lg">BPOM</dd>
            </div>
            <div class="mx-auto flex max-w-xs flex-col gap-y-4 shadow-lg p-4 rounded-lg hover:shadow-xl">
              <dt class="text-base leading-7 text-indigo-600">0285010002724</dt>
              <dd class="order-first tracking-tight font-light f-f-l sm:text-lg">NOMOR INDUK BERUSAHA</dd>
            </div>
            <div class="mx-auto flex max-w-xs flex-col gap-y-4 shadow-lg p-4 rounded-lg hover:shadow-xl">
              {{-- <dt class="text-base leading-7 text-gray-600"></dt> --}}
              <dd class="tracking-tight font-light f-f-l py-4 sm:text-lg">SURAT IZIN USAHA PERDAGANGAN</dd>
            </div>
            <div class="mx-auto flex max-w-xs flex-col gap-y-4 shadow-lg p-4 rounded-lg hover:shadow-xl">
              {{-- <dt class="text-base leading-7 text-gray-600"></dt> --}}
              <dd class="tracking-tight font-light f-f-l py-8 sm:text-lg">IZIN USAHA INDUSTRI</dd>
            </div>
            <div class="mx-auto flex max-w-xs flex-col gap-y-4 shadow-lg p-4 rounded-lg hover:shadow-xl">
              {{-- <dt class="text-base leading-7 text-gray-600"></dt> --}}
              <dd class="tracking-tight font-light f-f-l  py-8 sm:text-lg">PENDAFTARAN MEREK</dd>
            </div>

          </dl>
        </div>
      </div>
    {{-- Partner --}}

    {{-- Team --}}
    <div class="bg-white py-16 sm:py-16 drop-shadow-sm" id="us">
        <div class="mx-auto grid max-w-7xl gap-y-20 gap-x-8 px-6 lg:px-8 xl:grid-cols-3">
          <div class="max-w-2xl">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Orang - Orang Hebat Dibalik Mama Parfum Kami</h2>
            <p class="mt-6 text-lg leading-8 text-gray-600">Libero fames augue nisl porttitor nisi, quis. Id ac elit odio vitae elementum enim vitae ullamcorper suspendisse.</p>
          </div>
          <ul role="list" class="grid gap-x-8 gap-y-12 sm:grid-cols-2 sm:gap-y-16 xl:col-span-2">
            <li>
              <div class="flex items-center gap-x-6">
                <img class="h-16 w-16 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                <div>
                  <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Leslie Alexander</h3>
                  <p class="text-sm font-semibold leading-6 text-indigo-600">Co-Founder / CEO</p>
                </div>
              </div>
            </li>
            <li>
              <div class="flex items-center gap-x-6">
                <img class="h-16 w-16 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                <div>
                  <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Leslie Alexander</h3>
                  <p class="text-sm font-semibold leading-6 text-indigo-600">Co-Founder / CEO</p>
                </div>
              </div>
            </li>
            <li>
              <div class="flex items-center gap-x-6">
                <img class="h-16 w-16 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                <div>
                  <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Leslie Alexander</h3>
                  <p class="text-sm font-semibold leading-6 text-indigo-600">Co-Founder / CEO</p>
                </div>
              </div>
            </li>
            <li>
              <div class="flex items-center gap-x-6">
                <img class="h-16 w-16 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                <div>
                  <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Leslie Alexander</h3>
                  <p class="text-sm font-semibold leading-6 text-indigo-600">Co-Founder / CEO</p>
                </div>
              </div>
            </li>
            <li>
              <div class="flex items-center gap-x-6">
                <img class="h-16 w-16 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                <div>
                  <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Leslie Alexander</h3>
                  <p class="text-sm font-semibold leading-6 text-indigo-600">Co-Founder / CEO</p>
                </div>
              </div>
            </li>
            <li>
              <div class="flex items-center gap-x-6">
                <img class="h-16 w-16 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                <div>
                  <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Leslie Alexander</h3>
                  <p class="text-sm font-semibold leading-6 text-indigo-600">Co-Founder / CEO</p>
                </div>
              </div>
            </li>

            <!-- More people... -->
          </ul>
        </div>
    </div>
    {{-- End Team --}}

    {{-- Business --}}
    <div class="bg-white py-12 sm:py-12" id="business">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto max-w-2xl lg:text-center">
            <h2 class="text-base font-semibold leading-7 text-indigo-600">Ayo Bergabung</h2>
            <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Berbisnis Anti Rugi</p>
            <p class="mt-6 text-lg leading-8 text-gray-600">Quis tellus eget adipiscing convallis sit sit eget aliquet quis. Suspendisse eget egestas a elementum pulvinar et feugiat blandit at. In mi viverra elit nunc.</p>
          </div>
        </div>
    </div>

    <div class="relative isolate overflow-hidden bg-gray-900 py-16 sm:py-16 lg:py-16">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto grid max-w-2xl grid-cols-1 gap-y-16 gap-x-8 lg:max-w-none lg:grid-cols-2">
                <div class="max-w-xl lg:max-w-lg">
                <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Gabung Menjadi Reseller</h2>
                <p class="mt-4 text-lg leading-8 text-gray-300">Nostrud amet eu ullamco nisi aute in ad minim nostrud adipisicing velit quis. Duis tempor incididunt dolore.</p>
                <div class="mt-10 flex items-center justify-center gap-x-6 lg:justify-start">
                    <a href="{{ route('register') }}" class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Daftar Sekarang</a>
                    <a href="{{ url('/join-reseller') }}" class="text-sm font-semibold leading-6 text-white">Lebih Lanjut <span aria-hidden="true">→</span></a>
                </div>
                </div>
                <dl class="grid grid-cols-1 gap-x-8 gap-y-10 sm:grid-cols-2 lg:pt-2">
                    <div class="flex flex-col items-start">
                        <div class="rounded-md bg-white/5 p-2 ring-1 ring-white/10">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                        </svg>
                        </div>
                        <dt class="mt-4 font-semibold text-white">Weekly articles</dt>
                        <dd class="mt-2 leading-7 text-gray-400">Non laboris consequat cupidatat laborum magna. Eiusmod non irure cupidatat duis commodo amet.</dd>
                    </div>
                    <div class="flex flex-col items-start">
                        <div class="rounded-md bg-white/5 p-2 ring-1 ring-white/10">
                        <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.05 4.575a1.575 1.575 0 10-3.15 0v3m3.15-3v-1.5a1.575 1.575 0 013.15 0v1.5m-3.15 0l.075 5.925m3.075.75V4.575m0 0a1.575 1.575 0 013.15 0V15M6.9 7.575a1.575 1.575 0 10-3.15 0v8.175a6.75 6.75 0 006.75 6.75h2.018a5.25 5.25 0 003.712-1.538l1.732-1.732a5.25 5.25 0 001.538-3.712l.003-2.024a.668.668 0 01.198-.471 1.575 1.575 0 10-2.228-2.228 3.818 3.818 0 00-1.12 2.687M6.9 7.575V12m6.27 4.318A4.49 4.49 0 0116.35 15m.002 0h-.002" />
                        </svg>
                        </div>
                        <dt class="mt-4 font-semibold text-white">No spam</dt>
                        <dd class="mt-2 leading-7 text-gray-400">Officia excepteur ullamco ut sint duis proident non adipisicing. Voluptate incididunt anim.</dd>
                    </div>
                </dl>
            </div>
            <dl class="mt-16 grid grid-cols-1 gap-8 sm:mt-20 sm:grid-cols-2 lg:grid-cols-4">
                <div class="flex flex-col-reverse">
                <dt class="text-base leading-7 text-gray-300">Offices worldwide</dt>
                <dd class="text-2xl font-bold leading-9 tracking-tight text-white">12</dd>
                </div>

                <div class="flex flex-col-reverse">
                <dt class="text-base leading-7 text-gray-300">Full-time colleagues</dt>
                <dd class="text-2xl font-bold leading-9 tracking-tight text-white">300+</dd>
                </div>

                <div class="flex flex-col-reverse">
                <dt class="text-base leading-7 text-gray-300">Hours per week</dt>
                <dd class="text-2xl font-bold leading-9 tracking-tight text-white">40</dd>
                </div>

                <div class="flex flex-col-reverse">
                <dt class="text-base leading-7 text-gray-300">Paid time off</dt>
                <dd class="text-2xl font-bold leading-9 tracking-tight text-white">Unlimited</dd>
                </div>
            </dl>
        </div>
        <svg class="absolute top-0 left-1/2 -z-10 h-[42.375rem] -translate-x-1/2 blur-3xl xl:-top-6" viewBox="0 0 1155 678" fill="none">
        <path fill="url(#09dbde42-e95c-4b47-a4d6-0c523c2fca9a)" fill-opacity=".3" d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z" />
        <defs>
            <linearGradient id="09dbde42-e95c-4b47-a4d6-0c523c2fca9a" x1="1155.49" x2="-78.208" y1=".177" y2="474.645" gradientUnits="userSpaceOnUse">
            <stop stop-color="#9089FC" />
            <stop offset="1" stop-color="#FF80B5" />
            </linearGradient>
        </defs>
        </svg>
    </div>
    {{-- Business --}}

    {{-- Testimonials --}}
    <section class="relative isolate overflow-hidden bg-white py-16 px-6 sm:py-16 lg:px-8 drop-shadow-md">
        <div class="absolute inset-0 -z-10 bg-[radial-gradient(45rem_50rem_at_top,theme(colors.indigo.100),white)] opacity-20"></div>
        <div class="absolute inset-y-0 right-1/2 -z-10 mr-16 w-[200%] origin-bottom-left skew-x-[-30deg] bg-white shadow-xl shadow-indigo-600/10 ring-1 ring-indigo-50 sm:mr-28 lg:mr-0 xl:mr-16 xl:origin-center"></div>
        <div class="mx-auto max-w-2xl lg:max-w-4xl">
          <figure class="mt-10">
            <blockquote class="text-center text-xl font-semibold leading-8 text-gray-900 sm:text-2xl sm:leading-9">
              <p>“Kata Kata Tentang Bisnis Reseller Mama Parfum Oleh Owner. Nemo expedita voluptas culpa sapiente alias molestiae. Numquam corrupti in laborum sed rerum et corporis.”</p>
            </blockquote>
            <figcaption class="mt-10">
              <img class="mx-auto h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
              <div class="mt-4 flex items-center justify-center space-x-3 text-base">
                <div class="font-semibold text-gray-900">Judith Black</div>
                <svg viewBox="0 0 2 2" width="3" height="3" aria-hidden="true" class="fill-gray-900">
                  <circle cx="1" cy="1" r="1" />
                </svg>
                <div class="text-gray-600">CEO of Workcation</div>
              </div>
            </figcaption>
          </figure>
        </div>
    </section>
    {{-- End Testimonials --}}

    {{-- Faq --}}
    <div class="2xl:container 2xl:mx-auto md:py-12 lg:px-20 md:px-6 py-9 px-4 border-t border-gray-100 shadow-lg mt-12" id="faq">
        <div class="flex md:flex-row flex-col md:space-x-8 md:mt-16 mt-8">
          <div class="md:w-5/12 lg:w-4/12 w-full">
            <h2 class="font-semibold lg:text-4xl text-3xl lg:leading-9 md:leading-7 leading-9 text-gray-800">
                FAQ's
            </h2>
            <div class="mt-4 flex md:justify-between md:items-start md:flex-row flex-col justify-start items-start">
                <div class="">
                  <p class="font-normal text-base leading-6 text-gray-600 lg:w-8/12 md:w-9/12">
                    Ini adalah beberapa pertanyaan yang sering diajukan oleh pelanggan kami
                  </p>
                </div>
              </div>
          </div>
          <div class="md:w-7/12 lg:w-8/12 w-full md:mt-0 sm:mt-14 mt-10">

            <div x-data="{selected:1}">
                <!-- Shipping Section -->
                <div class="py-4">
                    <div class="flex justify-between items-center">
                        <h3 class="font-semibold text-xl leading-5 text-gray-800"> Bagaimana cara membeli parfum dari mama parfum ? </h3>
                        <button

                        x-show="selected != 1"
                        @click="selected !== 1 ? selected = 1 : selected = null"
                        aria-label="too" class="text-gray-800 cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        </button>

                        <button

                        x-show="selected == 1"
                        @click="selected = null"
                        aria-label="too" class="text-gray-800 cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                        </button>

                    </div>

                    <div
                     class="relative overflow-hidden transition-all max-h-0 duration-700"
                        style="" x-ref="container1"
                        x-bind:style="selected == 1 ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''">
                            <p id="para1" class="font-normal text-base leading-6 text-gray-600 mt-4 w-11/12">
                                We are covering every major country worldwide. The shipment leaves
                                from US as it is our headquarter. Some extra information you
                                probably need to add here so that the customer is clear of their
                                wanted expectations.
                            </p>
                    </div>

                </div>

                <div class="py-4">
                    <div class="flex justify-between items-center">
                        <h3 class="font-semibold text-xl leading-5 text-gray-800"> Bagaimana cara menjadi reseller mama parfum ? </h3>
                        <button

                        x-show="selected != 2"
                        @click="selected !== 2 ? selected = 2 : selected = null"
                        aria-label="too" class="text-gray-800 cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        </button>

                        <button

                        x-show="selected == 2"
                        @click="selected = null"
                        aria-label="too" class="text-gray-800 cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                        </button>

                    </div>

                    <div class="relative overflow-hidden transition-all max-h-0 duration-700"
                        style="" x-ref="container2"
                        x-bind:style="selected == 2 ? 'max-height: ' + $refs.container2.scrollHeight + 'px' : ''">
                            <p id="para1" class="font-normal text-base leading-6 text-gray-600 mt-4 w-11/12">
                                We are covering every major country worldwide. The shipment leaves
                                from US as it is our headquarter. Some extra information you
                                probably need to add here so that the customer is clear of their
                                wanted expectations.
                            </p>
                    </div>

                </div>

                <div class="py-4">
                <div class="flex justify-between items-center">
                    <h3 class="font-semibold text-xl leading-5 text-gray-800"> Apa yang dimaksud binis anti rugi mama parfum ? </h3>
                    <button

                    x-show="selected != 3"
                    @click="selected !== 3 ? selected = 3 : selected = null"
                    aria-label="too" class="text-gray-800 cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                    </button>

                    <button

                        x-show="selected == 3"
                        @click="selected = null"
                        aria-label="too" class="text-gray-800 cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                        </button>

                </div>

                    <div class="relative overflow-hidden transition-all max-h-0 duration-700"
                        style="" x-ref="container3"
                        x-bind:style="selected == 3 ? 'max-height: ' + $refs.container3.scrollHeight + 'px' : ''">
                            <p id="para1" class="font-normal text-base leading-6 text-gray-600 mt-4 w-11/12">
                                We are covering every major country worldwide. The shipment leaves
                                from US as it is our headquarter. Some extra information you
                                probably need to add here so that the customer is clear of their
                                wanted expectations.
                            </p>
                    </div>

                </div>

            </div>



            <hr class="my-7 bg-gray-200" />
          </div>
        </div>
    </div>
    {{-- End Faq --}}

    @include('layouts.footer')

@endsection
