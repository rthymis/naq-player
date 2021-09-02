<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://naquema.com
 * @since             1.0.0
 * @package           Naq_Player
 *
 * @wordpress-plugin
 * Plugin Name:       Naq Player
 * Plugin URI:        http://naquema.com
 * Description:       Player for web radio audio streams
 * Version:           1.0.0
 * Author:            Rodolfos Thymis
 * Author URI:        http://naquema.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       naq-player
 * Domain Path:       /languages
 */

 // If this file is called directly, abort.
 defined ( 'ABSPATH' ) or die ( 'Nope, not accessing this.'  );

 /**
  * The code that runs during plugin activation.
  * This action is documented in includes/class-naq-player-activator.php
  */
 function activate_naq_player() {
 	require_once plugin_dir_path( __FILE__ ) . 'includes/class-naq-player-activator.php';
 	Naq_Player_Activator::activate();
 }

 /**
  * The code that runs during plugin deactivation.
  * This action is documented in includes/class-naq-player-deactivator.php
  */
 function deactivate_naq_player() {
 	require_once plugin_dir_path( __FILE__ ) . 'includes/class-naq-player-deactivator.php';
 	Naq_Player_Deactivator::deactivate();
 }

 register_activation_hook( __FILE__, 'activate_naq_player' );
 register_deactivation_hook( __FILE__, 'deactivate_naq_player' );

 /**
  * The core plugin class that is used to define internationalization,
  * admin-specific hooks, and public-facing site hooks.
  */
 require plugin_dir_path( __FILE__ ) . 'includes/class-naq-player.php';

 /**
  * Begins execution of the plugin.
  *
  * Since everything within the plugin is registered via hooks,
  * then kicking off the plugin from this point in the file does
  * not affect the page life cycle.
  *
  * @since    1.0.0
  */
 function run_naq_player() {

 	$plugin = new Naq_Player();
 	$plugin->run();

 }
 run_naq_player();
