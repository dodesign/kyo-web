<?php
/**
 * 予備のテンプレート（ほかのテンプレートが当てはまらないとき）。2026-11-02 リニューアル：記事一覧と同じ見た目に。
 *
 * @package OnePress
 */
get_header();
get_template_part( 'template-parts/ki-post-list' );
get_footer();
