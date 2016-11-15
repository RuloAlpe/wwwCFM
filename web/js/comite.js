/**
 * Proyecto
 *
 * # author      Damián <@damian>
 * # copyright   Copyright (c) 2016, Proyecto
 *
 */

/**
 * Document Ready
 */
$(document).ready(function(){
	
	/**
	 * Animsition
	 */
	$('.animsition').animsition();

	/**
	 * Click - Open menu
	 */
	$(".header-nav-toggle").on("click", function(){
		$(".header-nav").addClass("header-nav-full");
		$(".header-nav-close").show();
	});

	/**
	 * Click - Close menu
	 */
	$(".header-nav-close").on("click", function(){
		$(".header-nav").removeClass("header-nav-full");
		$(".header-nav-close").hide();
	});

	/**
	 * Mi cuenta
	 */
	// variables
	var btn = document.querySelector(".header-nav-cuenta-user"),
		input = document.querySelector(".header-nav-cuenta-log"),
		form = document.querySelector(".header-nav-cuenta"),
		estado = true;
	// click 
	$(".header-nav-cuenta-user").on("click", function(){

		if (estado) {
			input.classList.add("header-nav-cuenta-log-anim");
			// $(".header-nav").addClass("header-nav-user");
			$("#icon-user").removeClass("ion-person").addClass("ion-close-round");
			estado = false;
			// alert("if");
		} else {
			input.classList.remove("header-nav-cuenta-log-anim");
			// $(".header-nav").removeClass("header-nav-user");
			$("#icon-user").removeClass("ion-close-round").addClass("ion-person");
			estado = true;
			// alert("else if");
		}

	});

	/**
	 * Click - Btn para mostrar menu
	 */
	$(".carrusel-nav-btn-movil").on("click", function(){
		$(".carrusel-nav-movil").toggleClass("carrusel-nav-movil-anim");
	});

});


/**
 * Resize
 */
$(window).resize(function(){
	if ($(window).width() <= 768){	
		$(".carrusel-nav").addClass("carrusel-nav-movil");
	}
	else{	
		$(".carrusel-nav").removeClass("carrusel-nav-movil");
	}	
});