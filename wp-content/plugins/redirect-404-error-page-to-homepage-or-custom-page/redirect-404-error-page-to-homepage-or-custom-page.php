<?php

/**
 *
 *
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 *
 * Plugin Name:       Redirect 404 Error Page to Homepage or Custom Page
 * Plugin URI:        http://fullworks.net/wordpress-plugins/redirect-404-error-page-to-homepage-or-custom-page/
 * Description:       Easily redirect 404 error page to homepage or Custom page URL with 404 logs
 * Version:           1.7.8
 * Author:            Fullworks
 * Author URI:        http://fullworks.net/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       redirect-404-error-page-to-homepage-or-custom-page
 * Domain Path:       /languages
 *
 *
 *
 * @package redirect-404-error-page-to-homepage-or-custom-page
 */

namespace Redirect_404_Error_Page_To_Homepage_Or_Custom_Page;

use Freemius;
use Redirect_404_Error_Page_To_Homepage_Or_Custom_Page\Includes\Core;
use Redirect_404_Error_Page_To_Homepage_Or_Custom_Page\Includes\Freemius_Config;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
if ( ! function_exists( 'Redirect_404_Error_Page_To_Homepage_Or_Custom_Page\run_Redirect_404_Error_Page_To_Homepage_Or_Custom_Page' ) ) {
	define( 'REDIRECT_404_ERROR_PAGE_TO_HOMEPAGE_OR_CUSTOM_PAGE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
	define( 'REDIRECT_404_ERROR_PAGE_TO_HOMEPAGE_OR_CUSTOM_PAGE_PLUGIN_VERSION', '1.7.8' );
	define( 'REDIRECT_404_ERROR_PAGE_TO_HOMEPAGE_OR_CUSTOM_PAGE_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

// Include the autoloader so we can dynamically include the classes.
	require_once REDIRECT_404_ERROR_PAGE_TO_HOMEPAGE_OR_CUSTOM_PAGE_PLUGIN_DIR . 'includes/autoloader.php';

	/**
	 * Begins execution of the plugin.
	 */
	function run_Redirect_404_Error_Page_To_Homepage_Or_Custom_Page() {
		/**
		 *  Load freemius SDK
		 */
		$freemius = new Freemius_Config();
		$freemius = $freemius->init();
		// Signal that SDK was initiated.
		do_action( 'redirect_404_error_page_to_homepage_or_custom_page_fs_loaded' );

		/**
		 * The code that runs during plugin activation.
		 * This action is documented in includes/class-activator.php
		 */
		register_activation_hook( __FILE__, array(
			'\Redirect_404_Error_Page_To_Homepage_Or_Custom_Page\Includes\Activator',
			'activate'
		) );


		/**
		 * The code that runs during plugin uninstall.
		 * This action is documented in includes/class-uninstall.php
		 * * use freemius hook
		 *
		 * @var Freemius $freemius freemius SDK.
		 */
		$freemius->add_action( 'after_uninstall', array(
			'\Redirect_404_Error_Page_To_Homepage_Or_Custom_Page\Includes\Uninstall',
			'uninstall'
		) );
		/**
		 * The core plugin class that is used to define internationalization,
		 * admin-specific hooks, and public-facing site hooks.
		 */
		$plugin = new Core( $freemius );
		$plugin->run();
	}

	run_Redirect_404_Error_Page_To_Homepage_Or_Custom_Page();
} else {
	die( esc_html__( 'Cannot execute as the plugin already exists, if you have a free version installed deactivate that and try again', 'redirect-404-error-page-to-homepage-or-custom-page' ) );
}

