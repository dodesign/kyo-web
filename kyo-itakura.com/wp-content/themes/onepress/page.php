<?php
/**
 * 固定ページ（修理・サービス・お問い合わせ完了など、専用テンプレートの無いページ）。2026-11-02 リニューアル（旧版は Git の履歴）。
 * 本文は管理画面の固定ページの内容をそのまま、読みやすい幅（.ki-prose）で出す。
 *
 * @package OnePress
 */
get_header();
the_post();
$ki_parent = wp_get_post_parent_id( get_the_ID() );
$ki_crumb  = array();
if ( $ki_parent ) {
	$ki_crumb[] = array( get_the_title( $ki_parent ), get_permalink( $ki_parent ) );
}
$ki_crumb[] = array( get_the_title() );
$ki_img     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'full' ) : 'ki/ki-mg0055.jpg';
if ( is_page( 'fix' ) ) {
	$ki_img = 'ki/ki-mg0113.jpg';
}

ki_pagehead( array(
	'en'    => strtoupper( urldecode( get_post_field( 'post_name', get_the_ID() ) ) ),
	'title' => get_the_title(),
	'img'   => $ki_img,
	'crumb' => $ki_crumb,
) );
?>

<section class="ki-sec">
	<div class="ki-wrap ki-wrap--narrow ki-prose">
		<?php the_content(); ?>
	</div>
</section>

<?php if ( is_page( 'fix' ) ) : ?>
<section class="ki-sec ki-sec--tint">
	<div class="ki-wrap ki-wrap--narrow ki-center">
		<?php ki_head( 'REPAIR', '修理のご相談はこちら' ); ?>
		<p class="ki-lead">他店でお求めのお念珠や、ご自宅にあったお念珠も修理いたします。事業者さまからの大量のご依頼も承ります。</p>
		<div class="ki-ask__btns">
			<a class="ki-btn ki-btn--ink" href="<?php echo esc_url( home_url( '/contact/?title=' . rawurlencode( '念珠の修理について' ) ) ); ?>">修理について問い合わせる</a>
			<a class="ki-btn ki-btn--outline" <?php echo ki_tel_attr( 'fix' ); ?>>電話 <?php echo esc_html( KI_TEL ); ?></a>
		</div>
	</div>
</section>
<?php endif; ?>

<?php get_footer(); ?>
