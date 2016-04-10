<?php
/**
 * Advanced Posts Widget Testing
 *
 * @package Advanced_Posts_Widget
 *
 * @license     http://www.gnu.org/licenses/gpl-2.0.txt GPL-2.0+
 * @version     0.1.0
 *
 * Plugin Name: APW Testing
 * Plugin URI:  http://darrinb.com/plugins/advanced-posts-widget
 * Description: A series of functions to test the Advanced Posts Widget
 * Version:     0.1.0
 * Author:      Darrin Boutote
 * Author URI:  http://darrinb.com
 * Text Domain:
 * Domain Path: /lang
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */


// No direct access
if ( ! defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

// adding a subtitle field
include dirname( __FILE__ ) . '/tests/field-subtitle.php';

// filtering utility methods
include dirname( __FILE__ ) . '/tests/filter-utils.php';