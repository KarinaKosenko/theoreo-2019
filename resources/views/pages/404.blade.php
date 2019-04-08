@extends('layouts.base')

@section('sort_cat')
@show
@section('content')
    <div class="row-fluid">
        <div class="top-nav clearfix">
            <div class="col-xs-24">
                <div class="page-prev">
                    <a href="{{route('site.action.index')}}" class="page-prev__link js-back">
                        <div class="page-prev__container">
                            <i class="page-prev__ico ico ico-arrow-left"></i>
                        </div>
                        <span class="page-prev__text">На главную</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <aside class="sidebar col-xs-24 col-md-9">
            <div class="error__num">
                404
            </div>
        </aside>
        <div class="error__text col-xs-24 col-md-15">
            <h1 class="error__heading">Ошибка! Страница не найдена!</h1>
            <p>Страницы, которую вы пытаетесь посмотреть тет нет. Может попробуйте что-то еще?</p>
        </div>
    </div>
@endsection

@section('button_load')
@show