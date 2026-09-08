<?php
/**
 * Template Functions
 *
 * @package Welcart
 * @subpackage Welcart Beldad
 */

/**
 * Soldout label
 *
 * @param int    $post_id Post ID.
 * @param string $out Return value or echo.
 * @return string|void
 */
function welcart_basic_soldout_label( $post_id, $out = '' ) {
	global $usces;

	$stock_status = __( 'SOLD OUT', 'welcart_basic_beldad' );
	$skus         = wel_get_skus( $post_id );
	if ( 1 === count( (array) $skus ) ) {
		$stock = $skus[0]['stock'];
		if ( 2 !== (int) $stock ) {
			$stock_status = $usces->zaiko_status[ $stock ];
		}
	}
	$stock_status = apply_filters( 'welcart_basic_filter_soldout_label', $stock_status, $post_id, $skus );
	if ( 'return' === $out ) {
		return $stock_status;
	} else {
		echo esc_html( $stock_status );
	}
}

/**
 * Get Attachment ID from URL
 *
 * @param string $url URL.
 * @return int
 */
function welcart_basic_get_attachment_id_from_url( $url ) {
	global $wpdb;

	$id = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid = %s", $url ) );
	return $id;
}
