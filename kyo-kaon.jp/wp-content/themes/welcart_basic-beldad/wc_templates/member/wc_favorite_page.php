<?php
/**
 * Member's favorites list page
 *
 * @package WCEX Favorites
 * @since 1.0.0
 */

global $usces;

$member              = $usces->get_member();
$favorites_count     = wcfv_get_favorites_count( $member['ID'] );
$favorite_option     = wcfv_get_option();
$page_title          = sprintf( __( '%s List', 'favorite' ), $favorite_option['label_name'] );
$page_title          = apply_filters( 'usces_theme_filter_page_title', $page_title, $favorite_option['label_name'] );
$no_favorite_message = sprintf( __( 'There are no %s items.', 'favorite' ), $favorite_option['label_name'] );

get_header();
?>
<div id="primary" class="site-content">
	<div id="content" class="member-page" role="main">
	<?php
	if ( have_posts() ) :
		usces_remove_filter();
		?>
		<div class="post" id="wc_member_favorite_page">

			<div class="page-header">
				<h1 class="member_page_title"><?php echo esc_html( $page_title ); ?></h1>
			</div>

			<div id="memberinfo">

				<div class="error_message"></div>

				<?php if ( 1 > $favorites_count ) : ?>

					<p><?php echo esc_html( $no_favorite_message ); ?></p>

				<?php else : ?>
					<form id="member-favorite-page">
						<?php
						$favorites = wcfv_get_favorites( $member['ID'] );
						if ( 1 === $favorites_count ) {
							$args = array(
								'p' => $favorites[0],
							);
						} else {
							$args = array(
								'post__in'            => $favorites,
								'posts_per_page'      => -1,
								'orderby'             => 'post__in',
								'ignore_sticky_posts' => 1,
							);
						}
						$fv = new WP_Query( $args );
						if ( $fv->have_posts() ) :
							?>
							<div id="member-favorite" class="member-favorite section-content">
								<?php
								while ( $fv->have_posts() ) :
									$fv->the_post();
									usces_the_item();
									$post_id = get_the_ID();
									?>
									<article id="post-<?php the_ID(); ?>" <?php post_class( 'list' ); ?>>
										<a href="<?php the_permalink(); ?>" rel="bookmark">
											<span class="thumbnail">
												<?php welcart_basic_campaign_message(); ?>
												<?php usces_the_itemImage( 0, 300, 300 ); ?>
												<?php do_action( 'usces_theme_favorite_icon' ); ?>
												<?php if ( wcct_get_options( 'display_soldout' ) && ! usces_have_zaiko_anyone() ) : ?>
													<span class="itemsoldout">
														<span class="text">
															<?php welcart_basic_soldout_label( get_the_ID() ); ?>
															<?php if ( wcct_get_options( 'display_inquiry' ) ) : ?>
																<span class="sub_text"><?php wcct_options( 'display_inquiry_text' ); ?></span>
															<?php endif; ?>
														</span>
													</span>
												<?php endif; ?>
											</span>
											<span class="title"><?php usces_the_itemName(); ?></span>
											<?php wcct_produt_tag(); ?>
											<span class="price"><?php usces_the_firstPriceCr(); ?><?php usces_guid_tax(); ?></span>
											<?php usces_crform_the_itemPriceCr_taxincluded(); ?>
											<?php remove_filter( 'the_excerpt', array( $usces, 'filter_cartContent' ), 20 ); ?>
										</a>
									</article>
									<?php
								endwhile;
								wp_reset_postdata();
								?>
							</div>
						<?php endif; ?>
					</form>
				<?php endif; ?>

				<div class="send">
					<a class="back_to_mypage" href="<?php echo USCES_MEMBER_URL; ?>"><?php esc_html_e( 'Back to the member page.', 'usces' ); ?></a>
				</div>
			</div>

		</div>

	<?php else : ?>

		<p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'usces' ); ?></p>

	<?php endif; ?>
	</div>
</div>

<?php
get_footer();
