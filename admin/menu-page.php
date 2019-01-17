<?php
// block direct access to plugin PHP files:
defined( 'ABSPATH' ) or die();
require_once( plugin_dir_path( __FILE__ ).'../includes/opinionstage-client-session.php' );
add_action( 'admin_menu', 'opinionstage_register_menu_page' );
function opinionstage_register_menu_page() {
	if (function_exists('add_menu_page')) {
		$os_options = (array) get_option(OPINIONSTAGE_OPTIONS_KEY);
		$os_client_logged_in = opinionstage_user_logged_in();
			if ($os_client_logged_in) {
			add_menu_page(
				__('Opinion Stage', OPINIONSTAGE_TEXT_DOMAIN),
				__('Opinion Stage', OPINIONSTAGE_TEXT_DOMAIN),
				'edit_posts',
				OPINIONSTAGE_MENU_SLUG,
				'opinionstage_load_template',
				plugins_url('admin/images/os.png', plugin_dir_path( __FILE__ )),
				'25.234323221'
			);	
			add_submenu_page(OPINIONSTAGE_MENU_SLUG, 'Create...', 'Create...', 'edit_posts', OPINIONSTAGE_MENU_SLUG);
			$menu_label = '<span id="oswpLauncherContentPopup" data-opinionstage-content-launch data-os-view="content">View My Items</span>';
			add_submenu_page(OPINIONSTAGE_MENU_SLUG, 'View My Items', $menu_label, 'edit_posts','opinionstage-view-my-items','opinionstage_load_template');
			add_submenu_page(OPINIONSTAGE_MENU_SLUG, 'Placements', 'Placements', 'edit_posts', OPINIONSTAGE_PLACEMENT_SLUG , 'opinionstage_load_template' );
			add_submenu_page(OPINIONSTAGE_MENU_SLUG, 'Getting Started', 'Getting Started', 'edit_posts', OPINIONSTAGE_GETTING_STARTED_SLUG,'opinionstage_load_template' );
			add_submenu_page(OPINIONSTAGE_MENU_SLUG, 'Help Center', 'Help Center', 'edit_posts', 'https://help.opinionstage.com/?utm_campaign=WPMainPI&utm_medium=linkhelpcenter&utm_source=wordpress&o=wp35e8' );
			$menu_label_examples = '<span id="oswpLauncherContentPopupExamples" data-opinionstage-content-launch data-os-view="examples">Examples</span>';
			add_submenu_page(OPINIONSTAGE_MENU_SLUG, 'Examples', $menu_label_examples, 'edit_posts','opinionstage-view-my-items','opinionstage_load_template');
			add_submenu_page(OPINIONSTAGE_MENU_SLUG, 'Settings', 'Settings', 'edit_posts', 'opinionstage-settings-track','opinionstage_load_template');
		}else{
			add_menu_page(
				__('Opinion Stage', OPINIONSTAGE_TEXT_DOMAIN),
				__('Opinion Stage', OPINIONSTAGE_TEXT_DOMAIN),
				'edit_posts',
				OPINIONSTAGE_GETTING_STARTED_SLUG,
				'opinionstage_load_template',
				plugins_url('admin/images/os.png', plugin_dir_path( __FILE__ )),
				'25.234323221'
			);
			add_submenu_page(OPINIONSTAGE_GETTING_STARTED_SLUG, 'Getting Started', 'Getting Started', 'edit_posts', OPINIONSTAGE_GETTING_STARTED_SLUG,'opinionstage_load_template' );
			add_submenu_page(OPINIONSTAGE_GETTING_STARTED_SLUG, 'Create...', 'Create...', 'edit_posts', OPINIONSTAGE_MENU_SLUG, 'opinionstage_load_template');
			$menu_label = '<span id="oswpLauncherContentPopup" data-opinionstage-content-launch data-os-view="content">View My Items</span>';
			add_submenu_page(OPINIONSTAGE_GETTING_STARTED_SLUG, 'View My Items', $menu_label, 'edit_posts','opinionstage-view-my-items','opinionstage_load_template');
			add_submenu_page(OPINIONSTAGE_GETTING_STARTED_SLUG, 'Placements', 'Placements', 'edit_posts', OPINIONSTAGE_PLACEMENT_SLUG , 'opinionstage_load_template' );
			add_submenu_page(OPINIONSTAGE_GETTING_STARTED_SLUG, 'Help Center', 'Help Center', 'edit_posts', 'https://help.opinionstage.com/?utm_campaign=WPMainPI&utm_medium=linkhelpcenter&utm_source=wordpress&o=wp35e8' );
			$menu_label_examples = '<span id="oswpLauncherContentPopupExamples" data-opinionstage-content-launch data-os-view="examples">Examples</span>';
			add_submenu_page(OPINIONSTAGE_GETTING_STARTED_SLUG, 'Examples', $menu_label_examples, 'edit_posts','opinionstage-view-my-items','opinionstage_load_template');
			add_submenu_page(OPINIONSTAGE_GETTING_STARTED_SLUG, 'Settings', 'Settings', 'edit_posts', 'opinionstage-settings-track','opinionstage_load_template');
		}
	}
}

		function opinionstage_load_template() {
			$OSAPL = OpinionStageAdminPageLoader::getInstance();
			$OSAPL->OSAPL_LoadTemplateFile();
		}

?>
