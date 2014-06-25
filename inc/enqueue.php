<?php
defined( 'ABSPATH' ) or die( 'Cheatin&#8217; uh?' ); //Safety line

add_action( 'wp_enqueue_scripts', '__popup_enqueue_scripts' );
function __popup_enqueue_scripts() {

	wp_register_script( 'popup', POPUP_JS_DIR . 'script.dev.js', POPUP_VERSION, true );
    wp_register_style( 'style', POPUP_CSS_DIR . 'style.dev.css', '', false, 'screen' );
    
   	if( is_single() ) {

		// Now we can localize the script with our data.
		wp_localize_script( 'popup', 'popup', array('countries' => 10,'data' => popup_get_options() ) );

		wp_enqueue_script( 'popup' );
		wp_enqueue_style( 'style' );

   	}
    
}




