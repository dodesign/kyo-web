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

$kn_st      = kaon_cat_structure();
$kn_color   = get_category_by_slug( 'color-search' );
$kn_material = get_category_by_slug( 'material-search' );
$kn_color_id = $kn_color ? (int) $kn_color->term_id : 0;
$kn_mat_id   = $kn_material ? (int) $kn_material->term_id : 0;

/** チップの列を出す。$items は [ ID => 表示名(空ならカテゴリー名) ] */
$kn_chips = function ( $items, $current_id ) use ( $kn_st ) {
	$out = '';
	foreach ( $items as $id => $label ) {
		$t = get_category( $id );
		if ( ! $t || is_wp_error( $t ) ) {
			continue;
		}
		if ( 'all' !== $label && ! $t->count && $id !== $current_id ) {
			continue; // 商品が無いカテゴリーは出さない
		}
		if ( ! $label || 'all' === $label ) {
			$label = ( 'all' === $label ) ? 'すべて' : ( isset( $kn_st['labels'][ $id ] ) ? $kn_st['labels'][ $id ] : preg_replace( '/（.*?）|\(.*?\)/u', '', $t->name ) );
			$count = ( 'すべて' === $label ) ? '' : '<small>' . (int) $t->count . '</small>';
		} else {
			$count = '<small>' . (int) $t->count . '</small>';
		}
		$cls  = ( $current_id === (int) $id ) ? ' is-current' : '';
		$out .= '<li><a class="kn-chip' . $cls . '" href="' . esc_url( get_category_link( $t ) ) . '">' . esc_html( $label ) . $count . '</a></li>';
	}
	if ( $out ) {
		echo '<ul class="kn-chips">' . $out . '</ul>';
	}
};
$kn_ids = function ( $ids ) {
	return array_fill_keys( $ids, '' );
};

// いま見ているカテゴリーが「どの種類」に属するか
$kn_type = 0;
if ( in_array( $kn_cat_id, $kn_st['types'], true ) ) {
	$kn_type = $kn_cat_id;
} elseif ( isset( $kn_st['sub'][ $kn_cat_id ] ) ) {
	$kn_type = $kn_st['sub'][ $kn_cat_id ][0];
}

// 見出し
if ( $kn_cat_id === $kn_root ) {
	$kn_title = '商品一覧';
} elseif ( isset( $kn_st['sub'][ $kn_cat_id ] ) ) {
	$kn_title = $kn_st['sub'][ $kn_cat_id ][1];
} else {
	$kn_title = get_cat_name( $kn_cat_id );
}

// 色・素材の子カテゴリー一覧（ID => ''）
$kn_kids = function ( $parent ) {
	$r = array();
	foreach ( get_categories( array( 'parent' => $parent, 'hide_empty' => true ) ) as $t ) {
		$r[ (int) $t->term_id ] = '';
	}
	return $r;
};
$kn_in_colmat = $kn_cat && in_array( (int) $kn_cat->parent, array( $kn_color_id, $kn_mat_id ), true );
?>
<div id="primary" class="site-content kn-arc">
	<div id="content" role="main">

		<?php /* <header> にしないこと（親テーマの #content header 指定に負ける） */ ?>
		<div class="kn-arc__hero kn-full">
			<div class="kn-wrap">
				<p class="kn-arc__crumb">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a>
					<?php if ( $kn_cat_id !== $kn_root ) : ?>
						<span>/</span><a href="<?php echo esc_url( get_category_link( $kn_root ) ); ?>">商品一覧</a>
						<?php if ( $kn_type && $kn_type !== $kn_cat_id ) : ?>
							<span>/</span><a href="<?php echo esc_url( get_category_link( $kn_type ) ); ?>"><?php echo esc_html( get_cat_name( $kn_type ) ); ?></a>
						<?php elseif ( ! $kn_type && $kn_cat && $kn_cat->parent && (int) $kn_cat->parent !== $kn_root ) : ?>
							<span>/</span><a href="<?php echo esc_url( get_category_link( $kn_cat->parent ) ); ?>"><?php echo esc_html( get_cat_name( $kn_cat->parent ) ); ?></a>
						<?php endif; ?>
					<?php endif; ?>
				</p>
				<div class="kn-head kn-head--solo">
					<h1 class="kn-arc__title"><small>PRODUCTS</small><?php echo esc_html( $kn_title ); ?></h1>
				</div>
				<?php if ( category_description() ) : ?>
					<div class="kn-arc__desc"><?php echo wp_kses_post( category_description() ); ?></div>
				<?php endif; ?>
				<p class="kn-arc__count"><?php echo (int) $GLOBALS['wp_query']->found_posts; ?>点</p>
				<?php /* 商品だけを探す検索（cat=商品 で絞る。結果は search.php → kaon-post-archive.php） */ ?>
				<form class="kn-search kn-search--arc" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="search" name="s" value="" placeholder="石の名前・色・宗派などで探す" aria-label="商品を検索">
					<input type="hidden" name="cat" value="<?php echo (int) $kn_root; ?>">
					<button type="submit">検索</button>
				</form>
			</div>
		</div>

		<div class="kn-arc__chips kn-full">
			<div class="kn-wrap">
				<div class="kn-arc__row">
					<span class="kn-arc__label">種類</span>
					<?php $kn_chips( array( $kn_root => 'all' ) + $kn_ids( $kn_st['types'] ), $kn_type ? $kn_type : $kn_cat_id ); ?>
				</div>
				<?php if ( $kn_type && isset( $kn_st['genders'][ $kn_type ] ) ) : ?>
				<div class="kn-arc__row kn-arc__row--sub">
					<span class="kn-arc__label">男女</span>
					<?php $kn_chips( array( $kn_type => 'all' ) + $kn_st['genders'][ $kn_type ], $kn_cat_id ); ?>
				</div>
				<?php endif; ?>
				<div class="kn-arc__row">
					<span class="kn-arc__label">特集</span>
					<?php $kn_chips( $kn_ids( $kn_st['features'] ), $kn_cat_id ); ?>
				</div>
				<details class="kn-arc__more"<?php echo $kn_in_colmat ? ' open' : ''; ?>>
					<summary>色・素材から探す</summary>
					<?php if ( $kn_color_id ) : ?>
					<div class="kn-arc__row">
						<span class="kn-arc__label">カラー</span>
						<?php $kn_chips( $kn_kids( $kn_color_id ), $kn_cat_id ); ?>
					</div>
					<?php endif; ?>
					<?php if ( $kn_mat_id ) : ?>
					<div class="kn-arc__row">
						<span class="kn-arc__label">素材</span>
						<?php $kn_chips( $kn_kids( $kn_mat_id ), $kn_cat_id ); ?>
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
