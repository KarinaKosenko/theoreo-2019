@extends('layouts.base')
@section('content')

<div class="container">
    @if($brand->img)
    <div class="row">
        <div class="col" style="text-align: center;">
            <img style="max-height: 100px" src="{{$brand->img}}" alt="">
        </div>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col centered" style="text-align: center">
            <h2>{{$brand->name}}</h2>
            @if($brand->phone)<p>Телефоны: {{$brand->phone}}</p>@endif
            @if($brand->site_url)<p>Сайт: <a href="{{$brand->site_url}}" target="_blank">{{$brand->site_url}}</a></p>@endif
            @if($brand->sell_addres)<p>Адрес: {{$brand->sell_addres}}</p>@endif
        </div>
    </div>

</div>
        <div class="row-fluid cont-flex">
          @foreach($actions as $action)
                @include('widgets.action_std')
          @endforeach
        </div>
@endsection