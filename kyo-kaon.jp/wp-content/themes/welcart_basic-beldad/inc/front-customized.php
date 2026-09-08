<?php

/***********************************************************
* welcart_basic_filter_single_item_autodelivery
***********************************************************/

add_action( 'welcart_basic_filter_single_item_autodelivery', 'welcart_basic_child_filter_single_item_autodelivery' );
function welcart_basic_child_filter_single_item_autodelivery( $html ) {
	global $post, $usces;

	ob_start();
	if( 'regular' == $usces->getItemChargingType( $post->ID ) ) : 
		$regular_unit = get_post_meta( $post->ID, '_wcad_regular_unit', true );
		if( 'day' == $regular_unit ) {
			$regular_unit_name = __( 'Daily', 'autodelivery' );
		} elseif( 'month' == $regular_unit ) {
			$regular_unit_name = __( 'Monthly', 'autodelivery' );
		} else {
			$regular_unit_name = '';
		}
		$regular_interval = get_post_meta( $post->ID, '_wcad_regular_interval', true );
		$regular_frequency = get_post_meta( $post->ID, '_wcad_regular_frequency', true );

		if( usces_have_zaiko_anyone( $post->ID ) ) :
			usces_the_item();
?>
<div id="wc_regular">
	<p class="wcr_tlt"><?php _e( 'Regular Purchase', 'autodelivery' ); ?></p>
	<div class="ad-table-wrapper">
		<table class="autodelivery">
			<tr><th><?php echo apply_filters( 'wcad_filter_item_single_label_interval', __('Interval', 'autodelivery') ); ?></th><td><?php echo $regular_interval; ?><?php echo $regular_unit_name; ?></td></tr>
		<?php if ( 1 < (int)$regular_frequency ) : ?>
			<tr><th><?php echo apply_filters( 'wcad_filter_item_single_label_frequency', __('Frequency', 'autodelivery') ); ?></th><td><?php echo $regular_frequency; ?><?php _e( 'times', 'autodelivery' ); ?></td></tr>
		<?php else: ?>
			<tr><th><?php echo apply_filters( 'wcad_filter_item_single_label_frequency_free', __('Frequency', 'autodelivery') ); ?></th><td><?php echo apply_filters( 'wcad_filter_item_single_value_frequency_free', __( 'Free cycle', 'autodelivery' ) ); ?></td></tr>
		<?php endif; ?>
		</table>
	</div><!-- .ad-table-wrapper -->

	<form action="<?php echo USCES_CART_URL; ?>" method="post">

	<?php while( usces_have_skus() ) : ?>
		<div class="skuform">
			<?php if ( '' !== usces_the_itemSkuDisp( 'return' ) ) : ?>
			<div class="skuname"><?php usces_the_itemSkuDisp(); ?></div>
			<?php endif; ?>
			
			<div class="inner cf">
			
				<?php
					global $usces;
					$pictid = $usces->get_subpictid( usces_the_itemSku( 'return' ) );
					if($pictid) {
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

					<div class="field">
						<div class="field_price">
							<?php if ( usces_the_itemCprice( 'return' ) > 0 ) : ?>
								<span class="field_cprice"><?php usces_the_itemCpriceCr(); ?></span>
							<?php endif; ?>
							<?php wcad_the_itemPriceCr(); ?><?php usces_guid_tax(); ?>
						</div>

						<?php if ( !usces_have_zaiko() ) : ?>
							<?php if ( wcct_get_options( 'inquiry_link_button' ) ) : ?>
								<div class="contact-item"><a href="<?php echo wcct_get_inquiry_link_url(); ?>"><i class="fa fa-envelope"></i><?php _e( 'Inquiries regarding this item', 'welcart_basic_beldad' ); ?></a></div>
							<?php else: ?>
								<div class="itemsoldout"><?php echo apply_filters( 'usces_filters_single_sku_zaiko_message', __( 'At present we cannot deal with this product.', 'welcart_basic' ) ); ?></div>
							<?php endif; ?>
						<?php else : ?>
						<div class="c-box">
							<span class="quantity"><?php _e( 'Quantity', 'usces' ); ?><?php wcad_the_itemQuant(); ?><?php usces_the_itemSkuUnit(); ?></span>
							<span class="cart-button"><?php wcad_the_itemSkuButton( '&#xf07a;&nbsp;&nbsp;' . __( 'Apply for a regular purchase', 'autodelivery' ) , 0 ); ?></span>
						</div>
						<?php endif; ?>
						<div class="error_message"><?php usces_singleitem_error_message( $post->ID, usces_the_itemSku('return') ); ?></div>
					</div><!-- .field -->
					
				</div><!-- .right -->
			
			</div><!-- .inner -->
		</div><!-- .skuform -->
	<?php endwhile; ?>

	<?php echo apply_filters( 'wcad_single_item_multi_sku_after_field', NULL ); ?>
	<?php do_action( 'wcad_action_single_item_inform' ); ?>
	</form>
</div>
<?php
		endif;
	endif;

	$html = ob_get_contents();
	ob_end_clean();

	echo $html;
}


/*******************************************************************
* WCEX SKU SELECT + WCEX AUTO DELIVERY
*******************************************************************/

add_action( 'welcart_basic_filter_single_item_autodelivery_sku_select', 'wcct_wcex_sku_select_filter_single_item_autodelivery' );
function wcct_wcex_sku_select_filter_single_item_autodelivery(){
	global $post, $usces;

	ob_start();
	if ( 'regular' == $usces->getItemChargingType( $post->ID ) ) : 
		$regular_unit = get_post_meta( $post->ID, '_wcad_regular_unit', true );
		if( 'day' == $regular_unit ) {
			$regular_unit_name = __( 'Daily', 'autodelivery' );
		} elseif( 'month' == $regular_unit ) {
			$regular_unit_name = __( 'Monthly', 'autodelivery' );
		} else {
			$regular_unit_name = '';
		}

		$regular_interval = get_post_meta( $post->ID, '_wcad_regular_interval', true );
		$regular_frequency = get_post_meta( $post->ID, '_wcad_regular_frequency', true );

		if ( usces_have_zaiko_anyone( $post->ID ) ) : 
			usces_the_item();
?>
<div id="wc_regular">

	<p class="wcr_tlt"><?php _e( 'Regular Purchase', 'autodelivery' ) ?></p>

	<div class="ad-table-wrapper">
		<table class="autodelivery">
			<tr><th><?php echo apply_filters( 'wcad_filter_item_single_label_interval', __( 'Interval', 'autodelivery' ) ); ?></th><td><?php echo $regular_interval; ?><?php echo $regular_unit_name; ?></td></tr>
		<?php if ( 1 < (int)$regular_frequency ) : ?>
			<tr><th><?php echo apply_filters( 'wcad_filter_item_single_label_frequency', __( 'Frequency', 'autodelivery' ) ); ?></th><td><?php echo $regular_frequency; ?><?php _e( 'times', 'autodelivery' ); ?></td></tr>
		<?php else: ?>
			<tr><th><?php echo apply_filters( 'wcad_filter_item_single_label_frequency_free', __( 'Frequency', 'autodelivery' ) ); ?></th><td><?php echo apply_filters( 'wcad_filter_item_single_value_frequency_free', __( 'Free cycle', 'autodelivery' ) ); ?></td></tr>
		<?php endif; ?>
		</table>
	</div><!-- .ad-table-wrapper -->


	<form action="<?php echo USCES_CART_URL; ?>" method="post">
	
		<div class="skuform" id="skuform_regular">
			<div class="inner cf">

				<div class="right">
					<?php wcex_auto_delivery_sku_select_form(); ?>
					<?php if( usces_is_options() ) : ?>
					<dl class="item-option">
						<?php while ( usces_have_options() ) : ?>
						<dt><?php usces_the_itemOptName(); ?></dt>
						<dd><?php usces_the_itemOption( usces_getItemOptName(), '' ); ?></dd>
						<?php endwhile; ?>
					</dl>
					<?php endif; ?>
	
						<div class="field">
							<div class="field_price">
								<span class="wcss_loading"></span>
								<?php if( usces_the_itemCprice( 'return' ) > 0 ) : ?>
									<span class="field_cprice ss_cprice_regular"><?php usces_the_itemCpriceCr(); ?></span>
								<?php endif; ?>
								<span class="sell_price ss_price_regular"><?php wcad_the_itemPriceCr(); ?></span><?php usces_guid_tax(); ?>
							</div>

							<div id="checkout_box">
									<?php if( wcct_get_options( 'inquiry_link_button' ) ) : ?>
										<div class="contact-item inquiry"><a href="<?php echo wcct_get_inquiry_link_url(); ?>"><i class="fa fa-envelope"></i><?php _e( 'Inquiries regarding this item', 'welcart_basic_beldad' ); ?></a></div>
									<?php else: ?>
										<div class="itemsoldout"><?php echo apply_filters( 'usces_filters_single_sku_zaiko_message', __( 'At present we cannot deal with this product.', 'welcart_basic' ) ); ?></div>
									<?php endif; ?>

									<div class="c-box">
										<span class="quantity"><?php _e( 'Quantity', 'usces' ); ?><?php wcad_the_itemQuant(); ?><?php usces_the_itemSkuUnit(); ?></span>
										<span class="cart-button"><?php wcad_the_itemSkuButton( '&#xf07a;&nbsp;&nbsp;'.__( 'Apply for a regular purchase', 'autodelivery' ), 0 ); ?></span>
									</div>
							</div><!-- #checkout_box -->

							<div class="error_message"><?php usces_singleitem_error_message( $post->ID, usces_the_itemSku( 'return' ) ); ?></div>
							
						</div><!-- .field -->
				
				</div><!-- .right -->
		
			</div><!-- .inner -->
		</div><!-- .skuform -->

	<?php echo apply_filters( 'wcad_single_item_multi_sku_after_field', NULL ); ?>
	<?php do_action( 'wcad_action_single_item_inform' ); ?>
	</form>

</div>
<?php
		endif;
	endif;

	$html = ob_get_contents();
	ob_end_clean();

	echo $html;
}


/***********************************************************
* Review
***********************************************************/

if ( !function_exists( 'wc_review' ) ) :
function wc_review( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-review-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">

		<?php if ( $comment->comment_approved == '0' ) : ?>

			<em><?php _e( 'Thank you for the review. Please wait for a while until it is published.', 'welcart_basic_beldad' ); ?></em>
			<br />

		<?php else: ?>

		<div class="review-author vcard">
			<?php printf( __( '%s <span class="says">says:</span>', 'welcart_basic_beldad' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .review-author .vcard -->
			
		<div class="review-meta reviewmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'welcart_basic_beldad' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'welcart_basic_beldad' ), ' ' );
			?>
		</div><!-- .review-meta .reviewmetadata -->

		<div class="review-body"><?php comment_text(); ?></div>
		
		<?php endif; ?>

	</div><!-- #review-##  -->

	<?php
			break;
	endswitch;
}
endif;


/************************************************************
* Redirect review
*************************************************************/

add_action( 'usces_action_login_page_inform', 'wcct_login_inform_referer' );
function wcct_login_inform_referer() {
	if ( isset( $_REQUEST['login_ref'] ) && !empty( $_REQUEST['login_ref'] ) ) {
		echo '<input type="hidden" name="login_ref" value="' . esc_url( urldecode( $_REQUEST['login_ref'] ) ) . '" >'."\n";
	}
}
add_action( 'usces_action_after_login', 'wcct_after_login_redirect' );
function wcct_after_login_redirect() {
	if ( isset( $_REQUEST['login_ref'] ) && !empty( $_REQUEST['login_ref'] ) ) {
		wp_redirect( esc_url( $_REQUEST['login_ref'].'#wc_reviews' ) );
		exit;
	}
}


/***********************************************************
* Product Tag
***********************************************************/

function wcct_get_produt_tag( $post_id = null ) {
	global $post;
	
	if ( !wcct_get_options( 'display_produt_tag' ) )
		return;
	
	$flag = array(); 
	$html = '';
	
	if ( NULL == $post_id )
		$post_id = $post->ID;
	
	$cats = get_the_category( $post_id );
	foreach( $cats as $cat ) {
		switch ( $cat->slug ) {
			case 'itemnew':
				$flag['new'] = 1;
				break;
			case 'itemreco':
				$flag['reco'] = 1;
				break;
			case 'free-shipping':
				$flag['free'] = 1;
				break;
		}
	}

	$html .= '<ul class="cf opt-tag">' . "\n";
		if( isset( $flag['new'] ) ) $html .= '<li class="new">'. __( 'New Arrivals', 'welcart_basic_beldad' ) .'</li>' . "\n";
		if( isset( $flag['reco'] ) ) $html .= '<li class="recommend">'. __( 'Recommend', 'welcart_basic_beldad' ) .'</li>' . "\n";
	    if( isset( $flag['free'] ) ) $html .= '<li class="free-shipping">送料無料</li>' . "\n";
		if( usces_have_fewstock( $post_id ) ) $html .= '<li class="stock">'. __( 'Few Stock', 'welcart_basic_beldad' ) .'</li>' . "\n";
		if( wcct_has_campaign() ) $html .= '<li class="sale">'. __( 'Sale', 'welcart_basic_beldad' ) .'</li>' . "\n";	
	$html .= '</ul>' . "\n";

	return $html;
}
function wcct_produt_tag( $post_id = null ) {
	echo wcct_get_produt_tag( $post_id );
}


/***********************************************************
* Product low in stock
***********************************************************/

if( !function_exists( 'usces_have_fewstock' ) ) {
	function usces_have_fewstock( $post_id = NULL ) {
		global $post, $usces;
		if( NULL == $post_id ) $post_id = $post->ID;

		$skus = $usces->get_skus($post_id);
		$res = false;
		foreach ( $skus as $sku ) {
			if ( 1 === (int)$sku['stock'] ) {
				$res = true;
				break;
			}
		}
		return $res;
	}
}


/***********************************************************
* Product Campaign
***********************************************************/

function wcct_has_campaign( $post_id = NULL ) {
	global $post, $usces;
	if ( NULL == $post_id ) $post_id = $post->ID;

	if ( 'Promotionsale' == $usces->options[ 'display_mode' ] && in_category( (int)$usces->options[ 'campaign_category' ], $post_id ) ) {
		$res = true;
	} else {
		$res = false;
	}

	return $res;
}


/************************************************************
* Contact Form 7
*************************************************************/

function wcct_get_inquiry_link_url() {
	if ( defined('WPCF7_VERSION') ) {
		global $post;

		$item_id = $post->ID;
		$sku_code = urlencode( usces_the_itemSku( 'return' ) );
		$url = add_query_arg( array( 'from_item' => $item_id, 'from_sku' => $sku_code ), get_permalink( wcct_get_options( 'inquiry_link' ) ) );
	} else {
		$url = get_permalink( wcct_get_options( 'inquiry_link' ) );
	}

	return $url;
}


if ( defined('WPCF7_VERSION') ) {
	add_filter('wpcf7_mail_components', 'wcct_mail_components', 10, 3);
	function wcct_mail_components($components, $current_form, $mail_object){
		global $usces;

		$post_id = isset($_POST['from_item']) ? $_POST['from_item']: '';
		if( strlen($post_id) > 0 ){
			$itemname = $usces->getItemName($post_id);
			$skucode = isset($_POST['from_sku']) ? $_POST['from_sku']: '';
			$skuname = ( strlen($skucode) > 0 ) ? $usces->getItemSkuDisp($post_id, $skucode): '';

			$body = $components['body'];

			if( strlen($itemname) > 0 && strlen($skuname) > 0 ){
				$components['body'] = __( 'item name', 'usces' ) . '：'.$itemname. ' '. $skuname. "\n". $body;
			}elseif( strlen($itemname) > 0 ){
				$components['body'] = __( 'item name', 'usces' ) . '：'.$itemname. "\n". $body;
			}
		}
		return $components;
	}
}


/************************************************************
* Continue shopping button
*************************************************************/

add_filter( 'usces_filter_cart_prebutton', 'wcct_cart_prebutton' );
function wcct_cart_prebutton( $link ) {
	if( wcct_get_options( 'continue_shopping_button' ) ) {
		$url = wcct_get_options( 'continue_shopping_url' );
		if( empty( $url ) ) $url = esc_url( home_url( '/' ) );
		
		$link = ' onclick="location.href=\'' . $url . '\'"';
	}

	return $link;
}


/************************************************************
* WCEX Widget cart
*************************************************************/

add_filter( 'widgetcart_get_cart_row', 'wcct_widgetcart_total_quant', 10, 2 );
function wcct_widgetcart_total_quant( $html, $cart ) {
	global $usces;
	$quant = $usces->get_total_quantity( $cart );

	$html .='
	<script type="text/javascript">
		jQuery("#widgetcart-total-quant").html("' . $quant . '");
	</script>';

	return $html;
}


/************************************************************
* usces_assistance_item
*************************************************************/

add_filter( 'usces_filter_assistance_item_list', 'wcct_assistance_item_list', 10, 2 );
function wcct_assistance_item_list( $list, $post ) {
 	global $usces;
	
	$post_id = $post->ID;
	
	$str = '<li class="list">';
		$str .= '<div class="itemimg">';
		$str .= '<a href="'. get_permalink() . '" rel="bookmark" title="' . wp_filter_nohtml_kses(get_the_title()) . '">' . usces_the_itemImage( 0, 300, 300, $post, 'return' ) . '';
			if(! usces_have_zaiko_anyone( $post_id ) ) {
				$skus = $usces->get_skus( $post_id );
				$num = $skus[0]['stock'];
				$str .= '<span class="itemsoldout"><span class="text">' . __('SOLD OUT', 'welcart_basic_beldad') . "\n";
					if ( wcct_get_options( 'display_inquiry' ) ) {
						$str .= '<span class="sub_text">' . wcct_get_options( 'display_inquiry_text' ) . '</span>' . "\n";
					};
				$str .= '</span>' . "\n";
				$str .= '</span>' . "\n";
			};
		$str .= '</a></div>';
		$str .= '<div class="itemname">';
		$str .= '<a href="'. get_permalink() . '" rel="bookmark" title="' . wp_filter_nohtml_kses(get_the_title()) . '">' . usces_the_itemName( 'return' ) . '</a>';
		$str .= '</div>';
		$str .= wcct_get_produt_tag() . "\n";
		if ( usces_is_skus() ) {
			$str .= '<div class="itemprice">';
			$str .= usces_the_firstPriceCr( 'return' ) . usces_guid_tax( 'return' );
			$str .= '</div>';
		}
	$str .= '</li>';

	return $str;
}


/***********************************************************
* usces_filter_cart_thumbnail
***********************************************************/

add_filter('usces_filter_cart_thumbnail', 'wcct_filter_cart_thumbnail',10,5);
function wcct_filter_cart_thumbnail($cart_thumbnail,$post_id, $pictid,$i,$cart_row) {
	global  $usces;
	
	$cart = $usces->cart->get_cart();
	$sku_code = esc_attr(urldecode($cart_row['sku']));
	$itemCode = $usces->getItemCode($post_id);
	
	$subpictid = (int)$usces->get_subpictid($sku_code);
	if($subpictid){
		$pictid = (int)$usces->get_subpictid($sku_code);
	}else {
		$pictid = (int)$usces->get_mainpictid($itemCode);
	}
	$cart_thumbnail = '<a href="' . get_permalink($post_id) . '">' . wp_get_attachment_image( $pictid, array(60, 60), true ) . '</a>';
	
	return $cart_thumbnail;

}
