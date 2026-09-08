<?php
/***********************************************************
* Category Custom Fields
/***********************************************************
* admin_enqueue_scripts of category edit page 
***********************************************************/
add_action( 'admin_enqueue_scripts', 'wcct_cat_admin_enqueue' );
function wcct_cat_admin_enqueue( $hook ) {
	if( ( 'term.php' == $hook || 'edit-tags.php' == $hook ) && 'category' == get_current_screen()->taxonomy ) {
		wp_enqueue_media();
		wp_enqueue_style( 'wcct_admin_style', get_stylesheet_directory_uri() . '/assets/css/admin.css', array() );
	}
}


/***********************************************************
* category_add_form_fields
***********************************************************/
add_action('category_add_form_fields', 'wcct_add_form_fields');
function wcct_add_form_fields() {
?>
    <div class="form-field wcct-image-uploader new-form-field">
        <label for="wcct-tag-catimg"><?php _e('Main image', 'welcart_basic_beldad'); ?></label>
        <p class="thumbnail-form">
            <input name="wcct-tag-catimg-url" id="wcct-tag-catimg-url" type="text" value="">
            <button type="button" class="button upload-button" id="wcct-tag-catimg-action"><?php _e('Select Image'); ?></button>
        </p>
        <p id="wcct-tag-catimg-preview" class="wcct-tag-catimg-preview"></p>
        <input name="wcct-tag-catimg-id" id="wcct-tag-catimg-id" type="hidden" value="">
    </div>

    <div class="form-field wcct-image-uploader new-form-field">
        <label for="wcct-tag-thumbnail"><?php _e('Thumbnail image', 'welcart_basic_beldad'); ?></label>
        <p class="thumbnail-form">
            <input name="wcct-tag-thumbnail-url" id="wcct-tag-thumbnail-url" type="text" value="">
            <button type="button" class="button upload-button" id="wcct-tag-thumbnail-action"><?php _e('Select Image'); ?></button>
        </p>
        <p id="wcct-tag-thumbnail-preview" class="wcct-tag-thumbnail-preview"></p>
        <input name="wcct-tag-thumbnail-id" id="wcct-tag-thumbnail-id" type="hidden" value="">
    </div>

    <div class="form-field">
        <label for="wcct-tag-color"><?php _e('カラー', 'welcart_basic_beldad'); ?></label>
        <input type="text" name="wcct-tag-color" id="wcct-tag-color" value="" style="width: 150px; height: 20px;">
        <div class="color-preview" style="width: 50px; height: 20px; background-color:;"></div>
    </div>

    <script>
        jQuery(document).ready(function($) {
            $('#wcct-tag-color').on('input', function() {
                var color = $(this).val();
                $(this).siblings('.color-preview').css('background-color', color);
            });
        });
    </script>
<?php
}

/***********************************************************
* category_edit_form_fields
***********************************************************/
add_action('category_edit_form_fields', 'wcct_edit_form_fields');
function wcct_edit_form_fields($tag) {
    $catimg_url = get_term_meta($tag->term_id, 'wcct-tag-catimg-url', true);
    $catimg_id = get_term_meta($tag->term_id, 'wcct-tag-catimg-id', true);
    $url = get_term_meta($tag->term_id, 'wcct-tag-thumbnail-url', true);
    $id = get_term_meta($tag->term_id, 'wcct-tag-thumbnail-id', true);
    $color = get_term_meta($tag->term_id, 'color', true);
?>
    <tr class="form-field wcct-image-uploader edit-form-field">
        <th scope="row" valign="top"><label for="wcct-tag-catimg"><?php _e('Main image', 'welcart_basic_beldad'); ?></label></th>
        <td>
            <p class="catimg-form">
                <input name="wcct-tag-catimg-url" id="wcct-tag-catimg-url" type="text" value="<?php echo esc_attr($catimg_url); ?>">
                <button type="button" class="button upload-button" id="wcct-tag-catimg-action"><?php _e('Select Image'); ?></button>
            </p>
            <p id="wcct-tag-catimg-preview" class="wcct-tag-catimg-preview"><?php if (!empty($catimg_url)) echo '<img src="' . esc_url($catimg_url) . '" />'; ?></p>
            <input name="wcct-tag-catimg-id" id="wcct-tag-catimg-id" type="hidden" value="<?php echo esc_attr($catimg_id); ?>">
        </td>
    </tr>

    <tr class="form-field wcct-image-uploader edit-form-field">
        <th scope="row" valign="top"><label for="wcct-tag-thumbnail"><?php _e('Thumbnail image', 'welcart_basic_beldad'); ?></label></th>
        <td>
            <p class="thumbnail-form">
                <input name="wcct-tag-thumbnail-url" id="wcct-tag-thumbnail-url" type="text" value="<?php echo esc_attr($url); ?>">
                <button type="button" class="button upload-button" id="wcct-tag-thumbnail-action"><?php _e('Select Image'); ?></button>
            </p>
            <p id="wcct-tag-thumbnail-preview" class="wcct-tag-thumbnail-preview"><?php if (!empty($url)) echo '<img src="' . esc_url($url) . '" />'; ?></p>
            <input name="wcct-tag-thumbnail-id" id="wcct-tag-thumbnail-id" type="hidden" value="<?php echo esc_attr($id); ?>">
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="wcct-tag-color"><?php _e('カラー', 'welcart_basic_beldad'); ?></label></th>
        <td>
            <input type="text" name="wcct-tag-color" id="wcct-tag-color" value="<?php echo esc_attr(ltrim($color, '#')); ?>" style="width: 150px; height: 20px;">
            <div class="color-preview" style="width: 50px; height: 20px; background-color: <?php echo esc_attr($color); ?>;"></div>
        </td>
    </tr>
<?php
}

/***********************************************************
* create_term + edit_terms
***********************************************************/
add_action('created_category', 'wcct_cat_update_term_meta');
add_action('edited_category', 'wcct_cat_update_term_meta');
function wcct_cat_update_term_meta($term_id) {
    if (isset($_POST['wcct-tag-thumbnail-url'])) {
        $url = trim($_POST['wcct-tag-thumbnail-url']);
        $id = (int)$_POST['wcct-tag-thumbnail-id'];
        if (empty($url)) $id = '';
        update_term_meta($term_id, 'wcct-tag-thumbnail-url', esc_url($url));
        update_term_meta($term_id, 'wcct-tag-thumbnail-id', $id);
    }
    if (isset($_POST['wcct-tag-catimg-url'])) {
        $catimg_url = trim($_POST['wcct-tag-catimg-url']);
        $catimg_id = (int)$_POST['wcct-tag-catimg-id'];
        if (empty($catimg_url)) $catimg_id = '';
        update_term_meta($term_id, 'wcct-tag-catimg-url', esc_url($catimg_url));
        update_term_meta($term_id, 'wcct-tag-catimg-id', $catimg_id);
    }
    // カラーの保存処理
    if (isset($_POST['wcct-tag-color'])) {
        $color = sanitize_text_field($_POST['wcct-tag-color']);
        // '#'を付加して保存
        if (preg_match('/^#?[0-9a-fA-F]{6}$/', $color)) {
            $color = ltrim($color, '#'); // '#'を除去
            update_term_meta($term_id, 'color', '#' . $color);
        }
    }
}

// カラーピッカー用のスクリプトを追加
add_action('admin_enqueue_scripts', 'enqueue_color_picker');
function enqueue_color_picker() {
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('color-picker-js', 'https://kyo-kaon.jp/wp-content/themes/welcart_basic-beldad/assets/js/color-picker.js', array('wp-color-picker'), false, true);
}

/* Media Libray
------------------------------------------------------*/
add_action( 'admin_footer-term.php', 'wcct_cat_admin_footer' );
add_action( 'admin_footer-edit-tags.php', 'wcct_cat_admin_footer' );
function wcct_cat_admin_footer() {
?>


<script type="text/javascript">
jQuery(function($) {

	var file_frame;

	$('#wcct-tag-catimg-action').live( 'click', function(e) {
		e.preventDefault();

		if ( file_frame ) {
			file_frame.open();
			return;
		}

		file_frame = wp.media.frames.file_frame = wp.media( {
			title: '<?php _e( 'Front page', 'welcart_basic_beldad' ); ?>',
			library: {
				type: 'image',
				author: userSettings.uid
			},
			button: {
				text: '<?php _e( 'Set the category image', 'welcart_basic_beldad' ); ?>',
				close: true
			},
			multiple: false
		} );

		file_frame.on( 'select', function() {
			var attachment = file_frame.state().get('selection').first().toJSON();
			$("#wcct-tag-catimg-url").val(attachment.url);
			$("#wcct-tag-catimg-id").val(attachment.id);
			$('#wcct-tag-catimg-preview').html('<img src="'+attachment.url+'" />');
		} );

		file_frame.open();
	} );


	$('#wcct-tag-thumbnail-action').live('click', function(e) {
		e.preventDefault();

		var file_frame;

		if ( file_frame ) {
			file_frame.open();
			return;
		}

		file_frame = wp.media.frames.file_frame = wp.media( {
			title: '<?php _e( 'Category image', 'welcart_basic_beldad' ); ?>',
			library: {
				type: 'image',
				author: userSettings.uid
			},
			button: {
				text: '<?php _e( 'Set the category image', 'welcart_basic_beldad' ); ?>',
				close: true
			},
			multiple: false
		} );

		file_frame.on( 'select', function() {
			var attachment = file_frame.state().get('selection').first().toJSON();
			$("#wcct-tag-thumbnail-url").val(attachment.url);
			$("#wcct-tag-thumbnail-id").val(attachment.id);
			$('#wcct-tag-thumbnail-preview').html('<img src="'+attachment.url+'" />');
		} );

		file_frame.open();
	} );

} );
</script>
	<?php
}

/***********************************************************
* category_description
***********************************************************/

remove_filter( 'pre_term_description', 'wp_filter_kses' );
remove_filter( 'term_description', 'wp_kses_data' );

add_filter( 'edit_category_form_fields', 'wcct_description' );
if ( !function_exists( 'wcct_description' ) ):
function wcct_description( $tag ) {
?>
	<tr class="form-field">
		<th scope="row" valign="top"><label for="description"><?php _e( 'Description' ); ?></label></th>
		<td>
			<?php
				$settings = array( 'wpautop' => true, 'tinymce' => false, 'media_buttons' => true, 'quicktags' => true, 'textarea_rows' => '15', 'textarea_name' => 'description' );
				wp_editor( wp_kses_post( $tag->description , ENT_QUOTES, 'UTF-8' ), 'wcct_description', $settings );
			?>
			<br />
			<span class="description"><?php _e( 'The description is not prominent by default; however, some themes may show it.' ); ?></span>
		</td>
	</tr>
	<?php
}
endif;

add_action( 'admin_head', 'remove_default_category_description' );
if ( !function_exists( 'remove_default_category_description' ) ):
function remove_default_category_description(){
	global $current_screen;
	if ( $current_screen->id == 'edit-category' ) {
	?>
		<script type="text/javascript">
			jQuery(function($) {
			$('textarea#description').closest('tr.form-field').remove();
			});
		</script>
	<?php
	}
}
endif;
