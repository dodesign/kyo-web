<?php
/**
 * @package Welcart
 * @subpackage Welcart_Basic
 */

get_header(); ?>

	<div id="primary" class="index-content site-content">
		<div id="content" role="main">
		
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
							<?php remove_filter( 'the_excerpt', array( $usces, 'filter_cartContent' ), 20 ); ?>
							<div class="excerpt"><?php the_excerpt(); ?></div>
						</a>
					</div>
					<?php endwhile; ?>


				<?php else: ?>

					<p class="no-date"><?php __( 'No posts found.', 'usces' ); ?></p>

				<?php endif; ?>
			
			</div><!-- .info-list -->


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