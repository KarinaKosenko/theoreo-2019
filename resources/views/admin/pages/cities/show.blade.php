@extends('admin.layouts.primary')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Одиночная страница
            </h1>
        </section>

        <section class="content container-fluid">

            Айди: {{$single->id}}<br>
            Название: {{$single->name}}<br>
            Регион: {{$region->name}}<br>
            Код: {{$single->code}}<br>
            Дата создания: {{$single->created_at}}<br>


        </section>
    </div>

@endsection