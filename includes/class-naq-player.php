<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://naquema.com
 * @since      1.0.0
 *
 * @package    Naq_Player
 * @subpackage Naq_Player/includes
 */

 /**
  * The core plugin class.
  *
  * This is used to define internationalization, admin-specific hooks, and
  * public-facing site hooks.
  *
  * Also maintains the unique identifier of this plugin as well as the current
  * version of the plugin.
  *
  * @since      1.0.0
  * @package    Naq_Player
  * @subpackage Naq_Player/includes
  * @author     Rodolfos Thymis
  */

  class Naq_Player {

    /**
  	 * The loader that's responsible for maintaining and registering all hooks that power
  	 * the plugin.
  	 *
  	 * @since    1.0.0
  	 * @access   protected
  	 * @var      Naq_Player_Loader    $loader    Maintains and registers all hooks for the plugin.
  	 */
  	protected $loader;

    /**
  	 * The unique identifier of this plugin.
  	 *
  	 * @since    1.0.0
  	 * @access   protected
  	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
  	 */
  	protected $naq_player;

    /**
  	 * The current version of the plugin.
  	 *
  	 * @since    1.0.0
  	 * @access   protected
  	 * @var      string    $version    The current version of the plugin.
  	 */
  	protected $version;

    /**
  	 * Define the core functionality of the plugin.
  	 *
  	 * Set the plugin name and the plugin version that can be used throughout the plugin.
  	 * Load the dependencies, define the locale, and set the hooks for the admin area and
  	 * the public-facing side of the site.
  	 *
  	 * @since    1.0.0
  	 */
  	public function __construct() {
  		if ( defined( 'NAQ_PLAYER_VERSION' ) ) {
  			$this->version = NAQ_PLAYER_VERSION;
  		} else {
  			$this->version = '1.0.0';
  		}
  		$this->plugin_name = 'naq_player';

  		$this->load_dependencies();
  		$this->set_locale();
  		$this->define_admin_hooks();
  		$this->define_public_hooks();

  	}

    /**
  	 * Load the required dependencies for this plugin.
  	 *
  	 * Include the following files that make up the plugin:
  	 *
  	 * - Plugin_Name_Loader. Orchestrates the hooks of the plugin.
  	 * - Plugin_Name_i18n. Defines internationalization functionality.
  	 * - Plugin_Name_Admin. Defines all hooks for the admin area.
  	 * - Plugin_Name_Public. Defines all hooks for the public side of the site.
  	 *
  	 * Create an instance of the loader which will be used to register the hooks
  	 * with WordPress.
  	 *
  	 * @since    1.0.0
  	 * @access   private
  	 */

     private function load_dependencies() {

   		/**
   		 * The class responsible for orchestrating the actions and filters of the
   		 * core plugin.
   		 */
   		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-naq-player-loader.php';

   		/**
   		 * The class responsible for defining internationalization functionality
   		 * of the plugin.
   		 */
   		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-naq-player-i18n.php';

   		/**
   		 * The class responsible for defining all actions that occur in the admin area.
   		 */
   		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-naq-player-admin.php';

   		/**
   		 * The class responsible for defining all actions that occur in the public-facing
   		 * side of the site.
   		 */
   		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-naq-player-public.php';

      /**
   		 * The class responsible for defining all widgets.
   		 */
   		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'widgets/naq-player-widget.php';



   		$this->loader = new Naq_Player_Loader();

   	}

    /**
  	 * Define the locale for this plugin for internationalization.
  	 *
  	 * Uses the Plugin_Name_i18n class in order to set the domain and to register the hook
  	 * with WordPress.
  	 *
  	 * @since    1.0.0
  	 * @access   private
  	 */
  	private function set_locale() {

  		$plugin_i18n = new Naq_Player_i18n();

  		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

  	}

    /**
  	 * Register all of the hooks related to the admin area functionality
  	 * of the plugin.
  	 *
  	 * @since    1.0.0
  	 * @access   private
  	 */
  	private function define_admin_hooks() {

  		$plugin_admin = new Naq_Player_Admin( $this->get_naq_player(), $this->get_version() );

  		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
  		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
      $this->loader->add_action( 'admin_menu', $plugin_admin, 'naq_player_menu' );
      $this->loader->add_action( 'admin_init', $plugin_admin, 'myplugin_settings_init' );
      $this->loader->add_action( 'widgets_init', $plugin_admin, 'register_widgets' );


  	}

    /**
  	 * Register all of the hooks related to the public-facing functionality
  	 * of the plugin.
  	 *
  	 * @since    1.0.0
  	 * @access   private
  	 */
  	private function define_public_hooks() {

  		$plugin_public = new Naq_Player_Public( $this->get_naq_player(), $this->get_version() );

  		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
  		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
      $this->loader->add_action( 'init', $plugin_public, 'register_shortcodes' );



  	}

    /**
  	 * Run the loader to execute all of the hooks with WordPress.
  	 *
  	 * @since    1.0.0
  	 */
  	public function run() {
  		$this->loader->run();
  	}

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since     1.0.0
     * @return    string    The name of the plugin.
     */
    public function get_naq_player() {
      return $this->naq_player;
    }

    /**
  	 * The reference to the class that orchestrates the hooks with the plugin.
  	 *
  	 * @since     1.0.0
  	 * @return    Naq_Player_Loader    Orchestrates the hooks of the plugin.
  	 */
  	public function get_loader() {
  		return $this->loader;
  	}

    /**
  	 * Retrieve the version number of the plugin.
  	 *
  	 * @since     1.0.0
  	 * @return    string    The version number of the plugin.
  	 */
  	public function get_version() {
  		return $this->version;
  	}

  }
