<?php
/**
 * 記事の一覧（ブログ・お知らせ・ワークショップ写真・タグ・月別・検索）。2026-11-02 リニューアル。
 * category.php（商品以外）・archive.php・index.php・search.php から呼ぶ。部品は inc/kaon-posts.php。
 *
 * ・お知らせ（kaon_post_list_cats）は1行ずつの一覧、それ以外は写真のカード
 * ・検索は、商品（カード）と記事を分けて出す
 */
$kn_cat_id = is_category() ? (int) get_query_var( 'cat' ) : 0;
$kn_list   = $kn_cat_id && in_array( $kn_cat_id, kaon_post_list_cats(), true );
$kn_cats   = kaon_post_cats();

if ( is_search() ) {
	$kn_title = '「' . get_search_query() . '」の検索結果';
	$kn_en    = 'SEARCH';
} elseif ( $kn_cat_id ) {
	$kn_title = isset( $kn_cats[ $kn_cat_id ] ) ? $kn_cats[ $kn_cat_id ] : single_cat_title( '', false );
	$kn_en    = ( 12 === $kn_cat_id ) ? 'NEWS' : 'JOURNAL';
} elseif ( is_tag() ) {
	$kn_title = '#' . single_tag_title( '', false );
	$kn_en    = 'TAG';
} elseif ( is_date() ) {
	$kn_title = get_the_date( is_month() ? 'Y年n月' : ( is_year() ? 'Y年' : 'Y年n月j日' ) ) . 'の記事';
	$kn_en    = 'ARCHIVE';
} else {
	$kn_title = 'ブログ';
	$kn_en    = 'JOURNAL';
}

// 検索は商品と記事を分ける
$kn_items = array();
$kn_posts = array();
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		if ( 'item' === get_post_field( 'post_mime_type', get_the_ID() ) ) {
			$kn_items[] = get_the_ID();
		} else {
			$kn_posts[] = get_the_ID();
		}
	}
	rewind_posts();
}
?>
<div id="primary" class="site-content kn-arc kn-parc">
	<div id="content" role="main">

		<?php /* <header> にしないこと（親テーマの #content header 指定に負ける） */ ?>
		<div class="kn-arc__hero kn-full">
			<div class="kn-wrap">
				<p class="kn-arc__crumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a><span>/</span><?php echo esc_html( $kn_title ); ?></p>
				<div class="kn-head kn-head--solo">
					<h1 class="kn-arc__title"><small><?php echo esc_html( $kn_en ); ?></small><?php echo esc_html( $kn_title ); ?></h1>
				</div>
				<?php if ( $kn_cat_id && category_description() ) : ?>
					<div class="kn-arc__desc"><?php echo wp_kses_post( category_description() ); ?></div>
				<?php endif; ?>
				<p class="kn-arc__count"><?php echo (int) $GLOBALS['wp_query']->found_posts; ?>件</p>
			</div>
		</div>

		<?php if ( ! is_search() ) : ?>
		<div class="kn-arc__chips kn-full">
			<div class="kn-wrap">
				<div class="kn-arc__row">
					<span class="kn-arc__label">カテゴリー</span>
					<?php kaon_post_chips( $kn_cat_id ); ?>
				</div>
			</div>
		</div>
		<?php endif; ?>

		<section class="kn-sec kn-full kn-arc__list">
			<div class="kn-wrap">

				<?php if ( is_search() ) : ?>
					<form class="kn-search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input type="search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="石の名前・色・宗派など" aria-label="サイト内検索">
						<?php if ( get_query_var( 'cat' ) ) : // 商品一覧の検索から来たときは、商品だけで探し直す ?>
							<input type="hidden" name="cat" value="<?php echo (int) get_query_var( 'cat' ); ?>">
						<?php endif; ?>
						<button type="submit">検索</button>
					</form>
				<?php endif; ?>

				<?php if ( ! have_posts() ) : ?>
					<p class="kn-arc__none">該当する記事は見つかりませんでした。</p>

				<?php elseif ( is_search() ) : ?>
					<?php if ( $kn_items ) : ?>
						<div class="kn-head"><h2><small>PRODUCTS</small>商品</h2></div>
						<div class="kn-items kn-parc__block">
							<?php foreach ( $kn_items as $id ) : $GLOBALS['post'] = get_post( $id ); setup_postdata( $GLOBALS['post'] ); usces_the_item(); kaon_item_card(); endforeach; wp_reset_postdata(); ?>
						</div>
					<?php endif; ?>
					<?php if ( $kn_posts ) : ?>
						<div class="kn-head"><h2><small>ARTICLES</small>記事</h2></div>
						<div class="kn-posts kn-parc__block">
							<?php foreach ( $kn_posts as $id ) : $GLOBALS['post'] = get_post( $id ); setup_postdata( $GLOBALS['post'] ); kaon_post_card(); endforeach; wp_reset_postdata(); ?>
						</div>
					<?php endif; ?>

				<?php elseif ( $kn_list ) : ?>
					<ul class="kn-news__list kn-parc__news">
						<?php while ( have_posts() ) : the_post(); kaon_news_row(); endwhile; ?>
					</ul>

				<?php else : ?>
					<div class="kn-posts">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php if ( 'item' === get_post_field( 'post_mime_type', get_the_ID() ) ) : usces_the_item(); kaon_item_card(); else : kaon_post_card(); endif; ?>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>

				<?php kaon_pager(); ?>
			</div>
		</section>

	</div><!-- #content -->
</div><!-- #primary -->
