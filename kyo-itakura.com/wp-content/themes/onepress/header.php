<?php
/**
 * The header for the OnePress theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package OnePress
 */

?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>

    <head>

        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keyword" content="京念珠,卸売り,板倉,製造卸,念珠,数珠,京都,販売,喜芳,修理">

        <?php wp_deregister_script('jquery'); ?>
        <!-- WordPressのjQueryを読み込ませない -->

        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <style>
            header {
                display: none;
            }

        </style>
        <script>
            $(window).load(function() {
                $('header').fadeIn(0);
            });
        </script>
		
		<title><?php echo custom_title_structure(get_bloginfo('name')); ?></title>
		
        <?php wp_head(); ?>

        <!--<script src="//code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>-->


        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            <script src="<?php echo get_template_directory_uri(); ?>/common/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js" async ></script>
        <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyATwlQI6bwOt8lfleOyagDwXrsQT55ZsxE
&callback=initMap"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/common/js/mouseoverGallery.js" async></script>


        <script src="<?php echo get_template_directory_uri(); ?>/common/js/jquery.flexslider.js"></script>
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/common/css/flexslider.min.css">
        <script src="<?php echo get_template_directory_uri(); ?>/common/js/okzoom.min.js" async></script>
        <script src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js" async></script>
        <script src="<?php echo get_template_directory_uri(); ?>/common/js/scripts.js" async></script>

        <?php if( is_page('contact') ) : ?>
        <script src="//ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8" async></script>
        <?php endif; // 条件分岐終わり ?>
		
        <?php if( is_front_page() ) : // トップページの場合 ?>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.min.css">
        <script src="<?php echo get_template_directory_uri(); ?>/common/js/swiper.jquery.min.js" async></script>
        <script src="<?php echo get_template_directory_uri(); ?>/common/js/top.js" async></script>
        <script>
            $(document).ready(function() {
                $('.swiper-container').slick({
                    accessibility: false,
                    arrows: false,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    infinite: true,
                    fade: true,
                    speed: 600,
                    slidesToShow: 1,
                    adaptiveHeight: true,
                    pauseOnHover: false,
                });
                $('.menu-case').removeClass("is-active");
            });

        </script>
		<style>
			.sp-top-img {
				display: none;
			}
			@media screen and (max-width: 768px) {
				.sp-top-img {
					display: block;
					padding-top: 63px;
				}
				.swiper-container {
					display: none !important;
				}
			}
		</style>

        <?php endif; // 条件分岐終わり ?>

        <?php if( !is_front_page() ) : // トップページ以外 ?>
        <script>
            $(window).on('scroll', function() {
                $('.p-header').toggleClass('fixed', $(this).scrollTop() > 50);
            });

        </script>
        <?php endif; // 条件分岐終わり ?>


        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/common/img/favicon.ico">
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/common/img/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/common/img/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/common/img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/common/img/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/common/img/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/common/img/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/common/img/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/common/img/apple-touch-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/common/img/apple-touch-icon-180x180.png">
        <link rel="icon" sizes="192x192" href="<?php echo get_template_directory_uri(); ?>/common/img/android-chrome-192x192.png">
        <link rel="icon" sizes="48x48" href="<?php echo get_template_directory_uri(); ?>/common/img/favicon-48x48.png">
        <link rel="icon" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/common/img/favicon-96x96.png">
        <link rel="icon" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/common/img/favicon-160x160.png">
        <link rel="icon" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/common/img/favicon-196x196.png">
        <link rel="icon" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/common/img/favicon-32x32.png">

        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/common/css/styles.min.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/common/css/slick.min.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/common/css/slick-theme.min.css">



    </head>



    <body id="top">
        <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


        <?php if( is_front_page() ) : // トップページの場合 ?>
        <div class="swiper-container">
            <div class="swiper-slide"><img src="<?php echo get_template_directory_uri(); ?>/common/img/top-img.jpg" alt="">
            </div>
            <div>
                <img src="<?php echo get_template_directory_uri(); ?>/common/img/top-img2.jpg" alt="">
            </div>
            <div class="swiper-slide">
                <img src="<?php echo get_template_directory_uri(); ?>/common/img/top-img3.jpg" alt="">
            </div>
            <div class="swiper-slide">
                <img src="<?php echo get_template_directory_uri(); ?>/common/img/top-img4.jpg" alt="">
            </div>
        </div>
		
		<div class="sp-top-img"><img src="<?php echo get_template_directory_uri(); ?>/common/img/top-img.jpg" alt="">
            </div>
		
        <!-- /.fullSlideShow -->
        <?php endif; // 条件分岐終わり ?>
        <header class="p-header <?php if( is_front_page() ) :?>fixed<?php endif;?>">
            <section class="p-nav">
                <div class="p-nav--content container">
                    <div class="logo">
                        <a href="/"><img src="<?php echo get_template_directory_uri(); ?>/common/img/logo.jpg" alt="意匠京念珠板倉"></a>
                    </div>
                    <div class="header-nav">
                        <nav>
                            <ul class="p-nav--content__primary">
                                <li class="<?php if ( is_page('about') ) { echo ' is-active'; } ?> has-child"><a href="/about">板倉のこだわり</a>
									<ul>
                                     <li><a href="/about#oroshi">京念珠製造卸事業</a></li>
                                     <li><a href="/about#netshop">通信販売事業</a></li>
                                     <li><a href="/about#hitotsubu">学生さんとのコラボブランド Hitotsubu Color</a></li>
                                  </ul>
                                </li>
								<li class="has-child"><a href="#">サービス</a>
								  <ul>
                                     <li><a href="/service/fix">京念珠(数珠)の修理</a></li>
                                     <li><a href="https://kyo-kaon.jp/service/workshop/">京念珠ブレス作りワークショップ</a></li>
                                  </ul>
								</li>
                                <li class="menu-case<?php if ( is_page('case') || in_category('case')) { echo ' is-active'; } elseif ( is_home() ) { echo ''; }?>"><a href="/case">製品紹介・実績</a></li>
                                <li class="<?php if ( is_page('company') ) { echo ' is-active'; } ?>"><a href="/company">会社概要</a></li>
                                <li class="<?php if ( is_category('news') ) { echo ' is-active'; } ?>"><a href="/news">新着情報</a></li>
                                <!--<li class="<?php if ( is_category('news') ) { echo ' is-active'; } ?>"><a href="/blog">ブログ</a></li>-->
                                <li style="text-align: center;"><a href="/about#netshop">オンラインショップ</a></li>
                                <li class="p-nav--content__primary__cv"><a href="/contact" class="btn-contact btn-small">お問い合わせ</a></li>
                            </ul>
                            <ul class="p-nav--content__cv">
                                <li><a href="tel: 0757216600" onclick="gtag('event','tel-tap',{'event_category':'click','event_label': 'head'});"><img src="<?php echo get_template_directory_uri(); ?>/common/img/menu_tel.png" alt="075-721-6600"></a></li>
                            </ul>
                        </nav>
                    </div>
                    <span class="spmenu_btn"></span>
                    <p class="spmenu_btn_text">メニュー</p>
                    <div class="spmenu">
                        <nav>
                            <ul>
                                <li><a href="/">トップ</a></li>
                                <li class="has-child"><a href="/about">板倉のこだわり</a>
									<ul>
                                     <li><a href="/about#oroshi">京念珠製造卸事業</a></li>
                                     <li><a href="/about#netshop">通信販売事業</a></li>
                                     <li><a href="/about#hitotsubu">学生さんとのコラボブランド Hitotsubu Color</a></li>
                                  </ul>
								</li>
								</li>
								<li class="has-child"><a href="#">サービス</a>
								  <ul>
                                     <li><a href="/news/fix/">京念珠(数珠)の修理</a></li>
                                     <li><a href="https://kyo-kaon.jp/service/workshop/">京念珠ブレス作りワークショップ</a></li>
                                  </ul>
								</li>
                                <li><a href="/case">製品紹介・実績</a></li>
                                <li><a href="/company">会社概要</a></li>
                                <li><a href="/news">新着情報</a></li>
								<li><a href="/about#netshop">オンラインショップ</a></li>
                                <li class="p-nav--content__primary__cv2"><a href="/contact" class="btn-contact btn-small">お問い合わせ</a></li>
                                <li><a href="tel: 0757216600" onclick="gtag('event','tel-tap',{'event_category':'click','event_label': 'head'});"><img src="<?php echo get_template_directory_uri(); ?>/common/img/menu_tel.png" alt="075-721-6600"></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </section>
            <div class="p-deco-line row">
                <div class="p-deco-line1 col-xs-4 c-no-margin c-no-padding"></div>
                <!-- /.col-sm-4 -->
                <div class="p-deco-line2 col-xs-4 c-no-margin c-no-padding"></div>
                <!-- /.col-sm-4 -->
                <div class="p-deco-line3 col-xs-4 c-no-margin c-no-padding"></div>
                <!-- /.col-sm-4 -->
            </div>
            <!-- /.row -->
        </header>
