<?php
/**
 * Plugin Name: kaon fatal logger (一時ファイル)
 * Description: PHPの致命的エラーだけを wp-content/kaon-fatal-8f3a.log に記録します。原因特定後に削除してください。訪問者には何も表示しません。
 * Version: 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

register_shutdown_function(
	function () {
		$e = error_get_last();
		if ( ! $e ) {
			return;
		}

		$fatal_types = array(
			E_ERROR,
			E_PARSE,
			E_CORE_ERROR,
			E_CORE_WARNING,
			E_COMPILE_ERROR,
			E_COMPILE_WARNING,
			E_USER_ERROR,
		);

		if ( ! in_array( $e['type'], $fatal_types, true ) ) {
			return;
		}

		$log  = str_repeat( '-', 70 ) . "\n";
		$log .= '[' . date( 'Y-m-d H:i:s' ) . '] PHP ' . PHP_VERSION . ' / type=' . $e['type'] . "\n";
		$log .= 'MESSAGE: ' . $e['message'] . "\n";
		$log .= 'FILE   : ' . $e['file'] . ':' . $e['line'] . "\n";
		$log .= 'URI    : ' . ( isset( $_SERVER['REQUEST_URI'] ) ? $_SERVER['REQUEST_URI'] : '-' ) . "\n";

		$dir = defined( 'WP_CONTENT_DIR' ) ? WP_CONTENT_DIR : dirname( __DIR__ );

		@file_put_contents( $dir . '/kaon-fatal-8f3a.log', $log, FILE_APPEND | LOCK_EX );
	}
);
