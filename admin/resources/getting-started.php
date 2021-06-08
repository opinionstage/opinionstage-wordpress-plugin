<?php
/**
 * Load assets on getting started page.
 *
 * @package OpinionStageWordPressPlugin
 */

defined( 'ABSPATH' ) || die();

/**
 * Load getting started page assets
 */
function opinionstage_getting_started_load_resources() {
	opinionstage_register_javascript_asset( 'sweetalert', 'sweetalert.min.js', array( 'jquery' ) );
	opinionstage_register_javascript_asset( 'getting-started', 'getting-started.js', array( 'jquery', opinionstage_asset_name( 'sweetalert' ) ) );

	wp_localize_script(
		opinionstage_asset_name( 'getting-started' ),
		'opinionstageGettingStarted',
		array(
			'swal' => array(
				'title'        => __( 'Leave without connecting?', 'social-polls-by-opinionstage' ),
				'text'         => __( 'To use this plugin you need to first connect WordPress with Opinion Stage.', 'social-polls-by-opinionstage' ),
				'ButtonCancel' => __( 'Cancel', 'social-polls-by-opinionstage' ),
				'ButtonLeave'  => __( 'Leave', 'social-polls-by-opinionstage' ),
			),
		)
	);

	opinionstage_enqueue_js_asset( 'sweetalert' );
	opinionstage_enqueue_js_asset( 'getting-started' );

}

function opinionstage_getting_started_load_header() {
}

function opinionstage_getting_started_load_footer() {
}
