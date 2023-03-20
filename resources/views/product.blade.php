@extends('layouts.main')
@section('content')

    {{-- Navbar --}}
    @include('layouts.navbar')
    {{-- End Navbar --}}

     {{-- Header --}}
     <div class="bg-white mb-4 py-2 sm:py-16 sm:mt-8">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto max-w-2xl lg:text-center">
            <h2 class="text-base font-semibold leading-7 text-indigo-600">Produk</h2>
            <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Cari Tau Tentang Produk Kami</p>
            <p class="mt-6 text-lg leading-8 text-gray-600">Quis tellus eget adipiscing convallis sit sit eget aliquet quis. Suspendisse eget egestas a elementum pulvinar et feugiat blandit at. In mi viverra elit nunc.</p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <a href="#" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get started</a>
                <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Learn more <span aria-hidden="true">→</span></a>
            </div>
          </div>
        </div>
    </div>
    {{-- End Header --}}

    {{-- Product Category --}}
    <div class="bg-gray-900 relative isolate overflow-hidden mx-auto max-w-7xl px-8 lg:px-24 py-8 mt-14 rounded-3xl shadow-md sm:mt-14">
        <svg viewBox="0 0 1024 1024" class="absolute top-1/2 left-1/2 -z-10 h-[64rem] w-[64rem] -translate-y-1/2 [mask-image:radial-gradient(closest-side,white,transparent)] sm:left-full sm:-ml-80 lg:left-1/2 lg:ml-0 lg:translate-y-0 lg:-translate-x-1/2" aria-hidden="true">
            <circle cx="512" cy="512" r="512" fill="url(#759c1415-0410-454c-8f7c-9a820de03641)" fill-opacity="0.7" />
            <defs>
            <radialGradient id="759c1415-0410-454c-8f7c-9a820de03641">
                <stop stop-color="#7775D6" />
                <stop offset="1" stop-color="#E935C1" />
            </radialGradient>
            </defs>
        </svg>
        <div class="mx-auto max-w-2xl sm:text-center py-8">
            <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Pilihan Produk Untuk Semua Kalangan</h2>
            <p class="mt-4 text-lg leading-8 text-gray-300">Distinctio et nulla eum soluta et neque labore quibusdam. Saepe et quasi iusto modi velit ut non voluptas in. Explicabo id ut laborum.</p>
        </div>
        <div class="mx-auto grid max-w-2xl grid-cols-1 gap-y-16 gap-x-8 lg:max-w-none py-6 lg:grid-cols-3">
            <div class="flex flex-col items-start">
                <div class="rounded-md bg-white/5 p-2 ring-1 ring-white/10">
                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                </svg>
                </div>
                <dt class="mt-4 font-semibold text-white">Man's Product</dt>
                <dd class="mt-2 leading-7 text-gray-400">Non laboris consequat cupidatat laborum magna. Eiusmod non irure cupidatat duis commodo amet.</dd>
            </div>
            <div class="flex flex-col items-start">
                <div class="rounded-md bg-white/5 p-2 ring-1 ring-white/10">
                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                </svg>
                </div>
                <dt class="mt-4 font-semibold text-white">Woman's Product</dt>
                <dd class="mt-2 leading-7 text-gray-400">Non laboris consequat cupidatat laborum magna. Eiusmod non irure cupidatat duis commodo amet.</dd>
            </div>
            <div class="flex flex-col items-start">
                <div class="rounded-md bg-white/5 p-2 ring-1 ring-white/10">
                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.05 4.575a1.575 1.575 0 10-3.15 0v3m3.15-3v-1.5a1.575 1.575 0 013.15 0v1.5m-3.15 0l.075 5.925m3.075.75V4.575m0 0a1.575 1.575 0 013.15 0V15M6.9 7.575a1.575 1.575 0 10-3.15 0v8.175a6.75 6.75 0 006.75 6.75h2.018a5.25 5.25 0 003.712-1.538l1.732-1.732a5.25 5.25 0 001.538-3.712l.003-2.024a.668.668 0 01.198-.471 1.575 1.575 0 10-2.228-2.228 3.818 3.818 0 00-1.12 2.687M6.9 7.575V12m6.27 4.318A4.49 4.49 0 0116.35 15m.002 0h-.002" />
                </svg>
                </div>
                <dt class="mt-4 font-semibold text-white">Man & Woman Product</dt>
                <dd class="mt-2 leading-7 text-gray-400">Officia excepteur ullamco ut sint duis proident non adipisicing. Voluptate incididunt anim.</dd>
            </div>
        </div>
    </div>
    {{-- End Product Category --}}

    {{-- Product Type --}}
    <div class="mx-auto max-w-7xl px-6 py-16 sm:py-24 lg:py-16 rounded-3xl ring-1 ring-gray-200 mt-12">
        <div class="pt-10 md:pt-10 lg:px-20">
            <div class="container mx-auto">
                <div class="flex flex-wrap items-center pb-12">
                    <div class="md:w-1/2 lg:w-2/3 w-full xl:pr-20 md:pr-6">
                        <div class="py-2 text-color">
                            <h1 role="heading" class="text-2xl  lg:text-4xl md:leading-snug tracking-tighter f-f-l font-black">Top Seller Produk</h1>
                            <p role="contentinfo" class="text-lg lg:leading-7 md:leading-10 f-f-r py-4 md:py-8">Here at Globex we take special care of what your organization needs instead of selling you a mass market tool that takes a one size fits all approach. I personally review each and every client business and oversee the team that tailores a solution</p>
                        </div>
                    </div>
                    <div class="lg:w-1/3 md:w-1/2 w-full relative h-96 flex items-end justify-center">
                        <img class="absolute w-full h-full inset-0 object-cover object-center rounded-md" src="https://cdn.tuk.dev/assets/templates/prodify/ProductAdoption.png" alt="A girl enjoying in sunlight" role="img" />
                        <div class="relative z-10 bg-white rounded shadow p-6 w-10/12 -mb-20">
                            <div class="flex items-center justify-between w-full sm:w-full mb-8">
                                <div class="flex items-center">
                                    <div class="p-4 bg-yellow-200 rounded-md">
                                      <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/alternating_description_with_cards-svg2.svg" alt="icon">
                                    </div>
                                    <div class="ml-6">
                                        <p class="mb-1 leading-5 text-gray-800 font-bold text-2xl">2,330</p>
                                        <p class="text-gray-600 text-sm tracking-normal font-normal leading-5">Avg Sales</p>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex items-center pl-3 text-green-400">
                                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/alternating_description_with_cards-svg3.svg" alt="arrow">
                                        <p class="text-green-700 text-xs tracking-wide font-bold leading-normal pl-1">7.2%</p>
                                    </div>
                                    <p class="font-normal text-xs text-right leading-4 text-green-700 tracking-normal">Increase</p>
                                </div>
                            </div>
                            <div class="relative mb-3">
                                <hr class="h-1 rounded-sm bg-gray-200" />
                                <hr class="absolute top-0 h-1 w-7/12 rounded-sm bg-indigo-700" />
                            </div>
                            <h2 class="text-base text-gray-600 font-normal tracking-normal leading-5">Yearly Goal</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pb-20 pt-16 lg:px-20">
            <div class="mx-auto">
                <div class="flex flex-wrap flex-row-reverse items-center">
                    <div class="md:w-1/2 lg:w-2/3 w-full lg:pl-20 md:pl-10 sm:pl-0 pl-0">
                        <div class="py-2 text-color">
                            <div><h1 role="heading" class="text-2xl lg:text-4xl tracking-tighter md:leading-snug f-f-l font-black">Best Seller Produk</h1></div>
                            <p role="contentinfo" class="text-lg lg:leading-7 md:leading-10 f-f-r py-8">Here at Globex we take special care of what your organization needs instead of selling you a mass market tool that takes a one size fits all approach. I personally review each and every client business and oversee the team that tailores a solution</p>
                        </div>
                    </div>
                    <div class="lg:w-1/3 md:w-1/2 w-full relative h-96 flex items-end justify-center">
                        <img class="absolute w-full h-full inset-0 object-cover object-center rounded-md" src="https://cdn.tuk.dev/assets/templates/prodify/invoicing-system.png" alt="A group of three having a meeting" role="img" />
                        <div class="relative z-10 bg-white rounded shadow p-6 w-10/12 -mb-20">
                            <div class="flex items-center justify-between w-full sm:w-full mb-8">
                                <div class="flex items-center">
                                    <div class="p-4 bg-yellow-200 rounded-md">
                                      <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/alternating_description_with_cards-svg2.svg" alt="icon">
                                    </div>
                                    <div class="ml-6">
                                        <p class="mb-1 leading-5 text-gray-800 font-bold text-2xl">2,330</p>
                                        <p class="text-gray-600 text-sm tracking-normal font-normal leading-5">Avg Sales</p>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex items-center pl-3 text-green-400">
                                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/alternating_description_with_cards-svg3.svg" alt="arrow">
                                        <p class="text-green-700 text-xs tracking-wide font-bold leading-normal pl-1">7.2%</p>
                                    </div>
                                    <p class="font-normal text-xs text-right leading-4 text-green-700 tracking-normal">Increase</p>
                                </div>
                            </div>
                            <div class="relative mb-3">
                                <hr class="h-1 rounded-sm bg-gray-200" />
                                <hr class="absolute top-0 h-1 w-7/12 rounded-sm bg-indigo-700" />
                            </div>
                            <h2 class="text-base text-gray-600 font-normal tracking-normal leading-5">Yearly Goal</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Content --}}

    {{-- Footer --}}
    @include('layouts.footer')
    {{-- End Footer --}}

@endsection
