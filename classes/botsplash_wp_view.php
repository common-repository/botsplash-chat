<?php
/*
 * The Main Plugin View
 *
 * @package Botsplash Chat
 * @subpackage Botsplash Chat View
 * @since 1.0.0
 */

if ( !class_exists( 'botsplashFooterView' ) ) {
	/*
	 * The Footer View Class in the MVC Architecture
	 * Inserts the App script code block into the footer
	 *
	 * @package Botsplash Chat
	 * @subpackage Botsplash Chat View
	 * @since 1.0.0
	 */

	class botsplashFooterView {
		/*
		 * Method to print the code block html
		 *
		 * @package Botsplash Chat
	 	 * @subpackage Botsplash Chat View
	 	 * @since 1.0.0
	 	 */

		public static function render_code_block( $appId ) {
			require_once( BOTSPLASH_WP_PATH . '/includes/botsplash_wp_code_block.php' );
		}
	}
}


if ( !class_exists( 'botsplashAdminView' ) ) {
	class botsplashAdminView {
		/*
		 * Function to insert the html into the option page
		 *
		 * @package Botsplash Chat
		 * @subpackage Botsplash Chat View
		 * @since 1.0.0
		 */

		public static function render_options_page() {
			// Ensure that only people who are authorised to manage options are allowed to access the page
			if ( !current_user_can( 'manage_options' ) ) {
				wp_die( __( 'You do not have the required privileges to access this page.' ) );
			}

			// All html for this plugin is placed inside inlcude files
			require_once( BOTSPLASH_WP_PATH . '/includes/botsplash_wp_render_options_page.php' );
		}

		/*
		 * Function to insert the html into the App id section
		 *
		 * @package Botsplash Chat
		 * @subpackage Botsplash Chat View
		 * @since 1.0.0
		 */

		public static function render_app_section () {
			require_once ( BOTSPLASH_WP_PATH . '/includes/botsplash_wp_appid_section.php' );
		}

		/*
		 * Function to insert the html into the app id field
		 *
		 * @package Botsplash Chat
		 * @subpackage Botsplash Chat View
		 * @since 1.0.0
		 */

		public static function render_app_field ( $appId ) {
			require_once ( BOTSPLASH_WP_PATH . '/includes/botsplash_wp_appid_field.php' );
		}
	}
}
