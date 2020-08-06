<?php
// block direct access to plugin PHP files:
defined( 'ABSPATH' ) or die();

add_action( 'admin_menu', 'opinionstage_register_login_callback_page' );
add_action( 'admin_init', 'opinionstage_login_callback' );

// adds page for post-login redirect and setup in form of invisible menu page,
// and url: http://wp-host.com/wp-admin/admin.php?page=OPINIONSTAGE_LOGIN_CALLBACK_SLUG
function opinionstage_register_login_callback_page() {
	if (function_exists('add_menu_page')) {
		add_submenu_page(
			null,
			'',
			'',
			'edit_posts',
			OPINIONSTAGE_LOGIN_CALLBACK_SLUG
		);
	}
}

// performs redirect to plugin settings page, after user logged in
function opinionstage_login_callback() {

	// Make sure user is logged in and have edit posts cap
	$page_search = 'opinionstage';

	// Run only if we're on opinionstage page
	if(isset($_GET['page']) && preg_match("/{$page_search}/i", $_GET['page'] ) ){
		if (is_user_logged_in() && current_user_can('edit_posts')) {
			// On Load Error
			if(isset($_GET['invalid']) && $_GET['invalid'] == 'true'){
				$ConnErrorOs = 'Failed to connect, ID Validation Failed, Error ID: 111';
				$GLOBALS['connectionErrorOS'] = $ConnErrorOs;
			}
			// ----> Success Variable empty
			if(isset($_GET['success']) && $_GET['success'] == 'false'){
				$ConnErrorOs = 'Failed to connect, Success variable not found, Error ID: 103';
				$GLOBALS['connectionErrorOS'] = $ConnErrorOs;
			}
			// ----> UID Variable empty
			if(isset($_GET['uid']) && $_GET['uid'] == 'false'){
				$ConnErrorOs = 'Failed to connect, UID variable not found, Error ID: 104';
				$GLOBALS['connectionErrorOS'] = $ConnErrorOs;
			}
			// ----> Token Variable empty
			if(isset($_GET['token']) && $_GET['token'] == 'false'){
				$ConnErrorOs = 'Failed to connect, Token variable not found, Error ID: 105';
				$GLOBALS['connectionErrorOS'] = $ConnErrorOs;
			}
			// ----> Email Variable empty
			if(isset($_GET['email']) && $_GET['email'] == 'false'){
				$ConnErrorOs = 'Failed to connect, Email variable not found, Error ID: 106';
				$GLOBALS['connectionErrorOS'] = $ConnErrorOs;
			}
			// ----> Fly ID Variable empty
			if(isset($_GET['fly_id']) && $_GET['fly_id'] == 'false'){
				$ConnErrorOs = 'Failed to connect, Fly ID variable not found, Error ID: 107';
				$GLOBALS['connectionErrorOS'] = $ConnErrorOs;
			}
			// ----> article_placement_id Variable empty
			if(isset($_GET['article_placement_id']) && $_GET['article_placement_id'] != 'false'){
				$ConnErrorOs = 'Failed to connect, Article Placement ID variable not found, Error ID: 108';
				$GLOBALS['connectionErrorOS'] = $ConnErrorOs;
			}
			// ----> article_placement_id Variable empty
			if(isset($_GET['sidebar_placement_id']) && $_GET['sidebar_placement_id'] == 'false'){
				$ConnErrorOs = 'Failed to connect, Sidebar Placement ID variable not found, Error ID: 109';
				$GLOBALS['connectionErrorOS'] = $ConnErrorOs;
			}


			if ( OPINIONSTAGE_LOGIN_CALLBACK_SLUG == filter_input( INPUT_GET, 'page' ) ) {
				// ---> Success Variable
				if(isset($_GET['success']) && $_GET['success'] != ''){
					$success = sanitize_text_field($_GET['success']);
				}else{
					header('location : ?page='.OPINIONSTAGE_GETTING_STARTED_SLUG.'&success=false');
					exit;
				}
				//  ---> UID Variable
				if(isset($_GET['uid']) && $_GET['uid'] != ''){
					$uid = sanitize_text_field($_GET['uid']);
				}else{
					header('location : ?page='.OPINIONSTAGE_GETTING_STARTED_SLUG.'&uid=false');
					exit;
				}
				//  ---> Token Variable
				if(isset($_GET['token']) && $_GET['token'] != ''){
					$token = sanitize_text_field($_GET['token']);
				}else{
					header('location : ?page='.OPINIONSTAGE_GETTING_STARTED_SLUG.'&token=false');
					exit;
				}
				//  ---> Email Variable
				if(isset($_GET['email']) && $_GET['email'] != ''){
					$email = sanitize_email($_GET['email']);
				}else{
					header('location : ?page='.OPINIONSTAGE_GETTING_STARTED_SLUG.'&email=false');
					exit;
				}
				//  ---> Fly Id Variable
				if(isset($_GET['fly_id']) && $_GET['fly_id'] != ''){
					$fly_id = intval($_GET['fly_id']);
				}else{
					header('location : ?page='.OPINIONSTAGE_GETTING_STARTED_SLUG.'&fly_id=false');
					exit;
				}
				//  ---> Article Placement ID Variable
				if(isset($_GET['article_placement_id']) && $_GET['article_placement_id'] != ''){
					$article_placement_id = intval($_GET['article_placement_id']);
				}else{
					header('location : ?page='.OPINIONSTAGE_GETTING_STARTED_SLUG.'&article_placement_id=false');
					exit;
				}
				//  ---> Sidebar Placement ID Variable
				if(isset($_GET['sidebar_placement_id']) && $_GET['sidebar_placement_id'] != ''){
					$sidebar_placement_id = intval($_GET['sidebar_placement_id']);
				}else{
					header('location : ?page='.OPINIONSTAGE_GETTING_STARTED_SLUG.'&sidebar_placement_id=false');
					exit;
				}
				

				opinionstage_uninstall();
				opinionstage_parse_client_data(
					compact(
						'success',
						'uid',
						'token',
						'email',
						'fly_id',
						'article_placement_id',
						'sidebar_placement_id'
					)
				);


				$redirect_url = get_admin_url(null, '', 'admin').'admin.php?page='.OPINIONSTAGE_MENU_SLUG;

				error_log('[opinionstage plugin] user logged in, redirect to '.$redirect_url);
				if ( wp_redirect( $redirect_url, 302 ) ) {
					exit;
				}else{
					$ConnErrorOs = 'Failed to connect, Redirection Error, Error ID: 119';
					$GLOBALS['connectionErrorOS'] = $ConnErrorOs;
				}
			}
		}else{
			$ConnErrorOs = 'Failed to connect, WP Capability Error, Error ID: 101.1-101.2';
			$GLOBALS['connectionErrorOS'] = $ConnErrorOs;
		}	
	}
}
?>
