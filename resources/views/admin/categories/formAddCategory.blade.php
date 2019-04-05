@extends('admin.layouts.primary')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Добавить категорию
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
                <label for="name">Категория</label><br>
                <input type="text" name="name" id="name" value="{{old('name','')}}" required><br>
                <input type="submit" value="Добавить">
            </form>
        </section>
    </div>

@endsection