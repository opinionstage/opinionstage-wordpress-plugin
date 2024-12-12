<?php

namespace Opinionstage\Modules;

defined('ABSPATH') || die();

use Opinionstage;
use Opinionstage\Core\Module;
use OpinionStageAdminPageLoader;


class Admin {

	use Module;

	public function init() {
		// login callbacks
		add_action('admin_menu', [$this, 'register_login_callback_page']);
		add_action('admin_init', [$this, 'login_and_redirect_to_settings_page']);

		// disconnect callbacks
		add_action('admin_menu', [$this, 'disconnect_account_menu']);
		add_action('admin_init', [$this, 'disconnect_account_action']);


		add_action( 'admin_menu', [$this, 'register_menu_page'] );

	}

	/**
	 * Adds page for post-login redirect and setup in form of invisible menu page.
	 */
	public function register_login_callback_page() {
		add_submenu_page(
			null,
			'',
			'',
			'edit_posts',
			OPINIONSTAGE_LOGIN_CALLBACK_SLUG
		);
	}

	/**
	 * Performs redirect to plugin settings page, after user logged in.
	 */
	public function login_and_redirect_to_settings_page() {

		if (is_user_logged_in()
			&& current_user_can('edit_posts')
			&& OPINIONSTAGE_LOGIN_CALLBACK_SLUG === filter_input(INPUT_GET, 'page')) {

			$uid = isset($_GET['opinionstage_uid']) ? sanitize_text_field($_GET['opinionstage_uid']) : '';
			$token = isset($_GET['opinionstage_token']) ? sanitize_text_field($_GET['opinionstage_token']) : '';
			$email = isset($_GET['opinionstage_email']) ? sanitize_email($_GET['opinionstage_email']) : '';
			$fly_id = isset($_GET['opinionstage_fly_id']) ? intval($_GET['opinionstage_fly_id']) : '';

			opinionstage_uninstall();
			self::opinionstage_validate_and_save_client_data(
				compact(
					'uid',
					'token',
					'email',
					'fly_id'
				)
			);

			if (wp_safe_redirect(admin_url('admin.php?page=' . OPINIONSTAGE_MENU_SLUG), 302)) {
				exit;
			}
		}
	}

	/**
	 * Validates and saves client data.
	 *
	 * @param array $raw raw data.
	 */
	private static function opinionstage_validate_and_save_client_data($raw) {

		$os_options = array(
			'uid' => $raw['uid'],
			'email' => $raw['email'],
			'fly_id' => $raw['fly_id'],
			'version' => OPINIONSTAGE_WIDGET_VERSION,
			'fly_out_active' => 'false',
			'article_placement_active' => 'false',
			'sidebar_placement_active' => 'false',
			'token' => $raw['token'],
		);

		if (preg_match('/^[0-9]+$/', $raw['fly_id'])) {
			update_option(OPINIONSTAGE_OPTIONS_KEY, $os_options);
		}
	}


// adds page for post-logout redirect and setup in form of invisible menu page,
// and url: http://wp-host.com/wp-admin/admin.php?page=disconnect-page
	public function disconnect_account_menu() {
		if (function_exists('add_menu_page')) {
			add_submenu_page(
				null,
				'',
				'',
				'edit_posts',
				OPINIONSTAGE_DISCONNECT_PAGE
			);
		}
	}

// performs redirect to plugin settings page, after user logout
	public function disconnect_account_action() {
		if (OPINIONSTAGE_DISCONNECT_PAGE === filter_input(INPUT_GET, 'page') && $_SERVER['REQUEST_METHOD'] === 'POST') {
			delete_option(OPINIONSTAGE_OPTIONS_KEY);

			$redirect_url = get_admin_url(null, 'admin.php?page=' . OPINIONSTAGE_GETTING_STARTED_SLUG);

//			opinionstage_error_log('user logged out, redirect to ' . $redirect_url);
			if (wp_redirect($redirect_url, 302)) {
				exit;
			}
		}
	}

	public function register_menu_page() {
		if ( function_exists( 'add_menu_page' ) ) {
			$os_client_logged_in = opinionstage_user_logged_in();
			if ( $os_client_logged_in ) {
				add_menu_page(
					__( 'Opinion Stage', 'social-polls-by-opinionstage' ),
					__( 'Opinion Stage', 'social-polls-by-opinionstage' ),
					'edit_posts',
					OPINIONSTAGE_MENU_SLUG,
					[__CLASS__, 'load_template'],
					Opinionstage::get_instance()->plugin_url . 'admin/images/os-icon.svg',
					'25.234323221'
				);
				add_submenu_page( OPINIONSTAGE_MENU_SLUG, 'View My Items', 'My Items', 'edit_posts', OPINIONSTAGE_MENU_SLUG );
				add_submenu_page( OPINIONSTAGE_MENU_SLUG, 'Tutorials & Help', 'Tutorials & Help', 'edit_posts', OPINIONSTAGE_HELP_RESOURCE_SLUG, 'opinionstage_load_template' );
			} else {
				add_menu_page(
					__( 'Opinion Stage', 'social-polls-by-opinionstage' ),
					__( 'Opinion Stage', 'social-polls-by-opinionstage' ),
					'edit_posts',
					OPINIONSTAGE_GETTING_STARTED_SLUG,
					[__CLASS__, 'load_template'],
					Opinionstage::get_instance()->plugin_url . 'admin/images/os-icon.svg',
					'25.234323221'
				);
				add_submenu_page( OPINIONSTAGE_GETTING_STARTED_SLUG, 'Get Started', 'Get Started', 'edit_posts', OPINIONSTAGE_GETTING_STARTED_SLUG, 'opinionstage_load_template' );
			}
		}
	}

	private static function load_template() {
		$OSAPL = OpinionStageAdminPageLoader::get_instance();
		$OSAPL->maybe_load_template_file();
	}
}
