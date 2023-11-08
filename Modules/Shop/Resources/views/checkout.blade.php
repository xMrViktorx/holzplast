@extends('shop::layouts.master')

@section('content')
    <div class="min-h-screen flex justify-center items-center gap-8 pt-32 xl:pt-0">
        <form action="{{ route('shop.order') }}" method="POST" class="flex flex-wrap">
            @csrf
            <div class="w-full xl:w-auto p-6 xl:p-0 text-lg">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block tracking-wide font-medium mb-2" for="first_name">
                            Vezetéknév<span class="text-red-700">*</span>
                        </label>
                        <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="first_name" name="first_name" value="{{ old('first_name') }}" type="text">
                        @error('first_name')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block tracking-wide font-medium mb-2" for="last_name">
                            Keresztnév<span class="text-red-700">*</span>
                        </label>
                        <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="last_name" name="last_name" value="{{ old('last_name') }}" type="text">
                        @error('last_name')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block tracking-wide font-medium mb-2" for="email">
                            Email<span class="text-red-700">*</span>
                        </label>
                        <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="email" name="email" value="{{ old('email') }}" type="email">
                        @error('email')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block tracking-wide font-medium mb-2" for="country">
                            Ország<span class="text-red-700">*</span>
                        </label>
                        <div class="relative">
                            <select class="block appearance-none w-full py-3 px-4 pr-8 rounded leading-tight focus:outline-none" id="country" name="country" value="{{ old('country') }}">
                                <option selected value="Magyarország">Magyarország</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                            @error('country')
                                <div class="text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block tracking-wide font-medium mb-2" for="city">
                            Város<span class="text-red-700">*</span>
                        </label>
                        <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="city" name="city" value="{{ old('city') }}" type="text">
                        @error('city')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block tracking-wide font-medium mb-2" for="postcode">
                            Irányítószám<span class="text-red-700">*</span>
                        </label>
                        <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="postcode" name="postcode" value="{{ old('postcode') }}" type="text">
                        @error('postcode')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block tracking-wide font-medium mb-2" for="address">
                            Utca<span class="text-red-700">*</span>
                        </label>
                        <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="address" name="address" value="{{ old('address') }}" type="text">
                        @error('address')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block tracking-wide font-medium mb-2" for="house_number">
                            Házszám<span class="text-red-700">*</span>
                        </label>
                        <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="house_number" name="house_number" value="{{ old('house_number') }}" type="text">
                        @error('house_number')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block tracking-wide font-medium mb-2" for="phone">
                            Telefonszám<span class="text-red-700">*</span>
                        </label>
                        <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="phone" name="phone" value="{{ old('phone') }}" type="text">
                        @error('phone')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="w-full xl:w-96 shadow-xl ml-0 xl:ml-6 p-6">
                <h3 class="text-4xl font-bold mb-4">Kosár</h3>
                @foreach ($cart->cart_items as $item)
                    <div class="flex justify-between text-lg">
                        <p class="mb-4">{{ $item->quantity }} x {{ $item->name }}</p>
                        <p>{{ $item->total_price }} forint</p>
                    </div>
                @endforeach
                <div class="flex justify-between my-6 font-bold text-lg">
                    <p>Teljes összeg</p>
                    <p>{{ $cart->total_price }} forint</p>
                </div>
                <button type="submit" class="bg-backgroundNavbar px-8 py-2 rounded w-full block mb-3 text-center text-lg">Megrendelés</button>
                <a href="/" class="bg-backgroundNavbar px-8 py-2 rounded w-100 block text-center text-lg">Vissza a vásárláshoz</a>
            </div>
        </form>
    </div>
@endsection
