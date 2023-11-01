<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Holz-Plast Admin</title>
    <link rel="icon" href="{{ url('build/images/icon.ico') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ url('build/images/icon.ico') }}" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/f8ejzg07k8w2i5vyefys7l0dhwd3t20luv9y0cqep8wifj83/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    @vite('resources/css/app.css')
</head>

<body>

    @yield('navigation')
    <script>
        function toogleNav() {
            document.getElementById('mobile-menu').classList.toggle("hidden");
        }
    </script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect code fullscreen',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat | codesample code | fullscreen',
        });
    </script>
</body>

</html>
