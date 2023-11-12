@extends("admin.app")

@section("content")
    <form action="{{ route("films.store") }}" method="POST" enctype="multipart/form-data">
        @csrf

        <h1>Добавление фильма</h1>

        <hr>

        <h4>Название</h4>
        <input type="text" name="name" required>

        <h4>Постер</h4>
        <input type="file" name="photo" required>

        <h4>Описание</h4>
        <textarea name="description" id="" cols="100" rows="20" required></textarea>

        <h4>Продолжительность в минутах (целое число)</h4>
        <input type="text" name="duration" required>

        <h4>Возрастное ограничение</h4>
        <select name="age_rating" id="" required>
            <option value="">Возрастной рейтинг</option>
            @foreach ($age_ratings as $age_rating)
                <option value="{{ $age_rating->id }}">{{ $age_rating->name." - ".$age_rating->description }}</option>
            @endforeach
        </select>

        <br>

        <button>Добавить</button>
    </form>
@endsection