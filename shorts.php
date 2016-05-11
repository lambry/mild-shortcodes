<?php
/**
 * Plugin Name: Shorts
 * Plugin URI: https://github.com/lambry/shorts
 * Description: A simple set of shortcodes.
 * Version: 0.2.3
 * Author: Lambry
 * Author URI: http://lambry.com
 * Text Domain: shorts
 * Domain Path: /languages
 */

namespace Lambry\Shorts;

defined( 'ABSPATH' ) || exit;

/* Init Class */
class Init {

	/*
	* Construct
	*/
    public function __construct() {

		$this->editor();

		$this->shortcodes();

        // Load text domain
        load_plugin_textdomain( 'shorts', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

        // Add admin assets
        add_action( 'wp_enqueue_editor', [ $this, 'admin_assets'] );

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
        wp_enqueue_style( 'select2-css', plugin_dir_url( __FILE__ ) . 'includes/select2/css/select2.min.css', [], '4.0.0' );
        wp_enqueue_style( 'magnific-popup-css', plugin_dir_url( __FILE__ ) . 'includes/magnific-popup/css/magnific-popup.min.css', [], '1.0.0' );
        wp_enqueue_style( 'shorts-admin-styles', plugin_dir_url( __FILE__ ) . 'admin/assets/styles/admin.css', ['font-awesome', 'select2-css', 'magnific-popup-css'], '0.2.2' );
		// Add scripts
        wp_enqueue_script( 'select2-js', plugin_dir_url( __FILE__ ) . 'includes/select2/js/select2.min.js', ['jquery'], '4.0.0', true );
        wp_enqueue_script( 'magnific-popup-js', plugin_dir_url( __FILE__ ) . 'includes/magnific-popup/js/jquery.magnific-popup.min.js', ['jquery'], '1.0.0', true );
        wp_enqueue_script( 'shorts-admin-scripts', plugin_dir_url( __FILE__ ) . 'admin/assets/scripts/admin.min.js', ['jquery', 'select2-js', 'magnific-popup-js', 'jquery-ui-draggable', 'jquery-ui-droppable'], '0.2.2', true );

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

		// Add styles
        wp_enqueue_style( 'font-awesome', plugin_dir_url( __FILE__ ) . 'includes/font-awesome/css/font-awesome.min.css', [], '4.4.0' );
        wp_enqueue_style( 'magnific-popup-css', plugin_dir_url( __FILE__ ) . 'includes/magnific-popup/css/magnific-popup.min.css', [], '1.0.0' );
        wp_enqueue_style( 'shorts-public-styles', plugin_dir_url( __FILE__ ) . 'public/assets/styles/public.css', [], '0.2.2' );
		// Add scripts
        wp_enqueue_script( 'magnific-popup-js', plugin_dir_url( __FILE__ ) . 'includes/magnific-popup/js/jquery.magnific-popup.min.js', ['jquery'], '1.0.0', true );
        wp_enqueue_script( 'shorts-public-scripts', plugin_dir_url( __FILE__ ) . 'public/assets/scripts/public.min.js', ['jquery'], '0.2.2', true );

	}

}

/*
 * Register shortcodes.
 */
add_action( 'init', function() {
    new Init;
});
