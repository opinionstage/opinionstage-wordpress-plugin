<?php
/*
Plugin Name: Poll & Quiz Tools by OpinionStage
Plugin URI: http://www.opinionstage.com
Description: Adds highly engaging polls & quizzes to your site. Easily add polls & quizzes to any post/page or to your site sidebar.
Version: 14.4.0
Author: OpinionStage.com
Author URI: http://www.opinionstage.com
Text Domain: social-polls-by-opinionstage
*/

/* --- Static initializer for Wordpress hooks --- */

define('OPINIONSTAGE_SERVER_BASE', "www.opinionstage.com"); /* Don't include the protocol, added dynamically */
define('OPINIONSTAGE_WIDGET_VERSION', '14.4.0');
define('OPINIONSTAGE_WIDGET_PLUGIN_NAME', 'Poll & Quiz Tools by OpinionStage');
define('OPINIONSTAGE_WIDGET_API_KEY', 'wp35e8');
define('OPINIONSTAGE_OPTIONS_KEY', 'opinionstage_widget');
define('OPINIONSTAGE_POLL_SHORTCODE', 'socialpoll');
define('OPINIONSTAGE_WIDGET_SHORTCODE', 'os-widget');
define('OPINIONSTAGE_PLACEMENT_SHORTCODE', 'osplacement');
define('OPINIONSTAGE_WIDGET_UNIQUE_ID', 'social-polls-by-opinionstage');
define('OPINIONSTAGE_WIDGET_UNIQUE_LOCATION', __FILE__);
define('OPINIONSTAGE_WIDGET_MENU_NAME', 'Poll, Quiz & List');
define('OPINIONSTAGE_LOGIN_PATH', OPINIONSTAGE_SERVER_BASE."/integrations/wordpress/new");

require_once(WP_PLUGIN_DIR."/".OPINIONSTAGE_WIDGET_UNIQUE_ID."/opinionstage-utility-functions.php");
require_once(WP_PLUGIN_DIR."/".OPINIONSTAGE_WIDGET_UNIQUE_ID."/opinionstage-functions.php");
require_once(WP_PLUGIN_DIR."/".OPINIONSTAGE_WIDGET_UNIQUE_ID."/opinionstage-ajax-functions.php");
require_once(WP_PLUGIN_DIR."/".OPINIONSTAGE_WIDGET_UNIQUE_ID."/opinionstage-article-placement-functions.php");
require_once(WP_PLUGIN_DIR."/".OPINIONSTAGE_WIDGET_UNIQUE_ID."/opinionstage-widget.php");

/* --- Static initializer for Wordpress hooks --- */

// Check if OpinionStage plugin already installed.
if (opinionstage_check_plugin_available('opinionstage_popup')) {
	add_action('admin_notices', 'os_popup_other_plugin_installed_warning');
} else {
	add_shortcode(OPINIONSTAGE_POLL_SHORTCODE, 'opinionstage_add_poll_or_set');
	add_shortcode(OPINIONSTAGE_WIDGET_SHORTCODE, 'opinionstage_add_widget');
	add_shortcode(OPINIONSTAGE_PLACEMENT_SHORTCODE, 'opinionstage_add_placement');

	add_action('plugins_loaded', 'opinionstage_init');

	// Side menu
	add_action('admin_menu', 'opinionstage_poll_menu');
	add_action('admin_enqueue_scripts', 'opinionstage_load_scripts');

	// Add fly-out to header
	add_action('wp_head', 'opinionstage_add_flyout');
}
?>