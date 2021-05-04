<?php
/**
 * Ajax Functions
 *
 * @package   OpinionStageWordPressPlugin
 */

defined( 'ABSPATH' ) || die();

add_action( 'wp_ajax_osa_message_delete', 'opinionstage_message_delete' );
add_action( 'wp_ajax_opinionstage_ajax_load_my_items', 'opinionstage_load_my_items' );


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
				'Accept'              => 'application/vnd.api+json',
				'Content-Type'        => 'application/vnd.api+json',
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
			foreach ( $res_arr['data'] as $datum ) {
				$item = opinionstage_generate_widget_item_object_for_rendering( $datum );
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

	opinionstage_error_log( "API response error($url): " . wp_remote_retrieve_response_code( $response ) );
	wp_send_json_error();
}

/**
 * Generates widget object from api response for rendering on My Items page.
 *
 * @param array $datum widget data.
 * @return stdClass
 */
function opinionstage_generate_widget_item_object_for_rendering( $datum ) {
	$attributes = isset( $datum['attributes'] ) ? $datum['attributes'] : array();

	$item                   = new stdClass();
	$item->is_draft         = 0;
	$item->is_closed        = 0;
	$item->is_open          = 0;
	$item->title            = isset( $attributes['title'] ) ? $attributes['title'] : '';
	$item->landing_page_url = isset( $attributes['landing-page-url'] ) ? $attributes['landing-page-url'] : '';
	$item->image_url        = isset( $attributes['image-url'] ) ? $attributes['image-url'] : '';
	$item->type             = isset( $attributes['type'] ) ? $attributes['type'] : '';
	$item->edit_url         = isset( $attributes['edit-url'] ) ? $attributes['edit-url'] : '';
	$item->stats_url        = isset( $attributes['stats-url'] ) ? $attributes['stats-url'] : '';
	$item->updated_at       = isset( $attributes['updated-at'] ) ? $attributes['updated-at'] : '';
	$item->shortcode        = isset( $attributes['shortcode'] ) ? $attributes['shortcode'] : '';

	if ( isset( $attributes['status'] ) ) {
		switch ( $attributes['status'] ) {
			case 'draft':
				$item->is_draft = 1;
				break;
			case 'closed':
				$item->is_closed = 1;
				break;
			default:
				$item->is_open = 1;
				break;
		}
	}
	return $item;
}
