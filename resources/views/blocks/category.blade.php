@extends('layouts.base')
@section('content')

            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="top-nav clearfix">
                        <div class="col-xs-24">
                            <div class="sort-category hidden-sm hidden-md hidden-lg">
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#" class="sort-category__link">По свежести <i class="ico ico-arrow-down-grey sort-category__ico"></i></a>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                        <li role="presentation">
                                            <a role="menuitem" tabindex="-1" href="#" target="_blank">По рейтингу</a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <div class="sort text-right hidden-xs">
								<span class="sort__text">
									Сортировать по:
									<span class="sort__by">свежести</span> и
									<span class="sort__link link-is-active">рейтингу</span>
								</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid cont-flex">

                    <div id="sidebar_left">
                        <div class="all">
                            <input type="checkbox" name="all" id="all" />
                            <label for="all"></label>
                        </div>
                        <div class="accordion">
                            <form class="form" method="post">
                                <div class="grup"><h3>Кухни</h3>
                                    <div class="trigger">
                                        <input type="checkbox" id="checkbox-1" name="checkbox-1" value="1"/>
                                        <label for="checkbox-1" class="checkbox">
                                            Европейская <i></i>
                                        </label>
                                    </div>
                                    <div class="trigger">
                                        <input type="checkbox" id="checkbox-2" name="checkbox-2" value="2"/>
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

                                    <div class="grup"><h3>Услуги</h3>
                                        <div class="trigger">
                                            <input type="checkbox" id="checkbox-4" name="checkbox-4" value="4"/>
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
                                            <label for="checkbox-5" class="checkbox">
                                                Круглосуточно <i></i>
                                            </label>
                                        </div><br>
                                        <div>
                                            <input type="button" class="btn-1" value="Сбросить">
                                            <input type="submit" class="btn-2" value="Применить">
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                    <div id="container_content">
                        <article role="article" class="content-block clearfix">
                            <div class="sidebar col-xs-24 col-sm-10">
                                <div class="sidebar__item">
                                    <a href="/category.html" title="Скидка 20% на все средства по уходу за волосами Gliss Kur">
                                        <div class="sidebar__img">
                                            <img src="img/temp/temp_photo-1.jpg" alt="" class="img-responsive">
                                        </div>
                                    </a>
                                </div>
                                <div class="sidebar__item">
                                    <strong>Магазин «Рубль Бум»</strong>
                                </div>
                            </div>

                            <div class="col-xs-24 col-sm-14">
                                <a role="link" href="/category.html" class="content-block__heading">
                                    <h2>Скидка 20% на все средства по уходу за волосами Gliss Kur</h2>
                                </a>
                                <p class="content-block__introtext">На средства по уходу за волосами Gliss Kur действует скидка 20%. Воспользуйтесь шансом совершить приятные покупки по выгодным ценам. Скидка предоставляется с цены покупаемой продукции под товарным знаком Gliss Kur (вся линейка). Подробности предложения уточняйте в местах продаж. Предложение действительно при наличии товара в магазине. Количество товара ограничено.</p>
                                <p class="content-block__date">Срок проведения: 13.05.2015-04.06.2015</p>
                                <ul class="content-block__list list-unstyled list-inline hidden-xs">
                                    <li class="content-block__item"><a href="" class="btn btn-default content-block__tag">Акция</a></li>
                                    <li class="content-block__item"><a href="" class="btn btn-default content-block__tag">Новинки</a></li>
                                    <li class="content-block__item"><a href="" class="btn btn-default content-block__tag">Gliss Kur</a></li>
                                    <li class="content-block__item"><a href="" class="btn btn-default content-block__tag">Рубль Бум</a></li>
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
                        <article role="article" class="content-block clearfix">

                            <div class="sidebar col-xs-24 col-sm-10">
                                <div class="sidebar__item">
                                    <a href="/category.html" title="Скидка 20% на все средства по уходу за волосами Gliss Kur">
                                        <div class="sidebar__img">
                                            <img src="img/temp/temp_photo-2.jpg" alt="" class="img-responsive">
                                        </div>
                                    </a>
                                </div>
                                <div class="sidebar__item">
                                    <strong>Магазин «Рубль Бум»</strong>
                                </div>
                            </div>

                            <div class="col-xs-24 col-sm-14">
                                <a role="link" href="category.html" class="content-block__heading">
                                    <h2>Компания Purina приготовила подарки для собак</h2>
                                </a>
                                <p class="content-block__introtext">При покупке Pro Plan Dog 14кг - гамак для перевозки собак в авто в подарок.</p>
                                <p class="content-block__date">Срок проведения: 13.05.2015-04.06.2015</p>
                                <ul class="content-block__list list-unstyled list-inline hidden-xs">
                                    <li class="content-block__item"><a href="" class="btn btn-default content-block__tag">Акция</a></li>
                                    <li class="content-block__item"><a href="" class="btn btn-default content-block__tag">Новинки</a></li>
                                    <li class="content-block__item"><a href="" class="btn btn-default content-block__tag">Purina</a></li>
                                    <li class="content-block__item"><a href="" class="btn btn-default content-block__tag">Pro Plan</a></li>
                                    <li class="content-block__item"><a href="" class="btn btn-default content-block__tag">Корм для собак</a></li>
                                    <li class="content-block__item"><a href="" class="btn btn-default content-block__tag">Дом и дача</a></li>
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
                        <article role="article" class="content-block clearfix">

                            <div class="sidebar col-xs-24 col-sm-10">
                                <div class="sidebar__item">
                                    <a href="offer.html" title="Скидка 20% на все средства по уходу за волосами Gliss Kur">
                                        <div class="sidebar__img">
                                            <img src="img/temp/temp_photo-1.jpg" alt="" class="img-responsive grayscale">
                                        </div>
                                    </a>
                                </div>
                                <div class="sidebar__item">
                                    <strong>Магазин «Рубль Бум»</strong>
                                </div>
                            </div>

                            <div class="col-xs-24 col-sm-14">
                                <div class="box-status__wrap">
                                    <span class="btn box-status__item">Акция завершена</span>
                                </div>
                                <a role="link" href="category.html" class="content-block__heading content-block__heading--close">
                                    <h2>Компания Purina приготовила подарки для собак</h2>
                                </a>
                                <p class="content-block__introtext">При покупке Pro Plan Dog 14кг - гамак для перевозки собак в авто в подарок.</p>
                                <p class="content-block__date">Срок проведения: 13.05.2015-04.06.2015</p>
                                <ul class="content-block__list list-unstyled list-inline hidden-xs">
                                    <li class="content-block__item"><a href="" class="btn btn-default content-block__tag">Акция</a></li>
                                    <li class="content-block__item"><a href="" class="btn btn-default content-block__tag">Новинки</a></li>
                                    <li class="content-block__item"><a href="" class="btn btn-default content-block__tag">Purina</a></li>
                                    <li class="content-block__item"><a href="" class="btn btn-default content-block__tag">Pro Plan</a></li>
                                    <li class="content-block__item"><a href="" class="btn btn-default content-block__tag">Корм для собак</a></li>
                                    <li class="content-block__item"><a href="" class="btn btn-default content-block__tag">Дом и дача</a></li>
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
                    </div>

                    <div id="clear"></div>

                </div>
                <div class="row-fluid">
                    <div class="load-more">
                        <button role="button" class="btn btn-secondary btn-lg js-load-more" data-animation="rotate">
                            <i class="load-more__reload ico ico-reload pull-left"></i>
                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                            Загрузить еще
                        </button>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                </div>
            </div>

@endsection