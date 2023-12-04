@extends('shop::layouts.master')

@section('content')
    <div class="pt-32 flex justify-center items-center gap-8">
        @if ($cart)
            <div class="flex flex-wrap items-start shadow-xl p-4 sm:p-6">
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
                                <p class="w-48 text-left pl-2 "><span class="font-bold">{{ $item->name }}</span> <span class="block 2xl:hidden">{{ $item->quantity }} x {{ formatPrice($item->item_price) }} + Áfa</span></p>
                                <div class="w-48 items-center justify-center hidden 2xl:flex">
                                    <span id="decreaseBtn-{{ $item->id }}" class="bg-backgroundNavbar px-4 py-2 rounded-l decreaseBtn cursor-pointer flex items-center"><i class="ri-subtract-line"></i></span>
                                    <input type="text" id="numericInput-{{ $item->id }}" class="border border-gray-300 p-2 w-16 text-center quantityInput" value="{{ $item->quantity }}" name="quantity[{{ $item->id }}]">
                                    <span id="increaseBtn-{{ $item->id }}" class="bg-backgroundNavbar px-4 py-2 rounded-r increaseBtn cursor-pointer flex items-center"><i class="ri-add-line"></i></span>
                                </div>
                                <p class="w-48 hidden 2xl:block">{{ formatPrice($item->item_price) }} + Áfa</p>
                                <p class="w-48 font-bold hidden 2xl:block">{{ formatPrice($item->total_price) }} + Áfa</p>
                                <p class="w-20 flex justify-center">
                                    <a onclick="removeItem('{{ route('cart.remove.item', ['id' => $item->id]) }}')" class="text-2xl bg-backgroundNavbar hidden 2xl:flex px-4 py-2 w-min rounded cursor-pointer"><i class="ri-delete-bin-line"></i></a>
                                    <span class="text-2xl bg-backgroundNavbar flex 2xl:hidden px-4 py-2 w-min rounded cursor-pointer editBtn" data-item-id="{{ $item->id }}"><i class="ri-pencil-line"></i></span>
                                </p>
                            </div>

                            {{-- Modal for mobile item update --}}
                            <div id="editModal-{{ $item->id }}" class="hidden bottom-14 left-0 w-full bg-white p-4 2xl:hidden">
                                <div class="flex flex-col text-center">
                                    <a href="{{ route('cart.remove.item', $item->id) }}" class="text-lg underline">Törlés</a>
                                    <span id="closeModal-{{ $item->id }}" class="absolute top-0 right-0 p-2 pr-4 focus:outline-none closeModalBtn" data-item-id="{{ $item->id }}"><i class="ri-close-line text-3xl"></i></span>
                                    <div class="items-center justify-center flex my-4">
                                        <span id="decreaseBtn-{{ $item->id }}" class="bg-backgroundNavbar px-4 py-2 rounded-l decreaseBtn cursor-pointer flex items-center"><i class="ri-subtract-line"></i></span>
                                        <input type="text" id="numericInput-{{ $item->id }}" class="border border-gray-300 p-2 w-16 text-center quantityInput" value="{{ $item->quantity }}" name="quantity[{{ $item->id }}]">
                                        <span id="increaseBtn-{{ $item->id }}" class="bg-backgroundNavbar px-4 py-2 rounded-r increaseBtn cursor-pointer flex items-center"><i class="ri-add-line"></i></span>
                                    </div>
                                    <button class="bg-backgroundNavbar px-8 py-2 rounded block shadow-lg hover:bg-backgroundMain">Frissítés</button>
                                </div>
                            </div>
                        @endforeach
                        <div class="flex justify-between items-center text-lg">
                            <a class="underline cursor-pointer" onclick="removeAll('{{ route('cart.remove.all') }}')">Összes törlése</a>
                            <button class="bg-backgroundNavbar px-8 py-2 rounded hidden shadow-lg hover:bg-backgroundMain 2xl:block">Frissítés</button>
                        </div>
                    </form>
                </div>

                <div class="w-full 2xl:w-96 shadow-xl ml-0 2xl:ml-6 p-6">
                    <h3 class="text-4xl font-bold mb-4">Kosár</h3>
                    @foreach ($cart->cart_items as $item)
                        <div class="flex justify-between text-lg">
                            <p class="mb-4">{{ $item->quantity }} x {{ $item->name }}</p>
                            <p class="whitespace-nowrap pl-3">{{ formatPrice($item->total_price) }} + Áfa</p>
                        </div>
                    @endforeach
                    <div class="flex justify-between mt-6 mb-1 font-bold text-lg">
                        <p>Nettó összeg</p>
                        <p>{{ formatPrice($cart->total_price) }}</p>
                    </div>
                    <div class="flex justify-between my-1 font-bold text-lg">
                        <p>Szállítási költség</p>
                        @php
                            $cart_neto = $cart->total_price;

                            $full_orders = floor($cart_neto / 37000);

                            $remaining_amount = $cart_neto % 37000;

                            if ($remaining_amount > 0) {
                                $shipping_amount = ($full_orders + 1) * 1970;
                            } else {
                                $shipping_amount = $full_orders * 1970;
                            }

                        @endphp
                        <p>{{ formatPrice($shipping_amount) }}</p>
                    </div>
                    <div class="flex justify-between my-1 font-bold text-lg">
                        <p>Áfa</p>
                        <p>{{ formatPrice((($cart->total_price + $shipping_amount) * 0.27)) }}</p>
                    </div>
                    <div class="flex justify-between my-1 font-bold text-lg">
                        <p>Bruttó összeg</p>
                        <p>{{ formatPrice($cart->total_price + $shipping_amount + (($cart->total_price + $shipping_amount) * 0.27))}}</p>
                    </div>
                    <div class="flex justify-between mt-2 font-bold text-lg underline">
                        <p>Szállítási költség</p>
                    </div>
                    <div class="font-bold">
                        <p>minden megkezdett nettó 37000 Ft rendelési összeget, nettó 1970 Ft szállítási költség terhel</p>
                    </div>
                    <a href="{{ route('shop.checkout') }}" class="bg-backgroundNavbar mt-4 px-8 py-2 rounded w-100 block mb-3 text-center text-lg shadow-lg hover:bg-backgroundMain">Tovább</a>

                    <a href="/" class="bg-backgroundNavbar px-8 py-2 rounded w-100 block text-center text-lg shadow-lg hover:bg-backgroundMain">Vissza a vásárláshoz</a>
                </div>
            </div>
        @else
            <div class="flex justify-center flex-col">
                <h3 class="text-2xl">A kosár jelenleg üres</h3>
                <a href="/" class="bg-backgroundNavbar px-8 py-2 mt-3 text-lg cursor-pointer rounded shadow-lg hover:bg-backgroundMain text-center">Vásárlás folytatása</a>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const quantityInputs = document.querySelectorAll('.quantityInput');
        quantityInputs.forEach(quantityInput => {
            quantityInput.addEventListener("change", (event) => {
                const quantity = event.target.value;
                quantityInputs.forEach(inputElement => {
                    inputElement.value = quantity;
                });
            });
        });

        // Select all decrease buttons and add click event listener
        const decreaseButtons = document.querySelectorAll('.decreaseBtn');
        decreaseButtons.forEach(button => {
            button.addEventListener('click', function() {
                const itemId = button.id.split('-')[1];
                const input = button.nextElementSibling; // Get the next sibling element, which is the input field
                const quantity = parseInt(input.value) - 1;
                if (input && input.value > 1) {
                    quantityInputs.forEach(inputElement => {
                        inputElement.value = quantity;
                    });
                }
            });
        });

        // Select all increase buttons and add click event listener
        const increaseButtons = document.querySelectorAll('.increaseBtn');
        increaseButtons.forEach(button => {
            button.addEventListener('click', function() {
                const itemId = button.id.split('-')[1];
                const input = button.previousElementSibling; // Get the previous sibling element, which is the input field
                const quantity = parseInt(input.value) + 1;
                quantityInputs.forEach(inputElement => {
                    inputElement.value = quantity;
                });
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

        function removeAll(redirectURL) {
            Swal.fire({
                title: 'Biztos benne?',
                text: "Minden terméket ki szeretne törölni a kosárból?",
                icon: 'question',
                color: '#000',
                showCancelButton: true,
                confirmButtonColor: '#9AC084',
                cancelButtonColor: '#9AC084',
                confirmButtonText: "Törlés",
                cancelButtonText: "Vissza",
                customClass: {
                    confirmButton: 'swal-buttons',
                    cancelButton: 'swal-buttons'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = redirectURL;
                }
            })
        }

        function removeItem(redirectURL) {
            Swal.fire({
                title: 'Biztos benne?',
                text: "El szeretné távolítani a terméket a kosárból?",
                icon: 'question',
                color: '#000',
                showCancelButton: true,
                confirmButtonColor: '#9AC084',
                cancelButtonColor: '#9AC084',
                confirmButtonText: "Törlés",
                cancelButtonText: "Vissza",
                customClass: {
                    confirmButton: 'swal-buttons',
                    cancelButton: 'swal-buttons'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = redirectURL;
                }
            })
        }
    </script>
@endsection
