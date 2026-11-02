<?php
/**
 * @package Welcart
 * @subpackage Welcart Belded
 */
get_header(); ?>

		<?php
		if ( wcct_get_options( 'display_top_sidebar' ) ) {
			$class = 'site-content display-sidebar';
		} else {
			$class = 'site-content no-sidebar';
		}
		?>
		<div id="primary" class="<?php echo $class; ?>">
			<div id="content" role="main">

				<?php if ( 'page' == get_option( 'show_on_front' ) ): ?>

					<div class="sof">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

							<div class="entry-content">
								<?php the_content(); ?>
							</div>

						</article>
					<?php endwhile; else: ?>
						<p><?php _e( 'Sorry, no posts matched your criteria.', 'usces' ); ?></p>
					<?php endif; ?>
					</div>

				<?php else: ?>

					<?php
					/* ===== トップページ（2026-11-02 リニューアル） =====
					   中身（特集の写真・文言、念珠をさがすの6枠、件数）は inc/kaon-home.php で設定する。
					   旧トップは Git の履歴に残っている（2026-11-02 より前のコミット）。 */
					$kn_cnt    = kaon_home_counts();
					$kn_hidden = kaon_home_hidden_items();
					?>
					<div class="kn-home">

						<?php /* ---------- ① 特集カルーセル ---------- */ ?>
						<?php $kn_feat = kaon_home_features(); ?>
						<section class="kn-fc kn-full" data-kn-fc aria-roledescription="carousel" aria-label="特集">
							<div class="kn-fc__viewport">
								<div class="kn-fc__track">
									<?php foreach ( $kn_feat as $i => $f ) : ?>
									<a class="kn-fc__slide" href="<?php echo esc_url( kaon_url( $f['url'] ) ); ?>" data-index="<?php echo (int) $i; ?>">
										<?php echo kaon_img( $f['img'], '1536x1536', '', array( 'class' => 'kn-fc__img', 'loading' => ( 0 === $i ? 'eager' : 'lazy' ) ) ); ?>
										<span class="kn-fc__body">
											<span class="kn-fc__eyebrow"><?php echo esc_html( $f['eyebrow'] ); ?></span>
											<span class="kn-fc__title"><?php echo esc_html( $f['title'] ); ?></span>
											<span class="kn-fc__copy"><?php echo nl2br( esc_html( $f['copy'] ) ); ?></span>
											<span class="kn-fc__facts"><?php echo kaon_facts( $f['facts'] ); ?></span>
											<span class="kn-fc__cta"><?php echo esc_html( $f['cta'] ); ?></span>
										</span>
									</a>
									<?php endforeach; ?>
								</div>
							</div>
							<div class="kn-fc__nav">
								<button type="button" class="kn-fc__arrow" data-prev aria-label="前へ">&lsaquo;</button>
								<div class="kn-fc__dots"></div>
								<span class="kn-fc__count"></span>
								<button type="button" class="kn-fc__arrow" data-next aria-label="次へ">&rsaquo;</button>
							</div>
						</section>

						<?php /* ---------- ② お知らせ ---------- */ ?>
						<?php
						$kn_news = new WP_Query( array(
							'category_name'       => 'news',
							'posts_per_page'      => $kn_cnt['news'],
							'ignore_sticky_posts' => true,
							'no_found_rows'       => true,
						) );
						if ( $kn_news->have_posts() ) :
						?>
						<section class="kn-sec kn-full">
							<div class="kn-wrap">
								<div class="kn-news">
									<div class="kn-head kn-head--side">
										<h2><small>NEWS</small>お知らせ</h2>
										<a class="kn-more" href="<?php echo esc_url( home_url( '/category/news/' ) ); ?>">一覧を見る</a>
									</div>
									<ul class="kn-news__list">
										<?php while ( $kn_news->have_posts() ) : $kn_news->the_post(); $kind = kaon_news_kind( get_the_title() ); ?>
										<li><a href="<?php the_permalink(); ?>">
											<time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time>
											<span class="kn-news__tag <?php echo esc_attr( $kind[0] ); ?>"><?php echo esc_html( $kind[1] ); ?></span>
											<span class="kn-news__t"><?php the_title(); ?></span>
											<span class="kn-news__arr" aria-hidden="true">&rsaquo;</span>
										</a></li>
										<?php endwhile; wp_reset_postdata(); ?>
									</ul>
								</div>
							</div>
						</section>
						<?php endif; ?>

						<?php /* ---------- ④ 新着の念珠（カテゴリー「新商品」の新しい順） ---------- */ ?>
						<?php
						$kn_new_ids = array();
						$kn_new = new WP_Query( array(
							'category_name'       => 'itemnew',
							'posts_per_page'      => $kn_cnt['new'],
							'post__not_in'        => $kn_hidden,
							'ignore_sticky_posts' => true,
							'no_found_rows'       => true,
						) );
						if ( $kn_new->have_posts() ) :
						?>
						<section class="kn-sec kn-sec--tint kn-full">
							<div class="kn-wrap">
								<div class="kn-head">
									<h2><small>NEW ARRIVALS</small>新着の念珠</h2>
									<a class="kn-more" href="<?php echo esc_url( home_url( '/category/item/itemnew/' ) ); ?>">新着をすべて見る</a>
								</div>
								<div class="kn-items">
									<?php while ( $kn_new->have_posts() ) : $kn_new->the_post(); usces_the_item(); $kn_new_ids[] = get_the_ID(); ?>
										<?php kaon_item_card(); ?>
									<?php endwhile; wp_reset_postdata(); ?>
								</div>
							</div>
						</section>
						<?php endif; ?>

						<?php /* ---------- ⑤ 念珠をさがす ---------- */ ?>
						<?php kaon_cat_tiles_section(); // 商品ページの下にも同じものを出している（inc/kaon-home.php） ?>

						<?php /* ---------- ⑥ お勧め商品（新着に出したものは除く） ---------- */ ?>
						<?php
						$kn_reco = new WP_Query( array(
							'category_name'       => 'itemreco',
							'posts_per_page'      => $kn_cnt['reco'],
							'post__not_in'        => array_merge( $kn_hidden, $kn_new_ids ),
							'ignore_sticky_posts' => true,
							'no_found_rows'       => true,
						) );
						if ( $kn_reco->have_posts() ) :
						?>
						<section class="kn-sec kn-sec--tint kn-full">
							<div class="kn-wrap">
								<div class="kn-head">
									<h2><small>RECOMMENDED</small>お勧め商品</h2>
									<a class="kn-more" href="<?php echo esc_url( home_url( '/category/item/itemreco/' ) ); ?>">お勧めをすべて見る</a>
								</div>
								<div class="kn-items">
									<?php while ( $kn_reco->have_posts() ) : $kn_reco->the_post(); usces_the_item(); ?>
										<?php kaon_item_card(); ?>
									<?php endwhile; wp_reset_postdata(); ?>
								</div>
							</div>
						</section>
						<?php endif; ?>

						<?php /* ---------- ⑦ オーダーメイド（制作事例） ---------- */ ?>
						<?php
						$kn_works = new WP_Query( array(
							'category_name'       => 'case',
							'posts_per_page'      => $kn_cnt['works'],
							'post__not_in'        => array( 461 ), // 「制作の流れ」の説明ページは実例ではないので除く
							'ignore_sticky_posts' => true,
							'no_found_rows'       => true,
						) );
						?>
						<section class="kn-sec kn-full">
							<div class="kn-wrap">
								<div class="kn-om">
									<div class="kn-om__text">
										<div class="kn-head kn-head--solo"><h2><small>ORDER MADE</small>オーダーメイド</h2></div>
										<p class="kn-om__lead">ご希望の珠の色や材質、ご予算、込められた想いまで。「こんなことは難しいかな」と思われることも、ご遠慮なくご相談ください。<strong>お見積りは無料</strong>です。</p>
										<ol class="kn-om__steps">
											<li><span>01</span>お見積り</li>
											<li><span>02</span>打ち合わせ</li>
											<li><span>03</span>制作</li>
											<li><span>04</span>納品</li>
										</ol>
										<a class="kn-om__btn" href="<?php echo esc_url( home_url( '/case/461/' ) ); ?>">制作の流れを見る</a>
									</div>
									<?php if ( $kn_works->have_posts() ) : ?>
									<div class="kn-om__works">
										<?php while ( $kn_works->have_posts() ) : $kn_works->the_post(); ?>
										<a href="<?php the_permalink(); ?>">
											<span class="kn-om__im"><?php the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy', 'alt' => '' ) ); ?></span>
											<span class="kn-om__cap"><small>制作事例</small><?php echo esc_html( preg_replace( '/^【[^】]*】\s*/u', '', get_the_title() ) ); ?></span>
										</a>
										<?php endwhile; wp_reset_postdata(); ?>
									</div>
									<?php endif; ?>
								</div>
							</div>
						</section>

						<?php /* ---------- ③ ブログ ---------- */ ?>
						<?php
						$kn_blog = new WP_Query( array(
							'category_name'       => 'blog',
							'posts_per_page'      => $kn_cnt['blog'],
							'ignore_sticky_posts' => true,
							'no_found_rows'       => true,
						) );
						if ( $kn_blog->have_posts() ) :
						?>
						<section class="kn-sec kn-sec--tint kn-full">
							<div class="kn-wrap">
								<div class="kn-head">
									<h2><small>JOURNAL</small>ブログ</h2>
									<a class="kn-more" href="<?php echo esc_url( home_url( '/blog/' ) ); ?>">すべて見る</a>
								</div>
								<p class="kn-blog__lead">工房の手仕事と、ワークショップのようすをお届けしています。</p>
								<div class="kn-posts">
									<?php while ( $kn_blog->have_posts() ) : $kn_blog->the_post(); ?>
									<a class="kn-post" href="<?php the_permalink(); ?>">
										<span class="kn-post__img">
											<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'medium_large', array( 'loading' => 'lazy', 'alt' => '' ) ); } ?>
											<?php if ( in_category( 96 ) ) : ?><span class="kn-post__tag">体験</span><?php endif; ?>
										</span>
										<time datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time>
										<span class="kn-post__t"><?php the_title(); ?></span>
									</a>
									<?php endwhile; wp_reset_postdata(); ?>
								</div>
							</div>
						</section>
						<?php endif; ?>

					</div><!-- .kn-home -->
	
				<?php endif; ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>