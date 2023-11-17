<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendelési megerősítés - Holz-Plast</title>
</head>

<body>
    <p>Tisztelt
        @if ($billing_address->company)
            {{ $billing_address->company }},
        @else
            {{ $billing_address->first_name }} {{ $billing_address->last_name }},
        @endif
    </p>
    <p>Szeretnénk megköszönni Önnek a rendelést a Holz-Plast webáruházban. Nagyon hálásak vagyunk a bizalmáért és örömmel értesítjük, hogy rendelése sikeresen beérkezett és feldolgozásra kerül.</p>
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
                <td style="text-align: center; padding: 8px;">{{ formatPrice($item->item_price) }}</td>
                <td style="text-align: center; padding: 8px;">{{ formatPrice($item->total_price) }}</td>
            </tr>
        @endforeach
    </table>
    <h3>
        <b>
            Nettó összeg: {{ formatPrice($order->total_price / 1.27) }} <br>
            ÁFA: {{ formatPrice($order->total_price - $order->total_price / 1.27) }} <br>
            Bruttó összeg: {{ formatPrice($order->total_price) }} <br><br>
            <span style="text-decoration: underline">Szállítási költség:</span><br>
            10kg alatt 900 Ft <br>
            10kg felett 2500 Ft
        </b>
    </h3>
    <p>Amennyiben bármilyen kérdése van a rendeléssel kapcsolatban, kérjük, ne habozzon felvenni velünk a kapcsolatot az alábbi elérhetőségeinken: <a href="mailto:holzplast@rcgroup.co">holzplast@rcgroup.co</a>.</p>
    <p>Köszönjük, hogy vásárolt tőlünk. Reméljük, hogy elégedett lesz a termékekkel és szolgáltatásainkkal. Ha további segítségre van szüksége, állunk rendelkezésére.</p><br><br>
    <p>Üdvözlettel,</p>
    <p>
        Holz-Plast<br>
        H-6300 Kalocsa<br>
        Erkel Ferenc utca 28.<br>
        Tel: +36 30 4283201<br>
        e-mail: holzplast@rcgroup.co
    </p>
</body>

</html>
