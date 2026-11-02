<?php
/**
 * トップページ。2026-11-02 リニューアル（旧版は Git の履歴）。
 * 文章はこのファイルに直接書いている。部品は inc/itakura-site.php。
 *
 * @package OnePress
 */
get_header();

$ki_slides = array( 'ki/ki-mg0003.jpg', 'ki/ki-0004.jpg', 'ki/ki-mg0110.jpg', 'ki/ki-mg0055.jpg' );

$ki_biz = array(
	array( 'no' => '01', 'en' => 'WHOLESALE', 't' => '京念珠の製造卸', 'p' => '家庭用から業務用まで、京念珠の企画・製造・卸売りを行っています。季節の珠や房を取り入れたラインナップをご用意しています。', 'img' => 'ki/ki-0082.jpg', 'url' => home_url( '/about/#oroshi' ) ),
	array( 'no' => '02', 'en' => 'ORDER MADE', 't' => 'オーダーメイド', 'p' => '各宗派の本式・略式から、ご希望の色や石まで。「こんなことは難しいかな」というご要望も、職人がかたちにします。', 'img' => 'ki/ki-0042.jpg', 'url' => home_url( '/contact/?title=' . rawurlencode( 'オーダーメイドのご相談' ) ) ),
	array( 'no' => '03', 'en' => 'REPAIR', 't' => '念珠（数珠）の修理', 'p' => '紐の切れや房の傷みも、職人が丁寧にお直しします。他店でお求めのお念珠や、事業者さまの大量のご依頼も承ります。', 'img' => 'ki/ki-mg0113.jpg', 'url' => home_url( '/service/fix/' ) ),
	array( 'no' => '04', 'en' => 'ONLINE SHOP', 't' => '通信販売（喜芳工房）', 'p' => '板倉が製造した京念珠の一部を、オンラインショップ「喜芳工房」と Amazon 店でお求めいただけます。', 'img' => 'ki/ki-0094.jpg', 'url' => KI_SHOP_URL ),
);

$ki_works = array(
	array( 'kinkaku-ginkaku', '金閣・銀閣', 'top_kihou_img1.jpg' ),
	array( 'ichijo-modoribashi', '一条戻橋', 'top_kihou_img2.jpg' ),
	array( 'ikkyu-san', '一休さん', 'top_kihou_img3.jpg' ),
	array( 'jyuni-hitoe', '十二単', 'top_kihou_img5.jpg' ),
);
?>

<?php /* ---------- ヒーロー ---------- */ ?>
<section class="ki-hero" data-ki-hero>
	<div class="ki-hero__slides">
		<?php foreach ( $ki_slides as $i => $s ) : ?>
			<?php echo ki_img( $s, '', array( 'class' => 'ki-hero__img' . ( 0 === $i ? ' is-on' : '' ), 'loading' => 0 === $i ? 'eager' : 'lazy' ) ); ?>
		<?php endforeach; ?>
	</div>
	<div class="ki-hero__body ki-wrap">
		<p class="ki-hero__en">KYO NENJU MANUFACTURER &amp; WHOLESALER</p>
		<h1 class="ki-hero__title">京の名工・喜芳の<br>想いと技を、いまに。</h1>
		<p class="ki-hero__lead">京都・上賀茂で、京念珠（数珠）を企画・製造・卸。<br class="ki-pc">製造卸一筋<?php echo (int) ki_years(); ?>年、職人が一つひとつ手で仕立てています。</p>
		<div class="ki-hero__btns">
			<a class="ki-btn ki-btn--light" href="<?php echo esc_url( home_url( '/case/' ) ); ?>">製品紹介を見る</a>
			<a class="ki-btn ki-btn--line" href="<?php echo esc_url( home_url( '/about/#oroshi' ) ); ?>">卸・お取引のご相談</a>
		</div>
	</div>
</section>

<?php /* ---------- 数字 ---------- */ ?>
<section class="ki-facts">
	<ul class="ki-wrap ki-facts__list">
		<li data-rv><b><?php echo (int) ki_years(); ?><small>年</small></b><span>製造卸一筋で歩んできた年月</span></li>
		<li data-rv><b>3<small>人</small></b><span>念珠師で「京都府伝統産業優秀技術者」に認定された職人。喜芳はその初めての一人</span></li>
		<li data-rv><b>2<small>つ</small></b><span>意匠登録済みの独自技術。板倉だけがご提供できる製法です</span></li>
		<li data-rv><b>1<small>本から</small></b><span>最低取引額・月々の固定費なし。必要な分だけご発注いただけます</span></li>
	</ul>
</section>

<?php /* ---------- 事業 ---------- */ ?>
<section class="ki-sec">
	<div class="ki-wrap">
		<?php ki_head( 'BUSINESS', '板倉の仕事' ); ?>
		<p class="ki-lead" data-rv>株式会社意匠京念珠板倉は、家庭用から業務用までの京念珠の企画・製造・卸売りを行う製造卸です。<br class="ki-pc">喜芳が育てた職人の工房「喜芳工房」で、一つひとつ丁寧に、心をこめて作っています。</p>
		<div class="ki-biz">
			<?php foreach ( $ki_biz as $b ) : $ext = ( 0 !== strpos( $b['url'], home_url() ) ); ?>
			<a class="ki-biz__item" href="<?php echo esc_url( $b['url'] ); ?>"<?php echo $ext ? ' target="_blank" rel="noopener"' : ''; ?> data-rv>
				<span class="ki-biz__img"><?php echo ki_img( $b['img'], '' ); ?></span>
				<span class="ki-biz__body">
					<span class="ki-biz__no"><?php echo esc_html( $b['no'] . ' ' . $b['en'] ); ?></span>
					<span class="ki-biz__t"><?php echo esc_html( $b['t'] ); ?></span>
					<span class="ki-biz__p"><?php echo esc_html( $b['p'] ); ?></span>
					<span class="ki-biz__more"><?php echo $ext ? 'サイトを見る' : '詳しく見る'; ?></span>
				</span>
			</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php /* ---------- 喜芳 ---------- */ ?>
<section class="ki-sec ki-sec--tint">
	<div class="ki-wrap ki-kiho">
		<figure class="ki-kiho__photo" data-rv>
			<?php echo ki_img( 'top-intro-img.jpg', '京念珠師 喜芳' ); ?>
			<figcaption>京念珠師 喜芳</figcaption>
		</figure>
		<div class="ki-kiho__body" data-rv>
			<p class="ki-eyebrow ki-eyebrow--ink">KIHO</p>
			<h2 class="ki-kiho__t">念珠師としてはじめて<br>「京都府伝統産業優秀技術者」に<br>認定された京の名工</h2>
			<p>十三歳で念珠屋へ奉公に入り、以来八十年近く、念珠作り一筋。鍛え抜かれた技術力と、喜芳が仕立てる京念珠の独自性が評価され、平成16年、京都の念珠師としてはじめて「京都府伝統産業優秀技術者」に認定されました。名工として平成18年から26年まで「京の名工展」に創作念珠を出展し、その独自性は分野内外から高く評価されました。</p>
			<blockquote class="ki-quote">
				<p>どんな難しい数珠でも、全部頭の中に入ってます。……<br>やっぱり、一つのことを貫くということが、<br>人間にとって一番大切なことなんじゃないですか。</p>
				<cite>喜芳（月刊誌「致知」2010年6月号より）</cite>
			</blockquote>
			<p class="ki-kiho__note">平成25年に死去。倒れる寸前まで念珠を作り続けました。その技術と想いは、いまも喜芳工房の職人たちに受け継がれています。</p>
			<a class="ki-btn ki-btn--ink" href="<?php echo esc_url( home_url( '/kihou-in/' ) ); ?>">喜芳のインタビューを読む</a>
		</div>
	</div>
</section>

<?php /* ---------- 喜芳の作品 ---------- */ ?>
<section class="ki-works">
	<?php foreach ( $ki_works as $w ) : ?>
	<a class="ki-works__item" href="<?php echo esc_url( home_url( '/case/' . $w[0] . '/' ) ); ?>" data-rv>
		<?php echo ki_img( $w[2], $w[1] ); ?>
		<span class="ki-works__cap"><small>KIHO WORKS</small><?php echo esc_html( $w[1] ); ?></span>
	</a>
	<?php endforeach; ?>
</section>

<?php /* ---------- 新しい製品 ---------- */ ?>
<?php
$ki_new = new WP_Query( array( 'post_type' => 'case', 'posts_per_page' => 8, 'no_found_rows' => true ) );
if ( $ki_new->have_posts() ) :
?>
<section class="ki-sec">
	<div class="ki-wrap">
		<?php ki_head( 'PRODUCTS', '新しい製品', get_post_type_archive_link( 'case' ), '製品紹介・実績をすべて見る' ); ?>
		<div class="ki-cards">
			<?php while ( $ki_new->have_posts() ) : $ki_new->the_post(); ki_case_card(); endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</section>
<?php endif; ?>

<?php /* ---------- 卸・お取引 ---------- */ ?>
<section class="ki-sec ki-sec--dark ki-whole">
	<?php echo ki_img( 'ki/ki-mg0051.jpg', '', array( 'class' => 'ki-whole__bg' ) ); ?>
	<div class="ki-wrap ki-whole__in">
		<div class="ki-whole__text" data-rv>
			<p class="ki-eyebrow">FOR BUSINESS</p>
			<h2>卸・法人のお客様へ</h2>
			<p>季節によってお取り扱いの念珠が異なり、季節の珠や房をラインナップに取り入れています。サンプルをお手に取ってご覧いただけますので、まずはお気軽にご相談ください。</p>
		</div>
		<ul class="ki-whole__list">
			<li data-rv><b>ひとつからご注文いただけます</b>月々の固定費や最低取引額はありません。ご入用の際に、必要な分だけご発注ください。</li>
			<li data-rv><b>サンプルをお持ちします</b>関西一円はサンプルをお持ちしてお話を伺います。名古屋・富山には隔月で担当者が参ります。その他の地域は郵送で対応いたします。</li>
			<li data-rv><b>オーダーメイドも承ります</b>宗派の本式・略式、ご希望の色の珠、材質、ご予算に合わせてお仕立てします。</li>
			<li data-rv><b>個人・個人事業主の方も歓迎</b>お問い合わせいただいた方への営業のお電話はいたしませんので、ご安心ください。</li>
		</ul>
		<div class="ki-whole__btns" data-rv>
			<a class="ki-btn ki-btn--light" href="<?php echo esc_url( home_url( '/contact/?title=' . rawurlencode( '卸・お取引について' ) ) ); ?>">卸・お取引のお問い合わせ</a>
			<a class="ki-btn ki-btn--line" <?php echo ki_tel_attr( 'top-whole' ); ?>>電話 <?php echo esc_html( KI_TEL ); ?></a>
		</div>
	</div>
</section>

<?php /* ---------- 実績・メディア ---------- */ ?>
<?php $ki_media = ki_media_list(); ?>
<section class="ki-sec">
	<div class="ki-wrap">
		<?php ki_head( 'MEDIA', 'テレビ・メディア' ); ?>
		<div class="ki-media">
			<div class="ki-media__col" data-rv>
				<h3>テレビ出演</h3>
				<ul><?php foreach ( $ki_media['tv'] as $m ) : ?><li><?php echo esc_html( $m ); ?></li><?php endforeach; ?></ul>
			</div>
			<div class="ki-media__col" data-rv>
				<h3>カタログ・メディア掲載</h3>
				<ul><?php foreach ( $ki_media['print'] as $m ) : ?><li><?php echo esc_html( $m ); ?></li><?php endforeach; ?></ul>
			</div>
		</div>
	</div>
</section>

<?php /* ---------- お知らせ ---------- */ ?>
<?php
$ki_news = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 5, 'cat' => 110, 'no_found_rows' => true ) );
if ( $ki_news->have_posts() ) :
?>
<section class="ki-sec ki-sec--tint">
	<div class="ki-wrap ki-wrap--narrow">
		<?php ki_head( 'NEWS', 'お知らせ', home_url( '/news/' ) ); ?>
		<ul class="ki-news">
			<?php while ( $ki_news->have_posts() ) : $ki_news->the_post(); ki_news_row(); endwhile; wp_reset_postdata(); ?>
		</ul>
	</div>
</section>
<?php endif; ?>

<?php get_footer(); ?>
