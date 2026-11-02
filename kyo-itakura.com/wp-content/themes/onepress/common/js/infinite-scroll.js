jQuery(function ($) {
    let paged = 1; // 初期ページ
    const loading = false;

    // スクロールイベントを監視
    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100 && !loading) {
            loading = true;
            paged++; // 次のページを増やす

            $.ajax({
                url: infinite_scroll_params.ajax_url,
                type: 'POST',
                data: {
                    action: 'load_more_posts',
                    paged: paged,
                    posts_per_page: infinite_scroll_params.posts_per_page
                },
                success: function (data) {
                    if (data) {
                        $('.p-case.p-section--content').append(data);
                        loading = false;
                    }
                }
            });
        }
    });
});
