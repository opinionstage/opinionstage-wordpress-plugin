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
			if(isset($_GET['invalid']) && $_GET['invalid'] == 'true'){ ?>
				<script type="text/javascript">
					alert('(ID 11) Valid IDs not found - fly_id / article_placement_id / sidebar_placement_id');
				</script>
			<?php }
			if ( OPINIONSTAGE_LOGIN_CALLBACK_SLUG == filter_input( INPUT_GET, 'page' ) ) {
				if(isset($_GET['success']) && $_GET['success'] != ''){
					$success = sanitize_text_field($_GET['success']);
				}else{ ?>
					<script type="text/javascript">
						alert('(ID 03) Failed to get success variable');
					</script>
				<?php }

				if(isset($_GET['uid']) && $_GET['uid'] != ''){
					$uid = sanitize_text_field($_GET['uid']);
				}else{ ?>
					<script type="text/javascript">
						alert('(ID 04) Failed to get uid variable');
					</script>
				<?php }

				if(isset($_GET['token']) && $_GET['token'] != ''){
					$token = sanitize_text_field($_GET['token']);
				}else{ ?>
					<script type="text/javascript">
						alert('(ID 05) Failed to get token variable');
					</script>
				<?php }

				if(isset($_GET['email']) && $_GET['email'] != ''){
					$email = sanitize_email($_GET['email']);
				}else{ ?>
					<script type="text/javascript">
						alert('(ID 06) Failed to get email variable');
					</script>
				<?php }

				if(isset($_GET['fly_id']) && $_GET['fly_id'] != ''){
					$fly_id = intval($_GET['fly_id']);
				}else{ ?>
					<script type="text/javascript">
						alert('(ID 07) Failed to get fly_id variable');
					</script>
				<?php }

				if(isset($_GET['article_placement_id']) && $_GET['article_placement_id'] != ''){
					$article_placement_id = intval($_GET['article_placement_id']);
				}else{ ?>
					<script type="text/javascript">
						alert('(ID 08) Failed to get article_placement_id variable');
					</script>
				<?php }

				if(isset($_GET['sidebar_placement_id']) && $_GET['sidebar_placement_id'] != ''){
					$sidebar_placement_id = intval($_GET['sidebar_placement_id']);
				}else{ ?>
					<script type="text/javascript">
						alert('(ID 09) Failed to get sidebar_placement_id variable');
					</script>
				<?php }
				

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
						alert('(ID 10) UnKnown error! See Your Log Files');
					</script>
				<?php }else{ ?>
				<script type="text/javascript">
					alert('(ID 02) Failed to redirect to url - (OPINIONSTAGE_MENU_SLUG)');
				</script>
			<?php }
			}
		}else{ ?>
			<script type="text/javascript">
				alert('(ID 01) Failed to connect to wordpress');
				alert('(ID 01 - 1) Your Are Not Logged In / (ID 01 - 2) Your edit post capabilities are disabled');
			</script>
		<?php }	
	}
}
?>
