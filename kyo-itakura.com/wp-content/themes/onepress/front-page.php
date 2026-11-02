<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package OnePress
 */

get_header();

?>

    <section class="p-intro section-bg-jpn-light">
        <div class="row">
            <div class="p-intro__left col-md-5">
                <img src="<?php echo get_template_directory_uri(); ?>/common/img/top-intro-img.jpg" alt="" class="c-w100b">
            </div>
            <!-- /.col-sm-6 -->
            <div class="col-md-6 p-section-padding">
                <h2 class="section--heading__s">
                    世界にたった3人
                </h2>
                <!-- /.section--heading__s -->
                <h1 class="section--heading c-text-center">
                    念珠師としてはじめて<br> 「京都府伝統産業優秀技術者」に認定された京の名工 喜芳
                </h1>
                <div class="p-section--content">
                    <p>鍛え抜かれた技術力と、喜芳が仕立てる京念珠の独自性が評価され、京都の京念珠師としてはじめて、平成16年に「京都府伝統産業優秀技術者」に認定されました。</p>
                    <img src="<?php echo get_template_directory_uri(); ?>/common/img/top_kyo-meiko_img.jpg" class="c-w80 c-no-padding" alt="">
                    <h3 class="p-section--heading__sub-title">
                        ”心棒の棒を折るな”
                    </h3>
                    <!-- /.section--heading__sub-title -->
                    <p>「どんな難しい数珠でも、全部頭の中に入ってます。<br> 誰にも負けないいい仕事ができるという信念がありますから。私のする仕事に勝つ人はおへん。
                        <br> やっぱり、一つのことを貫くということが、人間にとって一番大切なことなんじゃないですか。」
                    </p>
                </div>
                <!-- /.p-section--content -->
            </div>
            <!-- /.col-sm-7 -->
        </div>
        <!-- /.row -->
    </section>
    <section class="p-top-news p-section-padding">
        <div class="container">
			
			<div class="row">
    <div class="col-sm-12">
        <h1 class="section--heading">新着商品</h1>
        <?php
        $args = array(
            'posts_per_page' => 8,
            'post_type'      => 'case', // カスタム投稿タイプ
        );
        $myposts = get_posts($args);

        if ($myposts) :
            foreach ($myposts as $post) : setup_postdata($post); ?>
                <a href="<?php the_permalink(); ?>">
                    <article class="p-top-news__box col-sm-3 col-xs-6">
                        <p class="p-top-news__thumbnail c-no-padding c-no-margin c-thumnail-zoom">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail(array(500, 500), array('class' => 'img-responsive')); ?>
                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/common/img/l_e_others_500.jpg" alt="no image" class="img-responsive">
                            <?php endif; ?>
                        </p>
                        <div class="p-top-news__box__under">
                            <span class="p-top-news__date"><?php the_time('Y年n月j日'); ?></span>
                            <h4 class="p-top-news__title"><?php the_title(); ?></h4>
                        </div>
                    </article>
                </a>
            <?php endforeach;
            wp_reset_postdata();
        else:
            echo '<p>該当する投稿はありません。</p>';
        endif;
        ?>
    </div>
    <!-- /.col-sm-12 -->
</div>
<!-- /.row -->
			
			<div class="row">
                <div class="col-sm-12">
                    <h1 class="section--heading">
                        お知らせ
                    </h1>
                    <?php
					$args = array( 'posts_per_page' => 4, 'category' => '52,3' );
					$myposts = get_posts( $args );
					foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
                        <a href="<?php the_permalink(); ?>">
                            <article class="p-top-news2 p-top-news__box col-sm-3 col-xs-6">
                                <p class="p-top-news__thumbnail c-no-padding c-no-margin c-thumnail-zoom">
                                    <?php if(has_post_thumbnail()): ?>
                                        <?php the_post_thumbnail('full'); ?>
                                    <?php else: ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/common/img/l_e_others_500.jpg" alt="no image">
                                    <?php endif; ?>
                                </p>
                                <div class="p-top-news__box__under">
                                    <span class="p-top-news__date"><?php the_time('Y年n月j日'); ?></span><span class="p-top-news__category">
                                    <?php $categorys = get_the_category( $post_id );
                                        foreach($categorys as $category){
                                        if($category->parent==2):
                                            echo '<span class="p-top-news__category-'.$category->slug.'">'.$category->name.'</span>';
                                        endif;
                                    }; ?>
                                    </span>

                                    <h4 class="p-top-news__title">
                                        <?php the_title(); ?>
                                    </h4>
                                </div>
                            </article>
                        </a>
                        <?php endforeach; wp_reset_postdata();?>

                </div>
                <!-- /.col-sm-12 -->
            </div>
            <!-- /.row -->
        </div>
    </section>
    <section class="p-intro p-top-section2 section-bg-jpn">
        <div class="container">
            <div class="p-top-section2__content col-sm-10 col-sm-offset-1 c-db c-mb-2">
                <div class="p-top-section2__content__left">
                    <img class="c-w100b" src="<?php echo get_template_directory_uri(); ?>/common/img/about_skill_img10.jpg" alt="">
                </div>
                <!-- /.col-sm-6 -->
                <div class="section-bg-jpn__contents">
                    <p class="c-no-margin c-no-padding text-center"><img src="<?php echo get_template_directory_uri(); ?>/common/img/top_prise_icn.png" alt=""></p>
                    <!-- /.p-top-section2__content -->
                    <!-- /.c-no-margin -->
                    <h2 class="section-bg-jpn__head">
                        京都府伝統産業優秀技術者
                    </h2>
                    <p>府内の伝統産業に従事し、優れた技術をもって、多年にわたりその振興と発展に寄与した者に付与されます。<br> 認定された名工は、年に一度、京都府主催で開催される「京の名工展」に趣向を凝らした作品を出展します。
                    </p>
                </div>
                <!-- /.col-sm-6 -->
            </div>
            <!-- /.col-sm-10 -->
        </div>
    </section>
    <section class="p-top-section3 p-section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="section--heading c-text-center">
                        <b>12</b>歳の頃から<b>80</b>年間<br>人生のすべてを念珠にささげた
                    </h1>
                    <div class="col-sm-6">
                        <h3>喜芳（きほう）</h3>

                        <p>大正9年京都府生まれ。13才で念珠屋へ奉公に入り、以来、念珠作り一筋に歩む。<br> 平成16年に京都府伝統産業優秀技術賞を念珠師として初受賞。
                            <br> 2017年2月現在、念珠師として「京都府伝統産業優秀技術賞 」を受賞した技師は、喜芳を含めてたった3人。<br> 名工として、平成18年～平成26年まで名工展に創作念珠を出展しており、その独自性は分野内外から高く評価された。
                            <br> 平成25年に死去。倒れる寸前まで念珠を作り続けた。
                            <br> 喜芳の技術と想いは、喜芳工房の職人たちに受け継がれている。
                        </p>
                    </div>
                    <!-- /.col-sm-6 -->
                    <div class="col-sm-6 text-center">
                        <img class="c-w100" src="<?php echo get_template_directory_uri(); ?>/common/img/top_kihou.jpg" alt="喜芳">
                    </div>
                    <!-- /.col-sm-6 -->
                </div>
                <!-- /.col-sm-7 -->
            </div>
            <!-- /.row -->
        </div>
    </section>
    <!-- /.p-top-section3 -->
    <section class="p-top-section4 p-section-full">
        <div class="row">
            <a href="/case/kinkaku-ginkaku/">
                <div class="p-top-section4__box col-sm-6 c-thumnail-zoom">
                    <img src="<?php echo get_template_directory_uri(); ?>/common/img/top_kihou_img1.jpg" alt="">
                </div>
                <!-- /.col-sm-6 -->
            </a>
            <a href="/case/ichijo-modoribashi/">
                <div class="p-top-section4__box col-sm-6 c-thumnail-zoom">
                    <img src="<?php echo get_template_directory_uri(); ?>/common/img/top_kihou_img2.jpg" alt="">
                </div>
                <!-- /.col-sm-6 -->
            </a>
        </div>
        <div class="row">

            <a href="/case/ikkyu-san/">
                <div class="p-top-section4__box col-sm-6 c-thumnail-zoom">
                    <img src="<?php echo get_template_directory_uri(); ?>/common/img/top_kihou_img3.jpg" alt="">
                </div>
                <!-- /.col-sm-6 -->
            </a>

            <a href="/case/jyuni-hitoe/">
                <div class="p-top-section4__box col-sm-6 c-thumnail-zoom">
                    <img src="<?php echo get_template_directory_uri(); ?>/common/img/top_kihou_img5.jpg" alt="">
                </div>
            </a>
            <!-- /.col-sm-6 -->
        </div>
        <!-- /.row -->
    </section>
    <section class="p-top-section5 c-color-light c-pt-2">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="section--heading c-text-center">
                        <b>「すべては人のために」</b>喜芳の想い
                    </h1>
                    <div class="col-sm-6">
                        <h2 class="p-section--heading__sub-title">一生の道を示してくれた祖母</h2>

                        <p>祖母はよく「私が早く死んだら、数珠屋さんに奉公して仕事を習いなさい。数珠の作り方を覚えておけば、ちゃんと食べていける。生活していけるようになる」 と言いました。私が小学六年生の時、祖母が事故で亡くなって、身寄りがなくなった私は数珠屋さんへ奉公することになりました。まだ十三歳の時でしたが、私は一途で、他の事はなんにも考えませんでしたね。<br> 奉公はそれから五年間したんですが、その時分の苦労といったら、働く時間が十六時間ぐらいあったことです。朝八時から晩の十二時頃までぶっ通しで、休憩なんてものはない。
                            <br> 手編みをしている手は荒れてくるし、年がら年中血だらけでした。でも、もう仕事ができせん、と言ったところで、主人は聞いてくれるはずもない。そんなもん、誰かて割れるもんや、てなもんですわ。
                        </p>
                    </div>
                    <!-- /.col-sm-6 -->
                    <div class="col-sm-6">
                        <h2 class="p-section--heading__sub-title">人間は度胸と努力が大事</h2>

                        <p>私が三十代の頃、遠くのあるお得意先から「二週間で一万三千連の念珠を作ってほしい」と言われたことがありました。一万三千といえば、大変な数です。<br> でも当時は一緒にやっている人も五人いましたし、一人が一日に二百か三百仕上げたらできると思って、「任してください」と二つ返事をしたんです。
                            <br> でも、これにはあの喧し屋の社長も驚いて、「そんな返事の仕方をして、大丈夫なんか？」と言わはりますからね。「でも社長。そんなことようしませんわ、と言って渋々引き受けたら、できますか。及び腰ではできるもんもできませんわ」と答えましてね（笑）。これには返す言葉もなかったようで、全面的に任してくださいました。
                            <br> その間、他の数珠屋さんからは「陣中見舞い」といって、菓子とか果物が次々と届きました。できんかったら、京都の名折れになるさかいに、どうか頑張ってくれと。
                            <br> 私も「できる」と言ったからには、どんなことをしてでもやろう、と。それで期日どおりにちゃんと仕上げて、板倉に頼めばなんでもできる、という評判をとったんです。
                        </p>
                    </div>
                    <!-- /.col-sm-6 -->
                    <div class="row">
                        <div class="col-sm-12 text-center c-mt-1 c-mb-2">
                            <div class="btn btn-white text-center">
                                <a href="/kihou-in" target="_blank">すべて読む</a>
                            </div>
                        </div>
                        <!-- /.col-sm-4 -->
                    </div>
                    <!-- /.row -->

                    <!-- /.btn -->
                </div>
                <!-- /.col-sm-12 -->
            </div>
            <!-- /.row -->
        </div>
    </section>
    <!-- /.p-top-section3 -->



    <?php get_footer(); ?>
