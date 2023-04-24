<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Mama Parfum') }}</title>

        <!-- Fonts -->
        {{-- <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap"> --}}
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles()
        @stack('styles')
    </head>
    <body class="font-sans antialiased">
        <nav class="fixed top-0 z-50 w-full bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-slate-900 via-black to-slate-900">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
              <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                  <button data-drawer-target="logo-sidebar-dashboard" data-drawer-toggle="logo-sidebar-dashboard" aria-controls="logo-sidebar-dashboard" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 ">
                      <span class="sr-only">Open sidebar</span>
                      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                         <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                      </svg>
                   </button>
                  <a href="/" class="flex ml-2 md:mr-24">
                    <img src="{{ asset('logo.png') }}" class="h-8 mr-3" alt="FlowBite Logo" />
                    <span class="self-center lg:text-xl sm:text-md font-semibold sm:text-2xl whitespace-nowrap text-white">Mama Parfum</span>
                  </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center lg:mr-5">
                      <div class="p-0.5">
                        <button type="button" class="flex text-sm" aria-expanded="false" data-dropdown-toggle="dropdown-user" data-dropdown-offset-distance="-50" data-dropdown-offset-skidding="100" data-dropdown-placement="left">
                          <span class="text-white text-base font-light leading-normal">Setting</span>
                          <svg class="w-5 h-5 text-white ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                          </svg>

                          {{-- <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo"> --}}
                        </button>
                      </div>
                      <div class="z-50 hidden my-4 mr-5 text-base list-none bg-gray-50 divide-y divide-gray-100 rounded shadow-lg" id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                          <p class="text-sm font-medium text-gray-900 truncate" role="none">
                            {{ auth()->user()->email  }}
                          </p>
                        </div>
                        <ul class="py-1" role="none">
                          <li>
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Profile</a>
                          </li>
                          <li class="justify-start">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block px-4 py-2 w-full text-sm text-start text-gray-700 hover:bg-gray-100" role="menuitem">Sign out</button>
                            </form>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
        </nav>

        <aside id="logo-sidebar-dashboard" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-1 shadow-md sm:translate-x-0" aria-label="Sidebar">
            <div class="h-full px-3 pb-4 overflow-y-auto bg-gray-50">
            @if(Auth::user()->hasRole('admin'))
            <ul class="space-y-4 font-normal">
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center p-2  rounded-lg hover:pl-3 hover:border-l hover:border-black text-base font-light leading-2 tracking-wide {{ request()->routeIs('dashboard') ? 'text-white bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-gray-700 via-gray-900 to-black' : 'text-slate-700' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                          </svg>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}" class="flex items-center p-2 rounded-lg hover:pl-3 hover:border-l hover:border-black text-base font-light leading-2 tracking-wide {{ request()->routeIs('products.*') ? 'text-white bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-gray-700 via-gray-900 to-black' : 'text-slate-700' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                          </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Produk</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('users.index') }}" class="flex items-center p-2 rounded-lg hover:pl-3 hover:border-l hover:border-black text-base font-light leading-2 tracking-wide {{ request()->routeIs('users.*') ? 'text-white bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-gray-700 via-gray-900 to-black' : 'text-slate-700' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Dropshippers</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.index') }}" class="flex items-center p-2 rounded-lg hover:pl-3 hover:border-l hover:border-black text-base font-light leading-2 tracking-wide {{ request()->routeIs('admin.*') ? 'text-white bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-gray-700 via-gray-900 to-black' : 'text-slate-700' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Admin</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('orders.index') }}" class="flex items-center p-2 rounded-lg hover:pl-3 hover:border-l hover:border-black text-base font-light leading-2 tracking-wide {{ request()->routeIs('orders.*') ? 'text-white bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-gray-700 via-gray-900 to-black' : 'text-slate-700' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Orders</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('payments.index') }}" class="flex items-center p-2 rounded-lg hover:pl-3 hover:border-l hover:border-black text-base font-light leading-2 tracking-wide {{ request()->routeIs('payments.*') ? 'text-white bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-gray-700 via-gray-900 to-black' : 'text-slate-700' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Pembayaran</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('blogs.index') }}" class="flex items-center p-2 rounded-lg hover:pl-3 hover:border-l hover:border-black text-base font-light leading-2 tracking-wide {{ request()->routeIs('blogs.*') ? 'text-white bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-gray-700 via-gray-900 to-black' : 'text-slate-700' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Blog</span>
                    </a>
                </li>
            </ul>
            @elseif(Auth::user()->hasRole('reseller'))
            <ul class="space-y-4 font-normal">
                <li>
                    <a href="{{ route('dashboard-reseller') }}" class="flex items-center p-2 rounded-lg {{ request()->routeIs('dashboard-reseller') ? 'text-white bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-gray-700 via-gray-900 to-black' : 'text-slate-700'}} hover:pl-3 hover:border-l hover:border-black">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                          </svg>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                @if (Auth::user()->hasRole('reseller') && Auth::user()->validated_at != null)
                <li>
                    <a href="{{ route('referral') }}" class="flex items-center p-2 rounded-lg {{ request()->routeIs('referral') ? 'text-white bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-gray-700 via-gray-900 to-black' : 'text-slate-700'}} hover:pl-3 hover:border-l hover:border-black">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Referral</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('sales') }}" class="flex items-center p-2 rounded-lg {{ request()->routeIs('sales') ? 'text-white bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-gray-700 via-gray-900 to-black' : 'text-slate-700'}} hover:pl-3 hover:border-l hover:border-black">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Penjualan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('balance.index') }}" class="flex items-center p-2 rounded-lg {{ request()->routeIs('balance.*') ? 'text-white bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-gray-700 via-gray-900 to-black' : 'text-slate-700'}} hover:pl-3 hover:border-l hover:border-black">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 00-2.25-2.25H15a3 3 0 11-6 0H5.25A2.25 2.25 0 003 12m18 0v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 9m18 0V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v3" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Saldo</span>
                    </a>
                </li>
                @endif

            </ul>
            @endif

            </div>
        </aside>

        <div class="px-4 py-12 sm:ml-64 bg-gray-100">
            {{ $slot }}
        </div>
        @livewireScripts()
        @stack('scripts')
        <script>
            // import { Drawer } from 'flowbite';
            // const $targetEl = document.getElementById('logo-sidebar');

            // // options with default values
            // const options = {
            // backdropClasses: 'bg-gray-100 fixed inset-0 z-30',
            // };
            // const drawer = new Drawer($targetEl, options);
        </script>
    </body>
</html>
