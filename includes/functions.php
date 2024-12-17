<?php
defined( 'ABSPATH' ) || die();

/* --- Wordpress Hooks Implementations --- */

/**
 * Initialize the plugin 
 */
function opinionstage_init() {
	$os_options = (array) get_option(OPINIONSTAGE_OPTIONS_KEY);
	$os_options['version'] = OPINIONSTAGE_WIDGET_VERSION;

	// For backward compatibility
	if ( !isset($os_options['sidebar_placement_active']) ) {
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

function opinionstage_is_guten_enabled(){
	$block_editor_oswp = version_compare( $GLOBALS['wp_version'], '5.0-beta', '>' );
	if($block_editor_oswp == false){
		if( function_exists( 'is_gutenberg_page' ) && is_gutenberg_page() ){
			return true;
		}else{
			return false;
		}
	}else{
		global $current_screen;
  		$current_screen = get_current_screen();
		if( method_exists($current_screen, 'is_block_editor') && $current_screen->is_block_editor() ){
			return true;
		}else{
			return false;
		}
	}
}

function opinionstage_get_link_target_blank_attribute(){
    return ' target="_blank" rel="noopener" ';
}