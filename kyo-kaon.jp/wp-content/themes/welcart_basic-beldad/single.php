<?php
/**
 * 記事1件。2026-11-02 リニューアル（旧版は _旧デザイン_20261102/single.php）。
 * ・オーダーメイド（/case/461/）だけは専用 → template-parts/kaon-ordermade.php
 * ・ほかの記事（ブログ・お知らせ・制作事例など）→ template-parts/kaon-single.php（サイドバーなし）
 * ※商品ページは Welcart が wc_templates/wc_item_single.php を使うので、ここは通らない
 *
 * @package Welcart
 */
get_header();
if ( 461 === get_queried_object_id() ) {
	get_template_part( 'template-parts/kaon-ordermade' );
} else {
	get_template_part( 'template-parts/kaon-single' );
}
get_footer();
