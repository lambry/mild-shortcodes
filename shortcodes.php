<?php
/**
 * Plugin Name: Mild Shortcodes
 * Plugin URI: https://github.com/bluecure/mild-shortcodes
 * Description: A set of simple shortcodes
 * Version: 0.1.0
 * Author: David Featherston
 * Text Domain: mild-sc
 * Domain Path: /languages
 */

namespace Mild\Shortcodes;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) die;

/* Init Class */
class Init {

	/*
	* Construct
	*/
    public function __construct() {

		// Include the shortcodes.
		$this->shortcodes();

		// Include the editor module.
		$this->editor();

    }

	/*
	* Shortcodes
	*/
	private function shortcodes() {

		// Generate shortcodes.
        require plugin_dir_path( __FILE__ ) . 'public/generator.php';
		new Generator;

        // Load public js.
        wp_enqueue_script( 'mild-sc-pjs', plugin_dir_url( __FILE__ ) . 'public/js/public.js', ['jquery'], '0.1.0', true );

	}

	/*
	* Editor
	*/
	private function editor() {

	    if ( ! is_admin() ) return;

	    // Add editor style sheet.
	    wp_enqueue_style( 'shortcodes', plugin_dir_url( __FILE__ ) . 'admin/assets/css/editor.css' );

        // Add editor content css.
	    add_editor_style( plugin_dir_url( __FILE__ ) . 'admin/assets/css/content.css' );

		// Add editor js.
	    add_filter( 'mce_external_plugins', function( $plugin_array ) {
	        $plugin_array['mce_editor_shortcodes'] = plugin_dir_url( __FILE__ ) . 'admin/editor.js';
	        return $plugin_array;
	    });

	    // Register editor button.
	    add_filter( 'mce_buttons', function( $buttons ) {
	        array_push( $buttons, 'm_shortcodes' );
	        return $buttons;
	    });

	}

}

// Register shortcodes.
add_action( 'init', function() {
    new Init;
});
