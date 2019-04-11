<div class="container-fluid">
    <div><h3>
            Результаты поиска по запросу "<em>{{$search_text ?? ''}}</em>" ({{count($actions)}})
        </h3>
    </div>
@foreach($actions as $action)
        <div class="row">
            <div class="col-sm-3">
                <div class="sidebar__item">
                    <a href="{{route('site.action.show')}}/{{$action->code}}" title="{{$action->brand->name}}">
                        <div class="sidebar__img">
                            <img src="{{$action->img}}" alt="" class="img-responsive" >
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-19">
                <div class="sidebar__item">
                    <strong>{{$action->brand->name}}</strong>
                </div>
                <a role="link" href="{{route('site.action.show')}}/{{$action->code}}" class="content-block__heading">
                    <h2>{{ $action->title }}</h2>
                </a>
                <p class="content-block__introtext">{{ $action->text }}</p>
                <p class="content-block__date">Срок проведения: {{ my_date_format($action->date_start) }}-{{my_date_format($action->date_end)}}</p>
            </div>
        </div>
    <hr>
    @endforeach
</div>