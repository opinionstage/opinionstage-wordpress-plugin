<?php
// block direct access to plugin PHP files:
defined( 'ABSPATH' ) or die();
?>
<div id="opinionstage-content">
	<div class="opinionstage-header-wrapper">
			<?php if ( !$os_client_logged_in ) {?>
			<div class="opinionstage-logo-wrapper">
				<div class="opinionstage-logo"></div>
			</div>
			<div class="opinionstage-status-content">
				<div class='opinionstage-status-title'><b class="opinionstage-title" style="font-size: 20px;"><?php _e('Connect WordPress with Opinion Stage to get started', 'social-polls-by-opinionstage'); ?></b></div>
				<form action="<?php echo OPINIONSTAGE_LOGIN_PATH ?>" method="get" class="opinionstage-connect-form">
					<input type="hidden" name="utm_source" value="<?php echo OPINIONSTAGE_UTM_SOURCE ?>">
					<input type="hidden" name="utm_campaign" value="<?php echo OPINIONSTAGE_UTM_CAMPAIGN ?>">
					<input type="hidden" name="utm_medium" value="<?php echo OPINIONSTAGE_UTM_CONNECT_MEDIUM ?>">
					<input type="hidden" name="o" value="<?php echo OPINIONSTAGE_WIDGET_API_KEY ?>">
					<input type="hidden" name="callback" value="<?php echo opinionstage_callback_url()?>">
					<input id="os-email" type="email" name="email" placeholder="<?php _e('Your email', 'social-polls-by-opinionstage'); ?>" data-os-email-input required>
					<button class="opinionstage-connect-btn opinionstage-blue-btn" type="submit" id="os-start-login" data-os-login><?php _e('CONNECT', 'social-polls-by-opinionstage'); ?></button>
				</form>
			</div>
			<?php } else { ?>
			<div class="opinionstage-logo-wrapper">
				<div class="opinionstage-logo"></div>
				<div class="opinionstage-connectivity-status"><?php echo($os_options["email"]); ?>
					<form method="POST" action="<?php echo get_admin_url(null, 'admin.php?page='.OPINIONSTAGE_DISCONNECT_PAGE)?>" class="opinionstage-connect-form">
						<button class="opinionstage-disconnect" type="submit"><?php _e('Disconnect', 'social-polls-by-opinionstage'); ?></button>
					</form>
				</div>
			</div>
			<?php } ?>
	</div>
	<div class="opinionstage-dashboard">
		<div class="opinionstage-dashboard-left">
			<div id="opinionstage-section-create" class="opinionstage-dashboard-section">
				<div class="opinionstage-section-header">
					<div class="opinionstage-section-title"><?php _e('Create', 'social-polls-by-opinionstage'); ?></div>
					<?php echo opinionstage_help_links(__('Need help adding items to your site?', 'social-polls-by-opinionstage'), 'https://help.opinionstage.com/wordpress-plugin/how-to-add-items-to-your-wordpress-site', 'opinionstage-need-help-link'); ?>
				</div>
				<div class="opinionstage-section-content" style="position: relative;">
					<div class="opinionstage-section-raw">
						<div class="opinionstage-section-cell opinionstage-icon-cell">
							<div class="os-icon-plugin"><img src="<?php echo plugins_url( 'images/poll.png', dirname(__FILE__) ); ?>" ></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-description-cell">
							<div class="title"><?php _e('Poll', 'social-polls-by-opinionstage'); ?></div>
							<div class="example"><?php _e('Get opinions, run contests & competitions', 'social-polls-by-opinionstage'); ?></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-btn-cell">
							<?php echo opinionstage_create_poll_link('opinionstage-blue-btn opinionstage-create-btn os_create_new_btn template'); ?>
							<?php echo opinionstage_template_poll_link('opinionstage-blue-bordered-btn opinionstage-create-btn os_use_template_btn template'); ?>
						</div>
					</div>
					<div class="opinionstage-section-raw">
						<div class="opinionstage-section-cell opinionstage-icon-cell">
							<div class="os-icon-plugin"><img src="<?php echo plugins_url( 'images/personality.png', dirname(__FILE__) ); ?>" ></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-description-cell">
							<div class="title"><?php _e('Personality Quiz', 'social-polls-by-opinionstage'); ?></div>
							<div class="example"><?php _e('Create a personality test or a product/service selector', 'social-polls-by-opinionstage'); ?></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-btn-cell">
							<?php echo opinionstage_create_personality_link('opinionstage-blue-btn opinionstage-create-btn os_create_new_btn template'); ?>
							<?php echo opinionstage_template_personality_quiz_link('opinionstage-blue-bordered-btn opinionstage-create-btn os_use_template_btn template') ?>
						</div>
					</div>
					<div class="opinionstage-section-raw">
						<div class="opinionstage-section-cell opinionstage-icon-cell">
							<div class="os-icon-plugin"><img src="<?php echo plugins_url( 'images/trivia.png', dirname(__FILE__) ); ?>" ></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-description-cell">
							<div class="title"><?php _e('Trivia Quiz', 'social-polls-by-opinionstage'); ?></div>
							<div class="example"><?php _e('Create a knowledge test or assessment', 'social-polls-by-opinionstage'); ?></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-btn-cell">
							<?php echo opinionstage_create_trivia_link('opinionstage-blue-btn opinionstage-create-btn os_create_new_btn template'); ?>
							<?php echo opinionstage_template_trivia_link('opinionstage-blue-bordered-btn opinionstage-create-btn os_use_template_btn template'); ?>
						</div>
					</div>
					<div class="opinionstage-section-raw">
						<div class="opinionstage-section-cell opinionstage-icon-cell">
							<div class="os-icon-plugin"><img src="<?php echo plugins_url( 'images/survey.png', dirname(__FILE__) ); ?>" ></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-description-cell">
							<div class="title"><?php _e('Survey', 'social-polls-by-opinionstage'); ?></div>
							<div class="example"><?php _e('Gather feedback from your users', 'social-polls-by-opinionstage'); ?></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-btn-cell">
							<?php echo opinionstage_create_survey_link('opinionstage-blue-btn opinionstage-create-btn os_create_new_btn template'); ?>
							<?php echo opinionstage_template_survey_link('opinionstage-blue-bordered-btn opinionstage-create-btn os_use_template_btn template'); ?>
						</div>
					</div>
					<div class="opinionstage-section-raw">
						<div class="opinionstage-section-cell opinionstage-icon-cell">
							<div class="os-icon-plugin"><img src="<?php echo plugins_url( 'images/form.png', dirname(__FILE__) ); ?>" ></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-description-cell">
							<div class="title"><?php _e('Classic Form', 'social-polls-by-opinionstage'); ?></div>
							<div class="example"><?php _e('Gather information from your users', 'social-polls-by-opinionstage'); ?></div>
						</div>
						<div class="opinionstage-section-cell opinionstage-btn-cell">
							<?php echo opinionstage_create_form_link('opinionstage-blue-btn opinionstage-create-btn os_create_new_btn template'); ?>
							<?php echo opinionstage_template_form_link('opinionstage-blue-bordered-btn opinionstage-create-btn os_use_template_btn template'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
