<?php
/**
 * Plugin Name: Tables For Elementor
 * Description: Create Feature rich tables for the Elementor Page Builder plugin.
 * Plugin URI: https://wpdevhq.com/
 * Author: WPDevHQ
 * Version: 1.0.0
 * Author URI: https://wpdevhq.com/
 *
 * Text Domain: elementor-tables
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

define( 'ELEMENTOR_TABLES_VERSION', '1.0.0' );

define( 'ELEMENTOR_TABLES__FILE__', __FILE__ );
define( 'ELEMENTOR_TABLES_PLUGIN_BASE', plugin_basename( ELEMENTOR_TABLES__FILE__ ) );
define( 'ELEMENTOR_TABLES_PATH', plugin_dir_path( ELEMENTOR_TABLES__FILE__ ) );
define( 'ELEMENTOR_TABLES_MODULES_PATH', ELEMENTOR_TABLES_PATH . 'modules/' );
define( 'ELEMENTOR_TABLES_URL', plugins_url( '/', ELEMENTOR_TABLES__FILE__ ) );
define( 'ELEMENTOR_TABLES_ASSETS_URL', ELEMENTOR_TABLES_URL . 'assets/' );
define( 'ELEMENTOR_TABLES_MODULES_URL', ELEMENTOR_TABLES_URL . 'modules/' );

/**
 * Load gettext translate for our text domain.
 *
 * @since 1.0.0
 *
 * @return void
 */
function elementor_tables_load_plugin() {
	load_plugin_textdomain( 'elementor-tables' );

	if ( ! did_action( 'elementor/loaded' ) ) {
		add_action( 'admin_notices', 'elementor_tables_fail_load' );
		return;
	}

	$elementor_version_required = '1.0.6';
	if ( ! version_compare( ELEMENTOR_VERSION, $elementor_version_required, '>=' ) ) {
		add_action( 'admin_notices', 'elementor_tables_fail_load_out_of_date' );
		return;
	}

	require( ELEMENTOR_TABLES_PATH . 'plugin.php' );
}
add_action( 'plugins_loaded', 'elementor_tables_load_plugin' );

/**
 * Show in WP Dashboard notice about the plugin is not activated.
 *
 * @since 1.0.0
 *
 * @return void
 */
function elementor_tables_fail_load() {
	$screen = get_current_screen();
	if ( isset( $screen->parent_file ) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id ) {
		return;
	}

	$plugin = 'elementor/elementor.php';

	if ( _is_elementor_installed() ) {
		if ( ! current_user_can( 'activate_plugins' ) ) {
			return;
		}

		$activation_url = wp_nonce_url( 'plugins.php?action=activate&amp;plugin=' . $plugin . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $plugin );

		$message = '<p>' . __( 'Elementor Tables is not working because you need to activate the Elementor plugin.', 'elementor-tables' ) . '</p>';
		$message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $activation_url, __( 'Activate Elementor Now', 'elementor-tables' ) ) . '</p>';
	} else {
		if ( ! current_user_can( 'install_plugins' ) ) {
			return;
		}

		$install_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=elementor' ), 'install-plugin_elementor' );

		$message = '<p>' . __( 'Elementor Tables is not working because you need to install the Elemenor plugin', 'elementor-tables' ) . '</p>';
		$message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $install_url, __( 'Install Elementor Now', 'elementor-tables' ) ) . '</p>';
	}

	echo '<div class="error"><p>' . $message . '</p></div>';
}

function elementor_tables_fail_load_out_of_date() {
	if ( ! current_user_can( 'update_plugins' ) ) {
		return;
	}

	$file_path = 'elementor/elementor.php';

	$upgrade_link = wp_nonce_url( self_admin_url( 'update.php?action=upgrade-plugin&plugin=' ) . $file_path, 'upgrade-plugin_' . $file_path );
	$message = '<p>' . __( 'Elementor Tables is not working because you are using an old version of Elementor.', 'elementor-tables' ) . '</p>';
	$message .= '<p>' . sprintf( '<a href="%s" class="button-primary">%s</a>', $upgrade_link, __( 'Update Elementor Now', 'elementor-tables' ) ) . '</p>';

	echo '<div class="error">' . $message . '</div>';
}

if ( ! function_exists( '_is_elementor_installed' ) ) {

	function _is_elementor_installed() {
		$file_path = 'elementor/elementor.php';
		$installed_plugins = get_plugins();

		return isset( $installed_plugins[ $file_path ] );
	}
}

add_action( 'wp_enqueue_scripts', 'enqueue_tables_style' );
function enqueue_tables_style() {
	wp_enqueue_style( 'show-tables', plugin_dir_url( __FILE__ ) . 'assets/css/tables.css', array() );
}