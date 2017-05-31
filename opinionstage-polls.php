<?php
/*
Plugin Name: Poll, Survey, Quiz, Slideshow & Form Builder
Plugin URI: http://www.opinionstage.com
Description: Add a highly engaging poll, survey, quiz or contact form builder to your site. You can add the poll, survey, quiz or form to any post/page or to the sidebar.
Version: 18.0.4
Author: OpinionStage.com
Author URI: http://www.opinionstage.com
Text Domain: social-polls-by-opinionstage
*/

// block direct access to plugin PHP files:
defined( 'ABSPATH' ) or die();

define('OPINIONSTAGE_SERVER_BASE', "www.opinionstage.com"); /* Don't include the protocol, added dynamically */
define('OPINIONSTAGE_WIDGET_VERSION', '18.0.4');
define('OPINIONSTAGE_WIDGET_PLUGIN_NAME', 'Poll, Survey, Quiz, Slideshow & Form Builder');
define('OPINIONSTAGE_WIDGET_API_KEY', 'wp35e8');
define('OPINIONSTAGE_OPTIONS_KEY', 'opinionstage_widget');
define('OPINIONSTAGE_POLL_SHORTCODE', 'socialpoll');
define('OPINIONSTAGE_WIDGET_SHORTCODE', 'os-widget');
define('OPINIONSTAGE_FEED_SHORTCODE', 'os-section');
define('OPINIONSTAGE_PLACEMENT_SHORTCODE', 'osplacement');
define('OPINIONSTAGE_WIDGET_UNIQUE_ID', 'social-polls-by-opinionstage');
define('OPINIONSTAGE_WIDGET_UNIQUE_LOCATION', __FILE__);
define('OPINIONSTAGE_WIDGET_MENU_NAME', 'Poll, Survey, Quiz, Slider & Form');
define('OPINIONSTAGE_LOGIN_PATH', OPINIONSTAGE_SERVER_BASE."/integrations/wordpress/new");
define('OPINIONSTAGE_API_PATH', OPINIONSTAGE_SERVER_BASE."/api/v1");

require_once( plugin_dir_path( __FILE__ ).'/opinionstage-functions.php' );

// Check if another OpinionStage plugin already installed and display warning message.
if (opinionstage_check_plugin_available('opinionstage_popup')) {
	add_action('admin_notices', 'opinionstage_other_plugin_installed_warning');
} else {
	require_once(WP_PLUGIN_DIR."/".OPINIONSTAGE_WIDGET_UNIQUE_ID."/opinionstage-utility-functions.php");
	require_once(WP_PLUGIN_DIR."/".OPINIONSTAGE_WIDGET_UNIQUE_ID."/opinionstage-ajax-functions.php");
	require_once(WP_PLUGIN_DIR."/".OPINIONSTAGE_WIDGET_UNIQUE_ID."/opinionstage-article-placement-functions.php");

	if ( is_admin() ) {
		require( plugin_dir_path( __FILE__ ).'admin/init.php' );
	} else {
		require( plugin_dir_path( __FILE__ ).'site/init.php' );
	}

	add_action('plugins_loaded', 'opinionstage_init');
}
?>
