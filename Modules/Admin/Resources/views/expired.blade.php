@extends('admin::layouts.master')

@section('navigation')
    <div class="flex flex-col items-center justify-center h-screen">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <p class="text-red-700 mb-3">Érvénytelen vagy lejárt token. Próbáld újra!</p>
            <div class="flex items-center justify-between">
                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="{{ route('admin.user.index') }}">Belépés</a>
            </div>
        </div>
        <p class="text-center text-gray-500 text-xs">
            &copy;{{ date('Y') }} <a href="https://molnarviktor.net" target="_blank" class="text-blue-700">Viktor Molnar</a>. Minden jog fenntartva.
        </p>
    </div>
@endsection
