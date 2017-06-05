<?php
// block direct access to plugin PHP files:
defined( 'ABSPATH' ) or die();

function opinionstage_register_menu_page() {
	if (function_exists('add_menu_page')) {
		add_menu_page(
			__(OPINIONSTAGE_WIDGET_MENU_NAME, OPINIONSTAGE_WIDGET_UNIQUE_ID),
			__(OPINIONSTAGE_WIDGET_MENU_NAME, OPINIONSTAGE_WIDGET_MENU_NAME),
			'edit_posts',
			OPINIONSTAGE_WIDGET_UNIQUE_LOCATION,
			'opinionstage_menu_page',
			plugins_url(OPINIONSTAGE_WIDGET_UNIQUE_ID.'/images/os.png'),
			'25.234323221'
		);

		add_submenu_page(
			null,
			__('', OPINIONSTAGE_WIDGET_MENU_NAME),
			__('', OPINIONSTAGE_WIDGET_MENU_NAME),
			'edit_posts',
			OPINIONSTAGE_WIDGET_UNIQUE_ID.'/opinionstage-callback.php'
		);
	}
}

function opinionstage_menu_page() {
	$os_options = (array) get_option(OPINIONSTAGE_OPTIONS_KEY);

	if (empty($os_options["uid"])) {
		$first_time = true;
	} else {
		$first_time = false;
	}

	opinionstage_register_css_asset( 'menu-page', 'menu-page.css' );
	opinionstage_register_css_asset( 'icon-font', 'icon-font.css' );

	opinionstage_enqueue_css_asset('menu-page');
	opinionstage_enqueue_css_asset('icon-font');

	require( plugin_dir_path( __FILE__ ).'menu-page-template.php' );
}
?>
