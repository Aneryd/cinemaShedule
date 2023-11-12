@extends("admin.app")

@section("content")
    <form action="{{ route("films.update", $film) }}" method="post" enctype="multipart/form-data">
        @method("PUT")
        @csrf

        <h1>Редактирование фильма с id: {{ $film->id }}</h1>

        <hr>

        <h4>Название</h4>
        <input type="text" name="name" value="{{ $film->name }}" required>

        <h4>Постер</h4>
        <img src="{{ $film->photo }}" alt="" style="max-width: 200px;">
        <br>
        <input type="file" name="photo">

        <h4>Описание</h4>
        <textarea name="description" id="" cols="100" rows="20" required>{{ $film->description }}</textarea>

        <h4>Продолжительность в минутах (целое число)</h4>
        <input type="text" name="duration" value="{{ $film->duration }}" required>

        <h4>Возрастное ограничение</h4>
        <select name="age_rating" id="" required>
            <option value="" selected>Возрастной рейтинг</option>
            @foreach ($age_ratings as $age_rating)
                @if($age_rating->id == $film->age_rating_id)
                    <option value="{{ $age_rating->id }}" selected>{{ $age_rating->name." - ".$age_rating->description }}</option>
                @else
                    <option value="{{ $age_rating->id }}">{{ $age_rating->name." - ".$age_rating->description }}</option>
                @endif
            @endforeach
        </select>

        <br>

        <button>Сохранить</button>
    </form>
@endsection