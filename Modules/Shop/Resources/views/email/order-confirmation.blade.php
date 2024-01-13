<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendelési megerősítés - Holz-Plast Kft.</title>
</head>

<body>
    <p>Tisztelt
        @if ($billing_address->company)
            {{ $billing_address->company }},
        @else
            {{ $billing_address->first_name }} {{ $billing_address->last_name }},
        @endif
    </p>
    <p>Szeretnénk megköszönni Önnek a rendelést a Holz-Plast Kft. webáruházában. Nagyon hálásak vagyunk a bizalmáért és örömmel értesítjük, hogy rendelése sikeresen beérkezett és feldolgozásra kerül.</p>
    <h3><b>Rendelés adatai:</b></h3>
    <p>Rendelés azonosítója: #{{ $order->id }}<br>
        Rendelés dátuma: {{ $order->created_at }}<br>

    <h4 style="margin: 0"><b>Számlázási adatok:</b></h4>
    Név: @if ($billing_address->company)
        {{ $billing_address->company }}
    @else
        {{ $billing_address->first_name }} {{ $billing_address->last_name }}
    @endif
    <br>
    Cím: {{ $billing_address->country }}, {{ $billing_address->postcode }} - {{ $billing_address->city }}, {{ $billing_address->address }} {{ $billing_address->house_number }}<br>
    Telefonszám: {{ $billing_address->phone }}<br>
    Email: {{ $billing_address->email }}</p>

    <h4 style="margin: 0"><b>Szállítási adatok:</b></h4>
    Név: @if ($shipping_address->company)
        {{ $shipping_address->company }}
    @else
        {{ $shipping_address->first_name }} {{ $shipping_address->last_name }}
    @endif
    <br>
    Cím: {{ $shipping_address->country }}, {{ $shipping_address->postcode }} - {{ $shipping_address->city }}, {{ $shipping_address->address }} {{ $shipping_address->house_number }}<br>
    Telefonszám: {{ $shipping_address->phone }}<br>
    Email: {{ $shipping_address->email }}</p>

    <h3><b>Megrendelt termékek:</b></h3>
    <table border style="border-collapse: collapse">
        <tr>
            <th style="padding: 5px 15px">Termék</th>
            <th style="padding: 5px 15px">Mennyiség</th>
            <th style="padding: 5px 15px">Darab ár</th>
            <th style="padding: 5px 15px">Teljes ár</th>
        </tr>
        @foreach ($order->order_items as $item)
            <tr>
                <td style="padding: 8px;">{{ $item->name }}</td>
                <td style="text-align: center; padding: 8px;">{{ $item->quantity }}</td>
                <td style="text-align: center; padding: 8px;">{{ formatPrice($item->item_price) }} + Áfa</td>
                <td style="text-align: center; padding: 8px;">{{ formatPrice($item->total_price) }} + Áfa</td>
            </tr>
        @endforeach
    </table>
    <h3>
        <b>
            Nettó összeg: {{ formatPrice($order->total_price) }} <br>
            @php
                $order_neto = $order->total_price;

                $full_orders = floor($order_neto / 37000);

                $remaining_amount = $order_neto % 37000;

                if ($remaining_amount > 0) {
                    $shipping_amount = ($full_orders + 1) * 1970;
                } else {
                    $shipping_amount = $full_orders * 1970;
                }

                $pickup = 0;
                if($order->pickup == 'delivery') {
                    $pickup = 500;
                }
            @endphp
            Szállítási költség: {{ formatPrice($shipping_amount) }} <br>
            @if($order->pickup == 'delivery')
                Utánvétel: {{ formatPrice($pickup) }} <br>
            @endif
            Áfa: {{ formatPrice(($order->total_price + $shipping_amount + $pickup) * 0.27) }} <br>
            Bruttó összeg: {{ formatPrice($order->total_price + $shipping_amount + $pickup + (($order->total_price + $shipping_amount + $pickup) * 0.27)) }} <br><br>
            <span style="text-decoration: underline">Szállítási költség:</span><br>
            minden megkezdett nettó 37000 Ft rendelési összeget, nettó 1970 Ft szállítási költség terhel
        </b>
        </br>
    </h3>
    <p>Amennyiben bármilyen kérdése van a rendeléssel kapcsolatban, kérjük, ne habozzon felvenni velünk a kapcsolatot az alábbi elérhetőségeinken: <a href="mailto:holzplast@rcgroup.co">holzplast@rcgroup.co</a>.</p>
    <p>Köszönjük, hogy vásárolt tőlünk. Reméljük, hogy elégedett lesz a termékekkel és szolgáltatásainkkal. Ha további segítségre van szüksége, állunk rendelkezésére.</p><br><br>
    <p>Üdvözlettel,</p>
    <p>
        Holz-Plast Kft.<br>
        H-6300 Kalocsa<br>
        Erkel Ferenc utca 28.<br>
        Tel: +36 30 4283201<br>
        e-mail: holzplast@rcgroup.co
    </p>
</body>

</html>
