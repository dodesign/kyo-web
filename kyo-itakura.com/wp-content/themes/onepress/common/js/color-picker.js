jQuery(document).ready(function($) {
    $('#color').wpColorPicker({
        change: function(event, ui) {
            // カラーコードを取得
            var color = ui.color.toString();
            $('#color').val(color);
        }
    });
});
