<?php
/**
 * 記事1件（ブログ・お知らせ・制作事例など）。2026-11-02 リニューアル。single.php から呼ぶ。
 *
 * ・本文は読みやすい幅（.kn-prose）で。サイドバーは出さない
 * ・アイキャッチ（インスタの縦長の表紙）は、本文に写真が無い記事のときだけ出す（本文と同じ写真が二重になるため）
 * ・下に「ご相談」→ 前後の記事 → 新しい記事 → 念珠をさがす
 */
if ( ! have_posts() ) {
	echo '<div id="primary" class="site-content kn-page"><div id="content"><p class="kn-arc__none">記事が見つかりませんでした。</p></div></div>';
	return;
}
the_post();

$kn_cats   = kaon_post_cats();
$kn_cat_id = 0;
foreach ( $kn_cats as $cid => $label ) {
	if ( in_category( $cid ) ) {
		$kn_cat_id = $cid;
		break;
	}
}
$kn_is_news = $kn_cat_id && in_array( $kn_cat_id, kaon_post_list_cats(), true );
$kn_has_img = false !== stripos( get_post_field( 'post_content', get_the_ID() ), '<img' );
$kn_ask     = home_url( '/contact/?title=' . rawurlencode( get_the_title() ) . '&url=' . rawurlencode( get_permalink() ) );
?>
<div id="primary" class="site-content kn-page kn-single">
	<div id="content" role="main">

		<article <?php post_class( 'kn-single__article' ); ?> id="post-<?php the_ID(); ?>">

			<?php /* <header> にしないこと（親テーマの #content header 指定に負ける） */ ?>
			<div class="kn-single__head kn-full">
				<div class="kn-wrap kn-wrap--narrow">
					<p class="kn-arc__crumb">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a>
						<?php if ( $kn_cat_id ) : ?><span>/</span><a href="<?php echo esc_url( get_category_link( $kn_cat_id ) ); ?>"><?php echo esc_html( $kn_cats[ $kn_cat_id ] ); ?></a><?php endif; ?>
					</p>
					<p class="kn-single__meta">
						<time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time>
						<?php if ( $kn_cat_id ) : ?><a class="kn-single__cat" href="<?php echo esc_url( get_category_link( $kn_cat_id ) ); ?>"><?php echo esc_html( $kn_cats[ $kn_cat_id ] ); ?></a><?php endif; ?>
					</p>
					<h1 class="kn-single__title"><?php the_title(); ?></h1>
				</div>
			</div>

			<div class="kn-wrap kn-wrap--narrow kn-single__body">
				<?php if ( has_post_thumbnail() && ! $kn_has_img ) : ?>
					<figure class="kn-single__eye"><?php the_post_thumbnail( 'large' ); ?></figure>
				<?php endif; ?>

				<div class="kn-prose entry-content">
					<?php the_content(); ?>
					<?php wp_link_pages( array( 'before' => '<nav class="kn-pager">', 'after' => '</nav>' ) ); ?>
				</div>

				<?php if ( get_the_tags() ) : ?>
					<ul class="kn-chips kn-single__tags">
						<?php foreach ( get_the_tags() as $t ) : ?>
							<li><a class="kn-chip" href="<?php echo esc_url( get_tag_link( $t ) ); ?>">#<?php echo esc_html( $t->name ); ?></a></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>

				<?php if ( ! $kn_is_news ) : ?>
				<div class="kn-single__ask">
					<p class="kn-single__ask-t">この記事のお品・似たお品について</p>
					<p class="kn-single__ask-p">在庫やお値段、お好みの色でのお仕立てなど、お気軽にお尋ねください。</p>
					<div class="kn-ip__consult-row">
						<a class="kn-ip__tel" href="tel:0757216600"><small>お電話（9:00–18:00）</small>075-721-6600</a>
						<a class="kn-ip__mail" href="<?php echo esc_url( $kn_ask ); ?>">この記事について問い合わせる</a>
					</div>
				</div>
				<?php endif; ?>

				<?php
				$kn_prev = get_previous_post( true );
				$kn_next = get_next_post( true );
				if ( $kn_prev || $kn_next ) :
				?>
				<nav class="kn-single__pn" aria-label="前後の記事">
					<?php if ( $kn_prev ) : ?>
						<a class="is-prev" href="<?php echo esc_url( get_permalink( $kn_prev ) ); ?>"><small>前の記事</small><?php echo esc_html( get_the_title( $kn_prev ) ); ?></a>
					<?php else : ?><span></span><?php endif; ?>
					<?php if ( $kn_next ) : ?>
						<a class="is-next" href="<?php echo esc_url( get_permalink( $kn_next ) ); ?>"><small>次の記事</small><?php echo esc_html( get_the_title( $kn_next ) ); ?></a>
					<?php endif; ?>
				</nav>
				<?php endif; ?>
			</div>

		</article>

		<?php
		// 同じカテゴリーの新しい記事
		$kn_more = new WP_Query( array(
			'cat'                 => $kn_cat_id ? $kn_cat_id : 24,
			'post__not_in'        => array( get_the_ID() ),
			'posts_per_page'      => 4,
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		) );
		if ( $kn_more->have_posts() ) :
		?>
		<section class="kn-sec kn-sec--tint kn-full">
			<div class="kn-wrap">
				<div class="kn-head"><h2><small>LATEST</small>新しい記事</h2><a class="kn-more" href="<?php echo esc_url( get_category_link( $kn_cat_id ? $kn_cat_id : 24 ) ); ?>">一覧を見る</a></div>
				<?php if ( $kn_is_news ) : ?>
					<ul class="kn-news__list kn-parc__news"><?php while ( $kn_more->have_posts() ) : $kn_more->the_post(); kaon_news_row(); endwhile; ?></ul>
				<?php else : ?>
					<div class="kn-posts"><?php while ( $kn_more->have_posts() ) : $kn_more->the_post(); kaon_post_card(); endwhile; ?></div>
				<?php endif; ?>
			</div>
		</section>
		<?php
		endif;
		wp_reset_postdata();
		?>

		<?php kaon_cat_tiles_section(); ?>

	</div><!-- #content -->
</div><!-- #primary -->
