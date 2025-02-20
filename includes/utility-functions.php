<?php
/**
 * Utility Functions
 *
 * @package   OpinionStageWordPressPlugin
 */

defined( 'ABSPATH' ) || die();

require_once OPINIONSTAGE_PLUGIN_DIR . 'includes/logging.php';

/**
 * Returns default UTM parameters and merges passed ones
 *
 * @param array $query array of url parameters.
 *
 * @return string
 */
function opinionstage_utm_query( $query = array() ) {
	return http_build_query( array_merge( $query, OPINIONSTAGE_UTM_PARAMETERS ) );
}

/**
 * Returns UTM url
 *
 * @param string $path api path.
 * @param array  $query query args.
 * @return string
 */
function opinionstage_utm_url( $path, $query = array() ) {
	return OPINIONSTAGE_SERVER_BASE . '/' . $path . '?' . opinionstage_utm_query( $query );
}


/**
 * Generates name of asset
 *
 * @param string $name name.
 * @return string
 */
function opinionstage_asset_name( $name ) {
	return 'opinionstage-' . $name;
}


/**
 * Generates a to the callback page used to connect the plugin to the Opinion Stage account
 */
function opinionstage_callback_url() {
	return menu_page_url( OPINIONSTAGE_LOGIN_CALLBACK_SLUG, false );
}


/**
 * Returns widget templates link
 *
 * @param string $type widget type.
 * @return string
 */
function opinionstage_get_templates_url_for_type( $type ) {
	return add_query_arg( 'page', $type, OPINIONSTAGE_REDIRECT_TEMPLATES_API_UTM );
}
