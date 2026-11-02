<?php
/**
 * 製品紹介・実績 1件（カスタム投稿 case）。single.php から呼ばれる。2026-11-02 リニューアル（旧版は Git の履歴）。
 * ・本文はブロックエディタの内容をそのまま出す
 * ・カスタムフィールド case-lead があれば本文の下に出す
 * ・「同じ分類の製品」は material の最初の分類から8件
 *
 * @package OnePress
 */
get_header();
the_post();

$ki_terms = get_the_terms( get_the_ID(), 'material' );
$ki_terms = ( $ki_terms && ! is_wp_error( $ki_terms ) ) ? $ki_terms : array();
$ki_cat   = null; // 種類（親が category のもの）
foreach ( $ki_terms as $t ) {
	$p = $t->parent ? get_term( $t->parent, 'material' ) : null;
	if ( $p && ! is_wp_error( $p ) && 'category' === $p->slug ) {
		$ki_cat = $t;
		break;
	}
}
$ki_crumb = array( array( '製品紹介・実績', get_post_type_archive_link( 'case' ) ) );
if ( $ki_cat ) {
	$ki_crumb[] = array( $ki_cat->name, get_term_link( $ki_cat ) );
}
$ki_crumb[] = array( get_the_title() );
$ki_ask = home_url( '/contact/?title=' . rawurlencode( get_the_title() ) . '&url=' . rawurlencode( get_permalink() ) );
$ki_lead = get_post_meta( get_the_ID(), 'case-lead', true );
?>

<div class="ki-single-head">
	<?php ki_crumb( $ki_crumb ); ?>
	<div class="ki-wrap ki-wrap--narrow">
		<p class="ki-eyebrow ki-eyebrow--ink">PRODUCTS</p>
		<h1 class="ki-single-head__t"><?php the_title(); ?></h1>
		<?php if ( $ki_terms ) : ?>
		<ul class="ki-chips ki-chips--s">
			<?php foreach ( $ki_terms as $t ) : $color = get_term_meta( $t->term_id, 'color', true ); ?>
				<li><a class="ki-chip" href="<?php echo esc_url( get_term_link( $t ) ); ?>"><?php echo $color ? '<i style="background:' . esc_attr( $color ) . '"></i>' : ''; ?><?php echo esc_html( preg_replace( '/（.*?）|\(.*?\)/u', '', $t->name ) ); ?></a></li>
			<?php endforeach; ?>
		</ul>
		<?php endif; ?>
	</div>
</div>

<article <?php post_class( 'ki-sec ki-article' ); ?>>
	<div class="ki-wrap ki-wrap--narrow">
		<?php if ( has_post_thumbnail() && false === stripos( get_post_field( 'post_content', get_the_ID() ), '<img' ) ) : ?>
			<figure class="ki-article__eye"><?php the_post_thumbnail( 'large' ); ?></figure>
		<?php endif; ?>
		<div class="ki-prose">
			<?php the_content(); ?>
			<?php if ( $ki_lead ) : ?><div class="ki-article__lead"><?php echo wp_kses_post( wpautop( $ki_lead ) ); ?></div><?php endif; ?>
		</div>
		<p class="ki-article__date">更新日：<?php echo esc_html( get_the_modified_date( 'Y年n月j日' ) ); ?></p>

		<div class="ki-ask">
			<p class="ki-ask__t">この製品について</p>
			<p class="ki-ask__p">卸・お見積り、色や珠を変えてのお仕立てなど、お気軽にお問い合わせください。</p>
			<div class="ki-ask__btns">
				<a class="ki-btn ki-btn--ink" href="<?php echo esc_url( $ki_ask ); ?>">この製品について問い合わせる</a>
				<a class="ki-btn ki-btn--outline" <?php echo ki_tel_attr( 'product' ); ?>>電話 <?php echo esc_html( KI_TEL ); ?></a>
			</div>
		</div>
	</div>
</article>

<?php
$ki_rel_args = array(
	'post_type'      => 'case',
	'posts_per_page' => 8,
	'post__not_in'   => array( get_the_ID() ),
	'no_found_rows'  => true,
);
$ki_base = $ki_cat ? $ki_cat : ( $ki_terms ? $ki_terms[0] : null );
if ( $ki_base ) {
	$ki_rel_args['tax_query'] = array( array( 'taxonomy' => 'material', 'field' => 'term_id', 'terms' => $ki_base->term_id ) );
}
$ki_rel = new WP_Query( $ki_rel_args );
if ( $ki_rel->have_posts() ) :
?>
<section class="ki-sec ki-sec--tint">
	<div class="ki-wrap">
		<?php ki_head( 'MORE', $ki_base ? 'ほかの「' . esc_html( preg_replace( '/（.*?）|\(.*?\)/u', '', $ki_base->name ) ) . '」' : 'ほかの製品', $ki_base ? get_term_link( $ki_base ) : get_post_type_archive_link( 'case' ) ); ?>
		<div class="ki-cards">
			<?php while ( $ki_rel->have_posts() ) : $ki_rel->the_post(); ki_case_card(); endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</section>
<?php endif; ?>

<?php get_footer(); ?>
