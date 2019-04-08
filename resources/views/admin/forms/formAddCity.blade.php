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
                <label for="name">Город</label><br>
                <input type="text" name="name" id="name" value="{{old('name','')}}" required><br>

                <label for="region">Выберите регион, к которой относится город</label><br>
                <select name="region_id" id="region">
                    <option disabled>Регион</option>
                    @if (!empty($regions))
                        @foreach($regions as $region)
                            <option value="{{$region->id}}">{{$region->name}}</option>
                        @endforeach
                    @endif
                </select><br>
                <input type="submit" value="Добавить">
            </form>
        </section>
    </div>

@endsection