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
                    <h1 class="c-color-light">お問合わせ</h1>
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
                        <div class="col-sm-6 text-center">
                            <h2 class="p-heading_deco">お電話でのお問合せ</h2>
                            <p class="text-big c-bold c-text-warning c-mt-2 c-no-padding">075-721-6600</p>
                            <p class="text-center">受付時間 平日9:00～18:00</p>
                        </div>
                        <!-- /.col-sm-6 -->
                        <div class="col-sm-6 text-center">
                            <h2 class="p-heading_deco">FAXでのお問合せ</h2>
                            <p class="text-big c-bold c-text-warning c-mt-2">075-721-6784</p>
                        </div>
                        <!-- /.col-sm-6 -->
                        <div class="row">
                            <div class="col-sm-12">
								<?php echo do_shortcode('[mwform_formkey key="966"]'); ?>
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
