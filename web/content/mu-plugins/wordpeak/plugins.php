<?php

namespace WordPeak;

$plugins = [
	'foundation/foundation.php'
];

foreach ( $plugins as $plugin ) {
	$path = ABSPATH . '../' . $plugin;
	$path = realpath( $path );

	wp_register_plugin_realpath( $path );

	require $path;
}
