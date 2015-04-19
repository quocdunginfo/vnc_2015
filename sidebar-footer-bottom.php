<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage mpd2015
 */
?>
<?php if ( is_active_sidebar( 'sidebar-footer-bottom' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar-footer-bottom' ); ?>
<?php endif; ?>