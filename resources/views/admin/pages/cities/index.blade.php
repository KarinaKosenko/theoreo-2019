@extends('admin.layouts.primary')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Весь список
            </h1>
        </section>

        <section class="content container-fluid">
            @if (Session::has('message'))
                <li>{!! session('message') !!}</li>
            @endif

            <ul>

                @foreach($all as $single)
                    <li>{{$single->name}}</li>
                @endforeach
            </ul>


        </section>
    </div>

@endsection