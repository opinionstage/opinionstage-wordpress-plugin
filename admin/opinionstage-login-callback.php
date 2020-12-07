<?php
// block direct access to plugin PHP files:
defined( 'ABSPATH' ) or die();

require_once OPINIONSTAGE_PLUGIN_DIR . 'includes/logging.php';

add_action( 'admin_menu', 'opinionstage_register_login_callback_page' );
add_action( 'admin_init', 'opinionstage_login_and_redirect_to_settings_page');

// adds page for post-login redirect and setup in form of invisible menu page,
// and url: http://wp-host.com/wp-admin/admin.php?page=OPINIONSTAGE_LOGIN_CALLBACK_SLUG
function opinionstage_register_login_callback_page() {
	add_submenu_page(
		null,
		'',
		'',
		'edit_posts',
		OPINIONSTAGE_LOGIN_CALLBACK_SLUG
	);
}

// performs redirect to plugin settings page, after user logged in
function opinionstage_login_and_redirect_to_settings_page() {

	if ( is_user_logged_in()
		&& current_user_can('edit_posts')
		&& OPINIONSTAGE_LOGIN_CALLBACK_SLUG == filter_input( INPUT_GET, 'page' ) ) {

		$uid = sanitize_text_field($_GET['opinionstage_uid']);
		$token = sanitize_text_field($_GET['opinionstage_token']);
		$email = sanitize_email($_GET['opinionstage_email']);
		$fly_id = intval($_GET['opinionstage_fly_id']);
		$article_placement_id = intval($_GET['opinionstage_article_placement_id']);
		$sidebar_placement_id = intval($_GET['opinionstage_sidebar_placement_id']);

		opinionstage_uninstall();
		opinionstage_validate_and_save_client_data(
			compact(
				'uid',
				'token',
				'email',
				'fly_id',
				'article_placement_id',
				'sidebar_placement_id'
			)
		);

		if ( wp_redirect( menu_page_url(OPINIONSTAGE_MENU_SLUG, false), 302 ) ) {
			exit;
		}
	}
}
