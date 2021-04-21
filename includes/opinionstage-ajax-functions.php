<?php
/**
 * Ajax Functions
 *
 * @package   OpinionStageWordPressPlugin
 */

defined( 'ABSPATH' ) || die();

add_action( 'wp_ajax_opinionstage_ajax_toggle_flyout', 'opinionstage_ajax_toggle_flyout' );
add_action( 'wp_ajax_opinionstage_ajax_toggle_article_placement', 'opinionstage_ajax_toggle_article_placement' );
add_action( 'wp_ajax_opinionstage_ajax_toggle_sidebar_placement', 'opinionstage_ajax_toggle_sidebar_placement' );
add_action( 'wp_ajax_osa_message_delete', 'opinionstage_message_delete' );
add_action( 'wp_ajax_opinionstage_ajax_load_my_items', 'opinionstage_load_my_items' );


/**
 * Toggle the flyout placement activation flag.
 */
function opinionstage_ajax_toggle_flyout() {
	check_ajax_referer( 'opinionstage-my-placements', 'security' );

	if ( isset( $_POST['activate'] ) ) {
		$os_options                   = (array) get_option( OPINIONSTAGE_OPTIONS_KEY );
		$os_options['fly_out_active'] = sanitize_text_field( wp_unslash( $_POST['activate'] ) );

		update_option( OPINIONSTAGE_OPTIONS_KEY, $os_options );
	}
	wp_die( '1' );
}

/**
 * Toggle the article placement activation flag.
 */
function opinionstage_ajax_toggle_article_placement() {
	check_ajax_referer( 'opinionstage-my-placements', 'security' );

	if ( isset( $_POST['activate'] ) ) {
		$os_options                             = (array) get_option( OPINIONSTAGE_OPTIONS_KEY );
		$os_options['article_placement_active'] = sanitize_text_field( wp_unslash( $_POST['activate'] ) );

		update_option( OPINIONSTAGE_OPTIONS_KEY, $os_options );
	}
	wp_die( '1' );
}

/**
 * Toggle the sidebar placement activation flag.
 */
function opinionstage_ajax_toggle_sidebar_placement() {
	check_ajax_referer( 'opinionstage-my-placements', 'security' );

	if ( isset( $_POST['activate'] ) ) {
		$os_options                             = (array) get_option( OPINIONSTAGE_OPTIONS_KEY );
		$os_options['sidebar_placement_active'] = sanitize_text_field( wp_unslash( $_POST['activate'] ) );

		update_option( OPINIONSTAGE_OPTIONS_KEY, $os_options );
	}
	wp_die( '1' );
}

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

/**
 * Load My items
 */
function opinionstage_load_my_items() {
	check_ajax_referer( 'opinionstage-load-my-items', 'security' );

	$args_clean   = array();
	$allowed_args = array( 'type', 'per_page', 'page', 'title_like' );
	foreach ( $_GET as $key => $val ) {
		if ( in_array( $key, $allowed_args, true ) ) {
			$args_clean[ $key ] = $val;
		}
	}

	$access_token = opinionstage_user_access_token();

	$url = add_query_arg( $args_clean, OPINIONSTAGE_CONTENT_POPUP_CLIENT_WIDGETS_API );

	$response = wp_remote_get(
		$url,
		array(
			'headers' => array(
				'OSWP-Plugin-Version' => OPINIONSTAGE_WIDGET_VERSION,
				'OSWP-Client-Token'   => $access_token,
			),
		)
	);

	if ( 200 === wp_remote_retrieve_response_code( $response ) ) {
		$res_arr = json_decode( wp_remote_retrieve_body( $response ), true );

		$html = '';
		if ( isset( $res_arr['data'] ) && ! empty( $res_arr['data'] ) ) {
			ob_start();
			foreach ( $res_arr['data'] as $item ) {
				include plugin_dir_path( dirname( __FILE__ ) ) . 'admin/template-parts/my-items-tbody-element.php';
			}
			$html = ob_get_clean();
		}

		wp_send_json(
			array(
				'success'  => true,
				'nextPage' => $res_arr['meta']['nextPage'],
				'html'     => $html,
			)
		);
	}

	wp_send_json_error();
}
