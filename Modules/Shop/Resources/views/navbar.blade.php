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
                        <li class="relative md:block hidden">
                            <a href="/{{ $category->slug }}" class="block py-4 text-center hover:text-white uppercase">{{ $category->name }}</a>
                            @if(count($category->categories) > 0)
                                <ul class="absolute left-1/2 transform -translate-x-1/2 hidden bg-backgroundNavbar z-10 subcategories" data-category="{{ $category->slug }}">
                                    @foreach ($category->categories as $subcategory)
                                        <li>
                                            <a href="/{{ $subcategory->slug }}" class="block py-2 px-4 text-center uppercase hover:text-white">{{ $subcategory->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>

                            @endif
                        </li>
                        <li class="md:hidden block">
                            <a href="/{{ $category->slug }}" class="py-4 text-center hover:text-white uppercase toggle-subcategories flex align-middle justify-center">{{ $category->name }} @if(count($category->categories) > 0) <i class="ri-arrow-right-s-line toggle-icon px-5"></i> @endif</a>
                            @if(count($category->categories) > 0)
                                <ul class="hidden bg-backgroundNavbar z-10 subcategories">
                                    @foreach ($category->categories as $subcategory)
                                        <li>
                                            <a href="/{{ $subcategory->slug }}" class="block py-4 text-center hover:text-white uppercase">{{ $subcategory->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        
        
        <div class="block md:hidden">
            @if (isset($cart) && $cart)
                <a href="{{ route('cart.index') }}" class="relative p-2 cursor-pointer hover:text-white">
                    <i class="ri-shopping-cart-line text-3xl"></i>
                    <div class="absolute right-0 top-0 font-bold">{{ isset($cart) && $cart ? $cart->items_count : '' }}</div>
                </a>
            @else
                <span class="mr-0 sm:mr-5 relative p-2 cursor-default">
                    <i class="ri-shopping-cart-line text-3xl"></i>
                </span>
            @endif
        </div>
        <div class="flex items-center w-full md:w-auto">
            <div class="hidden md:block">
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
            </div>
            <div class="text-black bg-backgroundMain flex items-center justify-center w-min m-auto my-2">
                <div class="overflow-hidden flex">
                    <form action="{{ route('shop.index') }}" method="GET">
                        <input type="text" name="search" class="px-4 py-2 bg-backgroundMain focus:outline-none placeholder-black" placeholder="Keresés...">
                    </form>
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
