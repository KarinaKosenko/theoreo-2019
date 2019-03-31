@extends('layouts.base')
@section('sort_cat')
@show
@section('content')


    <div>
        @foreach($response['response']['items'] as $tours)

            <div>{{ $tours['text'] }}</div><hr>
            {{--@foreach($tours['attachments'] as $inf)
                <div>{{ $inf['link']['title'] }}</div>
                <div>{{ $inf['link']['description'] }}</div>

            @endforeach--}}

        @endforeach
    </div>

    <pre>{{ print_r($response) }}</pre>


@endsection

@section('button_load')
@show
