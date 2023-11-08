@extends('shop::layouts.master')

@section('content')
    <div class="min-h-screen pt-32 2xl:pt-0 flex justify-center items-center gap-8">
        @if ($cart)
            <div class="flex flex-wrap items-start shadow-xl p-6">
                <div>
                    <div class="hidden 2xl:flex text-center font-bold mb-3 text-xl">
                        <p class="w-96 text-left">Termék</p>
                        <p class="w-48">Mennyiség</p>
                        <p class="w-48">Darab ár</p>
                        <p class="w-48">Teljes összeg</p>
                        <p class="w-20">Akciók</p>
                    </div>
                    <form action="{{ route('cart.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $cart->id }}">
                        @foreach ($cart->cart_items as $item)
                            <div class="flex items-center text-center mb-6 text-lg">
                                <img class="w-32 2xl:w-48 max-h-48 object-cover" src="{{ url($item->product->productImage->path) }}" alt="">
                                <p class="w-48 text-left pl-2 "><span class="font-bold">{{ $item->name }}</span> <span class="block 2xl:hidden">{{ $item->quantity }} x {{ $item->item_price }} forint</span></p>
                                <div class="w-48 items-center justify-center hidden 2xl:flex">
                                    <span id="decreaseBtn-{{ $item->id }}" class="bg-backgroundNavbar px-4 py-2 rounded-l decreaseBtn cursor-pointer flex items-center"><i class="ri-subtract-line"></i></span>
                                    <input type="text" id="numericInput-{{ $item->id }}" class="border border-gray-300 p-2 w-16 text-center quantityInput" value="{{ $item->quantity }}" name="quantity[{{ $item->id }}]">
                                    <span id="increaseBtn-{{ $item->id }}" class="bg-backgroundNavbar px-4 py-2 rounded-r increaseBtn cursor-pointer flex items-center"><i class="ri-add-line"></i></span>
                                </div>
                                <p class="w-48 hidden 2xl:block">{{ $item->item_price }} forint</p>
                                <p class="w-48 font-bold hidden 2xl:block">{{ $item->total_price }} forint</p>
                                <p class="w-20 flex justify-center">
                                    <a href="{{ route('cart.remove.item', $item->id) }}" class="text-2xl bg-backgroundNavbar hidden 2xl:flex px-4 py-2 w-min rounded cursor-pointer"><i class="ri-delete-bin-line"></i></a>
                                    <span class="text-2xl bg-backgroundNavbar flex 2xl:hidden px-4 py-2 w-min rounded cursor-pointer editBtn" data-item-id="{{ $item->id }}"><i class="ri-pencil-line"></i></span>
                                </p>
                            </div>

                            {{-- Modal for mobile item update --}}
                            <div id="editModal-{{ $item->id }}" class="hidden bottom-0 left-0 w-full bg-white p-4 2xl:hidden">
                                <div class="flex flex-col text-center">
                                    <a href="{{ route('cart.remove.item', $item->id) }}" class="text-lg underline">Törlés</a>
                                    <span id="closeModal-{{ $item->id }}" class="absolute top-0 right-0 p-2 pr-4 focus:outline-none closeModalBtn" data-item-id="{{ $item->id }}"><i class="ri-close-line text-3xl"></i></span>
                                    <div class="items-center justify-center flex my-4">
                                        <span id="decreaseBtn-{{ $item->id }}" class="bg-backgroundNavbar px-4 py-2 rounded-l decreaseBtn cursor-pointer flex items-center"><i class="ri-subtract-line"></i></span>
                                        <input type="text" id="numericInput-{{ $item->id }}" class="border border-gray-300 p-2 w-16 text-center quantityInput" value="{{ $item->quantity }}" name="quantity[{{ $item->id }}]">
                                        <span id="increaseBtn-{{ $item->id }}" class="bg-backgroundNavbar px-4 py-2 rounded-r increaseBtn cursor-pointer flex items-center"><i class="ri-add-line"></i></span>
                                    </div>
                                    <button class="bg-backgroundNavbar px-8 py-2 rounded block">Frissítés</button>
                                </div>
                            </div>
                        @endforeach
                        <div class="flex justify-between items-center text-lg">
                            <a href="{{ route('cart.remove.all') }}" class="underline">Összes törlése</a>
                            <button class="bg-backgroundNavbar px-8 py-2 rounded hidden 2xl:block">Frissítés</button>
                        </div>
                    </form>
                </div>

                <div class="w-full 2xl:w-96 shadow-xl ml-0 2xl:ml-6 p-6">
                    <h3 class="text-4xl font-bold mb-4">Kosár</h3>
                    @foreach ($cart->cart_items as $item)
                        <div class="flex justify-between text-lg">
                            <p class="mb-4">{{ $item->quantity }} x {{ $item->name }}</p>
                            <p class="whitespace-nowrap">{{ $item->total_price }} forint</p>
                        </div>
                    @endforeach
                    <div class="flex justify-between my-6 font-bold text-lg">
                        <p>Teljes összeg</p>
                        <p>{{ $cart->total_price }} forint</p>
                    </div>
                    <a href="{{ route('shop.checkout') }}" class="bg-backgroundNavbar px-8 py-2 rounded w-100 block mb-3 text-center text-lg">Tovább</a>

                    <a href="/" class="bg-backgroundNavbar px-8 py-2 rounded w-100 block text-center text-lg">Vissza a vásárláshoz</a>
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
        const quantityInputs = document.querySelectorAll('.quantityInput');

        // Add an input event listener for each quantity input
        quantityInputs.forEach(inputElement => {
            inputElement.addEventListener('input', function() {
                // Remove non-numeric characters using a regular expression
                this.value = this.value.replace(/\D/g, '');
            });
        });

        // Select all decrease buttons and add click event listener
        const decreaseButtons = document.querySelectorAll('.decreaseBtn');
        decreaseButtons.forEach(button => {
            button.addEventListener('click', function() {
                const itemId = button.id.split('-')[1];
                const input = button.nextElementSibling; // Get the next sibling element, which is the input field
                if (input && input.value > 1) {
                    input.value = parseInt(input.value) - 1;
                }
            });
        });

        // Select all increase buttons and add click event listener
        const increaseButtons = document.querySelectorAll('.increaseBtn');
        increaseButtons.forEach(button => {
            button.addEventListener('click', function() {
                const itemId = button.id.split('-')[1];
                const input = button.previousElementSibling; // Get the previous sibling element, which is the input field
                if (input) {
                    input.value = parseInt(input.value) + 1;
                }
            });
        });

        // Select all pencil icons and add click event listener
        const editIcons = document.querySelectorAll('.editBtn');
        editIcons.forEach(icon => {
            icon.addEventListener('click', function() {
                const itemId = icon.dataset.itemId; // Get the data-item-id attribute value
                const editModal = document.getElementById(`editModal-${itemId}`);
                if (editModal) {
                    editModal.classList.remove('hidden'); // Remove the 'hidden' class to show the modal
                    editModal.classList.add('fixed'); // Remove the 'hidden' class to show the modal
                }
            });
        });

        // Select all pencil icons and add click event listener
        const closeIcons = document.querySelectorAll('.closeModalBtn');
        closeIcons.forEach(icon => {
            icon.addEventListener('click', function() {
                const itemId = icon.dataset.itemId; // Get the data-item-id attribute value
                const editModal = document.getElementById(`editModal-${itemId}`);
                if (editModal) {
                    editModal.classList.remove('fixed'); // Remove the 'hidden' class to show the modal
                    editModal.classList.add('hidden'); // Remove the 'hidden' class to show the modal
                }
            });
        });
    </script>
@endsection
