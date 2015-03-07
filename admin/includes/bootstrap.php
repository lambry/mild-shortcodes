<?php
/**
 * Bootstrap
 *
 * @package Mild
 */
namespace Mild\Shortcodes;

// Get blog header path for include
$ref = explode( '/', $_SERVER['REQUEST_URI'] );
$path = '/';

// Create site path
foreach ( $ref as $segment ) {
    if ( stripos( $segment, 'wp-' ) === false ) {
        $path .= $segment . '/';
    } else {
        break;
    }
}

// Require blog header
require $_SERVER['DOCUMENT_ROOT'] . $path . 'wp-blog-header.php';

// Require necessities
require 'includes/defaults.php';
require 'includes/setup.php';
require 'includes/fields.php';

// Set variables
$shortcodes = Setup::get_shortcodes();
$fields = new Fields;
