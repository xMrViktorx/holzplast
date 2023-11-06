@extends('shop::layouts.master')

@section('content')
    <div class="min-h-screen flex justify-center items-center gap-8">
        <form action="{{ route('shop.order') }}" method="POST" class="flex flex-wrap">
            @csrf
            <div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="first_name">
                            Vezetéknév
                        </label>
                        <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="first_name" name="first_name" value="{{ old('first_name') }}" type="text">
                        @error('first_name')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="last_name">
                            Keresztnév
                        </label>
                        <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="last_name" name="last_name" value="{{ old('last_name') }}" type="text">
                        @error('last_name')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="email">
                            Email
                        </label>
                        <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="email" name="email" value="{{ old('email') }}" type="email">
                        @error('email')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="country">
                            Ország
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
                        <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="city">
                            Város
                        </label>
                        <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="city" name="city" value="{{ old('city') }}" type="text">
                        @error('city')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="postcode">
                            Irányítószám
                        </label>
                        <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="postcode" name="postcode" value="{{ old('postcode') }}" type="text">
                        @error('postcode')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="address">
                            Utca
                        </label>
                        <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="address" name="address" value="{{ old('address') }}" type="text">
                        @error('address')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="house_number">
                            Házszám
                        </label>
                        <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="house_number" name="house_number" value="{{ old('house_number') }}" type="text">
                        @error('house_number')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-xs font-bold mb-2" for="phone">
                            Telefonszám
                        </label>
                        <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="phone" name="phone" value="{{ old('phone') }}" type="text">
                        @error('phone')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="w-96 shadow-xl ml-6 p-6">
                <h3>Kosár</h3>
                @foreach ($cart->cart_items as $item)
                    <div class="flex justify-between">
                        <p class="mb-4">{{ $item->quantity }} x {{ $item->name }}</p>
                        <p>{{ $item->total_price }} forint</p>
                    </div>
                @endforeach
                <div class="flex justify-between my-6 font-bold">
                    <p>Teljes összeg</p>
                    <p>{{ $cart->total_price }} forint</p>
                </div>
                <button type="submit" class="bg-backgroundNavbar px-8 py-2 rounded w-full block mb-3 text-center">Megrendelés</button>

                <a href="/" class="bg-backgroundNavbar px-8 py-2 rounded w-100 block text-center">Vissza a vásárláshoz</a>
            </div>
        </form>
    </div>
@endsection
