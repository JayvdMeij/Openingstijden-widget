<?php

class My_Elementor_Widgets {

	protected static $instance = null;

	public static function get_instance() {
		if ( ! isset( static::$instance ) ) {
			static::$instance = new static;
		}

		return static::$instance;
	}

	protected function __construct() {
		require_once('openinghours.php');
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );
        add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
		
	}

	public function register_widgets() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Widget_Openinghours() );
	}

	public function widget_styles() {

        wp_register_style( 'l-w-oh', get_stylesheet_directory_uri(  ). '/custom-widgets/l-w-oh.css' );
    }

	public function widget_scripts() {
        wp_register_script( 'l-w-oh-js', get_stylesheet_directory_uri(  ). '/custom-widgets/l-w-oh.js' );
        
    }

}

add_action( 'init', 'my_elementor_init' );
function my_elementor_init() {
	My_Elementor_Widgets::get_instance();
}