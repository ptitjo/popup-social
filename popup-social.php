<?php
defined( 'ABSPATH' ) or die( 'Cheatin&#8217; uh?' );

/*
Plugin Name: Social Popup Domination
Description: Social Popup Domination displays a Social Popup to your visitors when they reach the end of a post!
Author: WP Media
Author URI: http://wp-rocket.me
Version: 1.0
*/

define( 'POPUP_VERSION'	, '1.0' );
define( 'POPUP_SLUG'     , 'popup' );
define( 'POPUP_IMG_SLUG'     , 'popupimage' );
define( 'POPUP_PATH'		, realpath( plugin_dir_path(__FILE__) ) . '/' );
define( 'POPUP_URL'		, plugin_dir_url(__FILE__) );
define( 'POPUP_INC_PATH'    , POPUP_PATH . 'inc/' );
define( 'POPUP_INC_DIR' , POPUP_URL . 'inc/' );
define( 'POPUP_INC_FRONT_PATH'	, POPUP_PATH . 'inc/front/' );
define( 'POPUP_INC_FRONT_DIR'	, POPUP_URL . 'inc/front/' );
define( 'POPUP_JS_DIR'   , POPUP_URL . 'inc/js/' );
define( 'POPUP_CSS_DIR'	, POPUP_URL . 'inc/css/' );
define( 'POPUP_IMG_DIR'	, POPUP_URL . 'inc/images/' );
add_image_size( POPUP_IMG_SLUG, 350, 245, false );

add_action( 'plugins_loaded', '__popup_init' );
function __popup_init() {

	load_plugin_textdomain( 'popup', false, basename( dirname( __FILE__ ) ) . '/languages/' );
    
	require POPUP_INC_PATH . 'functions.php';
	require POPUP_INC_PATH . 'settings.php';
    require POPUP_INC_PATH . 'enqueue.php';
    require POPUP_INC_PATH . 'popup.php';
    require POPUP_INC_FRONT_PATH . 'head.php';
	
	if ( ! class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/lib/ReduxFramework/ReduxCore/framework.php' ) ) {
        require_once( dirname( __FILE__ ) . '/lib/ReduxFramework/ReduxCore/framework.php' );
    }
    
    if( class_exists( 'ReduxFramework' ) ) {
        popup_options_page();
    }
}

/*
 * Tell WP what to do when plugin is activated
 *
 * @since 1.0
 */
register_activation_hook( __FILE__, '__popup_activation' );
function __popup_activation() {

	if( ! get_option( WOSM_SLUG ) ) {

		$options = array(
			'social_link' => array(
				'facebook' => '1',
				'twitter' => '1',
				'google' => '1'
			),
			'social_top_text'   => __( 'Be Kind!', 'popup' ),
			'social_top_text_tyopography' => array(
				'color'      => '#000',
				'font-size'  => '13px',
				'font-style' => '400',
				'text-align' => 'center'
			),
			'social_bottom_text' => __( 'Share with your friends!', 'popup' ),
			'social_bottom_text_tyopography'    => array( 
				'color'      => '#000',
				'font-size'  => '13px',
				'text-align' => 'center',
				'font-style' => '400'
			),
			'social_picture_default'   => array(
				'url'    => POPUP_IMG_DIR . 'default.jpg',
				'width'  => '350',
				'height' => '245',
            ),
			'social_picture'                => '1',
			'social_close_text'             => __( 'No thank\'s', 'popup' ),
			'social_close_text_tyopography' => array(
					'color'      => '#000',
					'font-size'  => '13px',
					'text-align' => 'center',
                
            ),
			 'social_starting_position' => 'left',
			'social_border'     => array (
                    'border-color'  => '#C7C7C7', 
                    'border-style'  => 'solid', 
                    'border-top'    => '2px', 
                    'border-right'  => '2px', 
                    'border-bottom' => '2px', 
                    'border-left'   => '2px'
            ),
			'social_background_popup' => '#fff',
			'social_background_font'  => '#eee',
			'social_font_opacity'     => '1',
			'social_cookie'           => '5',
			'social_transition'       => '0.1',
			'social_share_text'       => __( 'I\'ve just read this article :', 'popup' ),


			'popup_message_text_facebook_top'    => __( 'Like us on Facebook !', 'popup' ),
            'popup_message_text_twitter_top'     => __( 'Follow us on Twitter !', 'popup' ),
            'popup_message_text_google_top'      => __( 'Follow us on Google + !', 'popup' ),
            'popup_message_text_tyopography_top' => array(
                'color'       => '#000',
                'font-size'   => '16px',
                'text-align'  => 'center',
                'font-weight' => '400',
                'font-family' => 'Arial'
            ),
            'popup_message_text_facebook_bottom'    => __( 'Like us on Facebook !', 'popup' ),
            'popup_message_text_twitter_bottom'     => __( 'Follow us on Twitter !', 'popup' ),
            'popup_message_text_google_bottom'      => __( 'Follow us on Google + !', 'popup' ),
            'popup_message_text_tyopography_bottom' => array(
                'color'       => '#000',
                'font-size'   => '14px',
                'text-align'  => 'center',
                'font-weight' => '400',
                'font-family' => 'Arial'
            ),
            'popup_page_facebook'    => '',
			'popup_content_facebook' => 'standard',
			'popup_account_twitter'  => '',
			'popup_options_twitter'  => array(
				'tweet'  => '1',
				'follow' => '1'
            ),
			'popup_account_google'             => '',
			'popup_options_google'             => 'inline',
			'social_subscribe_arrival_time'    => '3',
			'social_subscribe_transition_time' => '1'
			
		);
		
		add_option( 'popup', $options );
		
	}	
}

// Add action links
add_action('plugin_action_links_' . plugin_basename(__FILE__), '__popup_add_settings');
function __popup_add_settings($links) {
    $new_links = array();

    $new_links[] = '<a href="options-general.php?page=_' . POPUP_SLUG . '_options">' . __('Settings', 'popup') . '</a>';

    return array_merge($new_links, $links);
  }


