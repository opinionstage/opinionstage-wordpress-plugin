<?php
// block direct access to plugin PHP files:
defined( 'ABSPATH' ) or die();
add_action( 'admin_init', 'opinionstage_message_handler' );
function opinionstage_message_handler(){
	$last_api_call_time = get_option('oswp_message_last_call_time'); // last api call time
	$last_activity_time = get_option('oswp_message_activity_time'); // last activity time
	if($last_activity_time == false){
		$last_activity_time = 1;
	}

	if(
		$last_api_call_time == false || 
		($last_api_call_time != false && strtotime("+6 hours", $last_api_call_time) < time() )
	){
		opinionstage_message_api_call($last_activity_time);
	}

	$message_title 		= get_option('oswp_message_title');
	$message_content 	= get_option('oswp_message_content');

	// display message if available
	if( $message_title != false && $message_content != false ){
		add_action( 'admin_notices', 'opinionstage_display_wp_message');
	}
}

function opinionstage_message_api_call($last_activity_time){
	$api_url = OPINIONSTAGE_MESSAGE_API."?api_call_time=".$last_activity_time;
	$client = curl_init($api_url);
	curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($client);
	$result = json_decode($response);
	update_option('oswp_message_last_call_time', time());
	// save if message is available
	if(isset($result->message) && count($result->message) > 0){
		update_option('oswp_message_title', $result->message->title);
		update_option('oswp_message_content', $result->message->content);	
	}
}

function opinionstage_display_wp_message(){
	$message_title_display = get_option('oswp_message_title');
	$message_content_display = get_option('oswp_message_content');
	$message_content_display = str_replace('\\','',htmlspecialchars_decode($message_content_display));
	echo '<div class="notice notice-success" id="oswp_hide_div" style="overflow: hidden; position: relative;padding-top: 10px; padding-bottom: 20px;"><img style="margin-top:8px;float: left;width:70px;margin-right: 20px;" src="' . esc_url( plugins_url( 'admin/images/opinionstage-tracking-notice.png', plugin_dir_path(__FILE__) ) ) . '"><h3 style="margin-bottom:0px;margin-top: 10px;margin-left: 10px;float: none;">'.$message_title_display.'</h3><p> '.$message_content_display.'</p><div style="clear:both"></div><button id="read_message" type="submit" class="button button-primary button-large" style="margin-left: 90px;margin-top: 10px;">Mark as Read</button><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button></div>';
}

add_action( 'admin_footer', 'oswp_message_delete_action_javascript' ); 

function oswp_message_delete_action_javascript() { ?>
<script type="text/javascript">
jQuery(document).ready(function($){
	$('button#read_message , button.notice-dismiss').on('click', function(event) {
	    event.preventDefault();
	   	var data = {
			'action': 'osa_message_delete',
			'delete_options_oswp' : true
		};
		jQuery.post(ajaxurl, data, function(response) {
			if(response){
				$('#oswp_hide_div').hide(800);
			}
		});
	});
});
		
</script>
<?php }