<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Naq_Player
 * @subpackage Naq_Player/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Naq_Player
 * @subpackage Naq_Player/public
 * @author     Rodolfos Thymis
 */
class Naq_Player_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $naq_player;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $naq_player, $version ) {

		$this->naq_player = $naq_player;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( 'naq-player-public-css', plugin_dir_url( __FILE__ ) . 'css/naq-player-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( 'naq-player-public-js', plugin_dir_url( __FILE__ ) . 'js/naq-player-public.js', array( 'jquery' ), $this->version, false );

		$my_URL = get_option('naqPlayerStreamURL');
		$my_Color = get_option('naqPlayerColor');
		$my_Text_Color = get_option('naqPlayerTextColor');
		$my_Checkbox_Volume = get_option('naqPlayerCheckboxVolume');
		$my_Checkbox_EQ = get_option ('naqPlayerCheckboxEQ');
		wp_localize_script( 'naq-player-public-js', 'myURL', $my_URL);
		wp_localize_script( 'naq-player-public-js', 'myColor', $my_Color);
		wp_localize_script( 'naq-player-public-js', 'myTextColor', $my_Text_Color);
		wp_localize_script( 'naq-player-public-js', 'myCheckboxVolume', $my_Checkbox_Volume);
		wp_localize_script( 'naq-player-public-js', 'myCheckboxEQ', $my_Checkbox_EQ);

		// wp_enqueue_script( 'naq-player-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script('jquery'); 


	}

	public function shortcode_function(){
		ob_start();
		require_once plugin_dir_path( __FILE__ ) . 'partials/naq-player-public-display.php';
		return ob_get_clean();
	}

	public function register_shortcodes() {
  add_shortcode( 'naq_player_shortcode', array( $this, 'shortcode_function') );

}

}
