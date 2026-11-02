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

			<footer id="colophon" role="contentinfo">
				<div class="inner">
					
					<div class="p-more uk-text-center uk-padding">
						<div class="column1070">
						<h2 class="">お気軽にお問合せください</h2>
							<p>各宗派の本式や略式はもちろんのこと、ご希望のお色の珠などでオーダーメイドでご対応させて頂くことも可能です。<br>
お探しの材質や色目やご予算など、「こんなことは難しいかな……」と思われるようなこだわりもご遠慮なくご相談ください。<br>
喜芳直伝の技術を受け継いだ職人がお一人おひとりのご要望を具現化します。</p>
							<div class="uk-child-width-1-2@s" uk-grid>
								<div>
								<h3 class="uk-text-center">お電話</h3>
									<a href="tel: 0757216600"><h4 class="uk-text-large">075-721-6600</h4></a>
									<span class="c-note">受付時間 9:00-18:00</span>
								</div>
								<div>
									<h3 class="uk-text-center">メール</h3>
									<p><button onclick="location.href='/contact/'" class="uk-button uk-button-secondary">お問い合わせフォーム</button></p>
									<span class="c-note">受付時間 24時間</span>
								</div>
							</div>
						</div>
					</div>
					
					<div class="p-map">
							<div uk-grid>
								<div class="uk-width-1-3@s uk-padding c-bg-light">
								<h2 class="">お品を手に取ってご覧いただけます</h2>
									<h2 class="c-no-margin"><img src="/wp-content/uploads/2020/04/logo_04.png" alt="創作京念珠 喜芳工房 京 上賀茂かおん"></h2>
									<h3><b>北山本店</b></h3>
									<address>
									   〒603-8083 京都府京都市北区上賀茂向縄手町40-1<br>
										営業日時 平日 10:00-17:00 / 駐車場有 / ご予約不要
								   </address>
									<span class="c-note">喜芳工房では、サロンの見学や、喜芳工房の数々のお念珠をご覧いただけます。修理も承ります。お気軽にお越しくださいませ。<br>
										※ 土日祝は事前のご予約で、できる限りご対応させていただきます。お気軽にご連絡くださいませ
									</span>
									
									<h3><b>烏丸店（ハンケイ5mショップ内）</b></h3>
									<address>
									   〒600-8412 京都府京都市下京区二帖半敷町652 からすま京都ホテル1F<br>
										営業日時 :水木金 11:00-19:00 / ご予約不要
								   </address>
								</div>
								<div class="uk-width-2-3@s">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3266.016028142963!2d135.7594293153971!3d35.056338371595096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6001a7f758630f83%3A0xa2d8eef8950af020!2z77yI5qCq77yJ5oSP5Yyg5Lqs5b-154-g5p2_5YCJ!5e0!3m2!1sja!2sjp!4v1599990156290!5m2!1sja!2sjp" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
								</div>
							</div>
					</div>

					<div class="top cf">

						<div class="column1070">

							<?php if ( is_active_sidebar( 'footer' ) ): ?>
							<div class="f-widgetArea">
								<?php dynamic_sidebar( 'footer' ); ?>
							</div><!-- .f-widgetArea -->
							<?php endif; ?>

							<?php if ( has_nav_menu( 'footer' ) ): ?>
							<nav id="site-info" class="f-mainnav">
							<?php
								$page_cart	=	get_page_by_path( 'usces-cart' );
								$page_member	=	get_page_by_path( 'usces-member' );
								$exclude_pages	=	"{$page_cart->ID},{$page_member->ID}";
								wp_nav_menu( array( 'theme_location' => 'footer', 'exclude' => $exclude_pages, 'menu_class' => 'footer-menu cf' ) ); 
							?>
							</nav><!-- #colophon -->
							<?php endif; ?>

							<?php if ( has_nav_menu( 'footer-sub' ) ): ?>
							<nav class="f-subnav">
							<?php
								$page_cart	=	get_page_by_path( 'usces-cart' );
								$page_member	=	get_page_by_path( 'usces-member' );
								$exclude_pages	=	"{$page_cart->ID},{$page_member->ID}";
								wp_nav_menu( array( 'depth' => '1', 'theme_location' => 'footer-sub', 'exclude' => $exclude_pages , 'menu_class' => 'footer-menu cf' ) );
							?>
							</nav><!-- f-subnav -->
							<?php endif; ?>

						</div><!-- .column1070 -->

					</div><!-- .top -->

					<div class="bottom">

						<div class="column1070">

							<div class="flex-container">
								<div class="f-logo"><a href="/"><?php bloginfo( 'name' ); ?></a></div>

								<?php if( wcct_get_options( 'facebook_button' ) || wcct_get_options( 'twitter_button' ) || wcct_get_options( 'instagram_button' ) ): ?>
								<div class="sns">
									<ul class="cf">
										<?php if( wcct_get_options( 'facebook_button' ) ): ?>
										<li><a href="https://www.facebook.com/<?php wcct_options( 'facebook_id' ); ?>" target="_blank" rel="nofollow"><i class="fa fa-facebook"></i></a></li>
										<?php endif; ?>

										<?php if( wcct_get_options( 'twitter_button' ) ): ?>
										<li><a href="https://twitter.com/<?php wcct_options( 'twitter_id' ); ?>" target="_blank" rel="nofollow"><i class="fa fa-twitter"></i></a></li>
										<?php endif; ?>

										<?php if( wcct_get_options( 'instagram_button' ) ): ?>
										<li><a href="https://www.instagram.com/<?php wcct_options( 'instagram_id' ); ?>" target="_blank" rel="nofollow"><i class="fa fa-instagram"></i></a></li>
										<?php endif; ?>
									</ul>
								</div>
								<?php endif; ?>

							</div><!-- .flex-container -->

						</div><!-- .column1070 -->

						<p class="copyright"><?php usces_copyright(); ?></p>

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