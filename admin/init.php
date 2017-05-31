<?php
// block direct access to plugin PHP files:
defined( 'ABSPATH' ) or die();

require_once( plugin_dir_path( __FILE__ ).'widget.php' );

add_action('widgets_init', 'opinionstage_init_widget');

// Side menu
add_action('admin_menu', 'opinionstage_poll_menu');
add_action('admin_enqueue_scripts', 'opinionstage_load_scripts');
?>
