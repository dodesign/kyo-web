<?php
/**
 * 念珠（数珠）とは（/about/about-nenjyu/）。2026-11-02 リニューアル（旧版は Git の履歴）。
 * 文章は旧ページのまま（「凡天房」→「梵天房」の表記だけ直した）。
 *
 * @package OnePress
 */
get_header();
?>

<?php ki_pagehead( array( 'en' => 'ABOUT NENJU', 'title' => '念珠（数珠）とは', 'lead' => '念ずる珠。心のお守りとなる、身近な仏具。', 'img' => 'ki/ki-0094.jpg', 'crumb' => array( array( '板倉のこだわり', home_url( '/about/' ) ), array( '念珠（数珠）とは' ) ) ) ); ?>

<section class="ki-sec">
	<div class="ki-wrap ki-wrap--narrow ki-prose ki-prose--doc">

                            <h2>数珠・念珠とは</h2>
                        <p>
                            <img class="ki-iv__img" src="/wp-content/themes/onepress/common/img/about_nenjyu2.jpg" alt="">
                        </p>
                        <p>数珠は「珠数」「寿珠」などとも呼ばれ、全国的に広く普及している身近な仏具です。<br>
念珠は「念ずる珠」とかくように、念仏を唱える際、その回数を数える為に使われる事から呼ばれるようになりました。<br>
念珠を手に持ち合掌をし一心に祈る事で、すべての煩悩が消え去り、この上ない功徳を得られると言われています。</p>
                            <h2>数珠・念珠の起源</h2>
                        <p>
                            <img class="ki-iv__img" src="/wp-content/themes/onepress/common/img/about_nenjyu3.jpg" alt="">
                        </p>
                        <p>念珠の起源は、はるかお釈迦様の頃にさかのぼります。「モクゲンシキョウ」の中で、ハルリ王は、お釈迦様に「我が国は非常に貧しく、その上戦乱や疫病のため仏道の修行をする余裕もありません。」と伝えたところ、「菩提樹の実を一〇八個貫いて、それを手に仏の名をたたえたならば、それは立派な修行ですよ」とお答えになったことが始まりとされています。<br>
その後、天平八年（736年）に南インドのボダイセンナというお坊さんが、摂津の難波に来た際に、菩提樹の念珠を天皇に献上したことにより日本全国へ広まったとされています。<br>
現在ではお葬式はもちろん、お守りとしても使われます。他にもブレスレットなどのアクセサリーとして普段の生活で身に付けるなど、利用用途は格段に広がっています。</p>
                            <h2>念珠の構成</h2>
                        <p>
                            <img class="ki-iv__img" src="/wp-content/themes/onepress/common/img/about_nenjyu.jpg" alt="">
                        </p>
                           <table class="ki-table">
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
                                    <td>房は男性用が、頭付房、紐房、梵天房、かがり梵天房。
女性用は頭付房、梵天房、かがり梵天房、切り房がよく使用されます。
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                    
	</div>
</section>

<section class="ki-sec ki-sec--tint">
	<div class="ki-wrap">
		<?php ki_head( 'PRODUCTS', '板倉の京念珠', get_post_type_archive_link( 'case' ), '製品紹介・実績を見る' ); ?>
		<div class="ki-cards">
			<?php
			$ki_q = new WP_Query( array( 'post_type' => 'case', 'posts_per_page' => 4, 'no_found_rows' => true ) );
			while ( $ki_q->have_posts() ) { $ki_q->the_post(); ki_case_card(); }
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>

<?php get_footer(); ?>
