<?php 
// block direct access to plugin PHP files:
defined( 'ABSPATH' ) or die(1); ?>
<style type="text/css">
td.long {
    min-width: 300px;
    padding-left: 10px;
}
td.long table{
	width: 100%;
    color: #b1b1b1;
    position: absolute;
    bottom: 0;
    line-height: normal;
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
    color: #3aaebd;
    border: 1px solid #3aaebd;
    padding: 10px 30px;
    text-transform: uppercase;
    font-size: 14px;
}
td.action {
    width: 340px;
    opacity: 0.7;
}
span.os-icon-plugin.icon-os-common-date {
    margin-right: 4px;
}
td.long a {
    color: #000;
    text-decoration: none;
    font-size: 17px;
    font-weight: normal;
}
.content-item-image.quiz {
    position: relative;
    width: 120px;
    height: 90px;
}
.content-item-image.quiz img {
    opacity: 0.8;
    position: absolute;
    display: block;
    bottom: 0;
    right: 0;
    width: 120px;
    height: 90px;
}
.content-item-label {
    text-transform: uppercase;
    position: absolute;
    top: 0;
    left: 0;
    color: white;
    background-color: #222120;
    padding: 0px 4px;
    font-size: 10px;
}
tr.settingBorderOs {
    border-top: 1px #e5e5e5 solid;
    display: table-cell;
    padding: 8px 0px;
}
.opinionstage-section-header {
    font-size: 23px;
    margin-left: 20px;
    margin-top: 20px;
    overflow: hidden;
    height: 40px;
    width: 100%;
    max-width: 785px;
}
.opinionstage-section-title {
    font-size: 25px;
    float: left;
    padding: 10px 0;
}
.opinionstage-section-header a {
    float: right;
    margin-right: 0;
    color: #3499c2;
    font-weight: 600;
    font-size: 15px;
    margin: 10px 25px;
}
</style>
<div class="wrap">
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
	<div id="container" style="background: #fff;overflow: hidden;">
		<div class="opinionstage-section-header">
			<div class="opinionstage-section-title">View My Items</div>
			<a href="https://help.opinionstage.com/wordpress-plugin/how-to-add-items-to-your-wordpress-site" target="_blank" class="">Need help adding items to your site?</a>			
		</div>
		<table id="check" style="background: #fff;margin-left: 20px;margin-top: 20px;margin-bottom: 20px;width: 100%; max-width: 780px;"></table></div>
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
				if(dropdownOptions.data.length == 0){
					var viewtext = '<tbody><tr><td><p><span style="font-weight: 600; font-size: 15px; color:#3499c2;">No content found, </span><a href="https://dipika.embien.co.uk/wp-admin/admin.php?page=opinionstage-settings" style="font-weight: 600; font-size: 15px; color:#3499c2;">Create your first one.</a></p></td></tr></tbody>';
					$(viewtext).appendTo('#container table#check');
				}else{
					for (var i = 0; i < dropdownOptions.data.length; i++) {
			            var previewBlockOsTitle = dropdownOptions.data[i].attributes['title'];
			            var previewBlockOsType = dropdownOptions.data[i].attributes['type'];
			            var previewBlockOsDate = dropdownOptions.data[i].attributes['updated-at'];
			            	previewBlockOsDate = new Date(previewBlockOsDate);
							previewBlockOsDate = previewBlockOsDate.toDateString();
						var resDateOs = previewBlockOsDate.split(" ");
  							previewBlockOsDate = resDateOs[2]+' '+resDateOs[1]+' '+resDateOs[3];
			            var previewBlockOsImageUrl = dropdownOptions.data[i].attributes['image-url'];
			            var previewBlockOsView = dropdownOptions.data[i].attributes['landing-page-url'];
			            var previewBlockOsEdit = dropdownOptions.data[i].attributes['edit-url'];
			            var previewBlockOsStatistics = dropdownOptions.data[i].attributes['stats-url'];
			            var viewtext = '<tbody><tr class="settingBorderOs"><td><div class="content-item-image quiz"><img height="90" src="'+previewBlockOsImageUrl+'" width="120"><div class="content-item-label">'+previewBlockOsType+'</div></div></td><td class="long"><div style="position: relative;height: 85px;"><a href="'+previewBlockOsEdit+'">'+previewBlockOsTitle+'</a><table><tbody><tr><td><span class="os-icon-plugin icon-os-common-date"></span><div class="label">'+previewBlockOsDate+'</div></td></tr></tbody></table></div></td><td class="action"><a href="'+previewBlockOsView+'" class="opinionstage-blue-bordered-btn opinionstage-edit-content " target="_blank"> View </a><a href="'+previewBlockOsEdit+'" class="opinionstage-blue-bordered-btn opinionstage-edit-content " target="_blank"> Edit </a><a href="'+previewBlockOsStatistics+'" class="opinionstage-blue-bordered-btn opinionstage-edit-content " target="_blank"> Statistics </a></td></tr></tbody>';
							$(viewtext).appendTo('#container table#check');
		        	}
				}
			},
			error: function(){
			    console.log(data);
			}
		});
	});
</script>