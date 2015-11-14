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

        // Add shortcodes to admin
        add_action( 'media_buttons', [ $this, 'setup' ] );

	}

	/*
	 * Setup
	 *
	 * Setup shortcode button and html.
	 *
	 * @access public
     * @return void
	 */
	public function setup() {

		// Generate popup
        add_action( 'admin_footer', [ $this, 'generate' ] );

        $button = '<button type="button" class="shorts-launch button">';
        	$button .= '<i class="fa fa-code"></i> ' . __( 'Shortcodes', 'shorts' ) . '</a>';
        $button .= '</button>';

        echo $button;

	}

	/*
	 * Generate
	 *
	 * Generate the shortcodes html.
	 *
	 * @access public
     * @return void
	 */
	public function generate() {

		// Require necessities
		require 'includes/defaults.php';
		require 'includes/fields.php';
		require 'includes/setup.php';

		// Set variables
		$shortcodes = Setup::shortcodes();
		
		// Generate the html
		require 'generate.php';

	}

}
