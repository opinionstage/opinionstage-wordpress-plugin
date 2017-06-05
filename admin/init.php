<?php
// block direct access to plugin PHP files:
defined( 'ABSPATH' ) or die();

require( plugin_dir_path( __FILE__ ).'menu-page.php' );

add_action('admin_menu', 'opinionstage_register_menu_page');
?>
