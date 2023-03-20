@extends('layouts.main')
@section('content')

@include('layouts.navbar')

<div class="bg-white py-12 sm:py-12">
    <div class="mx-auto max-w-7xl px-2 lg:px-0">
      <div class="grid grid-cols-1 gap-y-16 gap-x-8 text-center lg:grid-cols-2">

            <div class="flex bg-white rounded-lg shadow items-stretch">
                <div class="relative flex-none w-24 h-32 lg:w-40 lg:min-h-fit">
                    <div class="flex p-2">
                        <img src="https://tecdn.b-cdn.net/img/new/standard/nature/184.jpg" alt="shopping image" class="absolute inset-0 object-cover w-full h-full rounded-lg"/>
                    </div>
                </div>
                <div class="flex-auto items-start">
                    <div class="flex ml-4 justify-between">
                       <div class="text-base font-semibold leading-7 text-gray-900">Nama Barang</div>
                    </div>
                    <div class="flex text-xs ml-4 mt-2">
                        <span class="relative z-10 rounded-full bg-gray-50 py-1.5 px-3 font-medium text-gray-600 hover:bg-gray-100">Top Seller</span>
                        <span class="relative z-10 rounded-full bg-gray-50 py-1.5 px-3 font-medium text-gray-600 hover:bg-gray-100">Men</span>
                    </div>
                    <div class="flex ml-4 mt-2 items-start">
                        <div class="text-base leading-7 text-gray-900 justify-start">
                            <p> Morbi viverra dui mi arcu sed.</p>
                        </div>
                     </div>
                    <div class="flex justify-between mt-3 item-center">
                        <h1 class="text-xl ml-4 font-bold text-gray-700">
                            $220
                        </h1>
                        <button class="px-3 py-2 mr-2 mb-4 text-xs font-bold text-white uppercase bg-gray-800 rounded">
                            Add to Card
                        </button>
                    </div>

                </div>
            </div>


        </div>
    </div>
</div>




{{-- Footer --}}
@include('layouts.footer')
{{-- End Footer --}}

@endsection
