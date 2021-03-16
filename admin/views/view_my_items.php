<?php
/**
 * My Items Settings page
 *
 * @package OpinionStageWordPressPlugin
 */

defined( 'ABSPATH' ) || die();
?>
<style type="text/css">
	.content-item-image.quiz{
			background-image: url(<?php echo esc_url( plugins_url( '', dirname( __FILE__ ) ) . '/images/form-not-found.png' ); ?>);
			background-repeat: no-repeat;
			background-size: cover;
		}
</style>
<div id="opinionstage-content">
	<div class="opinionstage-header-wrapper">
		<?php if ( $os_client_logged_in ) { ?>
			<div class="opinionstage-logo-wrapper">
				<div class="opinionstage-logo"></div>
				<div class="opinionstage-connectivity-status"><?php echo esc_html( $os_options['email'] ); ?>
					<form method="POST" action="<?php echo esc_url( get_admin_url( null, 'admin.php?page=' . OPINIONSTAGE_DISCONNECT_PAGE ) ); ?>" class="opinionstage-connect-form">
						<button class="opinionstage-disconnect" type="submit"><?php esc_html_e( 'Disconnect', 'social-polls-by-opinionstage' ); ?></button>
					</form>
				</div>
			</div>
		<?php } ?>
	</div>
	<div id="container" class="opinionstage-dashboard">
		<div class="opinionstage-item-view-dashboard">
			<div id="opinionstage-section-create" class="opinionstage-dashboard-section">
				<div class="opinionstage-section-header" style="overflow: visible">
					<div class="opinionstage-section-title"><?php esc_html_e( 'My Items', 'social-polls-by-opinionstage' ); ?></div>
					<div class="opinionstage-header-inner-container">
						<div class="opinionstage-header-inner-section">
							<a href="https://help.opinionstage.com/wordpress-plugin/how-to-add-items-to-your-wordpress-site" target="_blank"><?php esc_html_e( 'Need help adding items to your site?', 'social-polls-by-opinionstage' ); ?></a>
							<div style="padding: 0 9px; width: 150px; display: inline-block;">
								<select id="itemList">
									<option value="all"><?php esc_html_e( 'ALL ITEMS', 'social-polls-by-opinionstage' ); ?></option>
									<option value="poll"><?php esc_html_e( 'POLL', 'social-polls-by-opinionstage' ); ?></option>
									<option value="survey"><?php esc_html_e( 'SURVEY', 'social-polls-by-opinionstage' ); ?></option>
									<option value="trivia"><?php esc_html_e( 'TRIVIA QUIZ', 'social-polls-by-opinionstage' ); ?></option>
									<option value="outcome"><?php esc_html_e( 'PERSONALITY QUIZ', 'social-polls-by-opinionstage' ); ?></option>
									<option value="form"><?php esc_html_e( 'CLASSIC FORM', 'social-polls-by-opinionstage' ); ?></option>
								</select>
							</div>
							<div class="search search-container">
								<input id="opinionstage-my-items-search-field" class="std-input" name="search" placeholder="Search" type="text">
							</div>
						</div>

						<div style="padding: 0 9px; width: 150px; display: inline-block;position: relative;">
							<button class="opinionstage-connect-btn opinionstage-blue-btn opinionstage-item-create opinionstage-show-anchor-list"><?php esc_html_e( 'Create', 'social-polls-by-opinionstage' ); ?></button>
							<ul class="opinionstage-anchors-list">
								<li><?php echo opinionstage_create_poll_link( '', __( 'POLL', 'social-polls-by-opinionstage' ) ); ?></li>
								<li><?php echo opinionstage_create_survey_link( '', __( 'SURVEY', 'social-polls-by-opinionstage' ) ); ?></li>
								<li><?php echo opinionstage_create_trivia_link( '', __( 'TRIVIA QUIZ', 'social-polls-by-opinionstage' ) ); ?></li>
								<li><?php echo opinionstage_create_personality_link( '', __( 'PERSONALITY QUIZ', 'social-polls-by-opinionstage' ) ); ?></li>
								<li><?php echo opinionstage_create_form_link( '', __( 'CLASSIC FORM', 'social-polls-by-opinionstage' ) ); ?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<p id="opinionstage-my-items-loading-message" class="opinionstage-my-items-message" style="display: block; font-size: 16px; text-align: center;"><?php esc_html_e( 'Loading...', 'social-polls-by-opinionstage' ); ?></p>
			<p id="opinionstage-my-items-no-items" class="opinionstage-my-items-message" style="display: none; font-size: 16px; text-align: center;"><?php esc_html_e( 'No items found', 'social-polls-by-opinionstage' ); ?></p>
			<table id="opinionstage-items-table"></table>
			<p class="no_item" style="display: none; font-size: 15px; text-align: center;"><?php esc_html_e( 'No items found', 'social-polls-by-opinionstage' ); ?></p>
			<p id="opinionstage-failed-load-items-request" style="display: none; font-size: 15px; text-align: center;"><?php esc_html_e( 'An error occurred while loading the items.', 'social-polls-by-opinionstage' ); ?>
				<a href="https://www.opinionstage.com/live-chat/?utm_source=wordpress&utm_campaign=WPMainPI&utm_medium=link&o=wp35e8" target="_blank"><?php esc_html_e('Please contact our chat support for help', 'social-polls-by-opinionstage'); ?></a></p>
			<div id="opinionstage-load-more" class="btn btn_aqua btn_full-width" style="display: none;"><?php esc_html_e( 'Click for more', 'social-polls-by-opinionstage' ); ?></div>
		</div>
	</div>
</div>
