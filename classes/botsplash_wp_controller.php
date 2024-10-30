<?php
/*
 * The Main Plugin Controller
 *
 * @package Botsplash Chat
 * @subpackage Botsplash Chat Controller
 * @since 1.0.0
 */

if ( !class_exists( 'BotsplashWPController' ) ) {
	/*
	 * The Controller Class in the MVC Architecture
	 *
	 * @package Botsplash Chat
	 * @subpackage Botsplash Chat Controller
	 * @since 1.0.0
	 */

	class BotsplashWPController {
		/*
		 * The Constructor
		 *
		 * @package Botsplash Chat
 		 * @subpackage Botsplash Chat Controller
		 * @since 1.0.0
		 */

		public function __construct() {
			if ( is_admin() ) {
				add_action(
					'admin_menu',
					array( $this, 'options_menu' )
				);

				add_action(
					'admin_init',
					array( $this, 'options_init' )
				);
			}
			else {
				add_action(
					'wp_head',
					array( $this, 'render_header_code' )
				);
			}
		}

		/*
		 * Adds a submenu to the Settings top-level menu
		 *
		 * @package Botsplash Chat
 		 * @subpackage Botsplash Chat Controller
		 * @since 1.0.0
		 */

		public function options_menu() {
			add_options_page(
				'Botsplash Chat',
				'Botsplash Chat',
				'manage_options',
				'botsplash_wp_admin',
				array( $this, 'botsplash_options' )
			);
		}

		/*
		 * Callback { botsplash_wp_menu() } to render the options page
		 *
		 * @package Botsplash Chat
 		 * @subpackage Botsplash Chat Controller
		 * @since 1.0.0
		 */

		public function botsplash_options() {
			// Include the view class file
			require_once( 'botsplash_wp_view.php' );

			// Call a static function from the view class to insert the html
			botsplashAdminView::render_options_page();
		}

		/*
		 * Callback to register to whitelist our options
		 *
		 * @package Botsplash Chat
 		 * @subpackage Botsplash Chat Controller
		 * @since 1.0.0
		 */

		public function options_init () {
			register_setting(
				'botsplash_wp_options_group',
				'botsplash_wp_options',
				array( $this, 'sanitisation' )
			);

			add_settings_section(
				'app_id_section',
				'',
				array( $this, 'render_app_section' ),
				'botsplash_wp_admin'
			);

			add_settings_field(
				'app_id_field',
				'Botsplash App ID:',
				array( $this, 'render_app_field' ),
				'botsplash_wp_admin',
				'app_id_section'
			);
		}

		/*
		 * Sanitise the input to the appid_field
		 *
		 * @package Botsplash Chat
		 * @subpackage Botsplash Chat Controller
		 * @since 1.0.0
		 */

		public function sanitisation ( $input ) {
			$newAppId = array();

      if ( !isset( $input['appId'] ) || empty( $input['appId'] ) || !preg_match( '/^[0-9A-F]{8}-[0-9A-F]{4}-[4][0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i', $input['appId'] )) {

          add_settings_error(
                  'appId',
                  'appId_texterror',
                  'Please enter a valid Botsplash App ID (e.g., 00000000-0000-0000-0000-000000000000)',
                  'error'
          );
      } else {
        $newAppId['appId'] = sanitize_text_field( $input['appId'] );
      }

			return $newAppId;
		}

		/*
		 * Insert the App Id section html
		 *
		 * @package Botsplash Chat
		 * @subpackage Botsplash Chat Controller
		 * @since 1.0.0
		 */

		public function render_app_section () {
			// Include the view class
			require_once ( 'botsplash_wp_view.php' );

			// Call a static function to do the rendering
			botsplashAdminView::render_app_section ();
		}

		/*
		 * Insert the App Id field html
		 *
		 * @package Botsplash Chat
		 * @subpackage Botsplash Chat Controller
		 * @since 1.0.0
		 */

		public function render_app_field () {
			// We need the App Id from the model
			require_once ( 'botsplash_wp_model.php' );
			$model = new botsplashModel;

			// Inlcude the View
			require_once ( 'botsplash_wp_view.php' );

			// Call a static function to do the rendering
			botsplashAdminView::render_app_field ( $model->get_appId () );
		}

		/*
		 * Insert the code block into the footer.
		 *
		 * @package Botsplash Chat
		 * @subpackage Botsplash Chat Controller
		 * @since 1.0.0
		 */

		public function render_header_code()
		{
			// Include the model data
			require_once( 'botsplash_wp_model.php' );

			// Instantiate the model data
			$botsplashModel = new botsplashModel;

			// Get the model data
			$appId = $botsplashModel->get_appId();

			if ( isset ( $appId ) === true && $appId !== '' ) {
				// Include the view
				require_once( 'botsplash_wp_view.php' );

				// Render the code block into the footer
				botsplashFooterView::render_code_block( $appId );
			}
		}
	}
}
