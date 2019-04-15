@extends('admin.layouts.primary')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Редактировать страну
            </h1>
        </section>

        <section class="content container-fluid">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach


            @if (Session::has('message'))
                <li>{!! session('message') !!}</li>
            @endif
            <form method="POST" action="<?= route( 'countries.update', [ 'id' => $single->id ] ) ?>">
                @csrf
                @method('PUT')
                <label for="name">Страна</label><br>
                <input type="text" name="name" id="name" value="{{old('name',$single->name)}}" required><br>

                <input type="submit" name="method" value="Применить">
                <input type="submit" name="method" value="Сохранить">
                <input type="submit" name="method" value="Назад">
            </form>
        </section>
    </div>

@endsection