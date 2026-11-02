<?php
/**
 * お知らせ（通常の投稿）1件。single.php から呼ばれる。2026-11-02 リニューアル（旧版は Git の履歴）。
 *
 * @package OnePress
 */
get_header();
the_post();

$ki_cat = null;
foreach ( (array) get_the_category() as $c ) {
	if ( 110 !== (int) $c->term_id ) {
		$ki_cat = $c;
		break;
	}
}
$ki_crumb = array( array( 'お知らせ', home_url( '/news/' ) ) );
if ( $ki_cat ) {
	$ki_crumb[] = array( $ki_cat->name, get_category_link( $ki_cat ) );
}
?>

<div class="ki-single-head">
	<?php ki_crumb( $ki_crumb ); ?>
	<div class="ki-wrap ki-wrap--narrow">
		<p class="ki-single-head__meta">
			<time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time>
			<?php if ( $ki_cat ) : ?><a href="<?php echo esc_url( get_category_link( $ki_cat ) ); ?>"><?php echo esc_html( $ki_cat->name ); ?></a><?php endif; ?>
		</p>
		<h1 class="ki-single-head__t"><?php the_title(); ?></h1>
	</div>
</div>

<article <?php post_class( 'ki-sec ki-article' ); ?>>
	<div class="ki-wrap ki-wrap--narrow">
		<?php if ( has_post_thumbnail() && false === stripos( get_post_field( 'post_content', get_the_ID() ), '<img' ) ) : ?>
			<figure class="ki-article__eye"><?php the_post_thumbnail( 'large' ); ?></figure>
		<?php endif; ?>
		<div class="ki-prose">
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</div>

		<?php
		$ki_prev = get_previous_post();
		$ki_next = get_next_post();
		if ( $ki_prev || $ki_next ) :
		?>
		<nav class="ki-pn" aria-label="前後の記事">
			<?php if ( $ki_prev ) : ?><a class="is-prev" href="<?php echo esc_url( get_permalink( $ki_prev ) ); ?>"><small>前の記事</small><?php echo esc_html( get_the_title( $ki_prev ) ); ?></a><?php else : ?><span></span><?php endif; ?>
			<?php if ( $ki_next ) : ?><a class="is-next" href="<?php echo esc_url( get_permalink( $ki_next ) ); ?>"><small>次の記事</small><?php echo esc_html( get_the_title( $ki_next ) ); ?></a><?php endif; ?>
		</nav>
		<?php endif; ?>
		<p class="ki-center"><a class="ki-btn ki-btn--outline" href="<?php echo esc_url( home_url( '/news/' ) ); ?>">お知らせ一覧へ</a></p>
	</div>
</article>

<?php get_footer(); ?>
