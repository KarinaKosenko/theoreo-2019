
$(document).ready(function() {

/* DELETE 16.11.2015
*
	function category(e) {
		e.preventDefault(); 

		$("#closeMask").toggleClass("closeMask");
	}

	function search(e) {
		e.preventDefault();

		$("#searchForm").toggleClass("hidden-xs col-xs-20 pull-right pull-left");
		$("#choiceCity").toggleClass("col-xs-2 col-xs-offset-2 hidden-xs");
	}


	function menuSmallToggle(e) {
		e.preventDefault();

		$("#menuSmallList").toggleClass("hidden");
		$("#closeMask").toggleClass("closeMask");
		if ($("#choiceCityListM").hasClass("hidden") === false) {
			$("#choiceCityListM").addClass("hidden");
		}
		if ($("#choiceCityList").hasClass("hidden") === false) {
			$("#choiceCityList").addClass("hidden");
		}
	}

	function cityListFull(e) {
		e.preventDefault();

		$("#choiceCityList").toggleClass("hidden");
		$("#closeMask").toggleClass("closeMask");
		if ($("#menuSmallList").hasClass("hidden") === false) {
			$("#menuSmallList").addClass("hidden");
		}
	}

	$("#categoryListIcon").click(function(e) {
		e.preventDefault();

		$("#categoryBlock").css('display', 'block');
		$("#categoryList").toggleClass('category-list-icon');
		$("#categoryBlock").toggleClass("hidden-xs hidden-sm");
		$("#categoryList").toggleClass("list-inline");
		$("#closeMask").toggleClass("closeMask");
	})

	$("#categoryListStickAll").click(function(e) {
		e.preventDefault();

		$("#categoryBlock").toggleClass('category-block-sticky-all');
		$("#categoryList").toggleClass('category-list-sticky-all');
		$("#categoryList").toggleClass("list-inline");
		$("#closeMask").toggleClass("closeMask");
	});
	$(".js-category").click(category);
	$("#searchLink").click(search);
	$("#menu-small").click(menuSmallToggle);
	$("#choiceCityFull").click(cityListFull);
	//$("#choiceCity").click(cityList);



	$("#closeMask").click(closeModal);
	$(window).resize(closeModal);

	function closeModal() {

		if ($("#sortByList").hasClass("hidden") === false) {
			$("#sortByList").addClass("hidden");
		}
		if ($("#menuSmallList").hasClass("hidden") === false) {
			$("#menuSmallList").addClass("hidden");
		}
		if ($("#choiceCityListM").hasClass("hidden") === false) {
			$("#choiceCityListM").addClass("hidden");
		}
		if ($("#choiceCityList").hasClass("hidden") === false) {
			$("#choiceCityList").addClass("hidden");
		}

		$("#closeMask").removeClass("closeMask");
		
	}

* Block accorgion page category
*/




var $carousel = $('.carousel');
$carousel.owlCarousel({
	pagination : false,
	items : 3,
	itemsCustom : false,
	itemsDesktop : [1199,3],
	itemsDesktopSmall : [992,3],
	itemsTablet: [768,2],
	itemsTabletSmall: false,
	itemsMobile : [320,1],
	singleItem : false,
	itemsScaleUp : false,
	margin: 0
});





/* 
last UPD: 16.11.2015 22:58
http://grigorev.pw
*/
	var $html = $('html');
	var $body = $(document.body);
	var $main = $('.main');
	var $header = $('.js-header');
	var $menu_btn = $('.js-menu');
	var $load_more = $('.js-load-more');
	var $footer = $('.footer');
	var $anim = $('[data-animation]');


	$menu_btn.on('click', function(e) {
		e.preventDefault();
		$(this).toggleClass('menu-small__btn--active');
	});



	/* анимированная иконка в кнопке по [data-animation=""] */
	$anim.on('click', function(e) {
		e.preventDefault();
		var data = $(this).data('animation');
		$(this).children('.ico').toggleClass(data);
	});


/* может пригодится
-------------------------------------------------- */
	/* Считаем ширину скроллбара */
	/*function getScrollbarWidth() {
	    if ($(document.body).height() <= $(window).height()) {
	      return 0;
	    }
	    var outer = document.createElement('div');
	    var inner = document.createElement('div');
	    var widthNoScroll;
	    var widthWithScroll;
	    outer.style.visibility = 'hidden';
	    outer.style.width = '100px';
	    document.body.appendChild(outer);
	    widthNoScroll = outer.offsetWidth;
	    outer.style.overflow = 'scroll';
	    inner.style.width = '100%';
	    outer.appendChild(inner);
	    widthWithScroll = inner.offsetWidth;
	    outer.parentNode.removeChild(outer);
	    return widthNoScroll - widthWithScroll;
	}*/


	/* оставляем отступ и запрещаем скролл */
	var lockedClass = 'is-locked';
	var screen = {
		lock: 	function () {
		    var paddingRight;
			//var $body;

		    if (!$html.hasClass(lockedClass)) {
			  /*var $body = $(document.body);
		      paddingRight = parseInt($body.css('padding-right'), 10) + getScrollbarWidth();*/

		      //$body.css('padding-right', paddingRight + 'px');
		      $html.addClass(lockedClass);
		      $body.addClass(lockedClass);
		    }
		},
		unlock:	function () {
		    var paddingRight;
			//var $body;

		    if ($html.hasClass(lockedClass)) {
			  //var $body = $(document.body);
		      //paddingRight = parseInt($body.css('padding-right'), 10) - getScrollbarWidth();

		      //$body.css('padding-right', paddingRight + 'px');
		      $html.removeClass(lockedClass);
		      $body.removeClass(lockedClass);
		    }
		}
	}

/*
-------------------------------------------------- */

	

	// списки
	var $box = $('.box-list');
	var $box_show = $(".js-box-show");
	var $box_hide = $(".js-box-hide");
	var $box_list = $(".js-box-list");
	var $top_icon_list = $(".js-top-icon");
	var $search_show = $('.js-search-show');
	var $search_form = $('.js-search-form');
	var $search_hide = $('.js-search-hide');

	$(window).resize(function() {
		if($(window).width() > 768) {
			$header.removeClass('header-is-open');
			box.hide();
			search.hide();
		}
	});

	var box = {
		show: 	function (data) {
			var $box_this = $box.children('[data-box-list="'+data+'"]');

			box.hide();
			$box_this.addClass('box-is-open');
			$box_this.parent().css('bottom','0');

			//$top_icon_close.show();

			if ($(window).width() < 768) {
				$box_hide.show();
				$header.addClass('header-is-open');
				$top_icon_list.hide();
				screen.lock();
			};
		},
		hide: 	function (data) {
			$box.css('bottom','auto');
			$box_list.removeClass('box-is-open');
			$header.removeClass('header-is-open');
			screen.unlock();
			if ($(window).width() < 768) {
				search.hide();
				$box_hide.hide();
			}
		}
	}

	$box_show.on('click', function(e) {
		e.preventDefault();

		var data = $(this).data('box-show');
		var $box_this = $box.children('[data-box-list="'+data+'"]');

		if (!$box_this.hasClass('box-is-open')) {
			box.show(data);
		} else {box.hide();}

	});
	$box_hide.on('click', function(e) {
		e.preventDefault();
		box.hide();
		$top_icon_list.show();

	});
	$main.on('click', function() {
		if ($box_list.hasClass('box-is-open')) {
			box.hide();
		}
	});



	/* поиск top */

	search = {
		toggle: function() {
			if(!$search_show.hasClass('search-is-open')) {
				$search_hide.hide();
			} else {
				$search_hide.show();
			}
			$search_form.toggleClass('search-is-open');
			$search_show.toggleClass('search-is-open');

			$top_icon_list.hide();
			$box_hide.show();
		},
		hide: function() {
			$search_hide.show();
			$search_form.removeClass('search-is-open');
			$search_show.removeClass('search-is-open');

			$top_icon_list.show();
			$box_hide.hide();
		}
	}

	$search_show.on('click', function(e) {
		e.preventDefault();
		search.toggle();
	});

/*
------------------------------------------------------------------ */

	// список магазинов

	function storeShow() {

		var $store_list = $(".js-store-list");
		var currentHeight = $store_list.css("height");
			$store_list.css("height","auto");

		var animateHeight = $store_list.css("height");
			$store_list.css("height", currentHeight);
			$store_list.animate({height: animateHeight}, 500);

		$(".js-store-list").addClass('show');
		$(".more-info__load-more").animate({opacity: 0}, 500, function(){
			$(this).css('visibility','hidden');
		});
	}
	$(".js-store-show").click(storeShow);
	$(window).resize(function() {
		if($(window).width()<768) {
			storeShow();
		}
	});


	// fixed menu
	$(window).scroll(function(e){
		e.preventDefault();
		if ($(this).scrollTop() > 50){
			$header.addClass("sticky");
			box.hide();
		} else {
			$header.removeClass("sticky");
		}

		if ($(window).scrollTop() >= 500) {
			$(".js-up").removeClass("hidden");
		} else {
			$(".js-up").addClass("hidden");
		}
	});



	// scroll up
	$('.js-up').click(function (e) {
		e.preventDefault();
        $('html, body').animate({ scrollTop:0 }, 'fast');
        return false;
    });

    /* back
    * заглушка, лучше проверить на случай если пользователь не из каталога
    */
	$(".js-back").click(function(event) {
		event.preventDefault();
		window.history.back()
	});


    /* Message PX
	*	простые сообщения/подсказки на коленке
	*
	*	message.error('Ошибка!');
	*	message.success('Успех!');
    */
    var $notice = $('.notice');
	var message = {
		error: 	function (msg) {
			var cls = 'warning';
			message.init(msg,cls);
		},
		success: 	function (msg) {
			var cls = 'success';
			message.init(msg,cls);
		},
		init: function(msg, cls) {
			$main.append('
				<div class="notice notice--'+cls+'" style="opacity:0;">
			        <div class="container text-center">
			            '+msg+'
			        </div>
			    </div>
			');

			var height_notice = $('.notice').height();
			$('.notice').css('bottom', '-'+height_notice+'px');
			$('.notice').animate({
			  	bottom: 0,
			    opacity: 1
			}, 300);

			message.close(3000);
			return false;
		},
		close: function(time) {
			function notice_hide() {
				$(".notice").animate({
					opacity: 0},
					500, function() {
						$(this).remove();
				});
			}
			setTimeout(notice_hide, time);
		}
	}


	$('.js-load-more').click(function() {

        message.success('<b>Успех!</b> Загружаем другие элементы.');
        //screen.lock();
	});


/*
------------------------------------------------------------------ */

/*
* если не нравится, варианты: 
* - сразу вписать названия в .cell__name
* - пихать названия в content:''; у псевдоэлементов td
*/
var table = '.table-block';
if($('div').is(table)) {
	$(table+'__col-head').each(function(i) {
		++i;
		$(this).parents(table).find(table+'__col:nth-child('+i+') .cell__name').text($(this).text());
	});
}




/*
запускаем tooltip bootstrap
------------------------------------------------------------------ */
	$(function () {
        $("[data-toggle='tooltip']").tooltip();
	});

});

/*
кнопка загрузки постов
------------------------------------------------------------------ */
$(function(){

    $('.js-load-more').on('click', function(){
        const btn = $(this);
        const loader = btn.find('span');
        $.ajax({
            url: '/data.html',
            type: 'GET',
            beforeSend: function(){
                btn.attr('disabled', true);
                loader.addClass('d-inline-block');
            },
            success: function(responce){
                setTimeout(function(){
                    loader.removeClass('d-inline-block');
                    btn.attr('disabled', false);
                    $('.after-posts').before(responce);
                }, 1000);
            },
            error: function(){
                alert('Error!');
                loader.removeClass('d-inline-block');
                btn.attr('disabled', false);
            }
        });
    });

});
