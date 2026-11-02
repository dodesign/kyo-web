<?php
/**
 * 念珠ブレスレット ワークショップ（団体・出張・法人向け）（/workshop/）。2026-11-02 新設。
 * ★文章はこのファイルに直接書いている（固定ページ「ワークショップ」の本文は使っていない）。
 * ★個人のお客様向けの体験予約は、喜芳工房（kyo-kaon.jp/service/workshop/）へリンクしている。
 * 出典：260604_幼児向けワークショップチラシ（テキスト.txt・入稿PDF）、240920_講演会とワークショップチラシ/ワークショップ（大人向けチラシ）、
 *       260811_わかさ生活講演告知。写真は子どもの顔が写っていないものだけを使っている。
 *
 * @package OnePress
 */
get_header();

$ki_ask      = home_url( '/contact/?title=' . rawurlencode( 'ワークショップのご依頼・ご相談' ) );
$ki_personal = 'https://kyo-kaon.jp/service/workshop/';
?>

<?php ki_pagehead( array( 'en' => 'WORKSHOP', 'title' => '念珠ブレスレット ワークショップ', 'lead' => '園・学校・企業・地域のイベントへ。<br>京念珠の製造卸がお届けする、和文化体験。', 'img' => 'ki/ki-wk-hands1.jpg', 'crumb' => array( array( 'ワークショップ' ) ) ) ); ?>

<?php /* ---------- はじめに ---------- */ ?>
<section class="ki-sec">
	<div class="ki-wrap ki-split">
		<div class="ki-split__text" data-rv>
			<p class="ki-eyebrow ki-eyebrow--ink">FOR GROUPS</p>
			<h2 class="ki-h2">たくさんの珠から色を選び、<br>自分だけの一本を。<small>団体・出張のワークショップを承ります</small></h2>
			<p>たくさんの珠の中から、好きな色・気になる色を選んで、自分だけの念珠ブレスレットを作る体験です。保育園・幼稚園の子どもたちから、企業や団体の皆さま、地域のイベントまで。人数やご予算、目的に合わせて内容をアレンジしてお届けします。</p>
			<p class="ki-small">個人でのご参加（京都・上賀茂のサロンでの体験）は、喜芳工房のページからご予約いただけます。→ <a href="<?php echo esc_url( $ki_personal ); ?>" target="_blank" rel="noopener">京念珠ブレスレット作り体験（喜芳工房）</a></p>
		</div>
		<figure class="ki-split__img" data-rv><?php echo ki_img( 'ki/ki-wk-table.jpg', 'ワークショップの準備' ); ?></figure>
	</div>
</section>

<?php /* ---------- 選ばれる理由 ---------- */ ?>
<section class="ki-sec ki-sec--tint">
	<div class="ki-wrap">
		<?php ki_head( 'WHY ITAKURA', '板倉のワークショップの特長' ); ?>
		<div class="ki-points ki-points--3">
			<div class="ki-points__item" data-rv><span>01</span><h3>念珠の製造卸だから、珠の種類が豊富</h3><p>ふだん念珠に使っている珠をそのままご用意できます。天然石から、扱いやすく費用を抑えられる樹脂（プラスチック）の玉まで、目的やご予算に合わせて選べます。</p></div>
			<div class="ki-points__item" data-rv><span>02</span><h3>大人数・出張に対応</h3><p>園や学校、イベント会場へ出張して開催します。親子向けのイベントでは、約50名のお子さまにご参加いただいた実績もあります。</p></div>
			<div class="ki-points__item" data-rv><span>03</span><h3>カラーリストが「色」でご案内</h3><p>講師は、色彩の資格を持つ京念珠カラーリスト。気持ちや好きな色を手がかりに珠を選ぶ時間は、子どもには情操教育に、大人には自分と向き合うひとときになります。</p></div>
			<div class="ki-points__item" data-rv><span>04</span><h3>日本の文化に、手で触れる</h3><p>念珠は「念ずる珠」。京都の伝統の手しごとに、ブレスレット作りという親しみやすいかたちで触れていただけます。</p></div>
			<div class="ki-points__item" data-rv><span>05</span><h3>講演と組み合わせも</h3><p>名工 喜芳の想いや念珠のお話（講演・トーク）と、制作体験を組み合わせたプログラムも実施しています。</p></div>
			<div class="ki-points__item" data-rv><span>06</span><h3>内容は、ご相談で</h3><p>所要時間・人数・素材・場所・料金は、ご希望に合わせてご提案します。まずはお気軽にご相談ください。</p></div>
		</div>
	</div>
</section>

<?php /* ---------- プラン ---------- */ ?>
<section class="ki-sec">
	<div class="ki-wrap">
		<?php ki_head( 'PROGRAMS', 'こんな場で、こんな内容で' ); ?>
		<div class="ki-plans">
			<article class="ki-plan" data-rv>
				<div class="ki-plan__img"><?php echo ki_img( 'ki/ki-wk-sheet.jpg', '' ); ?></div>
				<div class="ki-plan__body">
					<p class="ki-plan__en">FOR KIDS</p>
					<h3>保育園・幼稚園・こども園・学校</h3>
					<p class="ki-plan__catch">「うれしい」「かなしい」「たのしい」。<br>まだ言葉にしにくい気持ちを、色で表現する和文化体験＆情操教育。</p>
					<ol class="ki-plan__steps"><li><b>1</b>感情に色をつける</li><li><b>2</b>自分で珠を選ぶ</li><li><b>3</b>ブレスレットを作る</li></ol>
					<p class="ki-plan__p">育まれる力：自分の気持ちに気づく力／自己肯定感／他者を思いやる気持ち（家族のために作ることも）／日本文化への親しみ／集中力・手先の発達</p>
					<dl class="ki-plan__dl"><dt>所要時間</dt><dd>30〜60分程度</dd><dt>人数・料金</dt><dd>ご相談ください</dd><dt>場所</dt><dd>出張開催できます</dd></dl>
				</div>
			</article>
			<article class="ki-plan" data-rv>
				<div class="ki-plan__img"><?php echo ki_img( 'ki/ki-lec-064.jpg', '' ); ?></div>
				<div class="ki-plan__body">
					<p class="ki-plan__en">FOR ADULTS</p>
					<h3>企業・団体・地域のイベント</h3>
					<p class="ki-plan__catch">色彩のお話を楽しみながら、<br>今の自分に合う色を選んで仕立てる、お守りの一本。</p>
					<p class="ki-plan__p">社員研修や福利厚生、お客様向けのイベント、地域の催しなどに。講演・トークと組み合わせたプログラムもご用意できます。</p>
					<dl class="ki-plan__dl"><dt>所要時間</dt><dd>1〜2時間程度（ご相談）</dd><dt>人数・料金</dt><dd>ご相談ください</dd><dt>場所</dt><dd>出張、または本社サロン</dd></dl>
				</div>
			</article>
			<article class="ki-plan" data-rv>
				<div class="ki-plan__img"><?php echo ki_img( 'ki/ki-wk-tea.jpg', '' ); ?></div>
				<div class="ki-plan__body">
					<p class="ki-plan__en">AT OUR SALON</p>
					<h3>本社サロンで、茶道体験とともに</h3>
					<p class="ki-plan__catch">念珠の美術館のようなサロンで、<br>和の静寂に包まれる時間を。</p>
					<p class="ki-plan__p">京都・上賀茂の本社サロンでは、念珠ブレスレットの創作体験に、茶道体験を組み合わせることもできます。少人数のグループや、海外からのお客様のおもてなしにも。</p>
					<dl class="ki-plan__dl"><dt>場所</dt><dd>本社サロン（京都市北区上賀茂・駐車場あり）</dd><dt>個人の方</dt><dd><a href="<?php echo esc_url( $ki_personal ); ?>" target="_blank" rel="noopener">喜芳工房の体験ページ</a>からご予約いただけます</dd></dl>
				</div>
			</article>
		</div>
	</div>
</section>

<?php /* ---------- 素材のアレンジ ---------- */ ?>
<section class="ki-sec ki-sec--tint">
	<div class="ki-wrap ki-wrap--narrow">
		<?php ki_head( 'ARRANGE', 'ご予算・人数に合わせてアレンジ' ); ?>
		<table class="ki-table" data-rv>
			<tr><th>珠（素材）</th><td>念珠に使う天然石から、樹脂（プラスチック）の玉まで。樹脂の玉にすると、費用を抑えて大人数でもお楽しみいただけます。</td></tr>
			<tr><th>人数</th><td>少人数から大人数まで。親子向けイベントで約50名のお子さまにご参加いただいた実績があります。</td></tr>
			<tr><th>内容</th><td>ブレスレット制作／感情と色のワーク／色彩のお話／講演・トーク／茶道体験（本社サロン）</td></tr>
			<tr><th>場所</th><td>出張（園・学校・会社・イベント会場など）、または本社サロン</td></tr>
			<tr><th>料金</th><td>内容・人数・素材に合わせてお見積りします</td></tr>
		</table>
	</div>
</section>

<?php /* ---------- 写真 ---------- */ ?>
<section class="ki-lecgal ki-lecgal--4">
	<?php foreach ( array( 'ki-wk-hands2', 'ki-wk-material', 'ki-wk-hand', 'ki-lec-025' ) as $ph ) : ?>
		<figure data-rv><?php echo ki_img( 'ki/' . $ph . '.jpg', 'ワークショップのようす' ); ?></figure>
	<?php endforeach; ?>
</section>

<?php /* ---------- 実績 ---------- */ ?>
<section class="ki-sec">
	<div class="ki-wrap ki-wrap--narrow">
		<?php ki_head( 'RECORDS', '開催実績' ); ?>
		<ul class="ki-history">
			<li data-rv><time>毎年</time><div><b>HOPPA 様（保育園・認定こども園）</b><span>幼児向け和文化体験として毎年開催。子どもたちの感性や主体性を育む時間としてご好評いただいています。</span></div></li>
			<li data-rv><time>毎年</time><div><b>きょうとみらい博</b><span>親子向けワークショップとして出展。約50名のお子さまにご参加いただいた開催実績もございます。</span></div></li>
			<li data-rv><time>2026</time><div><b>わかさの舞台（京都・四条烏丸）</b><span>京都伝統工芸体験会、トークイベントと合わせたオリジナルブレスレット制作体験</span></div></li>
		</ul>
	</div>
</section>

<?php /* ---------- ご依頼 ---------- */ ?>
<section class="ki-sec ki-sec--tint ki-lecask">
	<div class="ki-wrap ki-wrap--narrow ki-center">
		<?php ki_head( 'REQUEST', 'ワークショップのご依頼・ご相談' ); ?>
		<p class="ki-lead">日時・人数・場所・ご予算など、決まっていることだけで大丈夫です。お気軽にご相談ください。</p>
		<div class="ki-ask__btns">
			<a class="ki-btn ki-btn--ink" href="<?php echo esc_url( $ki_ask ); ?>">ワークショップについて問い合わせる</a>
			<a class="ki-btn ki-btn--outline" <?php echo ki_tel_attr( 'workshop' ); ?>>電話 <?php echo esc_html( KI_TEL ); ?></a>
		</div>
		<div class="ki-flyers ki-flyers--pair" data-ki-zoom>
			<figure><?php echo ki_img( 'ki/ki-wk-flyer-adult1.jpg', '念珠ブレスレット創作体験のチラシ（表）' ); ?><figcaption>大人向け創作体験（表）</figcaption></figure>
			<figure><?php echo ki_img( 'ki/ki-wk-flyer-adult2.jpg', '念珠ブレスレット創作体験のチラシ（裏）' ); ?><figcaption>大人向け創作体験（裏）</figcaption></figure>
		</div>
		<div class="ki-flyers ki-flyers--one" data-ki-zoom>
			<figure><?php echo ki_img( 'ki/ki-wk-flyer-kids.jpg', '保育園・幼稚園・こども園向け 出張ワークショップのチラシ' ); ?><figcaption>園・学校向け（出張）</figcaption></figure>
		</div>
		<p class="ki-small" style="margin-top:30px">個人でのご参加は <a href="<?php echo esc_url( $ki_personal ); ?>" target="_blank" rel="noopener">喜芳工房の「京念珠ブレスレット作り体験」</a> からご予約いただけます。</p>
	</div>
</section>

<?php get_footer(); ?>
