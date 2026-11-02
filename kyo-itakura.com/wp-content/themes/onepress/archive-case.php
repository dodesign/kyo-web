<?php
/**
 * Archive page template for case custom post type
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
                    <?php if ( function_exists( 'bcn_display' ) ) {
                        bcn_display();
                    } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="p-under__sub-title p-under__sub-title__case">
    <div class="container">
        <div class="col-sm-6 col-sm-offset-6">
            <h2>京念珠の老舗<br>製造卸一筋<?php
$start_year = 1970;
$current_year = date('Y');
$years_passed = $current_year - $start_year;
echo $years_passed;
?>年の実績</h2>
            <h3>お客様のご要望を確実に具現化することを第一に考え、ひとつひとつ手作りしています。</h3>
            <p class="p-under-title__lead">ほかにもさまざまな実績があります。<br>ぜひお問い合わせください。</p>
        </div>
    </div>
</section>

<section class="p-under p-intro section-bg-jpn-light p-section-padding">
    <h1 class="section--heading c-text-center">製品紹介</h1>
    <div class="row">
        <div class="container">
            <div class="col-sm-9 col-sm-push-3">
                <div class="p-case p-section--content">
                    <?php 
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post(); ?>
                            <a href="<?php the_permalink(); ?>">
                                <article class="p-case__box col-sm-4">
                                    <p class="c-thumnail-zoom p-case__box__thumbnail c-no-padding c-no-margin">
                                        <?php the_post_thumbnail('full'); ?>
                                    </p>
                                    <h2 class="p-simpleS-head"><?php the_title(); ?></h2>
                                </article>
                            </a>
                        <?php endwhile; ?>

                    <?php endif; ?>
                </div>
				
                        <?php 
                        // ページネーションの表示
                        the_posts_pagination(array(
                            'mid_size'     => 2,
                            'prev_text'    => __('« 前へ', 'onepress'),
                            'next_text'    => __('次へ »', 'onepress'),
                        )); 

                    ?>
            </div>
			
            <?php get_sidebar('case'); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
