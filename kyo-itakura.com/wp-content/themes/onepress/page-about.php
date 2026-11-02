<?php
/**
 * 板倉のこだわり（/about/）。2026-11-02 リニューアル（旧版は Git の履歴）。
 * ★文章はこのファイルに直接書いている（固定ページの本文は使っていない）。
 *   ヘッダーのメニューから #oroshi・#netshop・#hitotsubu に飛んでくるので、この id は変えないこと。
 *
 * @package OnePress
 */
get_header();

$ki_skills = array(
	// [ 見出し, 文章, 大きい写真, 小さい写真（旧サイトの写真）, 意匠登録か, 一言 ]
	array( '軸部分の飾り結び', '念珠の美しさを決めるといわれる軸部分。一般的な飾り結びとは一線を画し、手作業で仕上げる美しい飾り結びで仕上げています。喜芳が考案した組み台で、正確で硬く、きれいな四つ編みに。', 'ki/ki-ws-0029.jpg', 'about_skill_img1.jpg', true, '帯締めを組むように、念珠を編む。' ),
	array( '二色の芯糸が産み出す美しさ「京のいろは」', '芯糸がふたつの色で彩られた技術です。水晶などの透明度の高い玉に、2色の芯糸が石の奥から美しく映えます。光の加減や見る角度によって見える芯糸の色が異なったり、二色が調和して見えたり、絶妙な美しさです。', 'ki/ki-0094.jpg', 'about_skill_img2.jpg', true, '珠の奥から、ふたつの色が透ける。' ),
	array( '一粒一粒見極めて仕入れる「珠」', '念珠の基本となる石は、質の良い物を選びます。職人自ら信頼できる問屋で買い付けを行います。ご希望の珠をお探ししてお仕立てすることも可能です。', 'ki/ki-0052.jpg', 'about_skill_img3.jpg', false, '一粒ずつ、目で確かめて。' ),
	array( 'カラーリストによる、色の特性を引き出す「配色」', '石のもつ特性や、人が色を見たときの心理的効果を最大限に引き出す組み合わせを日々研究しています。', 'ki/ki-0042.jpg', 'about_skill_img4.jpg', false, '色は、心に届く。' ),
	array( '京都の伝統職人が仕立てる「房」', '京都の伝統職人が仕立てた、高い品質の正絹を使用しています。淡い紫やピンク、ブルーなど、さし色を配した洗練された房も。数本の差し色をいれるなどのご要望にお応えすることも可能です。', 'ki/ki-0082.jpg', 'about_skill_img5.jpg', false, '正絹の、やわらかな彩り。' ),
	array( '長くお使いいただくために「高級桐箱」', '私たちは、お客様の目に触れるものすべてにこだわっています。高級桐箱と中板には板倉の毛筆筆耕をいれ、念珠に合わせたカラーで装飾しています。その後、一つひとつ、真心をこめて梱包しています。', 'ki/ki-0059.jpg', 'about_skill_img6.jpg', false, '手に取るその時まで、美しく。' ),
);
?>

<?php ki_pagehead( array( 'en' => 'OUR CRAFT', 'title' => '板倉のこだわり', 'lead' => '板倉でしか作れない、京念珠を。', 'img' => 'ki/ki-mg0110.jpg', 'crumb' => array( array( '板倉のこだわり' ) ) ) ); ?>

<?php /* ---------- 京念珠製造卸事業 ---------- */ ?>
<section class="ki-sec" id="oroshi">
	<div class="ki-wrap ki-split">
		<div class="ki-split__text" data-rv>
			<p class="ki-eyebrow ki-eyebrow--ink">WHOLESALE</p>
			<h2 class="ki-h2">京念珠製造卸事業<small>すべてはお客様のために。</small></h2>
			<p>株式会社意匠京念珠板倉は、家庭用から業務用までの意匠京念珠の企画・製造・卸売りを行っている製造卸業者です。昭和44年の設立から<?php echo (int) ki_years(); ?>年。お客様のご要望を確実に具現化することを第一に考え、ひとつひとつ手作りしています。</p>
			<h3 class="ki-h3">一つひとつ丁寧に、心をこめて作ります</h3>
			<p>念珠は、故人を偲ぶときに使う大切なもの。念珠は「念ずる珠」とかくように、心のお守りとなります。時には、ふとした瞬間に見るだけで、あるいは触るだけで心安らぐ拠り所として使っていただけるように、一つひとつ丁寧に、心をこめて作ります。</p>
			<p>喜芳は、日常生活で京の四季折々に触れて美しいと感じた色合いや、歌舞伎・茶道・生け花といった京文化から学んだことから創作念珠を発想しました。板倉の念珠は、喜芳の創作のルーツとなった「自然物の色合い」や「京文化」を念珠へ取り入れています。</p>
		</div>
		<figure class="ki-split__img" data-rv><?php echo ki_img( 'about_img1.jpg', '喜芳工房' ); ?></figure>
	</div>
	<div class="ki-wrap ki-wrap--narrow ki-video" data-rv>
		<video controls muted playsinline preload="metadata" poster="<?php echo esc_url( ki_img_url( 'ki/ki-mg0055.jpg' ) ); ?>"><source src="/wp-content/uploads/2019/01/movie_short_low_181229.mp4" type="video/mp4"></video>
	</div>
</section>

<?php /* ---------- 卸のお取引 ---------- */ ?>
<section class="ki-sec ki-sec--tint">
	<div class="ki-wrap">
		<?php ki_head( 'FOR BUSINESS', '卸のお取引について' ); ?>
		<div class="ki-points">
			<div class="ki-points__item" data-rv><span>01</span><h3>ひとつからご注文可能</h3><p>月々の固定費や最低取引額などの制限はございません。ご入用の際に、必要な分をご発注いただけます。</p></div>
			<div class="ki-points__item" data-rv><span>02</span><h3>サンプルをお持ちします</h3><p>関西一円であればサンプルをお持ちしてお話を伺います。名古屋と富山には隔月で担当者が参ります。その他の地域には郵送で対応いたします。</p></div>
			<div class="ki-points__item" data-rv><span>03</span><h3>季節のラインナップ</h3><p>季節によってお取り扱いのお念珠が異なります。季節の珠や房を、メインのラインナップの念珠に取り入れています。</p></div>
			<div class="ki-points__item" data-rv><span>04</span><h3>オーダーメイド</h3><p>各宗派の本式や略式はもちろん、ご希望のお色の珠などでのお仕立ても可能です。お探しの材質や色目、ご予算など、ご遠慮なくご相談ください。</p></div>
		</div>
		<p class="ki-center ki-small" data-rv>個人の方や個人事業主の方からのお問い合わせも大歓迎です。お問い合わせいただいた方への営業のお電話はいたしませんので、ご安心ください。</p>
		<div class="ki-center" data-rv><a class="ki-btn ki-btn--ink" href="<?php echo esc_url( home_url( '/contact/?title=' . rawurlencode( '卸・お取引について' ) ) ); ?>">卸・お取引のお問い合わせ</a></div>
	</div>
</section>

<?php /* ---------- 板倉の技術（写真を大きく、交互に） ---------- */ ?>
<section class="ki-tech-intro">
	<?php echo ki_img( 'ki/ki-ws-0021.jpg', '', array( 'class' => 'ki-tech-intro__bg' ) ); ?>
	<div class="ki-wrap ki-tech-intro__in" data-rv>
		<p class="ki-eyebrow">TECHNIQUE</p>
		<h2>板倉の技術</h2>
		<p>珠をとおし、軸を編み、房を付ける。<br>一本の念珠は、いくつもの手を経て仕上がります。</p>
	</div>
</section>
<section class="ki-tech2">
	<?php foreach ( $ki_skills as $i => $s ) : ?>
	<article class="ki-tech2__row<?php echo $i % 2 ? ' is-rev' : ''; ?>">
		<div class="ki-tech2__img" data-rv>
			<?php echo ki_img( $s[2], $s[0] ); ?>
			<span class="ki-tech2__sub"><?php echo ki_img( $s[3], '' ); ?></span>
		</div>
		<div class="ki-tech2__body" data-rv>
			<p class="ki-tech2__no"><?php echo sprintf( '%02d', $i + 1 ); ?></p>
			<p class="ki-tech2__catch"><?php echo esc_html( $s[5] ); ?></p>
			<h3 class="ki-tech2__t"><?php echo esc_html( $s[0] ); ?></h3>
			<p class="ki-tech2__p"><?php echo esc_html( $s[1] ); ?></p>
			<?php if ( $s[4] ) : ?><p class="ki-skill__note">意匠登録済み。板倉だけがご提供できる、独自の製法です。</p><?php endif; ?>
		</div>
	</article>
	<?php endforeach; ?>
</section>
<section class="ki-sec ki-sec--dark2">
	<div class="ki-wrap">
		<div class="ki-photostory" data-rv>
			<?php foreach ( array( 'ki-ws-0011', 'ki-ws-0034', 'ki-ws-0041', 'ki-ws-0049', 'ki-ws-0057' ) as $ph ) : ?>
				<?php echo ki_img( 'ki/' . $ph . '.jpg', '喜芳工房の手仕事' ); ?>
			<?php endforeach; ?>
		</div>
		<div class="ki-wrap--narrow ki-video" data-rv>
			<p class="ki-video__cap">念珠ができるまで（約3分）</p>
			<video controls muted playsinline preload="none" poster="<?php echo esc_url( ki_img_url( 'ki/ki-mg0112.jpg' ) ); ?>"><source src="<?php echo esc_url( get_template_directory_uri() . '/common/movie/process_3min.mp4' ); ?>" type="video/mp4"></video>
		</div>
	</div>
</section>

<?php /* ---------- 喜芳工房の職人 ---------- */ ?>
<section class="ki-sec ki-sec--tint">
	<div class="ki-wrap ki-split ki-split--rev">
		<div class="ki-split__text" data-rv>
			<p class="ki-eyebrow ki-eyebrow--ink">ARTISANS</p>
			<h2 class="ki-h2">喜芳工房の職人<small>それぞれの分野のスペシャリストを養成</small></h2>
			<p>板倉は、喜芳が健在であった時から現在に至るまで、職人を社内で養成しています。この職人たちが所属する工房を「喜芳工房」と呼んでいます。</p>
			<p>喜芳は、弟子の一人ひとりの適性を見極めて、それぞれが得意な工程の技術を伸ばすことを大事にしていました。そのため、職人はそれぞれ得意な分野が「珠をとおす」「軸を編む」「房を付ける」などはっきりと分かれています。</p>
			<p>その結果として、一つひとつの工程のスペシャリストが育成されています。各工程で高い品質のパーツが仕立てられているため、最終的にすべてを組み合わせたときに、クオリティの高い製品に仕上がります。</p>
			<ul class="ki-roles"><li><span>01</span>珠をとおす</li><li><span>02</span>軸を編む</li><li><span>03</span>房を付ける</li></ul>
		</div>
		<div class="ki-mosaic" data-rv>
			<?php echo ki_img( 'ki/ki-mg0107.jpg', '喜芳工房の職人', array( 'class' => 'is-main' ) ); ?>
			<?php echo ki_img( 'ki/ki-mg0112.jpg', '' ); ?>
			<?php echo ki_img( 'ki/ki-mg0115.jpg', '' ); ?>
		</div>
	</div>
</section>

<?php /* ---------- 通信販売事業 ---------- */ ?>
<section class="ki-sec" id="netshop">
	<div class="ki-wrap">
		<?php ki_head( 'ONLINE SHOP', '通信販売事業' ); ?>
		<p class="ki-lead" data-rv>株式会社意匠京念珠板倉が製造した製品の一部を、特選の品として通信販売しています。</p>
		<div class="ki-shops">
			<a class="ki-shopcard" href="<?php echo esc_url( KI_SHOP_URL ); ?>" target="_blank" rel="noopener" data-rv>
				<span class="ki-shopcard__img"><?php echo ki_img( 'ki/ki-0042.jpg', '' ); ?></span>
				<span class="ki-shopcard__body"><small>OFFICIAL ONLINE SHOP</small><b>喜芳工房 オンラインショップ</b><span>京都伝統産業優秀技術継承　創作京念珠<br>京上賀茂 かおん</span><em>サイトを見る</em></span>
			</a>
			<a class="ki-shopcard" href="<?php echo esc_url( KI_AMAZON_URL ); ?>" target="_blank" rel="noopener" data-rv>
				<span class="ki-shopcard__img"><?php echo ki_img( 'ki/ki-0089.jpg', '' ); ?></span>
				<span class="ki-shopcard__body"><small>AMAZON</small><b>喜芳工房 Amazon店</b><span>京都伝統産業優秀技術継承　創作京念珠</span><em>Amazon で見る</em></span>
			</a>
		</div>
	</div>
</section>

<?php /* ---------- Hitotsubu Color ---------- */ ?>
<section class="ki-sec ki-sec--tint" id="hitotsubu">
	<div class="ki-wrap ki-split">
		<div class="ki-split__text" data-rv>
			<p class="ki-eyebrow ki-eyebrow--ink">COLLABORATION</p>
			<h2 class="ki-h2">Hitotsubu Color<small>ヒトツブカラー ― 身に着ける人のお守りとなる、新しい念珠</small></h2>
			<p>グローカル人材開発センターの学生さんと喜芳工房のコラボブランドです。「葬儀などの限定された場で使われる現在の念珠から発展させた、身に着ける人のお守りとなる新しい念珠を作りたい」という喜芳工房の願いを、「喜芳工房の一粒の余り珠から、グローカル学生がカジュアルなお守りアクセサリーを作る」ことで具現化しました。</p>
			<p>「念珠（おもいのたま）の全ては一粒から」をテーマに、新世代の視点から念珠を再定義した限定アクセサリーを制作し、イベントに出店しています。</p>
			<p class="ki-small">グローカル学生とは：NPO法人グローカル人材開発センターのプロジェクトに参加する学生を指します。インターンのような形で活動したい大学生を、グローカル人材開発センターが企業とマッチングさせ、企業が抱える課題の解決策を探るプロジェクトです。</p>
		</div>
		<figure class="ki-split__img" data-rv><?php echo ki_img( 'about_img_hitosubu1.jpg', 'Hitotsubu Color' ); ?></figure>
	</div>
	<div class="ki-wrap ki-wrap--narrow ki-video" data-rv>
		<video controls muted playsinline preload="none"><source src="/common/movie/hitotubu-color_movie.mp4" type="video/mp4"></video>
	</div>
</section>

<?php get_footer(); ?>
