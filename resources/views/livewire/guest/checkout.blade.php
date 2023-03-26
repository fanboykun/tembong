<div>
<div class="isolate bg-white py-8 px-6 sm:py-8 lg:px-8">
    <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]">
      <svg class="relative left-1/2 -z-10 h-[21.1875rem] max-w-none -translate-x-1/2 rotate-[30deg] sm:left-[calc(50%-40rem)] sm:h-[42.375rem]" viewBox="0 0 1155 678">
        <path fill="url(#45de2b6b-92d5-4d68-a6a0-9b9b2abad533)" fill-opacity=".3" d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z" />
        <defs>
          <linearGradient id="45de2b6b-92d5-4d68-a6a0-9b9b2abad533" x1="1155.49" x2="-78.208" y1=".177" y2="474.645" gradientUnits="userSpaceOnUse">
            <stop stop-color="#9089FC" />
            <stop offset="1" stop-color="#FF80B5" />
          </linearGradient>
        </defs>
      </svg>
    </div>
    <div class="mx-auto max-w-2xl text-center">
      <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Checkout</h2>
      <p class="mt-2 text-lg leading-8 text-gray-600">Silahkan mengisi form checkout. Harap mengisi form checkout sesuai dengan informasi anda</p>
    </div>
    <div class="mx-auto mt-8 max-w-xl sm:mt-8">
        <div class="grid grid-cols-1 gap-y-6 gap-x-8 sm:grid-cols-2">
            <div class="sm:col-span-2">
                <label for="company" class="block text-sm font-semibold leading-6 text-gray-900">Nama Lengkap</label>
                <div class="mt-2.5">
                    <input type="text" wire:model="buyer_name" name="name" id="name" autocomplete="name" required autofocus class="block w-full rounded-md border-0 py-2 px-3.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="sm:col-span-2">
            <label for="phone-number" class="block text-sm font-semibold leading-6 text-gray-900">Nomor WhatsApp</label>
            <input type="tel" wire:model="buyer_phone" name="phone-number" id="phone-number" autocomplete="tel" required class="block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            <div>
                <label for="first-name" class="block text-sm font-semibold leading-6 text-gray-900">Provinsi</label>
                <div class="mt-2.5">
                    <div
                        x-data="{
                            open: false,
                            {{-- $wire.on('closeModal', () => {this.toggle()}), --}}
                            toggle() {
                                if (this.open) {
                                    return this.close()
                                }

                                this.$refs.input.focus()

                                this.open = true
                            },
                            close(focusAfter) {
                                if (! this.open) return

                                this.open = false

                                focusAfter && focusAfter.focus()
                            },

                        }"
                        x-on:keydown.escape.prevent.stop="close($refs.input)"
                        x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                        x-id="['dropdown-input']"
                        class="relative left-0 z-10 origin-top-right rounded-md w-full justify-self-end">
                        <input
                            x-ref="input"
                            x-on:click="toggle()"
                            :aria-expanded="open"
                            :aria-controls="$id('dropdown-input')"
                            id="dropdown-input" data-dropdown-toggle="dropdown"
                            type="text" wire:model.debounce.1000ms="buyer_province" name="buyer_province" required autocomplete="buyer_province" class="block w-full rounded-md border-0 py-2 px-3.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <div
                            @close-modal.window="open = false"
                            x-ref="panel"
                            x-show="open"
                            x-transition.origin.top.left
                            x-on:click.outside="close($refs.input)"
                            :id="$id('dropdown-input')"
                            style="display: none;"
                            id="dropdown"
                            class="z-10 bg-white divide-y absolute left-0 mt-2 divide-gray-100 rounded-lg shadow w-44">
                            <div wire:loading.delay.shorter wire:target="buyer_province">
                                <span class="inline-flex w-full px-4 py-2 hover:bg-gray-100 "> Memuat.... </span>
                            </div>
                            <ul class="max-h-48 overflow-y-auto py-2 text-sm text-gray-700" aria-labelledby="dropdown-input">
                                @if (!empty($provincies))
                                    @forelse ($provincies as $province)
                                    <li>
                                        <button type="button" wire:click="updateAddress('province', {{ $province->id }}, '{{ $province->name }}')" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 ">{{ $province->name }}</button>
                                    </li>
                                        @empty
                                        <h3>No Data!!!</h3>
                                    @endforelse
                                @endif
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <div>
                <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900">Kabupaten/Kota</label>
                <div class="mt-2.5">
                    <div
                        x-data="{
                            open: false,
                            toggle() {
                                if (this.open) {
                                    return this.close()
                                }

                                this.$refs.input.focus()

                                this.open = true
                            },
                            close(focusAfter) {
                                if (! this.open) return

                                this.open = false

                                focusAfter && focusAfter.focus()
                            },
                        }"
                        x-on:keydown.escape.prevent.stop="close($refs.input)"
                        x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                        x-id="['dropdown-input']"
                        class="relative left-0 origin-top-right rounded-md w-full justify-self-end">
                        <input
                            x-ref="input"
                            x-on:click="toggle()"
                            :aria-expanded="open"
                            :aria-controls="$id('dropdown-input')"
                            id="dropdown-input" data-dropdown-toggle="dropdown"
                            type="text" wire:model.debounce.1000ms="buyer_city" name="buyer_city" autocomplete="buyer_city" required class="block w-full rounded-md border-0 py-2 px-3.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <div
                            @close-modal.window="open = false"
                            x-ref="panel"
                            x-show="open"
                            x-transition.origin.top.left
                            x-on:click.outside="close($refs.input)"
                            :id="$id('dropdown-input')"
                            style="display: none;"
                            id="dropdown"
                            class="z-10 bg-white divide-y absolute left-0 mt-2 divide-gray-100 rounded-lg shadow w-44">
                            <div wire:loading.delay.shorter wire:target="buyer_city">
                                <span class="inline-flex w-full px-4 py-2 hover:bg-gray-100 "> Memuat.... </span>
                            </div>
                            <ul class="max-h-48 overflow-y-auto py-2 text-sm text-gray-700" aria-labelledby="dropdown-input">
                                @if (!empty($cities))
                                    @forelse ($cities as $city)
                                    <li>
                                        <button type="button" wire:click="updateAddress('city', {{ $city->id }}, '{{ $city->name }}')" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 ">{{ $city->name }}</button>
                                    </li>
                                        @empty
                                        <h3>No Data!!!</h3>
                                    @endforelse
                                @endif
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <div>
                <label for="first-name" class="block text-sm font-semibold leading-6 text-gray-900">Kecamatan</label>
                <div class="mt-2.5">
                    <div
                        x-data="{
                            open: false,
                            toggle() {
                                if (this.open) {
                                    return this.close()
                                }

                                this.$refs.input.focus()

                                this.open = true
                            },
                            close(focusAfter) {
                                if (! this.open) return

                                this.open = false

                                focusAfter && focusAfter.focus()
                            },
                        }"
                        x-on:keydown.escape.prevent.stop="close($refs.input)"
                        x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                        x-id="['dropdown-input']"
                        class="relative left-0 origin-top-right rounded-md w-full justify-self-end">
                        <input
                            x-ref="input"
                            x-on:click="toggle()"
                            :aria-expanded="open"
                            :aria-controls="$id('dropdown-input')"
                            id="dropdown-input" data-dropdown-toggle="dropdown"
                            type="text" wire:model.debounce.1000ms="buyer_district" name="buyer_district" autocomplete="buyer_district" required class="block w-full rounded-md border-0 py-2 px-3.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <div
                            @close-modal.window="open = false"
                            x-ref="panel"
                            x-show="open"
                            x-transition.origin.top.left
                            x-on:click.outside="close($refs.input)"
                            :id="$id('dropdown-input')"
                            style="display: none;"
                            id="dropdown"
                            class="z-10 bg-white divide-y absolute left-0 mt-2 divide-gray-100 rounded-lg shadow w-44">
                            <div wire:loading.delay.shorter wire:target="buyer_district">
                                <span class="inline-flex w-full px-4 py-2 hover:bg-gray-100 "> Memuat.... </span>
                            </div>
                            <ul class="max-h-48 overflow-y-auto py-2 text-sm text-gray-700" aria-labelledby="dropdown-input">
                                @if (!empty($districts))
                                    @forelse ($districts as $district)
                                    <li>
                                        <button type="button" wire:click="updateAddress('district', {{ $district->id }}, '{{ $district->name }}')" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 ">{{ $district->name }}</button>
                                    </li>
                                        @empty
                                        <h3>No Data!!!</h3>
                                    @endforelse
                                @endif
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <div>
                <label for="last-name" class="block text-sm font-semibold leading-6 text-gray-900">Desa</label>
                <div class="mt-2.5">
                    <div
                        x-data="{
                            open: false,
                            toggle() {
                                if (this.open) {
                                    return this.close()
                                }

                                this.$refs.input.focus()

                                this.open = true
                            },
                            close(focusAfter) {
                                if (! this.open) return

                                this.open = false

                                focusAfter && focusAfter.focus()
                            },
                        }"
                        x-on:keydown.escape.prevent.stop="close($refs.input)"
                        x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                        x-id="['dropdown-input']"
                        class="relative left-0 origin-top-right rounded-md w-full justify-self-end">
                        <input
                            x-ref="input"
                            x-on:click="toggle()"
                            :aria-expanded="open"
                            :aria-controls="$id('dropdown-input')"
                            id="dropdown-input" data-dropdown-toggle="dropdown"
                            type="text" wire:model.debounce.1000ms="buyer_village" name="buyer_village" autocomplete="buyer_village" class="block w-full rounded-md border-0 py-2 px-3.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <div
                            @close-modal.window="open = false"
                            x-ref="panel"
                            x-show="open"
                            x-transition.origin.top.left
                            x-on:click.outside="close($refs.input)"
                            :id="$id('dropdown-input')"
                            style="display: none;"
                            id="dropdown"
                            class="z-10 bg-white divide-y absolute left-0 mt-2 divide-gray-100 rounded-lg shadow w-44">
                            <div wire:loading.delay.shorter wire:target="buyer_village">
                                <span class="inline-flex w-full px-4 py-2 hover:bg-gray-100 "> Memuat.... </span>
                            </div>
                            <ul class="max-h-48 overflow-y-auto py-2 text-sm text-gray-700" aria-labelledby="dropdown-input">
                                @if (!empty($villages))
                                    @forelse ($villages as $village)
                                    <li>
                                        <button type="button" wire:click="updateAddress('village', {{ $village->id }}, '{{ $village->name }}')" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 ">{{ $village->name }}</button>
                                    </li>
                                        @empty
                                        <h3>No Data!!!</h3>
                                    @endforelse
                                @endif
                            </ul>

                        </div>
                    </div>
                </div>
                {{-- <div class="mt-2.5">
                <input type="text" wire:model="buyer_village" name="buyer_village" id="buyer_village" autocomplete="buyer_village" class="block w-full rounded-md border-0 py-2 px-3.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div> --}}
            </div>
            <div class="sm:col-span-2">
                <label for="message" class="block text-sm font-semibold leading-6 text-gray-900">Deskripsi Alamat</label>
                <div class="mt-2.5">
                <textarea name="address_description" wire:model="address_description" id="address_description" rows="4" class="block w-full rounded-md border-0 py-2 px-3.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                </div>
            </div>
        </div>
        <div class="relative overflow-x-auto mt-4">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3 rounded-l-lg">
                            Nama Produk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Qty
                        </th>
                        <th scope="col" class="px-6 py-3 rounded-r-lg">
                            Harga
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $key => $item)
                    <tr class="bg-white">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $item['name'] }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item['quantity'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item['price'] * $item['quantity'] }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="font-semibold text-gray-900">
                        <th scope="row" class="px-6 py-3 text-base">Total</th>
                        <td class="px-6 py-3">{{ $content->sum('quantity') }}</td>
                        <td class="px-6 py-3">{{ $total }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <label class="text-sm leading-6 text-gray-600" id="switch-1-label mt-4 mb-0">
            *Ongkos kirim akan dikalkulasi oleh admin, beserta diskon yang berlaku. harap isi form dan selanjutnya akan diarahkan ke Whatsapp admin untuk konfirmasi pembelian dan melakukan pembayaran.
            Jika ada pertanyaan lebih lanjut, jangan ragu untuk menghubungi admin.
        </label>
        <div class="flex gap-x-4 sm:col-span-2 mt-4">
            <div class="flex h-6 items-center">
            <!-- Enabled: "bg-indigo-600", Not Enabled: "bg-gray-200" -->
            <button type="button" class="bg-gray-200 flex w-8 flex-none cursor-pointer rounded-full p-px ring-1 ring-inset ring-gray-900/5 transition-colors duration-200 ease-in-out focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" role="switch" aria-checked="false" aria-labelledby="switch-1-label">
                <span class="sr-only">Agree to policies</span>
                <!-- Enabled: "translate-x-3.5", Not Enabled: "translate-x-0" -->
                <span aria-hidden="true" class="translate-x-0 h-4 w-4 transform rounded-full bg-white shadow-sm ring-1 ring-gray-900/5 transition duration-200 ease-in-out"></span>
            </button>
            </div>
            <label class="text-sm leading-6 text-gray-600" id="switch-1-label">
            Dengan mengirimkan form ini, saya setuju dengan <a href="#" class="font-semibold text-indigo-600">syarat&nbsp;ketentuan</a> dan <a href="#" class="font-semibold text-indigo-600">privacy&nbsp;policy</a>.
            </label>
        </div>
        <div class="mt-4">
            <button type="submit" wire:click="prefilMessage()" class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Kirim</button>
        </div>
    </div>
</div>
</div>
