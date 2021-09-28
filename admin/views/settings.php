<?php
/**
 * Opinionstage Create Admin page
 *
 * @package OpinionStageWordPressPlugin
 */

defined( 'ABSPATH' ) || die();
?>

<style type="text/css">
	.content-item-image.quiz{
		background-image: url(<?php echo esc_url( plugins_url( '', dirname( __FILE__ ) ) . '/images/form-not-found.png' ); ?>);
	}
</style>
<div id="opinionstage-content">
	<div class="opinionstage-header-wrapper">
		<div class="opinionstage-logo-wrapper">
			<div class="opinionstage-logo"></div>
			<?php if ( $os_client_logged_in ) { ?>
				<div class="opinionstage-connectivity-status"><?php echo esc_html( $os_options['email'] ); ?>
					<form method="POST" action="<?php echo esc_url( get_admin_url( null, 'admin.php?page=' . OPINIONSTAGE_DISCONNECT_PAGE ) ); ?>" class="opinionstage-connect-form">
						<button class="opinionstage-disconnect" type="submit"><?php esc_html_e( 'Disconnect', 'social-polls-by-opinionstage' ); ?></button>
					</form>
				</div>
			<?php } ?>
		</div>
	</div>

	<div id="container" class="opinionstage-dashboard">
		<?php if ( $os_client_logged_in ) { ?>
			<div class="opinionstage-item-view-dashboard">
				<div id="opinionstage-section-create" class="opinionstage-dashboard-section">
					<div class="opinionstage-section-header">
						<div class="opinionstage-section-title"><?php esc_html_e( 'My Items', 'social-polls-by-opinionstage' ); ?></div>
						<div class="opinionstage-header-inner-container">
							<div class="opinionstage-header-inner-section">
								<div class="select-wrapper">
									<select id="itemList">
										<option value="all"><?php esc_html_e( 'ALL ITEMS', 'social-polls-by-opinionstage' ); ?></option>
										<option value="poll"><?php esc_html_e( 'POLL', 'social-polls-by-opinionstage' ); ?></option>
										<option value="survey"><?php esc_html_e( 'SURVEY', 'social-polls-by-opinionstage' ); ?></option>
										<option value="trivia"><?php esc_html_e( 'TRIVIA QUIZ', 'social-polls-by-opinionstage' ); ?></option>
										<option value="outcome"><?php esc_html_e( 'PERSONALITY QUIZ', 'social-polls-by-opinionstage' ); ?></option>
										<option value="form"><?php esc_html_e( 'STANDARD FORM', 'social-polls-by-opinionstage' ); ?></option>
									</select>
								</div>
								<div class="search search-container">
									<input id="opinionstage-my-items-search-field" class="std-input" name="search" placeholder="Search" type="text">
								</div>
							</div>

							<div class="select-wrapper">
								<a href="<?php echo esc_url( add_query_arg( 'w_type', 'all', OPINIONSTAGE_REDIRECT_CREATE_WIDGET_API_UTM ) ); ?>" class="opinionstage-connect-btn opinionstage-blue-btn" target="_blank"><?php esc_html_e( 'Create', 'social-polls-by-opinionstage' ); ?></a>
							</div>
						</div>
					</div>
				</div>
				<p id="opinionstage-my-items-loading-message" class="opinionstage-my-items-message"><?php esc_html_e( 'Loading...', 'social-polls-by-opinionstage' ); ?></p>
				<p id="opinionstage-my-items-no-items" class="opinionstage-my-items-message"><?php esc_html_e( 'No items found', 'social-polls-by-opinionstage' ); ?></p>
				<table id="opinionstage-items-table"></table>

				<div id="opinionistage-my-items-page-modal-wrapper">
					<div class="opinionistage-my-items-page-modal">
						<div class="inner">
							<span id="opinionstage-dialog-close" class="opinionstage-close"></span>
							<div id="published-item-details">
								<p><?php esc_html_e( 'You can add item in the following ways:', 'social-polls-by-opinionstage' ); ?></p>
								<ul>
									<li><a href="https://help.opinionstage.com/en/articles/5161692-how-to-add-items-to-a-post-page" target="_blank"><?php esc_html_e( 'Add to a post/page', 'social-polls-by-opinionstage' ); ?></a></li>
									<li><a href="https://help.opinionstage.com/en/articles/5161716-how-to-add-an-item-to-a-sidebar-widget" target="_blank"><?php esc_html_e( 'Add to a sidebar Widget', 'social-polls-by-opinionstage' ); ?></a></li>
									<li><a href="https://help.opinionstage.com/en/articles/5161746-how-to-add-an-item-as-a-popup-on-wordpress" target="_blank"><?php esc_html_e( 'Add as a popup', 'social-polls-by-opinionstage' ); ?></a></li>
									<li><a href="https://help.opinionstage.com/en/articles/5161782-how-to-add-an-item-using-the-wordpress-shortcode" target="_blank"><?php esc_html_e( 'Add with the WordPress shortcode', 'social-polls-by-opinionstage' ); ?></a></li>
								</ul>
								<div class="opinionstage-textarea-wrapper">
									<textarea name="opinionstage-widget-shortcode" id="opinionstage-widget-shortcode" data-wp-embed-code rows="2" readonly="readonly"></textarea> <a data-copy-text-from="data-wp-embed-code" href="#" class="no-text-decoration">Copy</a>
								</div>
							</div>
							<div id="draft-item-details">
								<p>
								<?php
								printf(
									'%s <a href="" id="opinionstage-modal-edit-link" target="_blank">%s</a> %s',
									esc_html__( 'Widget is not published yet. Please', 'social-polls-by-opinionstage' ),
									esc_html__( 'edit', 'social-polls-by-opinionstage' ),
									esc_html__( 'the widget to publish it', 'social-polls-by-opinionstage' )
								);
								?>
									</p>
							</div>
							<p>
								<?php esc_html_e( 'Need Help?', 'social-polls-by-opinionstage' ); ?>
								<a href="<?php echo esc_url( OPINIONSTAGE_LIVE_CHAT_URL_UTM ); ?>" target="_blank"><?php esc_html_e( 'Contact Us' ); ?></a></p>
							</p>
						</div>
					</div>
				</div>
				<p id="opinionstage-failed-load-items-request"><?php esc_html_e( 'An error occurred while loading the items.', 'social-polls-by-opinionstage' ); ?>
					<a href="<?php echo esc_url( OPINIONSTAGE_LIVE_CHAT_URL_UTM ); ?>" target="_blank"><?php esc_html_e( 'Please contact our chat support for help', 'social-polls-by-opinionstage' ); ?></a></p>
				<div id="opinionstage-load-more" class="btn btn_aqua btn_full-width"><?php esc_html_e( 'Click for more', 'social-polls-by-opinionstage' ); ?></div>
			</div>
		<?php } ?>
	</div>
</div>
