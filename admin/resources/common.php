<?php
/**
 * Resources
 *
 * @package OpinionStageWordPressPlugin
 */

defined( 'ABSPATH' ) || die();

/**
 * Registers common assets
 */
function opinionstage_common_load_resources() {
	opinionstage_register_css_asset( 'menu-page', 'menu-page.css' );
	opinionstage_register_css_asset( 'icon-font', 'icon-font.css' );
	opinionstage_register_javascript_asset( 'menu-page', 'menu-page.js', array( 'jquery' ) );

	wp_localize_script(
		opinionstage_asset_name( 'menu-page' ),
		'OPINIONSTAGE',
		array(
			'WidgetApiUrl'       => esc_url( OPINIONSTAGE_CONTENT_POPUP_CLIENT_WIDGETS_API . '?type=all&page=1&per_page=99' ),
			'OswpPluginVersion'  => OPINIONSTAGE_WIDGET_VERSION,
			'OswpClientToken'    => opinionstage_user_access_token(),
			'adminUrlCreateLink' => esc_url( admin_url( 'admin.php?page=opinionstage-settings' ) ),
		)
	);

	opinionstage_enqueue_css_asset( 'menu-page' );
	opinionstage_enqueue_css_asset( 'icon-font' );
	opinionstage_enqueue_js_asset( 'menu-page' );
}

function opinionstage_common_load_header() {

}
function opinionstage_common_load_footer() {

}
