<?php
/*
Plugin Name:  Disallow Indexing
Plugin URI:   https://roots.io/bedrock/
Description:  Disallow indexing of your site on non-production environments.
Version:      1.0.0
Author:       Roots
Author URI:   https://roots.io/
License:      MIT License
*/

if (WP_ENV !== 'production' && !is_admin()) {
    add_action('pre_option_blog_public', '__return_zero');
}

add_action('theme_root_uri', function() {
	return WP_HOME;
});

function isopress_change_theme_root() {
	return apply_filters( 'isopress_change_theme_root', ABSPATH . '..' );
}
add_filter( 'theme_root', 'isopress_change_theme_root' );

function isopress_change_theme() {
	return apply_filters( 'isopress_change_theme', 'app' );
}
add_filter( 'template', 'isopress_change_theme' );
add_filter( 'option_template', 'isopress_change_theme' );
add_filter( 'option_stylesheet', 'isopress_change_theme' );
add_filter( 'stylesheet', 'isopress_change_theme' );

function isopress_hide_themes_menu() {
	remove_submenu_page( 'themes.php', 'themes.php' );
	remove_submenu_page( 'themes.php', 'theme-editor.php' );
	remove_submenu_page( 'themes.php', 'theme_options' );
}
add_action( 'admin_menu', 'isopress_hide_themes_menu' );

