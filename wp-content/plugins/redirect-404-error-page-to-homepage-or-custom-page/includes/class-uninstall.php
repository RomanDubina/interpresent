<?php


/**
 * Fired during plugin uninstall.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 */

namespace Redirect_404_Error_Page_To_Homepage_Or_Custom_Page\Includes;

class Uninstall {

	/**
	 * Uninstall specific code
	 */
	public static function uninstall() {
		global $wpdb;
		global $redirect_404_error_page_to_homepage_or_custom_page_fs;
		$table_name = $wpdb->prefix . 'redirect_404_hp_cp_log';
		$sql        = "DROP TABLE IF EXISTS " . $table_name;
		$wpdb->query( $sql );


		delete_option( "redirect-404-error-page-to-homepage-or-custom-page_db_version" );
		// Cron
		wp_clear_scheduled_hook( 'redirect_404_hp_cp' );

		delete_option( 'redirect-404-error-page-to-homepage-or-custom-page-settings' );
		delete_option( 'redirect-404-error-page-to-homepage-or-custom-page-log' );
	}

}
