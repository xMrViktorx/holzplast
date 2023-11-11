<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendelési megerősítés - Holz-Plast</title>
</head>

<body>
    <p>Tisztelt {{ $order->first_name }} {{ $order->last_name }},</p>
    <p>Szeretnénk megköszönni Önnek a rendelést a Holz-Plast webáruházban. Nagyon hálásak vagyunk a bizalmáért és örömmel értesítjük, hogy rendelése sikeresen beérkezett és feldolgozásra kerül.</p>
    <h3><b>A rendelés adatai:</b></h3>
    <p>Rendelés azonosítója: #{{ $order->id }}<br>
        Rendelés dátuma: {{ $order->created_at }}<br>
        Szállítási cím: {{ $order->country }}, {{ $order->postcode }} - {{ $order->city }}, {{ $order->address }} {{ $order->house_number }}<br>
        Telefonszám: {{ $order->phone }}<br>
        Email: {{ $order->email }}</p>
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
                <td style="text-align: center; padding: 8px;">{{ $item->item_price }} forint</td>
                <td style="text-align: center; padding: 8px;">{{ $item->total_price }} forint</td>
            </tr>
        @endforeach
    </table>
    <h3><b>Teljes összeg: {{ $order->total_price }} forint</b></h3>
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
