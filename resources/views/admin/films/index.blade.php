@extends("admin.app")

@section("content")
    <div>
        <h1>Фильмы</h1>

        <div>
            <a href="{{ route("films.create") }}">Добавить</a>
        </div>

        <table>
            <tr>
                <th>id</th>
            
                <th>Постер</th>
            
                <th>Название</th>
                <th>Описание</th>
                <th>Продолжительность (в мин.)</th>
  
                <th>Возрастное ограничение</th>
                <th></th>
            </tr>
            @foreach ($films as $film)
                <tr>
                    <td>{{ $film->id }}</td>
                    <td class="td_img">
                        <img src="{{ $film->photo }}" alt="Фото фильма с id {{ $film->id }}">
                    </td>
                    <td>{{ $film->name }}</td>
                    <td>{{ mb_strimwidth($film->description, 0, 300, "...") }}</td>
                    <td>{{ $film->duration }}</td>
                    <td>{{ $film->age_ratings->name }}</td>
                    <td>
                        <th style="display: flex;">
                            <form action="{{ route("films.edit", $film) }}" method="get">
                                <button>Ред.</button>
                            </form>
                            <form action="{{ route("films.destroy", ["film" => $film]) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button>X</button>
                            </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {{ $films->links() }}
    </div>
@endsection