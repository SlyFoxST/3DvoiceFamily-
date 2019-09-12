jQuery(document).ready(function($) {
$(window).on('load', function () {
    var $preloader = $('#p_prldr'),
        $svg_anm   = $preloader.find('.svg_anm');
    $svg_anm.fadeOut();
    $preloader.delay(500).fadeOut('slow');
});
 $('.single-item').slick(
{
	infinite: true,
	dots: true,
	autoplay: true,
	autoplaySpeed: 3000,
	draggable: true,
	arrows: false,
	slidesToShow: 5,
	slidesToScroll: 5,
	responsive: [
	   {
	      breakpoint: 990,
	      settings: {
	        slidesToShow: 3,
	      }
	    },
	    {
	      breakpoint: 768,
	      settings: {
	        slidesToShow: 2,
	      }
	    },
	    {
	      breakpoint: 480,
	      settings: {
	        slidesToShow: 1,
	      }
	    }
    ]
}

 	);
	$("[data-fancybox]").fancybox();
	if($(window).width(600)){
		$('.sidebar-terms').on('click',function(){
			$('.list-term').toggleClass('block');
		});
		$('.sidebar-country').on('click',function(){
			$('list-country').toggleClass('block');
		});
		$('.sidebar-city').on('click',function(){
			$('list-city').toggleClass('block');
		});

	}
	$('.comment-form-author input, .comment-form-email input, .comment-form-comment textarea').focus(function(){
		$(this).attr("placeholder", "");
	});
	$('.says').html('/');
	$(".add").on("click",function(){
		$(".none-add").toggleClass("show");
	});

	$(".close-poopup").on("click",function(){
		$(".none-add").removeClass("show");
		$(".none-login").removeClass("show");
	});

	$(".login").on("click",function(){
		$(".none-login").addClass("show");
	});

	$(".registrate-btn").on("click",function(){
		$(".registrate").toggleClass("show");
	});
	$(document).on("mouseup",function(e){ 
		var popup = $('.form-login-section');
		if (e.target!=popup[0]&&popup.has(e.target).length === 0){
			$('.none-add').removeClass("show");	
			$('.none-login').removeClass("show");
			

		}
	});
	$(document).on("mouseup",function(e){
		var popup3 = $("#registerform");
		if(e.target!=popup3[0]&&popup3.has(e.target).length === 0){
			$('.registrate').removeClass("show");
		}
	});
	$(".burger").on("click",function(){
		$(".heade-mnu").toggleClass("show");
	});

	$(".loop-slider").bxSlider({
		responsive: true,
		minSlides: 1,
		maxSlides: 3,
		slideWidth: 350,
		responsive: true,
		autoControls: true,
		pager: false
	});
	$(".bx-prev,.bx-next").html(" ");
	$(".img-d").on("click",function(){
		$(".menu-item-has-children .sub-menu").toggleClass("show");
	});
	$('.btn-zakas').on("click",function(){
		$(".zakas-uslug").slideDown();
	});
	$(".zakas-uslug").on("click",function(e){
		var popup_uslugi = $(".form-wrap");
		if(e.target!= popup_uslugi[0] && !popup_uslugi.has(e.target).length){
			$(this).slideUp();
		}
	});
	$('.close-form').on('click',function(){
		$('.zakas-uslug').slideUp();
	});
	$(".name-z , .tel, .text-msg").focus(function(){
		$(this).removeAttr('placeholder');
	});
	$(".sidebar-terms").on("click",function(){
		$(this).toggleClass("rotate");
		$(".list-term").toggleClass("hide");
	});
	$(".sidebar-country").on("click",function(){
		$(this).toggleClass("rotate");
		$(".list-country").toggleClass("hide");
	});
	$(".sidebar-city").on("click",function(){
		$(this).toggleClass("rotate");
		$(".list-city").toggleClass("hide");
	});

	$('#true_loadmore').click(function(){
		$(this).text('Загрузка...'); // изменяем текст кнопки, вы также можете добавить прелоадер
		var data = {
			'action': 'loadmore',
			'query': true_posts,
			'page' : current_page
		};
		$.ajax({
			url:ajaxurl, // обработчик
			data:data, // данные
			type:'POST', // тип запроса
			success:function(data){
				if( data ) { 
					$('#true_loadmore').text('Загрузить ещё').before(data); // вставляем новые посты
					current_page++; // увеличиваем номер страницы на единицу
					if (current_page == max_pages) $("#true_loadmore").remove(); // если последняя страница, удаляем кнопку
				} else {
					$('#true_loadmore').remove(); // если мы дошли до последней страницы постов, скроем кнопку
				}
			}
		});
	});
	$('.bxslider_1').bxSlider({
		minSlides: 1,
		maxSlides: 3,
		slideWidth: 258
	});
	$('.heade-mnu   li.menu-item-has-children > a').before('<div class="before-icon">&raquo;</div>');
	$('.menu-navesnoe   li.menu-item-has-children > .sub-menu > li.menu-item-has-children > a').before('<div class="before-icon">&raquo;</div>');

		if (window.innerWidth <= 1200) {
			document.querySelectorAll('.before-icon').forEach((item)=> {
				item.addEventListener('click', function() {
					this.parentNode.parentNode.querySelectorAll('.active-menu-item').forEach(function(item){
						item.querySelectorAll('.active-menu-item').forEach(function(item){
							item.classList.remove('active-menu-item');
						});
						item.classList.remove('active-menu-item');
					});
					this.parentNode.classList.add('active-menu-item');
				})
			});
		}


});

var index = 1;
showSlides(index);
function plus(n){
	showSlides(index += n);
}
function current(n){
	showSlides(index = n);
}
function showSlides(n){
	var i = 0;
	var slaidiki = document.getElementsByClassName("slaidik");
 //console.log(slaidiki);
 var dots = document.getElementsByClassName("dot");
 //console.log(dots.length);
 if(n > slaidiki.length){
 	index = 1;
 }
 if(n < 1){
 	index = slaidiki.length;
 }
 for(i = 0; i < slaidiki.length; i++){
 	slaidiki[i].style.display = "none";
 }
 for(i = 0; i < dots.length; i++){
 	dots[i].classList.remove("dots-active");
 }
 slaidiki[index - 1].style.display = "block";
 dots[index - 1].classList.add("dots-active");
}

