<?php

namespace Opinionstage\Infrastructure;

defined( 'ABSPATH' ) || die();

use Opinionstage;

class Helper {

    public static function get_template_path($template_name) {
        return Opinionstage::get_instance()->plugin_path . 'templates/' . $template_name . '.php';
    }
    
    public static function get_asset_image_url($image_file_name) {
        return Opinionstage::get_instance()->plugin_url . '/assets/images/' . $image_file_name;
    }

    public static function require_once_if_exists( $file_path) {
        if( file_exists($file_path ) ) {
            require_once $file_path;
        }
    }

    public static function add_php_ext( $file_name ) {
        return $file_name . '.php';
    }

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
}
