<?php
/**
* Google Fonts Implementation
*
* @package Natural
* @since Natural 3.0
*
*/

/**
* Register Google Fonts
*
* @since Natural 3.0
*/
function organic_register_fonts() {
	$protocol = is_ssl() ? 'https' : 'http';
	wp_register_style( 'montserrat', "$protocol://fonts.googleapis.com/css?family=Montserrat:400,700" );
	wp_register_style( 'roboto', "$protocol://fonts.googleapis.com/css?family=Roboto:400,300italic,300,500,400italic,500italic,700,700italic" );
	wp_register_style( 'merriweather', "$protocol://fonts.googleapis.com/css?family=Merriweather:400,700,300,900" );
	wp_register_style( 'milonga', "$protocol://fonts.googleapis.com/css?family=Milonga" );
}
add_action( 'init', 'organic_register_fonts' );

/**
* Enqueue Google Fonts on Front End
*
* @since Natural 3.0
*/

function organic_fonts() {
	wp_enqueue_style( 'montserrat' );
	wp_enqueue_style( 'roboto' );
	wp_enqueue_style( 'merriweather' );
	wp_enqueue_style( 'milonga' );
}
add_action( 'wp_enqueue_scripts', 'organic_fonts' );

/**
* Enqueue Google Fonts on Custom Header Page
*
* @since Natural 3.0
*/
function organic_admin_fonts( $hook_suffix ) {
	if ( 'appearance_page_custom-header' != $hook_suffix )
	return;
	
	wp_enqueue_style( 'montserrat' );
	wp_enqueue_style( 'roboto' );
	wp_enqueue_style( 'merriweather' );
	wp_enqueue_style( 'milonga' );
}
add_action( 'admin_enqueue_scripts', 'organic_admin_fonts' );