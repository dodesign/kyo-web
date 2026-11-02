<?php
/**
 * お問い合わせ（/contact/）。2026-11-02 リニューアル（旧版は Git の履歴）。
 * ・フォームは MW WP Form（フォームキー 966）のまま。項目を変えるときは管理画面の MW WP Form で。
 * ・製品ページから来たときに製品名を入れる処理は footer.php の最後
 *
 * @package OnePress
 */
get_header();
?>

<?php ki_pagehead( array( 'en' => 'CONTACT', 'title' => 'お問い合わせ', 'lead' => '卸・お見積り、オーダーメイド、修理のご相談まで、お気軽に。', 'img' => 'ki/ki-0014.jpg', 'crumb' => array( array( 'お問い合わせ' ) ) ) ); ?>

<section class="ki-sec ki-contact">
	<div class="ki-wrap ki-wrap--narrow">
		<div class="ki-ways">
			<a class="ki-way" <?php echo ki_tel_attr( 'contact' ); ?>><span>お電話</span><b><?php echo esc_html( KI_TEL ); ?></b><small>平日 9:00–18:00</small></a>
			<div class="ki-way"><span>FAX</span><b><?php echo esc_html( KI_FAX ); ?></b><small>24時間受付</small></div>
			<a class="ki-way" href="#ki-form"><span>メール</span><b class="is-s">下のフォームから</b><small>24時間受付</small></a>
		</div>
		<ul class="ki-check ki-contact__notes">
			<li>ひとつからのご注文も承ります。個人の方・個人事業主の方からのお問い合わせも歓迎です</li>
			<li>お問い合わせいただいた方への営業のお電話はいたしません</li>
			<li>いただいた情報は、お客様へのご回答以外には利用いたしません</li>
		</ul>
	</div>
</section>

<section class="ki-sec ki-sec--tint" id="ki-form">
	<div class="ki-wrap ki-wrap--narrow">
		<?php ki_head( 'FORM', 'フォームでのお問い合わせ' ); ?>
		<div class="ki-form">
			<?php echo do_shortcode( '[mwform_formkey key="966"]' ); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>
