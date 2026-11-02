<?php
/**
 * ヘッダー。2026-11-02 リニューアル（旧版は Git の履歴）。
 *
 * ・CSS／JS は inc/itakura-site.php で読み込む（旧ヘッダーの jQuery 2.2.4・bootstrap・slick・Google Maps などは使っていない）
 * ・メニューはこのファイルに直接書いている（項目を変えるときはここと、下のスマホ用メニューの両方）
 * ・★クラス名は ki- で始める。<header> は使うのはここだけ（ページ内の見出しは div）
 *
 * @package OnePress
 */
$ki_nav = array(
	array( '板倉について', home_url( '/about/' ), array(
		array( '板倉のこだわり', home_url( '/about/' ) ),
		array( '京念珠師 喜芳', home_url( '/kihou-in/' ) ),
		array( '念珠（数珠）とは', home_url( '/about/about-nenjyu/' ) ),
		array( 'Hitotsubu Color', home_url( '/about/#hitotsubu' ) ),
	) ),
	array( '製品紹介・実績', home_url( '/case/' ), array() ),
	array( '卸・法人の方へ', home_url( '/about/#oroshi' ), array() ),
	array( 'サービス', home_url( '/service/fix/' ), array(
		array( '念珠（数珠）の修理', home_url( '/service/fix/' ) ),
		array( 'ワークショップ（団体・出張）', home_url( '/workshop/' ) ),
		array( '講演・トークイベント', home_url( '/lecture/' ) ),
	) ),
	array( '会社概要', home_url( '/company/' ), array() ),
	array( 'お知らせ', home_url( '/news/' ), array() ),
);
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keyword" content="京念珠,卸売り,板倉,製造卸,念珠,数珠,京都,販売,喜芳,修理">
	<title><?php echo esc_html( custom_title_structure( get_bloginfo( 'name' ) ) ); ?></title>
	<link rel="icon" href="<?php echo esc_url( ki_img_url( 'favicon.ico' ) ); ?>">
	<link rel="icon" sizes="192x192" href="<?php echo esc_url( ki_img_url( 'android-chrome-192x192.png' ) ); ?>">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( ki_img_url( 'apple-touch-icon-180x180.png' ) ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> id="top">
<?php if ( function_exists( 'wp_body_open' ) ) { wp_body_open(); } ?>

<header class="ki-hd" id="ki-hd">
	<div class="ki-hd__bar">
		<a class="ki-hd__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<img src="<?php echo esc_url( ki_img_url( 'ki/ki-logo.png' ) ); ?>" alt="株式会社 意匠京念珠 板倉" width="280" height="60">
		</a>
		<nav class="ki-hd__nav" aria-label="メインメニュー">
			<ul class="ki-hd__menu">
				<?php foreach ( $ki_nav as $n ) : ?>
				<li<?php echo $n[2] ? ' class="has-sub"' : ''; ?>>
					<a href="<?php echo esc_url( $n[1] ); ?>"><?php echo esc_html( $n[0] ); ?></a>
					<?php if ( $n[2] ) : ?>
					<ul class="ki-hd__sub">
						<?php foreach ( $n[2] as $s ) : ?>
						<li><a href="<?php echo esc_url( $s[1] ); ?>"<?php echo ( 0 === strpos( $s[1], home_url() ) ) ? '' : ' target="_blank" rel="noopener"'; ?>><?php echo esc_html( $s[0] ); ?></a></li>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
				</li>
				<?php endforeach; ?>
			</ul>
		</nav>
		<div class="ki-hd__cv">
			<a class="ki-hd__tel" <?php echo ki_tel_attr( 'header' ); ?>><small>平日 9:00–18:00</small><?php echo esc_html( KI_TEL ); ?></a>
			<a class="ki-hd__shop" href="<?php echo esc_url( KI_SHOP_URL ); ?>" target="_blank" rel="noopener">オンラインショップ</a>
			<a class="ki-hd__contact" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">お問い合わせ</a>
		</div>
		<button class="ki-hd__burger" type="button" aria-controls="ki-sp" aria-expanded="false"><span></span><span></span><span></span><b>メニュー</b></button>
	</div>
</header>

<div class="ki-sp" id="ki-sp" aria-hidden="true">
	<div class="ki-sp__top">
		<img src="<?php echo esc_url( ki_img_url( 'ki/ki-logo.png' ) ); ?>" alt="株式会社 意匠京念珠 板倉" width="210" height="45">
		<button class="ki-sp__close" type="button" aria-label="メニューを閉じる">閉じる</button>
	</div>
	<ul class="ki-sp__list">
		<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">トップ</a></li>
		<?php foreach ( $ki_nav as $n ) : ?>
		<li>
			<a href="<?php echo esc_url( $n[1] ); ?>"><?php echo esc_html( $n[0] ); ?></a>
			<?php if ( $n[2] ) : ?>
			<ul>
				<?php foreach ( $n[2] as $s ) : ?>
				<li><a href="<?php echo esc_url( $s[1] ); ?>"><?php echo esc_html( $s[0] ); ?></a></li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>
		</li>
		<?php endforeach; ?>
		<li><a href="<?php echo esc_url( KI_SHOP_URL ); ?>" target="_blank" rel="noopener">オンラインショップ（喜芳工房）</a></li>
	</ul>
	<a class="ki-sp__contact" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">お問い合わせ</a>
	<a class="ki-sp__tel" <?php echo ki_tel_attr( 'spmenu' ); ?>><?php echo esc_html( KI_TEL ); ?><small>平日 9:00–18:00</small></a>
</div>

<main class="ki-main" id="ki-main">
