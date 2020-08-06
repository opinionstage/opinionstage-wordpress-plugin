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
	$page_name = $_GET['page'];
	$search = 'opinionstage';
	if(isset($_GET['page']) && preg_match("/{$search}/i", $page_name ) ){
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
			// ----> article_placement_id Variable empty
			// if(isset($_GET['capabilities_post']) && $_GET['capabilities_post'] == 'false'){
			// 	$ConnErrorOs = 'Failed to connect, Your Are Not Logged In / Your edit post capabilities are disabled, Error ID: 101.1 / Error ID: 101.2';
			// 	$GLOBALS['connectionErrorOS'] = $ConnErrorOs;
			// }
			// on load error -- ends


			if ( OPINIONSTAGE_LOGIN_CALLBACK_SLUG == filter_input( INPUT_GET, 'page' ) ) {
				// ---> Success Variable
				if(isset($_GET['success']) && $_GET['success'] != ''){
					$success = sanitize_text_field($_GET['success']);
				}else{
					header('location : ?page=opinionstage-getting-started&success=false');
					exit;
				}
				//  ---> UID Variable
				if(isset($_GET['uid']) && $_GET['uid'] != ''){
					$uid = sanitize_text_field($_GET['uid']);
				}else{
					header('location : ?page=opinionstage-getting-started&uid=false');
					exit;
				}
				//  ---> Token Variable
				if(isset($_GET['token']) && $_GET['token'] != ''){
					$token = sanitize_text_field($_GET['token']);
				}else{
					header('location : ?page=opinionstage-getting-started&token=false');
					exit;
				}
				//  ---> Email Variable
				if(isset($_GET['email']) && $_GET['email'] != ''){
					$email = sanitize_email($_GET['email']);
				}else{
					header('location : ?page=opinionstage-getting-started&email=false');
					exit;
				}
				//  ---> Fly Id Variable
				if(isset($_GET['fly_id']) && $_GET['fly_id'] != ''){
					$fly_id = intval($_GET['fly_id']);
				}else{
					header('location : ?page=opinionstage-getting-started&fly_id=false');
					exit;
				}
				//  ---> Article Placement ID Variable
				if(isset($_GET['article_placement_id']) && $_GET['article_placement_id'] != ''){
					$article_placement_id = intval($_GET['article_placement_id']);
				}else{
					header('location : ?page=opinionstage-getting-started&article_placement_id=false');
					exit;
				}
				//  ---> Sidebar Placement ID Variable
				if(isset($_GET['sidebar_placement_id']) && $_GET['sidebar_placement_id'] != ''){
					$sidebar_placement_id = intval($_GET['sidebar_placement_id']);
				}else{
					header('location : ?page=opinionstage-getting-started&sidebar_placement_id=false');
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
					exit; ?>
					<script type="text/javascript">
						alert('Failed to connect, UnKnown error! See Your Log Files, Error ID: 110');
					</script>
				<?php }else{ ?>
				<script type="text/javascript">
					alert('Failed to connect, Unable To Redirect To URL, Error ID: 102');
				</script>
			<?php }
			}
		}else{
			$ConnErrorOs = 'Failed to connect, Your Are Not Logged In / Your edit post capabilities are disabled, Error ID: 101.1 / Error ID: 101.2';
			$GLOBALS['connectionErrorOS'] = $ConnErrorOs;
		}	
	}
}
?>
