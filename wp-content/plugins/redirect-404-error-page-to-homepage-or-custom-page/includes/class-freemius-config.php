<?php
/**
 * Class to load freemius configuration
 */

namespace Redirect_404_Error_Page_To_Homepage_Or_Custom_Page\Includes;


class Freemius_Config {

	public function init() {
		global $redirect_404_error_page_to_homepage_or_custom_page_fs;

		if ( ! isset( $redirect_404_error_page_to_homepage_or_custom_page_fs ) ) {
			// Include Freemius SDK.
			require_once dirname( __FILE__ ) . '/vendor/freemius/wordpress-sdk/start.php';

			$redirect_404_error_page_to_homepage_or_custom_page_fs = fs_dynamic_init( array(
				'id'             => '2390',
				'slug'           => 'redirect-404-error-page-to-homepage-or-custom-page',
				'type'           => 'plugin',
				'public_key'     => 'pk_05d75331403f317e45a581145897b',
				'is_premium'     => false,
				'has_addons'     => false,
				'has_paid_plans' => false,
				'menu'           => array(
					'slug'    => 'redirect-404-error-page-to-homepage-or-custom-page',
					'support' => false,
					'contact' => false,
				),
			) );

		}

		return $redirect_404_error_page_to_homepage_or_custom_page_fs;
	}

}
