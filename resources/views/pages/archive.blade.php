@extends('layouts.base')
@section('sort_cat')
    <div class="row-fluid">
        <div class="top-nav clearfix">
            <div class="col-xs-24">

            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        @if(count($actions) == 0)
            <div class="cont-flex">
                   <h3>
                        Акций в архиве не найдено
                  </h3>
            </div>
        @endif
        @foreach($actions as $action)
            <div class="row">
                <div class="col-sm-3">
                    <div class="sidebar__item">
                        <a href="{{route('site.action.show')}}/{{$action->code}}" title="{{$action->brand->name}}">
                            <div class="sidebar__img">
                                <img src="{{$action->img}}" alt="" class="img-responsive" >
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-19">
                    <div class="sidebar__item">
                        <strong>
                            <a class="brand" href="{{route('site.action.brand',['code'=>$action->brand->code])}}">{{$action->brand->name}}</a>
                        </strong>
                    </div>
                    <a role="link" href="{{route('site.action.show')}}/{{$action->code}}" class="content-block__heading">
                        <h2>{{ $action->title }}</h2>
                    </a>
                    <p class="content-block__introtext">{{ $action->text }}</p>
                    <p class="content-block__date">Срок проведения: {{ my_date_format($action->date_start) }}-{{my_date_format($action->date_end)}}</p>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
    @include('widgets.pagination')
@endsection