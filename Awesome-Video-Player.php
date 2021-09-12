<?php
/*
/*
Plugin Name: Awesome Video Player
Description: Create a customize video player using elementor widget.
Version:     1.0
Author:      Ahmad Ali Zarei
Author URI:  
License:     GPL2

(Awesome Video Player) is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
*/
final class Awesome_Video_Player {

    // Plugin version
    const VERSION = '1.0.0';

    // Minimum Elementor Version
    const MINIMUM_ELEMENTOR_VERSION = '1.0.0';

    // Minimum PHP Version
    const MINIMUM_PHP_VERSION = '7.0';

    // Instance
    private static $_instance = null;

    /**
    * SIngletone Instance Method
    * @since 1.0.0
    */
     public static function instance() {
        if( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    
/**
    * Construct Method
    * @since 1.0.0
    */

    public function __construct() {
        // Call Constants Method
        $this->define_constants();


        add_action( 'plugins_loaded', [ $this, 'init' ] );
  
    }

/**
    * Define Plugin Constants
    * @since 1.0.0
    */
    public function define_constants() {
        define( 'Awesome-Video-Player', trailingslashit( plugins_url( '/', __FILE__ ) ) );
        define( 'Awesome_Video_Player_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );

    }

/**
    * Initialize the plugin
    * @since 1.0.0
    */
    public function init() {
        // Check if the ELementor installed and activated
        if( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
            return;
        }

        if( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
            return;
        }

        if( ! version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '>=' ) ) {
            add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
            return;
        }

        add_action( 'elementor/init', [ $this, 'init_category' ] );
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
    }

    /**
    * Init Widgets
    * @since 1.0.0
    */
    public function init_widgets() {
      require_once Awesome_Video_Player_PATH . '/widget/video.php';
  
    //  add_action( 'elementor/init', [$this, 'init_category' ] );
    }
 /**
    * Init Category Section
    * @since 1.0.0
    */  
    public function init_category() {
        Elementor\Plugin::instance()->elements_manager->add_category(
            'Vanilla',
            [
                'title' => 'Awesome Video Player'
            ],
            1
        );
    }
    
    /**
    * Admin Notice
    * Warning when the site doesn't have Elementor installed or activated
    * @since 1.0.0
    */
    public function admin_notice_missing_main_plugin() {
        if( isset( $_GET[ 'activate' ] ) ) unset( $_GET[ 'activate' ] );
        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" to be installed and activated', 'Hover-Tilt-Widget' ),
            '<strong>'.esc_html__( 'My Elementor Widget', 'Awesome-Video-Player-Widget' ).'</strong>',
            '<strong>'.esc_html__( 'Elementor', 'Awesome-Video-Player-Widget' ).'</strong>'
        );

        printf( '<div class="notice notice-warning is-dimissible"><p>%1$s</p></div>', $message );
    }

    /**
    * Admin Notice
    * Warning when the site doesn't have a minimum required Elementor version.
    * @since 1.0.0
    */
    public function admin_notice_minimum_elementor_version() {
        if( isset( $_GET[ 'activate' ] ) ) unset( $_GET[ 'activate' ] );
        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater', 'Awesome-Video-Player-Widget' ),
            '<strong>'.esc_html__( 'My Elementor Widget', 'Awesome-Video-Player_Widget' ).'</strong>',
            '<strong>'.esc_html__( 'Elementor', 'Awesome-Video-Player-Widget' ).'</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf( '<div class="notice notice-warning is-dimissible"><p>%1$s</p></div>', $message );
    }

    /**
    * Admin Notice
    * Warning when the site doesn't have a minimum required PHP version.
    * @since 1.0.0
    */
    public function admin_notice_minimum_php_version() {
        if( isset( $_GET[ 'activate' ] ) ) unset( $_GET[ 'activate' ] );
        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater', 'Hover-Tilt-Widget' ),
            '<strong>'.esc_html__( 'My Elementor Widget', 'Awesome-Video-Player-Widget' ).'</strong>',
            '<strong>'.esc_html__( 'PHP', 'Awesome-Video-Player-Widget' ).'</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf( '<div class="notice notice-warning is-dimissible"><p>%1$s</p></div>', $message );
    }

}

Awesome_Video_Player::instance();
?>