<?php 
// block direct access to plugin PHP files:
defined( 'ABSPATH' ) or die(1);

if(isset($_POST['submit_tracking']) && $_POST['submit_tracking'] == 'SAVE CHANGES'){
	if(isset($_POST['opinionstage_allow_tracking']) && $_POST['opinionstage_allow_tracking'] == 'yes'){
		update_option('oswp_tracking_user_site_data', 'yes');
	}else{
		update_option('oswp_tracking_user_site_data','no');
	}
}
$usage_enabled = get_option('oswp_tracking_user_site_data');
?>
<div id="opinionstage-content">
	<div class="opinionstage-header-wrapper">
			<?php if ( !$os_client_logged_in ) {?>
			<div class="opinionstage-logo-wrapper">
				<div class="opinionstage-logo"></div>
			</div>	
			<div class="opinionstage-status-content">
				<div class='opinionstage-status-title'><b class="opinionstage-title">Connect WordPress with Opinion Stage to get started</b></div>
				<form action="<?php echo OPINIONSTAGE_LOGIN_PATH ?>" method="get" class="opinionstage-connect-form">
					<input type="hidden" name="utm_source" value="<?php echo OPINIONSTAGE_UTM_SOURCE ?>">
					<input type="hidden" name="utm_campaign" value="<?php echo OPINIONSTAGE_UTM_CAMPAIGN ?>">
					<input type="hidden" name="utm_medium" value="<?php echo OPINIONSTAGE_UTM_CONNECT_MEDIUM ?>">
					<input type="hidden" name="o" value="<?php echo OPINIONSTAGE_WIDGET_API_KEY ?>">
					<input type="hidden" name="callback" value="<?php echo opinionstage_callback_url()?>">
					<input id="os-email" type="email" name="email" placeholder="Your email" data-os-email-input required>
					<button class="opinionstage-connect-btn opinionstage-blue-btn" type="submit" id="os-start-login" data-os-login>CONNECT</button>
				</form>
			</div>
			<?php } else { ?>
			<div class="opinionstage-logo-wrapper">
				<div class="opinionstage-logo"></div>
				<div class="opinionstage-connectivity-status"><?php echo($os_options["email"]); ?>
					<form method="POST" action="<?php echo get_admin_url(null, 'admin.php?page=opinionstage-disconnect-page')?>" class="opinionstage-connect-form">
						<button class="opinionstage-disconnect" type="submit">Disconnect</button>
					</form>
				</div>
			</div>	
			<?php } ?>				
	</div>
	<div class="opinionstage-dashboard">
		<div class="opinionstage-placement-dashboard">
		<div id="opinionstage-section-create" class="opinionstage-dashboard-section">
		<div class="opinionstage-section-header">
			<div class="opinionstage-section-title">Settings</div>
		</div>

		<div>
			<form method="post" action="">
			<div class="os-setting-container">
			<div class="opinionstage-setting-title">Usage Data Tracking</div>
			<div class="opinionstage-setting-content">					
				<input type="checkbox" name="opinionstage_allow_tracking" value="yes" <?php echo ($usage_enabled=='yes') ? 'checked="checked"' : ''; ?> >
					<span>Opt-in to our anonymous plugin data collection and to updates. We guarantee no</span> <br/><span style="margin-left: 23px;">sensitive data is collected. </span>
				<a href="https://help.opinionstage.com/wordpress-plugin/usage-data-tracking" target="_blank">Learn more.</a>		
			</div>
			</div>
			<input type="submit" name="submit_tracking" class="opinionstage-blue-btn" style="padding: 10px 20px; width: 152px;" value="SAVE CHANGES">
		</form>
		</div>
	</div>
</div>
</div>
</div>
<?php if ( !$os_client_logged_in ) {
	echo '<div id="overlay"></div>';
} 
?>