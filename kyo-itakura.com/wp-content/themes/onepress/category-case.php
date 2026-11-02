<?php
/**
 * 旧カテゴリー（通常の投稿で製品紹介をしていた頃の名残）。2026-11-02 リニューアルで、
 * お知らせと同じ記事一覧（template-parts/ki-post-list.php）に統一した。旧版は Git の履歴。
 *
 * @package OnePress
 */
get_header();
get_template_part( 'template-parts/ki-post-list' );
get_footer();
