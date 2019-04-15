@extends('admin.layouts.primary')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Добавить страну
            </h1>
        </section>

        <section class="content container-fluid">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach


            @if (Session::has('message'))
                <li>{!! session('message') !!}</li>
            @endif
            <form method="post" action="<?= route( 'countries.store' ) ?>">
                @csrf
                <label for="name">Страна</label><br>
                <input type="text" name="name" id="name" value="{{old('name','')}}" required><br>
                <input type="submit" value="Создать">
            </form>
        </section>
    </div>

@endsection