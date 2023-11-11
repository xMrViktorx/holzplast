@extends('admin::layouts.master')

@section('navigation')
    <div class="flex flex-col items-center justify-center h-screen">
        <form method="POST" action="{{ route('password.email') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email">
            </div>
            @error('email')
                <div class="text-red-700 max-w-[200px] mb-5">{{ $message }}</div>
            @enderror
            @if (session()->has('success'))
                <div class="text-green-600 max-w-[200px] mb-5">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Küldés
                </button>
                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="{{ route('admin.user.index') }}">Belépés</a>
            </div>
        </form>
        <p class="text-center text-gray-500 text-xs">
            &copy;{{ date('Y') }} <a href="https://molnarviktor.net" target="_blank" class="text-blue-700">Viktor Molnar</a>. Minden jog fenntartva.
        </p>
    </div>
@endsection
