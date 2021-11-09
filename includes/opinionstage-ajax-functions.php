<?php
/**
 * Ajax Functions
 *
 * @package   OpinionStageWordPressPlugin
 */

defined( 'ABSPATH' ) || die();

add_action( 'wp_ajax_osa_message_delete', 'opinionstage_message_delete' );

/**
 * Delete message
 */
function opinionstage_message_delete() {
	if ( isset( $_POST['delete_options_oswp'] ) && true === $_POST['delete_options_oswp'] ) {
		delete_option( 'oswp_message_title' );
		delete_option( 'oswp_message_content' );
		update_option( 'oswp_message_activity_time', time() );
	}
	wp_die( '1' );
}
