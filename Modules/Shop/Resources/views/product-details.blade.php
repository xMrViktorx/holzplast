@extends('shop::layouts.master')

@section('content')
    <div class="h-screen flex flex-wrap justify-center items-center gap-8">
        <img class="max-h-[48rem] max-w-screen object-cover" src="{{ url($product->productImage->path) }}" alt="">
        <div class="max-w-3xl py-5">
            <div class="font-bold text-4xl mb-2">{{ $product->name }}</div>
            {!! $product->description !!}
            <div class="font-bold text-xl my-4">{{ $product->price }} forint</div>
            <div class="flex items-center mb-4">
                <button id="decreaseBtn" class="bg-backgroundNavbar px-3 py-1 rounded-l">-</button>
                <input type="text" id="numericInput" class="border border-gray-300 px-3 py-1 w-16 text-center" value="1" name="quantity">
                <button id="increaseBtn" class="bg-backgroundNavbar px-3 py-1 rounded-r">+</button>
            </div>
            <input type="hidden" name="product_id" value="{{ $product->id }}">

            <button class="bg-backgroundNavbar px-8 py-2 rounded">Megrendelés</button>
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
        });

        // Increase button click event listener
        increaseBtn.addEventListener('click', function() {
            let value = parseInt(inputElement.value);
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
