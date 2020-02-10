<?php
// block direct access to plugin PHP files:
defined( 'ABSPATH' ) or die();
?>
<div id="opinionstage-content">
	<div class="opinionstage-header-wrapper">
		<div class="opinionstage-logo-wrapper">
			<div class="opinionstage-logo"></div>
			<div class="opinionstage-connectivity-status"><?php echo($os_options["email"]); ?>
				<form method="POST" action="<?php echo get_admin_url(null, 'admin.php?page='.OPINIONSTAGE_DISCONNECT_PAGE)?>" class="opinionstage-connect-form">
					<button class="opinionstage-disconnect" type="submit">Disconnect</button>
				</form>
			</div>
		</div>
	</div>
	<?php if( $os_client_logged_in ){  ?>
		<div class="gettingStartedSection">
			<div class="gettingStartedContainer">
			<div class="opinionstage-status-content-connected">
				<div class='opinionstage-status-title opinionstage-resources-title'>Opinion Stage Help Resources</div>
			</div>
			</div>
			<div class="gettingBlockContainer">
				<a href="https://help.opinionstage.com/wordpress-plugin/how-to-use-the-wordpress-plugin?utm_source=wordpress&utm_campaign=WPMainPI&utm_medium=link&o=wp35e8" target="_blank" class="help-link"><div class="gettingTemplateTutorial">GETTING STARTED <br/>VIDEO TUTORIAL</div></a>
				<?php echo opinionstage_link('TEMPLATES & <br/> EXAMPLES', 'dashboard/content/templates', 'gettingTemplateGallery help-link'); ?>				
			</div>
			<div class="gettingBlockContainer">
				<a href="https://help.opinionstage.com?utm_source=wordpress&utm_campaign=WPMainPI&utm_medium=link&o=wp35e8" target="_blank" class="help-link"><div class="gettingTemplateTutorial" style="padding: 29px 0;">HELP CENTER</div></a>
				<a href="https://www.opinionstage.com/live-chat/?utm_source=wordpress&utm_campaign=WPMainPI&utm_medium=link&o=wp35e8" target="_blank" class="help-link"><div class="help-center-os">LIVE CHAT HELP</div></a>			
			</div>
		</div>
	<?php } ?>
</div>