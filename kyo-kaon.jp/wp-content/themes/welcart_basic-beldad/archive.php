<?php
/**
 * 2026-11-02 リニューアル：記事の一覧は template-parts/kaon-post-archive.php に統一（サイドバーなし）。
 * 旧版はリポジトリ直下の _旧デザイン_20261102/ にある。
 *
 * @package Welcart
 */
get_header();
get_template_part( 'template-parts/kaon-post-archive' );
get_footer();
