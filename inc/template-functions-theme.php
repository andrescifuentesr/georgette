<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package loulou
 */

//-------------------------------------------------  
//function shortcode
//-------------------------------------------------

function border_green_shortcode_top( $atts ) {
	return '<div class="border-green-top">&nbsp;</div>';
}
add_shortcode( 'border_green_top', 'border_green_shortcode_top' );

function border_green_shortcode_bottom( $atts ) {
	return '<div class="border-green-bottom">&nbsp;</div>';
}
add_shortcode( 'border_green_bottom', 'border_green_shortcode_bottom' );

function google_maps_shortcode( $atts ) {
	return '
		<div class="map-wrapper">
			<div id="map_canvas"></div>
		</div>';
}
add_shortcode( 'google_maps', 'google_maps_shortcode' );
//[google_maps]

/**
 * Register Socail Menu
 */
add_action( 'init', 'social_register_nav_menus' );

function social_register_nav_menus() {
	register_nav_menu( 'social', __( 'Social', 'georgette' ) );
}


// //-------------------------------------------------  
// //function custome Image
// //-------------------------------------------------
// if ( function_exists( 'add_image_size' ) ) {
//     add_image_size( 'imgPresse', 250, 350, false );
// }