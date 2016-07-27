<?php

namespace WordPeak;

/**
 * Change theme root uri to themes uri.
 *
 * @return string
 */
add_action( 'theme_root_uri', function() {
	return apply_filters( 'wordpeak_themes_root_uri', WP_HOME . '/themes' );
} );

/**
 * Change theme root path to web themes directory.
 *
 * @return string
 */
function themes_root() {
	return apply_filters( 'wordpeak_themes_root', ABSPATH . '../themes' );
}
add_filter( 'theme_root', __NAMESPACE__ . '\\themes_root' );
add_filter( 'option_template_root', __NAMESPACE__ . '\\themes_root' );
add_filter( 'option_stylesheet_root', __NAMESPACE__ . '\\themes_root' );
