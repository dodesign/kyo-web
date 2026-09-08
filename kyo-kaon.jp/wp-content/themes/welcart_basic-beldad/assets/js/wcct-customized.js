( function( $ ) {

		$( document ).ready( function() {
			
			//Mobile header = Widget ACart
			$('header .widgetcart .iconbtn').on('click', function(){
				$('.site').addClass('open-widgetcart');
			});
			$('header .widgetcart .close').on('click', function(){
				$('.site').removeClass('open-widgetcart');
			});
			$('header .widgetcart .view-cart-wrap').on('click', function(){
				$('.site').removeClass('open-widgetcart');
			});

			//Mobile header = Membership
			$('header .membership .iconbtn').on('click', function(){
				$('.site').addClass('open-membership');
			});
			$('header .membership .close').on('click', function(){
				$('.site').removeClass('open-membership');
			});
			$('header .membership .over-inner').on('click', function(){
				$('.site').removeClass('open-membership');
			});
			
			
			
			var windowWidth = window.innerWidth;
			var html = $('html');
			var mb_menu	= document.getElementById('mobile-menu');
			
			
			if ( windowWidth <= 1000 ) {
				
				var movefun = function( event ) {
					event.preventDefault();
				}
				
				//Mobile header = Menu
				$(document).on('click', 'header .menus .iconbtn', function () {
					html.css('overflow', 'hidden');
					$('#mobile-menu').css('overflow-y', 'scroll');
				});
				$(document).on('click', 'header .mobile-menu .close', function () {
					html.css('overflow', 'scroll');
					mb_menu.removeEventListener('touchmove', movefun , { passive: false } );
				});
				$(document).on('click', '.gray-bg', function () {
					html.css('overflow', 'scroll');
					mb_menu.removeEventListener('touchmove', movefun , { passive: false } );
				});

			}
			
			$('#show li.list').on('click', function(){
				$('#show li.list').addClass('current');
				$('.product-list').addClass('layout-list');
				if($('.product-list').hasClass('layout-grid')){
					$('.product-list').removeClass('layout-grid');
				}
				if($('#show li.grid').hasClass('current')){
					$('#show li.grid').removeClass('current');
				}
			});
			$('#show li.grid').on('click', function(){
				$('#show li.grid').addClass('current');
				$('.product-list').addClass('layout-grid');
				if($('.product-list').hasClass('layout-list')){
					$('.product-list').removeClass('layout-list');
				}
				if($('#show li.list').hasClass('current')){
					$('#show li.list').removeClass('current');
				}
			});
			
			//addClass
			$('.widget_welcart_featured .ucart_featured_body').addClass('cf');
			$('.widget_welcart_bestseller .ucart_widget_body').addClass('cf');
			
		} );
	
		$(window).on('load resize', function() {
			var windowWidth	= window.innerWidth;
			var windowHeight = window.innerHeight;
			var SubNav		= $('.sub-navigation ul').innerWidth();
			
			if ( 1000 <= windowWidth ) {
				$('.site-description').css('margin-right', SubNav + 54 + 'px');
			} else {
				$('.site-description').css('margin-right', 0);
			}
			
			var html	= $('html');
			
			if ( windowWidth <= 1000 ) {
				
				//Mobile header = Menu
				$(document).on('click', 'header .menus .iconbtn', function () {
					$('.site').addClass('open-menu');
					html.css('height', windowHeight + 'px' );
					html.css('overflow', 'hidden');
				});
				$(document).on('click', 'header .mobile-menu .close', function () {
					$('.site').removeClass('open-menu');
					html.css('height', 'auto' );
					html.css('overflow', 'scroll');
				});
				$(document).on('click', '.gray-bg', function () {
					$('.site').removeClass('open-menu');
					html.css('height', 'auto' );
					html.css('overflow', 'scroll');
				});
				
				$('#mobile-menu').css('height', windowHeight + 'px' );
				
			} else {

				$('#mobile-menu').css('height', 'auto' );
				$('#mobile-menu').css('overflow-y', 'unset');
				html.css('overflow-y', 'scroll');

			}
			
		});
	
		$(function() {
			var pair = location.search.substring(1).split('&');
			var arg = new Object;
			for( var i = 0; pair[i]; i++ ) {
				var kv = pair[i].split('=');
				arg[kv[0]] = kv[1];
			}
			if( undefined != arg.from_item && undefined != arg.from_sku ) {
				$('.wpcf7-submit').on('click', function() {
					var form = $(this).parents('form');
					form.attr('action', $(this).data('action'));
					$('<input>').attr({
						'type': 'hidden',
						'name': 'from_item',
						'value': arg.from_item
					}).appendTo(form);
					$('<input>').attr({
						'type': 'hidden',
						'name': 'from_sku',
						'value': arg.from_sku
					}).appendTo(form);
				});
			}
		});
} )( jQuery );



document.addEventListener('DOMContentLoaded', function() {
    // 特定のa要素をb要素に置き換え
    const linksToReplace = [
        'カラーから探す',
        '素材から探す'
    ];

    // すべてのa要素を取得
    const links = document.querySelectorAll('a');

    links.forEach(link => {
        // リンクのテキストがリストにあるか確認
        if (linksToReplace.includes(link.textContent.trim())) {
            const bElement = document.createElement('b');
            bElement.innerHTML = link.innerHTML; // a要素の内容をb要素に設定
            link.parentNode.replaceChild(bElement, link); // a要素をb要素に置き換え
        } else {
            // カッコ内の色名を含む部分をfont-sizeを90%にするスタイルで置き換え
            let html = link.innerHTML;
            html = html.replace(/（[^）]+）/g, function(match) {
                return '<span style="font-size: 85%;">' + match + '</span>';
            });
            link.innerHTML = html;
        }
    });

    // リンクテキストが「商品」の<li>要素を探して削除
    const items = document.querySelectorAll('li.item-categories-item a');

    items.forEach(item => {
        if (item.textContent.trim() === '商品') {
            item.parentNode.remove(); // 親の<li>要素を削除
        }
    });
	
	// 追加したいリストアイテムを作成
    var newLi = document.createElement('li');
    newLi.className = 'cat-item';
    newLi.innerHTML = '<a href="/category/item/">すべての商品</a>';

    // ul要素を取得
    var ulElement = document.querySelector('#secondary .ucart_widget_body');
    
    // ul要素が存在する場合、最初の子要素の前に新しいリストアイテムを追加
    if (ulElement) {
        ulElement.insertBefore(newLi, ulElement.firstChild); // 最初の子要素の前に追加
    }

});
