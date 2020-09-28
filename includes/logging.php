<?php
/**
 * Logging utilities
 *
 * @package   OpinionStageWordPressPlugin
 */

defined( 'ABSPATH' ) || die(); // block direct access to plugin PHP files.

/**
 * Logging function, should be used with care, users dislike debug/error messages
 *
 * If WordPress has debugging enabled, this function will output messages to
 * WP_DEBUG_LOG ( usually wp-contents/debug.log file)
 *
 * @param string $message message to log.
 */
function opinionstage_error_log( $message ) {
	if ( ! defined( 'WP_DEBUG' ) || true !== WP_DEBUG ) {
		return;
	}

	global $wp;
	// phpcs:disable WordPress.Security.ValidatedSanitizedInput.MissingUnslash, WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	$uri = is_object( $wp ) ? home_url( $wp->request ) : isset( $_SERVER['REQUEST_URI'] ) ? $_SERVER['REQUEST_URI'] : 'unknown';
	// phpcs:enable

	// phpcs:disable WordPress.PHP.DevelopmentFunctions
	error_log( '[opinionstage plugin] ' . $message . " ($uri)" );
	// phpcs:enable
}