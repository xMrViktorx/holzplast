<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jelszó frissítése</title>
</head>

<body>
    <p>Helló!</p>
    <p>Azért kaptad ezt az emailt mivel jelszó frissítési kérelmet kaptunk a felhasználódtól.</p>
    <p><a href="{{ route('password.reset', $token) }}">Kattinsd ide a jelszavad frissítéséhez</a></p>
    <p>Amennyiben nem te kérelmezted a jelszó frissítését, hagyd ezt az emailt figyelmen kívül.</p>
    <p>Üdvözlettel,<br>Holz-Plast</p>
</body>

</html>
