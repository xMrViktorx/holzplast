<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Holz-Plast Shop</title>
    <link rel="icon" href="{{ url('build/images/icon.ico') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ url('build/images/icon.ico') }}" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
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

<body class="bg-backgroundMain font-['Raleway']">
    @include('sweetalert::alert')
    @include('shop::navbar')
    @yield('content')
</body>

</html>
