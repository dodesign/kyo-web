<?php
/**
 * 表示の高速化（2026-11-02）
 *
 * ■1. ロリポップ！アクセラレータにページをキャッシュさせる
 *   それまで：Welcart がすべてのページで PHP のセッションを始めるため、
 *     「Cache-Control: no-store, no-cache」と Set-Cookie が付き、アクセラレータが一度もキャッシュしていなかった
 *     （毎回サーバーで作り直して約1秒）。
 *   いま：下の条件をすべて満たすときだけ、Set-Cookie を外して「Cache-Control: public, max-age=600」にする。
 *     ・GET で、WordPress にログインしていない
 *     ・カート・会員・お問い合わせ・検索・プレビュー・404 ではない
 *     ・URL に ?パラメータが無い（広告の gclid などだけは可）
 *   ★Set-Cookie を外すのは必須。付けたままキャッシュされると、全員に同じセッションが配られ、
 *     カートの中身が他人と混ざる危険がある。
 *   ★キャッシュは約10分。商品の在庫・価格を変えても、最大10分ほど古い表示が残ることがある
 *     （急ぐときはロリポップの管理画面「ロリポップ！アクセラレータ」→ 設定 → キャッシュ削除）。
 *     カートに入れる時点では Welcart が最新の在庫で判定するので、売り越しにはならない。
 *   ★ヘッダーとスマホ下部メニューのカートの点数は、キャッシュされたページでは正しくないので、
 *     JS（kaon-site.js initCartCount）が admin-ajax から取り直して書きかえる（admin-ajax はキャッシュされない）。
 *   ★止めたいときは KAON_PAGE_CACHE を false にする。
 *
 * ■2. reCAPTCHA の読み込みをフォームのあるページだけに
 *   ・MW WP Form reCAPTCHA（お問い合わせフォーム用）が全ページの <head> に api.js を入れていた
 *   ・Contact Form 7 の reCAPTCHA も全ページで読み込まれていた（CF7 のフォームはどこにも置かれていない）
 *   → フォームのページ（kaon_needs_recaptcha）以外では外す。
 */

if ( ! defined( 'KAON_PAGE_CACHE' ) ) {
	define( 'KAON_PAGE_CACHE', true );
}

/** reCAPTCHA が必要なページか（お問い合わせ・確認・完了、ワークショップLP、カート・会員、フォームを置いたページ） */
function kaon_needs_recaptcha() {
	if ( is_page( array( 'contact', 'contact-check', 'contact-thanks' ) ) || is_page( array( 6000, 6655 ) ) ) {
		return true;
	}
	if ( function_exists( 'welcart_basic_is_cart_page' ) && ( welcart_basic_is_cart_page() || welcart_basic_is_member_page() ) ) {
		return true;
	}
	if ( is_singular() ) {
		$c = (string) get_post_field( 'post_content', get_queried_object_id() );
		if ( false !== strpos( $c, 'mwform' ) || false !== strpos( $c, 'contact-form-7' ) || false !== stripos( $c, 'recaptcha' ) ) {
			return true;
		}
	}
	return false;
}

/* ---------- reCAPTCHA：不要なページでは外す ---------- */
add_action( 'wp_enqueue_scripts', 'kaon_drop_recaptcha_scripts', 100 );
function kaon_drop_recaptcha_scripts() {
	if ( kaon_needs_recaptcha() ) {
		return;
	}
	// Contact Form 7
	wp_dequeue_script( 'google-recaptcha' );
	wp_dequeue_script( 'wpcf7-recaptcha' );
}

// MW WP Form reCAPTCHA は wp_head に直接 <script> を書いているので、その処理を外す
add_action( 'wp_head', 'kaon_drop_recaptcha_head', 0 );
function kaon_drop_recaptcha_head() {
	if ( kaon_needs_recaptcha() ) {
		return;
	}
	global $wp_filter;
	if ( empty( $wp_filter['wp_head'] ) ) {
		return;
	}
	foreach ( $wp_filter['wp_head']->callbacks as $pri => $cbs ) {
		foreach ( $cbs as $cb ) {
			$f    = $cb['function'];
			$name = '';
			if ( is_string( $f ) ) {
				$name = $f;
			} elseif ( is_array( $f ) ) {
				$name = ( is_object( $f[0] ) ? get_class( $f[0] ) : (string) $f[0] ) . '::' . $f[1];
			}
			if ( $name && false !== stripos( $name, 'recaptcha' ) ) {
				remove_action( 'wp_head', $f, $pri );
			}
		}
	}
}

/* ---------- ページキャッシュ ---------- */
add_action( 'template_redirect', 'kaon_cache_headers', 9999 );
function kaon_cache_headers() {
	if ( ! KAON_PAGE_CACHE || headers_sent() ) {
		return;
	}
	if ( 'GET' !== ( isset( $_SERVER['REQUEST_METHOD'] ) ? $_SERVER['REQUEST_METHOD'] : '' ) ) {
		return;
	}
	if ( is_user_logged_in() || is_admin() || is_preview() || is_search() || is_404() || is_feed() || is_trackback() ) {
		return;
	}
	if ( function_exists( 'welcart_basic_is_cart_page' ) && ( welcart_basic_is_cart_page() || welcart_basic_is_member_page() ) ) {
		return;
	}
	if ( is_page( array( 'contact', 'contact-check', 'contact-thanks', 'usces-cart', 'usces-member' ) ) ) {
		return;
	}
	// フォームのあるページ（ワークショップLPの申込フォームなど）はキャッシュしない
	if ( kaon_needs_recaptcha() ) {
		return;
	}
	// ?パラメータは広告・SNSの計測用だけ許す
	$allow = array( 'gclid', 'fbclid', 'yclid', 'srsltid', 'gad_source', 'gbraid', 'wbraid' );
	foreach ( array_keys( $_GET ) as $k ) {
		if ( 0 === strpos( $k, 'utm_' ) || in_array( $k, $allow, true ) ) {
			continue;
		}
		return;
	}
	header_remove( 'Set-Cookie' );
	header_remove( 'Pragma' );
	header_remove( 'Expires' );
	header( 'Cache-Control: public, max-age=600' );
	header( 'X-Kaon-Cache: page' ); // 確認用（ブラウザの開発ツールで見える）
}

/* ---------- カートの点数（キャッシュされたページでも正しく出すため） ---------- */
add_action( 'wp_ajax_kaon_cart_count', 'kaon_ajax_cart_count' );
add_action( 'wp_ajax_nopriv_kaon_cart_count', 'kaon_ajax_cart_count' );
function kaon_ajax_cart_count() {
	nocache_headers();
	$n = 0;
	if ( function_exists( 'usces_totalquantity_in_cart' ) ) {
		ob_start();
		usces_totalquantity_in_cart(); // ★数字を表示する関数なので ob で受け取る
		$n = (int) trim( wp_strip_all_tags( ob_get_clean() ) );
	}
	wp_send_json( array( 'n' => $n ) );
}
