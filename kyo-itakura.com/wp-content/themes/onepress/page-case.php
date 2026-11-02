<?php
/**
 * 固定ページ「製品紹介・実績」（slug: case）。通常は /case/ が製品の一覧（archive-case.php）になるが、
 * このページが表示された場合も同じ一覧を出す。2026-11-02 リニューアル。
 *
 * @package OnePress
 */
get_header();
set_query_var( 'ki_q', new WP_Query( array(
	'post_type'      => 'case',
	'posts_per_page' => 16,
	'paged'          => max( 1, (int) get_query_var( 'paged' ) ),
) ) );
get_template_part( 'template-parts/ki-case-list' );
get_footer();
