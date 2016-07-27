<?php

namespace WordPeak\Plugins;

// Plugins that should be registered.
$plugins = [
	'foundation/foundation.php'
];

/**
 * Add or remove plugins that should be loaded.
 *
 * @param  array $plugins
 *
 * @return array
 */
$plugins = apply_filters( 'wordpeak_plugins', $plugins );
$plugins = is_array( $plugins ) ? $plugins : [];

foreach ( $plugins as $plugin ) {
	$path = $plugin;

	if ( strpos( $plugin, '/' ) !== 0 ) {
		$path = ABSPATH . '../' . $plugin;
	}

	$path = realpath( $path );

	wp_register_plugin_realpath( $path );

	require $path;
}
