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
	<h1 class="section--heading c-text-center">
        <?php
        // 現在のタームを取得
        $term = get_queried_object();
        
        // 親タームを取得
        $parent_term = get_term($term->parent, 'material');

        // タイトルを組み立てる
        if ($parent_term) {
            echo esc_html($parent_term->name) . '：' . esc_html($term->name);
        } else {
            echo esc_html($term->name);
        }
        ?>
    </h1>
    <!--<h1 class="section--heading c-text-center"><?php the_archive_title(); ?></h1>-->
	
    <div class="row">
        <div class="container">
            <div class="col-sm-9 col-sm-push-3">
                <div class="p-case p-section--content">
                    <?php
                    // 現在表示されているタクソノミーの説明文を取得
                    $term_description = term_description();

                    if ( ! empty( $term_description ) ) : ?>
                        <div class="taxonomy-description c-text-center">
                            <?php echo $term_description; ?>
                        </div>
                    <?php endif; ?>

                    <?php 
                    // クエリの作成
                    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                    $current_term = get_queried_object(); // 現在のタクソノミーのタームを取得

                    $args = array(
                        'post_type'      => 'case',
                        'posts_per_page' => 15,
                        'paged'          => $paged,
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'material',   // タクソノミー material を指定
                                'field'    => 'slug',
                                'terms'    => $current_term->slug, // 現在のタームのスラッグで絞り込み
                            ),
                        ),
                    );

                    $query = new WP_Query($args);

                    if ( $query->have_posts() ) :
                        while ( $query->have_posts() ) : $query->the_post(); 
                    ?>
                        <!-- 投稿内容の表示 -->
                        <a href="<?php echo esc_url( get_permalink() ); ?>">
                            <article class="p-case__box col-sm-4">
                                <p class="c-thumnail-zoom p-case__box__thumbnail c-no-padding c-no-margin">
                                    <?php the_post_thumbnail('full'); ?>
                                </p>
                                <h2 class="p-simpleS-head"><?php the_title(); ?></h2>
                            </article>
                        </a>
                    <?php 
                        endwhile;

                    else : 
                        echo '<p>該当する製品紹介がありません。</p>';
                    endif;

                    // メインクエリのリセット
                    wp_reset_postdata();
                    ?>

                </div>
                <!-- ここでページネーションを表示 -->
                <?php 
                if ( $query->have_posts() ) {
                    the_posts_pagination(array(
                        'mid_size'           => 2,
                        'prev_text'          => __('« 前へ', 'onepress'),
                        'next_text'          => __('次へ »', 'onepress'),
                        'total'              => $query->max_num_pages,
                        'current'            => max(1, $paged), // 現在のページを確実に取得
                        'screen_reader_text' => __('投稿ナビゲーション', 'onepress'),
                    ));
                }
                ?>
            </div>
            <!-- ここでサイドバーを表示 -->
            <?php get_sidebar('case'); ?>
        </div>
    </div>
</section>

<section class="p-under p-intro">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 p-section-padding">
            <h1 class="section--heading c-text-center">実績</h1>
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
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h2 class="p-heading_deco">メディア掲載</h2>
                            <div class="p-heading_deco__lead">
                                <ul class="c-list">
                                    <li>ディノス</li>
                                    <li>ワコール</li>
                                    <li>生協</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
