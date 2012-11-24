<?php  if ( ! defined('_PATH_APPS')) exit('No direct script access allowed');  
/**
*	Platform   : LAMP & WAMP
*	Email	: kaka163@yahoo.com  , vanhoc@gmail.com
*	Mobile  : (84)908 411 811
*	Data	: 20/10/2011
*	YIM     : kaka163
*/

/**     AJAX Component of module: CAPTCHA     */ 
 
$captcha_input = Commons::getParam("check_captcha");

$captcha_session =  Commons::getSession('captcha') ;

if( $captcha_input == $captcha_session  )
{
	echo "Yes" ; 
}
else
{
	echo"No";	
}
 
?>