<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package OnePress
 */?>
            <div id="secondary" class="widget-area sidebar" role="complementary">

                <aside id="recent-posts-2" class="widget widget_recent_entries">
                    <h2 class="widget-title">最近の投稿</h2>
                    <ul class="wpp-list">
                         <?php
                $args = array(
					'posts_per_page' => 5,
					'category__not_in' => array(get_term_by('slug', 'kotei', 'category')->term_id) // スラッグ 'kotei' のカテゴリーを除外
				);
				$myposts = get_posts($args);
                foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
                <li>
                    <a class="wpp-list__thumb" href="<?php the_permalink(); ?>">
                        <?php if(has_post_thumbnail()): ?>
                            <?php the_post_thumbnail( array( 100, 100 ) ); ?>
                        <?php else: ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/common/img/l_e_others_500.jpg" width="100" alt="no image">
                        <?php endif; ?>
                    </a>
                    <a class="wpp-post-title" href="<?php the_permalink(); ?>">
                        <p class="date">
                            <?php the_time('Y年n月j日'); ?>
                        </p>
                        <?php the_title(); ?>
                    </a>
                </li>
            <?php endforeach; wp_reset_postdata(); ?>

                    </ul>
                </aside>
				<aside id="wpp-3" class="widget popular-posts">
                <h2 class="widget-title">人気の記事</h2>
					<?php
					// WordPress Popular Postsプラグインの関数を使用して、カテゴリID 2（news）のみに限定した人気記事を取得
					if ( function_exists( 'wpp_get_mostpopular' ) ) {
						$args = array(
							'limit' => 10,  // 表示する投稿数
							'range' => 'all',  // 集計期間（daily, weekly, monthly, all）
							'post_type' => 'post',  // 投稿タイプ
							'cat' => 3,  // newsカテゴリのIDを指定
							'wpp_start' => '<ul class="wpp-list wpp-list-rank">',
							'wpp_end' => '</ul>',
							'post_html' => '
								<li>
									<a href="{url}" target="_self" data-slimstat="5">
										<img src="{thumb_url}" width="75" height="75" alt="" class="wpp-thumbnail wpp_featured wpp_cached_thumb" decoding="async" loading="lazy">
									</a>
									<a href="{url}" class="wpp-post-title" target="_self" data-slimstat="5">{text_title}</a>
									<span class="wpp-meta post-stats"></span>
								</li>',
							'thumbnail_width' => 75,  // サムネイルの幅
							'thumbnail_height' => 75, // サムネイルの高さ
							'stats_views' => 0,  // 表示数の出力をしない
							'excerpt_length' => 0,  // 抜粋を表示しない
						);
						wpp_get_mostpopular( $args );
					}
					?>

				</aside>
				<!--<aside id="categories-2" class="widget widget_categories">
					<h2 class="widget-title">カテゴリー</h2>
					<ul>
						<?php
						// スラッグ 'kotei' のカテゴリーIDを取得
						$exclude_cat = get_term_by('slug', 'kotei', 'category');
						$exclude_cat_id = $exclude_cat ? $exclude_cat->term_id : 0;

						// 'kotei' カテゴリーを除外したカテゴリー一覧を取得
						$args = array(
							'exclude' => $exclude_cat_id, // 除外するカテゴリーID
							'hide_empty' => false, // 空のカテゴリーも表示
						);
						$categories = get_categories($args);

						// カテゴリーをリスト表示
						foreach ($categories as $category) {
							echo '<li><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>';
						}
						?>
					</ul>
				</aside>-->


            </div>