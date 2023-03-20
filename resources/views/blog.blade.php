@extends('layouts.main')
@section('content')
    {{-- Navbar --}}
    @include('layouts.navbar')
    {{-- End Navbar --}}

    {{-- Header --}}
    <div class="bg-white mb-4 py-2 sm:py-16 sm:mt-8">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto max-w-2xl lg:text-center">
            <h2 class="text-base font-semibold leading-7 text-indigo-600">Blog</h2>
            <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Cari Tau Tentang Kegiatan Kami</p>
            <p class="mt-6 text-lg leading-8 text-gray-600">Quis tellus eget adipiscing convallis sit sit eget aliquet quis. Suspendisse eget egestas a elementum pulvinar et feugiat blandit at. In mi viverra elit nunc.</p>
          </div>
        </div>
    </div>
    {{-- End Header --}}

    {{-- Content --}}
    <div class="bg-white py-12 sm:py-12">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <dl class="grid grid-cols-1 gap-y-16 gap-x-8 text-center lg:grid-cols-3">

            <div class="mx-auto flex items-center gap-x-4 text-xs max-w-xs flex-col gap-y-4 shadow-lg rounded">
                <a href="#!">
                    <img
                    class="rounded-t-lg"
                    src="https://tecdn.b-cdn.net/img/new/standard/nature/184.jpg"
                    alt="" />
                </a>
                <div class="flex items-center gap-x-4 text-xs mb-2">
                    <time datetime="2020-03-16" class="text-gray-500">Mar 16, 2020</time>
                    <a href="#" class="relative z-10 rounded-full bg-gray-50 py-1.5 px-3 font-medium text-gray-600 hover:bg-gray-100">Admin</a>
                </div>
                <div class="group relative px-4 py-2">
                    <h3 class="text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                    <a href="#">
                        <span class="absolute inset-0"></span>
                        Boost your conversion rate
                    </a>
                    </h3>
                    <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-3">Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.</p>
                </div>
            </div>

            <div class="mx-auto flex items-center gap-x-4 text-xs max-w-xs flex-col gap-y-4 shadow-lg rounded">
                <a href="#!">
                    <img
                    class="rounded-t-lg"
                    src="https://tecdn.b-cdn.net/img/new/standard/nature/184.jpg"
                    alt="" />
                </a>
                <div class="flex items-center gap-x-4 text-xs mb-2">
                    <time datetime="2020-03-16" class="text-gray-500">Mar 16, 2020</time>
                    <a href="#" class="relative z-10 rounded-full bg-gray-50 py-1.5 px-3 font-medium text-gray-600 hover:bg-gray-100">Admin</a>
                </div>
                <div class="group relative px-4 py-2">
                    <h3 class="text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                    <a href="#">
                        <span class="absolute inset-0"></span>
                        Boost your conversion rate
                    </a>
                    </h3>
                    <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-3">Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.</p>
                </div>
            </div>

            <div class="mx-auto flex items-center gap-x-4 text-xs max-w-xs flex-col gap-y-4 shadow-lg rounded">
                <a href="#!">
                    <img
                    class="rounded-t-lg"
                    src="https://tecdn.b-cdn.net/img/new/standard/nature/184.jpg"
                    alt="" />
                </a>
                <div class="flex items-center gap-x-4 text-xs mb-2">
                    <time datetime="2020-03-16" class="text-gray-500">Mar 16, 2020</time>
                    <a href="#" class="relative z-10 rounded-full bg-gray-50 py-1.5 px-3 font-medium text-gray-600 hover:bg-gray-100">Admin</a>
                </div>
                <div class="group relative px-4 py-2">
                    <h3 class="text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                    <a href="#">
                        <span class="absolute inset-0"></span>
                        Boost your conversion rate
                    </a>
                    </h3>
                    <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-3">Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.</p>
                </div>
            </div>
          </dl>
        </div>
    </div>
    {{-- End Content --}}

    {{-- Footer --}}
    @include('layouts.footer')
    {{-- End Footer --}}

@endsection
