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

// Add theme modify file if not multiple themes.
if ( ! defined( 'WORDPEAK_MULTIPLE_THEMES' ) || ! WORDPEAK_MULTIPLE_THEMES ) {
	$files[] = 'theme.php';
}

// Load all files.
foreach ( $files as $file ) {
	if ( file_exists( __DIR__ . '/' . $file ) ) {
		require_once __DIR__ . '/' . $file;
	}
}

unset( $file );
