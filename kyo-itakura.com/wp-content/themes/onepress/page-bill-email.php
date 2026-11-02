<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package OnePress
 */

get_header();

?>

    <section class="p-under-title p-under-title__contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="c-color-light">電子請求書用 情報登録フォーム</h1>
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
    <section class="p-under p-contact section-bg-jpn-light p-section-padding">
        <div class="container">
            <div class="row">
                <!-- /.col-sm-6 -->
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="row">
                        <div class="row">
                            <div class="col-sm-12">
								<?php echo do_shortcode('[mwform_formkey key="4608"]'); ?>
                                <!--<?php
									$page_id = 4617;//数字はページのIDを入れてください
									$page = get_post($page_id, 'OBJECT', 'raw'); //指定したページのIDの情報を取得
									$page_include = apply_filters( 'the_content',$page->post_content); //ページの本文をフィルターフックで整形してます
									echo $page_include; //出力します
								?>-->
                                    <ul class="c-list c-mt-2 text-center">
                                        <li>お客様から頂いた情報は、お客様への回答以外には利用いたしませんので、ご安心くださいませ。</li>
                                    </ul>
                                    <!-- /.c-list -->
                            </div>
                            <!-- /.col-sm-12 -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
    </section>

    <script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
    ga('send', 'event', 'Contact Form', 'submit');
}, false );
</script>

    <?php get_footer(); ?>
