@extends('layouts.main')
@section('content')
    {{-- Navbar --}}
    <header class="absolute inset-x-0 top-0 z-50">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="{{ url('/') }}" class="-m-1.5 p-1.5">
            <span class="sr-only">Your Company</span>
            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
            </a>
        </div>
        <div class="flex lg:hidden">
            <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
            <span class="sr-only">Open main menu</span>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <a href="{{ url('/') }}" class="text-sm font-semibold leading-6 text-gray-200">Home</a>
            <a href="{{ url('/product') }}" class="text-sm font-semibold leading-6 text-gray-200">Produk</a>
            <a href="{{ url('join-reseller') }}" class="text-sm font-semibold leading-6 text-gray-200">Reseller</a>
            <a href="{{ url('/about-us') }}" class="text-sm font-semibold leading-6 text-gray-200" >About Us</a>
            <a href="{{ url('/blog') }}" class="text-sm font-semibold leading-6 text-gray-200">Blog & Activity</a>
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
        <!-- Mobile menu, show/hide based on menu open state. -->
        {{-- <div class="lg:hidden" role="dialog" aria-modal="true">
        <!-- Background backdrop, show/hide based on slide-over state. -->
        <div class="fixed inset-0 z-10"></div>
        <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between">
            <a href="#" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
            </a>
            <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Close menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            </div>
            <div class="mt-6 flow-root">
            <div class="-my-6 divide-y divide-gray-500/10">
                <div class="space-y-2 py-6">
                <div class="-mx-3">
                    <button type="button" class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 hover:bg-gray-50" aria-controls="disclosure-1" aria-expanded="false">
                    Product
                    <!--
                        Expand/collapse icon, toggle classes based on menu open state.

                        Open: "rotate-180", Closed: ""
                    -->
                    <svg class="h-5 w-5 flex-none" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                    </svg>
                    </button>
                    <!-- 'Product' sub-menu, show/hide based on menu state. -->
                    <div class="mt-2 space-y-2" id="disclosure-1">
                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Analytics</a>

                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Engagement</a>

                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Security</a>

                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Integrations</a>

                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Automations</a>

                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Watch demo</a>

                    <a href="#" class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50">Contact sales</a>
                    </div>
                </div>
                <a href="#" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Features</a>
                <a href="#" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Marketplace</a>
                <a href="#" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Company</a>
                </div>
                <div class="py-6">
                <a href="#" class="-mx-3 block rounded-lg py-2.5 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log in</a>
                </div>
            </div>
            </div>
        </div>
        </div> --}}
    </header>
    {{-- End Navbar --}}

    {{-- Header --}}
    <div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-32">
        <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&crop=focalpoint&fp-y=.8&w=2830&h=1500&q=80&blend=111827&sat=-100&exp=15&blend-mode=multiply" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center">
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
            <p class="mt-6 text-lg leading-8 text-gray-300">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>
            </div>
            <div class="mx-auto mt-10 max-w-2xl lg:mx-0 lg:max-w-none">
            <div class="grid grid-cols-1 gap-y-6 gap-x-8 text-base font-semibold leading-7 text-white sm:grid-cols-2 md:flex lg:gap-x-10">
                <a href="#">Open roles <span aria-hidden="true">&rarr;</span></a>

                <a href="#">Internship program <span aria-hidden="true">&rarr;</span></a>

                <a href="#">Our values <span aria-hidden="true">&rarr;</span></a>

                <a href="#">Meet our leadership <span aria-hidden="true">&rarr;</span></a>
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
        </div>
    </div>
    {{-- End Header --}}

    {{-- Feature --}}
    <div class="overflow-hidden bg-white py-12 sm:py-12 drop-shadow-lg hover:drop-shadow-xl">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto grid max-w-2xl grid-cols-1 gap-y-16 gap-x-8 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2">
            <div class="lg:pr-8 lg:pt-4">
              <div class="lg:max-w-lg">
                <h2 class="text-base font-semibold leading-7 text-indigo-600">Sekilas Tentang</h2>
                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Mama Parfum</p>
                <p class="mt-6 text-lg leading-8 text-gray-600">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.</p>
                <dl class="mt-10 max-w-xl space-y-8 text-base leading-7 text-gray-600 lg:max-w-none">
                  <div class="relative pl-9">
                    <dt class="inline font-semibold text-gray-900">
                      <svg class="absolute top-1 left-1 h-5 w-5 text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.5 17a4.5 4.5 0 01-1.44-8.765 4.5 4.5 0 018.302-3.046 3.5 3.5 0 014.504 4.272A4 4 0 0115 17H5.5zm3.75-2.75a.75.75 0 001.5 0V9.66l1.95 2.1a.75.75 0 101.1-1.02l-3.25-3.5a.75.75 0 00-1.1 0l-3.25 3.5a.75.75 0 101.1 1.02l1.95-2.1v4.59z" clip-rule="evenodd" />
                      </svg>
                      Push to deploy.
                    </dt>
                    <dd class="inline">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.</dd>
                  </div>

                  <div class="relative pl-9">
                    <dt class="inline font-semibold text-gray-900">
                      <svg class="absolute top-1 left-1 h-5 w-5 text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                      </svg>
                      SSL certificates.
                    </dt>
                    <dd class="inline">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo.</dd>
                  </div>

                  <div class="relative pl-9">
                    <dt class="inline font-semibold text-gray-900">
                      <svg class="absolute top-1 left-1 h-5 w-5 text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M4.632 3.533A2 2 0 016.577 2h6.846a2 2 0 011.945 1.533l1.976 8.234A3.489 3.489 0 0016 11.5H4c-.476 0-.93.095-1.344.267l1.976-8.234z" />
                        <path fill-rule="evenodd" d="M4 13a2 2 0 100 4h12a2 2 0 100-4H4zm11.24 2a.75.75 0 01.75-.75H16a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75h-.01a.75.75 0 01-.75-.75V15zm-2.25-.75a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75H13a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75h-.01z" clip-rule="evenodd" />
                      </svg>
                      Database backups.
                    </dt>
                    <dd class="inline">Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.</dd>
                  </div>
                </dl>
              </div>
            </div>
            <img src="https://tailwindui.com/img/component-images/dark-project-app-screenshot.png" alt="Product screenshot" class="w-[48rem] max-w-none rounded-xl shadow-xl ring-1 ring-gray-400/10 sm:w-[57rem] md:-ml-4 lg:-ml-0" width="2432" height="1442">
          </div>
        </div>
    </div>
    {{-- End Feature --}}

    {{-- Partner --}}
    <div class="bg-white py-16 sm:py-16 drop-shadow-lg">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <h2 class="text-center text-lg font-semibold leading-8 text-gray-900">Mama Parfum Telah Terafiliasi Dengan</h2>
          <div class="mx-auto mt-10 grid max-w-lg grid-cols-4 items-center gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-6 sm:gap-x-10 lg:mx-0 lg:max-w-none lg:grid-cols-5">
            <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1" src="https://tailwindui.com/img/logos/158x48/transistor-logo-gray-900.svg" alt="Transistor" width="158" height="48">
            <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1" src="https://tailwindui.com/img/logos/158x48/reform-logo-gray-900.svg" alt="Reform" width="158" height="48">
            <img class="col-span-2 max-h-12 w-full object-contain lg:col-span-1" src="https://tailwindui.com/img/logos/158x48/tuple-logo-gray-900.svg" alt="Tuple" width="158" height="48">
            <img class="col-span-2 max-h-12 w-full object-contain sm:col-start-2 lg:col-span-1" src="https://tailwindui.com/img/logos/158x48/savvycal-logo-gray-900.svg" alt="SavvyCal" width="158" height="48">
            <img class="col-span-2 col-start-2 max-h-12 w-full object-contain sm:col-start-auto lg:col-span-1" src="https://tailwindui.com/img/logos/158x48/statamic-logo-gray-900.svg" alt="Statamic" width="158" height="48">
          </div>
        </div>
      </div>

    {{-- Partner --}}

    {{-- Team --}}
    <div class="bg-white py-16 sm:py-16 drop-shadow-sm">
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
    <div class="bg-white py-12 sm:py-12">
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
                    <a href="#" class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Get started</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-white">Learn more <span aria-hidden="true">→</span></a>
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

    {{-- Stats --}}
    {{-- <div class="bg-white py-12 sm:py-12">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <dl class="grid grid-cols-1 gap-y-16 gap-x-8 text-center lg:grid-cols-3">
            <div class="mx-auto flex max-w-xs flex-col gap-y-4">
              <dt class="text-base leading-7 text-gray-600">Transactions every 24 hours</dt>
              <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">44 million</dd>
            </div>

            <div class="mx-auto flex max-w-xs flex-col gap-y-4">
              <dt class="text-base leading-7 text-gray-600">Assets under holding</dt>
              <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">$119 trillion</dd>
            </div>

            <div class="mx-auto flex max-w-xs flex-col gap-y-4">
              <dt class="text-base leading-7 text-gray-600">New users annually</dt>
              <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl">46,000</dd>
            </div>
          </dl>
        </div>
    </div> --}}
    {{-- End Stats --}}

    {{-- Testimonials --}}
    <section class="relative isolate overflow-hidden bg-white py-16 px-6 sm:py-16 lg:px-8 drop-shadow-md">
        <div class="absolute inset-0 -z-10 bg-[radial-gradient(45rem_50rem_at_top,theme(colors.indigo.100),white)] opacity-20"></div>
        <div class="absolute inset-y-0 right-1/2 -z-10 mr-16 w-[200%] origin-bottom-left skew-x-[-30deg] bg-white shadow-xl shadow-indigo-600/10 ring-1 ring-indigo-50 sm:mr-28 lg:mr-0 xl:mr-16 xl:origin-center"></div>
        <div class="mx-auto max-w-2xl lg:max-w-4xl">
          <figure class="mt-10">
            <blockquote class="text-center text-xl font-semibold leading-8 text-gray-900 sm:text-2xl sm:leading-9">
              <p>“Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo expedita voluptas culpa sapiente alias molestiae. Numquam corrupti in laborum sed rerum et corporis.”</p>
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

    <div class="2xl:container 2xl:mx-auto md:py-12 lg:px-20 md:px-6 py-9 px-4 border-t border-gray-100 shadow-lg mt-12">
        <div class="flex md:flex-row flex-col md:space-x-8 md:mt-16 mt-8">
          <div class="md:w-5/12 lg:w-4/12 w-full">
            <h2 class="font-semibold lg:text-4xl text-3xl lg:leading-9 md:leading-7 leading-9 text-gray-800">
                FAQ's
            </h2>
            <div class="mt-4 flex md:justify-between md:items-start md:flex-row flex-col justify-start items-start">
                <div class="">
                  <p
                    class="font-normal text-base leading-6 text-gray-600 lg:w-8/12 md:w-9/12"
                  >
                    Here are few of the most frequently asked questions by our valueable
                    customers
                  </p>
                </div>
              </div>
          </div>
          <div class="md:w-7/12 lg:w-8/12 w-full md:mt-0 sm:mt-14 mt-10">

            <!-- Shipping Section -->
            <div class="py-2">
              <div class="flex justify-between items-center cursor-pointer">
                <h3
                  class="font-semibold text-xl leading-5 text-gray-800"
                >
                  Shipping
                </h3>
                <button
                  aria-label="too"
                  class="text-gray-800 cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800"
                  onclick="openAnsSection(1)"
                >
                  <svg
                    width="20"
                    height="20"
                    viewBox="0 0 20 20"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      id="path1"
                      class=""
                      d="M10 4.1665V15.8332"
                      stroke="currentColor"
                      stroke-width="1.25"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M4.16602 10H15.8327"
                      stroke="currentColor"
                      stroke-width="1.25"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                </button>
              </div>
              <p
                id="para1"
                class="font-normal text-base leading-6 text-gray-600 mt-4 w-11/12"
              >
                We are covering every major country worldwide. The shipment leaves
                from US as it is our headquarter. Some extra information you
                probably need to add here so that the customer is clear of their
                wanted expectations.
              </p>
            </div>

            <div class="py-2  mt-2">
              <div class="flex justify-between items-center cursor-pointer">
                <h3
                  class="font-semibold text-xl leading-5 text-gray-800"
                >
                  Shipping
                </h3>
                <button
                  aria-label="too"
                  class="text-gray-800 cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800"
                  onclick="openAnsSection(1)"
                >
                  <svg
                    width="20"
                    height="20"
                    viewBox="0 0 20 20"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      id="path1"
                      class=""
                      d="M10 4.1665V15.8332"
                      stroke="currentColor"
                      stroke-width="1.25"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M4.16602 10H15.8327"
                      stroke="currentColor"
                      stroke-width="1.25"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                </button>
              </div>
              <p
                id="para1"
                class="font-normal text-base leading-6 text-gray-600 mt-4 w-11/12"
              >
                We are covering every major country worldwide. The shipment leaves
                from US as it is our headquarter. Some extra information you
                probably need to add here so that the customer is clear of their
                wanted expectations.
              </p>
            </div>

            <div class="py-2 mt-2">
              <div class="flex justify-between items-center cursor-pointer">
                <h3
                  class="font-semibold text-xl leading-5 text-gray-800"
                >
                  Shipping
                </h3>
                <button
                  aria-label="too"
                  class="text-gray-800 cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800"
                  onclick="openAnsSection(1)"
                >
                  <svg
                    width="20"
                    height="20"
                    viewBox="0 0 20 20"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      id="path1"
                      class=""
                      d="M10 4.1665V15.8332"
                      stroke="currentColor"
                      stroke-width="1.25"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path
                      d="M4.16602 10H15.8327"
                      stroke="currentColor"
                      stroke-width="1.25"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                </button>
              </div>
              <p
                id="para1"
                class="font-normal text-base leading-6 text-gray-600 mt-4 w-11/12"
              >
                We are covering every major country worldwide. The shipment leaves
                from US as it is our headquarter. Some extra information you
                probably need to add here so that the customer is clear of their
                wanted expectations.
              </p>
            </div>

            <hr class="my-7 bg-gray-200" />
          </div>
        </div>
      </div>



    {{-- End Faq --}}

    @include('layouts.footer')

@endsection
