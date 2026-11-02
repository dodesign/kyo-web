<?php
    $post = $wp_query->post;
    if ( get_post_type() === 'case' ) {
        include(TEMPLATEPATH . '/product.php');
    } else {
        include(TEMPLATEPATH . '/news.php');
    }
?>
