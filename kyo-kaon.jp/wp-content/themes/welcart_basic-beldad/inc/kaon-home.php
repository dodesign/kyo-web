<?php
/**
 * トップページ（front-page.php）・ヘッダー・フッターで使う設定と部品。
 * 2026-11-02 リニューアル。
 *
 * ★写真・文言・リンクを差し替えたいときは、下の「設定」だけ書き換えればよい。
 *   画像は「メディアのID（数字）」か「URL（文字列）」のどちらでも書ける。
 *   IDで書くと、表示サイズに合った縮小画像が自動で使われるので軽い（推奨）。
 *   メディアのIDは、管理画面 > メディア で画像を開いたときのURL「post=◯◯」の数字。
 */

/* =========================================================
   設定 1：特集カルーセル（動画のすぐ下）
   ========================================================= */
function kaon_home_features() {
	return array(
		array(
			'eyebrow' => '体験',
			'title'   => '京念珠ブレス作り体験',
			'copy'    => "京念珠の美術館で、天然石を選び、\n自分だけの一本を仕立てます。",
			// <b>…</b> の部分が大きく出る。<i>｜</i> は区切り線。
			'facts'   => '<b>9,900</b>円（税込）<i>｜</i>約60分<i>｜</i>1名様から',
			'cta'     => '体験を予約する',
			'url'     => '/service/workshop/',
			'img'     => 6025, // 2025/01/BK2A0324-scaled.jpg
		),
		array(
			'eyebrow' => '一点物',
			'title'   => '選りすぐりの一点もの',
			'copy'    => "一点限りの珠でお仕立てした、\n世界にひとつの京念珠。",
			'facts'   => '新作が入りました',
			'cta'     => '一点物を見る',
			'url'     => '/category/item/one-of-a-kind/',
			'img'     => 7393, // 2026/03/IMG_8705.jpg
		),
		array(
			'eyebrow' => 'オーダーメイド',
			'title'   => 'あなただけの京念珠を',
			'copy'    => "珠の色や材質、ご予算、込められた想いまで。\nご相談からお仕立てします。",
			'facts'   => 'お見積りは無料です',
			'cta'     => '制作の流れを見る',
			'url'     => '/case/461/',
			'img'     => 6026, // 2025/01/0049-scaled.jpg
		),
		array(
			'eyebrow' => 'ふるさと納税',
			'title'   => 'ふるさと納税の返礼品に',
			'copy'    => "職人が一つひとつ仕上げた京念珠を、\n返礼品としてお選びいただけます。",
			'facts'   => 'さとふる<i>｜</i>ふるなび<i>｜</i>ふるさとチョイス<i>｜</i>楽天',
			'cta'     => '詳しく見る',
			'url'     => '/news/5888/',
			'img'     => 5893, // 2024/11/1-1.jpg
		),
		array(
			'eyebrow' => '修理',
			'title'   => '京念珠の修理承ります',
			'copy'    => "紐が切れた、房が汚れた。大切な念珠を、\n職人が一つひとつ丁寧に直します。",
			'facts'   => '他店でお求めの念珠も承ります',
			'cta'     => '修理について',
			'url'     => '/service/fix/',
			'img'     => '/wp-content/uploads/2017/08/MG_0116.jpg',
		),
	);
}

/* =========================================================
   設定 2：念珠をさがす（6枠）
   cat = カテゴリーID（リンク先と点数に使う）
   ========================================================= */
function kaon_home_cat_tiles() {
	return array(
		array( 'en' => 'ONE OF A KIND', 'ja' => '一点もの',         'cat' => 85, 'img' => 7502 ),
		array( 'en' => 'KIHO',          'ja' => '喜芳作',           'cat' => 84, 'img' => 7560 ),
		array( 'en' => 'FOR WOMEN',     'ja' => '女性用 京念珠',    'cat' => 9,  'img' => 7835 ),
		array( 'en' => 'FOR MEN',       'ja' => '男性用 京念珠',    'cat' => 10, 'img' => '/wp-content/uploads/2026/01/IMG_6283-500x500.jpg' ),
		// 2026-11-02 「数珠ブレスレット」(104) を新設したのでそこへ（以前は女性用ブレスレット 8 につないでいた）
		array( 'en' => 'BRACELET',      'ja' => '数珠ブレスレット', 'cat' => 104, 'img' => 6025 ),
		array( 'en' => 'VALUE',         'ja' => 'お値打ち品',       'cat' => 93, 'img' => 6902 ),
	);
}

/* =========================================================
   設定 2.5：商品カテゴリーの見せ方（商品一覧のチップ・パンくず・見出し）
   2026-11-02 「種類→男女」の順に整理。
   ★WordPress のカテゴリー自体は「男性用 > 京念珠」「女性用 > 数珠ブレスレット」のように
     男女が先の古い形のまま残っている（URLを変えないため）。そこに「種類」のカテゴリー
     （京念珠 103／数珠ブレスレット 104／数珠＋念珠袋セット 105）を足して、見せ方をここで決めている。
   ★種類のカテゴリーは、商品を保存したときに自動で付く（kaon_sync_type_cats）。
     男女のカテゴリー（女性用の京念珠 9 など）さえ付けておけばよい。
   ========================================================= */
function kaon_cat_structure() {
	return array(
		// 1段目「種類」
		'types'    => array( 103, 104, 105, 18, 23 ),
		// 2段目「特集」
		'features' => array( 85, 84, 93, 80, 4, 3 ),
		// 種類ごとの「男女」チップ。[ カテゴリーID => 表示名 ]
		'genders'  => array(
			103 => array( 9 => '女性用', 10 => '男性用' ),
			104 => array( 8 => '女性用', 7 => '男性用', 20 => '男女兼用' ),
		),
		// 子カテゴリー → [ 種類のID, 見出しに出す名前 ]
		'sub'      => array(
			9  => array( 103, '女性用の京念珠' ),
			10 => array( 103, '男性用の京念珠' ),
			8  => array( 104, '女性用の数珠ブレスレット' ),
			7  => array( 104, '男性用の数珠ブレスレット' ),
			20 => array( 104, '男女兼用の数珠ブレスレット' ),
		),
		// チップでの短い表示名（カテゴリー名が長いもの）
		'labels'   => array( 103 => '京念珠', 105 => '念珠＋念珠袋セット', 18 => '念珠袋', 85 => '一点もの', 80 => 'ふるさと納税', 3 => 'お勧め', 4 => '新商品' ),
	);
}

/** 商品を保存したら「種類」のカテゴリーを自動で付ける（男女のカテゴリーから判断） */
add_action( 'set_object_terms', 'kaon_sync_type_cats', 20, 6 );
function kaon_sync_type_cats( $object_id, $terms, $tt_ids, $taxonomy, $append, $old_tt_ids ) {
	static $busy = false;
	if ( $busy || 'category' !== $taxonomy ) {
		return;
	}
	$cats = wp_get_post_categories( $object_id );
	if ( ! in_array( 2, $cats, true ) && ! array_intersect( $cats, array( 5, 6, 7, 8, 9, 10, 19, 20 ) ) ) {
		return; // 商品ではない
	}
	$add = array();
	if ( array_intersect( $cats, array( 9, 10 ) ) ) {
		$add[] = 103;
	}
	if ( array_intersect( $cats, array( 7, 8, 20 ) ) ) {
		$add[] = 104;
	}
	if ( array_intersect( $cats, array( 86, 87 ) ) ) { // 旧「数珠＆数珠袋セット」（男女別）
		$add[] = 105;
		$add[] = 103;
	}
	$add = array_diff( $add, $cats );
	if ( $add ) {
		$busy = true;
		wp_set_post_categories( $object_id, array_merge( $cats, $add ) );
		$busy = false;
	}
}

/* =========================================================
   設定 3：トップの商品欄に出さない商品
   （特定のお客様向けに作った、画像のない専用商品など）
   ========================================================= */
function kaon_home_hidden_items() {
	return array( 7898 ); // 青虎目石 尺四（特定のお客様向け）
}

/* =========================================================
   設定 4：各欄の件数
   ========================================================= */
function kaon_home_counts() {
	return array(
		'news'  => 3,  // お知らせ
		'new'   => 4,  // 新着の念珠
		'reco'  => 8,  // お勧め商品（新着に出した商品は除く）
		'works' => 2,  // オーダーメイドの実例
		'blog'  => 4,  // ブログ
	);
}


/* =========================================================
   ここから下は部品（ふだんは触らない）
   ========================================================= */

/** 商品カテゴリーの一覧ページに kn-arc-page を付ける（CSSで全幅レイアウトにするため） */
add_filter( 'body_class', 'kaon_body_class_arc' );
function kaon_body_class_arc( $classes ) {
	if ( is_category() && function_exists( 'usces_is_cat_of_item' ) && usces_is_cat_of_item( get_query_var( 'cat' ) ) ) {
		$classes[] = 'kn-arc-page';
	}
	if ( is_page( 'kihou-koubou' ) ) {
		$classes[] = 'kn-wide-page';
	}
	if ( is_page( 'contact' ) ) {
		$classes[] = 'kn-wide-page';
		$classes[] = 'kn-contact-page'; // フッターのお問い合わせ帯を出さない（同じ内容が続くため）
	}
	if ( is_page( 'fix' ) ) {
		$classes[] = 'kn-wide-page';
		$classes[] = 'kn-contact-page'; // ページ内に相談窓口があるので、フッターの帯は出さない
	}
	if ( is_single( 461 ) ) { // オーダーメイド（template-parts/kaon-ordermade.php）
		$classes[] = 'kn-wide-page';
		$classes[] = 'kn-contact-page';
	}
	// 商品ページ（Welcart の商品は post_mime_type が item）
	if ( is_singular( 'post' ) && 'item' === get_post_field( 'post_mime_type', get_queried_object_id() ) ) {
		$classes[] = 'kn-wide-page';
		$classes[] = 'kn-item-page';
	}
	return $classes;
}

/** 画像を ID または URL から <img> にする */
function kaon_img( $img, $size = 'large', $alt = '', $attr = array() ) {
	$attr = array_merge( array( 'loading' => 'lazy', 'decoding' => 'async', 'alt' => $alt ), $attr );
	if ( is_numeric( $img ) ) {
		$html = wp_get_attachment_image( (int) $img, $size, false, $attr );
		if ( $html ) {
			return $html;
		}
		return '';
	}
	$src = ( 0 === strpos( $img, 'http' ) ) ? $img : home_url( $img );
	$out = '<img src="' . esc_url( $src ) . '"';
	foreach ( $attr as $k => $v ) {
		$out .= ' ' . esc_attr( $k ) . '="' . esc_attr( $v ) . '"';
	}
	return $out . '>';
}

/** 相対パスならサイトURLを付ける */
function kaon_url( $url ) {
	return ( 0 === strpos( $url, 'http' ) ) ? $url : home_url( $url );
}

/** facts（<b><i>だけ許可）を安全に出す */
function kaon_facts( $html ) {
	return wp_kses( $html, array( 'b' => array(), 'i' => array() ) );
}

/**
 * 商品名をカード用に短くする。
 * 商品ページのタイトルはSEOのために長いまま。カードでは読みやすい部分だけ出す。
 *   「喜芳工房 クリソコーラ 8mm … 証明書付 日本製 / 京念珠 数珠 じゅず 葬式 …」
 *   → 「クリソコーラ 8mm … 正絹房」
 */
function kaon_short_item_name( $name ) {
	$s = wp_strip_all_tags( $name );
	$s = preg_replace( '/【[^】]*】/u', ' ', $s );           // 【一点物】【京都府伝統産業優秀技術】など
	$s = preg_split( '#\s/\s#u', $s )[0];                     // 「 / 」より後ろ（検索用の語）を捨てる
	$s = preg_replace( '/^\s*(喜芳工房|喜芳)\s*/u', '', $s );
	$s = preg_replace( '/\s*(喜芳工房)\s*/u', ' ', $s );
	$s = preg_replace( '/\s*(数珠\s*じゅず\s*念珠|数珠\s*じゅず)\s*/u', ' ', $s );
	$s = preg_replace( '/\s*(証明書付|日本製)\s*/u', ' ', $s );
	$s = preg_replace( '/[ 　]+/u', ' ', $s );
	return trim( $s );
}

/** お知らせの種類をタイトルから決める */
function kaon_news_kind( $title ) {
	if ( preg_match( '/休業|休み|休館|臨時休/u', $title ) ) {
		return array( 'off', '休業' );
	}
	if ( preg_match( '/掲載|取材|メディア/u', $title ) ) {
		return array( 'media', '掲載' );
	}
	if ( preg_match( '/ワークショップ|体験|イベント|開催|出店/u', $title ) ) {
		return array( 'ev', 'イベント' );
	}
	return array( '', 'お知らせ' );
}

/** 商品カード1枚（Welcartのループ内で呼ぶ） */
function kaon_item_card() {
	global $post;
	$one  = in_category( 85, $post );   // 選りすぐりの一点もの
	$free = in_category( 22, $post );   // 送料無料
	$sold = function_exists( 'usces_have_zaiko_anyone' ) && ! usces_have_zaiko_anyone();
	?>
	<a class="kn-item" href="<?php the_permalink(); ?>">
		<span class="kn-item__img">
			<?php usces_the_itemImage( 0, 500, 500 ); ?>
			<?php if ( $one ) : ?><span class="kn-item__tag">一点物</span><?php endif; ?>
			<?php if ( $sold ) : ?><span class="kn-item__sold">SOLD OUT</span><?php endif; ?>
		</span>
		<span class="kn-item__name"><?php echo esc_html( kaon_short_item_name( get_the_title() ) ); ?></span>
		<span class="kn-item__price">
			<b><?php usces_the_firstPriceCr(); ?><small><?php usces_guid_tax(); ?></small></b>
			<?php if ( $free ) : ?><span>送料無料</span><?php endif; ?>
		</span>
	</a>
	<?php
}

/** アイコン（線のSVG） */
function kaon_icon( $name ) {
	$icons = array(
		'user'  => '<svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="8" r="4"/><path d="M4 21c1.5-4 4.5-6 8-6s6.5 2 8 6"/></svg>',
		'bag'   => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 8h14l-1 13H6z"/><path d="M9 8V6a3 3 0 0 1 6 0v2"/></svg>',
		'menu'  => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16"/></svg>',
		'close' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 5l14 14M19 5L5 19"/></svg>',
		'ig'    => '<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3.5" y="3.5" width="17" height="17" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.3" cy="6.7" r=".6"/></svg>',
	);
	return isset( $icons[ $name ] ) ? $icons[ $name ] : '';
}
