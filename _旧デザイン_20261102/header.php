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

			<header id="masthead" class="site-header" role="banner">
				<div class="inner">
				<?php
					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) :
				?>
					<div class="top">
						<p class="site-description"><?php echo $description; ?></p>
					</div><!-- .top -->
				<?php endif; ?>

					<div class="bottom cf">

						<div class="column1070">

							<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
								<<?php echo $heading_tag; ?> class="site-title">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
									<?php 
									$logo = wcct_get_options( 'logo' );
									if ( empty( $logo ) ) : ?>
										<?php bloginfo( 'name' ); ?>
									<?php else: ?>
										<img src="<?php wcct_options( 'logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
									<?php endif; ?>	
								</a>
							</<?php echo $heading_tag; ?>>

							<?php if(! welcart_basic_is_cart_page()): ?>

							<div class="cf h-column">

								<?php if ( !defined( 'WCEX_WIDGET_CART' ) ): ?>
								<div class="incart list">
									<div class="iconbtn">
										<a href="<?php echo USCES_CART_URL; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bag.svg" alt="bag"><span class="total-quant" /><?php usces_totalquantity_in_cart(); ?></span></a>
									</div>
								</div><!-- .incart -->
								<?php else: ?>
								<div class="incart widgetcart list">
									<div class="iconbtn"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bag.svg" alt="bag"><span class="total-quant" id="widgetcart-total-quant" /><?php usces_totalquantity_in_cart(); ?></span></div>
									<div class="view-cart-wrap">

										<div class="close"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/close.svg" alt="close" /></div>

										<div class="view-cart">
											<div class="widgetcart-close-btn"><span class="icon"></span></div>
											<?php if ( usces_is_login() && usces_is_membersystem_point() ): ?>
												<div id="wgct_point"><span class="wgct_point_label"><?php _e('Your member points', 'widgetcart'); ?></span> : <span class="wgct_point"><?php usces_memberinfo( 'point' ); ?></span>pt</div>
											<?php endif; ?>
											<div id="wgct_row"><?php echo widgetcart_get_cart_row(); ?></div>	
										</div><!-- .view-cart -->
									</div><!-- .view-cart-wrap -->

									<div id="wgct_alert"></div>
								</div><!-- .widgetcart -->
								<?php endif; ?>

								<?php if ( usces_is_membersystem_state() ) : ?>
								<div class="membership list">

									<div class="iconbtn"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/user.svg" alt="user" /></div>

									<div class="over">
										<div class="over-inner">

											<div class="close"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/close.svg" alt="close" /></div>

											<ul class="cf">
												<?php do_action( 'usces_theme_action_membersystem_before' ); ?>
												<?php if ( usces_is_login() ): ?>
													<li><?php printf( __( 'Hello %s', 'usces' ), usces_the_member_name( 'return' ) ); ?></li>
													<li><a href="<?php echo USCES_MEMBER_URL; ?>"><?php _e( 'My page', 'welcart_basic' ) ?></a></li>
													<li><?php usces_loginout(); ?></li>
												<?php else: ?>
													<li><?php _e( 'guest', 'usces' ); ?></li>
													<li><?php usces_loginout(); ?></li>
													<li><a href="<?php echo USCES_NEWMEMBER_URL; ?>"><?php _e( 'New Membership Registration', 'usces' ) ?></a></li>
												<?php endif; ?>
												<?php do_action( 'usces_theme_action_membersystem_after' ); ?>
											</ul>
										</div><!-- .over-inner -->
									</div>

								</div><!-- .membership -->
								<?php endif; ?>

								<div class="menus list">

									<div class="iconbtn"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/menu.svg" alt="menu" /></div>

									<div id="mobile-menu" class="mobile-menu">

										<div class="close"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/close.svg" alt="close" /></div>

										<nav id="site-navigation" class="main-navigation cf" role="navigation">
										<?php 
											$page_cart		= get_page_by_path( 'usces-cart' );
											$page_member	= get_page_by_path( 'usces-member' );
											$exclude_pages	= "{$page_cart->ID},{$page_member->ID}";
											wp_nav_menu( array( 'theme_location' => 'header', 'exclude' => $exclude_pages ));
										?>
										</nav><!-- #site-navigation -->

										<?php if ( has_nav_menu( 'header-sub' ) ): ?>
										<div class="sub-navigation">
										<?php 
											$page_cart		= get_page_by_path( 'usces-cart' );
											$page_member	= get_page_by_path( 'usces-member' );
											$exclude_pages	= "{$page_cart->ID},{$page_member->ID}";
											wp_nav_menu( array( 'depth' => '1', 'theme_location' => 'header-sub', 'exclude' => $exclude_pages ));
										?>
										</div>
										<?php endif; ?>
										
									</div><!-- .mobile-menu -->

									<?php if ( wcct_get_options( 'fixed_header' ) ) : ?>
									<div class="gray-bg"></div>
									<?php endif; ?>

								</div><!-- .menu -->

							</div><!-- .h-column -->
							<?php endif; ?>
						
						</div><!-- .column1070 -->
						
					</div><!-- .bottom -->
		
				</div><!-- .inner -->
			</header>

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

