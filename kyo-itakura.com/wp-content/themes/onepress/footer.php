<?php
/**
 * フッター。2026-11-02 リニューアル（旧版は Git の履歴）。
 * ・上から「ご相談の帯」→「店舗のご案内（地図）」→「リンク」→ スマホ下部の固定メニュー
 * ・地図は Google マップの埋め込み（loading="lazy" なので、見える位置に来るまで読み込まない）
 *
 * @package OnePress
 */
?>
</main><!-- .ki-main -->

<footer class="ki-ft">

	<?php if ( ! is_page( array( 'contact', 'contact-thanks', 'bill-email' ) ) ) : ?>
	<section class="ki-ftc">
		<?php echo ki_img( 'ki/ki-mg0048.jpg', '', array( 'class' => 'ki-ftc__bg' ) ); ?>
		<div class="ki-wrap ki-ftc__in" data-rv>
			<p class="ki-eyebrow">CONTACT</p>
			<h2>お気軽にご相談ください</h2>
			<p class="ki-ftc__lead">念珠の卸・お見積り、オーダーメイド、修理のご相談まで。<br class="ki-pc">ひとつからのご注文も承ります。お問い合わせいただいた方への営業のお電話はいたしません。</p>
			<div class="ki-ftc__btns">
				<a class="ki-ftc__tel" <?php echo ki_tel_attr( 'footer' ); ?>><small>お電話（平日 9:00–18:00）</small><?php echo esc_html( KI_TEL ); ?></a>
				<a class="ki-ftc__mail" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><small>メール（24時間受付）</small>お問い合わせフォーム</a>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<section class="ki-fts" id="ki-access">
		<?php echo ki_img( 'ki/ki-0004.jpg', '', array( 'class' => 'ki-fts__bg' ) ); // 背景はサロンの写真 ?>
		<div class="ki-wrap ki-fts__grid">
			<div class="ki-fts__info">
				<p class="ki-eyebrow ki-eyebrow--ink">ACCESS</p>
				<h2>本社・サロン</h2>
				<dl>
					<dt>住所</dt><dd>〒603-8083<br>京都府京都市北区上賀茂向縄手町40-1</dd>
					<dt>営業</dt><dd>平日 9:00–18:00<br><small>土日祝は事前のご予約で、できる限りご対応いたします</small></dd>
					<dt>電話</dt><dd><a <?php echo ki_tel_attr( 'access' ); ?>><?php echo esc_html( KI_TEL ); ?></a>　FAX <?php echo esc_html( KI_FAX ); ?></dd>
					<dt>駐車場</dt><dd>あり</dd>
				</dl>
				<p class="ki-fts__note">サロンでは喜芳の作品や、喜芳工房が手がける数々のお念珠を手に取ってご覧いただけます。個人のお客様への店頭販売も行っております。</p>
				<div class="ki-fts__sub">
					<h3>烏丸店<span>（ハンケイ5mショップ内）</span></h3>
					<p>〒600-8412 京都府京都市下京区二帖半敷町652 からすま京都ホテル1F<br>水・木・金 11:00–19:00／ご予約不要</p>
				</div>
			</div>
			<div class="ki-fts__map">
				<iframe title="株式会社意匠京念珠板倉の地図" src="https://maps.google.com/maps?q=%EF%BC%88%E6%A0%AA%EF%BC%89%E6%84%8F%E5%8C%A0%E4%BA%AC%E5%BF%B5%E7%8F%A0%E6%9D%BF%E5%80%89%EF%BC%88%E5%96%9C%E8%8A%B3%E5%B7%A5%E6%88%BF%20%E3%81%8D%E3%81%BB%E3%81%86%E3%81%93%E3%81%86%E3%81%BC%E3%81%86%EF%BC%89&amp;ll=35.0561748,135.7616073&amp;z=16&amp;hl=ja&amp;output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</div>
	</section>

	<section class="ki-ftm">
		<div class="ki-wrap ki-ftm__grid">
			<div class="ki-ftm__brand">
				<img src="<?php echo esc_url( ki_img_url( 'ki/ki-logo-w.png' ) ); ?>" alt="株式会社 意匠京念珠 板倉" width="230" height="49" loading="lazy">
				<p>京の名工・喜芳の技と想いを受け継ぐ、<br>京念珠の製造卸。</p>
			</div>
			<div class="ki-ftm__col">
				<h4>ABOUT</h4>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">板倉のこだわり</a></li>
					<li><a href="<?php echo esc_url( home_url( '/kihou-in/' ) ); ?>">京念珠師 喜芳</a></li>
					<li><a href="<?php echo esc_url( home_url( '/about/about-nenjyu/' ) ); ?>">念珠（数珠）とは</a></li>
					<li><a href="<?php echo esc_url( home_url( '/company/' ) ); ?>">会社概要</a></li>
				</ul>
			</div>
			<div class="ki-ftm__col">
				<h4>BUSINESS</h4>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/about/#oroshi' ) ); ?>">京念珠の製造卸</a></li>
					<li><a href="<?php echo esc_url( home_url( '/case/' ) ); ?>">製品紹介・実績</a></li>
					<li><a href="<?php echo esc_url( home_url( '/service/fix/' ) ); ?>">念珠（数珠）の修理</a></li>
					<li><a href="<?php echo esc_url( home_url( '/about/#hitotsubu' ) ); ?>">Hitotsubu Color</a></li>
					<li><a href="<?php echo esc_url( home_url( '/lecture/' ) ); ?>">講演・トークイベント</a></li>
				</ul>
			</div>
			<div class="ki-ftm__col">
				<h4>SHOP</h4>
				<ul>
					<li><a href="<?php echo esc_url( KI_SHOP_URL ); ?>" target="_blank" rel="noopener">喜芳工房 オンラインショップ</a></li>
					<li><a href="<?php echo esc_url( KI_AMAZON_URL ); ?>" target="_blank" rel="noopener">喜芳工房 Amazon店</a></li>
					<li><a href="https://kyo-kaon.jp/service/workshop/" target="_blank" rel="noopener">京念珠ブレス作り体験</a></li>
				</ul>
			</div>
			<div class="ki-ftm__col">
				<h4>INFORMATION</h4>
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/news/' ) ); ?>">お知らせ</a></li>
					<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">お問い合わせ</a></li>
					<li><a href="<?php echo esc_url( home_url( '/news/cat-news/894' ) ); ?>">パートさん募集</a></li>
				</ul>
			</div>
		</div>
		<p class="ki-ftm__copy">&copy; 株式会社意匠京念珠板倉</p>
	</section>
</footer>

<button type="button" class="ki-totop" aria-label="ページの先頭へ"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 14l6-6 6 6"/></svg><span>TOP</span></button>

<?php /* スマホだけ：画面の下に固定するメニュー（768px 以下） */ ?>
<nav class="ki-spnav" aria-label="よく使うメニュー">
	<a href="<?php echo esc_url( home_url( '/case/' ) ); ?>"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="7.5"/><circle cx="12" cy="4.5" r="1.6"/><circle cx="12" cy="19.5" r="1.6"/><circle cx="4.5" cy="12" r="1.6"/><circle cx="19.5" cy="12" r="1.6"/></svg><span>製品紹介</span></a>
	<a <?php echo ki_tel_attr( 'spnav' ); ?>><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6.5 3.5l3 3.5-2 2.2c1 2.3 2.9 4.2 5.3 5.3l2.2-2 3.5 3-1.6 2.8C11 18.5 5.5 13 3.7 5.1z"/></svg><span>電話</span></a>
	<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="3.5" y="5.5" width="17" height="13" rx="1"/><path d="M4 6.5l8 6 8-6"/></svg><span>お問い合わせ</span></a>
	<a href="<?php echo esc_url( KI_SHOP_URL ); ?>" target="_blank" rel="noopener"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 8h14l-1 13H6z"/><path d="M9 8V6a3 3 0 0 1 6 0v2"/></svg><span>ショップ</span></a>
</nav>

<?php wp_footer(); ?>

<?php if ( is_page( 'contact' ) ) : ?>
<script>
/* 製品ページの「このアイテムについてお問い合わせ」から来たとき、お問い合わせ内容に製品名を入れる */
document.addEventListener('DOMContentLoaded', function () {
	var p = new URLSearchParams(window.location.search), t = p.get('title'), u = p.get('url');
	var ta = document.querySelector('textarea[name="box"]');
	if (!ta) return;
	if (t && u) {
		ta.value = '【' + t + '】\n' + u + '\n上記の製品についての問い合わせです。\n\n問い合わせ内容を下に入力してください。\n--------------------------';
	} else if (t && !ta.value) {
		ta.value = '【' + t + '】\n\n';
	}
});
</script>
<?php endif; ?>
</body>
</html>
