@extends('admin::layouts.master')

@section('navigation')
    <div class="flex flex-col items-center justify-center h-screen">
        <form method="POST" action="{{ route('password.reset.save', $token) }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Jelszó
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password">
                @error('password')
                    <div class="text-red-700 max-w-[200px]">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">
                    Jelszó megerősítése
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password_confirmation" name="password_confirmation" type="password">
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Küldés
                </button>
            </div>
        </form>
        <p class="text-center text-gray-500 text-xs">
            &copy;{{ date('Y') }} <a href="https://molnarviktor.net" target="_blank" class="text-blue-700">Viktor Molnar</a>. Minden jog fenntartva.
        </p>
    </div>
@endsection
