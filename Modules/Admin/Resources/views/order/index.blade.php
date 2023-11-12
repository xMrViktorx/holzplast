@extends('admin::layouts.navigation')

@section('content')
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
                        Státusz
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Teljes összeg
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Létrehozva
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Akciók
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="bg-white border-b">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                            {{ $order->id }}#
                        </th>
                        <th scope="row" class="py-4 px-6">
                            @if ($order->company)
                                {{ $order->company }}
                            @else
                                {{ $order->first_name }} {{ $order->last_name }}
                            @endif
                        </th>
                        <td class="py-4 px-6">
                            @if ($order->status == 'in progress')
                                <div class="bg-yellow-400 w-max px-3 py-2 text-black rounded-full">Folyamatban</div>
                            @elseif($order->status == 'delivered')
                                <div class="bg-green-400 w-max px-3 py-2 text-black rounded-full">Kiszállítva</div>
                            @else
                                <div class="bg-red-400 w-max px-3 py-2 text-black rounded-full">Visszavont</div>
                            @endif
                        </td>
                        <td class="py-4 px-6">
                            {{ $order->total_price }} forint
                        </td>
                        <td class="py-4 px-6">
                            {{ $order->created_at }}
                        </td>
                        <td class="py-4 px-6 flex text-2xl">
                            <a href="{{ route('admin.order.edit', $order->id) }}" class="font-medium mr-3"><i class="ri-eye-line"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $orders->links() }}
@endsection
