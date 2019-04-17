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
            <form method="POST" action="<?= route( 'cities.update', [ 'id' => $single->id ] ) ?>">
                @csrf
                @method('PUT')
                <label for="name">Город</label><br>
                <input type="text" name="name" id="name" value="{{old('name',$single->name)}}" required><br>

                <label for="region">Выберите регион, к которой относится город</label><br>
                <select name="region_id" id="region">
                    <option disabled>Регион</option>
                    @if (!empty($regions))
                        @foreach($regions as $region)
                            <option @if ($region->id == $single->region_id) selected
                                    @endif  value="{{$region->id}}">{{$region->name}}</option>
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