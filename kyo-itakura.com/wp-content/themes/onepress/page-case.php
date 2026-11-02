<?php
/**
 * Archive page template
 *
 * @package OnePress
 */

get_header();

$layout = get_theme_mod( 'onepress_layout', 'right-sidebar' );
?>

 <?php get_template_part( 'archive-case' ); ?>

<?php get_footer(); ?>
