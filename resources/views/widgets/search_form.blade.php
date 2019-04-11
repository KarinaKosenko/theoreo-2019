<div class="col-lg-10 col-md-10 col-sm-10 hidden-xs pull-right search-form-big anim js-search-form">
    <form id="searchForm" action="" class="search-form" role="search">
        <div class="input-group">
            <input type="text"
                   class="search-form__input form-control anim"
                   placeholder="Поиск"
                   name="search_text"
                   value="{{$search_text ?? ''}}"
            >
            <span class="input-group-btn">
				<button role="button"
                        class="btn btn-link search-form__submit anim"
                        type="submit"
                >
                    <i class="ico ico-search"></i>
                </button>
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
@push('botton-scripts')
<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script>
    $(()=>{
        $('#searchForm').on('submit', e =>{
            const text=$('[name="search_text"]').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            e.stopPropagation();
            e.preventDefault();

            const postReq = $.post('/action/search',{
                text:text
            });

            postReq.then(data =>{
                $('#content').html(data);
            }, error=>{
                console.log(data);
            });
        });
    });
</script>
@endpush