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

    <!-- Modal -->
    <div id="myModal" class="modal bg-black bg-opacity-40 fixed top-0 left-0 w-full h-full flex justify-center items-center z-50">
        <!-- Modal content -->
        <div class="bg-white p-8 rounded-lg shadow-lg relative">
        <!-- Close button -->
        <span class="close absolute -top-4 right-0 p-2 cursor-pointer text-5xl">&times;</span>
        <!-- Image with link -->
        <a href="https://shop.holzplast.hu/?search=Burkolatszintez%C5%91+talp">
            <img src="build/images/akcio.jpeg" alt="Modal Image" class="max-w-96 mx-auto">
        </a>
        </div>
    </div>

    <script>
        // Function to set cookie
        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        // Function to get cookie
        function getCookie(name) {
            var nameEQ = name + "=";
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = cookies[i];
                while (cookie.charAt(0) == ' ') {
                cookie = cookie.substring(1, cookie.length);
                }
                if (cookie.indexOf(nameEQ) == 0) {
                return cookie.substring(nameEQ.length, cookie.length);
                }
            }
            return null;
        }

        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the close button
        var closeButton = document.querySelector(".close");

        // Check if the modal has been shown and the cookie timestamp
        var modalShown = getCookie("modalShown");
        var cookieTimestamp = parseInt(getCookie("cookieTimestamp"));

        // Check if the cookie has expired (more than 1 day has passed)
        var isCookieExpired = cookieTimestamp && (Date.now() - cookieTimestamp) > (24 * 60 * 60 * 1000);

        // Show modal if it hasn't been shown during the current session or if the cookie has expired
        if (!modalShown || isCookieExpired) {
            modal.style.display = "flex";
            setCookie("modalShown", true, 1); // Set cookie to expire in 1 day
            if (!cookieTimestamp) {
                setCookie("cookieTimestamp", Date.now(), 1); // Set cookie timestamp only when the modal is first shown
            }
        } else {
            modal.style.display = "none";
        }

        // Close the modal when the close button is clicked
        closeButton.addEventListener("click", function() {
            modal.style.display = "none";
        });
    </script>
</body>

</html>
