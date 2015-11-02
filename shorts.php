<?php
/**
 * Plugin Name: Shorts
 * Plugin URI: https://github.com/lambry/shorts
 * Description: A simple set of shortcodes.
 * Version: 0.2.0
 * Author: Lambry
 * Author URI: http://lambry.com
 * Text Domain: lambry-shorts
 * Domain Path: /languages
 */

namespace Lambry\Shorts;

if ( ! defined( 'WPINC' ) ) die;

/* Init Class */
class Init {
	/*
	* Construct
	*/
    public function __construct() {

		$this->editor();

		$this->shortcodes();

        // Load text domain
        load_plugin_textdomain( 'lambry-shorts', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

		// Add admin assets
        add_action( 'admin_enqueue_scripts', [ $this, 'admin_assets'] );

        // Add public assets
        add_action( 'wp_enqueue_scripts', [ $this, 'public_assets'] );

    }

	/*
	 * Editor
	 *
	 * Include editor essentials.
	 *
	 * @access private
     * @return null
	 */
	private function editor() {

        require plugin_dir_path( __FILE__ ) . 'admin/editor.php';
		new Editor;

	}

	/*
	 * Shortcodes
	 *
	 * Include the shortcodes.
	 *
	 * @access private
     * @return null
	 */
	private function shortcodes() {

        require plugin_dir_path( __FILE__ ) . 'public/shortcodes.php';
		new Shortcodes;

	}

	/*
	 * Admin Assets
	 *
	 * Include admin assets.
	 *
	 * @access public
     * @return null
	 */
	public function admin_assets() {

		// Add styles
        wp_enqueue_style( 'font-awesome', plugin_dir_url( __FILE__ ) . 'includes/font-awesome/css/font-awesome.min.css', [], '4.4.0' );
        wp_enqueue_style( 'select2', plugin_dir_url( __FILE__ ) . 'includes/select2/css/select2.min.css', [], '4.0.0' );
        wp_enqueue_style( 'ls-admin', plugin_dir_url( __FILE__ ) . 'admin/assets/styles/admin.css', ['font-awesome', 'select2'], '0.2.0' );
		// Add scripts
        wp_enqueue_script( 'select2', plugin_dir_url( __FILE__ ) . 'includes/select2/js/select2.min.js', ['jquery'], '4.0.0', true );
        wp_enqueue_script( 'ls-admin', plugin_dir_url( __FILE__ ) . 'admin/assets/scripts/admin.min.js', ['jquery'], '0.2.0', true );

	}

	/*
	 * Public Assets
	 *
	 * Include public assets.
	 *
	 * @access public
     * @return null
	 */
	public function public_assets() {

        if ( ! current_theme_supports( 'font-awesome' ) ) {
        	wp_enqueue_style( 'font-awesome', plugin_dir_url( __FILE__ ) . 'includes/font-awesome/css/font-awesome.min.css', [], '4.4.0' );
        }
		// Add styles
        wp_enqueue_style( 'ls-public', plugin_dir_url( __FILE__ ) . 'public/assets/styles/public.css', [], '0.2.0' );
		// Add scripts
        wp_enqueue_script( 'ls-public', plugin_dir_url( __FILE__ ) . 'public/assets/scripts/public.min.js', ['jquery'], '0.2.0', true );

	}

}

/*
 * Register shortcodes.
 */
add_action( 'init', function() {
    new Init;
});
