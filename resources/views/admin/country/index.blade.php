@extends('admin.layouts.primary')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Все страны
            </h1>
        </section>

        <section class="content container-fluid">
            <ul>

                @foreach($all as $single)
                    <li>{{$single->name}}</li>
                @endforeach
            </ul>


        </section>
    </div>

@endsection