<?php

/**
 * Tells WordPress to load the WordPress theme and output it.
 */
define( 'WP_USE_THEMES', true );

/**
 * Define default theme.
 */
define( 'WP_DEFAULT_THEME', 'app' );

/**
 * Load WordPress.
 */
require __DIR__ . '/wp/wp-blog-header.php';
