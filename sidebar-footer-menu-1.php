<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage mpd2015
 */
?>
<?php if ( is_active_sidebar( 'sidebar-footer-menu-1' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar-footer-menu-1' ); ?>
<?php endif; ?>