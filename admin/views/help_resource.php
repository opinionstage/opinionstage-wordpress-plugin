<?php
/**
 * Opinionstage Get Help Admin page
 *
 * @package OpinionStageWordPressPlugin
 */

defined( 'ABSPATH' ) || die();
?>
<div id="opinionstage-content">
	<div class="opinionstage-header-wrapper">
		<div class="opinionstage-logo-wrapper">
			<div class="opinionstage-logo"></div>
			<div class="opinionstage-connectivity-status"><?php echo esc_html( $os_options['email'] ); ?>
				<form method="POST" action="<?php echo esc_url( get_admin_url( null, 'admin.php?page=' . OPINIONSTAGE_DISCONNECT_PAGE ) ); ?>" class="opinionstage-connect-form">
					<button class="opinionstage-disconnect" type="submit">Disconnect</button>
				</form>
			</div>
		</div>
	</div>
	<?php if ( $os_client_logged_in ) { ?>
		<div class="gettingStartedSection">
			<div class="gettingStartedContainer">
			<div class="opinionstage-status-content-connected">
				<div class='opinionstage-status-title opinionstage-resources-title'>Opinion Stage Help Resources</div>
			</div>
			</div>
			<div class="gettingBlockContainer">
				<?php echo opinionstage_help_links( 'Getting Started <br/>Video Tutorial', 'https://help.opinionstage.com/wordpress-plugin/how-to-use-the-wordpress-plugin', 'gettingTemplateTutorial help-link' ); ?>	
				<?php echo opinionstage_link( 'Templates & <br/> Examples', 'dashboard/content/templates', 'gettingTemplateGallery help-link' ); ?>				
			</div>
			<div class="gettingBlockContainer">
				<?php echo opinionstage_help_links( 'Help Center', 'https://help.opinionstage.com', 'gettingTemplateTutorial help-link', 'padding: 29px 0;' ); ?>
				<?php echo opinionstage_link( 'Live Chat Help', 'live-chat/', 'help-center-os help-link' ); ?>		
			</div>
		</div>
	<?php } ?>
</div>
