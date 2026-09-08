<?php
/**
 * @package Welcart
 * @subpackage Welcart Belded
 */
get_header(); ?>

		<div id="primary" class="site-content">
			<div id="content" role="main">
				
				<div class="page-header cf">
					<h1><?php printf( __( 'Search Results for: %s', 'welcart_basic' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
				</div><!-- .page-header -->

				<div class="pagination-wrap top cf" data-scroll="once">
				<?php 
					if ( paginate_links() ):
					$args = array (
						'type' => 'list',
						'prev_text' => __( ' &laquo; ', 'welcart_basic' ),
						'next_text' => __( ' &raquo; ', 'welcart_basic' ),
					);
					echo paginate_links( $args );

					endif;
				?>

					<div class="count"><?php _e( 'Number of results: ', 'welcart_basic_beldad' ); ?><?php echo $wp_query->found_posts; ?><?php _e( 'number', 'welcart_basic_beldad' ); ?></div>

				</div><!-- .pagenation-wrap -->
				
				<div class="product-list cf layout-grid">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class( 'list' ); ?>>
						<a href="<?php the_permalink(); ?>" rel="bookmark">
							<span class="thumbnail">
								<?php usces_the_itemImage( 0, 300, 300 ); ?>
								<?php if ( wcct_get_options( 'display_soldout' ) && !usces_have_zaiko_anyone() ): ?>
								<span class="itemsoldout">
										<span class="text">
											<?php _e( 'SOLD OUT', 'welcart_basic_beldad' ); ?>
											<?php if ( wcct_get_options( 'display_inquiry' ) ): ?>
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
					<p><?php echo __( 'No posts found.', 'usces' ); ?></p> 
				<?php endif; ?>
				</div><!-- .product-list -->

				<?php
				if(paginate_links()):
					$args = array (
						'type' => 'list',
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