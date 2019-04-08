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
                <label for="title">Название</label><br>
                <input type="text" name="title" id="title" value="{{old('title','')}}" required><br>

                <label for="text">Текст</label><br>
                <textarea name="text" id="text" required>{{old('text','')}}</textarea><br>

                <label for="date_start">Дата начала скидки</label><br>
                <input type="date" name="date_start" id="date_start" value="{{old('date_start','')}}" required><br>

                <label for="date_end">Дата окончания скидки</label><br>
                <input type="date" name="date_end" id="date_end" value="{{old('date_end','')}}" required><br>

                <label for="priority">Приоритет от 0 до 5</label><br>
                <input type="number" name="priority" id="priority" value="{{old('priority','0')}}" min="0" max="5"><br>

                <label for="is_paid">Оплачено ли?</label><br>
                <input type="checkbox" name="is_paid" value="1"
                       id="is_paid" {{ (is_array(old('is_paid')) && in_array(1, old('is_paid'))) ? ' checked' : '' }}><br>

                <label for="store_url">Сайт</label><br>
                <input type="url" name="store_url" id="store_url" value="{{old('store_url','')}}"><br>

                <label for="type">Тип акции</label><br>
                <select name="type" id="type">
                    <option disabled>Тип</option>
                    @if (!empty($types))
                        @foreach($types as $value=>$label)
                            <option value="{{$value}}" {{ (\Illuminate\Support\Facades\Input::old("type") == $value ? "selected":"") }}>{{$label}}</option>
                        @endforeach
                    @endif
                </select><br>

                <label for="img">Изображение</label><br>
                <input type="file" name="img" id="img" value="{{old('img','')}}"><br>

                <label for="brand">Выберите бренд, к которому относится акция</label><br>
                <select name="brand_id" id="brand">
                    <option disabled>Бренд</option>
                    @if (!empty($brands))
                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}" {{ (\Illuminate\Support\Facades\Input::old("brand_id") == $brand->id ? "selected":"") }}>{{$brand->name}}</option>
                        @endforeach
                    @endif
                </select><br>

                <label for="category">Выберите категорию, к которой относится акция</label><br>
                <select name="category_id" id="category" required>
                    <option disabled>Категория</option>
                    @if (!empty($categories))
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{ (\Illuminate\Support\Facades\Input::old("category_id") == $category->id ? "selected":"") }}>{{$category->name}}</option>
                        @endforeach
                    @endif
                </select><br>


                <label for="phone">Телефон</label><br>
                <input type="text" name="phone" id="phone" value="{{old('phone','')}}"><br>

                <label for="address">Адрес</label><br>
                <input type="text" name="address" id="address" value="{{old('address','')}}"><br>

                <br><input type="submit" value="Добавить">
            </form>
        </section>
    </div>

@endsection