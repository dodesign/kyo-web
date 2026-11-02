<?php
/**
 * お問い合わせ（/contact/）専用テンプレート。2026-11-02 リニューアル。
 *
 * ・フォーム本体は MW WP Form（フォームキー 115）のまま。入力・確認・完了の画面切り替えも MW WP Form が行う。
 *   フォームの項目を変えたいときは、管理画面 > MW WP Form で編集する（このファイルではない）。
 * ・フォームキーは固定ページ本文の [mwform_formkey key="…"] から読み取っている。
 *   本文のそれ以外（説明文・電話番号の表）は使っていない。説明文はこのファイルに書いている。
 * ・商品ページの「お問い合わせ」ボタンから来たとき、お問い合わせ内容に商品名が入るJSは footer.php にある。
 */
get_header();

$kn_form = '';
if ( have_posts() ) {
	the_post();
	if ( preg_match( '/\[mwform_formkey[^\]]*\]/', get_post_field( 'post_content', get_the_ID() ), $m ) ) {
		$kn_form = $m[0];
	}
}
?>
<div id="primary" class="site-content kn-page kn-contact">
	<div id="content" role="main">

		<div class="kn-arc__hero kn-full">
			<div class="kn-wrap">
				<p class="kn-arc__crumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a><span>/</span>お問い合わせ</p>
				<div class="kn-head kn-head--solo">
					<h1 class="kn-arc__title"><small>CONTACT</small><?php the_title(); ?></h1>
				</div>
				<p class="kn-contact__lead">各宗派の本式や略式はもちろんのこと、<strong>ご希望のお色の珠などでオーダーメイド</strong>で制作させて頂くことも可能です。お探しの材質や色目やご予算など、「こんなことは難しいかな……」と思われるようなこだわりも<strong>ご遠慮なくご相談</strong>ください。喜芳直伝の技術を受け継いだ職人がお一人おひとりのご要望を具現化します。</p>
			</div>
		</div>

		<section class="kn-sec kn-full kn-contact__ways">
			<div class="kn-wrap">
				<div class="kn-contact__cards">
					<a class="kn-contact__card" href="tel:0757216600">
						<span class="kn-contact__kind">お電話</span>
						<span class="kn-contact__num">075-721-6600</span>
						<span class="kn-contact__note">受付時間 9:00–18:00</span>
					</a>
					<div class="kn-contact__card">
						<span class="kn-contact__kind">FAX</span>
						<span class="kn-contact__num">075-721-6784</span>
						<span class="kn-contact__note">24時間受付</span>
					</div>
					<a class="kn-contact__card" href="#kn-form">
						<span class="kn-contact__kind">メール</span>
						<span class="kn-contact__num kn-contact__num--s">下のフォームから</span>
						<span class="kn-contact__note">24時間受付</span>
					</a>
				</div>
			</div>
		</section>

		<section id="kn-form" class="kn-sec kn-sec--tint kn-full kn-contact__formsec">
			<div class="kn-wrap kn-wrap--narrow">
				<div class="kn-head kn-head--solo"><h2><small>FORM</small>フォームでのお問い合わせ</h2></div>
				<p class="kn-contact__formlead"><span class="kn-req">必須</span> の項目をご入力のうえ、「確認画面へ」をお押しください。商品についてのご質問、お見積り、修理のご相談なども、こちらからどうぞ。</p>
				<div class="kn-contact__form">
					<?php
					if ( $kn_form ) {
						echo do_shortcode( $kn_form );
					} else {
						the_content(); // フォームキーが見つからないときは、本文をそのまま出す
					}
					?>
				</div>
			</div>
		</section>

	</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
