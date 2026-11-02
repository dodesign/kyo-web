<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package OnePress
 */

get_header();

$layout = get_theme_mod('onepress_layout', 'right-sidebar');
?>

<section class="p-under-title p-under-title__contact">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="u-color-light">新着情報</h1>
            </div>
            <!-- /.col-sm-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /.p-under-title -->

<div id="content" class="site-content p-blog-bk">
    <?php echo onepress_breadcrumb(); ?>

    <div id="content-inside" class="container <?php echo esc_attr($layout); ?>">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <?php
                // スラッグ 'kotei' のカテゴリーIDを取得
                $exclude_cat = get_term_by('slug', 'kotei', 'category');
                $exclude_cat_id = $exclude_cat ? $exclude_cat->term_id : 0;

                // カスタムクエリを作成
                $args = array(
                    'category__not_in' => array($exclude_cat_id), // 'kotei' カテゴリーを除外
                    'paged' => get_query_var('paged', 1) // ページネーション対応
                );

                // メインクエリをカスタマイズ
                $query = new WP_Query($args);

                if ($query->have_posts()) : ?>

                    <?php /* Start the Loop */ ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>

                        <?php
                        get_template_part('template-parts/content', 'list');
                        ?>

                    <?php endwhile; ?>

                    <?php the_posts_navigation(); ?>

                <?php else : ?>

                    <?php get_template_part('template-parts/content', 'none'); ?>

                <?php endif; ?>

            </main>
            <!-- #main -->
        </div>
        <!-- #primary -->

        <?php get_template_part('sidebar-news'); ?>
    </div>
    <!--#content-inside -->
</div>
<!-- #content -->

<?php get_footer(); ?>
