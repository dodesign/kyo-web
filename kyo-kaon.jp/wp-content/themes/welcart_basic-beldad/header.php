<?php
/**
 * @package Welcart
 * @subpackage Welcart Belded
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<meta name="format-detection" content="telephone=no"/>
		<?php wp_head(); ?>
		<link rel='stylesheet' id='theme_cart_css-css'  href='/common/css/uikit.min.css' type='text/css' media='all' />
		<link rel='stylesheet' id='theme_cart_css-css'  href='/common/css/custom.min.css' type='text/css' media='all' />
        <script type='text/javascript' src='/common/js/uikit.min.js'></script>
        <script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/assets/js/uikit-icons.min.js'></script>
		<style>header .bottom {width: 100%}</style>
		<?php
		/* ★リニューアル用CSSは、上の uikit / custom.min.css より「後」に読む必要がある
		   （同じ強さの指定は後から読んだほうが勝つため）。なので wp_enqueue ではなくここで直接読む。
		   ?ver= はファイルの更新日時。CSSを直すと自動でブラウザのキャッシュが切れる。 */
		$kn_css = get_stylesheet_directory() . '/assets/css/kaon-site.css';
		?>
		<link rel="stylesheet" id="kaon-site-css" href="<?php echo esc_url( get_stylesheet_directory_uri() . '/assets/css/kaon-site.css?ver=' . ( file_exists( $kn_css ) ? filemtime( $kn_css ) : '1' ) ); ?>" type="text/css" media="all" />
	</head>

	<?php 
		$lang = 'lang-' . get_bloginfo( 'language' );
	?>
	<body <?php body_class( $lang ); ?>>
	
		<?php wp_body_open(); ?>
		
		<?php if ( wcct_get_options( 'page_loading' ) ) : ?>
			<?php if (! ( welcart_basic_is_member_page() || welcart_basic_is_cart_page() ) ) : ?>
			<div id="loader-bg">
				<div id="loader">
					<i class="fa fa-spinner fa-pulse animated"></i>
					<p>Now Loading...</p>
				</div>
			</div>
			<?php endif; ?>
		<?php endif; ?>

		<div class="site">

			<?php
			/* ===== ヘッダー（2026-11-02 リニューアル） =====
			   旧ヘッダーは Git の履歴に残っている（2026-11-02 より前のコミット）。
			   ★クラス名はすべて kn- で始める。親テーマの style.css が header .top / .bottom / .inner を
			     直接指定しているので、その名前は使わないこと。 */
			$kn_is_home = ( is_home() || is_front_page() );
			$kn_is_cart = welcart_basic_is_cart_page();
			$kn_desc    = get_bloginfo( 'description', 'display' );
			ob_start();
			usces_totalquantity_in_cart();
			$kn_qty = (int) trim( wp_strip_all_tags( ob_get_clean() ) );
			$kn_tag = $kn_is_home ? 'h1' : 'div';
			?>
			<header id="masthead" class="kn-hd" role="banner">
				<?php if ( $kn_desc ) : ?>
				<p class="kn-hd__tag"><?php echo esc_html( $kn_desc ); ?></p>
				<?php endif; ?>
				<div class="kn-hd__bar">
					<<?php echo $kn_tag; ?> class="kn-hd__logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php $logo = wcct_get_options( 'logo' ); ?>
							<?php if ( $logo ) : ?>
								<img src="<?php echo esc_url( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" width="231" height="70">
							<?php else : ?>
								<?php bloginfo( 'name' ); ?>
							<?php endif; ?>
						</a>
					</<?php echo $kn_tag; ?>>

					<?php /* 2026-11-02 沙織さんの指示でカート・購入手続き中もメニューを出す（旧ヘッダーは隠していた） */ if ( true ) : ?>
					<nav class="kn-hd__nav" aria-label="メインメニュー">
						<?php wp_nav_menu( array( 'theme_location' => 'header', 'container' => false, 'menu_class' => 'kn-hd__menu', 'menu_id' => 'kn-hd-menu', 'depth' => 2, 'fallback_cb' => false ) ); ?>
					</nav>

					<div class="kn-hd__icons">
						<?php if ( usces_is_membersystem_state() ) : ?>
						<a class="kn-hd__icon kn-hd__icon--user" href="<?php echo esc_url( USCES_MEMBER_URL ); ?>" aria-label="<?php echo usces_is_login() ? 'マイページ' : 'ログイン・会員登録'; ?>"><?php echo kaon_icon( 'user' ); ?></a>
						<?php endif; ?>
						<a class="kn-hd__icon" href="<?php echo esc_url( USCES_CART_URL ); ?>" aria-label="カート"><?php echo kaon_icon( 'bag' ); ?><?php if ( $kn_qty > 0 ) : ?><span class="kn-hd__badge"><?php echo $kn_qty; ?></span><?php endif; ?></a>
						<button type="button" class="kn-hd__icon kn-hd__burger" aria-controls="kn-spmenu" aria-expanded="false" aria-label="メニューを開く"><?php echo kaon_icon( 'menu' ); ?></button>
					</div>
					<?php endif; ?>
				</div>
			</header>

			<?php if ( true ) : ?>
			<div id="kn-spmenu" class="kn-spmenu" aria-hidden="true">
				<div class="kn-spmenu__top">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( wcct_get_options( 'logo' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
					<button type="button" class="kn-hd__icon kn-spmenu__close" aria-label="メニューを閉じる"><?php echo kaon_icon( 'close' ); ?></button>
				</div>
				<?php wp_nav_menu( array( 'theme_location' => 'header', 'container' => false, 'menu_class' => 'kn-spmenu__list', 'menu_id' => 'kn-spmenu-menu', 'depth' => 2, 'fallback_cb' => false ) ); ?>
				<?php if ( usces_is_membersystem_state() ) : ?>
				<ul class="kn-spmenu__list kn-spmenu__list--sub">
					<li><a href="<?php echo esc_url( USCES_MEMBER_URL ); ?>"><?php echo usces_is_login() ? 'マイページ' : 'ログイン・会員登録'; ?></a></li>
				</ul>
				<?php endif; ?>
				<div class="kn-spmenu__tel"><a href="tel:0757216600">075-721-6600</a><small>受付時間 9:00–18:00</small></div>
			</div>
			<?php endif; ?>

			<?php if ( is_home() || is_front_page() ): ?>

    <div class="wrapper">
          <video id="video" muted autoplay loop  playsinline>
            <source src="/common/img/movie_short_low_200420.mp4" type="video/mp4">
            <p>video要素がサポートされていないブラウザでご覧になっています。</p>
          </video>
</div>
				<?php $headers = get_uploaded_header_images(); ?>
				<div id="main-visual" class="main-visual">
					<?php if ( $headers ): ?>
					<div class="flex-row">
						<div class="flexslider">
							<ul class="slides">
								<?php foreach ( $headers as $key => $value ) : ?>
								<?php
								//this code is refered to: http://frankiejarrett.com/get-an-attachment-id-by-url-in-wordpress/
								//in order to get attachment id from image url.
								$parse_url  = explode( parse_url( WP_CONTENT_URL, PHP_URL_PATH ), $value['url'] );
								$this_host = str_ireplace( 'www.', '', parse_url( home_url(), PHP_URL_HOST ) );
								$file_host = str_ireplace( 'www.', '', parse_url( $value['url'], PHP_URL_HOST ) );
								if ( ! isset( $parse_url[1] ) || empty( $parse_url[1] ) || ( $this_host != $file_host ) ) {
									return;
								}
								global $wpdb;
								$img_id = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM {$wpdb->prefix}posts WHERE guid RLIKE %s;", $parse_url[1] ) );
								$img_meta 		= get_post( $img_id[0] );
								?>
								<li class="list" data-thumb="<?php echo $value['url']; ?>">
									<?php if ( $img_meta->post_content && ( strpos( $img_meta->post_content, 'jpg' ) === false ) ) : ?>
									<a href="<?php echo esc_html( $img_meta->post_content ); ?>">
									<?php endif; ?>
										<img src="<?php echo $value['url']; ?>">
									<?php if($img_meta->post_content && ( strpos( $img_meta->post_content, 'jpg' ) === false ) ): ?>
									</a>
									<?php endif; ?>
								</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
					<?php else: ?>
						<?php if ( has_header_image() ) : ?>
							<div><img src="<?php header_image(); ?>" alt="*"></div>
						<?php endif; ?>
					<?php endif; ?>
				</div><!-- #main-visual -->

			<?php endif; ?>

			<?php if ( ! ( 'page' == get_option( 'show_on_front' ) ) ) : ?>

				<?php if (! ( welcart_basic_is_member_page() || welcart_basic_is_cart_page() ) ) : ?>

				<div class="common-parts">
					<div class="column1070 cf">

						<div id="searchform" class="searchform">
						<?php 
							if (function_exists( 'get_head_search_form' ) ) {
								get_head_search_form();
							} else {
								get_search_form();
							}
						?>
						</div><!-- #searchform -->

						<?php
						if( wcct_get_options( 'display_info' ) ):
							$info_num      = wcct_get_options( 'info_num' );
							$info_cat_slug = wcct_get_options( 'info_cat' );
							$info_cat      = get_term_by( 'slug', $info_cat_slug, 'category' );

							$info_args = array(
								'posts_per_page' => $info_num,
								'category_name'  => $info_cat_slug,
							); 
							$info_query = new WP_Query( $info_args );
						?>
							<div class="info-area">
								<div class="slider">
								<?php
								if ( $info_query->have_posts() ):
									while ( $info_query->have_posts() ):
									$info_query->the_post();
									$cat = get_the_category();
									$catname = $cat[0]->cat_name;								
								?>
									<div id="post-<?php the_ID(); ?>" class="cf">
										<div class="info-cat"><?php echo $catname; ?></div>
										<div class="info-date"><?php the_time('Y.n.j') ?></div>
										<div class="info-title">
											<a href="<?php the_permalink(); ?>">
												<?php if(wp_is_mobile()): ?>
													<?php echo mb_substr( $post->post_title, 0, 20) . '...' ; ?>
												<?php else: ?>
													<?php the_title(); ?>
												<?php endif; ?>
											</a>
										</div>
									</div>
								<?php
									endwhile;
									wp_reset_postdata();
								else:
								?>
									<p class="no-date"><?php _e( 'Sorry, no posts matched your criteria.', 'usces' ); ?></p>
								<?php
								endif;
								?>
								</div><!-- .slider -->
							</div><!-- .info-area -->

						<?php
						endif;
						?>
					</div>
				</div>

				<?php
				endif;
				?>

			<?php endif; ?>

			<?php
				if (  is_front_page() || welcart_basic_is_cart_page() || welcart_basic_is_member_page() ) {
					$class = '';
				} elseif( is_home() ) {
					$class = 'two-column index-content ' . wcct_get_options( 'sidebar' );
				} else {
					$class = 'two-column ' . wcct_get_options( 'sidebar' );
				}
			?>
			<div id="main" class="<?php echo $class; ?>">

				<div class="site-content-wrap cf">

