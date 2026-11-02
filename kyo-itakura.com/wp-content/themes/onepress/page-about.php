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

    <section class="p-under-title p-under-title__about">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>板倉のこだわり</h1>
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
    <section id="oroshi" class="p-under__sub-title p-under__sub-title__about">
        <div class="container">
            <div class="col-sm-7 col-sm-offset-5 p-section-padding">
                <h2>京念珠製造卸事業</h2>
                <h3>「すべてはお客様のために。」</h3>
                <p class="p-under-title__lead">株式会社意匠京念珠板倉は家庭用から業務用までの意匠京念珠の企画・製造・卸売りを行なっている製造卸業者です。</p>
            </div>
        </div>
        <!-- /.container -->
    </section>
    <!-- /.p-under-title -->
    <section class="p-under p-intro section-bg-jpn-light p-section-padding">
        <div class="container">
            <div class="row">
                <!-- /.col-sm-6 -->
                <div class="col-sm-7">
                    <h1 class="section--heading c-text-center">
                        板倉でしか作れない、<br>
                        <b>こだわり</b>京念珠
                    </h1>
                    <div class="p-section--content">
                        <h2 class="p-heading_deco">一つひとつ丁寧に、心をこめて作ります</h2>
                        <div class="p-heading_deco__lead">
                            <p>念珠は、故人を偲ぶときに使う大切なもの。<br> 念珠は「念ずる珠」とかくように、心のお守りとなります。
                                <br> 時には、ふとした瞬間に見るだけで、あるいは触るだけで心安らぐ拠り所として使っていただけるように、一つひとつ丁寧に、心をこめて作ります。
                            </p>


                            <!-- /.section--heading__sub-title -->
                            <p>喜芳は、日常生活で京の四季折々に触れて美しいと感じた色合いや、歌舞伎・茶道・生け花といった京文化から学んだことから創作念珠を発想しました。<br> 板倉の念珠は、喜芳の創作のルーツとなった「自然物の色合い」や「京文化」を念珠へ取り入れています。
                            </p>
                        </div>
                        <!-- /.p-heading_deco__lead -->
                    </div>
                    <!-- /.p-section--content -->
                </div><!-- /.col-sm-7 -->
                <div class="p-intro__left col-sm-5">
                    <img src="<?php echo get_template_directory_uri(); ?>/common/img/about_img1.jpg" alt="喜芳工房" class="c-w100b">
                </div>
                <div style="width:100%; margin:0 auto; text-align:center;" class="wp-video"><!--[if lt IE 9]><script>document.createElement('video');</script><![endif]-->
					<video class="wp-video-shortcode" id="video-1057-1" preload="metadata" controls="controls" width="100%" height="450" muted autoplay><source type="video/mp4" src="/wp-content/uploads/2019/01/movie_short_low_181229.mp4?_=1"><a href="/wp-content/uploads/2019/01/movie_short_low_181229.mp4" data-slimstat="5">/wp-content/uploads/2019/01/movie_short_low_181229.mp4</a></video>
				</div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>
    <section class="p-under">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 p-section-padding">
                    <h2 class="section--heading__s">
                        70年の歴史を持つ京念珠の老舗
                    </h2>
                    <!-- /.section--heading__s -->
                    <h1 class="section--heading c-text-center">
                        板倉の技術
                    </h1>
                    <div class="row">
                        <div class="col-sm-6">

                            <h2 class="p-under-lead-title"><span>
                                        <img src="<?php echo get_template_directory_uri(); ?>/common/img/about_skill_title1.jpg" alt="">
                                    </span>軸部分の<b>飾り結び</b></h2>
                            <img src="<?php echo get_template_directory_uri(); ?>/common/img/about_skill_img1.jpg" alt="" class="text-center c-db c-mb-2
                             c-w-100">
                            <img src="<?php echo get_template_directory_uri(); ?>/common/img/about_skill_img1-2.jpg" alt="" class="c-flo-img c-db c-mb-2
                             c-w-100">
                            <p>念珠の美しさを決めるといわれる軸部分。<br> 一般的な飾り結びとは一線を画し、手作業で仕上げる美しい飾り結びで仕上げています。
                                <br>
                                <span class="c-note-danger">※ 意匠登録済み。世界で唯一板倉だけがご提供出来る、独自技術製法です</span>
                            </p>
                        </div>
                        <!-- /.col-sm-6 -->
                        <div class="col-sm-6">

                            <h2 class="p-under-lead-title"><span>
                                        <img src="<?php echo get_template_directory_uri(); ?>/common/img/about_skill_title2.jpg" alt="">
                                    </span>二色の芯糸が産み出す美しさ<b>「京のいろは」</b></h2>
                            <img src="<?php echo get_template_directory_uri(); ?>/common/img/about_skill_img2.jpg" alt="" class="text-center c-db c-mb-2
                             c-w-100">
                            <p>芯糸がふたつの色で彩られた技術です。 水晶などの透明度の高い玉に、2色の芯糸が石の奥から美しく映えます。
                                <br> 光の加減や、見る角度によって見える芯糸の色が異なったり、二色が調和して見えたり、絶妙な美しさです。
                                <br>
                                <span class="c-note-danger">※ 意匠登録済み。世界で唯一板倉だけがご提供出来る、独自技術製法です</span>
                            </p>
                        </div>
                        <!-- /.col-sm-6 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-sm-6">

                            <h2 class="p-under-lead-title"><span>
                                        <img src="<?php echo get_template_directory_uri(); ?>/common/img/about_skill_title3.jpg" alt="">
                                    </span>一粒一粒見極めて仕入れる<b>「珠」</b></h2>
                            <img src="<?php echo get_template_directory_uri(); ?>/common/img/about_skill_img3.jpg" alt="" class="text-center c-db c-mb-2
                             c-w-100">
                            <p>念珠の基本となる石は、質の良い物を選びます。職人自ら信頼できる問屋で買い付けを行います。ご希望の珠をお探ししお仕立てすることなども可能です。
                            </p>
                        </div>
                        <!-- /.col-sm-6 -->
                        <div class="col-sm-6">

                            <h2 class="p-under-lead-title"><span>
                                        <img src="<?php echo get_template_directory_uri(); ?>/common/i゛mg/about_skill_title4.jpg" alt="">
                                    </span>カラーリストによる、色の特性を引き出す<b>「配色」</b></h2>
                            <img src="<?php echo get_template_directory_uri(); ?>/common/img/about_skill_img4.jpg" alt="" class="text-center c-db c-mb-2
                             c-w-100">
                            <p>石のもつ特性や、人が色を見たときの心理的効果を最大限に引き出す組み合わせを日々研究しています。
                            </p>
                        </div>
                        <!-- /.col-sm-6 -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-sm-6">

                            <h2 class="p-under-lead-title"><span>
                                        <img src="<?php echo get_template_directory_uri(); ?>/common/img/about_skill_title5.jpg" alt="">
                                    </span>京都の伝統職人が仕立てる<b>「房」</b></h2>
                            <img src="<?php echo get_template_directory_uri(); ?>/common/img/about_skill_img5.jpg" alt="" class="text-center c-db c-mb-2
                             c-w-100">
                            <p>京都の伝統職人が仕立てた高い品質の正絹を使用しています。数本の差し色をいれるなどのご要望にお応えすることも可能です。
                            </p>
                        </div>
                        <!-- /.col-sm-6 -->
                        <div class="col-sm-6">

                            <h2 class="p-under-lead-title"><span>
                                        <img src="<?php echo get_template_directory_uri(); ?>/common/img/about_skill_title6.jpg" alt="">
                                    </span>長くお使いいただくために<b>「高級桐箱」</b></h2>
                            <img src="<?php echo get_template_directory_uri(); ?>/common/img/about_skill_img6.jpg" alt="" class="text-center c-db c-mb-2
                             c-w-100">
                            <p>私たちは、お客様の目に触れるものすべてにこだわっています。高級桐箱と中板には板倉の毛筆筆耕をいれ、念珠に合わせたカラーで装飾しています。その後、一つひとつ、真心をこめて梱包しています。
                            </p>
                        </div>
                        <!-- /.col-sm-6 -->
                    </div>
                    <!-- /.row -->
					
                <div style="width:100%; margin:0 auto; text-align:center;" class="wp-video"><!--[if lt IE 9]><script>document.createElement('video');</script><![endif]-->
					<video class="wp-video-shortcode" id="video-1057-1" preload="metadata" controls="controls" width="100%" height="450" muted autoplay><source type="video/mp4" src="/wp-content/themes/onepress/common/movie/process_3min.mp4?_=1"><a href="/wp-content/themes/onepress/common/movie/process_3min.mp4" data-slimstat="5">/wp-content/themes/onepress/common/movie/process_3min.mp4</a></video>
				</div>
					
                </div>
                <!-- /.col-sm-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <section class="p-top-section2 section-bg-jpn">
        <div class="container">
            <div class="row">
                <div class="p-top-section2__content col-sm-10 col-sm-offset-1 c-db c-mb-2">
                    <div class="p-top-section2__content__left">
                        <img class="c-w100b" src="<?php echo get_template_directory_uri(); ?>/common/img/about_skill_img10.jpg" alt="">
                    </div>
                    <!-- /.col-sm-6 -->
                    <div class="section-bg-jpn__contents">
                        <h2 class="section-bg-jpn__head">
                            喜芳工房の職人
                        </h2>
                        <p>板倉は、喜芳が健在であった時から現在に至るまで、職人を社内で養成しています。この職人たちが所属する工房を「喜芳工房」と呼んでいます。</p>
                    </div>
                    <!-- /.col-sm-6 -->
                </div>
                <!-- /.col-sm-10 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="p-top-section2__content col-sm-10 col-sm-offset-1">
                    <div class="section-bg-jpn__contents">
                        <h2 class="section-bg-jpn__head">
                            それぞれの分野のスペシャリストを養成
                        </h2>
                        <p>喜芳は、弟子の一人ひとりの適正を見極めて、それぞれが得意な工程の技術を伸ばすことを大事にしていました。<br> そのため、職人はそれぞれ得意な分野が「珠をとおす」、「軸を編む」、「房を付ける」、などはっきりと分かれています。
                        </p>

                        <p>その結果として、一つひとつの工程のスペシャリストが育成されています。<br>各工程で高い品質のパーツが仕立てられているため、最終的にすべてを組み合わせたときに、クオリティの高い製品に仕上がります。
                        </p>
                    </div>
                    <!-- /.col-sm-6 -->
                    <div class="p-top-section2__content__left">
                        <img class="c-w100b" src="<?php echo get_template_directory_uri(); ?>/common/img/about_img3.jpg" alt="">
                    </div>
                    <!-- /.col-sm-6 -->
                </div>
                <!-- /.col-sm-10 -->
            </div>
            <!-- /.row -->
        </div>
    </section>
    <section id="netshop" class="p-under__sub-title p-under__sub-title__netshop">

        <div class="col-sm-6 col-sm-offset-6 p-section-padding">
            <h2>通信販売事業</h2>
            <h3>特選の品を通信販売しています</h3>
            <p class="p-under-title__lead">株式会社意匠京念珠板倉が製造した製品の一部を、通信販売しています。</p>
        </div>
        <div class="p-footer">
            <section class="p-fotter-section1 p-section-full c-mt-2">
                <div class="container">
                    <div class="row">
                        <a href="//kyo-kaon.jp/index.html" target="_blank">
                            <div class="p-fotter-section1-4 p-fotter-section__inner col-sm-5">
                                <h2 class="p-fotter-section1__title title_mini">
                                    京都伝統産業優秀技術継承 創作京念珠<br>京上賀茂 かおん
                                </h2>
                                <!-- /.p-fotter-section1__title -->
                                <div class="row">
                                    <div class="col-sm-12 text-center c-mt-2">
                                        <div class="btn btn-white text-center">
                                            詳しくみる
                                        </div>
                                    </div>
                                    <!-- /.col-sm-4 -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </a>
                        <!-- /.col-sm-4 -->
                        <a href="https://www.amazon.co.jp/s?rh=n%3A85895051%2Cp_4%3A%E5%96%9C%E8%8A%B3%E5%B7%A5%E6%88%BF&ref=bl_sl_s_je_web_85895051" target="_blank">
                            <div class="p-fotter-section1-6 p-fotter-section__inner col-sm-5 col-sm-offset-1">
                                <h2 class="p-fotter-section1__title title_mini">
                                    京都伝統産業優秀技術継承 創作京念珠<br>喜芳工房 Amazon店
                                </h2>
                                <!-- /.p-fotter-section1__title -->
                                <div class="row">
                                    <div class="col-sm-12 text-center c-mt-2">
                                        <div class="btn btn-white text-center">
                                            詳しくみる
                                        </div>
                                    </div>
                                    <!-- /.col-sm-4 -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </a>
                        <!-- /.col-sm-4 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </section>
        </div>
        <!-- /.p-footer -->
    </section>
    <section id="hitotsubu" class="p-under__sub-title p-under__sub-title__hitotsubu">

        <div class="col-sm-6 col-sm-offset-3 p-section-padding">
            <h2>Hitotsubu Color</h2>
            <h3>ヒトツブカラー</h3>
            <p class="p-under-title__lead">グローカルセンターの学生さんと喜芳工房のコラボブランド。</p>
        </div>
	</section>	
		<section class="p-under p-intro section-bg-jpn-light p-section-padding">
        <div class="container">
            <div class="row">
                <!-- /.col-sm-6 -->
                <div class="col-sm-7">
                    <h1 class="section--heading c-text-center">
                        身に着ける人のお守りとなる<Br>
						新しい念珠
                    </h1>
                    <div class="p-section--content">
                        <div class="p-heading_deco__lead">
                            <p>「葬儀などの限定された場で使われる現在の念珠から発展させた、身に着ける人のお守りとなる新しい念珠を作りたい。」という喜芳工房の願いを、「喜芳工房の一粒の余り珠から、グローカル学生がカジュアルなお守りアクセサリーを作る」ことで具現化しました。<br>
								「念珠（おもいのたま）の全ては一粒から」をテーマに、新世代の視点から念珠を再定義した限定アクセサリーを制作し、イベント出店しています。</p>
							
<h3>グローカル学生とは</h3>
<p>NPO法人 グローカル人材開発センターのプロジェクト*に参加する学生を指します。<br>
<br>
* インターンのような形で活動したい大学生を、グローカル人材開発センターが企業とマッチングさせて、企業が抱える課題の解決策を探るプロジェクトです。</p>
                        </div>
                        <!-- /.p-heading_deco__lead -->
                    </div>
                    <!-- /.p-section--content -->
                </div><!-- /.col-sm-7 -->
                <div class="p-intro__left col-sm-5">
                    <img class="c-w100b" src="<?php echo get_template_directory_uri(); ?>/common/img/about_img_hitosubu1.jpg" alt="">
                </div>
					
                <div style="width:100%; margin:0 auto; text-align:center;" class="wp-video"><!--[if lt IE 9]><script>document.createElement('video');</script><![endif]-->
<video class="wp-video-shortcode" id="video-1057-1" preload="metadata" controls="controls" width="100%" height="450" muted autoplay><source type="video/mp4" src="/common/movie/hitotubu-color_movie.mp4"><a href="/common/movie/hitotubu-color_movie.mp4" data-slimstat="5">/common/movie/hitotubu-color_movie.mp4</a></video></div>
					
					<h3 class="c-mt-2">2021/11/26(金)・27(土) POPUP STORE</h3>
					
					<div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/681929686?h=bc04e6d7c8&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="2021/11/26(金)・27(土) POPUP STORE"></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section>

    <?php get_footer(); ?>
