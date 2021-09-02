<?php

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Naq_Player
 * @subpackage Naq_Player/includes
 * @author     Rodolfos Thymis
 */

 class Naq_Player_i18n {


 	/**
 	 * Load the plugin text domain for translation.
 	 *
 	 * @since    1.0.0
 	 */
 	public function load_plugin_textdomain() {

 		load_plugin_textdomain(
 			'naq-player',
 			false,
 			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
 		);

 	}



 }
