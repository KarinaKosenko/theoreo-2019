@extends('admin.layouts.primary')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Добавить
            </h1>
        </section>

        <section class="content container-fluid">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach


            @if (Session::has('message'))
                <li>{!! session('message') !!}</li>
            @endif
            <form method="post" action="<?= route( 'cities.store' ) ?>">
                @csrf
                <label for="name">Город</label><br>
                <input type="text" name="name" id="name" value="{{old('name','')}}" required><br>
                <label for="region">Выберите регион, к которому относится город</label><br>
                <select name="region_id" id="region">
                    <option disabled>Регион</option>
                    @if (!empty($regions))
                        @foreach($regions as $region)
                            <option value="{{$region->id}}">{{$region->name}}</option>
                        @endforeach
                    @endif
                </select><br>
                <input type="submit" value="Создать">
            </form>
        </section>
    </div>

@endsection