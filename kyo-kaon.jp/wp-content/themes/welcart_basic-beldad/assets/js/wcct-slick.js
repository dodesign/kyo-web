( function( $ ) {
	
	$(document).ready(function(){

		
		//item-single.php
		$('.slider-for').slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: false,
			fade: true,
			asNavFor: '.slider-nav'
		});
		$('.slider-nav').slick({
			slidesToShow: 4,
			slidesToScroll: 1,
			speed: 600,
			asNavFor: '.slider-for',
			arrows: true,
			dots: false,
			focusOnSelect: true
		});
	
		//.product-area
		$('.display-sidebar .product-area .slider').slick({
			slidesToShow: 4,
			slidesToScroll: 1,
			autoplay: true,
			centerMode: false,
			arrows: true,
			speed: 400,
			dots: false,
			focusOnSelect: false,
			responsive: [{
				breakpoint: 740,
				settings: {
						slidesToShow: 3,
					}
				}, {
				breakpoint: 640,
				settings: {
						slidesToShow: 2,
					}						
				}]
		});
		$('.no-sidebar .product-area .slider').slick({
			slidesToShow: 5,
			slidesToScroll: 1,
			autoplay: true,
			centerMode: false,
			arrows: true,
			speed: 400,
			dots: false,
			focusOnSelect: false,
			responsive: [{
				breakpoint: 740,
				settings: {
						slidesToShow: 3,
					}
				}, {
				breakpoint: 640,
				settings: {
						slidesToShow: 2,
					}						
				}]
		});
		
		//.info-area
		$('.info-area .slider').slick({

			slidesToShow: 1,
			slidesToScroll: 1,
			autoplay: true,
			vertical: true,
			arrows: false,
			speed: 400,
			dots: false,
			focusOnSelect: false,
		});
		
		//.topics-area
		$('.topics-area .slider').slick({

			slidesToShow: 4,
			slidesToScroll: 1,
			autoplay: true,
			centerMode: true,
			arrows: true,
			speed: 400,
			dots: false,
			focusOnSelect: false,
			responsive: [{
				breakpoint: 1000,
				settings: {
						slidesToShow: 3,
						slidesToScroll: 2,
						arrows: false,
					}
				}, {
				breakpoint: 740,
				settings: {
						slidesToShow: 2,
						slidesToScroll: 2,
						arrows: false,
					}
				}, {
				breakpoint: 640,
				settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
						arrows: false,
					}						
				}]
		});
		
		//.topics-area
		$('.cat-area .slider').slick({

			slidesToShow: 6,
			slidesToScroll: 1,
			autoplay: true,
			centerMode: true,
			centerPadding: '10px',
			arrows: true,
			speed: 400,
			dots: false,
			focusOnSelect: false,
			responsive: [{
				breakpoint: 1000,
				settings: {
						slidesToShow: 4,
					}
				}, {
				breakpoint: 740,
				settings: {
						slidesToShow: 3,
					}
				}, {
				breakpoint: 640,
				settings: {
						slidesToShow: 2,
					}						
				}]
		});
		
		//.pickup-area
		$('.pickup-area .slider').slick({

			slidesToShow: 3,
			slidesToScroll: 1,
			autoplay: true,
			arrows: true,
			speed: 400,
			dots: false,
			focusOnSelect: false,
			responsive: [{
				breakpoint: 1000,
				settings: {
					slidesToShow: 2,
				}						
			}, {
				breakpoint: 640,
				settings: {
					slidesToShow: 1,
				}						
			}]

		});

	});
	
} )( jQuery );