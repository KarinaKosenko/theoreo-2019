@extends('admin.layouts.primary')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Редактировать
            </h1>
        </section>

        <section class="content container-fluid">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach


            @if (Session::has('message'))
                <li>{!! session('message') !!}</li>
            @endif
            <form method="POST" action="<?= route( 'regions.update', [ 'id' => $single->id ] ) ?>">
                @csrf
                @method('PUT')
                <label for="name">Регион</label><br>
                <input type="text" name="name" id="name" value="{{old('name',$single->name)}}" required><br>

                <label for="country">Выберите страну, к которой относится регион</label><br>
                <select name="country_id" id="country">
                    <option disabled>Страна</option>
                    @if (!empty($countries))
                        @foreach($countries as $country)
                            <option @if ($country->id == $single->country_id) selected
                                    @endif  value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    @endif
                </select><br>

                <input type="hidden" name="currentID" value="{{$single->id}}">
                <input type="submit" name="method" value="Применить">
                <input type="submit" name="method" value="Сохранить">
                <button onclick="history.back(); return false;">Назад</button>
            </form>
        </section>
    </div>

@endsection