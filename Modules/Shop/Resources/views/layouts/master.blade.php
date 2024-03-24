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

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-RT0PSKRBQ9">
</script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-RT0PSKRBQ9');
</script>
</head>
    
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-16464350462"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'AW-16464350462');
</script>

<body class="bg-backgroundMain font-['Raleway'] min-h-screen">
    @include('sweetalert::alert')
    <div class="mb-20">
        @include('shop::navbar')
        @yield('content')
    </div>
    @include('shop::footer')

    <script>
        // Get all main categories
        const categories = document.querySelectorAll('.relative');

        // Add event listeners for each main category
        categories.forEach(category => {
            const subcategories = category.querySelector('.subcategories');
            
            // Show subcategories on hover
            category.addEventListener('mouseenter', () => {
                if (subcategories) {
                    subcategories.classList.remove('hidden');
                }
            });
            
            // Hide subcategories when mouse leaves
            category.addEventListener('mouseleave', () => {
                if (subcategories) {
                    subcategories.classList.add('hidden');
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            var toggleIcons = document.querySelectorAll('.toggle-icon');

            toggleIcons.forEach(function(icon) {
                icon.addEventListener('click', function(event) {
                    event.preventDefault();
                    var subcategories = this.parentElement.nextElementSibling;
                    if (subcategories) {
                        subcategories.classList.toggle('hidden');
                        this.classList.toggle('ri-arrow-down-s-line'); // Change to the icon you want when subcategories are shown
                        this.classList.toggle('ri-arrow-right-s-line'); // Change to the default icon when subcategories are hidden
                    }
                });
            });
        });
    </script>
</body>

</html>
