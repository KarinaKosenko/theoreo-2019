@extends('layouts.base')

@section('content')

                <div class="row-fluid cont-flex">

                    <div id="sidebar_left">
                        <div class="all">
                            <input type="checkbox" name="all" id="all" />
                            <label for="all"></label>
                        </div>
                        <div class="accordion">
                            <form class="form" method="post">
                                <div class="group-1"><h3>Кухни</h3>
                                    <div class="trigger">
                                        <input class="check__input" type="checkbox" id="checkbox-1" name="checkbox-1" value="1" checked/>
                                        <label for="checkbox-1" class="checkbox">
                                            Европейская <i></i>
                                        </label>
                                    </div>
                                    <div class="trigger">
                                        <input class="check__input" type="checkbox" id="checkbox-2" name="checkbox-2" value="2"/>
                                        <label for="checkbox-2" class="checkbox">
                                            Русская <i></i>
                                        </label>
                                    </div>
                                    <div class="trigger">
                                        <input type="checkbox" id="checkbox-3" name="checkbox-3" value="3"/>
                                        <label for="checkbox-3" class="checkbox">
                                            Итальянская <i></i>
                                        </label>
                                    </div>
                                </div>

                                <div class="group-2"><h3>Услуги</h3>
                                    <div class="trigger">
                                        <input type="checkbox" id="checkbox-4" name="checkbox-4" value="4" checked/>
                                        <label for="checkbox-4" class="checkbox">
                                            С доставкой <i></i>
                                        </label>
                                    </div>
                                    <div class="trigger">
                                        <input type="checkbox" id="checkbox-5" name="checkbox-5" value="5" />
                                        <label for="checkbox-5" class="checkbox">
                                            В кафе <i></i>
                                        </label>
                                    </div>
                                    <div class="trigger">
                                        <input type="checkbox" id="checkbox-6" name="checkbox-6" value="6"/>
                                        <label for="checkbox-6" class="checkbox">
                                            Круглосуточно <i></i>
                                        </label>
                                    </div><br>
                                </div>
                                    <div>
                                        <input type="button" class="btn-1" value="Сбросить">
                                        <input type="submit" class="btn-2" value="Применить">
                                    </div>

                            </form>
                        </div>
                    </div>
                    <div id="container_content">
                        @foreach($actions as $action)
                        <article role="article" class="content-block clearfix">
                            <div class="sidebar col-xs-24 col-sm-10">
                                <div class="sidebar__item">
                                    <a href="{{route('site.action.show',['action_alias' => $action->code])}}" title="Скидка 20% на все средства по уходу за волосами Gliss Kur">
                                        <div class="sidebar__img">
                                            <img src="{{$action->img}}" alt="" class="img-responsive">
                                        </div>
                                    </a>
                                </div>
                                <div class="sidebar__item">
                                    <strong>{{$action->brand->name}}</strong>
                                </div>
                            </div>

                            <div class="col-xs-24 col-sm-14">
                                <a role="link" href="{{route('site.action.show',['action_alias' => $action->code])}}" class="content-block__heading">
                                    <h2>{{$action->title}}</h2>
                                </a>
                                <p class="content-block__introtext">{{$action->text}}</p>
                                <p class="content-block__date">Срок проведения: {{my_date_format($action->date_start)}}-{{my_date_format($action->date_end)}}</p>
                                <ul class="content-block__list list-unstyled list-inline hidden-xs">
                                    @foreach($action->tags as $tag)
                                        <li class="content-block__item"><a href="" class="btn btn-default content-block__tag">{{$tag->name}}</a></li>
                                    @endforeach
                                </ul>
                                <div class="content-block__footer clearfix">
                                    <div class="content-block__tag--wrapper pull-left">
                                        <button role="button" class="btn btn-primary">
                                            <i class="content-block__cart ico ico-cart pull-left hidden-xs"></i>
                                            Купить онлайн
                                        </button>
                                    </div>
                                    <div class="pull-left social">
                                        <ul class="social__list list-unstyled list-inline">
                                            <li class="social__item">
                                                <a role="link" href="/" class="social__link social__link--ok anim">
                                                    <i class="social-ico social-ico-ok anim"></i>
                                                </a>
                                            </li>
                                            <li class="social__item">
                                                <a role="link" href="/" class="social__link social__link--vk anim">
                                                    <i class="social-ico social-ico-vk anim"></i>
                                                </a>
                                            </li>
                                            <li class="social__item">
                                                <a role="link" href="/" class="social__link social__link--tw anim">
                                                    <i class="social-ico social-ico-tw anim"></i>
                                                </a>
                                            </li>
                                            <li class="social__item">
                                                <a role="link" href="/" class="social__link social__link--fb anim">
                                                    <i class="social-ico social-ico-fb anim"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </article>
                        @endforeach
                    </div>

                    <div id="clear"></div>

                </div>

@endsection
@push('botton-scripts')
    <script>
        $("#all").change(function() {
            if(this.checked) {
                $(".accordion").show();
            }else
            {
                $(".accordion").hide();
            }
        })
        $('.group-1 input:checkbox').click(function(){
            if ($(this).is(':checked')) {
                $('.group-1 input:checkbox').not(this).prop('checked', false);
            }
        });
        $('.group-2 input:checkbox').click(function(){
            if ($(this).is(':checked')) {
                $('.group-2 input:checkbox').not(this).prop('checked', false);
            }
        });
    </script>
@endpush

@push('head-scripts')
    <script>
        window.SETTING = {
            "activeCategory": "{{$category ?? ''}}"
        }
    </script>
@endpush

