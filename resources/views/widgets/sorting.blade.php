<div class="row-fluid">
    <div class="top-nav clearfix">
        <div class="col-xs-24">
            <div class="sort-category hidden-sm hidden-md hidden-lg"
                <div class="dropdown">
                    <a data-toggle="dropdown"
                       class="sort-category__link">
                        @if($sort == 'age')
                        По свежести
                        @else
                        По рейтингу
                        @endif
                        <i class="ico ico-arrow-down-grey sort-category__ico"></i>
                    </a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                        <li role="presentation">
                            <a role="menuitem" tabindex="-1"
                            @if($sort == 'age')
                               href="{{Request::url()}}?sort=rating">
                                По рейтингу
                            @else
                                href="{{Request::url()}}?sort=age">
                                По свежести
                            @endif
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="sort text-right hidden-xs">
								<span class="sort__text">
									Сортировать по:
									<span class="sort__by"><a
                                        @if($sort == 'rating')
                                        href="{{Request::url()}}?sort=age"
                                        @endif
                                        >свежести</a></span> и
									<span class="sort__by"><a
                                        @if($sort == 'age')
                                        href="{{Request::url()}}?sort=rating"
                                        @endif
                                        >рейтингу</a></span>
								</span>
            </div>
        </div>
    </div>
</div>