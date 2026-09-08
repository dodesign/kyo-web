<?php
/**
 * @package Welcart
 * @subpackage Welcart_Basic
 */

//$division = welcart_basic_get_item_division( $post->ID );
//switch( $division ) :
//case 'data':
//	get_template_part( 'wc_templates/wc_item_single_data', get_post_format() );
//	break;
//case 'service':
//	get_template_part( 'wc_templates/wc_item_single_service', get_post_format() );
//	break;
//default://shipped

get_header();

global $usces;
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

				<div id="itempage" class="cf">
					
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
							<div class="itemcode"><?php _e( 'Product Number:', 'welcart_basic_beldad' ); ?><?php usces_the_itemCode(); ?></div>
						</div><!-- .upper -->
						
						<h2 class="item-name"><?php usces_the_itemName(); ?></h2>

					</div><!-- .detail-box -->

					<div class="item-info">

						<?php if ( 'continue' == welcart_basic_get_item_chargingtype( $post->ID ) ) : ?>
						<!-- Charging Type Continue shipped -->
						<table class="dlseller">
							<tr><th><?php _e( 'First Withdrawal Date', 'dlseller' ); ?></th><td><?php echo dlseller_first_charging( $post->ID ); ?></td></tr>
							<?php if ( 0 < (int)$usces_item['dlseller_interval'] ) : ?>
							<tr><th><?php _e( 'Contract Period', 'dlseller' ); ?></th><td><?php echo $usces_item['dlseller_interval']; ?><?php _e( 'month (Automatic Updates)', 'welcart_basic' ); ?></td></tr>
							<?php endif; ?>
						</table>
						<?php endif; ?>
						
						<?php if( $item_custom = usces_get_item_custom( $post->ID, 'table', 'return' ) ) : ?>
							<?php echo $item_custom; ?>
						<?php endif; ?>
						
						<form action="<?php echo USCES_CART_URL; ?>" method="post">

							<div id="skuform" class="skuform">

								<div class="inner cf">

									<div class="right">

										<?php wcex_sku_select_form(); ?>
										
										<?php if ( usces_is_options() ) : ?>
										<dl class="item-option">
											<?php while ( usces_have_options() ) : ?>
											<dt><?php usces_the_itemOptName(); ?></dt>
											<dd><?php usces_the_itemOption( usces_getItemOptName(), '' ); ?></dd>
											<?php endwhile; ?>
										</dl>
										<?php endif; ?>

										<?php if( wcct_get_options( 'display_zaiko_text' ) ) :?>
											<div class="zaikostatus"><?php _e('stock status', 'usces'); ?> : <span class="ss_stockstatus"><?php usces_the_itemZaikoStatus(); ?></span></div>
										<?php endif; ?>
										
										<div class="field cf">

											<?php if ( 'continue' == welcart_basic_get_item_chargingtype( $post->ID ) ) : ?>
											<div class="frequency"><span class="field_frequency"><?php dlseller_frequency_name( $post->ID, 'amount' ); ?></span></div>
											<?php endif; ?>

											<div class="field_price">
												<span class="wcss_loading"></span>
											<?php if ( usces_the_itemCprice( 'return' ) > 0 ) : ?>
												<span class="field_cprice"><span class="ss_cprice"><?php usces_the_itemCpriceCr(); ?></span></span>
											<?php endif; ?>
												<span class="sell_price ss_price"><?php usces_the_itemPriceCr(); ?></span><?php usces_guid_tax(); ?>
											</div>

										</div><!-- .field -->

										<div id="checkout_box">
											<?php if ( wcct_get_options( 'inquiry_link_button' ) ) : ?>
												<div class="contact-item inquiry"><a href="<?php echo wcct_get_inquiry_link_url(); ?>"><i class="fa fa-envelope"></i><?php wcct_options( 'inquiry_text' ); ?></a></div>
											<?php else: ?>
												<div class="itemsoldout"><?php wcct_options( 'display_soldout_text' ); ?></div>
											<?php endif; ?>
											<div class="c-box">
												<span class="quantity"><?php _e('Quantity', 'usces'); ?><?php usces_the_itemQuant(); ?><?php usces_the_itemSkuUnit(); ?></span>
												<span class="cart-button"><?php usces_the_itemSkuButton( wcct_get_options( 'cart_button' ), 0 ); ?></span>
											</div>
										</div>
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
				<?php usces_assistance_item( $post->ID, __( 'An article concerned', 'usces' ) ); ?>
				
			</div><!-- .itempage-wrap -->
			
		</article>
		
	<?php else: ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.', 'usces' ); ?></p>
	<?php endif; ?>

	</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
