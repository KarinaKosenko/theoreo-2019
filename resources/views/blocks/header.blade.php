<header class="header anim js-header">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row-fluid">

                <!-- Hamburger -->
                <div class="col-sm-1 col-xs-1 js-search-hide">
                    <div class="menu-small anim">
                        <div class="menu-small__btn js-menu js-box-show" data-box-show="menu">
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="box-list">
                    <ul class="menu__list hidden js-box-list" data-box-list="menu">

                    </ul>
                </div>
                <!-- / Hamburger -->

                <!-- LOGO -->
                <div class="col-lg-3 col-md-4 col-sm-5 col-xs-10 js-search-hide">
                    <h1 class="logo anim">
                        <a role="link" href="index.html" class="logo__link">
                            <img src="img/logo.png" alt="Froggle" class="logo_img">
                        </a>
                    </h1>
                </div>
                <!-- / LOGO -->

                <!-- Город full -->
                <div class="col-md-offset-1 col-sm-4 col-lg-5 hidden-xs">
                    <div class="choice-city anim">
                        <div class="choice-city__link" data-toggle="modal" data-target="#modal-city-list">
                            <i class="choice-city__ico pull-left ico ico-point"></i>
                            <span class="choice-city__item">Саратов</span>
                        </div>
                    </div>
                    <ul class="choice-city__list hidden-xs hidden">
                        <li class="choice-city__list--item"><a href="" class="choice-city__list--link">Саратов</a></li>
                        <li class="choice-city__list--item"><a href="" class="choice-city__list--link">Москва</a></li>
                        <li class="choice-city__list--item"><a href="" class="choice-city__list--link">Кызыл-Юрт</a></li>
                    </ul>
                </div>
                <!-- / Город full -->

                <div class="box-list">
                    <ul class="choice-city__list js-box-list" data-box-list="city">
                        <li class="choice-city__list--item"><a href="#" class="choice-city__list--link">Москва</a></li>
                        <li class="choice-city__list--item"><a href="#" class="choice-city__list--link">Санкт-Петербург</a></li>
                        <li class="choice-city__list--item"><a href="#" class="choice-city__list--link">Александров (Владимирская область)</a></li>
                        <li class="choice-city__list--item"><a href="#" class="choice-city__list--link">Архангельск (Архангельская область)</a></li>
                        <li class="choice-city__list--item"><a href="#" class="choice-city__list--link">Астрахань (Астраханская область)</a></li>
                        <li class="choice-city__list--item"><a href="#" class="choice-city__list--link">Белгород (Белгородская область)</a></li>
                        <li class="choice-city__list--item"><a href="#" class="choice-city__list--link">Боровск (Калужская область)</a></li>
                        <li class="choice-city__list--item"><a href="#" class="choice-city__list--link">Брянск (Брянская область)</a></li>
                        <li class="choice-city__list--item"><a href="#" class="choice-city__list--link">Валдай (Новгородская область)</a></li>
                        <li class="choice-city__list--item"><a href="#" class="choice-city__list--link">Великий Новгород (Новгородская область)</a></li>
                        <li class="choice-city__list--item"><a href="#" class="choice-city__list--link">Владимир (Владимирская область)</a></li>
                        <li class="choice-city__list--item"><a href="#" class="choice-city__list--link">Волгоград (Волгоградская область)</a></li>
                        <li class="choice-city__list--item"><a href="#" class="choice-city__list--link">Вологда (Вологодская область)</a></li>
                        <li class="choice-city__list--item"><a href="#" class="choice-city__list--link">Воронеж (Воронежская область)</a></li>
                        <li class="choice-city__list--item"><a href="#" class="choice-city__list--link">Выборг (Ленинградская область)</a></li>
                        <li class="choice-city__list--item"><a href="#" class="choice-city__list--link">Вязьма (Смоленская область)</a></li>
                        <li class="choice-city__list--item"><a href="#" class="choice-city__list--link">Геленджик (Краснодарский край)</a></li>
                        <li class="choice-city__list--item"><a href="#" class="choice-city__list--link">Городец (Нижегородская область)</a></li>
                        <li class="choice-city__list--item"><a href="#" class="choice-city__list--link">Дмитров (Московская область)</a></li>
                        <li class="choice-city__list--item"><a href="#" class="choice-city__list--link">Дубна (Московская область)</a></li>
                        <li class="choice-city__list--item"><a href="#" class="choice-city__list--link">Екатеринбург (Свердловская область)</a></li>
                    </ul>
                </div>


                <div class="col-lg-10 col-md-10 col-sm-10 hidden-xs pull-right search-form-big anim js-search-form">
                    <form action="" class="search-form" role="search">
                        <div class="input-group">
                            <input type="text" class="search-form__input form-control anim" placeholder="Поиск">
                            <span class="input-group-btn">
							    <button role="button" class="btn btn-link search-form__submit anim" type="button"><i class="ico ico-search"></i></button>
							  </span>
                        </div>
                    </form>
                </div>

                <div class="category-list col-xs-4 hidden-xs hidden-sm">
                    <div class="menu-category">
                        <a role="link" href="/" class="btn menu-category__link js-box-show" data-box-show="category">
                            Все категории <span class="ico ico-arrow-down-light"></span>
                        </a>
                    </div>
                </div>

                <div class="top-icon__list js-top-icon">
                    <!-- Город icon -->
                    <div class="top-icon__item hidden-sm hidden-md hidden-lg pull-right js-search-show">
                        <div class="choice-city js-box-show" data-box-show="city">
                            <a role="link" href="/" class="choice-city__link" title="">
                                <i class="choice-city__ico pull-left ico ico-point"></i>
                            </a>
                        </div>
                    </div>
                    <!-- / Город icon -->

                    <!-- Список icon -->
                    <div class="top-icon__item category-list-ico hidden-md hidden-lg anim js-search-hide">
                        <a role="link" href="" class="search-form__link js-box-show anim"  data-box-show="category">
                            <i class="ico ico-category-light"></i>
                        </a>
                    </div>


                    <!-- / Список icon -->

                    <!-- Поиск icon -->
                    <div class="top-icon__item pull-right hidden-sm hidden-md hidden-lg">
							<span class="search-form__link link-is-active js-search-show">
								<i class="ico ico-search-light"></i>
							</span>
                    </div>
                    <!-- / Поиск icon -->
                </div>

                <div class="top-icon__close js-box-hide">
						<span class="search-form__link link-is-active">
							<i class="ico ico-close-light"></i>
						</span>
                </div>

            </div>

            <div class="row-fluid">
                <div class="box-list">
                    <div class="category-box col-md-24 anim js-box-list" data-box-list="category">
                        <nav class="menu anim" role="navigation">
                            <ul class="list-inline list-unstyled menu__list">
                                <li class="menu__item">
                                    <input id="cat1" class="menu__input" type="checkbox">
                                    <label for="cat1"><i class="ico ico-arrow pull-left"></i>Развлечения</label>
                                </li>
                                <li class="menu__item">
                                    <input id="cat2" class="menu__input" type="checkbox" checked>
                                    <label for="cat2"><i class="ico ico-arrow pull-left"></i>Кафе/Рестораны</label>
                                </li>
                                <li class="menu__item">
                                    <input id="cat3" class="menu__input" type="checkbox">
                                    <label for="cat3"><i class="ico ico-arrow pull-left"></i>Одежда</label>
                                </li>
                                <li class="menu__item">
                                    <input id="cat4" class="menu__input" type="checkbox">
                                    <label for="cat4"><i class="ico ico-arrow pull-left"></i>Авто</label>
                                </li>
                                <li class="menu__item">
                                    <input id="cat5" class="menu__input" type="checkbox">
                                    <label for="cat5"><i class="ico ico-arrow pull-left"></i>Электроника</label>
                                </li>
                                <li class="menu__item">
                                    <input id="cat6" class="menu__input" type="checkbox">
                                    <label for="cat6"><i class="ico ico-arrow pull-left"></i>Здоровье</label>
                                </li>
                                <li class="menu__item">
                                    <input id="cat7" class="menu__input" type="checkbox">
                                    <label for="cat7"><i class="ico ico-arrow pull-left"></i>Для дома</label>
                                </li>
                                <li class="menu__item">
                                    <input id="cat8" class="menu__input" type="checkbox">
                                    <label for="cat8"><i class="ico ico-arrow pull-left"></i>Строительство</label>
                                </li>
                                <li class="menu__item">
                                    <input id="cat9" class="menu__input" type="checkbox">
                                    <label for="cat9"><i class="ico ico-arrow pull-left"></i>Услуги</label>
                                </li>
                                <li class="menu__item">
                                    <input id="cat10" class="menu__input" type="checkbox">
                                    <label for="cat10"><i class="ico ico-arrow pull-left"></i>Туризм</label>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>