<?php

namespace Opinionstage\Infrastructure;

defined( 'ABSPATH' ) || die();

class Helper {

    public static function is_user_logged_in() {
        $os_options = (array) get_option( OPINIONSTAGE_OPTIONS_KEY );
        return isset( $os_options['uid'] ) && isset( $os_options['email'] );
    }

    public static function get_user_access_token() {
        $os_options = self::get_opinionstage_option();

        if ( isset( $os_options['token'] ) ) {
            return $os_options['token'];
        } else {
            return null;
        }
    }

    public static function get_opinionstage_option() {
        return (array) get_option( OPINIONSTAGE_OPTIONS_KEY );
    }

    public static function is_my_items_admin_page() {
        if( ! function_exists( 'get_current_screen' ) ) {
            return false;
        }

        $current_screen = get_current_screen();
        return $current_screen->id === 'toplevel_page_opinionstage-settings';
    }

	function generate_template_url( $path ) {
		return add_query_arg(
			OPINIONSTAGE_UTM_PARAMETERS,
			OPINIONSTAGE_SERVER_BASE . '/templates/' . $path
		);
	}
}
