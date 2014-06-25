<?php
defined( 'ABSPATH' ) or die( 'Cheatin&#8217; uh?' ); //Safety line


/**
 * Page Options with Redux Framework
 * 
 * @since 1.0
 *
 * @return obj $popup_ReduxFramework
 */
function popup_options_page() {

    $args = array(
        'opt_name'     => POPUP_SLUG,
        'display_name' => __( 'Social Popup Domination option panel', 'popup' ),
        'menu_title'   => 'Social Popup Domination',
        'menu_type'    => 'submenu',
        'page_parent'  => 'options-general.php',
        'admin_bar'    => false,
        'customizer'   => 'false',
        'page_slug'   => '_' . POPUP_SLUG . '_options'
    );

    $sections = array();

    $sections[] = array(
        'title'    => 'Options Popup',
        'icon'     => ' el-icon-adjust-alt',
        //'subtitle' => __( 'You can set up options for Popup Social', 'popup' ),
        'fields'   => array(
            array(
                'id'          => 'social_link',
                'type'        => 'checkbox',
                'title'       => __( 'Social Networks', 'popup' ),
                'subtitle'    => __( 'Select the social networks you want to be displayed', 'popup' ),
                'options'     => array(
                    'facebook' => 'Facebook',
                    'twitter'  => 'Twitter',
                    'google'   => 'Google +'
                ),
                'default'     => array(
                    'facebook' => '1',
                    'twitter'  => '1',
                    'google'   => '1'
                )
            ),
            array(
                'id'       => 'social_share_text',
                'type'     => 'text',
                'title'    => __( 'Twitter Text', 'popup' ),
                'subtitle' => __( 'Text to add before before the link to tweet', 'popup' ),
                //'subtitle' => __( 'Pensez qu\'un Twitte ne peut faire plus de 160 caractères.', 'popup' ),
                'default'  => __( 'Je viens de lire cet article : ', 'popup' )
            ),
            array(
                'id'       => 'social_top_text',
                'type'     => 'text',
                'title'    => __( 'Top Text', 'popup' ),
                'subtitle' => __( 'Text to be displayed at the top of the popup', 'popup' ),
                'default'  => __( 'Be Kind!', 'popup' )
            ),
            array(
                'id'          => 'social_top_text_tyopography',
                'type'        => 'typography',
                'title'       => __( 'Top Text Style',  'popup' ),
                'subsets'     => false,
                'google'      => false,       
                'line-height' => false,
                'default'     => array(
                    'color'      => '#000',
                    'font-size'  => '20px',
                    'text-align' => 'center',
                    'font-family'    => 'Arial, Helvetica, sans-serif',
                    'font-weight' => '400'
                                     
                ),
            ),
            array(
                'id'       => 'social_bottom_text',
                'type'     => 'text',
                'title'    => __( 'Bottom Text', 'popup' ),
                'subtitle' => __( 'Bottom text to be displayed at the bottom of the popup.', 'popup' ),
                'default'  => __( 'Share with your friends!', 'popup' )
            ),
            array(
                'id'          => 'social_bottom_text_tyopography',
                'type'        => 'typography',
                'title'       => __( 'Bottom text style',  'popup' ),
                'subsets'     => false,
                'google'      => false, 
                'line-height' => false,
                'default'     => array(
                    'color'      => '#000',
                    'font-size'  => '18px',
                    'text-align' => 'center',
                    'font-family'    => 'Arial, Helvetica, sans-serif',
                    'font-weight' => '400'
                ),
            ),
            array(
                'id'       => 'social_picture_default',
                'type'     => 'media',
                'title'    => __( 'Default image',  'popup' ),
                'subtitle' => __( 'Select a default image. It will be displayed if you don\'t have a featured image.' , 'popup'),
                'default'  => array(
                    'url'    => POPUP_IMG_DIR . 'default.jpg',
                    'width'  => '350',
                    'height' => '470',
                )
            ),
            array(
                'id'          => 'social_picture',
                'type'        => 'switch',
                'title'       => __( 'Image to Display', 'popup' ),
                'subtitle'    => __( 'Select if you want to display the default image or the post featured image', 'popup' ),
                'default'     => '1',
                'on'          => __( 'Featured Image', 'popup' ),
                'off'         => __( 'Default image', 'popup' )
            ),
            array(
                'id'          => 'social_close_text',
                'type'        => 'text',
                'title'       => __( 'Close button text', 'popup' ),
                //'subtitle'    => __( 'Rentrez ici le texte du bouton fermer.', 'popup' ),
                'default'     => __( 'No Thank\'s!', 'popup' )
            ),
            array(
                'id'          => 'social_close_text_tyopography',
                'type'        => 'typography',
                'title'       => __( 'Close Button Style',  'popup' ),
                //'subtitle'    => __( 'Vous pouvez modifier le style du texte du bouton fermer.' , 'popup'),
                'subsets'     => false,
                'google'      => false,       
                'line-height' => false,
                'default'     => array(
                    'color'         => '#000',
                    'font-size'     => '13px',
                    'text-align'    => 'center',
                    'font-family'    => 'Arial, Helvetica, sans-serif',
                    'font-weight'    => '400'
                ),
            ),
            
            array(
                'id'          => 'social_border',
                'type'        => 'border',
                'title'       => __( 'Popup Border Style', 'popup' ),
                //'subtitle'    => __( 'Specify the pxYou Vous pouvez définir aussi tous les éléments de bordure de la popup.', 'popup' ),
                'all'         => false,
                'default'     => array (
                    'border-color'  => '#C7C7C7', 
                    'border-style'  => 'solid', 
                    'border-top'    => '2px', 
                    'border-right'  => '2px', 
                    'border-bottom' => '2px', 
                    'border-left'   => '2px'
                )
            ),
            array(
                'id'          => 'social_background_popup',
                'type'        => 'color',
                'title'       => __('Background Color', 'popup'), 
                'subtitle'    => __('Specify the background lolor of the popup', 'popup'),
                'default'     => '#fff',
                'validate'    => 'color',
                'transparent' => false
            ),
            array(
                'id'          => 'social_background_font',
                'type'        => 'color',
                'title'       => __('Background Overlay Color', 'popup'), 
                'subtitle'    => __('Specify the backgroud color of the overlay.', 'popup'),
                'default'     => '#eee',
                'validate'    => 'color',
                'transparent' => false
            ),
            array(
                'id'        => 'social_cookie',
                'type'      => 'spinner',
                'title'     => __('Cookie Life Time', 'popup'), 
                'subtitle'  => __('Specify the life time (in hours)of the cookie. When the cookie is present the popup won\'t appeared.', 'popup'),
                'default'   => '5',
                'min'       => '1',
                'step'      => '1',
                'max'       => '999999',
            ),
            array(
                'id'          => 'social_starting_position',
                'type'        => 'radio',
                'title'       => __( 'Popup Starting Position', 'popup' ),
                'subtitle'    => __( 'Specify where the Popup comes from', 'popup' ),
                'options'     => array(
                    'right'     => __( 'Right', 'popup' ), 
                    'left'      => __( 'Left', 'popup' ),
                    'top'       => __( 'Top', 'popup' ),
                    'bottom'    => __( 'Bottom', 'popup' )
                ),
                'default'     => 'left'
                
            ),
            array(
                'id'         => 'social_transition',
                'type'       => 'slider',
                'title'      => __('Transition delay', 'popup'), 
                'min'        => .1,
                'max'        => 5,
                'step'       => 0.1,
                'resolution' => 0.1,
                'default'    => '0.1'
            ),
            array(
                'id'         => 'social_font_opacity',
                'type'       => 'slider',
                'title'      => __('Overlay Opacity', 'popup'), 
                'min'        => 0,
                'max'        => 1,
                'step'       => 0.1,
                'resolution' => 0.1,
                'default'    => '0.6'
            ),






            array(
                'id'         => 'social_subscribe_arrival_time',
                'type'       => 'slider',
                'title'      => __('Duration Before Display', 'invasion'), 
                'subtitle'   => __('Select the time in seconds (between 0 and 180)', 'invasion'),
                'min'        => 0,
                'max'        => 180,
                'step'       => 1,
                'resolution' => 1,
                'default'    => '3'
            ),
            array(
                'id'         => 'social_subscribe_transition_time',
                'type'       => 'slider',
                'title'      => __('Transition delay', 'invasion'), 
                'min'        => 0,
                'max'        => 20,
                'step'       => 0.1,
                'resolution' => 0.1,
                'default'    => '1'
            ),
            array(
                'id'       => 'social_subscribe_message_text_facebook_top',
                'type'     => 'text',
                'title'    => __( 'Catch first Facebook Phrase', 'popup' ),
                'default'  => __( 'Merci d\'avoir partagé l\'article !', 'popup' )
            ),
            array(
                'id'       => 'social_subscribe_subscribe_message_text_twitter',
                'type'     => 'text',
                'title'    => __( 'Catch first Twitter Phrase', 'popup' ),
                'default'  => __( 'Merci d\'avoir partagé l\'article !', 'popup' )
            ),
            array(
                'id'       => 'social_subscribe_message_text_google_top',
                'type'     => 'text',
                'title'    => __( 'Catch first Google Phrase', 'popup' ),
                'default'  => __( 'Merci d\'avoir partagé l\'article !', 'popup' )
            ),
            array(
                'id'          => 'social_subscribe_message_text_tyopography_top',
                'type'        => 'typography',
                'title'       => __( 'Catch Phrase Style',  'popup' ),
                'subsets'     => false,
                'google'      => false, 
                'line-height' => false,
                'default'     => array(
                    'color'      => '#000',
                    'font-size'  => '16px',
                    'text-align' => 'center',
                    'font-weight' => '400',
                    'font-family' => 'Arial'
                )
            ),
            array(
                'id'       => 'social_subscribe_message_text_facebook_bottom',
                'type'     => 'text',
                'title'    => __( 'Catch second Facebook Phrase', 'popup' ),
                'default'  => __( 'Pour ne pas rater nos nouvelles publications, Like us on Facebook !', 'popup' )
            ),
            array(
                'id'       => 'social_subscribe_message_text_twitter_bottom',
                'type'     => 'text',
                'title'    => __( 'Catch second Twitter Phrase', 'popup' ),
                'default'  => __( 'Pour ne pas rater nos nouvelles publications, Follow us on Twitter!', 'popup' )
            ),
            array(
                'id'       => 'social_subscribe_message_text_google_bottom',
                'type'     => 'text',
                'title'    => __( 'Catch second Google Phrase', 'popup' ),
                'default'  => __( 'Pour ne pas rater nos nouvelles publications, Follow us Google + !', 'popup' )
            ),
            array(
                'id'          => 'social_subscribe_message_text_tyopography_bottom',
                'type'        => 'typography',
                'title'       => __( 'Catch Phrase Style',  'popup' ),
                'subsets'     => false,
                'google'      => false, 
                'line-height' => false,
                'default'     => array(
                    'color'      => '#000',
                    'font-size'  => '14px',
                    'text-align' => 'center',
                    'font-weight' => '400',
                    'font-family' => 'Arial'
                )
            ),
            array(
                'id'       => 'social_subscribe_page_facebook',
                'type'     => 'text',
                'title'    => __('Your Facebook page', 'popup'), 
                'default'  => ''
            ),
            array(
                'id'       => 'social_subscribe_content_facebook',
                'type'     => 'select',
                'title'    => __('Facebook button', 'popup'), 
                'options'  => array(
                    'button'       => __('Button', 'popup'),
                    'button_count' => __('Button Count', 'popup'),
                    'standard'     => __('Standard', 'popup'),
                ),
                'default'  => 'standard',
                'validate' => 'not_empty'
            ),
            array(
                'id'       => 'social_subscribe_account_twitter',
                'type'     => 'text',
                'title'    => __('Your Twitter account', 'popup'), 
                'default'  => ''
            ),
            array(
                'id'          => 'social_subscribe_options_twitter',
                'type'        => 'checkbox',
                'title'       => __( 'Twitter options', 'popup' ),
                'subtitle'    => __( 'Choose between tweet and/or follow button', 'popup' ),
                'options'     => array(
                    'tweet'  => __('Tweet button', 'popup'), 
                    'follow' => __('Follow button', 'popup'),
                ),
                'validate' => 'not_empty',
                'default'     => array(
                    'tweet'  => '1',
                    'follow' => '1'
                )
            ),
            array(
                'id'       => 'social_subscribe_account_google',
                'type'     => 'text',
                'title'    => __('Your Google + account', 'popup'), 
                'default'  => ''
            ),
            array(
                'id'       => 'social_subscribe_options_google',
                'type'     => 'select',
                'title'    => __('Google+ Button Style', 'popup'), 
                'options'  => array(
                    'inline' => __('Inline', 'popup'),
                    'number' => __('Bubble', 'popup'),
                    'none'   => __('Default', 'popup'),
                ),
                'default'  => 'inline',
                'validate' => 'not_empty'
            ),
             

        )
    );

    $popup_ReduxFramework = new ReduxFramework( $sections, $args );
}