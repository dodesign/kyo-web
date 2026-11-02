<?php
/**
 * 記事の一覧（お知らせ・カテゴリー・タグ・月別・検索）。2026-11-02 リニューアル（旧版は Git の履歴）。
 * 中身は template-parts/ki-post-list.php。
 *
 * @package OnePress
 */
get_header();
get_template_part( 'template-parts/ki-post-list' );
get_footer();
