<?php
/**
 * トップページ。2026-11-02 リニューアル（旧版は Git の履歴）。
 * 並び：写真 → 数字 → 喜芳 → 板倉の仕事（最後に講演）→ 新しい製品 → テレビ・メディア → 卸・法人 → お知らせ
 * 文章はこのファイルに直接書いている。部品は inc/itakura-site.php。
 *
 * @package OnePress
 */
get_header();

// 板倉の仕事（写真は横長が映えるものを選んでいる。img は common/img/ 以下のファイルか URL）
$ki_biz = array(
	array( 'en' => 'WHOLESALE', 't' => '京念珠の製造卸', 'p' => '家庭用から業務用まで、京念珠の企画・製造・卸売りを行っています。全国の仏具店さま・葬祭業者さまとお取引があり、季節の珠や房を取り入れたラインナップをご用意しています。ひとつからご注文いただけます。', 'img' => 'ki/ki-0082.jpg', 'url' => home_url( '/about/#oroshi' ), 'btn' => '卸のお取引について' ),
	array( 'en' => 'ORDER MADE', 't' => 'オーダーメイド', 'p' => '各宗派の本式・略式から、ご希望の色の珠、材質、ご予算まで。「こんなことは難しいかな」というご要望も、喜芳直伝の技術を受け継いだ職人がかたちにします。', 'img' => 'ki/ki-0042.jpg', 'url' => home_url( '/contact/?title=' . rawurlencode( 'オーダーメイドのご相談' ) ), 'btn' => 'オーダーメイドの相談' ),
	array( 'en' => 'REPAIR', 't' => '念珠（数珠）の修理', 'p' => '紐の切れや房の傷みも、職人が丁寧にお直しします。他店でお求めのお念珠や、ご自宅にあったお念珠、事業者さまの大量のご依頼も承ります。', 'img' => 'ki/ki-ws-0034.jpg', 'url' => home_url( '/service/fix/' ), 'btn' => '修理について' ),
	array( 'en' => 'WORKSHOP', 't' => '念珠ブレスレット ワークショップ', 'p' => 'たくさんの珠から色を選び、自分だけの一本を作る体験です。保育園・幼稚園・学校から、企業・地域のイベントまで出張して開催。樹脂の玉で費用を抑えるなど、人数やご予算に合わせてアレンジします。個人の方は本社サロンでの体験も。', 'img' => 'https://kyo-kaon.jp/wp-content/uploads/2025/01/BK2A0324-1536x1024.jpg', 'url' => home_url( '/workshop/' ), 'btn' => 'ワークショップについて' ),
	array( 'en' => 'ONLINE SHOP', 't' => '通信販売（喜芳工房）', 'p' => '板倉が製造した京念珠の一部を、オンラインショップ「喜芳工房」と Amazon 店でお求めいただけます。一点ものや、喜芳の作品もご紹介しています。', 'img' => 'ki/ki-0094.jpg', 'url' => KI_SHOP_URL, 'btn' => 'オンラインショップへ' ),
	array( 'en' => 'LECTURE', 't' => '講演・トークイベント', 'p' => '代表の辰尾が、祖母である名工 喜芳の歩みや職人としての哲学、念珠に込めた想いをお話しします。企業・学校・経済団体・公民館など、さまざまな場でご依頼をいただいています。ワークショップとの組み合わせも。', 'img' => 'ki/ki-lec-058.jpg', 'url' => home_url( '/lecture/' ), 'btn' => '講演について' ),
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
	<?php
	// 2026-11-03 写真のスライドから動画に差し替え（音なし・約31秒のループ）。
	// 元動画：06.画像素材/181229_動画/movie_short_181229.mp4 から念珠を作る場面だけを切り出して 1280x720 に圧縮。
	$ki_hero_mp4 = get_template_directory() . '/common/img/ki/ki-hero.mp4';
	$ki_hero_v   = file_exists( $ki_hero_mp4 ) ? filemtime( $ki_hero_mp4 ) : 1;
	?>
	<div class="ki-hero__slides">
		<video class="ki-hero__video" autoplay muted loop playsinline preload="auto" poster="<?php echo esc_url( ki_img_url( 'ki/ki-hero-poster.jpg' ) ); ?>" aria-hidden="true">
			<source src="<?php echo esc_url( ki_img_url( 'ki/ki-hero.mp4' ) . '?v=' . $ki_hero_v ); ?>" type="video/mp4">
		</video>
	</div>
	<div class="ki-hero__body ki-wrap">
		<p class="ki-hero__en">KYO NENJU MANUFACTURER &amp; WHOLESALER</p>
		<h1 class="ki-hero__title">京の名工・喜芳の<br>想いと技を、いまに。</h1>
		<p class="ki-hero__lead">京都・上賀茂で、京念珠（数珠）を企画・製造・卸。<br class="ki-pc">昭和44年の設立から<?php echo (int) ki_years(); ?>年、職人が一つひとつ手で仕立てています。</p>
		<div class="ki-hero__btns">
			<a class="ki-btn ki-btn--light" href="<?php echo esc_url( home_url( '/case/' ) ); ?>">製品紹介を見る</a>
			<a class="ki-btn ki-btn--line" href="<?php echo esc_url( home_url( '/about/#oroshi' ) ); ?>">卸・お取引のご相談</a>
		</div>
	</div>
</section>

<?php /* ---------- 数字 ---------- */ ?>
<section class="ki-facts">
	<ul class="ki-wrap ki-facts__list">
		<li data-rv><b><?php echo (int) ki_years(); ?><small>年</small></b><span>昭和44年の設立から、京念珠を作り続けてきた年月</span></li>
		<li data-rv><b>3<small>人</small></b><span>念珠師で「京都府伝統産業優秀技術者」に認定された職人。喜芳はその初めての一人</span></li>
		<li data-rv><b>2<small>つ</small></b><span>意匠登録済みの独自技術。板倉だけがご提供できる製法です</span></li>
		<li data-rv><b>1<small>本から</small></b><span>最低取引額・月々の固定費なし。必要な分だけご発注いただけます</span></li>
	</ul>
</section>

<?php /* ---------- 喜芳（左に大きな写真、右に文章。写真はスクロールしても付いてくる） ---------- */ ?>
<section class="ki-kh">
	<div class="ki-kh__photo">
		<?php echo ki_img( 'top-intro-img.jpg', '京念珠師 喜芳' ); ?>
		<p class="ki-kh__name"><small>KYO NENJU MASTER</small>京念珠師 喜芳<span>1920 – 2013</span></p>
	</div>
	<div class="ki-kh__body">
		<p class="ki-eyebrow ki-eyebrow--ink" data-rv>KIHO</p>
		<h2 class="ki-kh__t" data-rv>念珠師としてはじめて<br>「京都府伝統産業<br class="ki-sp-only">優秀技術者」に<br>認定された京の名工。</h2>
		<p class="ki-kh__p" data-rv>鍛え抜かれた技術力と、喜芳が仕立てる京念珠の独自性が評価され、平成16年、京都の念珠師としてはじめて「京都府伝統産業優秀技術者」に認定されました。</p>
		<ol class="ki-kh__time">
			<li data-rv><span>大正9年</span>京都府に生まれる</li>
			<li data-rv><span>13歳</span>念珠屋へ奉公に入り、以来、念珠作り一筋に歩む</li>
			<li data-rv><span>平成16年</span>念珠師として初めて「京都府伝統産業優秀技術賞」を受賞</li>
			<li data-rv><span>平成18〜26年</span>名工として「京の名工展」に創作念珠を出展。その独自性は分野内外から高く評価された</li>
			<li data-rv><span>平成25年</span>死去。倒れる寸前まで念珠を作り続けた</li>
		</ol>
		<figure class="ki-kh__award" data-rv><?php echo ki_img( 'top_kyo-meiko_img.jpg', '京の名工 表彰' ); ?></figure>
		<p class="ki-kh__p" data-rv>その技術と想いは、喜芳が育てた職人の工房「喜芳工房」と、孫である代表・辰尾に受け継がれています。</p>
		<a class="ki-btn ki-btn--ink" href="<?php echo esc_url( home_url( '/kihou-in/' ) ); ?>" data-rv>喜芳のインタビューを読む</a>
	</div>
</section>

<?php /* ---------- 喜芳の言葉（写真の上に大きく） ---------- */ ?>
<section class="ki-words">
	<?php echo ki_img( 'ki/ki-mg0116.jpg', '', array( 'class' => 'ki-words__bg' ) ); ?>
	<div class="ki-wrap ki-words__in">
		<p class="ki-words__q" data-rv>「心棒の“棒”を<br>折るな」</p>
		<p class="ki-words__p" data-rv>どんな難しい数珠でも、全部頭の中に入ってます。<br>やっぱり、一つのことを貫くということが、<br class="ki-pc">人間にとって一番大切なことなんじゃないですか。</p>
		<p class="ki-words__cite" data-rv>― 喜芳（月刊誌「致知」2010年6月号より）</p>
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

<?php /* ---------- 板倉の仕事（全幅・写真と文章を交互に） ---------- */ ?>
<section class="ki-sec ki-biz2-sec">
	<div class="ki-wrap">
		<?php ki_head( 'BUSINESS', '板倉の仕事' ); ?>
		<p class="ki-lead" data-rv>株式会社意匠京念珠板倉は、家庭用から業務用までの京念珠の企画・製造・卸売りを行う製造卸です。喜芳が育てた職人の工房「喜芳工房」で、一つひとつ丁寧に、心をこめて作っています。</p>
	</div>
	<div class="ki-biz2">
		<?php foreach ( $ki_biz as $i => $b ) : $ext = ( 0 !== strpos( $b['url'], home_url() ) ); ?>
		<article class="ki-biz2__row<?php echo $i % 2 ? ' is-rev' : ''; ?>">
			<a class="ki-biz2__img" href="<?php echo esc_url( $b['url'] ); ?>"<?php echo $ext ? ' target="_blank" rel="noopener"' : ''; ?> data-rv><?php echo ki_img( $b['img'], $b['t'] ); ?></a>
			<div class="ki-biz2__body" data-rv>
				<p class="ki-biz2__no"><b><?php echo sprintf( '%02d', $i + 1 ); ?></b><?php echo esc_html( $b['en'] ); ?></p>
				<h3 class="ki-biz2__t"><?php echo esc_html( $b['t'] ); ?></h3>
				<p class="ki-biz2__p"><?php echo esc_html( $b['p'] ); ?></p>
				<a class="ki-more" href="<?php echo esc_url( $b['url'] ); ?>"<?php echo $ext ? ' target="_blank" rel="noopener"' : ''; ?>><?php echo esc_html( $b['btn'] ); ?></a>
			</div>
		</article>
		<?php endforeach; ?>
	</div>
</section>

<?php /* ---------- 新しい製品（横に流れる大きな写真） ---------- */ ?>
<?php
$ki_new = new WP_Query( array( 'post_type' => 'case', 'posts_per_page' => 12, 'no_found_rows' => true ) );
if ( $ki_new->have_posts() ) :
?>
<section class="ki-sec ki-sec--tint ki-newp">
	<div class="ki-wrap">
		<?php ki_head( 'PRODUCTS', '新しい製品', get_post_type_archive_link( 'case' ), '製品紹介・実績をすべて見る' ); ?>
	</div>
	<div class="ki-strip" data-ki-strip>
		<button type="button" class="ki-strip__arrow is-prev" aria-label="前へ">&lsaquo;</button>
		<div class="ki-strip__track">
			<?php while ( $ki_new->have_posts() ) : $ki_new->the_post(); $tid = ki_case_thumb_id( get_the_ID() ); ?>
			<a class="ki-strip__item" href="<?php the_permalink(); ?>">
				<span class="ki-strip__img"><?php echo $tid ? wp_get_attachment_image( $tid, 'large', false, array( 'loading' => 'lazy', 'alt' => '' ) ) : ''; ?></span>
				<span class="ki-strip__date"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></span>
				<span class="ki-strip__t"><?php the_title(); ?></span>
			</a>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
		<button type="button" class="ki-strip__arrow is-next" aria-label="次へ">&rsaquo;</button>
	</div>
</section>
<?php endif; ?>

<?php /* ---------- テレビ・メディア・お取引 ---------- */ ?>
<?php $ki_media = ki_media_list(); ?>
<section class="ki-sec">
	<div class="ki-wrap">
		<?php ki_head( 'TRUST', 'テレビ・メディア・お取引' ); ?>
		<div class="ki-media ki-media--3">
			<div class="ki-media__col" data-rv>
				<h3>テレビ出演</h3>
				<ul><?php foreach ( $ki_media['tv'] as $m ) : ?><li><?php echo esc_html( $m ); ?></li><?php endforeach; ?></ul>
			</div>
			<div class="ki-media__col" data-rv>
				<h3>カタログ・メディア掲載</h3>
				<ul><?php foreach ( $ki_media['print'] as $m ) : ?><li><?php echo esc_html( $m ); ?></li><?php endforeach; ?></ul>
			</div>
			<div class="ki-media__col" data-rv>
				<h3>お取引先</h3>
				<ul><li>全国の仏具店さま</li><li>葬祭業者さま</li><li>通信販売・カタログの事業者さま</li></ul>
			</div>
		</div>
	</div>
</section>

<?php /* ---------- 卸・法人 ---------- */ ?>
<section class="ki-sec ki-whole">
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
		<ol class="ki-flow" data-rv>
			<li><span>1</span>お問い合わせ<small>お電話・フォームから</small></li>
			<li><span>2</span>ご要望のお伺い<small>サンプルをお持ちするか郵送で</small></li>
			<li><span>3</span>お見積り<small>数量・仕様に合わせて</small></li>
			<li><span>4</span>製作・お届け<small>職人が一つひとつ仕立てます</small></li>
		</ol>
		<div class="ki-whole__btns" data-rv>
			<a class="ki-btn ki-btn--light" href="<?php echo esc_url( home_url( '/contact/?title=' . rawurlencode( '卸・お取引について' ) ) ); ?>">卸・お取引のお問い合わせ</a>
			<a class="ki-btn ki-btn--line" <?php echo ki_tel_attr( 'top-whole' ); ?>>電話 <?php echo esc_html( KI_TEL ); ?></a>
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
