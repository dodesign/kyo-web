
( function( $ ) {
	
	$( document ).ready( function() {
		var bodyHeight = $( 'body' ).innerHeight();
		var headerHeight = $( '.site-header .bottom' ).innerHeight();
		
		if( bodyHeight > 1200 ) {
	
			$( window ).scroll( function() {
				var body	= $( 'body' );
				var headerH = $( '.site-header .top' ).innerHeight();

				//もしスクロールの高さが
				if ( $( this ).scrollTop() > headerH ) {

					body.addClass( 'fixed' );

				} else {

					body.removeClass( 'fixed' );

				}

			});
			
		}
		
		$(window).on('load resize', function() {
			var windowWidth	= window.innerWidth;
			var bodyHeight = $( 'body' ).innerHeight();
			var site_ttl_Height	= $('.site-title').innerHeight();
			
			if( bodyHeight > 1200 ) {

				if ( windowWidth <= 1000 ) {
					$( window ).scroll( function() {
						var headerH = $( '.site-header .top' ).innerHeight();
						if ( $( this ).scrollTop() > headerH ) {
							$('body').css( 'margin-top', headerHeight + 'px' );
						} else {
							$('body').css( 'margin-top', 0 );
						}
					});

				} else {
					$( window ).scroll( function() {
						var headerH = $( '.site-header .top' ).innerHeight();
						if ( $( this ).scrollTop() > headerH ) {
							$('body').css( 'margin-top', headerHeight + site_ttl_Height + 'px' );
						} else {
							$('body').css( 'margin-top', 0 );
						}
					});
				}
				
			}

		});

		
	});
	
	
	
} )( jQuery );