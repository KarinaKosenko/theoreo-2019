@extends('layouts.base')
@section('sort_cat')
@show
@section('content')

    <div>

        {{--<a href="/vk_groups?offset={{$prevPageOffset}}"> <<< </a>
        <a href="/vk_groups?offset={{$nextPageOffset}}"> >>> </a>--}}

        <table>
        @foreach($response['response']['items'] as $groups)
        <tr>
            <td>{{ $groups['id'] }}</td>
            <td>{{ $groups['name'] }}</td>
           {{-- <td>{{ $groups['city']['title'] }}</td>--}}

        </tr>
        @endforeach
        </table>
    </div>

    {{--<pre>{{ print_r($response) }}</pre>--}}

@endsection

@section('button_load')
@show