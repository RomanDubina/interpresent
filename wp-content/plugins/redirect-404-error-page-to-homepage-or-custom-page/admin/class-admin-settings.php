<?php
/**
 * Created
 * User: alan
 * Date: 04/04/18
 * Time: 13:45
 */

namespace Redirect_404_Error_Page_To_Homepage_Or_Custom_Page\Admin;

use Freemius;
use Redirect_404_Error_Page_To_Homepage_Or_Custom_Page\Includes\Core;


class Admin_Settings extends Admin_Pages {

	protected $settings_page;
	protected $settings_page_id = 'toplevel_page_redirect-404-error-page-to-homepage-or-custom-page';
	// protected $settings_page_id = 'settings_page_redirect-404-error-page-to-homepage-or-custom-page-settings';
	protected $option_group = 'redirect-404-error-page-to-homepage-or-custom-page';
	protected $settings_title;

	/**
	 * Settings constructor.
	 *
	 * @param string $plugin_name
	 * @param string $version plugin version.
	 * @param Freemius $freemius Freemius SDK.
	 */

	public function __construct( $plugin_name, $version, $freemius ) {
		$this->plugin_name = $plugin_name;
		$this->version     = $version;
		$this->freemius    = $freemius;


		$this->settings_title = esc_html__( 'Redirect 404', 'redirect-404-error-page-to-homepage-or-custom-page' );
		parent::__construct();
	}

	public function register_settings() {
		/* Register our setting. */
		register_setting(
			$this->option_group,                         /* Option Group */
			'redirect-404-error-page-to-homepage-or-custom-page-settings',                   /* Option Name */
			array( $this, 'sanitize_settings' )          /* Sanitize Callback */
		);
		register_setting(
			$this->option_group,                         /* Option Group */
			'redirect-404-error-page-to-homepage-or-custom-page-log',                   /* Option Name */
			array( $this, 'sanitize_log' )          /* Sanitize Callback */
		);


		/* Add settings menu page */

		$this->settings_page = add_submenu_page(
			'redirect-404-error-page-to-homepage-or-custom-page',
			'Settings', /* Page Title */
			'Settings',                       /* Menu Title */
			'manage_options',                 /* Capability */
			'redirect-404-error-page-to-homepage-or-custom-page',                         /* Page Slug */
			array( $this, 'settings_page' )          /* Settings Page Function Callback */
		);

		register_setting(
			$this->option_group,                         /* Option Group */
			"{$this->option_group}-reset",                   /* Option Name */
			array( $this, 'reset_sanitize' )          /* Sanitize Callback */
		);

	}


	public function delete_options() {
		update_option( 'redirect-404-error-page-to-homepage-or-custom-page-settings', self::option_defaults( 'redirect-404-error-page-to-homepage-or-custom-page-settings' ) );
		update_option( 'redirect-404-error-page-to-homepage-or-custom-page-log', self::option_defaults( 'redirect-404-error-page-to-homepage-or-custom-page-log' ) );
		$options = Core::get_option( 'redirect-404-error-page-to-homepage-or-custom-page-log' );
	}

	public static function option_defaults( $option ) {
		switch ( $option ) {
			case 'redirect-404-error-page-to-homepage-or-custom-page-settings':
				return array(
					// set defaults
					'pageid' => 0,
					'type'   => '301',
				);
			case 'redirect-404-error-page-to-homepage-or-custom-page-log':
				return array(
					// set defaults
					'log'            => 0,
					'days'           => 60,
					'ignoreredirect' => 0,
				);
			default:
				return false;
		}
	}

	public function add_meta_boxes() {
		add_meta_box(
			'settings-1',                  /* Meta Box ID */
			__( 'Information', 'redirect-404-error-page-to-homepage-or-custom-page' ),               /* Title */
			array( $this, 'meta_box_information' ),  /* Function Callback */
			$this->settings_page_id,               /* Screen: Our Settings Page */
			'normal',                 /* Context */
			'default'                 /* Priority */
		);
		add_meta_box(
			'settings-2',                  /* Meta Box ID */
			__( 'Redirect Settings', 'redirect-404-error-page-to-homepage-or-custom-page' ),               /* Title */
			array( $this, 'meta_box_settings' ),  /* Function Callback */
			$this->settings_page_id,               /* Screen: Our Settings Page */
			'normal',                 /* Context */
			'default'                 /* Priority */
		);
		add_meta_box(
			'settings-3',                  /* Meta Box ID */
			__( '404 Log Settings', 'redirect-404-error-page-to-homepage-or-custom-page' ),               /* Title */
			array( $this, 'meta_box_logs' ),  /* Function Callback */
			$this->settings_page_id,               /* Screen: Our Settings Page */
			'normal',                 /* Context */
			'default'                 /* Priority */
		);


	}

	public function meta_box_information() {
		?>
        <table class="form-table">
            <tbody>
            <tr valign="top" class="alternate">
                <th scope="row"><?php esc_html_e( 'Welcome', 'redirect-404-error-page-to-homepage-or-custom-page' ); ?></th>

                <td>
                    <p>
						<?php esc_html_e( 'This plugin can be configured to redirect missing pages (404) to either the home page or a custom page as required', 'redirect-404-error-page-to-homepage-or-custom-page' ); ?>
                    </p>
                    <p>
						<?php esc_html_e( 'This is very useful if your site has been undergoing changes and Google still have pages that have gone in the index, this way you visitors will not get the standard 404 page, and educate Google that the missing pages are now the home page or custom page as required.', 'redirect-404-error-page-to-homepage-or-custom-page' ); ?>
                    </p>
                    <p>
						<?php esc_html_e( 'Or, if you have an ugly 404 page, you can now add a page as a custom error page and set the return code to 404 instead.', 'redirect-404-error-page-to-homepage-or-custom-page' ); ?>
                    </p>

                    <p>
						<?php printf( esc_html__( 'If you turn on logging below - your 404 logs are %shere%s', 'redirect-404-error-page-to-homepage-or-custom-page' ), '<a href="' . menu_page_url( 'redirect-404-error-page-to-homepage-or-custom-page-404-log-report', false ) . '">', '</a>' ); ?>
                    </p>

                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><?php esc_html_e( 'Support', 'redirect-404-error-page-to-homepage-or-custom-page' ); ?></th>
                <td>
					<?php echo '<a class="button-secondary"
                                href="https://wordpress.org/support/plugin/redirect-404-error-page-to-homepage-or-custom-page/" target="_blank">' . esc_html__( 'WordPress.org support forum', 'redirect-404-error-page-to-homepage-or-custom-page' ) . '</a>'; ?>
                </td>
            </tr>
            </tbody>
        </table>
		<?php
	}

	public function sanitize_settings( $settings ) {

		if ( isset( $settings['pageid'] ) && ( 0 == $settings['pageid'] ) && ( isset( $settings['type'] ) && 404 == $settings['type'] ) ) {
			add_settings_error( 'redirect-404-error-page-to-homepage-or-custom-page-settings',
				'redirect-404-error-page-to-homepage-or-custom-page-settings',
				__( 'Cant set home page to return a 404 code that would be a bad idea', 'redirect-404-error-page-to-homepage-or-custom-page' ),
				'error' );
			$settings['type'] = 301;
		}

		return $settings;
	}

	public function sanitize_log( $settings ) {

		if ( ! isset( $settings['log'] ) ) {
			$settings['log'] = 0;
		}
		if ( ! isset( $settings['ignoreredirect'] ) ) {
			$settings['ignoreredirect'] = 0;
		}

		return $settings;
	}


	public function meta_box_settings() {
		?>
		<?php
		$options = Core::get_option( 'redirect-404-error-page-to-homepage-or-custom-page-settings' );
		?>
        <table class="form-table">
            <tbody>
            <tr valign="top">
                <th scope="row"><?php esc_html_e( 'Redirect to', 'redirect-404-error-page-to-homepage-or-custom-page' ); ?></th>
                <td>
                    <label for="redirect-404-error-page-to-homepage-or-custom-page-settings[pageid]">
						<?php wp_dropdown_pages( array(
							'name'              => 'redirect-404-error-page-to-homepage-or-custom-page-settings[pageid]',
							'selected'          => $options['pageid'],
							'show_option_none'  => '- Home Page -',
							'option_none_value' => 0
						) ); ?>

						<?php esc_html_e( ' Page', 'redirect-404-error-page-to-homepage-or-custom-page' ); ?></label>
                </td>
            </tr>
            <tr valign="top" class="alternate">
                <th scope="row"><?php esc_html_e( 'Redirect Type', 'redirect-404-error-page-to-homepage-or-custom-page' ); ?></th>
                <td>
                    <input type="radio" name="redirect-404-error-page-to-homepage-or-custom-page-settings[type]"
                           value="301"<?php checked( '301' == $options['type'] ); ?> /> 301
                    <input type="radio" name="redirect-404-error-page-to-homepage-or-custom-page-settings[type]"
                           value="302"<?php checked( '302' == $options['type'] ); ?> /> 302
                    <input type="radio" name="redirect-404-error-page-to-homepage-or-custom-page-settings[type]"
                           value="404"<?php checked( '404' == $options['type'] ); ?> /> 404
                    <p>
                        <span class="description">
		                <?php printf( esc_html__( 'Only use 404 if you have written a custom page specifically for 404s. If you need more info on 301 vs 302 redirect, read the %s SEO blog %s article.', 'redirect-404-error-page-to-homepage-or-custom-page' ), '<a href="https://www.seoblog.com/2018/02/difference-301-302-redirect/" target="_blank">', '</a>' ); ?>
                        </span>
                    </p>
                </td>
            </tr>


            </tbody>
        </table>
		<?php
	}

	public function meta_box_logs() {

		$disabled = '';
		$options  = Core::get_option( 'redirect-404-error-page-to-homepage-or-custom-page-log' );
		?>

        <table class="form-table">
            <tbody>

            <tr valign="top">
                <th scope="row"><?php esc_html_e( 'Log', 'redirect-404-error-page-to-homepage-or-custom-page' ); ?></th>
                <td>
                    <label for="redirect-404-error-page-to-homepage-or-custom-page-log[log]"><input type="checkbox"
                                                                                                    name="redirect-404-error-page-to-homepage-or-custom-page-log[log]"
                                                                                                    id="redirect-404-error-page-to-homepage-or-custom-page-log[log]"
                                                                                                    value="1"
							<?php checked( '1', $options['log'] );
							echo esc_attr( $disabled ); ?>>
						<?php esc_html_e( 'Enable logging of 404 errors', 'redirect-404-error-page-to-homepage-or-custom-page' ); ?>
                    </label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><?php esc_html_e( 'Do not redirect', 'redirect-404-error-page-to-homepage-or-custom-page' ); ?></th>
                <td>
                    <label for="redirect-404-error-page-to-homepage-or-custom-page-log[ignoreredirect]"><input
                                type="checkbox"
                                name="redirect-404-error-page-to-homepage-or-custom-page-log[ignoreredirect]"
                                id="redirect-404-error-page-to-homepage-or-custom-page-log[ignoreredirect]"
                                value="1"
							<?php checked( '1', $options['ignoreredirect'] );
							echo esc_attr( $disabled ); ?>>
						<?php esc_html_e( 'Tick this if you want the plugin redirect settings to be IGNORED, any only log 404s', 'redirect-404-error-page-to-homepage-or-custom-page' ); ?>
                    </label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row"><?php esc_html_e( 'Log history', 'redirect-404-error-page-to-homepage-or-custom-page' ); ?></th>
                <td>
                    <label for="redirect-404-error-page-to-homepage-or-custom-page-log[days]"><input type="number"
                                                                                                     name="redirect-404-error-page-to-homepage-or-custom-page-log[days]"
                                                                                                     id="redirect-404-error-page-to-homepage-or-custom-page-log[days]"
                                                                                                     class="small-text"
                                                                                                     value="<?php echo $options['days']; ?>"
                                                                                                     min="0"
							<?php echo esc_attr( $disabled ); ?>
                        >
						<?php esc_html_e( 'Days', 'redirect-404-error-page-to-homepage-or-custom-page' ); ?></label>
                    <p>
                        <span class="description"><?php esc_html_e( 'Select the number of days to keep 404 log history', 'redirect-404-error-page-to-homepage-or-custom-page' ); ?></span>
                    </p>
                </td>
            </tr>


            </tbody>
        </table>
		<?php
	}


}

