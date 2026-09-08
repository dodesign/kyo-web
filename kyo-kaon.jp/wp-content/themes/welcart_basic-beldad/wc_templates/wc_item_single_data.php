<?php
/**
 * @package Welcart
 * @subpackage Welcart_Basic
 */

get_header();
?>
<div id="primary" class="site-content">
	<div id="content" role="main">

	<?php if ( have_posts() ) : the_post(); ?>

		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

			<div class="item-header">
				<h1 class="item_page_title"><?php the_title(); ?></h1>
			</div><!-- .item-header -->

			<?php usces_remove_filter(); ?>
			<?php usces_the_item(); ?>
			<?php usces_have_skus(); ?>

			<div class="itempage-wrap">

				<div id="itempage" class="date cf">

					<div id="img-box">

						<?php $imageid = usces_get_itemSubImageNums(); ?>

						<div id="itemimg-main" class="slider slider-for itemimg">
							<div><a href="<?php usces_the_itemImageURL( 0 ); ?>" <?php echo apply_filters( 'usces_itemimg_anchor_rel', NULL ); ?>><?php usces_the_itemImage( 0, 600, 600, $post ); ?></a></div>
							<?php foreach ( $imageid as $id ) : ?>
							<div><a href="<?php usces_the_itemImageURL( $id ); ?>" <?php echo apply_filters( 'usces_itemimg_anchor_rel', NULL ); ?>><?php usces_the_itemImage( $id, 600, 600, $post ); ?></a></div>
							<?php endforeach; ?>
						</div><!-- #itemimg-main -->

						<?php if ( !empty( $imageid ) ) : ?>
						<div id="itemimg-sub" class="slider slider-nav itemsubimg">
							<div><?php usces_the_itemImage( 0, 90, 90, $post ); ?></div>
							<?php foreach ( $imageid as $id ) : ?>
							<div><?php usces_the_itemImage( $id, 90, 90, $post ); ?></div>
							<?php endforeach; ?>
						</div><!-- #itemimg-sub -->
						<?php endif; ?>

					</div><!-- #img-box -->


					<div class="detail-box">

						<div class="upper cf">
							<?php wcct_produt_tag(); ?>
							<?php welcart_basic_campaign_message(); ?>
							<div class="itemcode"><?php _e( 'Product Number:', 'welcart_basic_beldad'); ?><?php usces_the_itemCode(); ?></div>
						</div><!-- .upper -->

						<h2 class="item-name"><?php usces_the_itemName(); ?></h2>

					</div><!-- .detail-box -->

					<div class="item-info">

						<?php if ( 'continue' == dlseller_get_charging_type( $post->ID ) ) : ?>
						<!-- Charging Type Continue shipped -->
						<table class="dlseller">
							<tr><th><?php _e( 'First Withdrawal Date', 'dlseller' ); ?></th><td><?php echo dlseller_first_charging( $post->ID ); ?></td></tr>
						<?php if ( 0 < (int)$usces_item['dlseller_interval'] ) : ?>
							<tr><th><?php _e( 'Contract Period', 'dlseller' ); ?></th><td><?php echo $usces_item['dlseller_interval']; ?><?php _e( 'month (Automatic Updates)', 'welcart_basic' ); ?></td></tr>
						<?php endif; ?>
						</table>
						<?php endif; ?>

						<table class="dlseller">
							<tr><th><?php _e( 'dlValidity(days)', 'dlseller' ); ?></th><td><?php esc_html_e( usces_dlseller_validity( $post ) ); ?></td></tr>
							<tr><th><?php _e( 'File Name', 'dlseller' ); ?></th><td><?php esc_html_e( usces_dlseller_filename( $post ) ); ?></td></tr>
							<tr><th><?php _e( 'Release Date', 'dlseller' ); ?></th><td><?php esc_html_e(usces_get_itemMeta( '_dlseller_date', $post->ID, 'return' ) ); ?></td></tr>
							<tr><th><?php _e( 'Version', 'dlseller' ); ?></th><td><?php esc_html_e(usces_get_itemMeta( '_dlseller_version', $post->ID, 'return' ) ); ?></td></tr>
							<tr><th><?php _e( 'Author', 'dlseller' ); ?></th><td><?php esc_html_e(usces_get_itemMeta( '_dlseller_author', $post->ID, 'return' ) ); ?></td></tr>
						</table>

						<?php if ( $item_custom = usces_get_item_custom( $post->ID, 'table', 'return' ) ) : ?>
							<?php echo $item_custom; ?>
						<?php endif; ?>

						<form action="<?php echo USCES_CART_URL; ?>" method="post">

							<div class="skuform">
								<?php if ( '' !== usces_the_itemSkuDisp( 'return' ) ) : ?>
								<div class="skuname"><?php usces_the_itemSkuDisp(); ?></div>
								<?php endif; ?>

								<div class="inner cf">
									<?php
									global $usces;
									$pictid = $usces->get_subpictid( usces_the_itemSku( 'return' ) );
									if ( $pictid ) {
									?>
									<div class="left">
										<div class="skuimg">
										<?php echo wp_get_attachment_image( $pictid, array(300, 300), true ); ?>
										</div>
									</div><!-- left -->
									<?php
									}
									?>

									<div class="right">

										<?php usces_the_itemGpExp(); ?>
										<?php if ( usces_is_options() ) : ?>
										<dl class="item-option">
											<?php while ( usces_have_options() ) : ?>
											<dt><?php usces_the_itemOptName(); ?></dt>
											<dd><?php usces_the_itemOption( usces_getItemOptName(), '' ); ?></dd>
											<?php endwhile; ?>
										</dl>
										<?php endif; ?>

										<?php if( wcct_get_options( 'display_zaiko_text' ) ) :?>
											<div class="zaikostatus"><?php _e('stock status', 'usces'); ?> : <?php usces_the_itemZaikoStatus(); ?></div>
										<?php endif; ?>
										
										<div class="field cf">
											<?php if ( 'continue' == dlseller_get_charging_type( $post->ID ) ) : ?>
											<div class="frequency"><span class="field_frequency"><?php dlseller_frequency_name( $post->ID, 'amount' ); ?></span></div>
											<?php endif; ?>

											<div class="field_price">
											<?php if ( usces_the_itemCprice( 'return' ) > 0 ) : ?>
												<span class="field_cprice"><?php usces_the_itemCpriceCr(); ?></span>
											<?php endif; ?>
												<?php usces_the_itemPriceCr(); ?><?php usces_guid_tax(); ?>
											</div>
										</div><!-- .field -->										

										<?php if ( !usces_have_zaiko() ) : ?>
											<?php if (wcct_get_options( 'inquiry_link_button' ) ):?>
												<div class="contact-item"><a href="<?php echo wcct_get_inquiry_link_url(); ?>"><i class="fa fa-envelope"></i><?php wcct_options( 'inquiry_text' ); ?></a></div>
											<?php else: ?>
												<div class="itemsoldout"><?php wcct_options( 'display_soldout_text' ); ?></div>
											<?php endif; ?>
										<?php else : ?>
										<div class="c-box">
											<span class="cart-button"><?php usces_the_itemSkuButton( wcct_get_options( 'cart_button' ), 0 ); ?></span>
										</div>
										<?php endif; ?>
										<div class="error_message"><?php usces_singleitem_error_message( $post->ID, usces_the_itemSku( 'return' ) ); ?></div>

									</div><!-- .right -->

								</div><!-- .inner -->
							</div><!-- .skuform -->

							<?php do_action( 'usces_action_single_item_inform' ); ?>
						</form>
						<?php do_action( 'usces_action_single_item_outform' ); ?>

						<div class="item-description">
							<?php the_content(); ?>
						</div>

					</div><!-- .item-info -->

				</div><!-- #itempage -->

				<?php if ( wcct_get_options( 'review' ) ) comments_template( '/wc_templates/wc_review.php', false ); ?>		
				<?php usces_assistance_item( $post->ID, __('An article concerned', 'usces') ); ?>

			</div><!-- .itempage-wrap -->

		</article>

	<?php else: ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.', 'usces' ); ?></p>
	<?php endif; ?>

	</div><!-- end of content -->
</div><!-- end of primary -->

<?php get_footer(); ?>
