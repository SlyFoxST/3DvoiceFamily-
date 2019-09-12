jQuery(document).ready(function($) {
	$(".burger-wrap").on("click",function(){
		$(".burger").toggleClass("stic");
		$(".sidebar_nav").toggleClass("show");
	});

	$(".btn-vse").on("click",function(){
		$(".btn-vse img").toggleClass("rotate");
		$(".listing").toggleClass("show");
	});
	$("img.lazy").lazy({
		effect: "fadeIn",
	});

	$(".loop-slider").bxSlider({
		minSlides: 1,
		maxSlides: 3,
		responsive: true,
		autoControls: false,
		pager: false

	});
	
	$(".brand-slider").bxSlider({
		minSlides: 1,
		maxSlides: 6,
		responsive: true,
		autoControls: false,
		pager: false
	});

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
 console.log(dots.length);
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