<?php
/**
 * Generator
 *
 * @package Shorts
 */

namespace Lambry\Shorts;

defined( 'ABSPATH' ) || exit;

/* Editor Class */
class Editor {

	/*
	* Construct
	*/
    public function __construct() {

	    if ( is_admin() && get_user_option( 'rich_editing' ) === 'true' ) {

	    	$this->editor();

	    }

	}
	
	/*
	 * Editor
	 *
	 * Include shortcodes editor.
	 *
	 * @access private
     * @return null
	 */
	private function editor() {

	    // Add editor button css
		add_action( 'admin_head', function() {
			echo '<style>.mce-i-shorts:before { font-family: dashicons !important; content: "\f475"; }</style>';
		});

		// Add editor popup scripts
	    add_filter( 'mce_external_plugins', function( $plugin_array ) {
	        $plugin_array['shorts'] = plugins_url( 'assets/scripts/editor.min.js', __FILE__ );
	        return $plugin_array;
	    });

	    // Register editor button
	    add_filter( 'mce_buttons', function( $buttons ) {
	        array_push( $buttons, 'shorts' );
	        return $buttons;
	    });

	    // Add AJAX action to generate html
        add_action( 'wp_ajax_shorts_generate', [ $this, 'generate_html' ] );

	}

	/*
	 * Generate html
	 *
	 * Generate the shortcodes html.
	 *
	 * @access public
     * @return string $html
	 */
	public function generate_html() {
		
		if ( $_POST['action'] !== 'shorts_generate' ) {
			echo '<div class="error"><p>' . __( 'Sorry, there was an error fetching shortcodes.', 'shorts' ) . '</p></div>';
			die();
		}

		// Require necessities
		require 'includes/defaults.php';
		require 'includes/fields.php';
		require 'includes/setup.php';

		// Set variables
		$shortcodes = Setup::shortcodes();
		
		// Generate the html
		require 'generate.php';

		die();

	}

}
