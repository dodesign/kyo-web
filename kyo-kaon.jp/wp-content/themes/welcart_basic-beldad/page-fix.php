<?php
/**
 * 念珠の修理（/service/fix/）専用テンプレート。2026-11-02 リニューアル。
 *
 * ★このページは「固定ページの本文」ではなく、このファイルの中身が表示される。
 *   文章を直したいときは、管理画面ではなくこのファイルを編集すること。
 *   （文章は旧ページ本文をもとに、並べ方と見出しを整えた。料金・納期の数字は旧ページにも無かったので書いていない）
 * ・「ご相談はこちら」はお問い合わせフォームへ。?title= を付けているので、お問い合わせ内容に【念珠の修理について】が入る（footer.php）
 * ・ページ内に相談窓口があるので、フッターのお問い合わせ帯は出さない（inc/kaon-home.php で kn-contact-page を付けている）
 */
get_header();

$kn_ask = home_url( '/contact/?title=' . rawurlencode( '念珠の修理について' ) );
$kn_steps = array(
	array( 'who' => 'お客様', 't' => 'お問い合わせ', 'p' => 'ご来店・お電話・お問い合わせフォーム・お手紙など、ご都合のよい方法でご連絡ください。' ),
	array( 'who' => '喜芳工房', 't' => '詳しくお伺いします', 'p' => 'お念珠の状態や、どのように直したいかをお伺いします。' ),
	array( 'who' => 'お客様', 't' => 'お念珠をお預かり', 'p' => 'ご持参、またはご郵送ください。' ),
	array( 'who' => '喜芳工房', 't' => 'お見積り', 'p' => '修理の可否・納期・費用などをお伝えします。' ),
);
?>
<div id="primary" class="site-content kn-page kn-fix">
	<div id="content" role="main">

		<?php /* ★<header> にしないこと（親テーマの #content header 指定に負ける） */ ?>
		<div class="kn-pghero kn-full">
			<?php /* 旧ページの写真。メディアライブラリに登録が無いので URL で指定 */ ?>
			<?php echo kaon_img( '/wp-content/uploads/2017/08/MG_0116.jpg', 'full', '', array( 'class' => 'kn-pghero__img', 'loading' => 'eager' ) ); ?>
			<div class="kn-pghero__body">
				<p class="kn-pghero__eyebrow">REPAIR</p>
				<h1 class="kn-pghero__title">念珠の修理</h1>
				<p class="kn-pghero__lead">大切なお念珠だからこそ、<br>職人の手で、もう一度。</p>
			</div>
		</div>

		<section class="kn-sec kn-full">
			<div class="kn-wrap kn-wrap--narrow">
				<p class="kn-fix__lead" data-rv>お念珠（数珠）は、大切にお使いいただいていても、長い年月のうちに傷んでしまうものです。紐が切れたり、房が汚れてしまったり。それでも大切なお念珠だからこそ買い替えることができず、お困りの方もいらっしゃるのではないでしょうか。</p>
				<p class="kn-fix__lead" data-rv>そんな時は、喜芳工房にお任せください。<strong>喜芳から伝統の技を引き継いだ念珠職人が、お客様の大切なお念珠を一つひとつ、丁寧に修理いたします。</strong></p>
			</div>
		</section>

		<section class="kn-sec kn-sec--tint kn-full">
			<div class="kn-wrap">
				<div class="kn-head"><h2><small>WHAT WE REPAIR</small>修理ができるお念珠</h2></div>
				<ul class="kn-fix__kinds">
					<li data-rv><span>01</span>喜芳工房のお念珠</li>
					<li data-rv><span>02</span>他店でご購入されたお念珠</li>
					<li data-rv><span>03</span>ご自宅にあったお念珠など</li>
				</ul>
				<div class="kn-fix__notes" data-rv>
					<p><b>喜芳工房のお念珠でなくとも、修理させていただけます。</b></p>
					<p>個人のお客様だけでなく、<b>事業者様からのご依頼</b>も承っております。<b>大量の数珠修理</b>も可能です。ご遠慮なくご連絡くださいませ。</p>
				</div>
			</div>
		</section>

		<section class="kn-sec kn-full">
			<div class="kn-wrap">
				<div class="kn-head"><h2><small>FLOW</small>修理の流れ</h2></div>
				<ol class="kn-flow">
					<?php foreach ( $kn_steps as $i => $s ) : ?>
					<li class="kn-flow__step" data-rv>
						<span class="kn-flow__no"><?php echo (int) $i + 1; ?></span>
						<span class="kn-flow__who"><?php echo esc_html( $s['who'] ); ?></span>
						<h3><?php echo esc_html( $s['t'] ); ?></h3>
						<p><?php echo esc_html( $s['p'] ); ?></p>
					</li>
					<?php endforeach; ?>
				</ol>
			</div>
		</section>

		<section class="kn-fix__cta kn-full">
			<?php echo kaon_img( 8054, '1536x1536', '', array( 'class' => 'kn-fix__ctaimg' ) ); // 工房で職人が作業している写真 ?>
			<div class="kn-wrap kn-wrap--narrow" data-rv>
				<p class="kn-pghero__eyebrow">CONTACT</p>
				<h2>修理のご相談はこちら</h2>
				<p class="kn-fix__ctalead">「これは直せるかな？」というものでも、まずはお気軽にご相談ください。</p>
				<div class="kn-fix__ctas">
					<a class="kn-fix__tel" href="tel:0757216600"><small>お電話（受付 9:00–18:00）</small>075-721-6600</a>
					<a class="kn-fix__mail" href="<?php echo esc_url( $kn_ask ); ?>"><small>メール（24時間受付）</small>フォームで相談する</a>
				</div>
				<p class="kn-fix__shop">ご来店でのご相談は <a href="#kn-shops">北山本店・烏丸店</a> へ。</p>
			</div>
		</section>

	</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
