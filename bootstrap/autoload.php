<?php

/**
 * Register the Composer auto loader.
 */
require_once __DIR__ . '/../vendor/autoload.php';

/**
 * Load the application configuration.
 */
require_once __DIR__ . '/../config/application.php';

/**
 * Register custom theme structure.
 */
global $wp_theme_directories;

// Use different theme directory if multiple themes.
if ( file_exists( __DIR__ . '/../web/themes' ) && is_dir( __DIR__ . '/../web/themes' ) ) {
	$wp_theme_directories = [ABSPATH . '../themes'];
} else {
	$wp_theme_directories = [ABSPATH . '../'];
}
