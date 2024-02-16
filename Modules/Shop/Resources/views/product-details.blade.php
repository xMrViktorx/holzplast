@extends('shop::layouts.master')

@section('content')
    <div class="min-h-screen flex flex-wrap justify-center items-center gap-2 md:gap-6">
        <img class="max-h-[48rem] max-w-screen object-cover mt-28 md:mt-0" src="{{ url($product->productImage->path) }}" alt="">
        <div class="max-w-3xl px-3 py-5">
            <div class="font-bold text-3xl md:text-5xl mb-2">{{ $product->name }}</div>
            <div class="text-lg">{!! $product->description !!}</div>
            <div class="font-bold text-2xl my-4">{{ formatPrice($product->price) }} + Áfa</div>
            @if ($product->amount)
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <div class="flex items-center mb-4">
                        <span id="decreaseBtn" class="bg-backgroundNavbar px-4 py-2 rounded-l cursor-pointer flex items-center">
                            <i class="ri-subtract-line"></i>
                        </span>
                        <input type="text" id="numericInput" class="border border-gray-300 p-2 w-16 text-center focus:outline-none" value="1" name="quantity">
                        <span id="increaseBtn" class="bg-backgroundNavbar px-4 py-2 rounded-r cursor-pointer flex items-center">
                            <i class="ri-add-line"></i>
                        </span>
                    </div>
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <button type="submit" class="bg-backgroundNavbar px-9 py-2 text-lg cursor-pointer rounded shadow-lg hover:bg-backgroundMain flex items-center">Kosárba <i class="pl-1 ri-shopping-bag-line"></i>
                    </button>
                </form>
            @else
                <h3 class="text-2xl">Jelenleg nincs raktáron</h3>
            @endif
        </div>
    </div>

    <script>
        // Get the input element
        const inputElement = document.getElementById('numericInput');
        const decreaseBtn = document.getElementById('decreaseBtn');
        const increaseBtn = document.getElementById('increaseBtn');

        // Add an event listener for the input event
        inputElement.addEventListener('input', function() {
            // Remove non-numeric characters using a regular expression
            this.value = this.value.replace(/\D/g, '');
            if (!this.value) {
                this.value = 1;
            }
        });

        // Increase button click event listener
        increaseBtn.addEventListener('click', function() {
            let value = parseInt(inputElement.value);
            if (isNaN(value)) {
                inputElement.value = 1;
                return;
            }
            inputElement.value = ++value;
        });

        // Decrease button click event listener
        decreaseBtn.addEventListener('click', function() {
            let value = parseInt(inputElement.value);
            if (value > 1) {
                inputElement.value = --value;
            }
        });
    </script>
@endsection
