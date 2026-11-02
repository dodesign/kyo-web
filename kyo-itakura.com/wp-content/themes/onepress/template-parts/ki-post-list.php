<?php
/**
 * お知らせ（通常の投稿）の一覧。2026-11-02 リニューアル。
 * archive.php（カテゴリー・月別など）・home.php・tag.php・search.php・category-*.php から呼ぶ。メインクエリをそのまま使う。
 *
 * @package OnePress
 */
$ki_obj   = get_queried_object();
$ki_cur   = ( $ki_obj instanceof WP_Term && 'category' === $ki_obj->taxonomy ) ? (int) $ki_obj->term_id : 0;
$ki_title = 'お知らせ';
if ( is_search() ) {
	$ki_title = '「' . get_search_query() . '」の検索結果';
} elseif ( $ki_cur && 110 !== $ki_cur ) {
	$ki_title = $ki_obj->name;
} elseif ( is_tag() ) {
	$ki_title = '#' . single_tag_title( '', false );
} elseif ( is_date() ) {
	$ki_title = get_the_date( is_month() ? 'Y年n月' : 'Y年' ) . 'の記事';
}

ki_pagehead( array(
	'en'    => is_search() ? 'SEARCH' : 'NEWS',
	'title' => $ki_title,
	'img'   => 'ki/ki-mg0001.jpg',
	'crumb' => ( 'お知らせ' === $ki_title ) ? array( array( 'お知らせ' ) ) : array( array( 'お知らせ', home_url( '/news/' ) ), array( $ki_title ) ),
) );

// カテゴリーのチップ（「新着情報」(110) の子カテゴリーで、記事のあるもの）
$ki_kids = get_categories( array( 'parent' => 110, 'hide_empty' => true ) );
?>

<?php if ( ! is_search() && $ki_kids ) : ?>
<div class="ki-filter">
	<div class="ki-wrap">
		<div class="ki-chiprow">
			<ul class="ki-chips">
				<li><a class="ki-chip<?php echo ( ! $ki_cur || 110 === $ki_cur ) ? ' is-current' : ''; ?>" href="<?php echo esc_url( home_url( '/news/' ) ); ?>">すべて</a></li>
				<?php foreach ( $ki_kids as $k ) : ?>
					<li><a class="ki-chip<?php echo $ki_cur === (int) $k->term_id ? ' is-current' : ''; ?>" href="<?php echo esc_url( get_category_link( $k ) ); ?>"><?php echo esc_html( $k->name ); ?><small><?php echo (int) $k->count; ?></small></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>
<?php endif; ?>

<section class="ki-sec ki-sec--list">
	<div class="ki-wrap">
		<?php if ( is_search() ) : ?>
			<form class="ki-search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="キーワード" aria-label="サイト内検索">
				<button type="submit">検索</button>
			</form>
		<?php endif; ?>

		<?php if ( have_posts() ) : ?>
			<div class="ki-posts">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php if ( 'case' === get_post_type() ) : ki_case_card(); else : ?>
					<a class="ki-post" href="<?php the_permalink(); ?>">
						<span class="ki-post__img">
							<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy', 'alt' => '' ) );
							} else {
								echo '<span class="ki-card__noimg">板倉</span>';
							}
							?>
						</span>
						<span class="ki-post__meta">
							<time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time>
							<?php foreach ( (array) get_the_category() as $c ) : if ( 110 === (int) $c->term_id ) { continue; } ?>
								<em><?php echo esc_html( $c->name ); ?></em>
							<?php break; endforeach; ?>
						</span>
						<span class="ki-post__t"><?php the_title(); ?></span>
					</a>
					<?php endif; ?>
				<?php endwhile; ?>
			</div>
			<?php ki_pager(); ?>
		<?php else : ?>
			<p class="ki-none">該当する記事はありません。</p>
		<?php endif; ?>
	</div>
</section>
