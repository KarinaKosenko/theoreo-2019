<div class="container-fluid">
    <div class="wrapper">
    <div>
        <h3>
            Результаты поиска по запросу "<em>{{$search_text ?? ''}}</em>" ({{count($actions)}})
        </h3>
    </div>
@foreach($actions as $action)
    @include('widgets.action_short')
@endforeach
</div>
</div>