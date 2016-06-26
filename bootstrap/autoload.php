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
$wp_theme_directories = [ABSPATH . '/../'];
