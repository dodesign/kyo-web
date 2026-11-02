<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package OnePress
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( array('list-article', 'clearfix') ); ?> class="row">

	<div class="list-article-thumb col-sm-3">
		<a href="<?php echo esc_url( get_permalink() ); ?>">
			<?php
			if ( has_post_thumbnail( ) ) {
				the_post_thumbnail( 'onepress-blog-small' );
			} else {
				echo '<img alt="" src="'. get_template_directory_uri() . '/wp-content/themes/onepress/common/img/l_e_others_500.jpg' .'">';
			}
			?>
		</a>
	</div>

	<div class="list-article-content col-sm-9">
		<div class="list-article-meta">
			<?php the_category(' / '); ?>
		</div>
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->
		<div class="entry-excerpt">
			<?php echo mb_substr(get_the_excerpt(), 0, 110); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'onepress' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</div>

</article><!-- #post-## -->
