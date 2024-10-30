<?php
/*
 * The Main Plugin Model
 *
 * @package Botsplash Chat
 * @subpackage Botsplash Chat Model
 *
 * @since 1.0.0
 */

if ( !class_exists( 'botsplashModel' ) )
{
	/*
	 * The Model Class in the MVC Architecture
	 *
	 * @package Botsplash Chat
	 * @subpackage Botsplash Chat Model
	 * @since 1.0.0
	 */

	class botsplashModel
	{

		/*
		 * Allocate storage for the APP ID
		 *
		 * @package Botsplash Chat
		 * @subpackage Botsplash Chat Model
		 * @since 1.0.0
		 *
		 * @var string
		 */

		private $appId = '';

		/*
		 * The Class Constructor
		 *
		 * @package Botsplash Chat
		 * @subpackage Botsplash Chat Model
		 * @since 1.0.0
		 */

		public function __construct()
		{
			// Get the option value from the database
			// array( 'appId' => 'value' )

			$options = get_option( 'botsplash_wp_options' );
			$this->set_appId( $options[ 'appId' ] );
		}

		/*
		 * Setter for the appId
		 *
		 * @package Botsplash Chat
		 * @subpackage Botsplash Chat Model
		 * @since 1.0.0
		 *
		 * @param $string
		 */

		public function set_appId( $newAppId )
		{
			$this->appId = $newAppId;
		}

		/*
		 * Getter for the appId
		 *
		 * @package Botsplash Chat
		 * @subpackage Botsplash Chat Model
		 * @since 1.0.0
		 *
		 * @return $string
		 */

		public function get_appId()
		{
			return $this->appId;
		}
	}
}
