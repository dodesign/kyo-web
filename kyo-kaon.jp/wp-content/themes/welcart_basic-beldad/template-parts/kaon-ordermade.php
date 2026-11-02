<?php
/**
 * オーダーメイド（/case/461/「オーダーメイド制作の流れ」）専用。2026-11-02 リニューアル。
 * single.php から、投稿ID 461 のときだけ呼ばれる。
 *
 * ★このページは投稿の本文ではなく、このファイルの中身が表示される。文章はここで直す。
 *   流れ（4ステップ）の文章と写真・動画は、旧本文から移した。動画のURLだけは本文から読み取っている。
 *
 * ★「ご相談の実例」は 2026年2〜3月にいただいた男性用ブレスレットのご相談をもとにしている。
 *   お名前・ご連絡先・会社名・生年月日などは載せていない。
 *   完成品の写真が用意できたら、下の $kn_case_photo にメディアIDを入れると表示される。
 */

$kn_case_photo = 0; // 例：8100（メディアライブラリのID）。0 のあいだは写真なしで表示

$kn_ask = home_url( '/contact/?title=' . rawurlencode( 'オーダーメイドのご相談' ) );

// 旧本文の制作風景動画（[video …][/video]）
$kn_video = '';
if ( preg_match( '/\[video[^\]]*\]\s*\[\/video\]/', get_post_field( 'post_content', 461 ), $m ) ) {
	$kn_video = $m[0];
}

$kn_steps = array(
	array(
		't'   => 'ご相談・お見積り',
		'p'   => 'ご希望のお色の珠や、お探しの材質や色目、ご予算、込められた想いなど、「こんなことは難しいかな……」と思われるようなこだわりも、ご遠慮なくご相談ください。<b>お見積りは無料です。</b>',
		'img' => 477,
	),
	array(
		't'   => '打ち合わせ',
		'p'   => 'ご来店、Zoomミーティング、お電話、メールなどで、制作のイメージを共有させていただきます。',
		'img' => 480,
	),
	array(
		't'   => '制作',
		'p'   => '喜芳直伝の技術を受け継いだ職人が試作品を製作し、お写真でご確認いただきます。ご意見をいただいた場合は、修正して再度ご確認いただきます。',
		'img' => 0, // 動画を出す
	),
	array(
		't'   => '納品',
		'p'   => '郵送にてお品物をお送りするか、ご来店いただいてお渡しいたします。',
		'img' => 479,
	),
);

$kn_works = new WP_Query( array(
	'cat'                 => 16, // 制作事例
	'post__not_in'        => array( 461 ),
	'posts_per_page'      => 6,
	'ignore_sticky_posts' => true,
	'no_found_rows'       => true,
) );
?>
<div id="primary" class="site-content kn-page kn-om2">
	<div id="content" role="main">

		<?php /* ★<header> にしないこと（親テーマの #content header 指定に負ける） */ ?>
		<div class="kn-pghero kn-full">
			<?php echo kaon_img( 6026, 'full', '', array( 'class' => 'kn-pghero__img', 'loading' => 'eager' ) ); ?>
			<div class="kn-pghero__body">
				<p class="kn-pghero__eyebrow">ORDER MADE</p>
				<h1 class="kn-pghero__title">オーダーメイド</h1>
				<p class="kn-pghero__lead">お一人おひとりの想いを、<br>職人の手で、一本の念珠に。</p>
			</div>
		</div>

		<?php /* ---------- こんなご相談を ---------- */ ?>
		<section class="kn-sec kn-full">
			<div class="kn-wrap kn-wrap--narrow">
				<p class="kn-fix__lead" data-rv>各宗派の本式や略式はもちろん、ご希望のお色の珠で、世界にひとつの念珠をお仕立てします。数珠ブレスレットやペンダントのご依頼もお受けしています。<strong>喜芳直伝の技術を受け継いだ職人が、お一人おひとりのご要望をかたちにします。</strong></p>
				<ul class="kn-om2__asks" data-rv>
					<li>宗派の本式・略式を、好きな色で</li>
					<li>探している石・材質で</li>
					<li>込めたい想い・願いから</li>
					<li>ご予算に合わせて</li>
					<li>毎日つけるブレスレットを</li>
				</ul>
			</div>
		</section>

		<?php /* ---------- ご相談の実例 ---------- */ ?>
		<section class="kn-sec kn-sec--tint kn-full">
			<div class="kn-wrap">
				<div class="kn-head"><h2><small>CASE</small>ご相談から完成まで<span class="kn-om2__headsub">― 男性用 数珠ブレスレットの例</span></h2></div>

				<div class="kn-om2__case<?php echo $kn_case_photo ? ' has-photo' : ''; ?>">
					<?php if ( $kn_case_photo ) : ?>
						<div class="kn-om2__photo" data-rv><?php echo kaon_img( $kn_case_photo, 'large', '完成した男性用 数珠ブレスレット' ); ?></div>
					<?php endif; ?>

					<div class="kn-om2__req" data-rv>
						<p class="kn-om2__label">いただいたご相談</p>
						<p class="kn-om2__quote">毎日身につけることを前提にした、男性用の数珠ブレスレットをつくりたい。</p>
						<dl class="kn-om2__spec">
							<dt>願い</dt><dd>運気の向上／災いや不要な縁からの守護／仕事運・金運</dd>
							<dt>雰囲気</dt><dd>派手すぎない、落ち着いた高級感。長く愛用できるもの</dd>
							<dt>石</dt><dd>黒曜石をベースに、モリオンとタイガーアイを。最適な配置を提案してほしい</dd>
							<dt>使い方</dt><dd>毎日着けるので、丈夫さ・汗への強さ・着け心地を重視</dd>
							<dt>玉の大きさ</dt><dd>12mmほど</dd>
							<dt>ご予算</dt><dd>3〜5万円ほど</dd>
						</dl>
						<p class="kn-om2__note">イメージに近い写真も添えていただきました。</p>
					</div>

					<ol class="kn-om2__time">
						<li data-rv><span>ご相談</span>お問い合わせフォームから</li>
						<li data-rv><span>2日後</span>ご返信・ご希望のお伺い</li>
						<li data-rv><span>約3週間後</span>デザイン案を写真でご提案</li>
						<li data-rv><span>ご了承</span>石の意味のご説明とお見積り</li>
					</ol>

					<div class="kn-om2__ans" data-rv>
						<p class="kn-om2__label">喜芳工房からのご提案</p>
						<p class="kn-om2__concept">「守りを整え、運を引き上げる一本」</p>
						<p class="kn-om2__ansp">ご希望の願いに、できる限り添えるように石を選び、デザインしました。</p>
						<ul class="kn-om2__stones">
							<li><b>中心</b><span>甲府で丁寧に手研磨された<em>シルバーオブシディアン</em></span><small>守りと、本来の判断力を</small></li>
							<li><b>向玉</b><span>カットを施した<em>虎眼石</em></span><small>仕事運・金運の流れを捉える</small></li>
							<li><b>天玉</b><span><em>オニキス</em></span><small>流れを「続けられる力」へ</small></li>
						</ul>
						<p class="kn-om2__price">このときのお見積り<b>30,000円</b><small>（税別）</small></p>
					</div>
				</div>
			</div>
		</section>

		<?php /* ---------- 制作の流れ ---------- */ ?>
		<section class="kn-sec kn-full">
			<div class="kn-wrap">
				<div class="kn-head"><h2><small>FLOW</small>オーダーメイドの流れ</h2></div>
				<div class="kn-om2__flow">
					<?php foreach ( $kn_steps as $i => $s ) : ?>
					<article class="kn-om2__step" data-rv>
						<div class="kn-om2__stepimg">
							<?php
							if ( $s['img'] ) {
								echo kaon_img( $s['img'], 'medium_large', $s['t'] );
							} elseif ( $kn_video ) {
								echo do_shortcode( $kn_video );
							}
							?>
						</div>
						<p class="kn-om2__no">STEP <?php echo (int) $i + 1; ?></p>
						<h3><?php echo esc_html( $s['t'] ); ?></h3>
						<p><?php echo wp_kses( $s['p'], array( 'b' => array() ) ); ?></p>
					</article>
					<?php endforeach; ?>
				</div>
			</div>
		</section>

		<?php /* ---------- これまでの制作事例 ---------- */ ?>
		<?php if ( $kn_works->have_posts() ) : ?>
		<section class="kn-sec kn-sec--tint kn-full">
			<div class="kn-wrap">
				<div class="kn-head"><h2><small>WORKS</small>これまでの制作事例</h2></div>
				<div class="kn-om__works kn-om2__works">
					<?php while ( $kn_works->have_posts() ) : $kn_works->the_post(); ?>
					<a href="<?php the_permalink(); ?>" data-rv>
						<span class="kn-om__im"><?php the_post_thumbnail( 'medium_large' ); ?></span>
						<span class="kn-om__cap"><small><?php echo esc_html( get_the_date( 'Y.m' ) ); ?></small><?php echo esc_html( preg_replace( '/^【[^】]*】\s*/u', '', get_the_title() ) ); ?></span>
					</a>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</div>
		</section>
		<?php endif; ?>

		<?php /* ---------- ご相談のときに ---------- */ ?>
		<section class="kn-sec kn-full">
			<div class="kn-wrap kn-wrap--narrow">
				<div class="kn-head kn-head--solo"><h2><small>HINT</small>ご相談のときに、お知らせいただくとスムーズなこと</h2></div>
				<ul class="kn-om2__hints" data-rv>
					<li><b>何をつくりたいか</b>宗派の念珠（本式・略式）、ブレスレット など</li>
					<li><b>お使いになる方</b>男性・女性、ブレスレットなら手首まわり</li>
					<li><b>お好きな色や石</b>イメージに近い写真があれば、添えてください</li>
					<li><b>込めたい想い・願い</b>贈り物なら、贈る方のことも</li>
					<li><b>ご予算</b>おおよその目安で大丈夫です</li>
					<li><b>ご希望の時期</b>法事やお祝いなど、お使いになる日があれば</li>
				</ul>
			</div>
		</section>

		<section class="kn-fix__cta kn-full">
			<?php echo kaon_img( 8052, '1536x1536', '', array( 'class' => 'kn-fix__ctaimg' ) ); // 職人の手仕事の写真 ?>
			<div class="kn-wrap kn-wrap--narrow" data-rv>
				<p class="kn-pghero__eyebrow">CONTACT</p>
				<h2>オーダーメイドのご相談はこちら</h2>
				<p class="kn-fix__ctalead">お見積りは無料です。「こんなことは難しいかな」というご希望も、まずはお聞かせください。</p>
				<div class="kn-fix__ctas">
					<a class="kn-fix__tel" href="tel:0757216600"><small>お電話（受付 9:00–18:00）</small>075-721-6600</a>
					<a class="kn-fix__mail" href="<?php echo esc_url( $kn_ask ); ?>"><small>メール（24時間受付）</small>フォームで相談する</a>
				</div>
				<p class="kn-fix__shop">ご来店でのご相談は <a href="#kn-shops">北山本店・烏丸店</a> へ。</p>
			</div>
		</section>

	</div><!-- #content -->
</div><!-- #primary -->
