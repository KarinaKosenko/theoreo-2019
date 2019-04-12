@extends('layouts.base')
@section('content')

<div class="container">
    <div class="row justify-content-end">
        <div class="col-sm-12" style="text-align: right;"><img style="max-height: 100px" src="{{$brand->img}}" alt=""></div>
        <div class="col-sm-12">
            <h2>{{$brand->name}}</h2>
            <p>Телефоны: {{$brand->phone}}</p>
            <p>Сайт: <a href="{{$brand->site_url}}" target="_blank">{{$brand->site_url}}</a></p>
            <p>Адрес: {{$brand->sell_addres}}</p>
        </div>
    </div>

</div>
        <div class="row-fluid cont-flex">
          @foreach($actions as $action)
                @include('widgets.action_std')
          @endforeach
        </div>
@endsection