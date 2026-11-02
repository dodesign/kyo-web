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

    <section class="p-under-title p-under-title__corp">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="u-color-light">会社概要</h1>
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
    <section class="p-under__sub-title p-under__sub-title__corp">
        <div class="container">
            <div class="col-sm-7 col-sm-offset-5 p-section-padding">
                <h2>京の名工 喜芳の<b>技術と想い</b><br> を受け継いで
                </h2>
                <img src="<?php echo get_template_directory_uri(); ?>/common/img/corp_img3.jpg" class="p-under-corp__leader-img c-w100" alt="">
            </div>
        </div>
        <!-- /.container -->
    </section>
    <!-- /.p-under-title -->
    <section class="p-under p-company section-bg-jpn-light p-section-padding">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <h1 class="section--heading c-text-center">
                    トップメッセージ
                </h1>
                <div class="p-section--content">
                    <p>12歳の頃から念珠を作り始め、以来、実に80年間の人生全てを念珠に捧げた喜芳。<br> その孫として幼少の頃より喜芳工房で念珠作りを目にし、喜芳の念珠に対する想いを感じていました。 いつしか、喜芳は「自分の念珠に対する思い」を私に受け継いで欲しいと言うようになりました。 私も「喜芳の想いと技術」を絶やさぬように受け継ぎ、次へと繋げたいと思うようになりました。
                    </p>

                    <p>確かな技術を伝承することは勿論、何よりも「念珠を持つ人の幸せを願い、その人のお守りとなるように念じて作る」という喜芳の想いを受け継いで、私たちがお客様にできることを考えました。<br><br> 基本を大切にしながらも、今の時代に合わせて、お客様に喜んでいただけるお念珠を作り続けること。 それが、私たちにできることです。
                    </p>

                    <p>喜芳は京都の伝統をこよなく愛し、それらに触れることで感性が研ぎ澄まされていきました。 京の地で育まれた感性は、他の誰もが考えつかない美しくこだわりのある念珠を次々と生み出し、その数々の念珠に関わる人々を幸せにしました。
                        <br> 喜芳がその時代に、伝統や芸事から学んだように、私も今の時代に合った、自身にしかできない学び方を念珠に取り入れています。
                    </p>
                    <p>学びの一つとして、念珠を構成するさまざまな要素の中から「色」に着目し、京念珠カラーリストとなりました。<br> 念珠は様々な色の石を扱います。最近では房の色も多様化してきています。 念珠には石のパワーもありますが、色のパワーもあるのです。 色とは光であり、光は皮膚や目から細胞や脳へと伝わり、私達の心や体に大きく影響を与えます。
                        <br> ぜひ、念珠を通して様々な色を取り入れていただきたいと思っています。 配色の原理・原則を念珠に取り入れ、一人でも多くのお客様に喜んでいただける念珠を提供致します。
                    </p>
                    <p>全ては、「お客様に喜んでいただきたい」という喜芳の思いを受け継ぐためです。<br> それこそが私の喜びでもあります。
                    </p>
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="text-right">株式会社意匠京念珠板倉<br> 代表取締役 辰尾 由佳</p>
                                <ul class="c-list">
                                    <li>
                                        文部科学省認定色彩検定2級取得
                                    </li>
                                    <li>
                                        国際カラーデザイン協会パーソナルカラーレッスン認定
                                    </li>
                                    <li>
                                        リュッシャー・カラーサイコアナリスト（色彩心理診断士）
                                    </li>
                                    <li>
                                        センセーション・トリコロール・認定講師
                                    </li>
                                </ul>
                        </div>
                        <!-- /.col-sm-9 -->
                        <!-- <div class="col-sm-4"><img src="<?php echo get_template_directory_uri(); ?>/common/img/about_photo.jpg" alt="" class="c-flo-img"></div>
                        /.col-sm-3 -->
                    </div>
                    <!-- /.row -->
                    <!-- /.p-section--content -->
                </div>
                <!-- /.col-sm-7 -->
            </div>
            <!-- /.row -->
    </section>
    <section class="p-under p-intro">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 p-section-padding">
                <h1 class="section--heading c-text-center">
                    会社概要
                </h1>
                <div class="p-section--content">
                    <div class="col-sm-10 col-sm-offset-1">
                        <table class="table_line" cellspacing="1" border="0" width="100%">
                            <tbody>
                                <tr>
                                    <th>会社名</th>
                                    <td>株式会社意匠京念珠板倉</td>
                                </tr>
                                <tr>
                                    <th>代表取締役</th>
                                    <td>辰尾 由佳</td>
                                </tr>
                                <tr>
                                    <th>代表電話番号</th>
                                    <td>075-721-6600</td>
                                </tr>
                                <tr>
                                    <th>FAX</th>
                                    <td>075-721-6784</td>
                                </tr>
                                <tr>
                                    <th>メールアドレス</th>
                                    <td>info@kyo-itakura.com</td>
                                </tr>
                                <tr>
                                    <th>所在地</th>
                                    <td>〒603-8083<br> 京都府京都市北区上賀茂向縄手町40-1
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.p-section--content -->
            </div>
            <!-- /.col-sm-7 -->
        </div>
        <!-- /.row -->
    </section>
		
    <section class="p-under p-salon p-contact">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 p-section-padding">
                <h1 class="section--heading c-text-center">
                    サロン<span class="c-note">（ショールーム）</span>
                </h1>
                <div class="p-section--content">
                    <div class="col-sm-10 col-xs-12 col-sm-offset-1 p-section-padding">
                        <?php echo do_shortcode('[smartslider3 slider=132]'); ?>
						<p>サロンでは喜芳作品をご覧いただいたり、喜芳工房が手掛ける数多くのお品を手にとってご覧頂くことが可能です。<br>
							ご希望のお客様には、その場でお気に召したお品をご購入いただけます。<br>
						ご予約制となりますが、是非お気軽にお越しくださいませ。<br>
						喜芳や喜芳工房の作品をご覧いただけるだけでも誠に光栄で御座います。
						<ul class="c-list c-mt-2 text-center">
							<li>押し売りなどは御座いませんのでご安心くださいませ</li>
							<li>個人様、法人様問わずご訪問いただけます</li>
						</ul>
						</p>
						<h1 class="section--heading c-text-center">サロンのご訪問予約はこちらから</h1>
							<div class="text-center">
								<h2 class="p-heading_deco">お電話でのお問合せ</h2>
								<p class="text-big c-bold c-text-warning c-mt-2 c-no-padding"><a href="tel:0757216600">075-721-6600</a></p>
								<p class="text-center">受付時間 平日9:00～18:00</p>
							</div>
						<?php echo do_shortcode('[mwform_formkey key="3465"]'); ?>
                    </div>
                </div>
                <!-- /.p-section--content -->
            </div>
            <!-- /.col-sm-7 -->
        </div>
        <!-- /.row -->
    </section>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://rawgit.com/jquery/jquery-ui/master/ui/i18n/datepicker-ja.js"></script>


<script>
//$('#day').datepicker();
	
  $("#day").datepicker({
  	beforeShowDay: $.datepicker.noWeekends,
	minDate: "+2", 
	maxDate: "+1M +10D" 
  });
</script>

<style>
</style>

    <?php get_footer(); ?>
