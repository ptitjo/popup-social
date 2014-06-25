<?php
defined( 'ABSPATH' ) or die( 'Cheatin&#8217; uh?' ); //Safety line

/**
 * Display Popup html
 * 
 */
function popup_views_front()
{ 
    $options = popup_get_options();
    ?>

    <div id="popup-subscribe">
    
        <div id="popup-subscribe-container">
            <div id="popup-subscribe-ctrl-bar">
                <div id="popup-subscribe-title">
                    titre
                </div>
                <a id="popup-subscribe-close" href"#">CLOSE x</a>
            </div>

            <div class="popup-subscribe-text" id="popup-subscribe-facebook-text-top">
                <h2><?php echo $options['options']['socialSubscribeMessageTextFacebookTop']; ?></h2>
            </div>
             <div class="popup-subscribe-text" id="popup-subscribe-twitter-text-top">
                <h2><?php echo $options['options']['socialSubscribeMessageTextTwitterTop']; ?></h2>
            </div>
             <div class="popup-subscribe-text" id="popup-subscribe-google-text-top">
                <h2><?php echo $options['options']['socialSubscribeMessageTextGoogleTop']; ?></h2>
            </div>

             <div class="popup-subscribe-text" id="popup-subscribe-facebook-text-bottom">
                <h2><?php echo $options['options']['socialSubscribeMessageTextFacebookBottom']; ?></h2>
            </div>
             <div class="popup-subscribe-text" id="popup-subscribe-twitter-text-bottom">
                <h2><?php echo $options['options']['socialSubscribeMessageTextTwitterBottom']; ?></h2>
            </div>
             <div class="popup-subscribe-text" id="popup-subscribe-google-text-bottom">
                <h2><?php echo $options['options']['socialSubscribeMessageTextGoogleBottom']; ?></h2>
            </div>

            <div class="popup-subscribe-btn" id="popup-subscribe-btn-facebook">

<?php
            if ( ! empty ( $options['options']['socialSubscribePageFacebook'] ) ) { ?>

                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.0";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>

                <div class="fb-like" data-href="<?php echo $options['options']['socialSubscribePageFacebook'] ?>" data-layout="<?php echo $options['options']['socialSubscribeContentFacebook'] ?>" data-action="like" data-show-faces="false" data-share="false" data-width="250px"></div>
        <?php
            }
            else echo __( 'Facebook account is required', 'popup' );?>
        </div>
        
        <div class="popup-subscribe-btn" id="popup-subscribe-btn-twitter">
        <?php

            if ( ! empty ($options['options']['socialSubscribeAccountTwitter'] ) ) { ?>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                <div id='display-twitter'>
                <?php
                if ( isset( $options['options']['socialSubscribeOptionsTwitter']['tweet'] ) ) { ?>
                    <a href="https://twitter.com/share" class="twitter-share-button" data-via="<?php echo $options['options']['socialSubscribeAccountTwitter'] ?>">Tweet</a>
                
                <?php
                }
                if ( isset( $options['options']['socialSubscribeOptionsTwitter']['tweet'] ) ) { ?>

                    <a href="https://twitter.com/<?php echo $options['options']['invasionSubscribeAccountTwitter'] ?>" class="twitter-follow-button" data-show-count="false">Follow <?php echo $options['options']['socialSubscribeAccountTwitter'] ?></a>
                    
                <?php
                }?>
                </div><?php
            }
            else echo __( 'Twitter account is required', 'popup' );?>
        
        </div>
        
        <div class="popup-subscribe-btn" id="popup-subscribe-btn-google">
        <?php
            if ( ! empty ($options['options']['socialSubscribeAccountTwitter'] ) ) { ?>

                <script type="text/javascript">
                    window.___gcfg = {lang: 'fr'};

                    (function() {
                        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                        po.src = 'https://apis.google.com/js/platform.js';
                        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                    })();
                </script>

                <?php
                    if ( $options['options']['socialSubscribeOptionsGoogle'] == 'inline' ) {?>
                        <div class="g-plusone" data-annotation="inline" data-width="300"></div>
                    <?php
                    }
                    else if ( $options['options']['socialSubscribeOptionsGoogle'] == 'number' ) {?>
                        <div class="g-plusone"></div>
                    <?php
                    }
                    else {?>
                        <div class="g-plusone" data-annotation="none"></div>
                    <?php
                    }
            }
            else echo __( 'Google + account is required.', 'popup' ); 
            ?>
            
        </div>

        </div>

    </div>

    <div id="popup-social">
        <div id="popup-social-container">
    
            <h2><?php echo $options['options']['socialTopText']; ?></h2>
            <?php
                if ( $options['options']['socialPicture'] ) {
                    if ( has_post_thumbnail() ) the_post_thumbnail( POPUP_IMG_SLUG );
                    else echo '<img src="' . $options['options']['socialPictureDefault']['url'] . '" >';
                }
                else echo '<img src="' . $options['options']['socialPictureDefault']['url'] . '" >';
            ?>
            
            <h3><?php echo $options['options']['socialBottomText']; ?></h3>
            <div class="popup-social-container-icons">                
                <?php if ( $options['options']['socialLink']['facebook'] == '1' ) {  ?>
                        <a class="popup-social-iconFacebook popup-social-icon" target="_blank" onclick="popupShare('http://www.facebook.com/sharer.php?u=<?php the_permalink();?>', 1);"><span class="popup-social-logoFacebook popup-social-logos" ></span><span class="popup-social-typo-icons popup-social-typo-facebook">Facebook</span></a>
                <?php } ?>
                <?php if ( $options['options']['socialLink']['twitter'] == '1' ) { ?>
                        <a class="popup-social-iconTwitter popup-social-icon" target="_blank" onclick="popupShare('http://twitter.com/home?status=<?php echo $options['options']['socialShareText']; ?>  <?php the_title(); ?> => <?php the_permalink(); ?>', 2);"><span class="popup-social-logoTwitter popup-social-logos"></span><span class="popup-social-typo-icons popup-social-typo-twitter">Twitter</span></a>
                <?php } ?>
                <?php if ( $options['options']['socialLink']['google'] == '1' ) { ?>
                        <a class="popup-social-iconGoogle popup-social-icon" target="_blank" onclick="popupShare('https://plus.google.com/share?url=<?php the_permalink(); ?>', 3)"><span class="popup-social-logoGoogle popup-social-logos"></span><span class="popup-social-typo-icons popup-social-typo-google">Google +</span></a>
                <?php } ?>
            </div>
            <a id="popup-social-close" class="popup-social-btn-close" href"#"><?php echo $options['options']['socialCloseText']; ?></a>
            <a id="popup-social-mobile-close" class="popup-social-btn-close" href"#">x</a>
        </div>
    </div>
    


    <?php
}
