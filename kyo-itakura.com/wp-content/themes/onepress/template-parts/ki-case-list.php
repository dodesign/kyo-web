<?php
/**
 * 製品紹介・実績の一覧（共通）。2026-11-02 リニューアル。
 * archive-case.php・taxonomy.php・page-case.php・category-*.php から
 *   set_query_var( 'ki_q', $query ); set_query_var( 'ki_term', $term ); get_template_part( 'template-parts/ki-case-list' );
 * のように呼ぶ。ki_q が無ければメインクエリを使う。
 *
 * @package OnePress
 */
$ki_q    = get_query_var( 'ki_q' );
$ki_term = get_query_var( 'ki_term' );
$ki_q    = ( $ki_q instanceof WP_Query ) ? $ki_q : $GLOBALS['wp_query'];

$ki_title = '製品紹介・実績';
$ki_crumb = array( array( '製品紹介・実績' ) );
if ( $ki_term instanceof WP_Term ) {
	$ki_parent = $ki_term->parent ? get_term( $ki_term->parent, $ki_term->taxonomy ) : null;
	$ki_title  = preg_replace( '/（.*?）|\(.*?\)/u', '', $ki_term->name );
	$ki_crumb  = array( array( '製品紹介・実績', get_post_type_archive_link( 'case' ) ), array( ( $ki_parent && ! is_wp_error( $ki_parent ) ? $ki_parent->name . '：' : '' ) . $ki_title ) );
}

ki_pagehead( array(
	'en'    => 'PRODUCTS',
	'title' => $ki_title,
	'lead'  => '昭和44年の設立から' . ki_years() . '年。<br>お客様のご要望を確実にかたちにすることを第一に、ひとつひとつ手作りしています。',
	'img'   => 'ki/ki-mg0048.jpg',
	'crumb' => $ki_crumb,
) );
?>

<div class="ki-filter">
	<div class="ki-wrap">
		<?php ki_case_chips( ( $ki_term instanceof WP_Term ) ? $ki_term->term_id : 0 ); ?>
		<p class="ki-filter__count"><?php echo (int) $ki_q->found_posts; ?>件</p>
	</div>
</div>

<section class="ki-sec ki-sec--list">
	<div class="ki-wrap">
		<?php if ( $ki_term instanceof WP_Term && term_description( $ki_term ) ) : ?>
			<div class="ki-termdesc"><?php echo wp_kses_post( term_description( $ki_term ) ); ?></div>
		<?php endif; ?>

		<?php if ( $ki_q->have_posts() ) : ?>
			<div class="ki-cards">
				<?php while ( $ki_q->have_posts() ) : $ki_q->the_post(); ki_case_card(); endwhile; ?>
			</div>
			<?php ki_pager( $ki_q ); ?>
		<?php else : ?>
			<p class="ki-none">該当する製品はただいまございません。</p>
		<?php endif; ?>
		<?php wp_reset_postdata(); ?>

		<div class="ki-casefoot">
			<div class="ki-casenote" data-rv>
				<p class="ki-casenote__t">卸・オーダーメイドのご相談</p>
				<p>ここに掲載している以外にも、さまざまな実績がございます。お気軽にお問い合わせください。</p>
				<a class="ki-btn ki-btn--ink" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">お問い合わせ</a>
			</div>
			<a class="ki-casenote ki-casenote--link" href="<?php echo esc_url( home_url( '/about/about-nenjyu/' ) ); ?>" data-rv>
				<p class="ki-casenote__t">念珠（数珠）とは？</p>
				<p>念珠の起源や、主玉・親玉・房など各部の名前と意味をご紹介しています。</p>
				<span class="ki-more">読む</span>
			</a>
		</div>
	</div>
</section>
