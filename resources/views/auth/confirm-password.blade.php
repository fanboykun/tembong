@extends('layouts.main')
@section('content')
<div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
        <div>
        <img class="mx-auto h-12 w-auto bg-slate-900 rounded-full" src="{{ asset('logo.png') }}" alt="Your Company">
        <p class="mt-2 text-center text-sm text-gray-600">
            Ini adalah area aman dari aplikasi. Mohon untuk konfirmasi password anda terlebih dahulu.
        </p>
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="sm:col-span-2 mt-4">
                <label for="password" class="block text-sm font-semibold leading-6 text-gray-900">Password</label>
                <div class="mt-2.5">
                    <input type="password" name="password" id="password" required autocomplete="current-password" class="block w-full rounded-md border-0 py-2 px-3.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
            </div>

            <div class="flex justify-end mt-4">
                <x-primary-button>
                    {{ __('Konfirmasi') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>

@endsection
