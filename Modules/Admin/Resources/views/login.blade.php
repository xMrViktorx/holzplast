@extends('admin::layouts.master')

@section('navigation')
    <div class="flex flex-col items-center justify-center h-screen">
        <form method="POST" action="{{ route('admin.login') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="text">
            </div>
            <div>
                <label class="block text-gray-700 text-sm font-bold mb-3" for="password">
                    Jelszó
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password">
                @error('email')
                    <div class="text-red-700 max-w-[200px]">{{ $message }}</div>
                @enderror
                @error('password')
                    <div class="text-red-700 max-w-[200px]">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{ route('password.forgot') }}" class="text-blue-700">Elfelejtetted a jelszavad?</a>
            <div class="flex items-center justify-between mt-6">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Belépés
                </button>
            </div>
        </form>
        <p class="text-center text-gray-500 text-xs">
            &copy;{{ date('Y') }} <a href="https://molnarviktor.net" target="_blank" class="text-blue-700">Viktor Molnar</a>. Minden jog fenntartva.
        </p>
    </div>
@endsection
