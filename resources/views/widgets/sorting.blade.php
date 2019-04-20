<div class="row-fluid">
    <div class="top-nav clearfix">
        <div class="col-xs-24">
            <div class="sort-category hidden-sm hidden-md hidden-lg">
                <div class="dropdown">
                    <a data-toggle="dropdown"
                       class="sort-category__link">
                        @if($sort == 'rating')
                        По рейтингу
                        @else
                        По свежести
                        @endif
                        <i class="ico ico-arrow-down-grey sort-category__ico"></i>
                    </a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1"
                            @if($sort == 'rating')
                               href="{{Request::url()}}?sort=age">
                               По свежести
                            @else
                               href="{{Request::url()}}?sort=rating">
                               По рейтингу
                            @endif
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="sort text-right hidden-xs">
								<span class="sort__text">
									Сортировать по:
                                    @if($sort == 'rating')
                                        <span><a href="{{Request::url()}}?sort=age">свежести</a></span>
                                         или
                                        <span class="sort__by"><strong>рейтингу</strong></span>
                                    @else
                                        <span class="sort__by"><strong>свежести</strong></span> или
                                        <span><a href="{{Request::url()}}?sort=rating">рейтингу</a></span>
                                    @endif
                                </span>
            </div>
        </div>

    </div>
</div>