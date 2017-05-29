<?php

// block direct access to plugin PHP files:
defined( 'ABSPATH' ) or die();

/* --- Wordpress Hooks Implementations --- */

/**
 * Initialize the plugin 
 */
function opinionstage_init() {
	opinionstage_initialize_data();
	register_uninstall_hook(OPINIONSTAGE_WIDGET_UNIQUE_LOCATION, 'opinionstage_uninstall');
}

/**
 * Initialiaze the data options
 */
function opinionstage_initialize_data() {
	$os_options = (array) get_option(OPINIONSTAGE_OPTIONS_KEY);
	$os_options['version'] = OPINIONSTAGE_WIDGET_VERSION;
	
	// For backward compatibility
	if (!isset($os_options['sidebar_placement_active'])) {
		$os_options['sidebar_placement_active'] = 'false';
	}
	
	update_option(OPINIONSTAGE_OPTIONS_KEY, $os_options);
}

/**
 * Remove the plugin data
 */
function opinionstage_uninstall() {
    delete_option(OPINIONSTAGE_OPTIONS_KEY);
}

/**
 * Sidebar menu
 */
function opinionstage_poll_menu() {
	if (function_exists('add_menu_page')) {
		add_menu_page(
			__(OPINIONSTAGE_WIDGET_MENU_NAME, OPINIONSTAGE_WIDGET_UNIQUE_ID),
			__(OPINIONSTAGE_WIDGET_MENU_NAME, OPINIONSTAGE_WIDGET_MENU_NAME),
			'edit_posts',
			OPINIONSTAGE_WIDGET_UNIQUE_LOCATION,
			'opinionstage_add_poll_page',
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

/**
 * Check if the requested plugin is already available
 */
function opinionstage_check_plugin_available($plugin_key) {
	$other_widget = (array) get_option($plugin_key); // Check the key of the other plugin

	// Check if OpinionStage plugin already installed.
	return (isset($other_widget['uid']) || 
		    isset($other_widget['email']));
}
/** 
 * Notify about other OpinionStage plugin already available
 */ 
function opinionstage_other_plugin_installed_warning() {
	echo "<div id='opinionstage-warning' class='error'><p><B>".__("Opinion Stage Plugin is already installed")."</B>".__(', please remove "<B>Popup for Interactive Content by Opinion Stage</B>" and use the available "<B>Poll & Quiz tools by Opinion Stage</B>" plugin')."</p></div>";
}

/**
 * Instructions page for adding a poll 
 */
function opinionstage_add_poll_page() {
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

	require dirname(OPINIONSTAGE_WIDGET_UNIQUE_LOCATION).'/opinionstage-menu-page.php';
}

/**
 * Load the js script
 */
function opinionstage_load_scripts() {
	wp_enqueue_script( 'ospolls', plugins_url(OPINIONSTAGE_WIDGET_UNIQUE_ID.'/opinionstage_plugin.js'), array( 'jquery', 'thickbox' ), '3' );
}

/**
 * Add the flyout embed code to the page header
 */
function opinionstage_add_flyout() {
	$os_options = (array) get_option(OPINIONSTAGE_OPTIONS_KEY);
	
	if (!empty($os_options['fly_id']) && $os_options['fly_out_active'] == 'true' && !is_admin() ) {
		// Will be added to the head of the page
		?>
		 <script type="text/javascript">//<![CDATA[
			window.AutoEngageSettings = {
			  id : '<?php echo $os_options['fly_id']; ?>'
			};
			(function(d, s, id){
			var js,
				fjs = d.getElementsByTagName(s)[0],
				p = (('https:' == d.location.protocol) ? 'https://' : 'http://'),
				r = Math.floor(new Date().getTime() / 1000000);
			if (d.getElementById(id)) {return;}
			js = d.createElement(s); js.id = id; js.async=1;
			js.src = p + '<?php echo OPINIONSTAGE_SERVER_BASE; ?>' + '/assets/autoengage.js?' + r;
			fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'os-jssdk'));
			
		//]]></script>
		
		<?php
	}
}

?>
