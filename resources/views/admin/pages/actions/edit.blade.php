@extends('admin.layouts.primary')
@section('content')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Редактирование акции</h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.main.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="{{route('actions.index')}}"><i class="fa fa-list"></i> Управление акциями</a></li>
                <li class="active">Редактирование</li>
            </ol>
        </section>
        @include('admin.parts.action_form')
    </div>
</div>
@endsection
