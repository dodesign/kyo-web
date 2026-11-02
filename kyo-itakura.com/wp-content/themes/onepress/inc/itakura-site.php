<?php
/**
 * kyo-itakura.com 2026-11-02 リニューアルの土台。functions.php の最後で読み込む。
 *
 * ・見た目は common/css/itakura-site.css、動きは common/js/itakura-site.js（クラス名はすべて ki- で始める）
 * ・喜芳工房のオンラインショップ（kyo-kaon.jp）と同じ雰囲気（明朝体・生成り色）にそろえている
 * ・OnePress 本来の CSS／JS（bootstrap・style.css など）は表側では読み込まない（テンプレートを全部作り直したため）
 * ・旧テンプレートは Git の履歴（2026-11-02 の取り込み時点）に残っている
 *
 * ★PHP は 7.4。str_contains・match・名前付き引数など PHP 8 の書き方は使わないこと。
 */

/* =========================================================
   設定
   ========================================================= */
define( 'KI_FOUNDED', 1970 ); // 製造卸を始めた年（「製造卸一筋◯年」の計算に使う。旧サイトの製品紹介ページと同じ値）
define( 'KI_SHOP_URL', 'https://kyo-kaon.jp/' );
define( 'KI_AMAZON_URL', 'https://www.amazon.co.jp/s?rh=n%3A85895051%2Cp_4%3A%E5%96%9C%E8%8A%B3%E5%B7%A5%E6%88%BF' );
define( 'KI_TEL', '075-721-6600' );
define( 'KI_FAX', '075-721-6784' );

/** 製造卸を始めてからの年数 */
function ki_years() {
	return (int) date_i18n( 'Y' ) - KI_FOUNDED;
}

/* =========================================================
   CSS・JS
   ========================================================= */
add_action( 'wp_enqueue_scripts', 'ki_assets', 100 );
function ki_assets() {
	$dir = get_template_directory();
	$uri = get_template_directory_uri();

	// OnePress 本来の見た目・動き（新しいテンプレートでは使わない）
	foreach ( array( 'onepress-fonts', 'onepress-animate', 'onepress-fa', 'onepress-bootstrap', 'onepress-style', 'onepress-gallery-lightgallery' ) as $h ) {
		wp_dequeue_style( $h );
	}
	foreach ( array( 'onepress-js-plugins', 'onepress-js-bootstrap', 'onepress-theme', 'onepress-gallery-masonry', 'onepress-gallery-justified', 'onepress-gallery-carousel', 'infinite-scroll' ) as $h ) {
		wp_dequeue_script( $h );
	}

	wp_enqueue_style( 'ki-font', 'https://fonts.googleapis.com/css2?family=Shippori+Mincho:wght@400;500;600&display=swap', array(), null );
	wp_enqueue_style( 'ki-site', $uri . '/common/css/itakura-site.css', array(), filemtime( $dir . '/common/css/itakura-site.css' ) );
	wp_enqueue_script( 'ki-site', $uri . '/common/js/itakura-site.js', array(), filemtime( $dir . '/common/js/itakura-site.js' ), true );
}

/* 郵便番号から住所（お問い合わせ・電子請求書フォーム）。旧 add_head_link は jQuery より先に head で動いてエラーになるため、フッターで出す */
remove_action( 'wp_head', 'add_head_link' );
add_action( 'wp_footer', 'ki_zip_script', 99 );
function ki_zip_script() {
	if ( ! is_page( array( 'contact', 'bill-email' ) ) ) {
		return;
	}
	?>
	<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
	<script>
	(function () {
		var z = document.getElementById('zip');
		if (!z || !window.AjaxZip3) return;
		z.addEventListener('keyup', function () { AjaxZip3.zip2addr(this, '', 'address', 'address'); });
	})();
	</script>
	<?php
}

/* body のクラス */
add_filter( 'body_class', 'ki_body_class' );
function ki_body_class( $c ) {
	$c[] = 'ki';
	if ( is_front_page() ) {
		$c[] = 'ki-home';
	}
	return $c;
}

/* =========================================================
   部品
   ========================================================= */

/** テーマ内の画像 URL（common/img/ 以下） */
function ki_img_url( $file ) {
	return get_template_directory_uri() . '/common/img/' . ltrim( $file, '/' );
}

/** <img>。$src はテーマ内のファイル名（common/img/ 以下）か URL か メディアID */
function ki_img( $src, $alt = '', $attr = array() ) {
	$attr = array_merge( array( 'loading' => 'lazy', 'decoding' => 'async' ), $attr );
	if ( is_numeric( $src ) ) {
		$attr['alt'] = $alt;
		return wp_get_attachment_image( (int) $src, 'large', false, $attr );
	}
	$url = ( 0 === strpos( $src, 'http' ) || 0 === strpos( $src, '/' ) ) ? $src : ki_img_url( $src );
	$out = '<img src="' . esc_url( $url ) . '" alt="' . esc_attr( $alt ) . '"';
	foreach ( $attr as $k => $v ) {
		$out .= ' ' . esc_attr( $k ) . '="' . esc_attr( $v ) . '"';
	}
	return $out . '>';
}

/** 電話の計測（gtag があるときだけ） */
function ki_tel_attr( $label = 'site' ) {
	return 'href="tel:0757216600" onclick="if(window.gtag){gtag(\'event\',\'tel-tap\',{event_category:\'click\',event_label:\'' . esc_js( $label ) . '\'});}"';
}

/** 下層ページの見出し（写真の上に文字）。★<header> 要素は使わない */
function ki_pagehead( $args ) {
	$a = array_merge( array( 'en' => '', 'title' => '', 'lead' => '', 'img' => 'ki-mg0055.jpg', 'crumb' => array() ), $args );
	?>
	<div class="ki-ph">
		<?php echo ki_img( $a['img'], '', array( 'class' => 'ki-ph__img', 'loading' => 'eager' ) ); ?>
		<div class="ki-ph__body ki-wrap">
			<?php if ( $a['en'] ) : ?><p class="ki-ph__en"><?php echo esc_html( $a['en'] ); ?></p><?php endif; ?>
			<h1 class="ki-ph__title"><?php echo wp_kses( $a['title'], array( 'br' => array(), 'small' => array() ) ); ?></h1>
			<?php if ( $a['lead'] ) : ?><p class="ki-ph__lead"><?php echo wp_kses( $a['lead'], array( 'br' => array() ) ); ?></p><?php endif; ?>
		</div>
	</div>
	<?php ki_crumb( $a['crumb'] ); ?>
	<?php
}

/** パンくず。$items は [ [名前, URL], ... ]（最後は URL なしでよい） */
function ki_crumb( $items ) {
	if ( ! $items ) {
		return;
	}
	echo '<nav class="ki-crumb ki-wrap" aria-label="パンくず"><a href="' . esc_url( home_url( '/' ) ) . '">トップ</a>';
	foreach ( $items as $it ) {
		echo '<span>/</span>';
		if ( ! empty( $it[1] ) ) {
			echo '<a href="' . esc_url( $it[1] ) . '">' . esc_html( $it[0] ) . '</a>';
		} else {
			echo '<em>' . esc_html( $it[0] ) . '</em>';
		}
	}
	echo '</nav>';
}

/** セクション見出し */
function ki_head( $en, $ja, $more = '', $more_label = '' ) {
	echo '<div class="ki-head"><h2><small>' . esc_html( $en ) . '</small>' . wp_kses( $ja, array( 'br' => array() ) ) . '</h2>';
	if ( $more ) {
		echo '<a class="ki-more" href="' . esc_url( $more ) . '">' . esc_html( $more_label ? $more_label : '一覧を見る' ) . '</a>';
	}
	echo '</div>';
}

/** 製品紹介（カスタム投稿 case）のカード。ループの中で呼ぶ */
function ki_case_card() {
	?>
	<a class="ki-card" href="<?php the_permalink(); ?>">
		<span class="ki-card__img">
			<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy', 'alt' => '' ) );
			} else {
				echo '<span class="ki-card__noimg">板倉</span>';
			}
			?>
		</span>
		<span class="ki-card__t"><?php the_title(); ?></span>
	</a>
	<?php
}

/** お知らせの1行。ループの中で呼ぶ */
function ki_news_row() {
	$cat = '';
	foreach ( (array) get_the_category() as $c ) {
		if ( 110 !== (int) $c->term_id ) {
			$cat = $c->name;
			break;
		}
	}
	?>
	<li><a href="<?php the_permalink(); ?>">
		<time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time>
		<?php if ( $cat ) : ?><span class="ki-news__tag"><?php echo esc_html( $cat ); ?></span><?php endif; ?>
		<span class="ki-news__t"><?php the_title(); ?></span>
	</a></li>
	<?php
}

/** ページ送り */
function ki_pager( $query = null ) {
	$args = array(
		'type'      => 'list',
		'prev_text' => '&lsaquo;',
		'next_text' => '&rsaquo;',
		'mid_size'  => 1,
	);
	if ( $query ) {
		$args['total']   = $query->max_num_pages;
		$args['current'] = max( 1, (int) get_query_var( 'paged' ) );
	}
	$p = paginate_links( $args );
	if ( $p ) {
		echo '<nav class="ki-pager" aria-label="ページ送り">' . $p . '</nav>';
	}
}

/** 製品紹介の分類（material の子ターム）。$parent_slug = category / color-search / material-search */
function ki_material_terms( $parent_slug ) {
	$parent = get_term_by( 'slug', $parent_slug, 'material' );
	if ( ! $parent ) {
		return array();
	}
	$terms = get_terms( array(
		'taxonomy'   => 'material',
		'parent'     => (int) $parent->term_id,
		'hide_empty' => true,
	) );
	if ( is_wp_error( $terms ) ) {
		return array();
	}
	if ( 'material-search' === $parent_slug ) {
		usort( $terms, function ( $a, $b ) {
			return strcmp( $a->name, $b->name );
		} );
	}
	return $terms;
}

/** 製品紹介の分類チップ（一覧ページの上） */
function ki_case_chips( $current = 0 ) {
	$rows = array(
		'category'        => '種類',
		'color-search'    => '色',
		'material-search' => '素材',
	);
	echo '<div class="ki-chips-wrap">';
	foreach ( $rows as $slug => $label ) {
		$terms = ki_material_terms( $slug );
		if ( ! $terms ) {
			continue;
		}
		$open = ( 'category' === $slug );
		echo '<div class="ki-chiprow' . ( $open ? '' : ' is-fold' ) . '"><span class="ki-chiprow__label">' . esc_html( $label ) . '</span><ul class="ki-chips">';
		if ( 'category' === $slug ) {
			echo '<li><a class="ki-chip' . ( $current ? '' : ' is-current' ) . '" href="' . esc_url( get_post_type_archive_link( 'case' ) ) . '">すべて</a></li>';
		}
		foreach ( $terms as $t ) {
			$color = get_term_meta( $t->term_id, 'color', true );
			$dot   = $color ? '<i style="background:' . esc_attr( $color ) . '"></i>' : '';
			$name  = preg_replace( '/（.*?）|\(.*?\)/u', '', $t->name );
			echo '<li><a class="ki-chip' . ( (int) $current === (int) $t->term_id ? ' is-current' : '' ) . '" href="' . esc_url( get_term_link( $t ) ) . '">' . $dot . esc_html( $name ) . '<small>' . (int) $t->count . '</small></a></li>';
		}
		echo '</ul></div>';
	}
	echo '</div>';
}

/** 実績・メディア（旧サイトの「実績」欄の内容） */
function ki_media_list() {
	return array(
		'tv'    => array( 'ディノス（東京ローカル）', 'ショップチャンネル', '高田純次の春の京都で逸品をさがせ！', 'いいものプレミアム' ),
		'print' => array( 'ディノス', 'ワコール', '生協' ),
	);
}
