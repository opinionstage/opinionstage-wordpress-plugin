<?php
// block direct access to plugin PHP files:
defined( 'ABSPATH' ) or die();

// Side menu
add_action('admin_menu', 'opinionstage_poll_menu');
add_action('admin_enqueue_scripts', 'opinionstage_load_scripts');
?>
