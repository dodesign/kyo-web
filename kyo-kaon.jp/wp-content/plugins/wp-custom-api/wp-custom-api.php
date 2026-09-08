<?php
/**
 * Plugin Name: WP Custom API
 * Description: Custom REST API endpoints with X-Api-Secret header auth
 * Version: 1.3
 */

define('WP_CUSTOM_API_SECRET', 'kk-secret-2026-X9mP');

add_action('rest_api_init', function () {
    register_rest_route('custom/v1', '/scheduled-posts', [
        'methods'             => 'GET',
        'callback'            => 'wca_get_scheduled_posts',
        'permission_callback' => 'wca_check_auth',
    ]);
    register_rest_route('custom/v1', '/upload-media', [
        'methods'             => 'POST',
        'callback'            => 'wca_upload_media',
        'permission_callback' => 'wca_check_auth',
    ]);
    register_rest_route('custom/v1', '/create-post', [
        'methods'             => 'POST',
        'callback'            => 'wca_create_post',
        'permission_callback' => 'wca_check_auth',
    ]);
});

function wca_check_auth($request) {
    $secret = $request->get_header('X_Api_Secret');
    return $secret === WP_CUSTOM_API_SECRET;
}

function wca_get_scheduled_posts($request) {
    $post_type = sanitize_text_field($request->get_param('post_type') ?: 'post');
    // post_status は カンマ区切りで複数指定可 例: "future,publish"
    $status_param = sanitize_text_field($request->get_param('post_status') ?: 'future');
    $statuses = array_map('trim', explode(',', $status_param));

    $posts = get_posts([
        'post_status'  => $statuses,
        'orderby'      => 'date',
        'order'        => 'DESC',
        'numberposts'  => 10,
        'post_type'    => $post_type,
    ]);
    return array_map(function ($p) {
        return ['id' => $p->ID, 'title' => $p->post_title, 'date' => $p->post_date, 'status' => $p->post_status];
    }, $posts);
}

function wca_upload_media($request) {
    require_once ABSPATH . 'wp-admin/includes/image.php';
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';

    if (empty($_FILES['file'])) {
        return new WP_Error('no_file', 'No file uploaded', ['status' => 400]);
    }
    $attachment_id = media_handle_upload('file', 0);
    if (is_wp_error($attachment_id)) {
        return new WP_Error('upload_failed', $attachment_id->get_error_message(), ['status' => 500]);
    }
    $url   = wp_get_attachment_url($attachment_id);
    $large = image_downsize($attachment_id, 'large');
    $src   = ($large && $large[0]) ? $large[0] : $url;
    return ['id' => $attachment_id, 'url' => $url, 'src' => $src, 'source_url' => $url];
}

function wca_create_post($request) {
    $title          = sanitize_text_field($request->get_param('title'));
    $content        = wp_kses_post($request->get_param('content'));
    $status         = sanitize_text_field($request->get_param('status') ?: 'draft');
    $date           = sanitize_text_field($request->get_param('date') ?: '');
    $featured_media = intval($request->get_param('featured_media') ?: 0);
    $post_type      = sanitize_text_field($request->get_param('post_type') ?: 'post');
    $category_names = $request->get_param('categories') ?: [];
    $taxonomies     = $request->get_param('taxonomies') ?: [];

    $category_ids = [];
    foreach ((array)$category_names as $name) {
        $term = get_term_by('name', trim($name), 'category');
        if ($term) $category_ids[] = $term->term_id;
    }

    $post_data = [
        'post_title'    => $title,
        'post_content'  => $content,
        'post_status'   => $status,
        'post_type'     => $post_type,
    ];
    if ($date) {
        $post_data['post_date']     = $date;
        $post_data['post_date_gmt'] = get_gmt_from_date($date);
    }
    if (!empty($category_ids)) {
        $post_data['post_category'] = $category_ids;
    }

    $post_id = wp_insert_post($post_data, true);
    if (is_wp_error($post_id)) {
        return new WP_Error('create_failed', $post_id->get_error_message(), ['status' => 500]);
    }
    if ($featured_media) {
        set_post_thumbnail($post_id, $featured_media);
    }
    foreach ((array)$taxonomies as $taxonomy => $term_ids) {
        $tax = sanitize_key($taxonomy);
        $ids = array_map('intval', (array)$term_ids);
        if (!empty($ids)) {
            wp_set_object_terms($post_id, $ids, $tax);
        }
    }

    return ['id' => $post_id, 'link' => get_permalink($post_id)];
}


// ---- カテゴリー設定エンドポイント（wp_set_object_terms使用）----
add_action('rest_api_init', function() {
    register_rest_route('custom/v1', '/set-categories', array(
        'methods'             => 'POST',
        'callback'            => 'kk_set_post_categories',
        'permission_callback' => function($req) {
            return $req->get_header('X_Api_Secret') === WP_CUSTOM_API_SECRET;
        },
    ));
});

function kk_set_post_categories($request) {
    $post_id      = intval($request->get_param('post_id'));
    $category_ids = $request->get_param('category_ids');
    $thumbnail_id = $request->get_param('thumbnail_id');

    if (!$post_id) {
        return new WP_Error('missing_post_id', 'post_id が必要です', array('status' => 400));
    }

    $result = array('post_id' => $post_id);

    if (!empty($category_ids)) {
        $ids = array_map('intval', (array)$category_ids);
        $r = wp_set_object_terms($post_id, $ids, 'category');
        $result['categories'] = is_wp_error($r) ? 'error: ' . $r->get_error_message() : $ids;
    }

    if ($thumbnail_id) {
        set_post_thumbnail($post_id, intval($thumbnail_id));
        $result['thumbnail_id'] = intval($thumbnail_id);
    }

    return $result;
}
// ---- ここまで ----
// 
// // ============ ここから ============

// ---- 本文更新エンドポイント（upload_for_welcart.py 用）----
add_action('rest_api_init', function() {
    register_rest_route('custom/v1', '/update-post', array(
        'methods'             => 'POST',
        'callback'            => 'kk_update_post_content',
        'permission_callback' => 'wca_check_auth',
    ));
});

function kk_update_post_content($request) {
    $post_id = intval($request->get_param('post_id'));
    $content = $request->get_param('content');

    if (!$post_id) {
        return new WP_Error('missing_post_id', 'post_id が必要です', array('status' => 400));
    }
    if ($content === null) {
        return new WP_Error('missing_content', 'content が必要です', array('status' => 400));
    }

    $result = wp_update_post(array(
        'ID'           => $post_id,
        'post_content' => $content,
    ), true);

    if (is_wp_error($result)) {
        return new WP_Error('update_failed', $result->get_error_message(), array('status' => 500));
    }

    return array('id' => $result, 'message' => '更新完了');
}

// ============ ここまで ============

