<?php
/**
 * カテゴリーの一覧。2026-11-02 リニューアル（旧版は _旧デザイン_20261102/category.php）。
 * ・商品のカテゴリー → template-parts/kaon-item-archive.php
 * ・それ以外（ブログ・お知らせなど）→ template-parts/kaon-post-archive.php
 * どちらもサイドバーは出さない。
 *
 * @package Welcart
 */
get_header();
if ( usces_is_cat_of_item( get_query_var( 'cat' ) ) ) {
	get_template_part( 'template-parts/kaon-item-archive' );
} else {
	get_template_part( 'template-parts/kaon-post-archive' );
}
get_footer();
