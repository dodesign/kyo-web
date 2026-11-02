<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package OnePress
 */

get_header();

$layout = get_theme_mod( 'onepress_layout', 'right-sidebar' );
?>

    <section class="p-under-title p-under-title__case">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="u-color-light">製品紹介・実績</h1>

                    <div class="breadcrumbs" vocab="http://schema.org/" typeof="BreadcrumbList">
                        <?php if(function_exists('bcn_display'))
{
bcn_display();
}?>
                    </div>
                </div>
                <!-- /.col-sm-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.p-under-title -->
    <section class="p-under p-intro section-bg-jpn-light p-section-padding">

        <h1 class="section--heading c-text-center">
            製品紹介
        </h1>
        <div class="row">
            <div class="container">

                <div class="col-sm-9  col-sm-push-3">
                    <div class="p-case p-section--content">
                        <?php
$args = array( 'posts_per_page' => -1, 'category' => 9 );
$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
                            <a href="<?php the_permalink(); ?>">
                                <article class="p-case__box col-sm-4">
                                    <p class="c-thumnail-zoom p-case__box__thumbnail c-no-padding c-no-margin">
                                        <?php the_post_thumbnail('full'); ?>
                                    </p>
                                    <div class="p-case__box__under">
                                        <h2 class="p-simpleS-head">
                                            <?php the_title(); ?>
                                        </h2>
                                        <p></p>
                                    </div>
                                </article>
                            </a>
                            <?php endforeach; wp_reset_postdata();?>
                    </div>
                    <!-- /.p-section--content -->
                </div>
                <!-- /.col-sm-7 -->
                <?php get_sidebar('case'); ?>
            </div>
            <!-- /.container -->
        </div>
        <!-- /.row -->
    </section>
    <section class="p-under p-intro">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 p-section-padding">
                <h1 class="section--heading c-text-center">
                    実績
                </h1>
                <div class="p-section--content">
                    <div class="col-sm-10 col-sm-offset-1 c-mb-2">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2 class="p-heading_deco">テレビ出演</h2>
                                <div class="p-heading_deco__lead">
                                    <ul class="c-list">
                                        <li>ディノス（東京ローカル）</li>
                                        <li>ショップチャンネル</li>
                                        <li>高田純次の春の京都で逸品をさがせ！</li>
                                        <li>いいものプレミアム</li>
                                    </ul>
                                    <!-- /.c-list -->
                                </div>
                                <!-- /.p-heading_deco__lead -->
                            </div>
                            <!-- /.col-sm-6 -->
                            <div class="col-sm-6">
                                <h2 class="p-heading_deco">メディア掲載</h2>
                                <div class="p-heading_deco__lead">
                                    <ul class="c-list">
                                        <li>ディノス</li>
                                        <li>ワコール</li>
                                        <li>生協</li>
                                    </ul>
                                    <!-- /.c-list -->
                                </div>
                                <!-- /.p-heading_deco__lead -->
                            </div>
                            <!-- /.col-sm-6 -->
                        </div>
                        <!-- /.row -->

                    </div>
                </div>
                <!-- /.p-section--content -->
            </div>
            <!-- /.col-sm-7 -->
        </div>
        <!-- /.row -->
    </section>

    <?php get_footer(); ?>