@extends('admin::layouts.navigation')

@section('content')
    <div class="bg-white p-6 shadow-md sm:rounded-lg relative">

        <div class="absolute top-0 right-0 m-3 flex gap-3">
            @if ($order->status == 'in progress')
                <form method="POST" action="{{ route('admin.order.update', $order->id) }}">
                    @csrf
                    <input type="hidden" name="status" value="delivered">
                    <button type="submit" class="text-black bg-green-400 hover:bg-green-500 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Szállítás</button>
                </form>
                <form method="POST" action="{{ route('admin.order.update', $order->id) }}">
                    @csrf
                    <input type="hidden" name="status" value="canceled">
                    <button type="submit" class="text-black bg-red-400 hover:bg-red-500 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Visszavonás</button>
                </form>
            @elseif($order->status == 'delivered')
                <button disabled class="text-black bg-green-400 hover:bg-green-500 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Kiszállítva</button>
            @else
                <button disabled class="text-black bg-red-400 hover:bg-red-500 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Visszavonva</button>
            @endif
        </div>

        <h3 class="text-2xl mb-6 mt-8 sm:mt-0">Megrendelő adatai</h3>

        <div class="relative shadow-md sm:rounded-lg flex flex-wrap gap-6">
            <table class="text-sm text-left text-gray-500">
                <tr>
                    <th colspan="2" scope="col" class="py-3 px-6 text-gray-700 text-center uppercase bg-gray-50">
                        Számlázási cím
                    </th>
                </tr>
                <tr>
                    <th scope="col" class="py-3 px-6 text-gray-700 text-xs uppercase bg-gray-50">
                        Név
                    </th>
                    <th scope="row" class="py-4 px-6">
                        @if ($billing_address->company)
                            {{ $billing_address->company }}
                        @else
                            {{ $billing_address->first_name }} {{ $billing_address->last_name }}
                        @endif
                    </th>
                </tr>
                <tr>
                    <th scope="col" class="py-3 px-6 text-gray-700 text-xs uppercase bg-gray-50">
                        Ország
                    </th>
                    <th scope="row" class="py-4 px-6">
                        {{ $billing_address->country }}
                    </th>
                </tr>
                <tr>
                    <th scope="col" class="py-3 px-6 text-gray-700 text-xs uppercase bg-gray-50">
                        Város
                    </th>
                    <th scope="row" class="py-4 px-6">
                        {{ $billing_address->city }}
                    </th>
                </tr>
                <tr>
                    <th scope="col" class="py-3 px-6 text-gray-700 text-xs uppercase bg-gray-50">
                        Irányítószám
                    </th>
                    <th scope="row" class="py-4 px-6">
                        {{ $billing_address->postcode }}
                    </th>
                </tr>
                <tr>
                    <th scope="col" class="py-3 px-6 text-gray-700 text-xs uppercase bg-gray-50">
                        Cím
                    </th>
                    <th scope="row" class="py-4 px-6">
                        {{ $billing_address->address }} {{ $billing_address->house_number }}
                    </th>
                </tr>
                <tr>
                    <th scope="col" class="py-3 px-6 text-gray-700 text-xs uppercase bg-gray-50">
                        Email
                    </th>
                    <th scope="row" class="py-4 px-6">
                        {{ $billing_address->email }}
                    </th>
                </tr>
                <tr>
                    <th scope="col" class="py-3 px-6 text-gray-700 text-xs uppercase bg-gray-50">
                        Telefonszám
                    </th>
                    <th scope="row" class="py-4 px-6">
                        {{ $billing_address->phone }}
                    </th>
                </tr>
            </table>
            <table class="text-sm text-left text-gray-500">
                <tr>
                    <th colspan="2" scope="col" class="py-3 px-6 text-gray-700 text-center uppercase bg-gray-50">
                        Szállítási cím
                    </th>
                </tr>
                <tr>
                    <th scope="col" class="py-3 px-6 text-gray-700 text-xs uppercase bg-gray-50">
                        Név
                    </th>
                    <th scope="row" class="py-4 px-6">
                        @if ($shipping_address->company)
                            {{ $shipping_address->company }}
                        @else
                            {{ $shipping_address->first_name }} {{ $shipping_address->last_name }}
                        @endif
                    </th>
                </tr>
                <tr>
                    <th scope="col" class="py-3 px-6 text-gray-700 text-xs uppercase bg-gray-50">
                        Ország
                    </th>
                    <th scope="row" class="py-4 px-6">
                        {{ $shipping_address->country }}
                    </th>
                </tr>
                <tr>
                    <th scope="col" class="py-3 px-6 text-gray-700 text-xs uppercase bg-gray-50">
                        Város
                    </th>
                    <th scope="row" class="py-4 px-6">
                        {{ $shipping_address->city }}
                    </th>
                </tr>
                <tr>
                    <th scope="col" class="py-3 px-6 text-gray-700 text-xs uppercase bg-gray-50">
                        Irányítószám
                    </th>
                    <th scope="row" class="py-4 px-6">
                        {{ $shipping_address->postcode }}
                    </th>
                </tr>
                <tr>
                    <th scope="col" class="py-3 px-6 text-gray-700 text-xs uppercase bg-gray-50">
                        Cím
                    </th>
                    <th scope="row" class="py-4 px-6">
                        {{ $shipping_address->address }} {{ $shipping_address->house_number }}
                    </th>
                </tr>
                <tr>
                    <th scope="col" class="py-3 px-6 text-gray-700 text-xs uppercase bg-gray-50">
                        Email
                    </th>
                    <th scope="row" class="py-4 px-6">
                        {{ $shipping_address->email }}
                    </th>
                </tr>
                <tr>
                    <th scope="col" class="py-3 px-6 text-gray-700 text-xs uppercase bg-gray-50">
                        Telefonszám
                    </th>
                    <th scope="row" class="py-4 px-6">
                        {{ $shipping_address->phone }}
                    </th>
                </tr>
            </table>
        </div>
        <h3 class="text-2xl my-6">Rendelt termékek</h3>

        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3 px-6 text-2xl">
                            #
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Név
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Mennyiség
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Darab ár
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Teljes összeg
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->order_items as $key => $item)
                        <tr class="bg-white border-b">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                {{ $key + 1 }}#
                            </th>
                            <th scope="row" class="py-4 px-6">
                                {{ $item->name }}
                            </th>
                            <td class="py-4 px-6">
                                {{ $item->quantity }}
                            </td>
                            <td class="py-4 px-6">
                                {{ formatPrice($item->item_price) }}
                            </td>
                            <td class="py-4 px-6">
                                {{ formatPrice($item->total_price) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
