<?php

namespace WordPeak;

/**
 * Add theme cache value.
 *
 * @param  string $key
 * @param  mixed  $value
 */
function cache_add( $key, $value ) {
	global $wp_object_cache;

	$object_cache = isset( $wp_object_cache ) && isset( $wp_object_cache->global_prefix );
	$cache_prefix = '';
	$blog_prefix  = '';

	// Get global cache prefix if it exists.
	if ( $object_cache ) {
		$cache_prefix = $wp_object_cache->global_prefix;

		// Since we only have one theme we don't need a blog prefix for this key.
		$blog_prefix = $wp_object_cache->blog_prefix;
		$wp_object_cache->blog_prefix = '';
	}

	// Add theme information to the cache.
	wp_cache_add( $key . '-' . md5( ABSPATH . '../' . theme_name() ), $value, $cache_prefix . 'themes' );

	// Restore blog prefix if using object cache.
	if ( $object_cache ) {
		$wp_object_cache->blog_prefix = $blog_prefix;
	}
}

/**
 * Get the templates directory.
 *
 * @return string
 */
function templates_directory() {
	$path = sprintf( '%s../%s/templates', ABSPATH, theme_name() );

	return apply_filters( 'wordpeak_templates_directory', $path );
}
add_filter( 'stylesheet_directory', __NAMESPACE__ . '\\templates_directory' );

/**
 * Remove stylesheet directory filter on template include.
 *
 * @param  string $template
 *
 * @return string
 */
add_filter( 'template_include', function ( $template ) {
	remove_filter( 'stylesheet_directory', __NAMESPACE__ . '\\templates_directory' );

	return $template;
} );

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
function theme_root() {
	return apply_filters( 'wordpeak_theme_root', ABSPATH . '..' );
}
add_filter( 'theme_root', __NAMESPACE__ . '\\theme_root' );
add_filter( 'option_template_root', __NAMESPACE__ . '\\theme_root' );
add_filter( 'option_stylesheet_root', __NAMESPACE__ . '\\theme_root' );

/**
 * Change theme name.
 *
 * @return string
 */
function theme_name() {
	return apply_filters( 'wordpeak_theme_name', 'app' );
}
add_filter( 'template', __NAMESPACE__ . '\\theme_name' );
add_filter( 'option_template', __NAMESPACE__ . '\\theme_name' );
add_filter( 'option_stylesheet', __NAMESPACE__ . '\\theme_name' );
add_filter( 'stylesheet', __NAMESPACE__ . '\\theme_name' );

/**
 * Turn of theme validation.
 */
add_filter( 'validate_current_theme', '__return_false' );

/**
 * Add theme cache values.
 */
add_action( 'init', function () {
	// Add theme headers without a stylesheet file.
	cache_add( 'theme', [
		'headers' => apply_filters( 'wordpeak_theme_headers', [
			'Author'      => 'Fredrik Forsmo',
			'AuthorURI'   => 'https://frozzare.com',
			'Description' => 'Just a theme',
			'Name'        => 'Custom theme',
			'Version'     => '1.0.0'
		] ),
		'template' => theme_name(),
		'errors'   => []
	] );
} );

/**
 * Store `WP_Theme` cache persistently. Since only
 * one theme is used this is okey.
 *
 * @param  bool   $cache_expiration
 * @param  string $cache_directory
 *
 * @return bool
 */
add_filter( 'wp_cache_themes_persistently', function( $cache_expiration, $cache_directory ) {
	return $cache_directory === 'WP_Theme' ? true : $cache_expiration;
}, 10, 2 );

/**
 * Prepare themes for JavaScript, add screenshot.
 *
 * @param  array $themes
 *
 * @return array
 */
/**
 * Prepare themes for JavaScript, add screenshot.
 *
 * @param  array $themes
 *
 * @return array
 */
add_filter( 'wp_prepare_themes_for_js', function( $themes ) {
	$path = '/content/screenshot.png';

	if ( file_exists( get_template_directory() . '/screenshot.png' ) ) {
		$path = sprintf( '/%s/screenshot.png', theme_name() );
	}

	$themes[theme_name()]['screenshot'][0] = apply_filters( 'wordpeak_theme_screenshot_uri', $path );

	return $themes;
} );

