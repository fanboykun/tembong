<div>
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
                <p class="mt-6 text-lg leading-8 text-gray-600">Mama Parfum selalu aktif dalam melakukan kegiatan dan aktivitas bermanfaat.</p>
              </div>
            </div>
        </div>
        {{-- End Header --}}

        {{-- Content --}}
        <div class="bg-gray-100 py-12 sm:py-12">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
              <dl class="grid grid-cols-1 gap-y-16 gap-x-8 text-center lg:grid-cols-3">
                @forelse ($blogs as $blog)
                <div class="mx-auto flex items-center gap-x-4 text-xs max-w-xs flex-col gap-y-2 shadow-xl hover:shadow-2xl rounded-2xl">
                    <a href="{{ route('read-blog', ['blog' => $blog]) }}">
                        <img
                        class="rounded-t-lg"
                        src="{{ $blog->cover }}"
                        alt="" />
                    </a>
                    <div class="flex items-center gap-x-4 text-xs">
                        <span class="text-gray-500">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $blog->updated_at)->format('d M Y')}}</span>
                        <span class="relative rounded-full bg-gray-50 py-1.5 px-3 font-medium text-gray-600 hover:bg-gray-100">Admin</span>
                    </div>
                    <div class="group relative px-4 gap-y-2">
                        <h3 class="text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                            <a href="{{ route('read-blog', ['blog' => $blog]) }}">
                                <span class="absolute inset-0"></span>
                                {{ Str::title($blog->title)  }}
                            </a>
                        </h3>
                        {{-- <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-3">Illo sint voluptas. Error voluptates culpa eligendi. Hic vel totam vitae illo. Non aliquid explicabo necessitatibus unde. Sed exercitationem placeat consectetur nulla deserunt vel. Iusto corrupti dicta.</p> --}}
                        <div class="py-4 justify-start">
                            <a href="{{ route('read-blog', ['blog' => $blog]) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Read more
                                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                Belum Ada Blog
                @endforelse
              </dl>

              @if ($blogs->hasPages())
                  <div class="mt-8">
                      {{ $blogs->links() }}
                  </div>
              @endif

            </div>
        </div>



        {{-- End Content --}}

        {{-- Footer --}}
        @include('layouts.footer')
        {{-- End Footer --}}
    @endsection
</div>
