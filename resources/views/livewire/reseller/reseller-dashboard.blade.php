<div>
@if (auth()->user()->validated_at == null)
    @livewire('reseller.unvalidated-reseller-dashboard')
@else
<div class="py-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 flex">
                <p class="text-xl font-medium">Haloo, {{ auth()->user()->name }} </p>
            </div>
        </div>
    </div>
</div>

<div class="grid lg:grid-cols-4 gap-4 mb-4 sm:grid-cols-1">

    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-4">
          <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
              <div>
                <p class="mb-0 font-sans font-semibold leading-normal text-sm text-gray-800">Total Pengunjung Catalog</p>
                <h5 class="mb-0 font-bold text-lg">
                    {{ $total_catalog_visitor }}
                  <span class="leading-normal text-sm font-light text-gray-500">kali di kunjungi</span>
                </h5>
              </div>
            </div>
            <div class="w-4/12 max-w-full px-3 ml-auto text-right flex-0">
              <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-r from-gray-700 via-gray-900 to-black shadow-soft-2xl">
                <svg class="text-lg relative p-2.5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                    <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" clip-rule="evenodd" />
                </svg>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-4">
          <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
              <div>
                <p class="mb-0 font-sans font-semibold leading-normal text-md text-gray-800">Total Penjualan Anda</p>
                <h5 class="mb-0 font-bold text-lg">
                    {{ $total_sales }}
                  <span class="leading-normal text-sm font-light text-gray-500">kali penjualan</span>
                </h5>
              </div>
            </div>
            <div class="w-4/12 max-w-full px-3 ml-auto text-right flex-0">
              <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-r from-gray-700 via-gray-900 to-black shadow-soft-2xl">
                <svg class="text-lg relative p-2.5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.54 15h6.42l.5 1.5H8.29l.5-1.5zm8.085-8.995a.75.75 0 10-.75-1.299 12.81 12.81 0 00-3.558 3.05L11.03 8.47a.75.75 0 00-1.06 0l-3 3a.75.75 0 101.06 1.06l2.47-2.47 1.617 1.618a.75.75 0 001.146-.102 11.312 11.312 0 013.612-3.321z" clip-rule="evenodd" />
                </svg>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-4">
          <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
              <div>
                <p class="mb-0 font-sans font-semibold leading-normal text-sm text-gray-800">Total Referral Anda</p>
                <h5 class="mb-0 font-bold text-lg">
                    {{ $total_referral }}
                  <span class="leading-normal text-sm font-light text-gray-500">kali di gunakan</span>
                </h5>
              </div>
            </div>
            <div class="w-4/12 max-w-full px-3 ml-auto text-right flex-0">
              <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-r from-gray-700 via-gray-900 to-black shadow-soft-2xl">
                <svg class="text-lg relative p-2.5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM15.75 9.75a3 3 0 116 0 3 3 0 01-6 0zM2.25 9.75a3 3 0 116 0 3 3 0 01-6 0zM6.31 15.117A6.745 6.745 0 0112 12a6.745 6.745 0 016.709 7.498.75.75 0 01-.372.568A12.696 12.696 0 0112 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 01-.372-.568 6.787 6.787 0 011.019-4.38z" clip-rule="evenodd" />
                    <path d="M5.082 14.254a8.287 8.287 0 00-1.308 5.135 9.687 9.687 0 01-1.764-.44l-.115-.04a.563.563 0 01-.373-.487l-.01-.121a3.75 3.75 0 013.57-4.047zM20.226 19.389a8.287 8.287 0 00-1.308-5.135 3.75 3.75 0 013.57 4.047l-.01.121a.563.563 0 01-.373.486l-.115.04c-.567.2-1.156.349-1.764.441z" />
                </svg>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-4">
          <div class="flex flex-wrap -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
              <div>
                <p class="mb-0 font-sans font-semibold leading-normal text-sm text-gray-800">Saldo Withdrawable</p>
                <h5 class="mb-0 font-bold text-lg">
                    Rp {{ number_format($total_balance, 0, ",", ".") }}
                </h5>
              </div>
            </div>
            <div class="w-4/12 max-w-full px-3 ml-auto text-right flex-0">
              <div class="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-r from-gray-700 via-gray-900 to-black shadow-soft-2xl">
                <svg class="text-lg relative p-2.5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path d="M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 01-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004zM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 01-.921.42z" />
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v.816a3.836 3.836 0 00-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 01-.921-.421l-.879-.66a.75.75 0 00-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 001.5 0v-.81a4.124 4.124 0 001.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 00-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 00.933-1.175l-.415-.33a3.836 3.836 0 00-1.719-.755V6z" clip-rule="evenodd" />
                </svg>
              </div>
            </div>
          </div>
        </div>
    </div>

</div>

<div class="grid grid-cols-1 my-4 xl:grid-cols-2 xl:gap-4">

    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="relative">
          <div class="relative mx-auto">
              <div class="bg-white">
                <h3 class="flex mb-2 text-2xl font-medium text-gray-900 dark:text-white">
                    Link dari Catalog Anda
                    <a href="{{ $catalog_url }}" class="flex px-2 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                        </svg>
                    </a>
                </h3>
                <p class="mb-2 text-gray-500 text-sm">Link ini berfungsi sebagai catalog dari produk - produk yang tersedia, bagikan link ini agar katalog anda dapat diraih oleh konsumen dan membeli produk dengan link anda</p>
                <div class="flex items-center">
                    <div class="relative w-full">
                        <input type="text" id="catalog_url" value="{{ $catalog_url }}" disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg  block w-full p-2.5">
                    </div>
                    <button type="button" x-clipboard.raw="{{ $catalog_url }}" class="p-2.5 ml-2 text-sm font-medium text-white bg-slate-800 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0013.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 01-.75.75H9a.75.75 0 01-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 011.927-.184" />
                        </svg>
                    </button>
                </div>
              </div>
          </div>
        </div>
    </div>

    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="relative">
          <div class="relative mx-auto">
              <div class="bg-white">
                <h3 class="flex mb-2 text-2xl font-medium text-gray-900 dark:text-white">
                    Kode Referral Anda
                    <a href="{{ route('referral') }}" class="flex px-2 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                        </svg>
                    </a>
                </h3>
                <p class="mb-2 text-gray-500 text-sm">Kode ini adalah kode referral anda, bagikan link ke pengguna baru atau pengguna yang belum memasukkan kode referral, ada bonus saldo untuk setiap kode referral yang dimasukkan</p>
                <div class="flex items-center">
                    <div class="relative w-full">
                        <input type="text" id="catalog_url" value="{{ $referral_code }}" disabled class="bg-gray-50 border border-gray-300 text-gray-900 text-lg rounded-lg  block w-full p-2.5">
                    </div>
                    <button type="button" x-clipboard.raw="{{ $referral_code }}" class="p-2.5 ml-2 text-sm font-medium text-white bg-slate-800 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.666 3.888A2.25 2.25 0 0013.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 01-.75.75H9a.75.75 0 01-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 011.927-.184" />
                        </svg>
                    </button>
                </div>
              </div>
          </div>
        </div>
    </div>

</div>

@endif
</div>
{{-- @once
@push('scripts')
<script>
    function copyLink() {
        // Get the text field
        var copyText = document.getElementById("catalog_url");

        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText.value);

        // Alert the copied text
        alert("Copied the text: " + copyText.value);
    }
</script>
@endpush
@endonce --}}
