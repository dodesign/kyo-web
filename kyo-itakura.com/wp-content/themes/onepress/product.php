<?php
get_header();
?>
<section class="p-under-title p-under-title__case">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="u-color-light">製品紹介・実績</h1>
            </div>
            <!-- /.col-sm-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /.p-under-title -->

<div id="content" class="site-content">


    <div id="content-inside" class="container <?php echo esc_attr( $layout ); ?>">

        <div class="breadcrumbs" vocab="http://schema.org/" typeof="BreadcrumbList">
            <?php if(function_exists('bcn_display'))
{
bcn_display();
}?>
        </div>
        <div class="content-area">
            <main id="main" class="site-main" role="main">
                <?php while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title( '<h1 class="section--heading c-text-center">', '</h1>' ); ?>
                    </header>
                    <!-- .entry-header -->

                    <div class="entry-content col-sm-9  col-sm-push-3">
                        <?php the_content(); ?>
                        <?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'onepress' ),
							'after'  => '</div>',
						) );
						?>
                            <ul class="c-case-category">
								<?php
								// 所属するタクソノミー 'material' を取得
								$terms = get_the_terms($post->ID, 'material');
								if ($terms && !is_wp_error($terms)) {
									foreach ($terms as $term) {
										echo '<li class="c-line"><a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a></li>';
									}
								}
								?>
								    <!--<?php
										// 所属するタクソノミー 'material' を取得
										$terms = get_the_terms($post->ID, 'material');
										if ($terms && !is_wp_error($terms)) {
											foreach ($terms as $term) {
												echo '<li class="c-line"><a href="' . esc_url(home_url('/case/material/' . $term->slug)) . '">' . esc_html($term->name) . '</a></li>';
												
											}
										}
									?>-->
                                <li style="display: block;">
                                    更新日：
                                    <?php the_modified_date(); ?>
                                </li>
                                
                                    <?php $categorys = get_the_category( $post_id ); ;
foreach($categorys as $category){
if($category->parent==8):
echo '<li class="c-line"><a href="/category/case/'.$category->slug.'">'.$category->name.'</a></li>';
endif;
}; ?>
                            </ul>
<?php
	$parents = getRootTaxonomies( get_the_terms( $post->ID,"material "), "0" );
	foreach($parents as $pv){
		echo "<ul>\n";
		echo '<li><a href="/material /'.$pv->slug.'">'.$pv->name.'</a></li>'."\n";
		echo "<li><ul>\n";
		foreach($pv->children as $ck=>$cv){
			echo '<li><a
			href="/material /'.$cv->slug.'">'.$cv->name.'</a></li>'."\n";
		}
	echo "</ul></li>\n";
	echo "</ul>\n";
	}
?>
                            <p class="c-pt-2">
                                <?php echo get_post_meta($post->ID , 'case-lead' ,true); ?>
                            </p>
						
						 <div class="col-sm-12 text-center c-mt-1">
                             <div class="btn btn-success btn-large text-center">
                                <a href="/contact?title=<?php echo urlencode(get_the_title()); ?>&url=<?php echo urlencode(get_permalink()); ?>" target="_blank" data-slimstat="5">このアイテムについてお問合せ</a>
                             </div>
                         </div>
						
						 <div class="p-re c-mt-2">
                    <h2 class="p-heading_deco">他の念珠（数珠）を見る</h2>
                    <div class="flexslider">
                        <ul class="slides">
    <?php
    // 現在の投稿のタクソノミー terms（カテゴリー）を取得
    $terms = wp_get_post_terms($post->ID, 'material'); // 'material' はカスタムタクソノミー名
    
    foreach($terms as $term):
        // カスタム投稿タイプ 'case' で、現在の投稿と同じタクソノミーの投稿を取得
        $args = array(
            'post_type'      => 'case',
            'posts_per_page' => 15,
            'post__not_in'   => array($post->ID), // 現在の投稿を除外
            'tax_query'      => array(
                array(
                    'taxonomy' => 'material', // カスタムタクソノミー名
                    'field'    => 'term_id',
                    'terms'    => $term->term_id,
                ),
            ),
        );

        $related_posts = get_posts($args);

        if($related_posts): ?>
            <?php foreach($related_posts as $related_post):
                $thumbnail = get_post_thumbnail_id( $related_post->ID );
                $src_info = wp_get_attachment_image_src($thumbnail, 'full');
                $src = $src_info[0];
                $width = $src_info[1];
                $height = $src_info[2];
                $title = $related_post->post_title;
            ?>
                <li>
                    <a href="<?php echo get_permalink($related_post->ID); ?>">
                        <?php if ( has_post_thumbnail($related_post->ID) ) {
                            echo '<img src="'.$src.'" alt="'.$title.'" width="'.$width.'" height="'.$height.'" />';
                        } ?>
                    </a>
                </li>
            <?php endforeach; ?>
        <?php endif; 
    endforeach; ?>
</ul>

                    </div>
                    <!-- /.flexslider -->
                </div>
                <!-- /.p-re -->
						
						
						
                    </div>
                    <!-- .entry-content -->
                    <?php get_sidebar('case'); ?>
                </article>
                <!-- #post-## -->




                <?php endwhile; // End of the loop. ?>

               

            </main>
            <!-- #main -->
        </div>
        <!-- #primary -->

    </div>
    <!--#content-inside -->
</div>
<!-- #content -->

<?php get_footer(); ?>
