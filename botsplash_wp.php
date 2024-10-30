<?php

/*
  Plugin Name: Botsplash Chat
  Plugin URI: https://botsplash.com/integrations/wordpress.html
  Description: Installs botsplash chat to engage with your customers over chat platforms
  Version: 1.0.1
  Author: botsplash.com
  Author URI: https://botsplash.com/
  License: GPL2
  License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

defined ( 'ABSPATH' ) or die ( 'This is not a wordpress site!' );

if ( !defined( 'BOTSPLASH_WP_PATH' ) ) {
	define( 'BOTSPLASH_WP_PATH', dirname( __FILE__ ) );
}

/*
 * The installation routines that are run when the plugin is activated
 *
 * @package Botsplash Chat
 * @subpackage Botsplash Chat Controller
 * @since 1.0.0
 */

function botsplash_wp_activate() {
	add_option( 'botsplash_wp_options', array( 'appId' => '' ) );
	register_deactivation_hook( __FILE__, 'botsplash_wp_deactivate' );
	register_uninstall_hook( __FILE__, 'botsplash_wp_uninstall' );
}
register_activation_hook( __FILE__, 'botsplash_wp_activate' );

/*
 * The uninstall routines that are run when the plugin is deleted
 *
 * @package Botsplash Chat
 * @subpackage Botsplash Chat Controller
 * @since 1.0.0
 */

function botsplash_wp_deactivate() {
	unregister_setting( 'botsplash_wp_option_group', 'botsplash_wp_options' );
}

function botsplash_wp_uninstall() {
	delete_option( 'botsplash_wp_options' );
}

// Add a settings link to the right of the activate and deactivate links on the plugin page
function botsplash_wp_settings_link( $links ) {
	$settings_link = array( '<a href="' . admin_url( 'options-general.php?page=botsplash_wp_admin' ) . '">Settings</a>', );
	return array_merge( $settings_link, $links );
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'botsplash_wp_settings_link' );

// Include the controller class
require_once( 'classes/botsplash_wp_controller.php' );

// Instantiate the controller to begin configuration in the class constructor
$startControl = new BotsplashWPController;

?>
