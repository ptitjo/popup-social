<?php

defined( 'ABSPATH' ) or die( 'Cheatin&#8217; uh?' );

/**
 * Get POPUP options
 * 
 * @return array $options The option value
 */
function popup_get_options() 
{
    $option = get_option( 'popup' );

    $options = array (
        'wordpress' => array (
            'title' => 'popup_share_' . get_the_ID()
        ),
        'options'   => array (
		    'socialLink' => array(
                'facebook' => ! isset ( $option['social_link']['facebook'] ) ? '0' : $option['social_link']['facebook'],
                'twitter'  => ! isset ( $option['social_link']['twitter'] ) ? '0' : $option['social_link']['twitter'],
                'google'   => ! isset ( $option['social_link']['google'] ) ? '0' : $option['social_link']['google']
            ),
            'socialTopText'            => ! isset ( $option['social_top_text'] ) ? __( 'Vous avez aimé ?', 'popup' ) : $option['social_top_text'],
            'socialTopTextTyopography' => array(
                'color'      => ! isset ( $option['social_top_text_tyopography']['color'] ) ? '#000' : $option['social_top_text_tyopography']['color'],
                'fontSize'   => ! isset ( $option['social_top_text_tyopography']['font-size'] ) ? '20px' : $option['social_top_text_tyopography']['font-size'],
                'fontWeight' => ! isset ( $option['social_top_text_tyopography']['font-weight'] ) ? '400' : $option['social_top_text_tyopography']['font-weight'],
                'textAlign'  => ! isset ( $option['social_top_text_tyopography']['text-align'] ) ? 'center' : $option['social_top_text_tyopography']['text-align'],
                'fontFamily' => ! isset ( $option['social_top_text_tyopography']['font-family'] ) ? 'Arial' : $option['social_top_text_tyopography']['font-family']
            ),
            'socialBottomText'            => ! isset ( $option['social_bottom_text'] ) ? __( 'Partagez avec vos amis !', 'popup' ) : $option['social_bottom_text'],
            'socialBottomTextTyopography' => array( 
                'color'      => ! isset ( $option['social_bottom_text_tyopography']['color'] ) ? '#000' : $option['social_bottom_text_tyopography']['color'],
                'fontSize'   => ! isset ( $option['social_bottom_text_tyopography']['font-size'] ) ? '18px' : $option['social_bottom_text_tyopography']['font-size'],
                'textAlign'  => ! isset ( $option['social_bottom_text_tyopography']['text-align'] ) ? 'center' : $option['social_bottom_text_tyopography']['text-align'],
                'fontWeight' => ! isset ( $option['social_bottom_text_tyopography']['font-weight'] ) ? '400' : $option['social_bottom_text_tyopography']['font-weight'],
                'fontFamily' => ! isset ( $option['social_bottom_text_tyopography']['font-family'] ) ? 'Arial' : $option['social_bottom_text_tyopography']['font-family']
            ),
            'socialPictureDefault' => array(
                'url'    => empty ( $option['social_picture_default']['url'] ) ? POPUP_IMG_DIR . 'default.jpg' : $option['social_picture_default']['url'],
                'width'  => $option['social_picture_default']['width'],
                'height' => $option['social_picture_default']['height'],
            ),
            'socialPicture'              => ! isset ( $option['social_picture'] ) ? '1' : $option['social_picture'],
            'socialCloseText'            => ! isset ( $option['social_close_text'] ) ? __( 'Non merci', 'popup' ) : $option['social_close_text'],
            'socialCloseTextTyopography' => array(
                'color'      => ! isset ( $option['social_close_text_tyopography']['color'] ) ? '#000' : $option['social_close_text_tyopography']['color'],
                'fontSize'   => ! isset ( $option['social_close_text_tyopography']['font-size'] ) ? '13px' : $option['social_close_text_tyopography']['font-size'],
                'textAlign'  => ! isset ( $option['social_close_text_tyopography']['text-align'] ) ? 'center' : $option['social_close_text_tyopography']['text-align'],
                'fontWeight' => ! isset ( $option['social_close_text_tyopography']['font-weight'] ) ? '400' : $option['social_close_text_tyopography']['font-weight'],
                'fontFamily' => ! isset ( $option['social_close_text_tyopography']['font-family'] ) ? 'Arial' : $option['social_close_text_tyopography']['font-family']

            ),
            'socialStartingPosition' => ! isset ( $option['social_starting_position'] ) ? 'left' : $option['social_starting_position'],
            'socialBorder'     => array (
                'borderColor'  => ! isset ( $option['social_border']['border-color'] ) ? '#C7C7C7' : $option['social_border']['border-color'], 
                'borderStyle'  => ! isset ( $option['social_border']['border-style'] ) ? 'solid' : $option['social_border']['border-style'], 
                'borderTop'    => ! isset ( $option['social_border']['border-top'] ) ? '2px' : $option['social_border']['border-top'], 
                'borderRight'  => ! isset ( $option['social_border']['border-right'] ) ? '2px' : $option['social_border']['border-right'], 
                'borderBottom' => ! isset ( $option['social_border']['border-bottom'] ) ? '2px' : $option['social_border']['border-bottom'], 
                'borderLeft'   => ! isset ( $option['social_border']['border-left'] ) ? '2px' : $option['social_border']['border-left']
            ),
            'socialBackgroundPopup' => ! isset ( $option['social_background_popup'] ) ? '#fff' : $option['social_background_popup'],
            'socialBackgroundFont'  => ! isset ( $option['social_background_font'] ) ? '#eee' : $option['social_background_font'],
            'socialFontOpacity'     => ! isset ( $option['social_font_opacity'] ) ? '1' : $option['social_font_opacity'],
            'socialCookie'          => ! isset ( $option['social_cookie'] ) ? '5' : $option['social_cookie'],
            'socialTransition'      => ! isset ( $option['social_transition'] ) ? '0.1' : $option['social_transition'],
            'socialShareText'       => ! isset ( $option['social_share_text'] ) ? __( 'Je viens de lire cet articile : ', 'popup' ) : $option['social_share_text'],
            'socialWidth'           => '50%',



            'socialSubscribeMessageTextFacebookTop'    => ! isset ( $option['social_subscribe_message_text_facebook_top'] ) ? __( 'Merci d\'avoir partagé l\'article !', 'popup' ) : $option['social_subscribe_message_text_facebook_top'],
            'socialSubscribeMessageTextTwitterTop'     => ! isset ( $option['social_subscribe_message_text_twitter_top'] ) ? __( 'Merci d\'avoir partagé l\'article !', 'popup' ) : $option['social_subscribe_message_text_twitter_top'],
            'socialSubscribeMessageTextGoogleTop'      => ! isset ( $option['social_subscribe_message_text_google_top'] ) ? __( 'Merci d\'avoir partagé l\'article !', 'popup' ) : $option['social_subscribe_message_text_google_top'],
            'socialSubscribeMessageTextTyopographyTop' => array(
              'color'       =>  ! isset ( $option['social_subscribe_message_text_tyopography_top']['color'] ) ? '#C7C7C7' : $option['social_subscribe_message_text_tyopography_top']['color'],
              'font-size'   =>  ! isset ( $option['social_subscribe_message_text_tyopography_top']['font-size'] ) ? '16px' : $option['social_subscribe_message_text_tyopography_top']['font-size'],
              'text-align'  =>  ! isset ( $option['social_subscribe_message_text_tyopography_top']['text-align'] ) ? 'center' : $option['social_subscribe_message_text_tyopography_top']['text-align'],
              'font-weight' =>  ! isset ( $option['social_subscribe_message_text_tyopography_top']['font-weight'] ) ? 'Arial' : $option['social_subscribe_message_text_tyopography_top']['font-weight'],
              'font-family' =>  ! isset ( $option['social_subscribe_message_text_tyopography_top']['font-family'] ) ? 'Arial' : $option['social_subscribe_message_text_tyopography_top']['font-family']
            ),
            'socialSubscribeMessageTextFacebookBottom'    => ! isset ( $option['social_subscribe_message_text_facebook_bottom'] ) ? __( 'Pour ne pas rater nos nouvelles publications, Like us on Facebook !', 'popup' ) : $option['social_subscribe_message_text_facebook_bottom'],
            'socialSubscribeMessageTextTwitterBottom'     => ! isset ( $option['social_subscribe_message_text_twitter_bottom'] ) ? __( 'Pour ne pas rater nos nouvelles publications, Follow us on Twitter !', 'popup' ) : $option['social_subscribe_message_text_twitter_bottom'],
            'socialSubscribeMessageTextGoogleBottom'      => ! isset ( $option['social_subscribe_message_text_google_bottom'] ) ? __( 'Pour ne pas rater nos nouvelles publications, Follow us on Google + !', 'popup' ) : $option['social_subscribe_message_text_google_bottom'],
            'socialSubscribeMessageTextTyopographyBottom' => array(
              'color'       =>  ! isset ( $option['social_subscribe_message_text_tyopography_bottom']['color'] ) ? '#C7C7C7' : $option['social_subscribe_message_text_tyopography_bottom']['color'],
              'font-size'   =>  ! isset ( $option['social_subscribe_message_text_tyopography_bottom']['font-size'] ) ? '14px' : $option['social_subscribe_message_text_tyopography_bottom']['font-size'],
              'text-align'  =>  ! isset ( $option['social_subscribe_essage_text_tyopography_bottom']['text-align'] ) ? 'center' : $option['social_subscribe_message_text_tyopography_bottom']['text-align'],
              'font-weight' =>  ! isset ( $option['social_subscribe_message_text_tyopography_bottom']['font-weight'] ) ? 'Arial' : $option['social_subscribe_message_text_tyopography_bottom']['font-weight'],
              'font-family' =>  ! isset ( $option['social_subscribe_message_text_tyopography_bottom']['font-family'] ) ? 'Arial' : $option['social_subscribe_message_text_tyopography_bottom']['font-family']
            ),
            'socialSubscribePageFacebook'    => ! isset ( $option['social_subscribe_page_facebook'] ) ? '' : str_replace ( 'https:', '', $option['social_page_facebook']) ,
            'socialSubscribeContentFacebook' => ! isset ( $option['social_subscribe_content_facebook'] ) ? 'standard' : $option['social_content_facebook'],
            'socialSubscribeAccountTwitter'  => ! isset ( $option['social_subscribe_account_twitter'] ) ? '' : $option['social_subscribe_account_twitter'],
            'socialSubscribeOptionsTwitter'  => array(
              'tweet'  =>  ! isset ( $option['social_subscribe_options_twitter']['tweet'] ) ? '1' : $option['social_subscribe_options_twitter']['tweet'],
              'follow' =>  ! isset ( $option['social_subscribe_options_twitter']['follow'] ) ? '1' : $option['social_subscribe_options_twitter']['follow']
            ),
            'socialSubscribeAccountGoogle' => ! isset ( $option['social_subscribe_account_google'] ) ? '' : $option['social_subscribe_account_google'],
            'socialSubscribeOptionsGoogle' => ! isset ( $option['social_subscribe_options_google'] ) ? 'inline' : $option['social_subscribe_options_google'],
            'socialSubscribeArrivalTime' => ! isset ( $option['social_subscribe_arrival_time'] ) ? '3' : $option['social_subscribe_arrival_time'],
            'socialSubscribeTransitionTime' => ! isset ( $option['social_subscribe_transition_time'] ) ? '1' : $option['social_subscribe_transition_time'],
            
        )
	);
    
    return $options;
}

/**
 * Count social network number in array
 * @param  Array $table_icon Array whis social networks
 * @return String $size_icon Social networks number in Array
 */
function popup_get_size_icon( $table_icon, $mobile ) {

    $number_icon = 0;

    if ( $mobile == 1 ) {
        $size_icon = '15%';
        foreach( $table_icon as $element ) {
            if ( $element == '1') {
                $number_icon++;
            }
        }
        if ( $number_icon == 1 ) $size_icon = '80%';
        if ( $number_icon == 2 ) $size_icon = '35%';
    }
    else {

        $size_icon = '26%';
        foreach( $table_icon as $element ) {
            if ( $element == '1') {
                $number_icon++;
            }
        }
        if ( $number_icon == 1 ) $size_icon = '90%';
        if ( $number_icon == 2 ) $size_icon = '41%';

    }

    return $size_icon;
}

/**
 * Return popup position in terms of $valeur
 * @param  String $valeur    Wish position popup start
 * @return Array  $position  Position popup start
 */
function popup_get_position ( $valeur ) {

    if ( $valeur == 'top' ) {

        $position = array(
            'top'  => '-200%',
            'left' => '0'
        );

    }
    else if ( $valeur == 'right' ) {

        $position = array(
            'top'  => '0',
            'left' => '200%'
        );

    }
    else if ( $valeur == 'bottom' ) {

        $position = array(
            'top'  => '200%',
            'left' => '0'
        );

    }
    else {

        $position = array(
            'top'  => '0',
            'left' => '-200%'
        );

    }

    return $position;
}






