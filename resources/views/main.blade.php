<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Сеансы кинотеатра</title>
</head>
<body> 
    <div  style="display: flex; justify-content: space-between;">
        <h3>Сеансы</h3>

        <div>
            @guest
                <button><a href="/login">Авторизация</a></button>
            @else
                {{ auth()->user()->name }}
                <form action="/logout" method="post">
                    @csrf
                    <button>Выйти</button>
                </form>
            @endguest
        </div>
    </div> 

    <div>
        @foreach ($sessions as $session)
            <div style="display: flex; margin-bottom:20px;">
                <img src="{{ $session->film->photo }}" alt="" style="width: 200px;">

                <div style="padding-left: 10px;">
                    <div style="display: flex;">
                        <p>Название: </p>
                        <p>{{ $session->film->name }}</p>
                    </div>

                    <div style="display: flex;">
                        <p>Дата и время: </p>
                        <p>{{ $session->time_date }}</p>
        
                    </div>

                    <div style="display: flex;">
                        <p>Стоимость: </p>
                        <p>{{ $session->price }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $sessions->links() }}
</body>
</html>