<?php
/**
 * 喜芳工房のこだわり（/kihou-koubou/）専用テンプレート。2026-11-02 リニューアル。
 *
 * ★このページは「固定ページの本文」ではなく、このファイルの中身が表示される。
 *   文章を直したいときは、管理画面ではなくこのファイルを編集すること。
 *   （文章は旧ページ本文から一字一句そのまま移している。並べ方だけ変えた）
 * 写真：喜芳の肖像は 06.画像素材/喜芳/top-intro-img.jpg（旧ページは kyo-itakura.com から直接読んでいた）、
 *       工房の写真は 06.画像素材/jpgレタッチ済(170125up) から。
 *       技術の6項目の画像は旧ページと同じ /common/img/kodawari-*.jpg。
 */
get_header();

$kn_tech = array(
	array(
		't'    => '軸部分の飾り結び',
		'p'    => array( '念珠の美しさを決めるといわれる軸部分。', '一般的な飾り結びとは一線を画し、手作業で仕上げる美しい飾り結びで仕上げています。' ),
		'note' => '意匠登録済みの独自技術ですので、喜芳工房のみがご提供出来る製法です',
		'img'  => '/common/img/kodawari-2.jpg',
	),
	array(
		't'    => '二色の芯糸が産み出す美しさ「京のいろは」',
		'p'    => array( '芯糸がふたつの色で彩られた技術です。水晶などの透明度の高い玉に、2色の芯糸が石の奥から美しく映えます。', '光の加減や、見る角度によって見える芯糸の色が異なったり、二色が調和して見えたり、絶妙な美しさです。' ),
		'note' => '意匠登録済みの独自技術ですので、喜芳工房のみがご提供出来る製法です',
		'img'  => '/common/img/kodawari-7.jpg',
	),
	array(
		't'    => '一粒一粒見極めて仕入れる「珠」',
		'p'    => array( '念珠の基本となる石は、質の良い物を選びます。職人自ら信頼できる問屋で買い付けを行います。ご希望の珠をお探ししお仕立てすることなども可能です。' ),
		'img'  => '/common/img/kodawari-3.jpg',
	),
	array(
		't'    => 'カラーリストによる、色の特性を引き出す「配色」',
		'p'    => array( '石のもつ特性や、人が色を見たときの心理的効果を最大限に引き出す組み合わせを日々研究しています。' ),
		'img'  => '/common/img/kodawari-4.jpg',
	),
	array(
		't'    => '京都の伝統職人が仕立てる「房」',
		'p'    => array( '京都の伝統職人が仕立てた高い品質の正絹を使用しています。数本の差し色をいれるなどのご要望にお応えすることも可能です。' ),
		'img'  => '/common/img/kodawari-5.jpg',
	),
	array(
		't'    => '長くお使いいただくために「高級桐箱」',
		'p'    => array( '私たちは、お客様の目に触れるものすべてにこだわっています。高級桐箱と中板には喜芳工房の毛筆筆耕をいれ、念珠に合わせたカラーで装飾しています。その後、一つひとつ、真心をこめて梱包しています。' ),
		'img'  => '/common/img/kodawari-6.jpg',
	),
);
?>
<div id="primary" class="site-content kn-page kn-craft">
	<div id="content" role="main">

		<?php /* ---------- ヒーロー ---------- */ ?>
		<?php /* ★<header> にしないこと。親テーマの「#content header{position:inherit}」に負けて、写真がページ全体に広がってしまう */ ?>
		<div class="kn-pghero kn-full">
			<?php echo kaon_img( 8050, '1536x1536', '', array( 'class' => 'kn-pghero__img', 'loading' => 'eager' ) ); ?>
			<div class="kn-pghero__body">
				<p class="kn-pghero__eyebrow">OUR CRAFT</p>
				<h1 class="kn-pghero__title"><?php the_title(); ?></h1>
				<p class="kn-pghero__lead">喜芳の技術と想いは、<br>喜芳工房の職人たちに受け継がれている。</p>
			</div>
		</div>

		<?php /* ---------- 喜芳とは ---------- */ ?>
		<section class="kn-sec kn-full">
			<div class="kn-wrap">
				<div class="kn-craft__kiho">
					<figure class="kn-craft__portrait" data-rv>
						<?php echo kaon_img( 8059, 'full', '念珠師 喜芳' ); ?>
						<figcaption>念珠師 喜芳</figcaption>
					</figure>
					<div class="kn-craft__kihotext" data-rv>
						<div class="kn-head kn-head--solo"><h2><small>KIHO</small>喜芳とは</h2></div>
						<ol class="kn-timeline">
							<li><span>大正9年</span>京都府生まれ。</li>
							<li><span>13才</span>念珠屋へ奉公に入り、以来、念珠作り一筋に歩む。</li>
							<li><span>平成16年</span>京都府伝統産業優秀技術賞を念珠師として初受賞。</li>
							<li><span>平成18年～26年</span>名工として名工展に創作念珠を出展。その独自性は分野内外から高く評価された。</li>
							<li><span>平成25年</span>死去。倒れる寸前まで念珠を作り続けた。</li>
						</ol>
						<p class="kn-craft__note">2017年2月現在、念珠師として「京都府伝統産業優秀技術賞」を受賞した技師は、喜芳を含めてたった3人。</p>
					</div>
				</div>
				<figure class="kn-craft__wide" data-rv>
					<?php echo kaon_img( 8053, '1536x1536', '喜芳の創作念珠「金閣」「銀閣」' ); ?>
					<figcaption>喜芳の創作念珠「銀閣」「金閣」</figcaption>
				</figure>
			</div>
		</section>

		<?php /* ---------- 喜芳工房とは ---------- */ ?>
		<section class="kn-sec kn-sec--tint kn-full">
			<div class="kn-wrap">
				<div class="kn-craft__koubou">
					<div data-rv>
						<div class="kn-head kn-head--solo"><h2><small>KIHO KOUBOU</small>喜芳工房とは</h2></div>
						<p class="kn-craft__p">喜芳が健在であった時から現在に至るまで、職人を養成しています。この職人たちが所属する工房を「喜芳工房」と呼んでいます。</p>
						<p class="kn-craft__p">喜芳は、弟子の一人ひとりの適正を見極めて、それぞれが得意な工程の技術を伸ばすことを大事にしていました。そのため、職人はそれぞれ得意な分野が「珠をとおす」、「軸を編む」、「房を付ける」、などはっきりと分かれています。</p>
						<p class="kn-craft__p">その結果として、一つひとつの工程のスペシャリストが育成されています。各工程で高い品質のパーツが仕立てられているため、最終的にすべてを組み合わせたときに、クオリティの高い製品に仕上がります。</p>
						<ul class="kn-craft__roles">
							<li><span>01</span>珠をとおす</li>
							<li><span>02</span>軸を編む</li>
							<li><span>03</span>房を付ける</li>
						</ul>
					</div>
					<div class="kn-craft__mosaic" data-rv>
						<?php echo kaon_img( 8051, '1536x1536', '喜芳工房で念珠を仕立てる職人たち', array( 'class' => 'is-main' ) ); ?>
						<?php echo kaon_img( 8052, 'medium_large', '' ); ?>
						<?php echo kaon_img( 8055, 'medium_large', '' ); ?>
					</div>
				</div>
			</div>
		</section>

		<?php /* ---------- 喜芳工房の技術 ---------- */ ?>
		<section class="kn-sec kn-full">
			<div class="kn-wrap">
				<div class="kn-head"><h2><small>TECHNIQUE</small>喜芳工房の技術</h2></div>
				<div class="kn-tech">
					<?php foreach ( $kn_tech as $i => $t ) : ?>
					<article class="kn-tech__item" data-rv>
						<div class="kn-tech__img"><?php echo kaon_img( $t['img'], 'full', $t['t'] ); ?></div>
						<div class="kn-tech__body">
							<p class="kn-tech__no"><?php echo sprintf( '%02d', $i + 1 ); ?></p>
							<h3 class="kn-tech__t"><?php echo esc_html( $t['t'] ); ?></h3>
							<?php foreach ( $t['p'] as $p ) : ?><p><?php echo esc_html( $p ); ?></p><?php endforeach; ?>
							<?php if ( ! empty( $t['note'] ) ) : ?><p class="kn-tech__note"><?php echo esc_html( $t['note'] ); ?></p><?php endif; ?>
						</div>
					</article>
					<?php endforeach; ?>
				</div>
			</div>
		</section>

		<?php /* ---------- 締め ---------- */ ?>
		<section class="kn-craft__end kn-full">
			<?php echo kaon_img( 8056, '1536x1536', '', array( 'class' => 'kn-craft__endimg' ) ); ?>
			<div class="kn-craft__endbody" data-rv>
				<p class="kn-pghero__eyebrow">KYO NENJU</p>
				<h2>職人の手から、あなたの手へ。</h2>
				<div class="kn-craft__btns">
					<a class="kn-btn kn-btn--light" href="<?php echo esc_url( home_url( '/category/item/' ) ); ?>">喜芳工房の念珠を見る</a>
					<a class="kn-btn kn-btn--line" href="<?php echo esc_url( home_url( '/case/461/' ) ); ?>">オーダーメイドのご相談</a>
				</div>
			</div>
		</section>

	</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
