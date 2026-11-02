<?php
/**
 * 商品カテゴリーの一覧（/category/item/ 以下）。2026-11-02 リニューアル。
 * category.php から、商品カテゴリーのときだけ呼ばれる。
 *
 * ・サイドバーはやめた（カテゴリーが66行・おすすめ商品が28点も縦に並んでいて重かった）
 *   → かわりに上に「カテゴリー」「カラー」「素材」のチップを置いた
 * ・商品カードはトップと同じ kaon_item_card()
 * ・横幅いっぱいを使うため、body に kn-arc-page を付けて CSS で #primary を全幅にしている
 *   （inc/kaon-home.php の body_class フィルター）
 */
$kn_cat_id = (int) get_query_var( 'cat' );
$kn_cat    = get_category( $kn_cat_id );
$kn_root   = (int) usces_get_cat_id( 'item' );

/** チップの列を出す */
$kn_chips = function ( $terms, $current_id, $all = null ) {
	if ( empty( $terms ) && ! $all ) {
		return;
	}
	echo '<ul class="kn-chips">';
	if ( $all ) {
		$cls = ( $current_id === (int) $all['id'] ) ? ' is-current' : '';
		echo '<li><a class="kn-chip' . $cls . '" href="' . esc_url( $all['url'] ) . '">' . esc_html( $all['label'] ) . '</a></li>';
	}
	foreach ( $terms as $t ) {
		$cls = ( $current_id === (int) $t->term_id ) ? ' is-current' : '';
		echo '<li><a class="kn-chip' . $cls . '" href="' . esc_url( get_category_link( $t ) ) . '">' . esc_html( preg_replace( '/（.*?）|\(.*?\)/u', '', $t->name ) ) . '<small>' . (int) $t->count . '</small></a></li>';
	}
	echo '</ul>';
};

// 1段目：商品の大分類（新商品・お勧め・送料無料などの「印」系は除く）
$kn_exclude = array( 'itemnew', 'itemreco', 'free-shipping', 'color-search', 'material-search' );
$kn_top = array_filter( get_categories( array( 'parent' => $kn_root, 'hide_empty' => true ) ), function ( $t ) use ( $kn_exclude ) {
	return ! in_array( $t->slug, $kn_exclude, true );
} );

// 2段目：いま見ているカテゴリーの子、または兄弟（男性用 > 京念珠／数珠ブレスレット など）
$kn_sub_parent = 0;
if ( $kn_cat && ! is_wp_error( $kn_cat ) ) {
	if ( get_categories( array( 'parent' => $kn_cat_id, 'hide_empty' => true ) ) ) {
		$kn_sub_parent = $kn_cat_id;
	} elseif ( $kn_cat->parent && (int) $kn_cat->parent !== $kn_root ) {
		$kn_sub_parent = (int) $kn_cat->parent;
	}
}
$kn_color    = get_category_by_slug( 'color-search' );
$kn_material = get_category_by_slug( 'material-search' );
?>
<div id="primary" class="site-content kn-arc">
	<div id="content" role="main">

		<header class="kn-arc__hero kn-full">
			<div class="kn-wrap">
				<p class="kn-arc__crumb">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a>
					<?php if ( $kn_cat_id !== $kn_root ) : ?>
						<span>/</span><a href="<?php echo esc_url( get_category_link( $kn_root ) ); ?>">商品一覧</a>
						<?php if ( $kn_cat && $kn_cat->parent && (int) $kn_cat->parent !== $kn_root ) : ?>
							<span>/</span><a href="<?php echo esc_url( get_category_link( $kn_cat->parent ) ); ?>"><?php echo esc_html( get_cat_name( $kn_cat->parent ) ); ?></a>
						<?php endif; ?>
					<?php endif; ?>
				</p>
				<div class="kn-head kn-head--solo">
					<h1 class="kn-arc__title"><small>PRODUCTS</small><?php echo esc_html( $kn_cat_id === $kn_root ? '商品一覧' : get_cat_name( $kn_cat_id ) ); ?></h1>
				</div>
				<?php if ( category_description() ) : ?>
					<div class="kn-arc__desc"><?php echo wp_kses_post( category_description() ); ?></div>
				<?php endif; ?>
				<p class="kn-arc__count"><?php echo (int) $GLOBALS['wp_query']->found_posts; ?>点</p>
			</div>
		</header>

		<div class="kn-arc__chips kn-full">
			<div class="kn-wrap">
				<div class="kn-arc__row">
					<span class="kn-arc__label">カテゴリー</span>
					<?php $kn_chips( $kn_top, $kn_cat_id, array( 'id' => $kn_root, 'url' => get_category_link( $kn_root ), 'label' => 'すべて' ) ); ?>
				</div>
				<?php if ( $kn_sub_parent ) : ?>
				<div class="kn-arc__row">
					<span class="kn-arc__label"><?php echo esc_html( get_cat_name( $kn_sub_parent ) ); ?></span>
					<?php $kn_chips( get_categories( array( 'parent' => $kn_sub_parent, 'hide_empty' => true ) ), $kn_cat_id ); ?>
				</div>
				<?php endif; ?>
				<details class="kn-arc__more"<?php echo ( $kn_cat && in_array( (int) $kn_cat->parent, array( (int) ( $kn_color ? $kn_color->term_id : 0 ), (int) ( $kn_material ? $kn_material->term_id : 0 ) ), true ) ) ? ' open' : ''; ?>>
					<summary>色・素材から探す</summary>
					<?php if ( $kn_color ) : ?>
					<div class="kn-arc__row">
						<span class="kn-arc__label">カラー</span>
						<?php $kn_chips( get_categories( array( 'parent' => $kn_color->term_id, 'hide_empty' => true ) ), $kn_cat_id ); ?>
					</div>
					<?php endif; ?>
					<?php if ( $kn_material ) : ?>
					<div class="kn-arc__row">
						<span class="kn-arc__label">素材</span>
						<?php $kn_chips( get_categories( array( 'parent' => $kn_material->term_id, 'hide_empty' => true ) ), $kn_cat_id ); ?>
					</div>
					<?php endif; ?>
				</details>
			</div>
		</div>

		<section class="kn-sec kn-full kn-arc__list">
			<div class="kn-wrap">
				<?php if ( have_posts() ) : ?>
					<div class="kn-items">
						<?php while ( have_posts() ) : the_post(); usces_the_item(); ?>
							<?php kaon_item_card(); ?>
						<?php endwhile; ?>
					</div>
					<?php
					$kn_pages = paginate_links( array(
						'type'      => 'list',
						'prev_text' => '&lsaquo;',
						'next_text' => '&rsaquo;',
						'mid_size'  => 1,
					) );
					if ( $kn_pages ) :
					?>
					<nav class="kn-pager" aria-label="ページ送り"><?php echo $kn_pages; ?></nav>
					<?php endif; ?>
				<?php else : ?>
					<p class="kn-arc__none">このカテゴリーの商品は、ただいまございません。</p>
				<?php endif; ?>
			</div>
		</section>

	</div><!-- #content -->
</div><!-- #primary -->
