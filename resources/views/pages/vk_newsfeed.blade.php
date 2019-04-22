@extends('layouts.base')
@section('sort_cat')
@show
@section('content')

    <div>

       {{-- @foreach($response['response']['items'] as $value)

                <div>{{ $value['text'] }}</div><hr>
                <div>{{ $value['date'] }}</div><hr>

                @foreach($value['attachments'] as $photo)

                    @if($photo['type'] == 'photo')
                        @foreach($photo['photo']['sizes'] as $photos)
                            @if($photos['type'] == 'q')
                                <div><img src="{{ $photos['url'] }}"></div><hr>
                            @endif
                        @endforeach
                   @endif

                @endforeach

        @endforeach--}}
    </div>

<pre>{{ print_r($result) }}</pre>

@endsection

@section('button_load')
@show