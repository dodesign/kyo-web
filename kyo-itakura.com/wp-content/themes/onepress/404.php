<?php
/**
 * 404（ページが見つからない）。2026-11-02 リニューアル（旧版は Git の履歴）。
 *
 * @package OnePress
 */
get_header();
ki_pagehead( array( 'en' => 'NOT FOUND', 'title' => 'ページが見つかりません', 'img' => 'ki/ki-mg0055.jpg', 'crumb' => array( array( 'ページが見つかりません' ) ) ) );
?>
<section class="ki-sec">
	<div class="ki-wrap ki-wrap--narrow ki-center">
		<p class="ki-lead">お探しのページは、移動または削除された可能性があります。</p>
		<div class="ki-ask__btns">
			<a class="ki-btn ki-btn--ink" href="<?php echo esc_url( home_url( '/' ) ); ?>">トップへ</a>
			<a class="ki-btn ki-btn--outline" href="<?php echo esc_url( home_url( '/case/' ) ); ?>">製品紹介・実績</a>
		</div>
	</div>
</section>
<?php get_footer(); ?>
