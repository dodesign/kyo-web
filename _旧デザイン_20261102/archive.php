<?php
/**
 * @package Welcart
 * @subpackage Welcart Belded
 */
get_header(); ?>

		<div id="primary" class="site-content">
			<div id="content" role="main">

				<div class="page-header cf">
					<h1><?php the_archive_title(); ?></h1>
				</div><!-- .page-header -->

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
						$count_text = __( 'Target article: ', 'welcart_basic_beldad' ) . $wp_query->found_posts . __( 'number', 'welcart_basic_beldad' );
					?>
					<div class="count"><?php echo $count_text; ?></div>

				</div><!-- .pagenation-wrap -->

				<div class="product-list layout-list cf">

				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>
						<?php if ( usces_is_item() ): ?>
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
						<?php else: ?>
							<div id="post-<?php the_ID(); ?>" <?php post_class( 'list' ); ?>>
								<a href="<?php the_permalink(); ?>" rel="bookmark">
									<span class="thumbnail">
									<?php if ( has_post_thumbnail() ) : ?>
										<?php the_post_thumbnail( array( 300, 300 ) ); ?>
									<?php else: ?>
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/noimg.gif" alt="noimg">
									<?php endif; ?>
									</span>
									<span class="title"><?php the_title(); ?></span>
									<span class="date"><time><?php the_time( 'Y年n月j日' ); ?></time></span>
									<div class="excerpt"><?php the_excerpt(); ?></div>
								</a>
							</div>
						<?php endif; ?>
					<?php endwhile; ?>


				<?php else: ?>

					<p class="no-date"><?php __( 'No posts found.', 'usces' ); ?></p>

				<?php endif; ?>

				</div><!-- .info-list -->

			
				<?php
				if ( paginate_links() ) :
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