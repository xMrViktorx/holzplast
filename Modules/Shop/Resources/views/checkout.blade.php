@extends('shop::layouts.master')

@section('content')
    <div class="min-h-screen flex justify-center items-center gap-8 xl:pt-0">
        <form action="{{ route('shop.order') }}" method="POST" class="flex flex-wrap my-32">
            @csrf
            <div class="w-full xl:w-auto p-6 xl:p-0 text-lg">
                <h3 class="text-3xl font-bold mb-3">Számlázási cím</h3>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full flex items-center px-3 mb-0">
                        <input class="w-8 h-8 border-none outline-none focus:ring-0 mr-2" id="private_person_billing" name="billing[private_person]" value="1" type="checkbox" @if (@old('billing.private_person')) checked @endif>
                        <label class="tracking-wide font-medium" for="private_person_billing">
                            Magánszemély
                        </label>
                    </div>
                </div>
                <div id="company_details_billing" class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block tracking-wide font-medium mb-2" for="company_billing">
                            Cég neve<span class="text-red-700">*</span>
                        </label>
                        <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="company_billing" name="billing[company]" value="{{ old('billing.company') }}" type="text">
                        @error('billing.company')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block tracking-wide font-medium mb-2" for="tax_number_billing">
                            Adószám<span class="text-red-700">*</span>
                        </label>
                        <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="tax_number_billing" name="billing[tax_number]" value="{{ old('billing.tax_number') }}" type="text">
                        @error('billing.tax_number')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div id="person_details_billing" class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block tracking-wide font-medium mb-2" for="first_name_billing">
                            Vezetéknév<span class="text-red-700">*</span>
                        </label>
                        <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="first_name_billing" name="billing[first_name]" value="{{ old('billing.first_name') }}" type="text">
                        @error('billing.first_name')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block tracking-wide font-medium mb-2" for="last_name_billing">
                            Keresztnév<span class="text-red-700">*</span>
                        </label>
                        <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="last_name_billing" name="billing[last_name]" value="{{ old('billing.last_name') }}" type="text">
                        @error('billing.last_name')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block tracking-wide font-medium mb-2" for="email_billing">
                            Email<span class="text-red-700">*</span>
                        </label>
                        <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="email_billing" name="billing[email]" value="{{ old('billing.email') }}" type="email">
                        @error('billing.email')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-0 md:mb-6">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block tracking-wide font-medium mb-2" for="country_billing">
                            Ország<span class="text-red-700">*</span>
                        </label>
                        <div class="relative">
                            <select class="block appearance-none w-full py-3 px-4 pr-8 rounded leading-tight focus:outline-none" id="country_billing" name="billing[country]" value="{{ old('billing.country') }}">
                                <option selected value="Magyarország">Magyarország</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                            @error('billing.country')
                                <div class="text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block tracking-wide font-medium mb-2" for="city_billing">
                            Város<span class="text-red-700">*</span>
                        </label>
                        <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="city_billing" name="billing[city]" value="{{ old('billing.city') }}" type="text">
                        @error('billing.city')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block tracking-wide font-medium mb-2" for="postcode_billing">
                            Irányítószám<span class="text-red-700">*</span>
                        </label>
                        <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="postcode_billing" name="billing[postcode]" value="{{ old('billing.postcode') }}" type="text">
                        @error('billing.postcode')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex flex-wrap -mx-3">
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block tracking-wide font-medium mb-2" for="address_billing">
                            Utca<span class="text-red-700">*</span>
                        </label>
                        <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="address_billing" name="billing[address]" value="{{ old('billing.address') }}" type="text">
                        @error('billing.address')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block tracking-wide font-medium mb-2" for="house_number_billing">
                            Házszám<span class="text-red-700">*</span>
                        </label>
                        <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="house_number_billing" name="billing[house_number]" value="{{ old('billing.house_number') }}" type="text">
                        @error('billing.house_number')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                        <label class="block tracking-wide font-medium mb-2" for="phone_billing">
                            Telefonszám<span class="text-red-700">*</span>
                        </label>
                        <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="phone_billing" name="billing[phone]" value="{{ old('billing.phone') }}" type="text">
                        @error('billing.phone')
                            <div class="text-red-700">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex flex-wrap mt-0 md:mt-6">
                        <div class="w-full flex items-center px-3 mb-0">
                            <input class="w-8 h-8 border-none outline-none focus:ring-0 mr-2" id="use_as_shipping_address" name="use_as_shipping_address" value="1" type="checkbox" @if (@old('use_as_shipping_address')) checked @endif>
                            <label class="tracking-wide font-medium" for="use_as_shipping_address">
                                Használat mint szállítási cím
                            </label>
                        </div>
                    </div>
                </div>



                <div id="shipping_fields">
                    <h3 class="text-3xl font-bold mb-3 mt-12">Szállítási cím</h3>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full flex items-center px-3 mb-0">
                            <input class="w-8 h-8 border-none outline-none focus:ring-0 mr-2" id="private_person_shipping" name="shipping[private_person]" value="1" type="checkbox" @if (@old('shipping.private_person')) checked @endif>
                            <label class="tracking-wide font-medium" for="private_person">
                                Magánszemély
                            </label>
                        </div>
                    </div>
                    <div id="company_details_shipping" class="flex flex-wrap -mx-3 mb-0 md:mb-6">
                        <div class="w-full px-3 mb-6 md:mb-0">
                            <label class="block tracking-wide font-medium mb-2" for="company_shipping">
                                Cég neve<span class="text-red-700">*</span>
                            </label>
                            <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="company_shipping" name="shipping[company]" value="{{ old('shipping.company') }}" type="text">
                            @error('shipping.company')
                                <div class="text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div id="person_details_shipping" class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block tracking-wide font-medium mb-2" for="first_name_shipping">
                                Vezetéknév<span class="text-red-700">*</span>
                            </label>
                            <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="first_name_shipping" name="shipping[first_name]" value="{{ old('shipping.first_name') }}" type="text">
                            @error('shipping.first_name')
                                <div class="text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <label class="block tracking-wide font-medium mb-2" for="last_name_shipping">
                                Keresztnév<span class="text-red-700">*</span>
                            </label>
                            <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="last_name_shipping" name="shipping[last_name]" value="{{ old('shipping.last_name') }}" type="text">
                            @error('shipping.last_name')
                                <div class="text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <label class="block tracking-wide font-medium mb-2" for="email_shipping">
                                Email<span class="text-red-700">*</span>
                            </label>
                            <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="email_shipping" name="shipping[email]" value="{{ old('shipping.email') }}" type="email">
                            @error('shipping.email')
                                <div class="text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-0 md:mb-6">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block tracking-wide font-medium mb-2" for="country_shipping">
                                Ország<span class="text-red-700">*</span>
                            </label>
                            <div class="relative">
                                <select class="block appearance-none w-full py-3 px-4 pr-8 rounded leading-tight focus:outline-none" id="country_shipping" name="shipping[country]" value="{{ old('shipping.country') }}">
                                    <option selected value="Magyarország">Magyarország</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                                @error('shipping.country')
                                    <div class="text-red-700">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block tracking-wide font-medium mb-2" for="city">
                                Város<span class="text-red-700">*</span>
                            </label>
                            <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="city_shipping" name="shipping[city]" value="{{ old('shipping.city') }}" type="text">
                            @error('shipping.city')
                                <div class="text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block tracking-wide font-medium mb-2" for="postcode_shipping">
                                Irányítószám<span class="text-red-700">*</span>
                            </label>
                            <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="postcode_shipping" name="shipping[postcode]" value="{{ old('shipping.postcode') }}" type="text">
                            @error('shipping.postcode')
                                <div class="text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block tracking-wide font-medium mb-2" for="address_shipping">
                                Utca<span class="text-red-700">*</span>
                            </label>
                            <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="address_shipping" name="shipping[address]" value="{{ old('shipping.address') }}" type="text">
                            @error('shipping.address')
                                <div class="text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block tracking-wide font-medium mb-2" for="house_number_shipping">
                                Házszám<span class="text-red-700">*</span>
                            </label>
                            <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="house_number_shipping" name="shipping[house_number]" value="{{ old('shipping.house_number') }}" type="text">
                            @error('shipping.house_number')
                                <div class="text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block tracking-wide font-medium mb-2" for="phone_shipping">
                                Telefonszám<span class="text-red-700">*</span>
                            </label>
                            <input class="appearance-none block w-full rounded py-3 px-4 leading-tight focus:outline-none" id="phone_shipping" name="shipping[phone]" value="{{ old('shipping.phone') }}" type="text">
                            @error('shipping.phone')
                                <div class="text-red-700">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full xl:w-96 shadow-xl ml-0 xl:ml-6 p-6">
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

                        $full_orders = floor($cart_neto / 35000);

                        $remaining_amount = $cart_neto % 35000;

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
                    <p>{{ formatPrice($cart->total_price + $shipping_amount + (($cart->total_price + $shipping_amount) * 0.27)) }}</p>
                </div>
                <div class="flex justify-between mt-2 font-bold text-lg underline">
                    <p>Szállítási költség</p>
                </div>
                <div class="font-bold">
                    <p>minden megkezdett nettó 35000 Ft rendelési összeget, nettó 1970 Ft szállítási költség terhel</p>
                </div>
                <div class="w-full flex flex-col my-3">
                    <div class="my-1 font-bold text-lg">Fizetés<span class="text-red-700">*</span></div>
                    <div class="flex mb-2 items-center">
                        <input class="w-6 h-6 border-none outline-none focus:ring-0 mr-2" name="pickup" value="prepayment" type="radio" @if (@old('pickup') == 'prepayment') checked @endif>
                        <label class="tracking-wide font-medium">Előrefizetés</label>
                    </div>
                    <div class="flex items-center">
                        <input class="w-6 h-6 border-none outline-none focus:ring-0 mr-2" name="pickup" value="delivery" type="radio" @if (@old('pickup') == 'delivery') checked @endif>
                        <label class="tracking-wide font-medium">Utánvétel (nettó 500 Ft)</label>
                    </div>
                    @error('pickup')
                        <div class="text-red-700 mt-2">Fizetési opció választása kötelező!</div>
                    @enderror
                </div>
                <div class="w-full flex items-center my-3">
                    <input class="w-8 h-8 border-none outline-none focus:ring-0 mr-2" name="data_privacy" value="1" type="checkbox" @if (@old('data_privacy')) checked @endif>
                    <label class="tracking-wide font-medium">
                        Elfogadom az <a href="#" class="underline">Általános Szerződési Feltételeket.</a><span class="text-red-700">*</span>
                    </label>
                </div>
                @error('data_privacy')
                    <div class="text-red-700 mb-2">Általános Szerződési Feltételek elfogadása kötelező!</div>
                @enderror
                <button type="submit" class="bg-backgroundNavbar px-8 py-2 rounded w-full block mb-3 text-center text-lg shadow-lg hover:bg-backgroundMain">Megrendelés</button>
                <a href="/" class="bg-backgroundNavbar px-8 py-2 rounded w-100 block text-center text-lg shadow-lg hover:bg-backgroundMain">Vissza a vásárláshoz</a>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            //For Billing address

            // Get references to the checkbox and the fields
            var privatePersonCheckboxBilling = document.getElementById("private_person_billing");
            var companyFieldsBilling = document.getElementById("company_details_billing");
            var personFieldsBilling = document.getElementById("person_details_billing");

            // Function to toggle visibility based on checkbox state
            function toggleFieldsVisibilityBilling() {
                if (privatePersonCheckboxBilling.checked) {
                    // If private_person is checked, hide company and tax_number, show first and last name
                    companyFieldsBilling.classList.add("hidden");
                    personFieldsBilling.classList.remove("hidden");
                } else {
                    // If private_person is not checked, show company and tax_number, hide first and last name
                    companyFieldsBilling.classList.remove("hidden");
                    personFieldsBilling.classList.add("hidden");
                }
            }

            // Initial visibility setup
            toggleFieldsVisibilityBilling();

            // Attach event listener to the checkbox to update visibility on change
            privatePersonCheckboxBilling.addEventListener("change", toggleFieldsVisibilityBilling);


            //For Shipping address

            // Get references to the checkbox and the fields
            var privatePersonCheckboxShipping = document.getElementById("private_person_shipping");
            var companyFieldsShipping = document.getElementById("company_details_shipping");
            var personFieldsShipping = document.getElementById("person_details_shipping");

            // Function to toggle visibility based on checkbox state
            function toggleFieldsVisibilityShipping() {
                if (privatePersonCheckboxShipping.checked) {
                    // If private_person is checked, hide company and tax_number, show first and last name
                    companyFieldsShipping.classList.add("hidden");
                    personFieldsShipping.classList.remove("hidden");
                } else {
                    // If private_person is not checked, show company and tax_number, hide first and last name
                    companyFieldsShipping.classList.remove("hidden");
                    personFieldsShipping.classList.add("hidden");
                }
            }

            // Initial visibility setup
            toggleFieldsVisibilityShipping();

            // Attach event listener to the checkbox to update visibility on change
            privatePersonCheckboxShipping.addEventListener("change", toggleFieldsVisibilityShipping);



            // Use billing as shipping address

            // Get references to the checkbox and the fields
            var useAsShippingAddress = document.getElementById("use_as_shipping_address");
            var shippingFields = document.getElementById("shipping_fields");

            // Function to toggle visibility based on checkbox state
            function toggleShipping() {
                if (useAsShippingAddress.checked) {
                    // If private_person is checked, hide company and tax_number, show first and last name
                    shippingFields.classList.add("hidden");
                } else {
                    // If private_person is not checked, show company and tax_number, hide first and last name
                    shippingFields.classList.remove("hidden");
                }
            }

            // Initial visibility setup
            toggleShipping();

            // Attach event listener to the checkbox to update visibility on change
            useAsShippingAddress.addEventListener("change", toggleShipping);

        });
    </script>
@endsection
