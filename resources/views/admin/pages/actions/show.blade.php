@extends('admin.layouts.primary')
@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content-header">
                <h1>Просмотр акции</h1>
                <ol class="breadcrumb">
                    <li><a href="{{route('admin.main.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="{{route('actions.index')}}"><i class="fa fa-list"></i> Управление акциями</a></li>
                    <li class="active">Просмотр</li>
                </ol>
            </section>
            <section class="content">
                <div class="box box-primary">
                    <div class="box-header with-border">
                    <h1 class="my-header">{{$action->title}}<br>
                        <small>{{ $action->brand->name }}</small></h1>
                    <hr>
                </div>
                    <div class="row">
                <div class="col-sm-12 col-sm-6 col-sm-push-6">
                    <img src="{{ $action->img }}" alt="" id="logo">
                </div>
                <div class="col-sm-12 col-sm-6 col-sm-pull-6">

                    <div class="box-header with-border">
                        <h3 class="box-title">Описание акции</h3>
                        <div class="box-header with-border">{{$action->text}}</div>
                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title">
                            @if($action->is_paid)
                            <span class="text-danger"><strong>Оплачена</strong></span>
                                @else
                            Не оплачена
                                @endif
                        </h3>
                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title">Адрес проведения</h3>
                        <div class="box-header with-border">{{ $action->address }}</div>
                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title">
                            Срок проведения
                            @if($action->date_end < date('Y-m-d'))
                                <span class="text-danger">(завершена)</span>
                            @endif
                        </h3>
                        <div class="box-header with-border">
                            {{ my_date_format($action->date_start) }}-{{my_date_format($action->date_end)}}
                        </div>
                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title">Рейтинг</h3>
                        <div class="box-header with-border">{{ $action->rating }}</div>
                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title">Тэги</h3>
                        <div class="box-header with-border">
                            <ul>
                                @foreach($action->tags as $tag)
                                    <li>{{ $tag->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title">Создана</h3>
                        <div class="box-header with-border">{{ $action->created_at }}</div>
                    </div>

                    <div class="box-header with-border">
                        <h3 class="box-title">Изменена</h3>
                        <div class="box-header with-border">{{ $action->updated_at }}</div>
                    </div>

                </div></div>


            <div class="container">
                <a href="{{ route('actions.index') }}" class="btn btn-success">К списку</a>
            </div>
                </div>
            </section>
        </div>
    </div>

@endsection
