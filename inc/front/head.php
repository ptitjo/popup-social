<?php
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

if ( ! is_admin() ) {
	$options = popup_get_options();

	/**
	 * Add new style tag in head
	 * 
	 */
	add_filter( 'wp_head', '__popup_add_head_style' );
	function __popup_add_head_style() {

		$options = popup_get_options();

		$mobile = false;

		$useragent=$_SERVER['HTTP_USER_AGENT'];
		if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
		
		if ( ! empty ( $useragent ) )  $mobile = true;

		$size_icon = popup_get_size_icon( $options['options']['socialLink'], $mobile );

		$position_popup_start = popup_get_position( $options['options']['socialStartingPosition'] );
		
		

		echo "<style type=\"text/css\" >
			#popup-social {
				top: " . $position_popup_start['top'] . "; 
			    left: " . $position_popup_start['left'] . ";
			    transition: all " . $options['options']['socialTransition'] . "s ease-out;

			}
			#popup-social:before {
				background-color: " . $options['options']['socialBackgroundFont'] . " !important;
				opacity: " . $options['options']['socialFontOpacity'] . " !important;
				
			}

			#popup-social-container {
			    background-color: " . $options['options']['socialBackgroundPopup'] . " !important;
			    border-top: " . $options['options']['socialBorder']['borderTop'] . " " . $options['options']['socialBorder']['borderStyle'] . " " . $options['options']['socialBorder']['borderColor'] . " !important;
				border-right: " . $options['options']['socialBorder']['borderRight'] . " " . $options['options']['socialBorder']['borderStyle'] . " " . $options['options']['socialBorder']['borderColor'] . " !important;
				border-bottom: " . $options['options']['socialBorder']['borderBottom'] . " " . $options['options']['socialBorder']['borderStyle'] . " " . $options['options']['socialBorder']['borderColor'] . " !important;
				border-left: " . $options['options']['socialBorder']['borderLeft'] . " " . $options['options']['socialBorder']['borderStyle'] . " " . $options['options']['socialBorder']['borderColor'] . " !important;
				margin-left: " . intval(-$options['options']['socialWidth'])/3.5 . '%' . ";
				
			}
			#popup-social-container h2{
				color: " . $options['options']['socialTopTextTyopography']['color'] . " !important;
				font-size: " . $options['options']['socialTopTextTyopography']['fontSize'] . " !important;
				text-align: " . $options['options']['socialTopTextTyopography']['textAlign'] . " !important;
				font-weight: " . $options['options']['socialTopTextTyopography']['fontWeight'] . " !important;
				font-family: " . $options['options']['socialTopTextTyopography']['fontFamily'] . " !important;
	
			}
			#popup-social-container h3{
				color: " . $options['options']['socialBottomTextTyopography']['color'] . " !important;
				font-size: " . $options['options']['socialBottomTextTyopography']['fontSize'] . " !important;
				text-align: " . $options['options']['socialBottomTextTyopography']['textAlign'] . " !important;
				font-weight: " . $options['options']['socialBottomTextTyopography']['fontWeight'] . " !important;
				font-family: " . $options['options']['socialBottomTextTyopography']['fontFamily'] . " !important;
			}

			#popup-social-close{
				color: " . $options['options']['socialCloseTextTyopography']['color'] . " !important;
				font-size: " . $options['options']['socialCloseTextTyopography']['fontSize'] . " !important;
				text-align: " . $options['options']['socialCloseTextTyopography']['textAlign'] . " !important;
				font-weight: " . $options['options']['socialCloseTextTyopography']['fontWeight'] . " !important;
				font-family: " . $options['options']['socialCloseTextTyopography']['fontFamily'] . " !important;
			}
			.popup-social-icon{
			    width: " . $size_icon .  " !important;
			}
			
			.popup-social-active{
				top: 0px !important; 
			    left: 0px !important;
			}
			.popup-social-start {
				top: " . $position_popup_start['top'] . "; 
			    left: " . $position_popup_start['left'] . ";
			}

			.popup-subscribe-active{
				top: 0 !important; 
			    left: 0 !important;
			}
			.popup-subscribe-start {
				top: -100%; 
			    left: 0;
			}

		</style>";
		
	}

	/**
	 * __popup_add_id_container 
	 * @param  $content
	 * @return $content string
	 */
	add_filter( 'the_content', '__popup_add_id_container' );
	function __popup_add_id_container( $content ) {

		if( is_single() ) {

			$tmp = $content;
			$content = '<div id="popup-content">';
			$content .= $tmp;
			$content .= '</div>';

		}
	
		return $content;


	}

	add_filter( 'wp_footer', '__popup_insert_html' );
	function __popup_insert_html() {

		if( is_single() ) {
			echo popup_views_front();
		}
	    
	}

}