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
            <div class="search-result">
                Акций в архиве не найдено
            </div>
            @else
            <div class="search-result">
                Архив акций ({{$actions->total()}}):
            </div>
        @endif
        @foreach($actions as $action)
                @include('widgets.action_short')
        @endforeach
    </div>
    @include('widgets.pagination')
@endsection