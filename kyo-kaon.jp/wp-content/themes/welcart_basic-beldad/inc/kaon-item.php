<?php
/**
 * 商品ページ（wc_templates/wc_item_single.php）の部品。2026-11-02 リニューアル。
 *
 * ★商品本文の後半「大切な方への贈り物としても」「人間心理に基づいて設計」「喜芳工房の類まれなる技術」
 *   「念珠を持つ人の幸せを願い…」は、どの商品にも同じ文章が手で貼り付けてある（約140件）。
 *   本文はそのままにして、表示するときだけ切り分け、共通部分はテンプレート側のデザインで出している。
 *   → 商品登録のときは、これまでどおり本文に貼り付けておけばよい（貼らなくても表示は崩れない）。
 *
 *   ・「大切な方への贈り物としても」の中身（セット内容）は商品ごとに違うので、本文の文章をそのまま出す
 *   ・ほかの3つは決まり文句なら消して、デザインした「喜芳工房の念珠について」に置きかえる
 *   ・決まり文句以外の文章（サイズ・素材など）が混ざっていたら、消さずに商品説明の後ろに残す
 */

/** 共通見出し（本文の <h2> と一字一句同じもの） */
function kaon_item_common_heads() {
	return array(
		'gift'  => '大切な方への贈り物としても',
		'color' => '人間心理に基づいて設計',
		'tech'  => '喜芳工房の類まれなる技術',
		'wish'  => '念珠を持つ人の幸せを願い、その人のお守りとなるように念じて作る',
	);
}

/** 共通の決まり文句（空白・改行を無視して比べる） */
function kaon_item_boilerplate() {
	return array(
		'color' => array( '配色や配置は、「国際カラーデザイン協会パーソナルカラーレッスン」「色彩心理診断士」「色彩検定2級」「センセーション・トリコロールカラーセラピー」などの数々の資格を持つカラーリストが、人間心理に基づいて設計しました。' ),
		'tech'  => array( '世界にたった3人しかいない、京都府伝統産業優秀技術者の念珠師である京の名工 喜芳。その類まれなる技術を引き継いだ喜芳工房の職人が一つひとつ真心をこめてお仕立てしています。' ),
		'wish'  => array(
			'喜芳工房が何よりも大切にしているのは、「念珠を持つ人の幸せを願い、その人のお守りとなるように念じて作る」という喜芳の想いを受け継ぐことです。念珠は、故人を偲ぶときに使う大切なもの。念珠は「念ずる珠」とかくように、心のお守りとなります。時には、ふとした瞬間に見るだけで、あるいは触るだけで心安らぐ拠り所として使っていただけるように、一つひとつ丁寧に、心をこめて作ります。',
			'喜芳工房が何よりも大切にしているのは、「念珠を持つ人の幸せを願い、その人のお守りとなるように念じて作る」という喜芳の想いを受け継ぐことです。念珠は、故人を偶ぶときに使う大切なもの。念珠は「念ずる珠」とかくように、心のお守りとなります。時には、ふとした瞬間に見るだけで、あるいは触るだけで心安らぐ拠り所として使っていただけるように、一つひとつ丁寧に、心をこめて作ります。',
		),
	);
}

/** 比較用：タグ・空白（全角含む）を取り除く */
function kaon_item_norm( $s ) {
	$s = preg_replace( '/<img[^>]*>/i', '', $s );
	$s = wp_strip_all_tags( $s );
	return preg_replace( '/[\s　]+/u', '', $s );
}

/**
 * 本文（生のまま）を切り分ける。
 * @return array own（商品固有の説明）/ gift（セット内容の文章）/ extra（共通欄に混ざっていた固有の文章）/ keys（あった共通欄）
 */
function kaon_item_split_content( $raw ) {
	$heads  = kaon_item_common_heads();
	$boiler = kaon_item_boilerplate();
	$out    = array( 'own' => '', 'gift' => '', 'extra' => '', 'keys' => array() );

	$parts = preg_split( '/(<h2[^>]*>.*?<\/h2>)/su', $raw, -1, PREG_SPLIT_DELIM_CAPTURE );
	$in_common = false;
	$n = count( $parts );
	for ( $i = 0; $i < $n; $i++ ) {
		$p = $parts[ $i ];
		if ( preg_match( '/^<h2[^>]*>(.*?)<\/h2>$/su', $p, $m ) ) {
			$key = array_search( trim( wp_strip_all_tags( $m[1] ) ), $heads, true );
			if ( false !== $key ) {
				$in_common = true;
				$body = isset( $parts[ $i + 1 ] ) ? $parts[ $i + 1 ] : '';
				$i++;
				$out['keys'][] = $key;
				if ( 'gift' === $key ) {
					$out['gift'] .= $body;
					continue;
				}
				$norm = kaon_item_norm( $body );
				foreach ( $boiler[ $key ] as $b ) {
					$nb = kaon_item_norm( $b );
					if ( $norm === $nb ) {
						$norm = '';
						break;
					}
					if ( '' !== $nb && false !== strpos( $norm, $nb ) ) {
						$body = str_replace( $b, '', $body ); // 決まり文句の行だけ消す
						$norm = kaon_item_norm( $body );
					}
				}
				if ( '' !== $norm ) {
					$out['extra'] .= preg_replace( '/<img[^>]*>/i', '', $body );
				}
				continue;
			}
		}
		if ( $in_common ) {
			$out['extra'] .= $p;
		} else {
			$out['own'] .= $p;
		}
	}
	$out['keys'] = array_values( array_unique( $out['keys'] ) );
	return $out;
}

/** 本文用のフィルターをかける（YARPP の「似ている商品」は付けない。下で自前の「おすすめ」を出すため） */
function kaon_item_render( $raw ) {
	if ( '' === trim( $raw ) ) {
		return '';
	}
	global $yarpp;
	$removed = false;
	if ( isset( $yarpp ) && is_object( $yarpp ) ) {
		$pr = has_filter( 'the_content', array( $yarpp, 'the_content' ) );
		if ( false !== $pr ) {
			remove_filter( 'the_content', array( $yarpp, 'the_content' ), $pr );
			$removed = $pr;
		}
	}
	$html = apply_filters( 'the_content', $raw );
	if ( false !== $removed ) {
		add_filter( 'the_content', array( $yarpp, 'the_content' ), $removed );
	}
	return str_replace( ']]>', ']]&gt;', $html );
}

/** 「喜芳工房の念珠について」のカード（本文に該当の欄があった商品だけ出す） */
function kaon_item_brand_cards() {
	return array(
		'color' => array(
			'no'  => 'COLOR',
			't'   => '人間心理に基づいて設計',
			'p'   => '配色や配置は、「国際カラーデザイン協会パーソナルカラーレッスン」「色彩心理診断士」「色彩検定2級」「センセーション・トリコロールカラーセラピー」などの資格を持つカラーリストが、人間心理に基づいて設計しました。',
			'img' => '/common/img/kodawari-4.jpg',
		),
		'tech'  => array(
			'no'  => 'CRAFT',
			't'   => '喜芳工房の類まれなる技術',
			'p'   => '世界にたった3人しかいない、京都府伝統産業優秀技術者の念珠師である京の名工 喜芳。その類まれなる技術を引き継いだ喜芳工房の職人が、一つひとつ真心をこめてお仕立てしています。',
			'img' => 8051,
		),
		'wish'  => array(
			'no'  => 'WISH',
			't'   => '持つ人のお守りとなるように',
			'p'   => '喜芳工房が何よりも大切にしているのは、「念珠を持つ人の幸せを願い、その人のお守りとなるように念じて作る」という喜芳の想いを受け継ぐこと。ふとした瞬間に見るだけで、触るだけで心安らぐ拠り所となるよう、一つひとつ丁寧に作ります。',
			'img' => 8055,
		),
	);
}

/** この商品の「種類」と「男女」のカテゴリー（パンくず・おすすめに使う） */
function kaon_item_type_of( $post_id ) {
	$st   = kaon_cat_structure();
	$cats = wp_get_post_categories( $post_id );
	$type = 0;
	$sub  = 0;
	foreach ( $st['types'] as $t ) {
		if ( in_array( $t, $cats, true ) ) {
			$type = $t;
			break;
		}
	}
	foreach ( $st['sub'] as $sid => $info ) {
		if ( in_array( $sid, $cats, true ) && ( ! $type || $info[0] === $type ) ) {
			$sub = $sid;
			break;
		}
	}
	return array( $type, $sub );
}

/** おすすめ商品のクエリ（同じ男女の種類 → 足りなければ同じ種類） */
function kaon_item_related_query( $post_id, $num = 4 ) {
	list( $type, $sub ) = kaon_item_type_of( $post_id );
	$exclude = array_merge( array( $post_id ), kaon_home_hidden_items() );
	$cat     = $sub ? $sub : ( $type ? $type : (int) usces_get_cat_id( 'item' ) );
	$q = new WP_Query( array(
		'cat'                 => $cat,
		'posts_per_page'      => $num,
		'post__not_in'        => $exclude,
		'orderby'             => 'rand',
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	) );
	if ( $q->post_count < $num && $sub && $type ) {
		$q = new WP_Query( array(
			'cat'                 => $type,
			'posts_per_page'      => $num,
			'post__not_in'        => $exclude,
			'orderby'             => 'rand',
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		) );
	}
	return $q;
}
