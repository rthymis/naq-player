<?php

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Naq_Player
 * @subpackage Naq_Player/includes
 * @author     Rodolfos Thymis
 */
class Naq_Player_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		add_option ('naqPlayerStreamURL');
		add_option ('naqPlayerColor', '#f1c40f');
		add_option ('naqPlayerTextColor', '#2c3e50');
		add_option ('naqPlayerCheckboxVolume');
		add_option ('naqPlayerCheckboxEQ');
	}

}
