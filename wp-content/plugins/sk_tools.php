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
   }

   

   public function i18n(){
      //load_plugin_textdomain( 'sk-tools-elementor-widgets' );
   }

   public function init_plugin(){

   }
   
   public function init_controls(){
      
   }

   public function init_widgets()  {
      
   }

   public static function get_instance(){
      if ( is_null( self::$_instance ) ) {
         self::$_instance = new self();
      }
      return self::$_instance;
   }
}

SK_Tools_Elementor_Widgets::get_instance();