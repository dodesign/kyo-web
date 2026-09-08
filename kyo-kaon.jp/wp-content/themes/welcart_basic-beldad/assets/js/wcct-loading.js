( function( $ ) {

		window.addEventListener("DOMContentLoaded", function(){
			var time=new Date().getTime();
			$(function() {
				var windowHeight = $(window).innerHeight();
				var bodyHeight = $('body').innerHeight();

				$( 'body' ).css( 'height', windowHeight + 'px' );
				$( 'body' ).css( 'overflow', 'hidden' );
			});

			$(window).on( 'load', function () {
				$( '#loader-bg' ).delay( 600 ).fadeOut( 300 );
				$( '#loader' ).delay( 600 ).fadeOut( 300 );
				$( 'body' ).css( 'height', 'auto' );
				$( 'body' ).css( 'overflow', 'hidden' );
			});

			//10秒たったら強制的にロード画面を非表示
			$(function(){
				setTimeout( stopload(), 8000 );
			});
			function stopload(){
				$( '#loader-bg' ).delay( 600 ).fadeOut( 300 );
				$( '#loader' ).delay( 600 ).fadeOut( 300 );
				$( 'body' ).css( 'height', 'auto' );
				$( 'body' ).css( 'overflow', 'hidden' );
			}

		}, false);

} )( jQuery );