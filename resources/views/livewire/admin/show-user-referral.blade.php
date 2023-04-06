<div>
    <div class="pt-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            Informasi Referral {{ $user->name }}
                        </h2>
                    </header>
                </div>
            </div>
            <div class="border-t border-gray-200 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="flex">
                    <svg class="relative h-6 w-6 text-blue-500 p-0.5 my-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm11.378-3.917c-.89-.777-2.366-.777-3.255 0a.75.75 0 01-.988-1.129c1.454-1.272 3.776-1.272 5.23 0 1.513 1.324 1.513 3.518 0 4.842a3.75 3.75 0 01-.837.552c-.676.328-1.028.774-1.028 1.152v.75a.75.75 0 01-1.5 0v-.75c0-1.279 1.06-2.107 1.875-2.502.182-.088.351-.199.503-.331.83-.727.83-1.857 0-2.584zM12 18a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                      </svg>
                    <span class="text-base font-semibold leading-6 text-gray-900 mx-2">Informasi Referral</span>
                </div>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Detail tentang referral dari reseller</p>
                <dl>
                    <div class="bg-gray-50  py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">Kode Referral</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $user->referral_code }}</dd>
                    </div>
                    <div class="bg-white  py-5 sm:grid sm:grid-cols-3 sm:gap-4 ">
                        <dt class="text-sm font-medium text-gray-500">Jumlah Pengguna </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $count_referral_user }}</dd>
                    </div>
                    <div class="bg-white  py-5 sm:grid sm:grid-cols-3 sm:gap-4 ">
                        <dt class="text-sm font-medium text-gray-500">Jumlah Bonus Yang Didapat </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $total_referral_fee }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</div>
