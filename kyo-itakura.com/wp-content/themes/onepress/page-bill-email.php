<?php
/**
 * 電子請求書用 情報登録フォーム（/bill-email/）。お取引先さま向け。2026-11-02 リニューアル（旧版は Git の履歴）。
 * フォームは MW WP Form（フォームキー 4608）のまま。
 *
 * @package OnePress
 */
get_header();
?>

<?php ki_pagehead( array( 'en' => 'E-INVOICE', 'title' => '電子請求書用 情報登録フォーム', 'img' => 'ki/ki-0014.jpg', 'crumb' => array( array( '電子請求書用 情報登録フォーム' ) ) ) ); ?>

<section class="ki-sec ki-sec--tint">
	<div class="ki-wrap ki-wrap--narrow">
		<div class="ki-form">
			<?php echo do_shortcode( '[mwform_formkey key="4608"]' ); ?>
		</div>
		<p class="ki-center ki-small">いただいた情報は、お客様へのご連絡以外には利用いたしません。</p>
	</div>
</section>

<?php get_footer(); ?>
