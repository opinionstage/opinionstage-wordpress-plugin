<?php
/**
 * Opinionstage Create Admin page
 *
 * @package OpinionStageWordPressPlugin
 */

defined( 'ABSPATH' ) || die();
?>
<div id="opinionstage-content">
	<div class="opinionstage-header-wrapper">
			<?php if ( ! $os_client_logged_in ) { ?>
			<div class="opinionstage-logo-wrapper">
				<div class="opinionstage-logo"></div>
			</div>
			<div class="opinionstage-status-content">
				<div class='opinionstage-status-title'><b class="opinionstage-title" style="font-size: 20px;"><?php esc_html_e( 'Connect WordPress with Opinion Stage to get started', 'social-polls-by-opinionstage' ); ?></b></div>
				<form action="<?php echo esc_url( OPINIONSTAGE_LOGIN_PATH ); ?>" method="get" class="opinionstage-connect-form">
					<input type="hidden" name="utm_source" value="<?php echo esc_attr( OPINIONSTAGE_UTM_SOURCE ); ?>">
					<input type="hidden" name="utm_campaign" value="<?php echo esc_attr( OPINIONSTAGE_UTM_CAMPAIGN ); ?>">
					<input type="hidden" name="utm_medium" value="<?php echo esc_attr( OPINIONSTAGE_UTM_CONNECT_MEDIUM ); ?>">
					<input type="hidden" name="o" value="<?php echo esc_attr( OPINIONSTAGE_WIDGET_API_KEY ); ?>">
					<input type="hidden" name="callback" value="<?php echo esc_attr( opinionstage_callback_url() ); ?>">
					<input id="os-email" type="email" name="email" placeholder="<?php esc_html_e( 'Your email', 'social-polls-by-opinionstage' ); ?>" data-os-email-input required>
					<button class="opinionstage-connect-btn opinionstage-blue-btn" type="submit" id="os-start-login" data-os-login><?php esc_html_e( 'CONNECT', 'social-polls-by-opinionstage' ); ?></button>
				</form>
			</div>
			<?php } else { ?>
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
	<div class="opinionstage-dashboard">
		<div class="opinionstage-dashboard-left">
			<div id="opinionstage-section-create" class="opinionstage-dashboard-section">
				<div class="opinionstage-section-header">
					<div class="opinionstage-section-title"><?php esc_html_e( 'Create', 'social-polls-by-opinionstage' ); ?></div>
					<?php echo opinionstage_help_links( __( 'Need help adding items to your site?', 'social-polls-by-opinionstage' ), 'https://help.opinionstage.com/wordpress-plugin/how-to-add-items-to-your-wordpress-site', 'opinionstage-need-help-link' ); ?>
				</div>
				<div class="opinionstage-section-content" style="position: relative;">
					<div class="opinionstage-section-raw">
						<div class="opinionstage-section-cell opinionstage-icon-cell">
							<div class="os-icon-plugin"><img src="<?php echo esc_url( plugins_url( 'images/poll.png', dirname( __FILE__ ) ) ); ?>" ></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-description-cell">
							<div class="title"><?php esc_html_e( 'Poll', 'social-polls-by-opinionstage' ); ?></div>
							<div class="example"><?php esc_html_e( 'Let users vote to influence & discover what others voted', 'social-polls-by-opinionstage' ); ?></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-btn-cell">
							<?php echo opinionstage_create_poll_link( 'opinionstage-blue-btn opinionstage-create-btn os_create_new_btn template', __( 'CREATE', 'social-polls-by-opinionstage' ) ); ?>
						</div>
					</div>
					<div class="opinionstage-section-raw">
						<div class="opinionstage-section-cell opinionstage-icon-cell">
							<div class="os-icon-plugin"><img src="<?php echo esc_url( plugins_url( 'images/survey.png', dirname( __FILE__ ) ) ); ?>" ></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-description-cell">
							<div class="title"><?php esc_html_e( 'Survey', 'social-polls-by-opinionstage' ); ?></div>
							<div class="example"><?php esc_html_e( 'Ask your audience multiple open-ended & close-ended questions', 'social-polls-by-opinionstage' ); ?></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-btn-cell">
							<?php echo opinionstage_create_survey_link( 'opinionstage-blue-btn opinionstage-create-btn os_create_new_btn template', __( 'CREATE', 'social-polls-by-opinionstage' ) ); ?>
						</div>
					</div>
					<div class="opinionstage-section-raw">
						<div class="opinionstage-section-cell opinionstage-icon-cell">
							<div class="os-icon-plugin"><img src="<?php echo esc_url( plugins_url( 'images/trivia.png', dirname( __FILE__ ) ) ); ?>" ></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-description-cell">
							<div class="title"><?php esc_html_e( 'Trivia Quiz', 'social-polls-by-opinionstage' ); ?></div>
							<div class="example"><?php esc_html_e( 'Create a knowledge test or assessment', 'social-polls-by-opinionstage' ); ?></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-btn-cell">
							<?php echo opinionstage_create_trivia_link( 'opinionstage-blue-btn opinionstage-create-btn os_create_new_btn template', __( 'CREATE', 'social-polls-by-opinionstage' ) ); ?>
						</div>
					</div>
					<div class="opinionstage-section-raw">
						<div class="opinionstage-section-cell opinionstage-icon-cell">
							<div class="os-icon-plugin"><img src="<?php echo esc_url( plugins_url( 'images/personality.png', dirname( __FILE__ ) ) ); ?>" ></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-description-cell">
							<div class="title"><?php esc_html_e( 'Personality Quiz', 'social-polls-by-opinionstage' ); ?></div>
							<div class="example"><?php esc_html_e( 'Create a personality test or a product/service selector', 'social-polls-by-opinionstage' ); ?></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-btn-cell">
							<?php echo opinionstage_create_personality_link( 'opinionstage-blue-btn opinionstage-create-btn os_create_new_btn template', __( 'CREATE', 'social-polls-by-opinionstage' ) ); ?>
						</div>
					</div>
					<div class="opinionstage-section-raw">
						<div class="opinionstage-section-cell opinionstage-icon-cell">
							<div class="os-icon-plugin"><img src="<?php echo esc_url( plugins_url( 'images/form.png', dirname( __FILE__ ) ) ); ?>" ></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-description-cell">
							<div class="title"><?php esc_html_e( 'Classic Form', 'social-polls-by-opinionstage' ); ?></div>
							<div class="example"><?php esc_html_e( 'Gather information from your users', 'social-polls-by-opinionstage' ); ?></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-btn-cell">
							<?php echo opinionstage_create_form_link( 'opinionstage-blue-btn opinionstage-create-btn os_create_new_btn template', __( 'CREATE', 'social-polls-by-opinionstage' ) ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
