<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Üdvözöljük webáruházunkban, ahol kiváló minőségű burkoló- és építőipari eszközöket találhat. Fedezze fel azokat az eszközöket, amelyek segítenek Önnek tökéletes burkolatokat létrehozni, és vegye igénybe szakmai munkájához szükséges kiváló minőségű termékeinket.">
    <meta name="keywords" content="ékek, ecsetek, spathlik, burkolatszintező alátétek, burkolatszintező talpak, fugakeresztek, fuga ék, burkolatszintező ék, csőtámasztó, kör távtartó, fánglik, elasztikus vödrök, távtartó lécek, burkoló eszközök, építőipari eszközök">
    <meta name="author" content="Holz-Plast">
    <meta name="robots" content="index, follow">
    <title>Holz-Plast Shop</title>
    <link rel="icon" href="{{ url('build/images/icon.ico') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ url('build/images/icon.ico') }}" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1531535641023682');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=1531535641023682&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
    @vite('resources/css/app.css')

    <style>
        .swal2-title {
            font-weight: bold
        }

        .swal-buttons {
            color: black !important;
        }

        .swal2-actions {
            width: 100%;
        }

        .swal2-actions {
            flex-direction: column;
        }

        .swal2-confirm,
        .swal2-cancel {
            width: 80%;
            height: 44px;
            outline: none;
            opacity: 1 !important;
        }

        .swal2-confirm:hover,
        .swal2-cancel:hover {
            background-color: #CEF3AE !important;
            opacity: 1 !important;
        }
    </style>
</head>

<body class="bg-backgroundMain font-['Raleway'] min-h-screen">
    @include('sweetalert::alert')
    <div class="mb-20">
        @include('shop::navbar')
        @yield('content')
    </div>
    @include('shop::footer')
</body>

</html>
