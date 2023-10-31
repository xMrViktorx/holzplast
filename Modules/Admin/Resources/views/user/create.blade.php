@extends('admin::layouts.navigation')

@section('content')
    <div class="bg-white p-6 shadow-md sm:rounded-lg">
        <form method="POST" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Név <span class="text-red-700">*</span></label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('name')
                    <div class="text-red-700">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email <span class="text-red-700">*</span></label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('email')
                    <div class="text-red-700">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Jelszó <span class="text-red-700">*</span></label>
                <input type="password" id="password" name="password" value="{{ old('password') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('password')
                    <div class="text-red-700">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Jelszó megerősítése <span class="text-red-700">*</span></label>
                <input type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                @error('password_confirmation')
                    <div class="text-red-700">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Mentés</button>
        </form>
    </div>
@endsection
