<?php
/*
Plugin Name: World Covid 19 stats
Plugin URI: https://viitorcloud.com/blog/
Description: This plugin displays the Coronavirus case data of the whole world.
Version: 1.0.0
Author: Viitorcloud
Author URI:https://viitorcloud.com/
*/    

/**
 * Basic plugin definitions 
 * 
 * @package World Covid 19 stats
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

global $wpdb; 

if( !defined( 'WD_CV19_ST_DIR' ) ) {
	define( 'WD_CV19_ST_DIR', dirname( __FILE__ ) ); // plugin dir
}
if( !defined( 'WD_CV19_ST_URL' ) ) {
	define( 'WD_CV19_ST_URL', plugin_dir_url( __FILE__ ) ); // plugin url
}
if( !defined( 'WD_CV19_ST_DOMAIN' )) {
	define( 'WD_CV19_ST_DOMAIN', 'wd-cv19-st' ); // text domain for languages
}
if( !defined( 'WD_CV19_ST_PLUGIN_URL' ) ) {
	define( 'WD_CV19_ST_PLUGIN_URL', plugin_dir_url( __FILE__ ) ); // plugin url
}
if( !defined( 'WD_CV19_ST_ADMIN_DIR' ) ) {
	define( 'WD_CV19_ST_ADMIN_DIR', WD_CV19_ST_DIR . '/admin' ); // plugin admin dir
}
if( !defined( 'WD_CV19_ST_BASENAME') ) {
	define( 'WD_CV19_ST_BASENAME', 'wd-cv19-st' );
}
//subtitle prefix
if( !defined( 'WD_CV19_ST_META_PREFIX' )) {
	define( 'WD_CV19_ST_META_PREFIX', '_wd-cv19-st_' );
}

/**
 * Load Text Domain
 * 
 * This gets the plugin ready for translation.
 * 
 * @package World Covid 19 stats
 * @since 1.0.0
 */
load_plugin_textdomain( 'wd-cv19-st', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

/**
 * Activation hook
 * 
 * Register plugin activation hook.
 * 
 * @package World Covid 19 stats
 * @since 1.0.0
 */
register_activation_hook( __FILE__, 'wd_cv19_st_install' );

/**
 * Deactivation hook
 *
 * Register plugin deactivation hook.
 * 
 * @package World Covid 19 stats
 * @since 1.0.0
 */
register_deactivation_hook( __FILE__, 'wd_cv19_st_uninstall' );

/**
 * Plugin Setup Activation hook call back 
 *
 * Initial setup of the plugin setting default options 
 * and database tables creations.
 * 
 * @package World Covid 19 stats
 * @since 1.0.0
 */
function wd_cv19_st_install() {
	
	global $wpdb;
		
}

/**
 * Plugin Setup (On Deactivation)
 *
 * Does the drop tables in the database and
 * delete  plugin options.
 *
 * @package World Covid 19 stats
 * @since 1.0.0
 */
function wd_cv19_st_uninstall() {
	
	global $wpdb;
			
}
/**
 * Includes
 *
 * Includes all the needed files for our plugin
 *
 * @package World Covid 19 stats
 * @since 1.0.0
 */ 

//includes file

require_once ( WD_CV19_ST_DIR . '/class-wd-cv19-st-main.php');

