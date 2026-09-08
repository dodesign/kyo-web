jQuery(document).ready(function($) {
    // カラーピッカーを初期化
    $('#wcct-tag-color').wpColorPicker({
        change: function(event, ui) {
            var color = ui.color.toString();
            $(this).val(color);
            $(this).siblings('.color-preview').css('background-color', color);
        }
    });

    // 入力フィールドの変更を監視してプレビューを更新
    $('#wcct-tag-color').on('input', function() {
        var color = $(this).val();
        $(this).siblings('.color-preview').css('background-color', color);
    });
});
