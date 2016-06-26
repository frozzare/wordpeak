<?php

namespace WordPeak;

/**
 * Change theme root uri to home uri.
 *
 * @return string
 */
add_action( 'theme_root_uri', function() {
	return apply_filters( 'wordpeak_theme_root_uri', WP_HOME );
} );

/**
 * Change theme root path to web root directory.
 *
 * @return string
 */
add_filter( 'theme_root', function () {
	return apply_filters( 'wordpeak_theme_root', ABSPATH . '/..' );
} );

/**
 * Change theme name.
 *
 * @return string
 */
function theme_name() {
	return apply_filters( 'wordpeak_theme', 'app' );
}
add_filter( 'template', __NAMESPACE__ . '\\theme_name' );
add_filter( 'option_template', __NAMESPACE__ . '\\theme_name' );
add_filter( 'option_stylesheet', __NAMESPACE__ . '\\theme_name' );
add_filter( 'stylesheet', __NAMESPACE__ . '\\theme_name' );

/**
 * Add theme headers information without a stylesheet file.
 */
wp_cache_add( 'theme' . '-' . md5( WPMU_PLUGIN_DIR . '/../../' . theme_name() ), [
	'headers' => apply_filters( 'wordpeak_theme_info', [
		'Author'      => 'Fredrik Forsmo',
		'AuthorURI'   => 'https://frozzare.com',
		'Description' => 'Just a theme',
		'Name'        => 'Custom theme',
		'Version'     => '1.0.0'
	] ),
	'template' => theme_name()
], 'themes' );
