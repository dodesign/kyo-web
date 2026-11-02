<?php
/**
 * @package Welcart
 * @subpackage Welcart Belded
 */
// オーダーメイド（/case/461/）だけは専用のデザイン（2026-11-02）。文章は template-parts/kaon-ordermade.php にある
if ( 461 === get_queried_object_id() ) {
	get_header();
	get_template_part( 'template-parts/kaon-ordermade' );
	get_footer();
	return;
}
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