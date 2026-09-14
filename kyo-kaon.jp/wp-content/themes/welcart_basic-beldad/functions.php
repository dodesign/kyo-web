<?php

if ( !defined('USCES_VERSION') ) return;


/***********************************************************
* includes
***********************************************************/

require( dirname( __FILE__ ) . '/inc/theme-customizer.php' );
require( get_stylesheet_directory() . '/inc/load.php' );


/***********************************************************
* welcart_setup
***********************************************************/
function wcct_setup() {
	
	load_child_theme_textdomain( 'welcart_basic_beldad', get_stylesheet_directory() . '/languages' );

	register_nav_menus( array(
		'header'		=> __( 'Header Navigation', 'usces' ),
		'header-sub'	=> __( 'Header Sub Navigation', 'welcart_basic_beldad' ),
		'footer'		=> __( 'Footer Navigation', 'usces' ),
		'footer-sub'	=> __( 'Footer Sub Navigation', 'welcart_basic_beldad' ),
	) );
	
	register_default_headers( array(
		'wcct-default'	=> array(
			'url'			=> '%2$s/assets/images/image-top.jpg',
			'thumbnail_url'	=> '%2$s/assets/images/image-top.jpg',
		)
	) );
	
	add_theme_support( 'post-thumbnails' );
	add_image_size('img500x500', 500, 500, true);
	
	add_theme_support( 'customize-selective-refresh-widgets' );

}
add_action( 'after_setup_theme', 'wcct_setup' );


/***********************************************************
* Custom Header
***********************************************************/

function wcct_custom_header_args( $array ) {
	$array['default-image']	= get_stylesheet_directory_uri(). '/assets/images/image-top.jpg';
	$array['width']			= '820';
	$array['height']		= '580';
	
	return $array;
}
add_filter( 'welcart_basic_custom_header_args', 'wcct_custom_header_args' );

/***********************************************************
* Admin css
***********************************************************/
function wcct_admin_enqueue( $hook ) {
	if ( 'widgets.php' == $hook ) {
		wp_enqueue_style( 'wcct_admin_style', get_stylesheet_directory_uri() . '/assets/css/admin.css', array( 'basic_admin_style' ) );
	}
}
add_action( 'admin_enqueue_scripts', 'wcct_admin_enqueue' );

/***********************************************************
* widget-area
***********************************************************/

function remove_welcart_basic_widgets_init() {
	remove_action('widgets_init', 'welcart_basic_widgets_init');
}
add_action('init','wcct_widgets_init');

function remove_some_widgets() {
	unregister_sidebar( 'left-widget-area' );
	unregister_sidebar( 'center-widget-area' );
	unregister_sidebar( 'right-widget-area' );
}
add_action( 'widgets_init', 'remove_some_widgets', 11 );

function wcct_widgets_init() {

	register_sidebar( array(
		'name'			=> __( 'Widget area over the category list', 'welcart_basic_beldad' ),
		'id'			=> 'beldad1',
		'description'	=> __( 'You can display the widget over the category list. Please use to display the banner and product list.', 'welcart_basic_beldad' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<div class="section-head"><h2 class="widget_title">',
		'after_title'	=> '</h2></div>',
	) );
	register_sidebar( array(
		'name'			=> __( 'Widget area under the feature articles list', 'welcart_basic_beldad' ),
		'id'			=> 'beldad2',
		'description'	=> __( 'You can display widgets under feature articles. Please use it to display banner and product list.', 'welcart_basic_beldad' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<div class="section-head"><h2 class="widget_title">',
		'after_title'	=> '</h2></div>',
	) );
	register_sidebar( array(
		'name'			=> __( 'Widget area over the item list', 'welcart_basic_beldad' ),
		'id'			=> 'beldad3',
		'description'	=> __( 'You can display the widget over the item list. Please use to display the banner and product list.', 'welcart_basic_beldad' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<div class="section-head"><h2 class="widget_title">',
		'after_title'	=> '</h2></div>',
	) );
	register_sidebar( array(
		'name'			=> __( 'Widget area under the item list', 'welcart_basic_beldad' ),
		'id'			=> 'beldad4',
		'description'	=> __( 'You can display the widget under the item list. Please use to display the banner and product list.', 'welcart_basic_beldad' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<div class="section-head"><h2 class="widget_title">',
		'after_title'	=> '</h2></div>',
	) );
	register_sidebar( array(
		'name'			=> __( 'Footer', 'welcart_basic_beldad' ),
		'id'			=> 'footer',
		'description'	=> __( 'You can display the widget in the footer. Please use it to display banner and calendar.', 'welcart_basic_beldad' ),
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<div class="foot-head"><h2 class="widget_title">',
		'after_title'	=> '</h2></div>',
	) );
}

add_action( 'widgets_init', 'wcct_widgets_init' );

/***********************************************************
* wp_enqueue_scripts
***********************************************************/
function wcct_enqueue_styles() {
	global $is_IE, $is_safari;
	
	$template_dir	= get_template_directory_uri();
	$stylesheet_dir = get_stylesheet_directory_uri();

	if ( wcct_get_options( 'page_loading' ) ) {
		if (! ( welcart_basic_is_member_page() || welcart_basic_is_cart_page() ) ) {
			wp_enqueue_script( 'wcct-loading-js', $stylesheet_dir .'/assets/js/wcct-loading.js', array( 'jquery' ), '1.0');
		}
	}
	
	wp_enqueue_style( 'parent-style', $template_dir . '/style.css' );
	wp_enqueue_style( 'parent-welcart-style', $template_dir . '/usces_cart.css', array(), '1.0' );
	
	
	// Google Fonts
	wp_enqueue_style( 'google-fonts-sans', 'https://fonts.googleapis.com/css?family=Suranna|Work+Sans', array() );
	
	
	// WCEX Plugin
	if ( defined( 'WCEX_MSA_VERSION' ) ) {
		wp_enqueue_style( 'parent-msa', $template_dir . '/wcex_multi_shipping.css', array('msa_style'), WCEX_MSA_VERSION, false  );	
	}
	if ( defined( 'WCEX_WIDGET_CART' ) ) {
		wp_enqueue_style( 'parent-widget_cart', $template_dir . '/wcex_widget_cart.css', array(), '1.0');
	}
	if ( defined( 'WCEX_SKU_SELECT' ) ) {
		wp_enqueue_style( 'parent-sku_select', $template_dir . '/wcex_sku_select.css', array(), '1.0');
	}
	if ( defined( 'WCEX_AUTO_DELIVERY' ) ) {
		wp_enqueue_style( 'parent-auto_delivery', $template_dir . '/auto_delivery.css', array(), '1.0');
	}
	
	// Fixed Header
	if( wcct_get_options('fixed_header') && ! welcart_basic_is_cart_page() ) {
		wp_enqueue_style( 'fixed-header-style', $stylesheet_dir . '/assets/vendor/fixed-header/fixed-header.css', array(), '1.0' );
		wp_enqueue_script( 'fixed-header-js', $stylesheet_dir .'/assets/vendor/fixed-header/fixed-header.js', array( 'jquery' ), '1.0');
	}
	
	// Common
	wp_enqueue_script( 'wcct-customized', $stylesheet_dir . '/assets/js/wcct-customized.js', array(), '1.0' );

	//FlexSlider
	if ( is_home() || is_front_page() ) {
		wp_enqueue_style( 'flexslider-style', $stylesheet_dir . '/assets/vendor/flexslider/css/flexslider.css', array(), '1.0' );
		wp_enqueue_script( 'flexslider-js', $stylesheet_dir .'/assets/vendor/flexslider/js/jquery.flexslider-min.js', array( 'jquery' ), '1.0');
		wp_enqueue_script( 'wcct-flexslider-js', $stylesheet_dir .'/assets/js/wcct-flexslider.js', array(), '1.0');
	}
	
	//slick
	wp_enqueue_style( 'slick-style', $stylesheet_dir . '/assets/vendor/slick/slick.css', array(), '1.0' );
	wp_enqueue_style( 'slick-theme-style', $stylesheet_dir . '/assets/vendor/slick/slick-theme.css', array(), '1.0' );
	wp_enqueue_script( 'slick-js', $stylesheet_dir .'/assets/vendor/slick/slick.min.js', array( 'jquery' ), '1.0');
	wp_enqueue_script( 'wcct-slick-js', $stylesheet_dir .'/assets/js/wcct-slick.js', array( 'slick-js' ), '1.0');
	
	if ( wcct_get_options( 'display_widget_slide' ) ) {
		wp_enqueue_script( 'wcct-widget-slide-js', $stylesheet_dir .'/assets/js/widget-slide.js', array( 'slick-js' ), '1.0');
	}
	
	//IE Hacks
	if ( $is_IE ) {
		wp_enqueue_style( 'ie-style', $stylesheet_dir . '/assets/css/ie.css', array( 'wc-basic-style' ), '1.0' );
	} elseif ( $is_safari ) {
		wp_enqueue_style( 'safari-style', $stylesheet_dir . '/assets/css/safari.css', array( 'wc-basic-style' ), '1.0' );
	}

}
add_action( 'wp_enqueue_scripts', 'wcct_enqueue_styles', 9 );


/* ===== Google Ads purchase conversion (Welcart completion page) ===== */
add_filter( 'usces_filter_conversion_tracking', 'kaon_gads_purchase_conversion', 10, 3 );
function kaon_gads_purchase_conversion( $html, $entries, $carts ) {
	global $usces;
	$total = 0;
	if ( isset( $entries['order']['total_full_price'] ) ) {
		$total = (int) preg_replace( '/[^0-9]/', '', (string) $entries['order']['total_full_price'] );
	}
	$order_id = '';
	if ( isset( $usces->payment_results['order_id'] ) ) {
		$order_id = (string) $usces->payment_results['order_id'];
	}
	$tag  = '<script>' . "\n";
	$tag .= 'if (typeof gtag === "function") {' . "\n";
	$tag .= '  gtag("event", "conversion", {' . "\n";
	$tag .= '    "send_to": "AW-18113833274/y4j3CMiX2uscELrSrL1D",' . "\n";
	$tag .= '    "value": ' . $total . ',' . "\n";
	$tag .= '    "currency": "JPY",' . "\n";
	$tag .= '    "transaction_id": "' . esc_js( $order_id ) . '"' . "\n";
	$tag .= '  });' . "\n";
	$tag .= '}' . "\n";
	$tag .= '</script>' . "\n";
	return $html . $tag;
}


/* ===== GA4：予約フォーム送信を generate_lead として送る =====
   Contact Form 7 は AJAX 送信なので、GA4 の拡張計測（フォームの操作）では拾えない。
   CF7 の wpcf7mailsent イベントを拾って GA4 にイベントを送る。

   Google広告側のコンバージョン（AW-18113833274/…）は Elementor 側に別途入っているので、
   ここでは触らない。二重発火を避けるため GA4 のイベントだけを送る。

   ・意図的に value は送っていない。予約は「申込」であって売上確定ではないため、
     GA4 の「合計収益」に見込み金額が混ざるのを避ける。
     金額で見たくなったら value: 8800 * 人数 を足す。
   ・plan / page_path を一緒に送るので、ワークショップ予約と一般の問い合わせを
     GA4 側で区別できる。 */
add_action( 'wp_footer', 'kaon_ga4_cf7_lead_event', 99 );
function kaon_ga4_cf7_lead_event() {
	?>
	<script>
	document.addEventListener( 'wpcf7mailsent', function ( e ) {
		if ( typeof gtag !== 'function' ) { return; }
		var plan = '', people = '';
		try {
			( e.detail.inputs || [] ).forEach( function ( f ) {
				if ( f.name === 'plan' ) { plan = f.value; }
				if ( f.name === 'number-702' ) { people = f.value; }
			} );
		} catch ( err ) {}
		gtag( 'event', 'generate_lead', {
			form_id: e.detail.contactFormId,
			page_path: location.pathname,
			plan: plan,
			people: people
		} );
	}, false );
	</script>
	<?php
}


/* PHPメモリ上限の引き上げ
   WordPress 7.1 + Elementor で /service/workshop/ が既定の128Mを超えて500になるため。
   管理画面は WP_MAX_MEMORY_LIMIT により既に256Mで動いているので、フロントも揃える。 */
@ini_set( 'memory_limit', '256M' );
