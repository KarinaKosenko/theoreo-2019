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
            <form method="POST" action="<?= route( 'destroyCountry' ) ?>">
                @csrf
                @method('DELETE')
                <label for="name">Страна</label><br>
                <select name="id" required>
                    @foreach($countries as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                </select>
                <input type="submit" value="Удалить">
            </form>
        </section>
    </div>

@endsection