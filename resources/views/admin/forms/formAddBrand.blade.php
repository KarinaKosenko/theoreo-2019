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
                <label for="name">Название</label><br>
                <input type="text" name="name" id="name" value="{{old('name','')}}" required><br>

                <label for="img">Изображение</label><br>
                <input type="file" name="img" id="img" value="{{old('img','')}}"><br>

                <label for="site_url">Сайт</label><br>
                <input type="url" name="site_url" id="site_url" value="{{old('site_url','')}}"><br>

                <label for="vk_url">ВК</label><br>
                <input type="url" name="vk_url" id="vk_url" value="{{old('vk_url','')}}"><br>

                <label for="phone">Телефон</label><br>
                <input type="text" name="phone" id="phone" value="{{old('phone','')}}"><br>

                <label for="sell_address">Адрес</label><br>
                <input type="text" name="sell_address" id="sell_address" value="{{old('sell_address','')}}"><br>


                <label for="type">Тип бренда</label><br>
                <select name="type" id="type">
                    <option disabled>Регион</option>
                    @if (!empty($types))
                        @foreach($types as $value=>$label)
                            <option value="{{$value}}" {{ (\Illuminate\Support\Facades\Input::old("type") == $value ? "selected":"") }}>{{$label}}</option>
                        @endforeach
                    @endif
                </select><br>
                <input type="submit" value="Добавить">
            </form>
        </section>
    </div>

@endsection