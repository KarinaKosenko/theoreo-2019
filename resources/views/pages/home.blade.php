@extends('layouts.base')

@section('content')

    <div class="row-fluid cont-flex">
        @foreach($actions as $action)
            @include('widgets.action_std')
        @endforeach
     </div>
    @include('widgets.pagination')
@endsection

