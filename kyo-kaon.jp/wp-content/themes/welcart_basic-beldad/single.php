<?php
/**
 * @package Welcart
 * @subpackage Welcart Belded
 */
get_header(); ?>

		<div id="primary" class="site-content">
			<div id="content" role="main">
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
					<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
				
				<?php endwhile; else: ?>

					<p><?php _e( 'Sorry, no posts matched your criteria.', 'usces' ); ?></p>

				<?php endif; ?>
				
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar( 'other' ); ?>
<?php get_footer(); ?>