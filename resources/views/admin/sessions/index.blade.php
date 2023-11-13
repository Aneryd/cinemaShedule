@extends("admin.app")

@section("content")
    <div>
        <h1>Сеансы</h1>

        <div>
            <a href="{{ route("sessions.create") }}">Добавить</a>
        </div>

        <table>
            <tr>
                <th>id</th>
            
                <th>Постер</th>
            
                <th>Название</th>
                <th>Время и дата</th>
                <th>Стоимость</th>
  
                <th></th>
            </tr>
            @foreach ($sessions as $session)
                <tr>
                    <td>{{ $session->id }}</td>
                    <td class="td_img">
                        <img src="{{ $session->film->photo }}" alt="Фото фильма с id {{ $session->film->id }}">
                    </td>
                    <td>{{ $session->film->name }}</td>
                    <td>{{ $session->time_date }}</td>
                    <td>{{ $session->price }}</td>
                    <td>
                        <th style="display: flex;">
                            <form action="{{ route("sessions.edit", $session) }}" method="get">
                                <button>Ред.</button>
                            </form>
                            <form action="{{ route("sessions.destroy", ["session" => $session]) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button>X</button>
                            </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {{ $sessions->links() }}
    </div>
@endsection