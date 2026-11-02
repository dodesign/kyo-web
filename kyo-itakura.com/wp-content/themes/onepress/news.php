<?php
get_header();
$layout = get_theme_mod( 'onepress_layout', 'right-sidebar' );
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

        <div id="content-inside" class="container <?php echo esc_attr( $layout ); ?> p-blog-inside">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">

                    <?php while ( have_posts() ) : the_post(); ?>

                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <span><?php the_time('Y年m月d日'); ?></span>
                            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

                            <div class="entry-meta">
                                <?php $categorys = get_the_category( $post_id ); ;
                                    foreach($categorys as $category){
                                    if($category->parent==2):
                                    echo $category->name;
                                    endif;
                                }; ?>
                            </div>
                            <!-- .entry-meta -->
                        </header>
                        <!-- .entry-header -->

                        <div class="entry-content">
                            <?php the_content(); ?>
                            <?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'onepress' ),
				'after'  => '</div>',
			) );
		?>
                        </div>
                        <!-- .entry-content -->

                        <!--
<footer class="entry-footer">

</footer>
-->
                        <!-- .entry-footer -->
                    </article>
                    <!-- #post-## -->


                    <?php endwhile; // End of the loop. ?>

                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->


    <?php get_template_part( 'sidebar-news' ); ?>

        </div>
        <!--#content-inside -->
    </div>
    <!-- #content -->

    <?php get_footer(); ?>
