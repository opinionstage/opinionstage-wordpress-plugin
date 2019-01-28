<?php 
// block direct access to plugin PHP files:
defined( 'ABSPATH' ) or die(1); ?>
<style type="text/css">
	td.long {
    min-width: 300px;
    display: table-caption;
    margin-left: 10px;
}
td.long table{
	    width: 100%;
    margin-top: 66px;
    color: #b1b1b1;
}
td.long table td {
	    max-width: 300px;
}
span.os-icon-plugin.icon-os-common-date {
    float: left;
    margin-right: 10px;
}
.label {
    line-height: 15px;
}
.content-item-label {
    background-color: #222120;
    padding: 2px 4px;
    font-size: 10px;
    color: #fff;
}

a.opinionstage-blue-bordered-btn {
    float: left;
    margin-right: 5px;
}
 a.opinionstage-blue-bordered-btn {
    text-align: center;
    text-decoration: none;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
    display: block;
    color: #3499c2;
    border: 1px solid #3499c2;
    padding: 10px 30px;
}
td.action{
	    width: 370px;
    opacity: 0.7;
}
</style>
<div class="wrap">
	<h1 class="wp-heading-inline">View My Items</h1>
	<div id="opinionstage-content">
		<div class="opinionstage-header-wrapper">
			<div class="opinionstage-logo-wrapper">
				<div class="opinionstage-logo"></div>
			</div>		
				<?php if ( !$os_client_logged_in ) {?>
				<div class="opinionstage-status-content">
					<div class='opinionstage-status-title'><b>Connect WordPress with Opinion Stage to Get Started</b></div>
					<form action="<?php echo OPINIONSTAGE_LOGIN_PATH ?>" method="get" class="opinionstage-connect-form">
						<i class="os-icon-plugin icon-os-poll-client"></i>
						<input type="hidden" name="utm_source" value="<?php echo OPINIONSTAGE_UTM_SOURCE ?>">
						<input type="hidden" name="utm_campaign" value="<?php echo OPINIONSTAGE_UTM_CAMPAIGN ?>">
						<input type="hidden" name="utm_medium" value="<?php echo OPINIONSTAGE_UTM_MEDIUM ?>">
						<input type="hidden" name="o" value="<?php echo OPINIONSTAGE_WIDGET_API_KEY ?>">
						<input type="hidden" name="callback" value="<?php echo opinionstage_callback_url()?>">
						<input id="os-email" type="email" name="email" placeholder="Enter Your Email" data-os-email-input>
						<button class="opinionstage-connect-btn opinionstage-blue-btn" type="submit" id="os-start-login" data-os-login>CONNECT</button>
					</form>
				</div>
				<?php } else { ?>
				<div class="opinionstage-status-content-connected">
					<div class='opinionstage-status-title'>You are connected to Opinion Stage with the following email</div>
					<i class="os-icon-plugin icon-os-form-success"></i>
					<label class="checked" for="user-email"></label>
					<input id="os-email" type="email" disabled value="<?php echo($os_options["email"]) ?>">
					<form method="POST" action="<?php echo get_admin_url(null, 'admin.php?page=opinionstage-disconnect-page')?>" class="opinionstage-connect-form">
						<button class="opinionstage-connect-btn opinionstage-blue-btn" type="submit" id="os-disconnect">DISCONNECT</button>
					</form>
				</div>
				<?php } ?>		
		</div>
	</div>
	<div id="container" style="background: #fff;overflow: hidden;"><table id="check" style="background: #fff;margin-left: 20px;margin-top: 20px;margin-bottom: 20px;"></table></div>
</div>
<script type="text/javascript">
// This is our actual script
jQuery(document).ready(function($){

    	$.ajax({
			url: 'https://www.opinionstage.com/api/wp/v1/my/widgets?type=all&page=1&per_page=99',
			headers: {
			'Accept':'application/vnd.api+json',
			'Content-Type':'application/vnd.api+json',
			'OSWP-Plugin-Version':'<?php echo OPINIONSTAGE_WIDGET_VERSION ?>',
			'OSWP-Client-Token': '<?php echo opinionstage_user_access_token() ?>'
			    },
			method: 'GET',
			dataType: 'json',
			success: function(data){
				dropdownOptions = data;
				console.log(dropdownOptions.data);
			    for (var i = 0; i < dropdownOptions.data.length; i++) {
		            var previewBlockOsTitle = dropdownOptions.data[i].attributes['title'];
		            var previewBlockOsType = dropdownOptions.data[i].attributes['type'];
		            var previewBlockOsDate = dropdownOptions.data[i].attributes['updated-at'];
		            var previewBlockOsImageUrl = dropdownOptions.data[i].attributes['image-url'];
		            var previewBlockOsView = dropdownOptions.data[i].attributes['landing-page-url'];
		            var previewBlockOsEdit = dropdownOptions.data[i].attributes['edit-url'];
		            var previewBlockOsStatistics = dropdownOptions.data[i].attributes['stats-url'];
		            console.log(previewBlockOsTitle);
		            var viewtext = '<tbody><tr><td><div><img height="90" src="'+previewBlockOsImageUrl+'" width="120"><div class="content-item-label">'+previewBlockOsType+'</div></div></td><td class="long"><div><a href="'+previewBlockOsEdit+'">'+previewBlockOsTitle+'</a><table><tbody><tr><td><span class="os-icon-plugin icon-os-common-date"></span><div class="label">'+previewBlockOsDate+'</div></td></tr></tbody></table></div></td><td class="action"><a href="'+previewBlockOsView+'" class="opinionstage-blue-bordered-btn opinionstage-edit-content " target="_blank"> View </a><a href="'+previewBlockOsEdit+'" class="opinionstage-blue-bordered-btn opinionstage-edit-content " target="_blank"> Edit </a><a href="'+previewBlockOsStatistics+'" class="opinionstage-blue-bordered-btn opinionstage-edit-content " target="_blank"> Statistics </a></td></tr></tbody>';
				$(viewtext).appendTo('#container table#check');

		        }
			},
			error: function(){
			    console.log(data);
			}
		});
});

	jQuery(document).ready(function ($) {	
		 $(window).on('load',function(){
	        $('#oswpLauncherContentPopup').trigger('click');
	    });
	});
</script>