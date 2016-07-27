<?php

/**
 * Plugin Name: WordPeak
 * Description: Modern WordPress stack.
 * Version: 1.0.0
 * Author: Fredrik Forsmo
 * Author URI: https://frozzare.com/
 * License: MIT License
 */

$files = [
	'bedrock.php',
	'functions.php',
	'plugins.php',
];

// Use different theme directory if multiple themes.
if ( file_exists( __DIR__ . './web/themes' ) && is_dir( __DIR__ . '/../web/themes' ) ) {
	register_theme_directory( ABSPATH . '../themes' );
} else {
	$files[] = 'theme.php';
	register_theme_directory( ABSPATH . '../app' );
}

// Load all files.
foreach ( $files as $file ) {
	if ( file_exists( __DIR__ . '/' . $file ) ) {
		require_once __DIR__ . '/' . $file;
	}
}

unset( $file );
