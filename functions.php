<?php
/**
 * wedgie-child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wedgie-child
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_WEDGIE_CHILD_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'wedgie-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_WEDGIE_CHILD_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

/**
 * Adjust the quantity input values
 */
add_filter( 'woocommerce_quantity_input_args', 'jk_woocommerce_quantity_input_args', 10, 2 ); // Simple products

function jk_woocommerce_quantity_input_args( $args, $product ) {
	if ( is_singular( 'product' ) ) {
		$args['input_value'] 	= 1;	// Starting value (we only want to affect product pages, not cart)
	}
	$args['max_value'] 	= 20; 	// Maximum value
	$args['min_value'] 	= 1;   	// Minimum value
	$args['step'] 		= 1;    // Quantity steps
	return $args;
}

add_filter( 'woocommerce_available_variation', 'jk_woocommerce_available_variation' ); // Variations

function jk_woocommerce_available_variation( $args ) {
	$args['max_qty'] = 20; 		// Maximum value (variations)
	$args['min_qty'] = 1;   	// Minimum value (variations)
	return $args;
}