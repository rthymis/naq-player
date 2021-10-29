<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://naquema.com
 * @since      1.0.0
 *
 * @package    Naq_Player
 * @subpackage Naq_Player/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Naq_Player
 * @subpackage Naq_Player/admin
 * @author     Rodolfos Thymis
 */
class Naq_Player_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $naq_player, $version ) {

		$this->naq_player = $naq_player;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->naq_player, plugin_dir_url( __FILE__ ) . 'css/naq-player-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->naq_player, plugin_dir_url( __FILE__ ) . 'js/naq-player-admin.js', array( 'jquery' ), $this->version, false );


	}

	// Add the plugin admin area and the menu item
	public function naq_player_menu() {

		add_menu_page ( 'Naq Player', 'Naq Player', 'manage_options', 'naq-player-plugin', array( $this, 'admin_index'), 'dashicons-controls-volumeon', null );

	}

	// The template of the plugin admin area
	public function admin_index() {
		require_once plugin_dir_path( __FILE__ ) . 'partials/naq-player-admin-display.php';
	}

	// Create widget

	public function register_widgets() {

		register_widget( 'Naq_Widget' );

	}


	function myplugin_settings_init() {

    // Setup settings section
    add_settings_section(
        'myplugin_settings_section',
        __('Settings:', 'naq-player'),
        '',
        'myplugin-settings-page'
    );

    // Register input field for URL
    register_setting(
        'myplugin-settings-page',
        'naqPlayerStreamURL',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => ''
        )
    );

    // Add input field for URL
    add_settings_field(
        'naqPlayerStreamURL',
        __( 'Stream URL:', 'naq-player' ),
        array( $this, 'naqplayer_settings_input_field_callback'),
        'myplugin-settings-page',
        'myplugin_settings_section'
    );

		// Register color picker
    register_setting(
        'myplugin-settings-page',
        'naqPlayerColor',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => ''
        )
    );

    // Add color picker
    add_settings_field(
        'naqPlayerColor',
        __( 'Main Color:', 'naq-player' ),
        array( $this, 'naqplayer_settings_colorpicker_callback'),
        'myplugin-settings-page',
        'myplugin_settings_section'
    );

		// Register text color picker
    register_setting(
        'myplugin-settings-page',
        'naqPlayerTextColor',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => ''
        )
    );

    // Add text color picker
    add_settings_field(
        'naqPlayerTextColor',
        __( 'Button Text Color:', 'naq-player' ),
        array( $this, 'naqplayer_settings_text_colorpicker_callback'),
        'myplugin-settings-page',
        'myplugin_settings_section'
    );

    // Register checkbox for transparent background volume
register_setting(
    'myplugin-settings-page',
    'naqPlayerCheckboxTransparentBackgroundVolume',
    array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => ''
    )
);

// Add checkbox for transparent background volume
add_settings_field(
    'naqPlayerCheckboxTransparentBackgroundVolume',
    __( 'Volume Transparent Background:', 'naq-player' ),
    array( $this, 'naqplayer_settings_checkbox_transparent_background_volume_callback'),
    'myplugin-settings-page',
    'myplugin_settings_section'
);

		// Register checkbox for Volume Controls
    register_setting(
        'myplugin-settings-page',
        'naqPlayerCheckboxVolume',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => ''
        )
    );

    // Add checkbox for Volume Controls
    add_settings_field(
        'naqPlayerCheckboxVolume',
        __( 'Hide Volume Controls:', 'naq-player' ),
        array( $this, 'naqplayer_settings_checkbox_volume_callback'),
        'myplugin-settings-page',
        'myplugin_settings_section'
    );

		// Register checkbox for EQ gif icon
    register_setting(
        'myplugin-settings-page',
        'naqPlayerCheckboxEQ',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => ''
        )
    );

    // Add checkbox for EQ gif icon
    add_settings_field(
        'naqPlayerCheckboxEQ',
        __( 'Hide EQ Icon:', 'naq-player' ),
        array( $this, 'naqplayer_settings_checkbox_eq_callback'),
        'myplugin-settings-page',
        'myplugin_settings_section'
    );








}

/**
 * txt tempalte
 */
public function naqplayer_settings_input_field_callback() {
    $myplugin_input_field = get_option('naqPlayerStreamURL');
    ?>
    <input type="text" name="naqPlayerStreamURL" class="regular-text" value="<?php echo $myplugin_input_field == '' ? '' : $myplugin_input_field; ?>" />
    <?php
}

public function naqplayer_settings_colorpicker_callback() {
    $myplugin_colorpicker = get_option('naqPlayerColor');
    ?>
    <input type="color" name="naqPlayerColor" value="<?php echo $myplugin_colorpicker; ?>" />
    <?php
}

public function naqplayer_settings_text_colorpicker_callback() {
    $myplugin_text_colorpicker = get_option('naqPlayerTextColor');
    ?>
    <input type="color" name="naqPlayerTextColor" value="<?php echo $myplugin_text_colorpicker; ?>" />
    <?php
}

public function naqplayer_settings_checkbox_volume_callback() {
    $myplugin_checkbox_volume = get_option('naqPlayerCheckboxVolume');
    ?>
    <input type="checkbox" name="naqPlayerCheckboxVolume" value="1" <?php checked( '1', $myplugin_checkbox_volume ); ?> />
    <?php
}

public function naqplayer_settings_checkbox_eq_callback() {
    $myplugin_checkbox_eq = get_option('naqPlayerCheckboxEQ');
    ?>
    <input type="checkbox" name="naqPlayerCheckboxEQ" value="1" <?php checked( '1', $myplugin_checkbox_eq ); ?> />
    <?php
}

public function naqplayer_settings_checkbox_transparent_background_volume_callback() {
    $myplugin_checkbox_transparent_background_volume = get_option('naqPlayerCheckboxTransparentBackgroundVolume');
    ?>
    <input type="checkbox" name="naqPlayerCheckboxTransparentBackgroundVolume" value="1" <?php checked( '1', $myplugin_checkbox_transparent_background_volume ); ?> />
    <?php
}

}



