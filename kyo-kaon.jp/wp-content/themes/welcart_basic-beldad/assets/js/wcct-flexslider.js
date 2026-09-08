( function( $ ) {
	
	$(window).load(function() {
		
		$('.flexslider').flexslider({
			animation: "slide",
			slideshow: true,
			controlNav: true,
			prevText: "",
			nextText: "",
		});
		$('.flex-viewport').after('<div class="flex-left-opacity"></div><div class="flex-right-opacity"></div>');
		
	});
	
} )( jQuery );