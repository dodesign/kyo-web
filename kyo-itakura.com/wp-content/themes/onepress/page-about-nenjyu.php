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
                    <h1 class="u-color-light">念珠（数珠）とは？</h1>

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
    <section class="p-under__sub-title p-under__sub-title__case">
        <div class="container">
            <div class="col-sm-6 col-sm-offset-6">
                <h2>京念珠の老舗<br> 製造卸一筋48年の実績
                </h2>
                <h3>お客様をのご要望を確実に具現化することを第一 に考え、ひとつひとつ手作りしています。
                </h3>
                <p class="p-under-title__lead">こちらに掲載している以外にもさまざまな実績があります。<br> ぜひ一度お問い合わせください。
                </p>
            </div>
        </div>
        <!-- /.container -->
    </section>
    <!-- /.p-under-title -->
    <section class="p-under p-intro section-bg-jpn-light p-section-padding">

        <div class="row">
            <div class="container">

                <div class="col-sm-9  col-sm-push-3">
                    <div class="p-case p-section--content">
                            <h1 class="section--heading c-text-center">
                                数珠・念珠とは
                            </h1>
                        <p>
                            <img class="img-w100" src="/wp-content/themes/onepress/common/img/about_nenjyu2.jpg" alt="">
                        </p>
                        <p>数珠は「珠数」「寿珠」などとも呼ばれ、全国的に広く普及している身近な仏具です。<br>
念珠は「念ずる珠」とかくように、念仏を唱える際、その回数を数える為に使われる事から呼ばれるようになりました。<br>
念珠を手に持ち合掌をし一心に祈る事で、すべての煩悩が消え去り、この上ない功徳を得られると言われています。</p>
                            <h1 class="section--heading c-text-center">
                                数珠・念珠の起源
                            </h1>
                        <p>
                            <img class="img-w100" src="/wp-content/themes/onepress/common/img/about_nenjyu3.jpg" alt="">
                        </p>
                        <p>念珠の起源は、はるかお釈迦様の頃にさかのぼります。「モクゲンシキョウ」の中で、ハルリ王は、お釈迦様に「我が国は非常に貧しく、その上戦乱や疫病のため仏道の修行をする余裕もありません。」と伝えたところ、「菩提樹の実を一〇八個貫いて、それを手に仏の名をたたえたならば、それは立派な修行ですよ」とお答えになったことが始まりとされています。<br>
その後、天平八年（736年）に南インドのボダイセンナというお坊さんが、摂津の難波に来た際に、菩提樹の念珠を天皇に献上したことにより日本全国へ広まったとされています。<br>
現在ではお葬式はもちろん、お守りとしても使われます。他にもブレスレットなどのアクセサリーとして普段の生活で身に付けるなど、利用用途は格段に広がっています。</p>
                            <h1 class="section--heading c-text-center">
                                念珠の構成
                            </h1>
                        <p>
                            <img class="img-w100" src="/wp-content/themes/onepress/common/img/about_nenjyu.jpg" alt="">
                        </p>
                           <table class="table_line" width="100%" cellspacing="1" border="0">
                            <tbody>
                                <tr>
                                    <th>主玉</th>
                                    <td>男性用念珠は18玉
（主玉16mm）、20玉（主玉14mm）、22玉（主玉12mm）、27玉（主玉10mm）、女性用念珠は7mm（主玉の玉数が37玉、38玉）、8mm（主玉の玉数が33玉、34玉）が一般的な片手念珠で使用されています。</td>
                                </tr>
                                <tr>
                                    <th>親玉</th>
                                    <td>中心的な玉です。阿弥陀仏如来、釈迦如来の象徴です。
                                    </td>
                                </tr>
                                <tr>
                                    <th>天玉</th>
                                    <td>左右対称に2つ入ります。四天王や四菩薩の象徴です。</td>
                                </tr>
                                <tr>
                                    <th>中通し紐</th>
                                    <td>念珠の珠を繋いでいる紐です。観音菩薩の象徴です。</td>
                                </tr>
                                <tr>
                                    <th>ボサ</th>
                                    <td>親玉と房をつなぐ玉です。</td>
                                </tr>
                                <tr>
                                    <th>軸</th>
                                    <td>房をつなぐ軸です。念珠の美しさを決めるといわれています。</td>
                                </tr>
                                <tr>
                                    <th>房</th>
                                    <td>房は男性用が、頭付房、紐房、凡天房、かがり凡房。
女性用は頭付房、凡天房、かがり凡房、切り房がよく使用されます。
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
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
