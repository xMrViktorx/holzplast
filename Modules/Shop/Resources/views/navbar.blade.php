@php
    $categories = Modules\Shop\Http\Controllers\ShopController::getCategories();
    if (session()->has('cart')) {
        $cart = Modules\Shop\Entities\Cart::find(session()->get('cart')->id);
    }
@endphp

<nav class="bg-backgroundNavbar px-2 sm:px-4 py-2 fixed z-10 w-full">
    <div class="flex flex-wrap justify-between items-center mx-auto">
        <a href="/" class="flex">
            <img src="{{ url('build/images/logo.png') }}" alt="logo" class="h-8">
        </a>
        <div class="md:flex md:flex-row-reverse contents">
            <div class="hidden md:block w-full md:w-auto order-2" id="mobile-menu">
                <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 text-base font-bold">
                    @foreach ($categories as $category)
                        <li>
                            <a href="/{{ $category->slug }}" class="block py-4 text-center hover:text-white uppercase">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="flex items-center">
            @if (isset($cart) && $cart)
                <a href="{{ route('cart.index') }}" class="mr-5 relative p-2 cursor-pointer hover:text-white">
                    <i class="ri-shopping-cart-line text-3xl"></i>
                    <div class="absolute right-0 top-0 font-bold">{{ isset($cart) && $cart ? $cart->items_count : '' }}</div>
                </a>
            @else
                <span class="mr-5 relative p-2 cursor-default">
                    <i class="ri-shopping-cart-line text-3xl"></i>
                </span>
            @endif
            <div class="text-black bg-backgroundMain flex items-center justify-center w-min m-auto my-2">
                <div class="overflow-hidden flex">
                    <input type="text" class="px-4 py-2 bg-backgroundMain focus:outline-none placeholder-black" placeholder="Keresés...">
                    <button class="flex items-center justify-center px-4">
                        <svg class="h-4 w-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z" />
                        </svg>
                    </button>
                </div>
            </div>
            <button class="inline-flex items-center py-2 ml-3 text-sm rounded-lg md:hidden focus:outline-none md:order-3 order-2" onclick="toogleNav()">
                <svg class="w-6 h-6" id="hamburger-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
                <svg class="hidden w-6 h-6 animate-card-opacity focus:outline-none" id="close-icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>
</nav>

<script>
    function toogleNav() {
        document.getElementById('mobile-menu').classList.toggle("hidden");
        document.getElementById('hamburger-icon').classList.toggle("hidden");
        document.getElementById('close-icon').classList.toggle("hidden");
    }
</script>
