{{-- Navbar --}}
<header class="bg-white">
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
        <a href="{{ url('/') }}" class="text-sm font-semibold leading-6 text-gray-900">Home</a>
        <a href="{{ url('/product') }}" class="text-sm font-semibold leading-6 text-gray-900">Produk</a>
        <a href="{{ url('join-reseller') }}" class="text-sm font-semibold leading-6 text-gray-900">Reseller</a>
        <a href="{{ url('/about-us') }}" class="text-sm font-semibold leading-6 text-gray-900" >About Us</a>
        <a href="{{ url('/blog') }}" class="text-sm font-semibold leading-6 text-gray-900">Blog & Activity</a>
    </div>
    <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        @if (Route::has('login'))
            @auth
                @if (Auth::user()->hasRole('admin'))
                <a href="{{ url('/dashboard') }}" class="text-sm font-semibold leading-6 text-gray-900">Dashboard <span aria-hidden="true">&rarr;</span></a>
                @elseif (Auth::user()->hasRole('reseller'))
                <a href="{{ url('/dashboard-reseller') }}" class="text-sm font-semibold leading-6 text-gray-900">Dashboard <span aria-hidden="true">&rarr;</span></a>
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
