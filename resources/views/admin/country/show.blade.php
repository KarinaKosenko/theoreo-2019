@extends('admin.layouts.primary')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Страна
            </h1>
        </section>

        <section class="content container-fluid">

            Айди: {{$country->id}}<br>
            Название: {{$country->name}}<br>
            Код: {{$country->code}}<br>
            Дата создания: {{$country->created_at}}<br>


        </section>
    </div>

@endsection