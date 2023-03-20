@extends('layouts.main')
@section('content')
    {{-- Navbar --}}
    @include('layouts.navbar')
    {{-- End Navbar --}}

    {{-- Header --}}
    <div class="relative overflow-hidden bg-white">
        <div class="pt-16 pb-80 sm:pt-24 sm:pb-40 lg:pt-40 lg:pb-48">
          <div class="relative mx-auto max-w-7xl px-4 sm:static sm:px-6 lg:px-8">
            <div class="sm:max-w-lg">
              <h1 class="font text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Summer styles are finally here</h1>
              <p class="mt-4 text-xl text-gray-500">This year, our new summer collection will shelter you from the harsh elements of a world that doesn't care if you live or die.</p>
            </div>
            <div>
              <div class="mt-10">
                <!-- Decorative image grid -->
                <div aria-hidden="true" class="pointer-events-none lg:absolute lg:inset-y-0 lg:mx-auto lg:w-full lg:max-w-7xl">
                  <div class="absolute transform sm:left-1/2 sm:top-0 sm:translate-x-8 lg:left-1/2 lg:top-1/2 lg:-translate-y-1/2 lg:translate-x-8">
                    <div class="flex items-center space-x-6 lg:space-x-8">
                      <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                        <div class="h-64 w-44 overflow-hidden rounded-lg sm:opacity-0 lg:opacity-100">
                          <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-01.jpg" alt="" class="h-full w-full object-cover object-center">
                        </div>
                        <div class="h-64 w-44 overflow-hidden rounded-lg">
                          <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-02.jpg" alt="" class="h-full w-full object-cover object-center">
                        </div>
                      </div>
                      <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                        <div class="h-64 w-44 overflow-hidden rounded-lg">
                          <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-03.jpg" alt="" class="h-full w-full object-cover object-center">
                        </div>
                        <div class="h-64 w-44 overflow-hidden rounded-lg">
                          <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-04.jpg" alt="" class="h-full w-full object-cover object-center">
                        </div>
                        <div class="h-64 w-44 overflow-hidden rounded-lg">
                          <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-05.jpg" alt="" class="h-full w-full object-cover object-center">
                        </div>
                      </div>
                      <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                        <div class="h-64 w-44 overflow-hidden rounded-lg">
                          <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-06.jpg" alt="" class="h-full w-full object-cover object-center">
                        </div>
                        <div class="h-64 w-44 overflow-hidden rounded-lg">
                          <img src="https://tailwindui.com/img/ecommerce-images/home-page-03-hero-image-tile-07.jpg" alt="" class="h-full w-full object-cover object-center">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- <a href="#" class="inline-block rounded-md border border-transparent bg-indigo-600 py-3 px-8 text-center font-medium text-white hover:bg-indigo-700">Shop Collection</a> --}}
              </div>
            </div>
          </div>
        </div>
    </div>
    {{-- End Header --}}

    {{-- Teams --}}

    <div class="container flex justify-center mx-auto pt-16">
        <div>
            <p class="text-gray-500 text-lg text-center font-normal pb-3">BUILDING TEAM</p>
            <h1 class="xl:text-4xl text-3xl text-center text-gray-800  font-extrabold pb-6 sm:w-4/6 w-5/6 mx-auto">The Talented People Behind the Scenes of the Organization</h1>
        </div>
    </div>
    <div class="w-full bg-gray-100 px-10 pt-10">
        <div class="container mx-auto">
            <div role="list" aria-label="Behind the scenes People " class="lg:flex md:flex sm:flex items-center xl:justify-between flex-wrap md:justify-around sm:justify-around lg:justify-around">
                <div role="listitem" class="xl:w-1/3 sm:w-3/4 md:w-2/5 relative mt-16 mb-32 sm:mb-24 xl:max-w-sm lg:w-2/5">
                    <div class="rounded overflow-hidden shadow-md bg-white">
                        <div class="absolute -mt-20 w-full flex justify-center">
                            <div class="h-32 w-32">
                                <img src="https://cdn.tuk.dev/assets/photo-1564061170517-d3907caa96ea.jfif" alt="Display Picture of Andres Berlin" role="img" class="rounded-full object-cover h-full w-full shadow-md" />
                            </div>
                        </div>
                        <div class="px-6 mt-16">
                            <h1 class="font-bold  text-3xl text-center mb-1">Andres Berlin</h1>
                            <p class="text-gray-800  text-sm text-center">Chief Executive Officer</p>
                            <p class="text-center text-gray-600  text-base pt-3 font-normal">The CEO's role in raising a company's corporate IQ is to establish an atmosphere that promotes knowledge sharing and collaboration.</p>
                            <div class="w-full flex justify-center pt-5 pb-5">
                                <a href="javascript:void(0)" class="mx-5">
                                    <div aria-label="Github" role="img">
                                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/gray-bg-with-description-svg1.svg" alt="github" />
                                    </div>
                                </a>
                                <a href="javascript:void(0)" class="mx-5">
                                    <div aria-label="Twitter" role="img">
                                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/gray-bg-with-description-svg2.svg" alt="twitter" />
                                    </div>
                                </a>
                                <a href="javascript:void(0)" class="mx-5">
                                    <div aria-label="Instagram" role="img">
                                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/gray-bg-with-description-svg3.svg" alt="instagram" />
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="listitem" class="xl:w-1/3 sm:w-3/4 md:w-2/5 relative mt-16 mb-32 sm:mb-24 xl:max-w-sm lg:w-2/5">
                    <div class="rounded overflow-hidden shadow-md bg-white">
                        <div class="absolute -mt-20 w-full flex justify-center">
                            <div class="h-32 w-32">
                                <img src="https://cdn.tuk.dev/assets/photo-1564061170517-d3907caa96ea.jfif" alt="Display Picture of Andres Berlin" role="img" class="rounded-full object-cover h-full w-full shadow-md" />
                            </div>
                        </div>
                        <div class="px-6 mt-16">
                            <h1 class="font-bold  text-3xl text-center mb-1">Andres Berlin</h1>
                            <p class="text-gray-800  text-sm text-center">Chief Executive Officer</p>
                            <p class="text-center text-gray-600  text-base pt-3 font-normal">The CEO's role in raising a company's corporate IQ is to establish an atmosphere that promotes knowledge sharing and collaboration.</p>
                            <div class="w-full flex justify-center pt-5 pb-5">
                                <a href="javascript:void(0)" class="mx-5">
                                    <div aria-label="Github" role="img">
                                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/gray-bg-with-description-svg1.svg" alt="github" />
                                    </div>
                                </a>
                                <a href="javascript:void(0)" class="mx-5">
                                    <div aria-label="Twitter" role="img">
                                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/gray-bg-with-description-svg2.svg" alt="twitter" />
                                    </div>
                                </a>
                                <a href="javascript:void(0)" class="mx-5">
                                    <div aria-label="Instagram" role="img">
                                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/gray-bg-with-description-svg3.svg" alt="instagram" />
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="listitem" class="xl:w-1/3 sm:w-3/4 md:w-2/5 relative mt-16 mb-32 sm:mb-24 xl:max-w-sm lg:w-2/5">
                    <div class="rounded overflow-hidden shadow-md bg-white">
                        <div class="absolute -mt-20 w-full flex justify-center">
                            <div class="h-32 w-32">
                                <img src="https://cdn.tuk.dev/assets/photo-1564061170517-d3907caa96ea.jfif" alt="Display Picture of Andres Berlin" role="img" class="rounded-full object-cover h-full w-full shadow-md" />
                            </div>
                        </div>
                        <div class="px-6 mt-16">
                            <h1 class="font-bold  text-3xl text-center mb-1">Andres Berlin</h1>
                            <p class="text-gray-800  text-sm text-center">Chief Executive Officer</p>
                            <p class="text-center text-gray-600  text-base pt-3 font-normal">The CEO's role in raising a company's corporate IQ is to establish an atmosphere that promotes knowledge sharing and collaboration.</p>
                            <div class="w-full flex justify-center pt-5 pb-5">
                                <a href="javascript:void(0)" class="mx-5">
                                    <div aria-label="Github" role="img">
                                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/gray-bg-with-description-svg1.svg" alt="github" />
                                    </div>
                                </a>
                                <a href="javascript:void(0)" class="mx-5">
                                    <div aria-label="Twitter" role="img">
                                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/gray-bg-with-description-svg2.svg" alt="twitter" />
                                    </div>
                                </a>
                                <a href="javascript:void(0)" class="mx-5">
                                    <div aria-label="Instagram" role="img">
                                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/gray-bg-with-description-svg3.svg" alt="instagram" />
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="listitem" class="xl:w-1/3 sm:w-3/4 md:w-2/5 relative mt-16 mb-32 sm:mb-24 xl:max-w-sm lg:w-2/5">
                    <div class="rounded overflow-hidden shadow-md bg-white">
                        <div class="absolute -mt-20 w-full flex justify-center">
                            <div class="h-32 w-32">
                                <img src="https://cdn.tuk.dev/assets/photo-1564061170517-d3907caa96ea.jfif" alt="Display Picture of Andres Berlin" role="img" class="rounded-full object-cover h-full w-full shadow-md" />
                            </div>
                        </div>
                        <div class="px-6 mt-16">
                            <h1 class="font-bold  text-3xl text-center mb-1">Andres Berlin</h1>
                            <p class="text-gray-800  text-sm text-center">Chief Executive Officer</p>
                            <p class="text-center text-gray-600  text-base pt-3 font-normal">The CEO's role in raising a company's corporate IQ is to establish an atmosphere that promotes knowledge sharing and collaboration.</p>
                            <div class="w-full flex justify-center pt-5 pb-5">
                                <a href="javascript:void(0)" class="mx-5">
                                    <div aria-label="Github" role="img">
                                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/gray-bg-with-description-svg1.svg" alt="github" />
                                    </div>
                                </a>
                                <a href="javascript:void(0)" class="mx-5">
                                    <div aria-label="Twitter" role="img">
                                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/gray-bg-with-description-svg2.svg" alt="twitter" />
                                    </div>
                                </a>
                                <a href="javascript:void(0)" class="mx-5">
                                    <div aria-label="Instagram" role="img">
                                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/gray-bg-with-description-svg3.svg" alt="instagram" />
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="listitem" class="xl:w-1/3 sm:w-3/4 md:w-2/5 relative mt-16 mb-32 sm:mb-24 xl:max-w-sm lg:w-2/5">
                    <div class="rounded overflow-hidden shadow-md bg-white">
                        <div class="absolute -mt-20 w-full flex justify-center">
                            <div class="h-32 w-32">
                                <img src="https://cdn.tuk.dev/assets/photo-1564061170517-d3907caa96ea.jfif" alt="Display Picture of Andres Berlin" role="img" class="rounded-full object-cover h-full w-full shadow-md" />
                            </div>
                        </div>
                        <div class="px-6 mt-16">
                            <h1 class="font-bold  text-3xl text-center mb-1">Andres Berlin</h1>
                            <p class="text-gray-800  text-sm text-center">Chief Executive Officer</p>
                            <p class="text-center text-gray-600  text-base pt-3 font-normal">The CEO's role in raising a company's corporate IQ is to establish an atmosphere that promotes knowledge sharing and collaboration.</p>
                            <div class="w-full flex justify-center pt-5 pb-5">
                                <a href="javascript:void(0)" class="mx-5">
                                    <div aria-label="Github" role="img">
                                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/gray-bg-with-description-svg1.svg" alt="github" />
                                    </div>
                                </a>
                                <a href="javascript:void(0)" class="mx-5">
                                    <div aria-label="Twitter" role="img">
                                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/gray-bg-with-description-svg2.svg" alt="twitter" />
                                    </div>
                                </a>
                                <a href="javascript:void(0)" class="mx-5">
                                    <div aria-label="Instagram" role="img">
                                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/gray-bg-with-description-svg3.svg" alt="instagram" />
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="listitem" class="xl:w-1/3 sm:w-3/4 md:w-2/5 relative mt-16 mb-32 sm:mb-24 xl:max-w-sm lg:w-2/5">
                    <div class="rounded overflow-hidden shadow-md bg-white">
                        <div class="absolute -mt-20 w-full flex justify-center">
                            <div class="h-32 w-32">
                                <img src="https://cdn.tuk.dev/assets/photo-1564061170517-d3907caa96ea.jfif" alt="Display Picture of Andres Berlin" role="img" class="rounded-full object-cover h-full w-full shadow-md" />
                            </div>
                        </div>
                        <div class="px-6 mt-16">
                            <h1 class="font-bold  text-3xl text-center mb-1">Andres Berlin</h1>
                            <p class="text-gray-800  text-sm text-center">Chief Executive Officer</p>
                            <p class="text-center text-gray-600  text-base pt-3 font-normal">The CEO's role in raising a company's corporate IQ is to establish an atmosphere that promotes knowledge sharing and collaboration.</p>
                            <div class="w-full flex justify-center pt-5 pb-5">
                                <a href="javascript:void(0)" class="mx-5">
                                    <div aria-label="Github" role="img">
                                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/gray-bg-with-description-svg1.svg" alt="github" />
                                    </div>
                                </a>
                                <a href="javascript:void(0)" class="mx-5">
                                    <div aria-label="Twitter" role="img">
                                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/gray-bg-with-description-svg2.svg" alt="twitter" />
                                    </div>
                                </a>
                                <a href="javascript:void(0)" class="mx-5">
                                    <div aria-label="Instagram" role="img">
                                        <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/gray-bg-with-description-svg3.svg" alt="instagram" />
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    {{-- End Teams --}}

    {{-- Footer --}}
        @include('layouts.footer')
    {{-- End Footer --}}

@endsection
