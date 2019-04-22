        <article role="article" class="content-block clearfix">
            <div class="sidebar col-xs-24 col-sm-10">
                <div class="sidebar__item">
                    <a href="{{route('site.action.show')}}/{{$action->code}}" title="{{$action->brand->name}}">
                        <div class="sidebar__img">
                            <img src="{{$action->img}}" alt="" class="img-responsive">
                        </div>
                    </a>
                </div>
                <div class="sidebar__item">
                    <strong>
                        <a class="brand" href="{{route('site.action.brand',['code'=>$action->brand->code])}}">{{$action->brand->name}}</a>
                    </strong>
                </div>
            </div>

            <div class="col-xs-24 col-sm-14">
                <a role="link" href="{{route('site.action.show')}}/{{$action->code}}" class="content-block__heading">
                    <h2>{{ $action->title }}</h2>
                </a>
                <p class="content-block__introtext">{{ $action->text }}</p>
                <p class="content-block__date">Срок проведения: {{ my_date_format($action->date_start) }}-{{my_date_format($action->date_end)}}</p>
                <ul class="content-block__list list-unstyled list-inline hidden-xs">
                    @foreach($action->tags as $tag)
                        <li class="content-block__item">
                            <a
                                    href="{{route('site.action.tag',['tag_code'=>$tag->code])}}"
                                    class="btn btn-default content-block__tag">{{$tag->name}}
                            </a>
                        </li>
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
            </div>
        </article>