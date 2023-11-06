@extends('shop::layouts.master')

@section('content')
    <div class="min-h-screen flex justify-center items-center gap-8">
        @if ($cart)
            <div class="flex flex-wrap items-start shadow-xl p-6">
                <div>
                    <div class="flex text-center font-bold mb-3">
                        <p class="w-96 text-left">Termék</p>
                        <p class="w-48">Mennyiség</p>
                        <p class="w-48">Darab ár</p>
                        <p class="w-48">Teljes összeg</p>
                        <p class="w-48">Akciók</p>
                    </div>
                    <form action="{{ route('cart.update') }}" method="POST">
                        @csrf
                        @foreach ($cart->cart_items as $item)
                            <div class="flex items-center text-center mb-6">
                                <img class="w-48 max-h-48 object-cover" src="{{ url($item->product->productImage->path) }}" alt="">
                                <p class="w-48 text-left pl-2">{{ $item->name }}</p>
                                <div class="w-48 flex items-center justify-center">
                                    <span id="decreaseBtn-{{ $item->id }}" class="bg-backgroundNavbar px-3 py-1 rounded-l decreaseBtn cursor-pointer">-</span>
                                    <input type="text" id="numericInput-{{ $item->id }}" class="border border-gray-300 px-3 py-1 w-16 text-center quantityInput" value="{{ $item->quantity }}" name="quantity[{{ $item->id }}]">
                                    <span id="increaseBtn-{{ $item->id }}" class="bg-backgroundNavbar px-3 py-1 rounded-r increaseBtn cursor-pointer">+</span>
                                </div>
                                <p class="w-48">{{ $item->item_price }} forint</p>
                                <p class="w-48 font-bold">{{ $item->total_price }} forint</p>
                                <p class="w-48 flex justify-center"><span class="text-2xl bg-backgroundNavbar flex px-2 py-1 w-min rounded cursor-pointer"><i class="ri-delete-bin-line"></i></span></p>
                            </div>
                        @endforeach
                        <div class="flex justify-between items-center">
                            <form action="{{ route('cart.remove.all') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $cart->id }}" name="id">
                                <button type="submit" class="underline">Összes törlése</button>
                            </form>
                            <button class="bg-backgroundNavbar px-8 py-2 rounded">Frissítés</button>
                        </div>
                    </form>
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
                    <a href="{{ route('shop.checkout') }}" class="bg-backgroundNavbar px-8 py-2 rounded w-100 block mb-3 text-center">Tovább</a>

                    <a href="/" class="bg-backgroundNavbar px-8 py-2 rounded w-100 block text-center">Vissza a vásárláshoz</a>
                </div>
            </div>
        @else
            <div class="flex justify-center flex-col">
                <h3 class="text-2xl">A kosár jelenleg üres</h3>
                <a href="/" class="bg-backgroundNavbar p-2 px-9 mt-3 text-lg cursor-pointer rounded shadow-lg hover:bg-backgroundMain text-center">Vásárlás folytatása</a>
            </div>
        @endif
    </div>

    <script>
        const decreaseButtons = document.querySelectorAll('.decreaseBtn');
        const increaseButtons = document.querySelectorAll('.increaseBtn');
        const quantityInputs = document.querySelectorAll('.quantityInput');

        // Add an input event listener for each quantity input
        quantityInputs.forEach(inputElement => {
            inputElement.addEventListener('input', function() {
                // Remove non-numeric characters using a regular expression
                this.value = this.value.replace(/\D/g, '');
            });
        });

        decreaseButtons.forEach(button => {
            button.addEventListener('click', function() {
                const itemId = button.id.split('-')[1];
                const input = document.getElementById(`numericInput-${itemId}`);
                if (input.value > 1) {
                    input.value = parseInt(input.value) - 1;
                }
            });
        });

        increaseButtons.forEach(button => {
            button.addEventListener('click', function() {
                const itemId = button.id.split('-')[1];
                const input = document.getElementById(`numericInput-${itemId}`);
                input.value = parseInt(input.value) + 1;
            });
        });
    </script>
@endsection
