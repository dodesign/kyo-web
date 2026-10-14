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


/* ===== EMV 3-Dセキュア（本人確認）画面を見えるようにする =====
   2026-09-29 に実機テストで判明した、カード決済が完了しない件の対処。

   【症状】
   お客様から「カード決済のときにローディングが完了せず決済できない」という
   連絡が2026年9月に2〜3件。ZEUSの決済ログには該当する記録が1件も無かった。

   【原因】
   確認画面で ZEUS が差し込む 3-Dセキュアの iframe が
     <div id="3dscontainer"><iframe id="3ds_challenge" height="300px">
   と高さ300px固定で描画される。カード会社（JCB J/Secure等）の本人確認画面は
   これに収まらず、**ワンタイムパスワードの入力欄と送信ボタンが枠の外に隠れる**。
   枠内に独自のスクロールバーが出るが、その下で「処理中...」のスピナーが
   回り続けるため、お客様は「読み込みが終わらない」と認識して離脱していた。
   本人確認が完了しないので決済要求自体が成立せず、ZEUS側に記録が残らない。

   【対処】
   ・iframe と親コンテナの高さを広げる（属性 height="300px" を !important で上書き）
   ・スマホでも縦に余裕を持たせる
   ・何を求められている画面なのか、日本語の案内を上に出す
   ※ iframe の中身はカード会社のドメイン（クロスオリジン）なので触れない。
     こちら側でできるのは「隠さないこと」と「案内を出すこと」まで。 */
add_action( 'wp_head', 'kaon_3ds_iframe_visible', 99 );
function kaon_3ds_iframe_visible() {
	// 全ページに出しているのは、3Dセキュアの枠がどのテンプレートで差し込まれても
	// 確実に効かせるため。枠が無いページでは何も表示されない（JSが要素を見つけて初めて出す）。
	?>
	<style>
	/* ID が数字で始まるため #3dscontainer とは書けない（CSSの仕様）。
	   属性セレクタで指定する。エスケープ記法 #\33 dscontainer は読みにくいので使わない。 */
	div[id="3dscontainer"] {
		height: auto !important;
		min-height: 640px !important;
		max-width: 100%;
		margin: 1.5em auto;
	}
	iframe[id="3ds_challenge"] {
		height: 640px !important;
		min-height: 640px !important;
		width: 100% !important;
		border: 1px solid #ddd !important;
	}
	#kaon-3ds-notice {
		display: none;
		margin: 1.5em auto 0.5em;
		padding: 1em 1.2em;
		border: 2px solid #bfa14a;
		background: #fdfaf2;
		line-height: 1.7;
		font-size: 15px;
	}
	#kaon-3ds-notice b { display: block; margin-bottom: .4em; font-size: 16px; }

	/* 確認画面を「注文完了画面」と間違えさせないための帯 */
	.kaon-not-yet {
		margin: 0 0 1em;
		padding: 1em 1.2em;
		border: 2px solid #c0392b;
		background: #fff5f4;
		line-height: 1.7;
	}
	.kaon-not-yet strong {
		display: block;
		margin-bottom: .3em;
		color: #c0392b;
		font-size: 20px;
		font-weight: bold;
	}
	.kaon-not-yet span { font-size: 15px; }

	@media screen and (max-width: 768px) {
		div[id="3dscontainer"] { min-height: 700px !important; }
		iframe[id="3ds_challenge"] { height: 700px !important; min-height: 700px !important; }

		/* ★スマホでは3Dセキュアの枠が縦に長く、「上記内容で注文する」が画面外に出て
		   押せることに気づけない。ボタン列を画面下に貼り付けて常に見えるようにする。 */
		.kaon-purchase-area {
			position: sticky;
			bottom: 0;
			z-index: 50;
			margin-top: 1em;
			padding: .7em .5em calc(.7em + env(safe-area-inset-bottom));
			background: #fff;
			box-shadow: 0 -2px 10px rgba( 0, 0, 0, .18 );
		}
		.kaon-not-yet strong { font-size: 18px; }
	}

	/* 「残り◯点」（商品詳細のSKUごと。出す条件は wc_templates/wc_item_single.php 側） */
	.kaon-zaiko-alert {
		display: inline-block;
		margin: .2em 0 .6em;
		padding: .25em .8em;
		border: 1px solid #c0392b;
		border-radius: 2px;
		background: #fff5f4;
		color: #c0392b;
		font-size: 14px;
		font-weight: bold;
		line-height: 1.4;
	}
	</style>
	<script>
	( function () {
		var NOTICE_HTML =
			'<b>カード会社による本人確認（3Dセキュア）の画面です</b>' +
			'下の枠内に、ご利用のカード会社から本人確認の画面が表示されます。' +
			'ワンタイムパスワードやパスワードの入力を求められますので、' +
			'枠内の案内に従って入力し、枠内の送信ボタンを押してください。' +
			'<br>本人確認が完了するまで、この画面は「処理中」の表示のままになります。';

		function showNotice() {
			var box = document.getElementById( '3dscontainer' );
			if ( ! box || document.getElementById( 'kaon-3ds-notice' ) ) { return; }
			var n = document.createElement( 'div' );
			n.id = 'kaon-3ds-notice';
			n.innerHTML = NOTICE_HTML;
			n.style.display = 'block';
			box.parentNode.insertBefore( n, box );
			try { n.scrollIntoView( { behavior: 'smooth', block: 'start' } ); } catch ( e ) {}
		}

		if ( ! window.MutationObserver ) { return; }
		var mo = new MutationObserver( function () {
			if ( document.getElementById( '3dscontainer' ) ) { showNotice(); }
		} );
		document.addEventListener( 'DOMContentLoaded', function () {
			showNotice();
			mo.observe( document.body, { childList: true, subtree: true } );
		} );
	} )();
	</script>
	<?php
}


/* ===== 「残り◯点」を出すしきい値 =====
   商品詳細ページで、SKUの在庫数がこの数以下のときだけ「残り◯点」と表示する。
   0点のときは出さない（Welcartが売り切れ表示に切り替えるため）。
   表示そのものは wc_templates/wc_item_single.php に入れてある。
   数を変えたいときはここだけ直せばよい。 */
if ( ! defined( 'KAON_ZAIKO_ALERT' ) ) {
	define( 'KAON_ZAIKO_ALERT', 3 );
}


/* ===== ワークショップの体験事例を並べるショートコード =====
   使い方：ワークショップLPに [kaon_workshop_cases] を置くだけ。
   カテゴリー「京念珠作りワークショップ写真」(slug: workshop-photo) の記事を新しい順に出す。
   記事を追加すれば自動で増えるので、以後の更新作業は不要。

   引数（どれも省略可）
     count … 表示件数（既定6）
     cat   … カテゴリーのスラッグ（既定 workshop-photo）
   例： [kaon_workshop_cases count="3"]

   ★タイトル先頭の【京念珠作りワークショップ写真】は冗長なので表示時に取り除く。
   ★本文に「この商品についてお問い合わせ」というボタンの文言が混ざるので、抜粋から除外する。 */
add_shortcode( 'kaon_workshop_cases', 'kaon_workshop_cases_shortcode' );
function kaon_workshop_cases_shortcode( $atts ) {

	$atts = shortcode_atts(
		array(
			'count' => 6,
			'cat'   => 'workshop-photo',
		),
		$atts,
		'kaon_workshop_cases'
	);

	$q = new WP_Query(
		array(
			'category_name'       => sanitize_title( $atts['cat'] ),
			'posts_per_page'      => (int) $atts['count'],
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		)
	);

	if ( ! $q->have_posts() ) {
		wp_reset_postdata();
		return '';
	}

	$cat      = get_category_by_slug( sanitize_title( $atts['cat'] ) );
	$cat_link = $cat ? get_category_link( $cat->term_id ) : '';

	ob_start();
	?>
	<div class="kaon-cases">
		<ul class="kaon-cases__list">
		<?php
		while ( $q->have_posts() ) :
			$q->the_post();

			// 先頭の【…】を外す
			$title = preg_replace( '/^【[^】]*】\s*/u', '', get_the_title() );

			// 本文の冒頭。ボタンの文言と記号を除いてから詰める
			$text = wp_strip_all_tags( get_the_content(), true );
			$text = str_replace( 'この商品についてお問い合わせ', '', $text );
			$text = preg_replace( '/^\s*【[^】]*】\s*/u', '', trim( $text ) );
			$text = wp_trim_words( $text, 60, '…' );
			?>
			<li class="kaon-cases__item">
				<a class="kaon-cases__link" href="<?php the_permalink(); ?>">
					<?php if ( has_post_thumbnail() ) : ?>
						<span class="kaon-cases__thumb"><?php the_post_thumbnail( 'medium_large' ); ?></span>
					<?php endif; ?>
					<span class="kaon-cases__body">
						<span class="kaon-cases__date"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></span>
						<span class="kaon-cases__title"><?php echo esc_html( $title ); ?></span>
						<span class="kaon-cases__text"><?php echo esc_html( $text ); ?></span>
					</span>
				</a>
			</li>
		<?php endwhile; ?>
		</ul>

		<?php if ( $cat_link ) : ?>
		<p class="kaon-cases__more">
			<a href="<?php echo esc_url( $cat_link ); ?>">体験のようすをもっと見る</a>
		</p>
		<?php endif; ?>
	</div>
	<?php
	wp_reset_postdata();

	return ob_get_clean();
}


/* 体験事例カードの見た目。LPはElementorなので、テーマ側のCSSに影響されないよう
   .kaon-cases 配下で完結させている。 */
add_action( 'wp_head', 'kaon_workshop_cases_style', 100 );
function kaon_workshop_cases_style() {
	?>
	<style>
	.kaon-cases { margin: 0 auto; max-width: 1100px; }
	.kaon-cases__list {
		display: grid;
		grid-template-columns: repeat( 3, 1fr );
		gap: 28px 24px;
		margin: 0;
		padding: 0;
		list-style: none;
	}
	.kaon-cases__item { margin: 0; padding: 0; list-style: none; }
	.kaon-cases__link {
		display: block;
		color: inherit;
		text-decoration: none;
		height: 100%;
	}
	.kaon-cases__thumb {
		display: block;
		overflow: hidden;
		margin-bottom: 14px;
		background: #f4f1ec;
		aspect-ratio: 4 / 3;
	}
	.kaon-cases__thumb img {
		display: block;
		width: 100%;
		height: 100%;
		object-fit: cover;
		transition: transform .4s ease;
	}
	.kaon-cases__link:hover .kaon-cases__thumb img { transform: scale( 1.04 ); }
	.kaon-cases__body { display: block; }
	.kaon-cases__date {
		display: block;
		margin-bottom: .4em;
		color: #a08b5a;
		font-size: 13px;
		letter-spacing: .08em;
	}
	.kaon-cases__title {
		display: block;
		margin-bottom: .5em;
		font-size: 17px;
		font-weight: bold;
		line-height: 1.6;
	}
	.kaon-cases__text {
		display: block;
		font-size: 14px;
		line-height: 1.9;
		color: #555;
	}
	.kaon-cases__more { margin: 2.4em 0 0; text-align: center; }
	.kaon-cases__more a {
		display: inline-block;
		padding: .8em 2.4em;
		border: 1px solid #bfa14a;
		color: #8a6d2f;
		font-size: 15px;
		letter-spacing: .06em;
		text-decoration: none;
		transition: background .3s ease, color .3s ease;
	}
	.kaon-cases__more a:hover { background: #bfa14a; color: #fff; }

	@media screen and (max-width: 900px) {
		.kaon-cases__list { grid-template-columns: repeat( 2, 1fr ); gap: 24px 18px; }
	}
	@media screen and (max-width: 600px) {
		.kaon-cases__list { grid-template-columns: 1fr; gap: 26px; }
		.kaon-cases__title { font-size: 16px; }
	}
	</style>
	<?php
}


/* PHPメモリ上限の引き上げ
   WordPress 7.1 + Elementor で /service/workshop/ が既定の128Mを超えて500になるため。
   管理画面は WP_MAX_MEMORY_LIMIT により既に256Mで動いているので、フロントも揃える。 */
@ini_set( 'memory_limit', '256M' );
