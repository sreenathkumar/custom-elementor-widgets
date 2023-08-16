<?php
   /*
   Plugin Name: SK Tools
   Plugin URI: https://sreenathkumar.github.io/portfolio/
   description: >- A plugin to add custom widgets to elementor.
   Version: 0.0.1
   Author: Sreenath Kumar
   Author URI: https://sreenathkumar.github.io/portfolio/
   License: GPL2
   text-domain: sk-tools-elementor-widgets
   */

 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

final class SK_Tools_Elementor_Widgets{
   const VERSION = '0.0.1';
   const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
   const MINIMUM_PHP_VERSION = '5.6';

   private static $_instance = null;

   public function __construct(){
      add_action( 'init', [ $this, 'i18n' ] );
      add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
      add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
      add_action( 'elementor/elements/categories_registered', [$this, 'add_elementor_widget_categories'] );
      add_action( 'wp_enqueue_scripts', [$this, 'skt_widgets_dependencies'] );
   }

   

   public function i18n(){
      //load_plugin_textdomain( 'sk-tools-elementor-widgets' );
   }

   public function init_plugin(){

   }
   
   public function init_controls(){
      
   }

   public function init_widgets()  {
      // Include Widget files
      require_once( __DIR__ . '/widgets/marquee.php' );
      // Register widget
      \Elementor\Plugin::instance()->widgets_manager->register( new \SK_Tools\ElementorWidgets\Widgets\Sk_Marquee() ); 
   }

   public function add_elementor_widget_categories( $elements_manager ) {

      $elements_manager->add_category(
         'sk_tools',
         [
            'title' => esc_html__( 'SK Tools', 'textdomain' ),
            'icon' => 'fa fa-plug',
         ]
      );
      
   }

   public function skt_widgets_dependencies(){
      // Scripts
      wp_register_script('skt_marquee', plugins_url('assets/js/skt_marquee.js',__FILE__));

      // CSS
      wp_register_style('skt_marquee_style', plugins_url('assets/css/skt_marquee_style.css',__FILE__));
   }

   public static function get_instance(){
      if ( is_null( self::$_instance ) ) {
         self::$_instance = new self();
      }
      return self::$_instance;
   }
}

SK_Tools_Elementor_Widgets::get_instance();