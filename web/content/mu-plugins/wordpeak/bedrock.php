<?php

namespace WordPeak;

/**
 * Fix network admin URL to include the "/wp/" base.
 *
 * @see https://core.trac.wordpress.org/ticket/23221
 *
 * @param  string $url
 *
 * @return string
 */
function bedrock_wp_directory( $url ) {
	$urls_to_fix = [
		'/wp-admin',
		'/wp-login.php',
		'/wp-activate.php',
		'/wp-signup.php',
	];

	foreach ( $urls_to_fix as $maybe_fix_url ) {
		$fixed_wp_url = '/wp' . $maybe_fix_url;

		if ( false !== stripos( $url, $maybe_fix_url ) && false === stripos( $url, $fixed_wp_url ) ) {
			$url = str_replace( $maybe_fix_url, $fixed_wp_url, $url );
		}
	}

	return $url;
}

add_filter( 'network_site_url', __NAMESPACE__ . '\\bedrock_wp_directory', 99 );
add_filter( 'site_url', __NAMESPACE__ . '\\bedrock_wp_directory', 99 );
add_filter( 'admin_url', __NAMESPACE__ . '\\bedrock_wp_directory', 99 );
add_filter( 'network_admin_url', __NAMESPACE__ . '\\bedrock_wp_directory', 99 );
