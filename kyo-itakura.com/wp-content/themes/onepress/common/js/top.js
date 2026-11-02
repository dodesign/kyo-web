//トップのスライドショー

jQuery(document).ready(function($) {
    $('.swiper-container').slick({
        dots: true,         // ドットナビゲーションを表示
        infinite: true,     // スライドが無限にループ
        speed: 500,         // スライドの速度
        fade: true,         // フェード効果を使用
        cssEase: 'linear',  // アニメーションのイージング
        autoplay: true,     // 自動再生
        autoplaySpeed: 2000 // 自動再生の間隔
    });
});

//ヘッダー固定

jQuery(function () {
    var nav = jQuery('.p-header');

    // メニューのtop座標を取得する
    var offsetTop = $('.p-intro').offset().top;

    var floatMenu = function () {
        // スクロール位置がメニューのtop座標を超えたら固定にする
        if (jQuery(window).scrollTop() > offsetTop) {
            nav.addClass('fixed');
        } else {
            nav.removeClass('fixed');
        }
    }
    jQuery(window).scroll(floatMenu);
    jQuery('body').bind('touchmove', floatMenu);
});

