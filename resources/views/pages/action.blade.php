@extends('layouts.base')

@section('sort_cat')
    @include('widgets.prev_button')
@show

@if(!count($geo) == 0)
    @push('head-scripts')
    <script src="https://api-maps.yandex.ru/2.1/?apikey=f112f3e4-d246-486d-80e2-0c171bc8d004&lang=ru_RU" type="text/javascript"></script>
    @endpush

    @push('botton-scripts')
        <script src="{{asset('js/mymap.js')}}"></script>
        <script>
            let points = [
                @foreach($geo as $point)
                ['{{$point['lat']}}','{{$point['lng']}}','{{$point['address']}}'],
                @endforeach
            ];
        </script>
    @endpush
@endif

@section('content')
    <div class="row-fluid">
        <article role="article" class="content-block clearfix">
            <div class="sidebar col-xs-24 col-sm-8">
                <div class="sidebar__item">
                    <div class="sidebar__img">
                        <img src="{{$action->img}}" alt="" class="img-responsive">
                    </div>
                </div>
                <div class="sidebar__item">
                    <strong>
                        <a class="brand" href="{{route('site.action.brand',['code'=>$action->brand->code])}}">{{$action->brand->name}}</a>
                    </strong>
                </div>
            </div>
            <div class="col-xs-24 col-sm-16">
                <div class="content-block__heading">
                    <h1>{{$action->title}}</h1>
                </div>
                <p class="content-block__introtext">{{$action->text}}</p>
                <p class="content-block__date">Срок проведения: {{my_date_format($action->date_start)}}-{{my_date_format($action->date_end)}}</p>
                <ul class="content-block__list list-unstyled list-inline">
                    @foreach($action->tags as $tag)
                        <li class="content-block__item"><a href="" class="btn btn-default content-block__tag">{{$tag->name}}</a></li>
                    @endforeach
                </ul>
                <div class="content-block__footer content-block__footer--offer clearfix">
                    <div class="content-block__tag--wrapper pull-left"><button role="button" class="btn btn-primary pull-left"><i class="content-block__cart ico ico-cart pull-left hidden-xs"></i>Купить онлайн</button></div>
                    <div class="pull-left social">
                        <ul class="social__list list-unstyled list-inline">
                            @if($action->brand->vk_url)
                                <li class="social__item">
                                    <a role="link" href="{{$action->brand->vk_url}}" class="social__link social__link--vk anim">
                                        <i class="social-ico social-ico-vk anim"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                @if(!count($addresses) == 0)
                <section class="more-info">

                    <div class="row">
                        <div class="col-xs-24">
                            <h3 class="more-info__heading">
                                Адреса проведения акции <span class="more-info__heading--num">({{count($addresses)}})</span>
                            </h3>
                            <div class="more-info__address more-info__address--height js-store-list">
                                <div class="row">
                                    @foreach($addresses as $address)
                                    <div class="col-xs-24 col-sm-12">
                                        <h4 class="more-info__name">
                                            <i class="ico ico-point-active more-info__ico--point"></i>
                                            {{$action->brand->name}}
                                        </h4>
                                        <ul class="more-info__list">
                                            <li class="more-info__item">
                                                <a href="" class="more-info__link">{{$address}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @if(count($addresses) > 10)
                            <div class="more-info__load-more">
                                <div class="row">
                                    <div class="col-xs-24">
                                        <div class="wrap-circle js-store-show">
                                            <i class="more-info__ico--arrow ico ico-arrow-down-grey"></i>
                                        </div>
                                        <span class="more-info__link--more js-store-show">Показать все магазины</span>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(!count($geo) == 0)
                            <div class="col-xs-24">
                                <div class="more-info__maps">
                                    <div id="map" style="width: 100%; height: 400px"></div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>


                </section>
                @endif
                @includeIf('widgets.comments_block')
                @includeIf('widgets.similar_actions')
            </div>
        </article>
    </div>

@endsection