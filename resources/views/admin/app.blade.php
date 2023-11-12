<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админ панель</title>

    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>
<body>
    <div class="sidenav">
        <a href="/admin">Главная</a>
        <a href="{{ route("films.index") }}">Фильмы</a>
        <a href="">Сеансы</a>

        <div class="sidenav_bottom">
            <a href="/">На сайт</a>
        </div>
    </div>

    <div class="main">
        @yield("content")
    </div>
</body>
</html>