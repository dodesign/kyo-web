<?php
/**
 * 製品紹介の分類（タクソノミー material：種類・色・素材）。2026-11-02 リニューアル。
 * 中身は template-parts/ki-case-list.php（件数は functions.php の modify_case_archive_posts_per_page で16件）。
 *
 * @package OnePress
 */
get_header();
set_query_var( 'ki_term', get_queried_object() );
get_template_part( 'template-parts/ki-case-list' );
get_footer();
