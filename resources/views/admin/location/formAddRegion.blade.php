@extends('admin.layouts.primary')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Добавить регион
            </h1>
        </section>

        <section class="content container-fluid">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

            @if (!empty($message))
                <p style="display: inline-block;border: 2px double red ;color:red">{{$message}}</p><br>
            @endif
            <form method="post" action="">
                @csrf
                <label for="name">Регион</label><br>
                <input type="text" name="name" id="name" value="{{old('name','')}}" required><br>

                <label for="country">Выберите страну, к которой относится регион</label><br>
                <select name="country_id" id="country">
                    <option disabled>Страна</option>
                    @if (!empty($countries))
                        @foreach($countries as $country)
                            <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    @endif
                </select><br>
                <input type="submit" value="Добавить">
            </form>
        </section>
    </div>

@endsection