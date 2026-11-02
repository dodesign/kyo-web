<?php
/**
 * 固定ページ（ご利用ガイド・会社概要・特定商取引法・プライバシーポリシー・サービス など）。
 * 2026-11-02 新設。それまでは親テーマ welcart_basic の page.php（サイドバー付き）が使われていた。
 *
 * ・本文は管理画面の固定ページのまま。見た目だけ整える（.kn-prose）
 * ・カート・会員ページ（専用テンプレート）、ワークショップLP（Elementor）、
 *   お問い合わせ・こだわり・修理（page-◯◯.php）は、このファイルを通らない／通っても親テーマへ戻す
 *
 * @package Welcart
 */
if ( ! kaon_is_plain_page() ) {
	// 念のため：対象外のページ（カート・会員など）は親テーマの page.php で表示。
	// 親テーマの page.php が無い場合に備えて、最低限の表示も用意しておく。
	$kn_parent_page = get_template_directory() . '/page.php';
	if ( file_exists( $kn_parent_page ) ) {
		require $kn_parent_page;
		return;
	}
	get_header();
	echo '<div id="primary" class="site-content"><div id="content" role="main">';
	while ( have_posts() ) {
		the_post();
		echo '<article class="' . esc_attr( implode( ' ', get_post_class() ) ) . '"><div class="entry-header"><h1 class="entry-title">' . esc_html( get_the_title() ) . '</h1></div><div class="entry-content">';
		the_content();
		echo '</div></article>';
	}
	echo '</div></div>';
	get_sidebar();
	get_footer();
	return;
}

get_header();
the_post();
$kn_el     = kaon_is_elementor( get_the_ID() );
$kn_parent = wp_get_post_parent_id( get_the_ID() );
?>
<?php // お問い合わせの確認・完了ページ（MW WP Form）は、お問い合わせページと同じフォームの見た目にする ?>
<div id="primary" class="site-content kn-page kn-plain<?php echo has_shortcode( get_post_field( 'post_content', get_the_ID() ), 'mwform_formkey' ) ? ' kn-contact' : ''; ?>">
	<div id="content" role="main">

		<?php /* <header> にしないこと（親テーマの #content header 指定に負ける） */ ?>
		<div class="kn-arc__hero kn-full">
			<div class="kn-wrap">
				<p class="kn-arc__crumb">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a>
					<?php if ( $kn_parent ) : ?><span>/</span><a href="<?php echo esc_url( get_permalink( $kn_parent ) ); ?>"><?php echo esc_html( get_the_title( $kn_parent ) ); ?></a><?php endif; ?>
					<span>/</span><?php the_title(); ?>
				</p>
				<div class="kn-head kn-head--solo">
					<h1 class="kn-arc__title"><small><?php echo esc_html( strtoupper( urldecode( get_post_field( 'post_name', get_the_ID() ) ) ) ); ?></small><?php the_title(); ?></h1>
				</div>
			</div>
		</div>

		<section class="kn-sec kn-full kn-plain__sec">
			<div class="<?php echo $kn_el ? 'kn-plain__el' : 'kn-wrap kn-wrap--narrow'; ?>">
				<div class="<?php echo $kn_el ? '' : 'kn-prose '; ?>entry-content">
					<?php the_content(); ?>
				</div>
			</div>
		</section>

	</div><!-- #content -->
</div><!-- #primary -->
<?php get_footer(); ?>
