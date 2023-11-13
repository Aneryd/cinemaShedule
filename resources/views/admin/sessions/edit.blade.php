@extends("admin.app")

@section("content")
    <form action="javascript:sendForm()" method="post">
        @csrf

        <h1>Редактирование сеанса c id: {{ $session->id }}</h1>

        <hr>

        <h4>Выбор фильма</h4>
        <select name="film_id" id="film_id" required>
            <option value="" selected>Выберите фильм</option>
            @foreach ($films as $film)
                @if($session->film_id == $film->id)
                    <option value="{{ $film->id }}" selected>{{ $film->name }}</option>
                @else
                    <option value="{{ $film->id }}">{{ $film->name }}</option>
                @endif
            @endforeach
        </select>

        <h4>Постер</h4>
        <input type="datetime-local" name="time_date" id="time_date" value="{{ $session->time_date }}" required/>

        <h4>Стоимость</h4>
        <input type="text" name="price" id="price" value="{{ $session->price }}" required>

        <br>

        <div class="errors"></div>

        <button>Добавить</button>
    </form>

    <script>
        function sendForm(){
            $.ajax({
                url: "/admin/sessions/{{ $session->id }}",
                method: "put",
                data: {
                    '_token': "{{ csrf_token() }}",
                    'film_id': $("#film_id").val(),
                    'time_date': $("#time_date").val(),
                    'price': $("#price").val()
                },
                success: function(response){
                    console.log(response)
                    if(response.success == true){
                        window.location.href = '/admin/sessions';
                    }
                },
                error: function (reject) {
                    if( reject.status === 422 ) {
                        var errors = $.parseJSON(reject.responseText);
                        console.log(errors);
                        $.each(errors, function (key, val) {
                            if(key == "message"){
                                $(".errors").append("<br />"+val);
                            }
                        });
                    }
                }
            });
        }
    </script>
@endsection