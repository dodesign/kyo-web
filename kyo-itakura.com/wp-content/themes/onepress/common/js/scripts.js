//カルーセル
//
//$(function () {
//    $('#p-re-list').owlCarousel({
//        items: 4, //表示する項目数
//        responsive: {　 //レスポンシブ対応
//            // ブレイクポイント 0以上
//            0: {
//                items: 1,
//            },
//            // ブレイクポイント 480以上
//            480: {
//                items: 2,
//            },
//            // ブレイクポイント 768以上
//            768: {
//                items: 3,
//            }
//        }
//    })
//});

//$(window).load(function () {
//    $('.flexslider').flexslider({
//        animation: "slide",
//        animationLoop: true,
//        itemWidth: 210,
//        itemMargin: 5,
//        minItems: 2,
//        maxItems: 4
//    });
//});

//製品紹介スライド
$(window).load(function () {
    $('.slides').slick({
        slidesToShow: 4,
        slidesToScroll: 4,
        autoplay: true,
        autoplaySpeed: 2000,
       /* responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 5,
                }
          }, {
                breakpoint: 480,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                }
               }
          ]*/
    });
});



//ローディング

//$(function () {
//    var h = $(window).height();
//
//    $('body').css('display', 'none');
//    $('#loader-bg ,#loader').height(h).css('display', 'block');
//});
//
//$(window).load(function () { //全ての読み込みが完了したら実行
//    $('#loader-bg').delay(900).fadeOut(800);
//    $('#loader').delay(600).fadeOut(300);
//    $('body').css('display', 'block');
//});
//
////10秒たったら強制的にロード画面を非表示
//$(function () {
//    setTimeout('stopload()', 10000);
//});

//cvトラッキング
//
document.addEventListener('wpcf7mailsent', function (event) {
    ga('send', 'event', 'Contact Form', 'submit');
}, false);

//アナリティクス

(function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function () {
        (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

ga('create', 'UA-97207346-1', 'auto');
ga('send', 'pageview');

//Ptengine

    window._pt_lt = new Date().getTime();
    window._pt_sp_2 = [];
    _pt_sp_2.push('setAccount,78e491fe');
    var _protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
    (function() {
        var atag = document.createElement('script'); atag.type = 'text/javascript'; atag.async = true;
        atag.src = _protocol + 'js.ptengine.jp/pta.js';
        var stag = document.createElement('script'); stag.type = 'text/javascript'; stag.async = true;
        stag.src = _protocol + 'js.ptengine.jp/pts.js';
        var s = document.getElementsByTagName('script')[0]; 
        s.parentNode.insertBefore(atag, s); s.parentNode.insertBefore(stag, s);
    })();
                        

//caseの商品

//ズーム
$(function () {
    $('.n2-ss-slide-background-image').okzoom({
        width: 300, // ルーペの幅
        height: 300, // ルーペの高さ
        round: true, // ルーペの形
        shadow: "0 0 5px #000" // ルーペの影指定
    });
});

//スマホメニュー

$(window).load(function () {
    $(".spmenu_btn").on("click", function () {
        var $menu = $(this).next(); // メニューを取得
        $menu.slideToggle(); // スライドトグルの効果を適用

        $(this).toggleClass("active"); // ボタンの状態を切り替え
        $('.spmenu').toggleClass("c-db"); // メニューのクラスを切り替え

        // ボタンのテキストを切り替え
        if ($(this).hasClass("active")) {
            $('.spmenu_btn_text').text('閉じる'); // メニューが開いたら「閉じる」に変更
        } else {
            $('.spmenu_btn_text').text('メニュー'); // メニューが閉じたら「メニュー」に戻す
        }
    });
	var navHeight = $('.p-nav').outerHeight(); // .p-navの高さを取得
    $('.spmenu').css('top', navHeight + 89 + 'px'); // .spmenuを.p-navの直下に配置
});


//Google map

function googleMap() {
    var latlng = new google.maps.LatLng(35.056315, 135.761626);

    var myOptions = {
        zoom: 14,
        scrollwheel: false,
        center: latlng,
        /*地図の中心を指定*/
        mapTypeControlOptions: {
            mapTypeIds: ['style', google.maps.MapTypeId.ROADMAP]
        }
    };
    var map = new google.maps.Map(document.getElementById('c-ggl-map'), myOptions);
    /*'map'の部分は地図を表示させたいdivのid名を入れよう*/

    /*アイコン設定*/
    var icon = new google.maps.MarkerImage('/wp-content/themes/onepress/common/img/map-img.png', /*アイコンのURL*/
        new google.maps.Size(46, 56), /*アイコンサイズ*/
        new google.maps.Point(0, 0) /*アイコンの位置*/
    );
    var markerOptions = {
        position: latlng,
        map: map,
        icon: icon,
        title: '株式会社意匠京念珠板倉',
        /*タイトル*/

        animation: google.maps.Animation.DROP
        /*ずっとぴょんぴょんしているBOUNCEか、最初にボトッと落ちてくるDROP。
        動かなくていい場合はこの1行は不要*/

    };
    var marker = new google.maps.Marker(markerOptions);
    var styleOptions = [
                    /*★★ここに後でカスタマイズするデザインの内容が入ります★★*/
                    [{
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [{
                "color": "#e9e9e9"
                        }, {
                "lightness": 17
                        }]
                    }, {
            "featureType": "landscape",
            "elementType": "geometry",
            "stylers": [{
                "color": "#f5f5f5"
                        }, {
                "lightness": 20
                        }]
                    }, {
            "featureType": "road.highway",
            "elementType": "geometry.fill",
            "stylers": [{
                "color": "#ffffff"
                        }, {
                "lightness": 17
                        }]
                    }, {
            "featureType": "road.highway",
            "elementType": "geometry.stroke",
            "stylers": [{
                "color": "#ffffff"
                        }, {
                "lightness": 29
                        }, {
                "weight": 0.2
                        }]
                    }, {
            "featureType": "road.arterial",
            "elementType": "geometry",
            "stylers": [{
                "color": "#ffffff"
                        }, {
                "lightness": 18
                        }]
                    }, {
            "featureType": "road.local",
            "elementType": "geometry",
            "stylers": [{
                "color": "#ffffff"
                        }, {
                "lightness": 16
                        }]
                    }, {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [{
                "color": "#f5f5f5"
                        }, {
                "lightness": 21
                        }]
                    }, {
            "featureType": "poi.park",
            "elementType": "geometry",
            "stylers": [{
                "color": "#dedede"
                        }, {
                "lightness": 21
                        }]
                    }, {
            "elementType": "labels.text.stroke",
            "stylers": [{
                "visibility": "on"
                        }, {
                "color": "#ffffff"
                        }, {
                "lightness": 16
                        }]
                    }, {
            "elementType": "labels.text.fill",
            "stylers": [{
                "saturation": 36
                        }, {
                "color": "#333333"
                        }, {
                "lightness": 40
                        }]
                    }, {
            "elementType": "labels.icon",
            "stylers": [{
                "visibility": "off"
                        }]
                    }, {
            "featureType": "transit",
            "elementType": "geometry",
            "stylers": [{
                "color": "#f2f2f2"
                        }, {
                "lightness": 19
                        }]
                    }, {
            "featureType": "administrative",
            "elementType": "geometry.fill",
            "stylers": [{
                "color": "#fefefe"
                        }, {
                "lightness": 20
                        }]
                    }, {
            "featureType": "administrative",
            "elementType": "geometry.stroke",
            "stylers": [{
                "color": "#fefefe"
                        }, {
                "lightness": 17
                        }, {
                "weight": 1.2
                        }]
                    }]

                ];
    var styledMapOptions = {
        name: '株式会社意匠京念珠板倉',
    } /*地図の上に表示されるタイトル*/
    var sampleType = new google.maps.StyledMapType(styleOptions, styledMapOptions);
    map.mapTypes.set('style', sampleType);
    map.setMapTypeId('style');
};
google.maps.event.addDomListener(window, 'load', function () {
    googleMap();
});

//ナビのドロップダウン
function mediaQueriesWin(){
  var width = $(window).width();
  if(width <= 768) {//横幅が768px以下の場合
    $(".has-child>a").off('click'); //has-childクラスがついたaタグのonイベントを複数登録を避ける為offにして一旦初期状態へ
    $(".has-child>a").on('click', function() {//has-childクラスがついたaタグをクリックしたら
      var parentElem =  $(this).parent();// aタグから見た親要素の<li>を取得し
      $(parentElem).toggleClass('active');//矢印方向を変えるためのクラス名を付与して
      $(parentElem).children('ul').stop().slideToggle(500);//liの子要素のスライドを開閉させる※数字が大きくなるほどゆっくり開く
      return false;//リンクの無効化
    });
  }else{//横幅が768px以上の場合
    $(".has-child>a").off('click');//has-childクラスがついたaタグのonイベントをoff(無効)にし
    $(".has-child>a").removeClass('active');//activeクラスを削除
    $('.has-child').children('ul').css("display","");//スライドトグルで動作したdisplayも無効化にする
  }
}

// ページがリサイズされたら動かしたい場合の記述
$(window).resize(function() {
  mediaQueriesWin();/* ドロップダウンの関数を呼ぶ*/
});

// ページが読み込まれたらすぐに動かしたい場合の記述
$(window).on('load',function(){
  mediaQueriesWin();/* ドロップダウンの関数を呼ぶ*/
});
