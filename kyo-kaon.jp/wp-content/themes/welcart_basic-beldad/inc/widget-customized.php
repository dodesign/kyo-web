<?php


/***********************************************************
* welcart_basic_filter_item_post
***********************************************************/

function wcct_filter_item_list( $html, $term_id, $number ) {
	$html = '';

	$item_args = array(
		'cat'            => $term_id,
		'posts_per_page' => $number,
	); 
	$item_query = new WP_Query( $item_args );
	if ( $item_query->have_posts() ) {
		if ( wcct_get_options( 'display_widget_slide' ) ) {
			$html .= '<div class="item-list cf slider">' . "\n";
		} else {
			$html .= '<div class="item-list cf">' . "\n";
		}
		while ( $item_query->have_posts() ) {
			$item_query->the_post();
			usces_the_item();

			$html .= '<div id="post-' . get_the_ID() . '" class="list">' . "\n";
				$html .= '<a href="' . get_permalink( get_the_ID() ) .'">' . "\n";
					$html .= '<div class="itemimg">' . "\n";
						$html .= get_welcart_basic_campaign_message() . "\n";
						$html .= usces_the_itemImage( 0, 300, 300, '', 'return' ) . "\n";
						if ( wcct_get_options( 'display_soldout' ) && !usces_have_zaiko_anyone() ) {
							$html .= '<div class="itemsoldout">' . "\n";
								$html .= '<div class="text">' . "\n";
									$html .= __( 'SOLD OUT', 'welcart_basic_beldad' ) . "\n";
									if ( wcct_get_options( 'display_inquiry' ) ) {
										$html .= '<span class="sub_text">' . wcct_get_options( 'display_inquiry_text' ) . '</span>' . "\n";
									}
								$html .= '</div>' . "\n";
							$html .= '</div>' . "\n";
						}
					$html .= '</div>' . "\n";
					$html .= '<div class="item-info-wrap"><div class="inner">' . "\n";
						$html .= '<div class="itemname">' . usces_the_itemName( 'return' ) . '</div>' . "\n";
						$html .= wcct_get_produt_tag() . "\n";
						$html .= '<div class="itemprice">' . usces_the_firstPriceCr( 'return' ) . usces_guid_tax( 'return' ) . '</div>' . "\n";
					$html .= '</div></div>' . "\n";
				$html .= '</a>' . "\n";
			$html .= '</div>';
		}
		wp_reset_postdata();
		$html .= '</div>' . "\n";
	}

	return $html;
}
add_filter( 'welcart_basic_filter_item_list', 'wcct_filter_item_list', 10, 3 );



/***********************************************************
* usces_filter_featured_widget
***********************************************************/

add_filter( 'usces_filter_featured_widget', 'wcct_filter_featured_widget', 10, 4 );
function wcct_filter_featured_widget( $list, $post, $list_index, $instance ) {
	global $usces;
	$post_id = $post->ID;
	$post = get_post( $post_id );

	$list  = '<div class="inner">'."\n";
		$list .= '<div class="thumimg">'."\n";
		$list .= get_welcart_basic_campaign_message( $post_id ) . "\n";
		$list .= '<a href="'.get_permalink($post_id).'">' . usces_the_itemImage( 0, 300, 300, $post, 'return' ) . "\n";
			if ( wcct_get_options( 'display_soldout' ) && ! usces_have_zaiko_anyone( $post_id ) ) {
				$skus = $usces->get_skus( $post_id );
				$num = $skus[0]['stock'];
				$list .= '<div class="itemsoldout"><div class="text">' . __( 'SOLD OUT', 'welcart_basic_beldad' ) . "\n";
					if( wcct_get_options( 'display_inquiry' ) ) {
						$list .= '<span class="sub_text">' . wcct_get_options( 'display_inquiry_text' ).'</span>' . "\n";
					};
				$list .= '</div>'."\n";
				$list .= '</div>'."\n";
			};
		$list .= '</a></div>'."\n";
		$list .= '<div class="thumtitle"><a href="'.get_permalink($post_id).'">' . $usces->getItemName($post_id).'</a></div>' . "\n";
		$list .= wcct_get_produt_tag( $post_id ) . "\n";
		$list .= '<div class="itemprice">' . usces_the_firstPriceCr( 'return', $post ) . usces_guid_tax('return') . '</div>' . "\n";
	$list .= '</div>' . "\n";

	return $list;

}


/***********************************************************
* usces_filter_bestseller
***********************************************************/

add_action( 'init' , 'ot_init' );
function ot_init() {
	remove_filter( 'usces_filter_bestseller', 'welcart_basic_filter_bestseller' );
}

function wcct_filter_bestseller( $list, $post_id, $i ) {
	global $usces;
	$post = get_post( $post_id );

	$list  = '<li class="bestseller-item rank' . ( $i + 1 ) . '">'."\n";
		$list .= '<div class="inner">'. "\n";
			
			$list .= '<div class="rankimg"></div>'."\n";
			$list .= '<div class="itemimg">'."\n";
			$list .= '<a href="' . get_permalink($post_id) . '">' . usces_the_itemImage( 0, 300, 300, $post, 'return' ) . "\n";
			if(! usces_have_zaiko_anyone( $post_id ) ) {
				$skus = $usces->get_skus( $post_id );
				$num = $skus[0]['stock'];
				$list .= '<div class="itemsoldout"><div class="text">' . __('SOLD OUT', 'welcart_basic_beldad') . "\n";
					if ( wcct_get_options( 'display_inquiry' ) ) {
						$list .= '<span class="sub_text">' . wcct_get_options( 'display_inquiry_text' ) . '</span>' . "\n";
					};
				$list .= '</div>' . "\n";
				$list .= '</div>' . "\n";
			};
			$list .= '</a></div>' . "\n";
			$list .= '<div class="itemname"><a href="' . get_permalink($post_id) . '">' . $usces->getItemName($post_id) . '</a></div>' . "\n";
			$list .= wcct_get_produt_tag( $post_id ) . "\n";
			$list .= '<div class="itemprice">' . usces_the_firstPriceCr( 'return', $post ) . usces_guid_tax( 'return' ) . '</div>' . "\n";
	$list .= '</li>' . "\n";
	return $list;
}
add_filter( 'usces_filter_bestseller', 'wcct_filter_bestseller', 10, 3 );

