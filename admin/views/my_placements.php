<?php
/**
 * My Placements Admin Page
 *
 * @package   OpinionStageWordPressPlugin
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
				<div class='opinionstage-status-title'><b class="opinionstage-title"><?php esc_html_e( 'Connect WordPress with Opinion Stage to get started', 'social-polls-by-opinionstage' ); ?></b></div>
				<form action="<?php echo esc_url( OPINIONSTAGE_LOGIN_PATH ); ?>" method="get" class="opinionstage-connect-form">
					<input type="hidden" name="utm_source" value="<?php echo esc_attr( OPINIONSTAGE_UTM_SOURCE ); ?>">
					<input type="hidden" name="utm_campaign" value="<?php echo esc_attr( OPINIONSTAGE_UTM_CAMPAIGN ); ?>">
					<input type="hidden" name="utm_medium" value="<?php echo esc_attr( OPINIONSTAGE_UTM_CONNECT_MEDIUM ); ?>">
					<input type="hidden" name="o" value="<?php echo esc_attr( OPINIONSTAGE_WIDGET_API_KEY ); ?>">
					<input type="hidden" name="callback" value="<?php echo esc_url( opinionstage_callback_url() ); ?>">
					<input id="os-email" type="email" name="email" placeholder="<?php esc_attr_e( 'Your email', 'social-polls-by-opinionstage' ); ?>" data-os-email-input required>
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
		<div class="opinionstage-placement-dashboard">
			<div id="opinionstage-section-placements" class="opinionstage-dashboard-section <?php echo $os_client_logged_in ? '' : 'opinionstage-disabled-section'; ?>">
				<div class="opinionstage-section-header">
					<div class="opinionstage-section-title"><?php esc_html_e( 'Placements', 'social-polls-by-opinionstage' ); ?></div>
					<a href="https://help.opinionstage.com/wordpress-plugin/how-to-add-items-to-your-site-using-placements" style="float: right;" target="_blank"><?php esc_html_e( 'Need help working with Placements?', 'social-polls-by-opinionstage' ); ?></a>
				</div>
				<div class="opinionstage-section-content-wrapper">
					<div class="opinionstage-section-content">
						<div class="opinionstage-section-raw">
							<div class="opinionstage-section-cell opinionstage-toggle-cell">
								<div class="opinionstage-onoffswitch <?php echo( $os_client_logged_in ? '' : 'disabled' ); ?>">
									<input type="checkbox" name="fly-out-switch" class="opinionstage-onoffswitch-checkbox"
												<?php echo( $os_client_logged_in ? '' : 'disabled' ); ?>
												id="fly-out-switch"
												<?php echo $os_client_logged_in && 'true' === $os_options['fly_out_active'] ? 'checked' : ''; ?>
									>
									<label class="opinionstage-onoffswitch-label" for="fly-out-switch">
										<div class="opinionstage-onoffswitch-inner"></div>
										<div class="opinionstage-onoffswitch-switch"></div>
									</label>
								</div>
							</div>
							<div class="opinionstage-section-cell opinionstage-description-cell">
								<div class="title"><?php esc_html_e( 'Popup', 'social-polls-by-opinionstage' ); ?></div>
							</div>
							<div class="opinionstage-section-cell opinionstage-btns-cell">
								<?php if ( $os_client_logged_in ) { ?>
								<a href="<?php echo esc_url( opinionstage_flyout_edit_url( 'content' ) ); ?>" class='opinionstage-blue-bordered-btn opinionstage-edit-content' target="_blank"><?php esc_html_e( 'SELECT ITEM', 'social-polls-by-opinionstage' ); ?></a>
								<a href="<?php echo esc_url( opinionstage_flyout_edit_url( 'settings' ) ); ?>" class='opinionstage-blue-bordered-btn opinionstage-edit-settings' target="_blank">
									<div class="os-icon-plugin icon-os-common-settings"></div>
								</a>
								<?php } else { ?>
								<a class='opinionstage-blue-bordered-btn opinionstage-edit-content disabled'><?php esc_html_e( 'SELECT ITEM', 'social-polls-by-opinionstage' ); ?></a>
								<a class='opinionstage-blue-bordered-btn opinionstage-edit-settings disabled'>
									<div class="os-icon-plugin icon-os-common-settings"></div>
								</a>
								<?php } ?>
							</div>
						</div>

						<div class="opinionstage-section-raw">
							<div class="opinionstage-section-cell opinionstage-toggle-cell">

							</div>
							<div class="opinionstage-section-cell opinionstage-description-cell">
								<a href="<?php echo esc_url( get_admin_url( '', '', 'admin' ) . 'widgets.php' ); ?>" class="title <?php echo ! $os_client_logged_in ? 'opinionstage-disabled-link' : ''; ?>" target="_blank"><?php esc_html_e( 'Add an Opinion Stage widget', 'social-polls-by-opinionstage' ); ?></a>
							</div>
							<div class="opinionstage-section-cell opinionstage-btns-cell">

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
