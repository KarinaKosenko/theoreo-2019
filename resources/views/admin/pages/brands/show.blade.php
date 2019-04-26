@extends('admin.layouts.primary')
@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <div class="box box-primary">

            <div class="row">
                <div>
                    <h1 class="my-header">{{$brand->name}}<br>
                        <small>
                            @if($brand->type == 'federal_brand')
                                Федеральный бренд
                                @else
                            Интернет-магазин
                            @endif
                        </small></h1>
                    <hr>
                </div>
                <div class="col-sm-12 col-sm-6 col-sm-push-6">
                    <img src="{{ $brand->img }}" alt="">
                </div>
                <div class="col-sm-12 col-sm-6 col-sm-pull-6">

                    <div class="box-header with-border">
                        <h3 class="box-title">Адрес</h3>
                        <div class="box-header with-border">{{ $brand->sell_address }}</div>
                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title">Телефоны</h3>
                        <div class="box-header with-border">{{ $brand->phone }}</div>
                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title">Ссылка на сайт</h3>
                        <div class="box-header with-border">{{ $brand->site_url }}</div>
                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title">Ссылка на страницу VK</h3>
                        <div class="box-header with-border">{{ $brand->vk_url }}</div>
                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title">Категории</h3>
                        <div class="box-header with-border">
                            <ul>
                                @foreach($brand->categories as $category)
                                    <li>{{ $category->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title">Создан</h3>
                        <div class="box-header with-border">{{ $brand->created_at }}</div>
                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title">Изменен</h3>
                        <div class="box-header with-border">{{ $brand->updated_at }}</div>
                    </div>

                </div>

            </div>
            <div class="container">
                <a href="{{ route('brands.index') }}" class="btn btn-success">К списку</a>
            </div>

        </div>
    </div>
</div>
@endsection
