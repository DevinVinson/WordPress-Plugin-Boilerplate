<?php
/**
 * WordPress Plugin Boilerplate Template Functions
 *
 * Functions related to templates.
 *
 * @package  Plugin_Name/Functions
 * @version  1.0.0
 */

use Plugin_Name\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Get template part.
 *
 * @param mixed  $slug Slug of the template to get.
 * @param string $name (default: '') Template name (sub-slug if you will).
 *
 * @return void
 */
function plugin_name_get_template_part( $slug, $name = '' ) {
	$template = '';

	// Look in yourtheme/slug-name.php and yourtheme/plugin-name/slug-name.php .
	if ( $name ) {
		$template = locate_template( array( "{$slug}-{$name}.php", Plugin::instance()->template_path() . "{$slug}-{$name}.php" ) );
	}

	// Get default slug-name.php .
	if ( ! $template && $name && file_exists( Plugin::instance()->plugin_path() . "/templates/{$slug}-{$name}.php" ) ) {
		$template = Plugin::instance()->plugin_path() . "/templates/{$slug}-{$name}.php";
	}

	// If template file doesn't exist, look in yourtheme/slug.php and yourtheme/plugin-name/slug.php .
	if ( ! $template ) {
		$template = locate_template( array( "{$slug}.php", Plugin::instance()->template_path() . "{$slug}.php" ) );
	}

	// Allow 3rd party plugins to filter template file from their plugin.
	$template = apply_filters( 'plugin_name_get_template_part', $template, $slug, $name );

	if ( $template ) {
		load_template( $template, false );
	}
}

/**
 * Get other templates passing attributes and including the file.
 *
 * @param string              $template_name Filename to locate.
 * @param array<string,mixed> $args (default: array()) Args to send to template.
 * @param string              $template_path (default: '') Path to look the template into.
 * @param string              $default_path (default: '') Default path to fallback to.
 *
 * @return void
 */
function plugin_name_get_template( $template_name, $args = array(), $template_path = '', $default_path = '' ) {
	if ( ! empty( $args ) && is_array( $args ) ) {
		// phpcs:ignore WordPress.PHP.DontExtract
		extract( $args );
	}

	$located = plugin_name_locate_template( $template_name, $template_path, $default_path );

	if ( ! file_exists( $located ) ) {
		_doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', $located ), '1.0.0' ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		return;
	}

	// Allow 3rd party plugin filter template file from their plugin.
	$located = apply_filters( 'plugin_name_get_template', $located, $template_name, $args, $template_path, $default_path );

	do_action( 'plugin_name_before_template_part', $template_name, $template_path, $located, $args );

	include $located;

	do_action( 'plugin_name_after_template_part', $template_name, $template_path, $located, $args );
}

/**
 * Like plugin_name_get_template, but returns the HTML instead of outputting.
 *
 * @see plugin_name_get_template
 * @since 2.5.0
 * @param string              $template_name Filename to locate.
 * @param array<string,mixed> $args (default: array()) Args to send to template.
 * @param string              $template_path (default: '') Path to look the template into.
 * @param string              $default_path (default: '') Default path to fallback to.
 * @return string
 */
function plugin_name_get_template_html( $template_name, $args = array(), $template_path = '', $default_path = '' ) {
	ob_start();
	plugin_name_get_template( $template_name, $args, $template_path, $default_path );
	$ret = ob_get_clean();

	return is_bool( $ret ) ? '' : $ret;
}

/**
 * Locate a template and return the path for inclusion.
 *
 * This is the load order:
 *
 *      yourtheme       /   $template_path  /   $template_name
 *      yourtheme       /   $template_name
 *      $default_path   /   $template_name
 *
 * @param string $template_name Filename to locate.
 * @param string $template_path (default: '') Path to look the template into.
 * @param string $default_path (default: '') Default path to fallback to.
 * @return string
 */
function plugin_name_locate_template( $template_name, $template_path = '', $default_path = '' ) {
	if ( ! $template_path ) {
		$template_path = Plugin::instance()->template_path();
	}

	if ( ! $default_path ) {
		$default_path = Plugin::instance()->plugin_path() . '/templates/';
	}

	// Look within passed path within the theme - this is priority.
	$template = locate_template(
		array(
			trailingslashit( $template_path ) . $template_name,
			$template_name,
		)
	);

	// Get default template.
	if ( ! $template ) {
		$template = $default_path . $template_name;
	}

	// Return what we found.
	return apply_filters( 'plugin_name_locate_template', $template, $template_name, $template_path );
}
