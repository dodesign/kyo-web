<?php
/**
 * ブログ・お知らせ・固定ページの部品。2026-11-02 リニューアル（サイドバーをやめて全ページのデザインをそろえた）。
 *
 * 使っているテンプレート
 *   ・記事の一覧（ブログ /blog/・お知らせ・タグ・月別・検索）… template-parts/kaon-post-archive.php
 *       category.php（商品以外）・archive.php・index.php・search.php から呼ぶ
 *   ・記事1件 … template-parts/kaon-single.php（single.php から。オーダーメイド 461 は別）
 *   ・固定ページ（ご利用ガイド・会社概要・特商法など）… page.php
 *     ※カート・会員ページ、ワークショップLP（Elementor）は今までどおり
 */

/** 記事一覧の上に並べるカテゴリー（ID => 表示名）。記事が0件のものは出さない */
function kaon_post_cats() {
	return array(
		24 => 'ブログ',
		12 => 'お知らせ',
		96 => 'ワークショップ写真',
		16 => '制作事例',
		25 => '動画',
		26 => '心に響く名言',
	);
}

/** お知らせのように「一覧は1行ずつ」で見せるカテゴリー */
function kaon_post_list_cats() {
	return array( 12 );
}

/** 全幅のデザインにするページか（body に kn-wide-page を付ける） */
add_filter( 'body_class', 'kaon_body_class_posts' );
function kaon_body_class_posts( $classes ) {
	$wide = false;
	if ( is_category() && function_exists( 'usces_is_cat_of_item' ) && ! usces_is_cat_of_item( get_query_var( 'cat' ) ) ) {
		$wide = true;
	} elseif ( is_tag() || is_date() || is_author() || is_search() || ( is_home() && ! is_front_page() ) ) {
		$wide = true;
	} elseif ( is_singular( 'post' ) && 'item' !== get_post_field( 'post_mime_type', get_queried_object_id() ) ) {
		$wide = true;
		$classes[] = 'kn-post-page';
	} elseif ( is_page() && kaon_is_plain_page() ) {
		$wide = true;
		$classes[] = 'kn-plain-page';
	}
	if ( $wide && ! in_array( 'kn-wide-page', $classes, true ) ) {
		$classes[] = 'kn-wide-page';
	}
	return $classes;
}

/** カート・会員ページに kn-cart-flow を付ける（見た目は kaon-site.css の「カート・会員」ブロック。テンプレートは Welcart のまま） */
add_filter( 'body_class', 'kaon_body_class_cart' );
function kaon_body_class_cart( $classes ) {
	if ( function_exists( 'welcart_basic_is_cart_page' ) && ( welcart_basic_is_cart_page() || welcart_basic_is_member_page() ) ) {
		$classes[] = 'kn-cart-flow';
	}
	return $classes;
}

/** page.php で新しいデザインにする固定ページか（カート・会員・Elementor のLP・専用テンプレートのページは除く） */
function kaon_is_plain_page( $id = 0 ) {
	$id = $id ? $id : get_queried_object_id();
	if ( ! $id ) {
		return false;
	}
	$tpl = get_page_template_slug( $id );
	if ( $tpl ) {
		return false; // uscescart.php / uscesmember.php / elementor_header_footer など
	}
	$slug = get_post_field( 'post_name', $id );
	if ( in_array( $slug, array( 'contact', 'kihou-koubou', 'fix', 'usces-cart', 'usces-member' ), true ) ) {
		return false; // 専用テンプレートがあるページ
	}
	return true;
}

/** Elementor で作ったページか */
function kaon_is_elementor( $id ) {
	return 'builder' === get_post_meta( $id, '_elementor_edit_mode', true );
}

/** 記事のカード（ブログ・ワークショップ写真など）。ループの中で呼ぶ */
function kaon_post_card() {
	$cat  = '';
	foreach ( kaon_post_cats() as $cid => $label ) {
		if ( in_category( $cid ) ) {
			$cat = ( 96 === $cid ) ? '体験' : $label;
			break;
		}
	}
	?>
	<a class="kn-post" href="<?php the_permalink(); ?>">
		<span class="kn-post__img<?php echo has_post_thumbnail() ? '' : ' is-noimg'; ?>">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy', 'alt' => '' ) );
			} else {
				echo '<span class="kn-post__noimg">喜芳工房</span>';
			}
			?>
			<?php if ( $cat ) : ?><span class="kn-post__tag"><?php echo esc_html( $cat ); ?></span><?php endif; ?>
		</span>
		<time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time>
		<span class="kn-post__t"><?php the_title(); ?></span>
	</a>
	<?php
}

/** お知らせの1行。ループの中で呼ぶ */
function kaon_news_row() {
	$kind = kaon_news_kind( get_the_title() );
	?>
	<li><a href="<?php the_permalink(); ?>">
		<time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time>
		<span class="kn-news__tag <?php echo esc_attr( $kind[0] ); ?>"><?php echo esc_html( $kind[1] ); ?></span>
		<span class="kn-news__t"><?php the_title(); ?></span>
		<span class="kn-news__arr" aria-hidden="true">&rsaquo;</span>
	</a></li>
	<?php
}

/** 記事一覧のカテゴリーのチップ */
function kaon_post_chips( $current = 0 ) {
	$out = '';
	foreach ( kaon_post_cats() as $id => $label ) {
		$t = get_category( $id );
		if ( ! $t || is_wp_error( $t ) || ! $t->count ) {
			continue;
		}
		$cls  = ( (int) $current === (int) $id ) ? ' is-current' : '';
		$out .= '<li><a class="kn-chip' . $cls . '" href="' . esc_url( get_category_link( $t ) ) . '">' . esc_html( $label ) . '<small>' . (int) $t->count . '</small></a></li>';
	}
	if ( $out ) {
		echo '<ul class="kn-chips">' . $out . '</ul>';
	}
}

/** ページ送り */
function kaon_pager() {
	$pages = paginate_links( array(
		'type'      => 'list',
		'prev_text' => '&lsaquo;',
		'next_text' => '&rsaquo;',
		'mid_size'  => 1,
	) );
	if ( $pages ) {
		echo '<nav class="kn-pager" aria-label="ページ送り">' . $pages . '</nav>';
	}
}
