<?php
/**
 * @package Welcart
 * @subpackage Welcart Belded
 */
?>

				</div><!-- .site-content-wrap -->
			</div><!-- #main -->

			<?php if (! wp_is_mobile() ) : ?>
				<div id="toTop" class="wrap fixed"><a href="#masthead"><i class="fa fa-angle-up" aria-hidden="true"></i></a></div>
			<?php endif; ?>

			<?php
			/* ===== フッター（2026-11-02 リニューアル） =====
			   旧フッターは Git の履歴に残っている（2026-11-02 より前のコミット）。
			   ★埋め込みのGoogleマップはやめた（全ページで毎回読み込まれて重かったため）。
			   ★リンクの4列はここに直接書いている。項目を増やすときはこのファイルを編集する。 */
			$kn_u = function ( $path ) { return esc_url( home_url( $path ) ); };
			?>
			<footer id="colophon" class="kn-ft" role="contentinfo">

				<section class="kn-ft-contact">
					<div class="kn-ft-contact__in">
						<small>CONTACT</small>
						<h2>お気軽にお問い合わせください</h2>
						<p>各宗派の本式・略式はもちろん、ご希望の色の珠でのオーダーメイドも承ります。「こんなことは難しいかな」と思われるようなこだわりも、ご遠慮なくご相談ください。</p>
						<div class="kn-ft-contact__cols">
							<div>
								<h3>お電話</h3>
								<a class="kn-ft-tel" href="tel:0757216600">075-721-6600</a>
								<span>受付時間 9:00–18:00</span>
							</div>
							<div>
								<h3>メール</h3>
								<a class="kn-ft-btn" href="<?php echo $kn_u( '/contact/' ); ?>">お問い合わせフォーム</a>
								<span>24時間受付</span>
							</div>
						</div>
					</div>
				</section>

				<?php
				/* 店舗欄の背景：北山本店サロンの写真（06.画像素材/210421_サロン撮影（小藪さん）/0001.jpg → メディアID 8048）。
				   差し替えるときはIDを変える。 */
				$kn_shops_bg = wp_get_attachment_image_url( 8048, '1536x1536' );
				?>
				<section class="kn-ft-shops"<?php if ( $kn_shops_bg ) : ?> style="--kn-shops-bg:url('<?php echo esc_url( $kn_shops_bg ); ?>')"<?php endif; ?>>
					<div class="kn-wrap">
						<div class="kn-head kn-head--solo"><h2><small>SHOPS</small>店舗のご案内</h2></div>
						<p class="kn-ft-shops__lead">お品を手に取ってご覧いただけます。</p>
						<div class="kn-ft-shops__grid">
							<div class="kn-shop">
								<small>MAIN STORE</small>
								<h3>北山本店</h3>
								<dl>
									<dt>住所</dt><dd>〒603-8083<br>京都府京都市北区上賀茂向縄手町40-1</dd>
									<dt>営業</dt><dd>平日 10:00–17:00</dd>
									<dt>ご案内</dt><dd>駐車場あり／ご予約不要</dd>
								</dl>
								<p>サロンの見学や、喜芳工房の数々のお念珠をご覧いただけます。修理も承ります。土日祝は事前のご予約で、できる限りご対応いたします。</p>
								<a class="kn-shop__map" href="https://www.google.com/maps/search/?api=1&amp;query=%E6%84%8F%E5%8C%A0%E4%BA%AC%E5%BF%B5%E7%8F%A0%E6%9D%BF%E5%80%89" target="_blank" rel="noopener">Googleマップで見る</a>
							</div>
							<div class="kn-shop">
								<small>KARASUMA</small>
								<h3>烏丸店<span>（ハンケイ5mショップ内）</span></h3>
								<dl>
									<dt>住所</dt><dd>〒600-8412<br>京都府京都市下京区二帖半敷町652<br>からすま京都ホテル1F</dd>
									<dt>営業</dt><dd>水・木・金 11:00–19:00</dd>
									<dt>ご案内</dt><dd>ご予約不要</dd>
								</dl>
								<a class="kn-shop__map" href="https://www.google.com/maps/search/?api=1&amp;query=%E3%81%8B%E3%82%89%E3%81%99%E3%81%BE%E4%BA%AC%E9%83%BD%E3%83%9B%E3%83%86%E3%83%AB" target="_blank" rel="noopener">Googleマップで見る</a>
							</div>
						</div>
					</div>
				</section>

				<div class="kn-ft-main">
					<div class="kn-wrap">
						<div class="kn-ft-main__grid">
							<div class="kn-ft-brand">
								<a href="<?php echo $kn_u( '/' ); ?>"><img src="<?php echo esc_url( home_url( '/common/img/logo_04_g.png' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" width="205" height="50" loading="lazy"></a>
								<p>京の名工 喜芳の技術と想いを<br>受け継いだ京念珠とブレスレット</p>
								<?php if ( wcct_get_options( 'instagram_button' ) ) : ?>
								<a class="kn-ft-sns" href="https://www.instagram.com/<?php echo esc_attr( wcct_get_options( 'instagram_id' ) ); ?>" target="_blank" rel="noopener"><?php echo kaon_icon( 'ig' ); ?>Instagram</a>
								<?php endif; ?>
							</div>
							<div class="kn-ft-col">
								<h4>SHOP</h4>
								<ul>
									<li><a href="<?php echo $kn_u( '/category/item/' ); ?>">商品一覧</a></li>
									<li><a href="<?php echo esc_url( get_category_link( 103 ) ); ?>">京念珠（数珠）</a></li>
									<li><a href="<?php echo esc_url( get_category_link( 104 ) ); ?>">数珠ブレスレット</a></li>
									<li><a href="<?php echo esc_url( get_category_link( 105 ) ); ?>">数珠＋念珠袋セット</a></li>
									<li><a href="<?php echo $kn_u( '/category/item/kyo-nenjyu-case/' ); ?>">念珠袋</a></li>
									<li><a href="<?php echo $kn_u( '/category/item/one-of-a-kind/' ); ?>">一点もの</a></li>
									<li><a href="<?php echo $kn_u( '/category/item/kiho/' ); ?>">喜芳作</a></li>
									<li><a href="<?php echo $kn_u( '/category/item/furusato/' ); ?>">ふるさと納税 返礼品</a></li>
								</ul>
							</div>
							<div class="kn-ft-col">
								<h4>SERVICE</h4>
								<ul>
									<li><a href="<?php echo $kn_u( '/service/workshop/' ); ?>">数珠ブレス作り体験</a></li>
									<li><a href="<?php echo $kn_u( '/service/fix/' ); ?>">京念珠の修理</a></li>
									<li><a href="<?php echo $kn_u( '/case/461/' ); ?>">オーダーメイド</a></li>
									<li><a href="<?php echo $kn_u( '/hitotsubu-color/' ); ?>">Hitotsubu Color</a></li>
								</ul>
							</div>
							<div class="kn-ft-col">
								<h4>ABOUT</h4>
								<ul>
									<li><a href="<?php echo $kn_u( '/kihou-koubou/' ); ?>">喜芳工房のこだわり</a></li>
									<li><a href="<?php echo $kn_u( '/company/' ); ?>">会社概要</a></li>
									<li><a href="<?php echo $kn_u( '/blog/' ); ?>">ブログ</a></li>
									<li><a href="<?php echo $kn_u( '/category/news/' ); ?>">お知らせ</a></li>
								</ul>
							</div>
							<div class="kn-ft-col">
								<h4>GUIDE</h4>
								<ul>
									<li><a href="<?php echo $kn_u( '/guide/' ); ?>">ご利用ガイド</a></li>
									<li><a href="<?php echo $kn_u( '/contact/' ); ?>">お問い合わせ</a></li>
									<li><a href="<?php echo $kn_u( '/tokushoho/' ); ?>">特定商取引法に基づく表記</a></li>
									<li><a href="<?php echo $kn_u( '/terms/' ); ?>">プライバシーポリシー</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="kn-ft-copy">
						<span>&copy; 株式会社意匠京念珠板倉（喜芳工房）</span>
						<span>京都・上賀茂</span>
					</div>
				</div>

			</footer><!-- #colophon -->

			<div id="gray-bg" class="gray-bg"></div>

		</div><!-- .site -->

		<div class="load-container-wrap">
			<div class="load-container">
				<div class="loader">
				</div>
			</div>
		</div>

		<?php wp_footer(); ?>

		<?php if ( is_page('contact') ) : ?>
			<script>
			document.addEventListener('DOMContentLoaded', function() {
				const params = new URLSearchParams(window.location.search);
				const title = params.get('title');
				const url = params.get('url');

				if (title && url) {
					const textarea = document.querySelector('textarea[name="box"]');
					if (textarea) {
						textarea.value = `【${title}】\n${url}\n上記商品についての問い合わせです。\n\n問い合わせ内容を下に入力してください。\n--------------------------`;
					}
				}
			});
			</script>
		<?php endif; ?>

		<?php if ( is_page('usces-cart') ) : ?>
			<script>
				document.addEventListener('DOMContentLoaded', function() {
					// customer_loginformを持つフォームを探す
					var loginForm = document.querySelector('form[name="customer_loginform"] table');

					if (loginForm) {
						// 挿入するHTML
						var newElement = `
							<p id="nav">
								<a href="/usces-member/?usces_page=lostmemberpassword" title="パスワードをお忘れですか？">パスワードをお忘れですか？</a> 
							</p>
						`;

						// newElementをフォームの直下に挿入
						loginForm.insertAdjacentHTML('afterend', newElement);
					}
				});
			</script>
		<?php endif; ?>

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-E5FEKBDFML"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-E5FEKBDFML');
	</script>

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-18113833274"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'AW-18113833274');
	</script>

	</body>
</html>