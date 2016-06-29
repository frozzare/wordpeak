<?php

if ( ! function_exists( 'wp_is_dev' ) ) {
	/**
	 * Check whether currently running a live or dev environment.
	 *
	 * Uses value of `WP_ENV`.
	 *
	 * @return bool
	 */
	function wp_is_dev() {
		return apply_filters( 'wp_is_dev', define( 'WP_ENV' ) && WP_ENV === 'development' );
	}
}
