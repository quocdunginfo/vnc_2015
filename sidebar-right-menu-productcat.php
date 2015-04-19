<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage mpd2015
 */
?>
<?php if ( is_active_sidebar( 'sidebar-right-menu-productcat' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar-right-menu-productcat' ); ?>
<?php endif; ?>