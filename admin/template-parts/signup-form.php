<?php
/**
 * Signup Form
 *
 * @package OpinionStageWordPressPlugin
 */
?>
<form action="<?php echo esc_attr( OPINIONSTAGE_LOGIN_PATH ); ?>" method="get" class="opinionstage-connect-form">
	<input type="hidden" name="utm_source" value="<?php echo esc_attr( OPINIONSTAGE_UTM_SOURCE ); ?>">
	<input type="hidden" name="utm_campaign" value="<?php echo esc_attr( OPINIONSTAGE_UTM_CAMPAIGN ); ?>">
	<input type="hidden" name="utm_medium" value="<?php echo esc_attr( OPINIONSTAGE_UTM_CONNECT_MEDIUM ); ?>">
	<input type="hidden" name="o" value="<?php echo esc_attr( OPINIONSTAGE_WIDGET_API_KEY ); ?>">
	<input type="hidden" name="callback" value="<?php echo esc_attr( opinionstage_callback_url() ); ?>">
	<button class="opinionstage-connect-btn opinionstage-blue-btn pink" type="submit" id="os-start-login"><?php esc_html_e( 'Connect to Opinoin Stage', 'social-polls-by-opinionstage' ); ?></button>
</form>
