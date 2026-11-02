<?php
/**
 * 講演・トークイベント（/lecture/）。2026-11-02 新設。
 * ★文章はこのファイルに直接書いている（固定ページ「講演・トークイベント」の本文は使っていない）。
 * 出典：240920_講演会とワークショップチラシ（2024年の講演会チラシ）、250719_倫理法人会_講演用資料、
 *       260811_わかさ生活講演告知（記事案・インスタ投稿文・チラシ）。写真は 06.画像素材/260918_わかさ生活講演。
 *
 * @package OnePress
 */
get_header();

$ki_ask = home_url( '/contact/?title=' . rawurlencode( '講演のご依頼・ご相談' ) );

$ki_themes = array(
	array(
		't'   => '心棒の“棒”を折るな',
		'sub' => '京念珠師 喜芳の信念と技術を語る',
		'p'   => '倒れる寸前まで念珠を作り続けるほどに、人生のすべてを念珠に捧げた京念珠師 喜芳。喜芳の歩んだ道や職人としての哲学、そして京念珠の老舗「意匠京念珠板倉」の独自の技術とこだわりについてお話しします。',
	),
	array(
		't'   => '一粒の珠が、人と人とをつなぐ',
		'sub' => '念珠とともに歩んだ、ご縁の物語',
		'p'   => '偶然のような「ご縁」が未来を切り拓く力になること。伝統と現代の融合が新しい価値を生むこと。一粒の余り珠から生まれた学生とのコラボブランド「ヒトツブカラー」など、念珠がつないだご縁の物語をお話しします。',
	),
	array(
		't'   => 'いい言葉を響かせる、念珠のはなし',
		'sub' => '祖母、名工喜芳の想いを今へ',
		'p'   => '石の種類や作り方のお話ではありません。念珠とは、そもそも何のためにあるものなのか。「この念珠を持つ人が幸せになってほしい」――喜芳が念珠の向こうにいつも見ていた「人」への想いを、孫であり三代目である辰尾がお話しします。',
	),
);

$ki_history = array(
	array( '2026.09', 'WAKASA&CO. KYOTO「わかさの舞台」（京都・四条烏丸）', '第2回トークイベント「いい言葉を響かせる、念珠のはなし ― 祖母、名工喜芳の想いを今へ ―」／午後はブレスレット制作体験' ),
	array( '2025', '倫理法人会', '講演「一粒の珠が、人と人とをつなぐ ― 念珠とともに歩んだ、ご縁の物語」' ),
	array( '2022.05', '京都産業大学', '講義「グローカル人材論特殊」にゲスト登壇' ),
);
?>

<?php ki_pagehead( array( 'en' => 'LECTURE', 'title' => '講演・トークイベント', 'lead' => '名工 喜芳の信念と、念珠に込めた想いを語ります。', 'img' => 'ki/ki-lec-044.jpg', 'crumb' => array( array( '講演・トークイベント' ) ) ) ); ?>

<?php /* ---------- はじめに ---------- */ ?>
<section class="ki-sec">
	<div class="ki-wrap ki-split">
		<div class="ki-split__text" data-rv>
			<p class="ki-eyebrow ki-eyebrow--ink">ABOUT</p>
			<h2 class="ki-h2">喜芳の想いの伝道師として<small>企業・学校・経済団体・公民館など、さまざまな場へ</small></h2>
			<p>十三歳の頃から八十年間、人生のすべてを念珠にささげた京念珠師 喜芳。講演では、喜芳の孫であり「意匠京念珠板倉」代表取締役の辰尾が、喜芳の歩んだ道や職人としての哲学、そして京念珠の独自の技術とこだわりについてお話しします。</p>
			<p>念珠は、ただの仏具ではありません。「念（おも）う心」を珠に込めるもの。念珠に詳しくない方にも、どうぞお気軽にお聞きいただける内容です。</p>
			<p class="ki-small">ご希望に応じて、色彩のお話を交えたブレスレット制作体験との組み合わせもご相談いただけます。</p>
		</div>
		<figure class="ki-split__img" data-rv><?php echo ki_img( 'ki/ki-lec-036.jpg', '講演する辰尾' ); ?></figure>
	</div>
</section>

<?php /* ---------- 演題 ---------- */ ?>
<section class="ki-sec ki-sec--tint">
	<div class="ki-wrap">
		<?php ki_head( 'THEMES', 'これまでの演題' ); ?>
		<div class="ki-themes">
			<?php foreach ( $ki_themes as $i => $t ) : ?>
			<article class="ki-theme" data-rv>
				<p class="ki-theme__no"><?php echo sprintf( '%02d', $i + 1 ); ?></p>
				<h3 class="ki-theme__t">「<?php echo esc_html( $t['t'] ); ?>」</h3>
				<p class="ki-theme__sub">― <?php echo esc_html( $t['sub'] ); ?> ―</p>
				<p class="ki-theme__p"><?php echo esc_html( $t['p'] ); ?></p>
			</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php /* ---------- 写真 ---------- */ ?>
<section class="ki-lecgal">
	<?php foreach ( array( 'ki-lec-064', 'ki-lec-058', 'ki-lec-101', 'ki-lec-078', 'ki-lec-025', 'ki-lec-052' ) as $ph ) : ?>
		<figure data-rv><?php echo ki_img( 'ki/' . $ph . '.jpg', '講演のようす' ); ?></figure>
	<?php endforeach; ?>
</section>

<?php /* ---------- 実績 ---------- */ ?>
<section class="ki-sec">
	<div class="ki-wrap ki-wrap--narrow">
		<?php ki_head( 'HISTORY', '講演・登壇の実績' ); ?>
		<ul class="ki-history">
			<?php foreach ( $ki_history as $h ) : ?>
			<li data-rv><time><?php echo esc_html( $h[0] ); ?></time><div><b><?php echo esc_html( $h[1] ); ?></b><span><?php echo esc_html( $h[2] ); ?></span></div></li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>

<?php /* ---------- 話す人 ---------- */ ?>
<section class="ki-sec ki-sec--tint">
	<div class="ki-wrap ki-split ki-split--rev">
		<div class="ki-split__text" data-rv>
			<p class="ki-eyebrow ki-eyebrow--ink">SPEAKER</p>
			<h2 class="ki-h2">辰尾 由佳<small>株式会社意匠京念珠板倉 代表取締役／京念珠カラーリスト</small></h2>
			<p>京都生まれ。祖母である京の名工「喜芳」のもとで、幼少の頃から念珠作りを目にして育つ。2017年、「意匠京念珠板倉」三代目に就任。喜芳から受け継いだ技術と想いを伝える伝道師として活動を続けている。2018年にショップチャンネルに出演、2019年には京都新聞に「名工だった祖母の想い 自分が引き継ぐ」として掲載された。念珠を構成する要素の中から「色」に着目し、京念珠カラーリストとして配色の原理・原則を念珠に取り入れている。2021年からは学生とのコラボレーションブランド「ヒトツブカラー」も手がける。</p>
			<ul class="ki-check">
				<li>文部科学省認定 色彩検定2級</li>
				<li>国際カラーデザイン協会 パーソナルカラーレッスン認定</li>
				<li>リュッシャー・カラーサイコアナリスト（色彩心理診断士）</li>
				<li>センセーション・トリコロール 認定講師</li>
			</ul>
		</div>
		<figure class="ki-split__img" data-rv><?php echo ki_img( 'ki/ki-lec-004.jpg', '辰尾由佳' ); ?></figure>
	</div>
</section>

<?php /* ---------- ご依頼 ---------- */ ?>
<section class="ki-sec ki-lecask">
	<div class="ki-wrap ki-wrap--narrow ki-center">
		<?php ki_head( 'REQUEST', '講演のご依頼・ご相談' ); ?>
		<dl class="ki-lecask__dl">
			<dt>対象</dt><dd>企業・学校・サークル・経済団体・公民館・老人会など、幅広い団体の皆様</dd>
			<dt>費用</dt><dd>ご相談ください</dd>
			<dt>お申し込み</dt><dd>お電話、またはお問い合わせフォームから</dd>
		</dl>
		<div class="ki-ask__btns">
			<a class="ki-btn ki-btn--ink" href="<?php echo esc_url( $ki_ask ); ?>">講演について問い合わせる</a>
			<a class="ki-btn ki-btn--outline" <?php echo ki_tel_attr( 'lecture' ); ?>>電話 <?php echo esc_html( KI_TEL ); ?></a>
		</div>
		<div class="ki-flyers">
			<figure><?php echo ki_img( 'ki/ki-lec-flyer-2410.jpg', '念珠講演会のチラシ（2024年）' ); ?><figcaption>念珠講演会のチラシ（2024年）</figcaption></figure>
			<figure><?php echo ki_img( 'ki/ki-lec-flyer-2609.jpg', 'トークイベントのチラシ（2026年9月）' ); ?><figcaption>トークイベントのチラシ（2026年9月）</figcaption></figure>
		</div>
	</div>
</section>

<?php get_footer(); ?>
