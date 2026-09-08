( function( $ ) {
	
	$(document).ready(function(){
		
		$('.home-widget .widget_welcart_featured .ucart_featured_body').addClass('slider');
		$('.home-widget .widget_welcart_bestseller .ucart_widget_body').addClass('slider');
		
		// home : .upper .widget_basic_item_list
		$('.upper .widget_basic_item_list .slider').slick({
			
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
		// home : .lower .widget_basic_item_list
		$('.display-sidebar .lower .products-box .widget_basic_item_list .slider').slick({
			
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
		$('.no-sidebar .lower .products-box .widget_basic_item_list .slider').slick({
			
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

		
		
		// home : .upper .widget_welcart_bestseller
		$('.upper .widget_welcart_bestseller .slider').slick({
			
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
		// home : .lower .widget_welcart_featured
		$('.display-sidebar .lower .products-box .widget_welcart_bestseller .slider').slick({
			
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
		$('.no-sidebar .lower .products-box .widget_welcart_bestseller .slider').slick({
			
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
		
		

		// home : .upper .widget_welcart_featured
		$('.upper .widget_welcart_featured .slider').slick({
			
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
		// home : .lower .widget_welcart_featured
		$('.display-sidebar .lower .products-box .widget_welcart_featured .slider').slick({
			
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
		$('.no-sidebar .lower .products-box .widget_welcart_featured .slider').slick({
			
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

		
	});
	
} )( jQuery );