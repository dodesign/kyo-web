<?php
/**
 * 会社概要（/company/）。2026-11-02 リニューアル（旧版は Git の履歴）。
 * ★文章はこのファイルに直接書いている。
 *   サロンの写真は旧ページの Smart Slider 3（スライダー132）をやめ、common/img/ki/ の写真（2026-06 撮影）に変えた。
 *
 * @package OnePress
 */
get_header();
?>

<?php ki_pagehead( array( 'en' => 'COMPANY', 'title' => '会社概要', 'lead' => '京の名工 喜芳の技術と想いを受け継いで。', 'img' => 'ki/ki-mg0003.jpg', 'crumb' => array( array( '会社概要' ) ) ) ); ?>

<?php /* ---------- トップメッセージ ---------- */ ?>
<section class="ki-sec">
	<div class="ki-wrap ki-message">
		<figure class="ki-message__img" data-rv><?php echo ki_img( 'ki/ki-ceo-salon.jpg', '代表取締役 辰尾由佳' ); ?><figcaption>代表取締役　辰尾 由佳</figcaption></figure>
		<div class="ki-message__body" data-rv>
			<p class="ki-eyebrow ki-eyebrow--ink">MESSAGE</p>
			<h2 class="ki-h2">トップメッセージ<small>「念珠を持つ人の幸せを願い、その人のお守りとなるように念じて作る」</small></h2>
			<p>12歳の頃から念珠を作り始め、以来、実に80年間の人生全てを念珠に捧げた喜芳。その孫として幼少の頃より喜芳工房で念珠作りを目にし、喜芳の念珠に対する想いを感じていました。いつしか、喜芳は「自分の念珠に対する思い」を私に受け継いで欲しいと言うようになりました。私も「喜芳の想いと技術」を絶やさぬように受け継ぎ、次へと繋げたいと思うようになりました。</p>
			<p>確かな技術を伝承することは勿論、何よりも「念珠を持つ人の幸せを願い、その人のお守りとなるように念じて作る」という喜芳の想いを受け継いで、私たちがお客様にできることを考えました。基本を大切にしながらも、今の時代に合わせて、お客様に喜んでいただけるお念珠を作り続けること。それが、私たちにできることです。</p>
			<p>喜芳は京都の伝統をこよなく愛し、それらに触れることで感性が研ぎ澄まされていきました。京の地で育まれた感性は、他の誰もが考えつかない美しくこだわりのある念珠を次々と生み出し、その数々の念珠に関わる人々を幸せにしました。喜芳がその時代に、伝統や芸事から学んだように、私も今の時代に合った、自身にしかできない学び方を念珠に取り入れています。</p>
			<p>学びの一つとして、念珠を構成するさまざまな要素の中から「色」に着目し、京念珠カラーリストとなりました。念珠は様々な色の石を扱います。最近では房の色も多様化してきています。念珠には石のパワーもありますが、色のパワーもあるのです。色とは光であり、光は皮膚や目から細胞や脳へと伝わり、私達の心や体に大きく影響を与えます。ぜひ、念珠を通して様々な色を取り入れていただきたいと思っています。配色の原理・原則を念珠に取り入れ、一人でも多くのお客様に喜んでいただける念珠を提供いたします。</p>
			<p>全ては、「お客様に喜んでいただきたい」という喜芳の思いを受け継ぐためです。それこそが私の喜びでもあります。</p>
			<div class="ki-sign">
				<p>株式会社意匠京念珠板倉<br><b>代表取締役　辰尾 由佳</b></p>
				<ul>
					<li>文部科学省認定 色彩検定2級</li>
					<li>国際カラーデザイン協会 パーソナルカラーレッスン認定</li>
					<li>リュッシャー・カラーサイコアナリスト（色彩心理診断士）</li>
					<li>センセーション・トリコロール 認定講師</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<?php /* ---------- 会社概要 ---------- */ ?>
<section class="ki-sec ki-sec--tint">
	<div class="ki-wrap ki-wrap--narrow">
		<?php ki_head( 'PROFILE', '会社概要' ); ?>
		<table class="ki-table" data-rv>
			<tr><th>会社名</th><td>株式会社意匠京念珠板倉</td></tr>
			<tr><th>代表取締役</th><td>辰尾 由佳</td></tr>
			<tr><th>設立</th><td>昭和44年（1969年）</td></tr>
			<tr><th>事業内容</th><td>京念珠（数珠）の企画・製造・卸売り／通信販売（喜芳工房）／念珠の修理</td></tr>
			<tr><th>所在地</th><td>〒603-8083<br>京都府京都市北区上賀茂向縄手町40-1</td></tr>
			<tr><th>電話</th><td><a <?php echo ki_tel_attr( 'company' ); ?>><?php echo esc_html( KI_TEL ); ?></a>（平日 9:00–18:00）</td></tr>
			<tr><th>FAX</th><td><?php echo esc_html( KI_FAX ); ?></td></tr>
			<tr><th>メール</th><td>info@kyo-itakura.com</td></tr>
			<tr><th>店舗</th><td>本社サロン（上賀茂）／烏丸店（ハンケイ5mショップ内）</td></tr>
			<tr><th>オンラインショップ</th><td><a href="<?php echo esc_url( KI_SHOP_URL ); ?>" target="_blank" rel="noopener">喜芳工房（kyo-kaon.jp）</a>／<a href="<?php echo esc_url( KI_AMAZON_URL ); ?>" target="_blank" rel="noopener">喜芳工房 Amazon店</a></td></tr>
		</table>
	</div>
</section>

<?php /* ---------- サロン ---------- */ ?>
<section class="ki-sec">
	<div class="ki-wrap">
		<?php ki_head( 'SALON', 'サロン（ショールーム）' ); ?>
		<div class="ki-salon">
			<div class="ki-salon__gallery" data-rv>
				<?php echo ki_img( 'ki/ki-0004.jpg', 'サロン', array( 'class' => 'is-main' ) ); ?>
				<?php echo ki_img( 'ki/ki-0014.jpg', '' ); ?>
				<?php echo ki_img( 'ki/ki-0034.jpg', '' ); ?>
			</div>
			<div class="ki-salon__text" data-rv>
				<p>サロンでは喜芳の作品をご覧いただいたり、喜芳工房が手がける数多くのお品を手に取ってご覧いただけます。ご希望のお客様には、その場でお気に召したお品をご購入いただけます。喜芳や喜芳工房の作品をご覧いただけるだけでも、誠に光栄でございます。</p>
				<ul class="ki-check">
					<li>押し売りなどはございませんので、ご安心くださいませ</li>
					<li>個人様・法人様問わずご訪問いただけます</li>
					<li>平日 9:00–18:00（土日祝は事前のご予約で、できる限り対応いたします）</li>
					<li>駐車場あり</li>
				</ul>
				<div class="ki-subshop">
					<h3>烏丸店<span>（ハンケイ5mショップ内）</span></h3>
					<p>〒600-8412 京都府京都市下京区二帖半敷町652 からすま京都ホテル1F<br>水・木・金 11:00–19:00／ご予約不要</p>
					<p>アクセスの良い四条烏丸。ハンケイ5mショップ内に専用ブースがございます。喜芳工房やヒトツブカラーのアイテムをお取り扱いしております。</p>
				</div>
				<a class="ki-btn ki-btn--ink" href="#ki-access">地図を見る</a>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>
