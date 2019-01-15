<?php
/**
 * Plugin Name: Contact Form 7 - reCaptcha v2
 * Description: ReCaptcha v2 Fix for Contact Form 7 5.1 and later.
 * Version: 1.1.2
 * Author: IQComputing
 * Author URI: http://www.iqcomputing.com/
 * License: GPL2
 * Text Domain: wpcf7-recaptcha
 * Domain Path: /languages/
 */


defined( 'ABSPATH' ) or die( 'You cannot be here.' );


/**
 * IQComputing Contact Form 7 reCaptcha Fix, Deity Class
 */
Class IQFix_WPCF7_Deity {

	public static $version = '1.1.2';


	/**
	 * Class Registration, set up necessities
	 * 
	 * @return void
	 */
	public static function register() {

		$class = new self();
		$class->include_files();
		$class->action_hooks();

	}

	
	/**
	 * Include any necessary files
	 * 
	 * @return void
	 */
	private function include_files() {

		$selection = WPCF7::get_option( 'iqfix_recaptcha' );

		// Prevent update from v2 to v3 notice.
		WPCF7::update_option( 'recaptcha_v2_v3_warning', false );

		if( empty( $selection ) || version_compare( WPCF7_VERSION, '5.1', '<' ) ) {
			return;
		}

		include_once( plugin_dir_path( __FILE__ ) . 'recaptcha-v2.php' );

	}


	/**
	 * Add any necessary action hooks
	 * 
	 * @return void
	 */
	private function action_hooks() {

		add_action( 'admin_menu', array( $this, 'register_submenus' ) );

	}


	/**
	 * Register submenus for picking ReCaptcha versions
	 * 
	 * @return void
	 */
	public function register_submenus() {

		add_submenu_page( 
			'wpcf7',
			esc_html__( 'reCaptcha Version', 'wpcf7-recaptcha' ),
			esc_html__( 'reCaptcha Version', 'wpcf7-recaptcha' ),
			WPCF7_ADMIN_READ_WRITE_CAPABILITY,
			'recaptcha-version',
			array( $this, 'display_recaptcha_version_subpage' )
		);

	}


	/**
	 * Display reCaptcha version subpage
	 * 
	 * @return void
	 */
	public function display_recaptcha_version_subpage() {

		$updated	= false;
		$selection 	= WPCF7::get_option( 'iqfix_recaptcha' );

		// Update Option
		if( isset( $_POST, $_POST['iqfix_recaptcha_version'], $_POST['iqfix_wpcf7_submit'] ) ) {

			if( ! empty( $_POST['iqfix_wpcf7_nonce'] ) && wp_verify_nonce( $_POST['iqfix_wpcf7_nonce'], 'iqfix_wpcf7_vers_select' ) ) {
				$selection = intval( $_POST['iqfix_recaptcha_version'] );
				WPCF7::update_option( 'iqfix_recaptcha', $selection );
				$updated = true;
			}

		}

		// Show simple message
		if( version_compare( WPCF7_VERSION, '5.1', '<' ) ) {
			printf(
				'<div class="wrap"><h1>%1$s</h1><p>%2$s</p></div>',
				esc_html__( 'Contact Form 7 - reCaptcha v2', 'wpcf7-recaptcha' ),
				esc_html__( 'This version of Contact Form 7 already uses reCaptcha version 2, you do not need \'Contact Form 7 - reCaptcha v2\' installed at this time.', 'wpcf7-recaptcha' )
			);
			return;
		}

		?>

			<div class="wrap">
				<style>
					#iqFacebook		{margin-top: 40px;}
					#iqFacebook a	{display: inline-block; margin-bottom: 12px;}
					#iqFacebook img	{display: block; max-width: 100%; height: auto;}
				</style>

				<?php

					printf( '<h1>%1$s</h1>', esc_html__( 'Contact Form 7 - reCaptcha v2', 'wpcf7-recaptcha' ) );

					if( $updated ) {
						printf(
							'<div class="notice updated"><p>%1$s</p></div>',
							esc_html__( 'Your reCaptcha settings have been updated.', 'wpcf7-recaptcha' )
						);
					}

					printf( '<p>%1$s %2$s <code>[recaptcha]</code> %3$s',
						esc_html__( 'Select the version of reCaptcha you would like to use.', 'wpcf7-recaptcha' ),
						esc_html__( 'You will still need to use the', 'wpcf7-recaptcha' ),
						esc_html__( 'shortcode tag in your Contact Form 7 forms.', 'wpcf7-recaptcha' )
					);
				?>

				<form method="post">
					<?php wp_nonce_field( 'iqfix_wpcf7_vers_select', 'iqfix_wpcf7_nonce' ); ?>
					<select name="iqfix_recaptcha_version">
						<option value="0"><?php esc_html_e( 'Default Usage', 'wpcf7-recaptcha' ); ?></option>
						<option value="2" <?php selected( $selection, 2, true ); ?>><?php esc_html_e( 'reCaptcha Version 2', 'wpcf7-recaptcha' ); ?></option>
					</select>

					<?php submit_button( esc_html__( 'Submit', 'wpcf7-recaptcha' ), 'submit', 'iqfix_wpcf7_submit' ); ?>
				</form>
				
				<div id="iqFacebook">
					<?php
						printf( '<a href="%1$s" target="_blank"><img src="%2$s" width="540" height="410" alt="%3$s" /></a>', 
							esc_url( 'https://www.facebook.com/iqcomputing' ),
							esc_url( trailingslashit( plugin_dir_url( __FILE__ ) ) . 'assets/images/facebook-like.png' ),
							esc_attr__( 'Like IQComputing on Facebook mascot', 'wpcf7-recaptcha' )
						);
						printf( '<p>%1$s %2$s</p>',
							esc_html__( 'Click the image above and like us on Facebook!', 'wpcf7-recaptcha' ),
							esc_html__( 'Facebook is where you will receive the latest news on both this plugin and all future IQComputing plugins.', 'wpcf7-recaptcha' )
						);
					?>
				</div> <!-- id="iqFacebook" -->

			</div>

		<?php

	}


} // END Class IQFix_WPCF7_Deity


/**
 * Initialize Class
 * 
 * @return void
 */
function iqfix_wpcf7_deity_init() {

	if( class_exists( 'WPCF7' ) ) {
		IQFix_WPCF7_Deity::register();
	}

}
add_action( 'plugins_loaded', 'iqfix_wpcf7_deity_init' );


/**
 * Remove upgrade notice from v2 to v3
 * Prevent api keys from being reset.
 * 
 * @return void
 */
function iqfix_wpcf7_upgrade_recaptcha_v2_v3_removal() {

	remove_action( 'wpcf7_upgrade', 'wpcf7_upgrade_recaptcha_v2_v3', 10 );

}
add_action( 'admin_init', 'iqfix_wpcf7_upgrade_recaptcha_v2_v3_removal', 9 );