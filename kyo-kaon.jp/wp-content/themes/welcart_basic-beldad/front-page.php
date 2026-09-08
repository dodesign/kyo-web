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

					<div class="upper">

						<?php
						if ( wcct_get_options( 'display_topics' ) ):
							$topics_num      = wcct_get_options( 'topics_num' );
							$topics_cat_slug = wcct_get_options( 'topics_cat' );
							$topics_cat      = get_term_by( 'slug', $topics_cat_slug, 'category' );
						?>
						<section class="topics-area home-area">
							<div class="slider">
							<?php
							$topics_args = array(
								'posts_per_page' => $topics_num,
								'category_name'  => $topics_cat_slug,
							); 
							$topics_query = new WP_Query( $topics_args );
							if ( $topics_query->have_posts() ):
								while ( $topics_query->have_posts() ) :
								$topics_query->the_post();
							?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<a href="<?php the_permalink(); ?>">
										<span class="thumbnail">
										<?php if( has_post_thumbnail() ): ?>
											<?php the_post_thumbnail( 'img500x500' ); ?>
										<?php else: ?>
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/noimg.gif" alt="noimg">
										<?php endif; ?>
										</span>
										<span class="title"><?php the_title(); ?></span>
									</a>
								</article>
							<?php
								endwhile;
								wp_reset_postdata();
							else:
							?>
							<p class="no-date"><?php _e( 'Sorry, no posts matched your criteria.', 'usces' ); ?></p>
							<?php
							endif;
							?>
							</div><!-- .slider -->
						</section><!-- .topics-area -->
						<?php
						endif;
						?>

						<div class="section-head cf">
							<h2>ブログ</h2>
						</div>
						<section class="topics-area home-area">
							<div class="slider">
							<?php
							$topics_args = array(
								'posts_per_page' => 10,
								'category_name'  => 'blog',
							); 
							$topics_query = new WP_Query( $topics_args );
							if ( $topics_query->have_posts() ):
								while ( $topics_query->have_posts() ) :
								$topics_query->the_post();
							?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<a href="<?php the_permalink(); ?>">
										<span class="thumbnail">
										<?php if( has_post_thumbnail() ): ?>
											<?php the_post_thumbnail( 'img500x500' ); ?>
										<?php else: ?>
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/noimg.gif" alt="noimg">
										<?php endif; ?>
										</span>
										<span class="date uk-text-small uk-padding-small-bottom uk-text-muted"><?php the_time('Y/m/d'); ?></span>
										<span class="title"><?php the_title(); ?></span>
									</a>
								</article>
							<?php
								endwhile;
								wp_reset_postdata();
							else:
							?>
							<p class="no-date"><?php _e( 'Sorry, no posts matched your criteria.', 'usces' ); ?></p>
							<?php
							endif;
							?>
							</div><!-- .slider -->
						</section><!-- .topics-area -->						
					
						
						<section class="pickup-area home-area">
							<!--<div class="section-head cf">
								<h2>サービス</h2>
							</div>--><!-- .section-head -->
								<div class="noslider cf">
										<div class="list post-461 post type-post status-publish format-standard has-post-thumbnail category-case">
											<a href="https://kyo-kaon.jp/news/5888/">
												<span class="thumbnail">
													<img src="https://kyo-kaon.jp/wp-content/uploads/2024/11/furusato.jpg" sizes="(max-width: 500px) 100vw, 500px">												
												</span>
												<h3 class="title">ふるさと納税の返礼品として喜芳工房の京念珠をお選びいただけます</h3>
											</a>
										</div>
										<div class="list post-461 post type-post status-publish format-standard has-post-thumbnail category-case">
											<a href="https://kyo-kaon.jp/service/workshop/">
												<span class="thumbnail">
													<img src="https://kyo-kaon.jp/common/img/service_workshop.jpg" sizes="(max-width: 500px) 100vw, 500px">
												</span>
												<h3 class="title">京念珠ブレスレット作り体験 受付中！</h3>
											</a>
										</div>
										<div class="list post-461 post type-post status-publish format-standard has-post-thumbnail category-case">
												<a href="https://kyo-kaon.jp/service/fix/">
													<span class="thumbnail">
														<img src="https://kyo-kaon.jp/common/img/service_repair.jpg" sizes="(max-width: 500px) 100vw, 500px">
													</span>
													<h3 class="title">京念珠(数珠)の修理 承ります</h3>
												</a>
											</div>
										</div><!-- .slider -->
						</section>
						
						<?php if ( is_active_sidebar( 'beldad1' ) ) : ?>
						<section id="beldad1" class="home-widget widget-area">
							<?php dynamic_sidebar( 'beldad1' ); ?>
						</section><!-- #beldad1 -->
						<?php endif; ?>


						<?php
						if ( wcct_get_options( 'display_cat' ) ):
						$term_ids = array();
						$target_terms = get_terms( 'category', array( 'child_of' => usces_get_cat_id( 'item' ) ) );
						if ( ! empty( $target_terms ) && ! is_wp_error( $target_terms ) ) {
							foreach ( $target_terms as $target_term ) {
								$img_thumb_url	= get_term_meta( $target_term->term_id, 'wcct-tag-thumbnail-url', true );
								$img_catimg_url	= get_term_meta( $target_term->term_id, 'wcct-tag-catimg-url', true );
								if ( ! empty( $img_thumb_url || $img_catimg_url )  )
								$term_ids[] = $target_term->term_id;
							}
						}
						if( $term_ids ):
						?>
						<section class="cat-area home-area">

							<div class="section-head cf">
								<h2><?php wcct_options( 'display_cat_title' ); ?></h2>
							</div><!-- .section-head -->

							<?php if( wcct_get_options( 'display_cat_slide' ) ): ?>
							<div class="slider cf">
							<?php else: ?>
							<div class="noslider cf">
							<?php endif; ?>
							<?php
							foreach( $term_ids as $term_id ):
								$term			= get_term_by( 'id', $term_id, 'category' );
								$img_thumb_url	= get_term_meta( $term_id, 'wcct-tag-thumbnail-url', true );
								$img_thumb_id	= get_term_meta( $term_id, 'wcct-tag-thumbnail-id', true );
								$img_catimg_url	= get_term_meta( $term_id, 'wcct-tag-catimg-url', true );
								$img_catimg_id	= get_term_meta( $term_id, 'wcct-tag-catimg-id', true );
								if ( ! empty( $img_thumb_id ) ) {
									$img_att    = wp_get_attachment_image_src( $img_thumb_id, 'large' );
									$img_url	= $img_att[0];
								} elseif ( ! empty( $img_catimg_id ) ) {
									$img_att    = wp_get_attachment_image_src( $img_catimg_id, 'thumbnail' );
									$img_url	= $img_att[0];
								}
							?>
								<div class="list">
									<a href="<?php echo get_category_link( $term_id ); ?>">
										<span class="thumbnail"><img src="<?php echo $img_url; ?>"></span>
										<span class="title"><?php esc_html_e( $term->name ); ?></span>
									</a>
								</div>
							<?php
							endforeach;
							?>
							</div><!-- .slider -->
						</section><!-- .cat-area -->

						<?php 
							endif;
						endif;
						?>

						<?php
						if( wcct_get_options( 'display_pickup' ) ):
							$pickup_num		= wcct_get_options( 'pickup_num' );
							$pickup_slug	= wcct_get_options( 'pickup_cat' );
							$pickup_cat     = get_term_by( 'slug', $pickup_slug, 'category' );
							$pickup_name	= $pickup_cat->name;
						?>
						<section class="pickup-area home-area">

							<div class="section-head cf">
								<h2><?php echo $pickup_name; ?></h2>
							</div><!-- .section-head -->

							<?php if( wcct_get_options( 'display_pickup_slide' ) ): ?>
							<div class="slider cf">
							<?php else: ?>
							<div class="noslider cf">
							<?php endif; ?>
							<?php
							$pickup_args = array(
								'posts_per_page' => $pickup_num,
								'category_name'  => $pickup_slug,
							); 
							$pickup_query = new WP_Query( $pickup_args );
							if ( $pickup_query->have_posts() ):
								while ( $pickup_query->have_posts() ):
								$pickup_query->the_post();
							?>
								<div id="post-<?php the_ID(); ?>" <?php post_class('list'); ?>>
									<a href="<?php the_permalink(); ?>">
										<span class="thumbnail">
										<?php if ( has_post_thumbnail() ): ?>
											<?php the_post_thumbnail( 'full' ); ?>
										<?php else: ?>
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/noimg.gif" alt="noimg">
										<?php endif; ?>
										</span>
										<span class="title"><?php the_title(); ?></span>
										<span class="excerpt"><?php the_excerpt(); ?></span>
									</a>
								</div>
							<?php
								endwhile;
								wp_reset_postdata();
							else:
							?>
							<p class="no-date"><?php _e( 'Sorry, no posts matched your criteria.', 'usces' ); ?></p>
							<?php
							endif;
							?>
							</div><!-- .slider -->

						</section><!-- .pickup-area -->
						<?php
						endif;
						?>

						<?php if ( is_active_sidebar( 'beldad2' ) ) : ?>
						<section id="beldad2" class="home-widget widget-area">
							<?php dynamic_sidebar( 'beldad2' ); ?>
						</section><!-- #beldad2 -->
						<?php endif; ?>

					</div><!-- .upper -->

					<div class="lower cf">

						<div class="products-box">

							<?php if ( is_active_sidebar( 'beldad3' ) ): ?>
							<section id="beldad3" class="home-widget widget-area">
								<?php dynamic_sidebar( 'beldad3' ); ?>
							</section><!-- #beldad3 -->
							<?php endif; ?>

							<section class="product-area home-area">

							<?php if ( have_posts() ) : ?>
								<?php
								$product_cat = get_query_var( 'cat' );
								?>
								<div class="section-head cf">
									<h2><?php echo get_cat_name( $product_cat ); ?></h2>
								</div><!-- .section-head -->

								<?php if ( wcct_get_options( 'display_h_item_slide' ) ): ?>
								<div class="product-list slider cf layout-grid">
								<?php else: ?>
								<div class="product-list cf layout-grid">
								<?php endif; ?>

									<?php while ( have_posts() ) : the_post(); usces_the_item(); ?>

									<div id="post-<?php the_ID(); ?>" <?php post_class('list'); ?>>
										<a href="<?php the_permalink(); ?>" rel="bookmark"> 
											<span class="thumbnail">
												<?php welcart_basic_campaign_message(); ?>
												<?php usces_the_itemImage( 0, 300, 300 ); ?>
												<?php if ( wcct_get_options( 'display_soldout' ) && !usces_have_zaiko_anyone() ): ?>
												<span class="itemsoldout">
														<span class="text">
															<?php _e( 'SOLD OUT', 'welcart_basic_beldad' ); ?>
															<?php if( wcct_get_options( 'display_inquiry' ) ): ?>
															<span class="sub_text"><?php wcct_options( 'display_inquiry_text' ); ?></span>
															<?php endif; ?>
														</span>
												</span>
												<?php endif; ?>
											</span>
											<span class="title"><?php usces_the_itemName(); ?></span>
											<?php wcct_produt_tag(); ?>
											<span class="price"><?php usces_the_firstPriceCr(); ?><?php usces_guid_tax(); ?></span>
										</a>
									</div>

									<?php endwhile; ?>

								</div><!-- .product-list -->

								<?php else: ?>

									<p class="no-date"><?php _e( 'No posts found.', 'usces' ); ?></p>

								<?php endif; ?>

							</section><!-- .product-area -->

							<?php if ( is_active_sidebar( 'beldad4' ) ): ?>
							<section id="beldad4" class="home-widget widget-area">
								<?php dynamic_sidebar( 'beldad4' ); ?>
							</section><!-- #beldad4 -->
							<?php endif; ?>

						</div><!-- .products-box -->

						<?php if ( wcct_get_options( 'display_top_sidebar' ) ): ?>
							<?php get_sidebar(); ?>
						<?php endif; ?>

					</div><!-- .lower -->
	
				<?php endif; ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>