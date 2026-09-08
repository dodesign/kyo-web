<?php
/**
 * @package Welcart
 * @subpackage Welcart Belded
 */
get_header(); ?>

		<div id="primary" class="site-content">
			<div id="content" role="main">

				<?php
				$catimg			= $term_class = $term_before = $term_after = '';
				$product_cat	= get_query_var( 'cat' );
				$catimg_url		= get_term_meta( $product_cat, 'wcct-tag-catimg-url', true );
				if ( ! empty( $catimg_url ) ) {
					$catimg	= '<div class="cat-img" data-scroll="once"><img src="' . get_term_meta( $product_cat, 'wcct-tag-catimg-url', true ) . '"></div>';
				}
				?>
				<div class="page-header cf">
					<h1><?php echo get_cat_name( $product_cat ); ?></h1>
				</div><!-- .page-header -->

				<div class="category-info">
					<?php echo $catimg; ?>
					<?php if( category_description() ) : ?>
						<div class="cat-desc"><?php echo category_description(); ?></div>
					<?php endif; ?>
				</div>

				<div class="pagination-wrap top cf" data-scroll="once">
				<?php 
					if ( paginate_links() ) :
						$args = array (
							'type'		=> 'list',
							'prev_text' => __( ' &laquo; ', 'welcart_basic' ),
							'next_text' => __( ' &raquo; ', 'welcart_basic' ),
						);
						echo paginate_links( $args );
					endif;
				?>
					<?php 
						$thisCat = get_category( $product_cat );
						if ( usces_is_cat_of_item( $product_cat ) ) {
							$count_text = __( 'Shippin: ', 'welcart_basic_beldad' ) . $thisCat->count . __( 'number', 'welcart_basic_beldad' );
						} else {
							$count_text = __( 'Target article: ', 'welcart_basic_beldad' ) . $thisCat->count . __( 'number', 'welcart_basic_beldad' );
						}
					?>
					<div class="count"><?php echo $count_text; ?></div>
				</div><!-- .pagenation-wrap -->

				<?php if ( usces_is_cat_of_item( $product_cat ) ) : ?>

					<div id="show" class="cf">
						<ul class="layout">
							<li><?php _e( 'Switching', 'welcart_basic_beldad' ); ?></li>
							<li class="grid current"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/grid.svg"></li>
							<li class="list"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/list.svg"></li>
						</ul><!-- .layout -->
					</div><!-- #show -->

					<div class="product-list cf layout-grid">

					<?php if ( have_posts() ) : ?>

						<?php while ( have_posts() ) : the_post(); ?>
						<div id="post-<?php the_ID(); ?>" <?php post_class( 'list' ); ?>>
							<a href="<?php the_permalink(); ?>" rel="bookmark">
								<span class="thumbnail">
									<?php welcart_basic_campaign_message(); ?>
									<?php usces_the_itemImage( 0, 300, 300 ); ?>
									<?php if ( wcct_get_options( 'display_soldout' ) && !usces_have_zaiko_anyone() ): ?>
									<span class="itemsoldout">
											<span class="text">
												<?php _e( 'SOLD OUT', 'welcart_basic_beldad' ); ?>
												<?php if ( wcct_get_options( 'display_inquiry' ) ) : ?>
												<span class="sub_text"><?php wcct_options( 'display_inquiry_text' ); ?></span>
												<?php endif; ?>
											</span>
									</span>
									<?php endif; ?>
								</span>
								<span class="title"><?php usces_the_itemName(); ?></span>
								<?php wcct_produt_tag(); ?>
								<span class="price"><?php usces_the_firstPriceCr(); ?><?php usces_guid_tax(); ?></span>
								<?php remove_filter( 'the_excerpt', array( $usces, 'filter_cartContent' ), 20 ); ?>
								<div class="excerpt"><?php the_excerpt(); ?></div>
							</a>
						</div>
						<?php endwhile; ?>

					<?php else: ?>

						<p class="no-date"><?php echo __( 'No posts found.', 'usces' ); ?></p>

					<?php endif; ?>

				</div><!-- .product-list -->

				<?php else : ?>

					<div class="info-list cf">

					<?php if ( have_posts() ) : ?>

						<?php while ( have_posts() ) : the_post(); ?>
						<div id="post-<?php the_ID(); ?>" <?php post_class( 'list' ); ?>>
							<a href="<?php the_permalink(); ?>" rel="bookmark">
								<span class="thumbnail">
									<?php if ( has_post_thumbnail() ) : ?>
										<?php the_post_thumbnail(); ?>
									<?php else: ?>
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/noimg.gif">
									<?php endif; ?>
								</span>
								<span class="title"><?php the_title(); ?></span>
								<span class="date"><time><i class="fa fa-calendar"></i><?php the_time( 'Y年n月j日' ); ?></time></span>
								<div class="excerpt"><?php the_excerpt(); ?></div>
							</a>
						</div>
						<?php endwhile; ?>


					<?php else: ?>

						<p class="no-date"><?php __( 'No posts found.', 'usces' ); ?></p>

					<?php endif; ?>

					</div><!-- .info-list -->

				<?php endif; ?>

				<?php
				if(paginate_links()):
					$args = array (
						'type'		=> 'list',
						'prev_text' => __( ' &laquo; ', 'welcart_basic' ),
						'next_text' => __( ' &raquo; ', 'welcart_basic' ),
					);
				?>
				<div class="pagination-wrap bottom cf" data-scroll="once">
					<?php echo paginate_links( $args ); ?>
				</div><!-- .pagenation-wrap -->
				<?php
				endif;
				?>
				
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>