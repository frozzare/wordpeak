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

global $wp_theme_directories;

// Use different theme directory if multiple themes.
if ( file_exists( ABSPATH . '../themes' ) && is_dir( ABSPATH . '../themes' ) ) {
	$files[] = 'themes.php';
	$wp_theme_directories = [ABSPATH . '../themes', ABSPATH . '../themes'];
} else {
	$files[] = 'theme.php';
	$wp_theme_directories = [ABSPATH . '../', ABSPATH . '../app'];
}

// Load all files.
foreach ( $files as $file ) {
	if ( file_exists( __DIR__ . '/' . $file ) ) {
		require_once __DIR__ . '/' . $file;
	}
}

unset( $file );
