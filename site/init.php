<?php
// block direct access to plugin PHP files:
defined( 'ABSPATH' ) or die();

add_shortcode(OPINIONSTAGE_POLL_SHORTCODE, 'opinionstage_add_poll_or_set');
add_shortcode(OPINIONSTAGE_WIDGET_SHORTCODE, 'opinionstage_add_widget');
add_shortcode(OPINIONSTAGE_FEED_SHORTCODE, 'opinionstage_add_feed');
add_shortcode(OPINIONSTAGE_PLACEMENT_SHORTCODE, 'opinionstage_add_placement');

add_action('wp_head', 'opinionstage_add_flyout');
?>
