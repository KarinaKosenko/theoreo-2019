@extends('layouts.base')
@section('content')
    <div class="container-fluid">
        <div class="search-result">
                Результаты поиска по тэгу "<em>{{$tag->name ?? ''}}</em>" ({{$actions->total()}})
        </div>
        @foreach($actions as $action)
                @include('widgets.action_short')
        @endforeach
    </div>
    @include('widgets.pagination')
@endsection