var closePopup = false;
var affichePopup = false;
var finPage = false;
var finArticle = false;
var popupShare;
var socialAccount;


//Display popup
function socialPopupIn() {

    var thePopup = document.getElementById( "popup-social" );
    thePopup.classList.remove( "popup-social-start" );
    thePopup.classList.add( "popup-social-active" );

}

//Remove popup
function socialPopupOut() {

    var thePopup = document.getElementById( "popup-social" );
    thePopup.classList.add( "popup-social-start" );
    thePopup.classList.remove( "popup-social-active" );
  
}

//Display test
function socialRegisterIn( compte ) {

    var test = document.getElementById( "popup-subscribe" );
    test.classList.add( "popup-subscribe-active" );
    test.classList.remove( "popup-subscribe-start" );

    socialSubscribedisplayText( compte )
    

}

//Display close
function socialRegisterOut() {

    var test = document.getElementById( "popup-subscribe" );
    test.classList.remove( "popup-subscribe-active" );
    test.classList.add( "popup-subscribe-start" );
    

}

function popupShare( href , account ) {

    socialPopupOut();

    var topPosition = window.screen.height / 2 - ( 218 ); 
    var leftPosition = window.screen.width / 2 - ( 313 );

    popupShare = window.open( href,'sharer','toolbar=0,status=0,width=626,height=256,top='+topPosition+',left='+leftPosition );
    socialAccount = account;
    socialRegisterClose( popupShare, socialAccount );

    //createCookie( popup.data.wordpress.title , 1 , popup.data.options.socialCookie);

}

function socialRegisterClose( popupShare, socialAccount ) {

    
    if ( popupShare.closed ) socialRegisterIn(socialAccount);
    else setTimeout( "socialRegisterClose(popupShare,socialAccount)" , 3000 );
}

function socialSubscribedisplayText( socialAccount ){

    //document.getElementsByClassName( "popup-subscribe-text" ).style.display = 'none';
    //
    document.getElementById( "popup-subscribe-facebook-text-top" ).style.display = 'none';
    document.getElementById( "popup-subscribe-twitter-text-top" ).style.display = 'none';
    document.getElementById( "popup-subscribe-google-text-top" ).style.display = 'none';

    document.getElementById( "popup-subscribe-facebook-text-bottom" ).style.display = 'none';
    document.getElementById( "popup-subscribe-twitter-text-bottom" ).style.display = 'none';
    document.getElementById( "popup-subscribe-google-text-bottom" ).style.display = 'none';

    document.getElementById( "popup-subscribe-btn-facebook" ).style.display = 'none';
    document.getElementById( "popup-subscribe-btn-twitter" ).style.display = 'none';
    document.getElementById( "popup-subscribe-btn-google" ).style.display = 'none';

    if ( socialAccount == 1) {
        document.getElementById( "popup-subscribe-facebook-text-top" ).style.display = 'block';
        document.getElementById( "popup-subscribe-facebook-text-bottom" ).style.display = 'block';
        document.getElementById( "popup-subscribe-btn-facebook" ).style.display = 'block';
    }
    else if ( socialAccount == 2) {
        document.getElementById( "popup-subscribe-twitter-text-top" ).style.display = 'block';
        document.getElementById( "popup-subscribe-twitter-text-bottom" ).style.display = 'block';
        document.getElementById( "popup-subscribe-btn-twitter" ).style.display = 'block';
    }
    else {
        document.getElementById( "popup-subscribe-google-text-top" ).style.display = 'block';
        document.getElementById( "popup-subscribe-google-text-bottom" ).style.display = 'block';
        document.getElementById( "popup-subscribe-btn-google" ).style.display = 'block';
    }

    

}

//Return element position top (and/or left)
function getPosition( element ) {

    //var left = 0;
    var top = 0;

    while ( element.offsetParent != undefined && element.offsetParent != null )
    {

        //left += element.offsetLeft + (element.clientLeft != null ? element.clientLeft : 0);
        top += element.offsetTop + ( element.clientTop != null ? element.clientTop : 0 );
        element = element.offsetParent;

    }
    return top;

}

//Create Cookie
function createCookie( name , value ,days ) {

    if ( days ) {

        var date = new Date();
        //date.setTime(date.getTime()+(days*24*60*60*1000));
        date.setTime( date.getTime() + ( days * 60 * 60 * 1000 ) );
        var expires = "; expires=" + date.toGMTString();

    }
    else var expires = "";
    document.cookie = name + "=" + value + expires + "; path=/";

}

//Read Cookie
function readCookie( name ) {
    var nameEQ = name + "=";
    var ca = document.cookie.split( ";" );

    for( var i = 0 ; i < ca.length ; i++ ) {

        var c = ca[i];

        while ( c.charAt( 0 ) == ' ' ) c = c.substring( 1 , c.length );   
            if ( c.indexOf( nameEQ ) == 0 ) return c.substring( nameEQ.length , c.length );
    }

    return null;
}

//Delete Cookie
function deleteCookie( name ) {

    createCookie( name , "" , -1 );

}
   
window.onload = function () {

    document.getElementById( "popup-social-close" ).addEventListener( "click", function(){

        socialPopupOut();
        socialRegisterIn();
        //createCookie( popup.data.wordpress.title , 1 , popup.data.options.socialCookie);
            
    });
    
    document.getElementById( "popup-social-mobile-close" ).addEventListener( "click", function(){

        socialPopupOut();
        //createCookie( popup.data.wordpress.title , 1 , popup.data.options.socialCookie);
            
    });

    document.getElementById("popup-subscribe-close" ).addEventListener( "click", function(){

        socialRegisterOut();
        //createCookie( popup.data.wordpress.title , 1 , popup.data.options.socialCookie);
            
    });


    document.addEventListener( "scroll" , function() {
        
        var taille = document.getElementById( 'popup-content' );
        var mycookie = readCookie( popup.data.wordpress.title );

        if ( mycookie == null) {
            //Detection position top de la div + sa taille
            if (  window.pageYOffset >= ( getPosition( taille ) + taille.scrollHeight ) ) {

                socialPopupIn();
                finPage = true;
                

            }
            if ( window.pageYOffset >= ( document.body.scrollHeight - window.innerHeight ) ) {

                socialPopupIn();
                finArticle = true;

            }
        }
    
        if (finPage) {

            if ( window.pageYOffset < ( getPosition( taille ) + taille.scrollHeight ) ) {

                socialPopupOut();
                finPage = false;

            }

        }

        if (finArticle) {

            if ( window.pageYOffset < ( document.body.scrollHeight - window.innerHeight ) ) {

                socialPopupOut();
                finArticle = false;

            }
        }

    });

};



