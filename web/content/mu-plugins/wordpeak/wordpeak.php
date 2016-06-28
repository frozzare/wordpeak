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
	'plugins.php',
	'theme.php',
];

foreach ( $files as $file ) {
	require_once __DIR__ . '/' . $file;
}

unset( $file );
