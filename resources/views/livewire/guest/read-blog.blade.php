<div>
{{-- @extends('layouts.main') --}}
@section('content')
{{-- Navbar --}}
@include('layouts.navbar')
    {{-- End Navbar --}}

    {{-- Content --}}
<div class="pt-8 pb-16 lg:pt-8 lg:pb-24 bg-transparent">
    <section class="bg-center lg:bg-contain bg-no-repeat bg-cover bg-fixed w-auto bg-white mx-auto bg-blend-multiply" style="background-image: url({{ $blog->cover }})">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                {{ $blog->title }}
            </h1>
        </div>
    </section>
    <div class="flex justify-cebter lg:px-8 sm:px-2 mx-auto max-w-screen bg-gray-100 rounded-lg ">
        <article class="mx-auto lg:px-12 px-4 w-full shadow-indigo-500/50 bg-white rounded-lg max-w-6xl format format-sm sm:format-base lg:format-lg format-blue">
            <header class="mb-4 lg:mb-6 not-format">
                <h1 class="text-3xl font-extrabold leading-tight text-gray-900 mt-2 lg:text-4xl">{{ Str::title($blog->title) }}</h1>
                <address class="flex items-center mb-2 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-gray-900">
                        <div>
                            <p class="text-base font-light text-gray-500 ">
                                <time pubdate datetime="2022-02-08" title="February 8th, 2022">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $blog->created_at)->format('d M Y') }}</time>
                            </p>
                        </div>
                    </div>
                </address>
            </header>
            <div class="sm:text-lg lg:text-xl font-normal leading-loose lg:leading-loose text-gray-800 text-justify mt-4 gap-y-2">
                {!! $blog->content !!}
            </div>
        </article>
    </div>

  {{-- <aside aria-label="Related articles" class="pt-8 mt-16 border-t-2 bg-gray-50">
    <div class="px-4 mx-auto max-w-screen-xl">
        <h2 class="mb-4 text-2xl font-bold text-gray-900">Blog Terbaru</h2>
        <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">
            <article class="max-w-xs drop-shadow-md shadow-white bg-white">
                <a href="#">
                    <img src="https://tecdn.b-cdn.net/img/new/standard/nature/184.jpg" class="mb-5 rounded-t-lg" alt="Image 1">
                </a>
                <div class="p-4">
                    <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900">
                        <a href="#">Our first office</a>
                    </h2>
                    <p class="text-base font-light text-gray-500 ">
                        <time pubdate datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time>
                    </p>
                </div>
            </article>
            <article class="max-w-xs drop-shadow-md shadow-white bg-white">
                <a href="#">
                    <img src="https://tecdn.b-cdn.net/img/new/standard/nature/184.jpg" class="mb-5 rounded-t-lg" alt="Image 1">
                </a>
                <div class="p-4">
                    <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900">
                        <a href="#">Our first office</a>
                    </h2>
                    <p class="text-base font-light text-gray-500 ">
                        <time pubdate datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time>
                    </p>
                </div>
            </article>
            <article class="max-w-xs drop-shadow-md shadow-white bg-white">
                <a href="#">
                    <img src="https://tecdn.b-cdn.net/img/new/standard/nature/184.jpg" class="mb-5 rounded-t-lg" alt="Image 1">
                </a>
                <div class="p-4">
                    <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900">
                        <a href="#">Our first office</a>
                    </h2>
                    <p class="text-base font-light text-gray-500 ">
                        <time pubdate datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time>
                    </p>
                </div>
            </article>
            <article class="max-w-xs drop-shadow-md shadow-white bg-white">
                <a href="#">
                    <img src="https://tecdn.b-cdn.net/img/new/standard/nature/184.jpg" class="mb-5 rounded-t-lg" alt="Image 1">
                </a>
                <div class="p-4">
                    <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900">
                        <a href="#">Our first office</a>
                    </h2>
                    <p class="text-base font-light text-gray-500 ">
                        <time pubdate datetime="2022-02-08" title="February 8th, 2022">Feb. 8, 2022</time>
                    </p>
                </div>
            </article>
        </div>
    </div>
  </aside> --}}

</div>
    {{-- End Content --}}

{{-- Footer --}}
@include('layouts.footer')
{{-- End Footer --}}

@endsection
</div>
