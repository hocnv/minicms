<?php  if ( ! defined('_PATH_APPS')) exit('No direct script access allowed');  
/**     AJAX Component of module: MEMBER     */ 
/**
*	Platform   : LAMP & WAMP
*	Email	: kaka163@yahoo.com  , vanhoc@gmail.com
*	Mobile  : (84)908 411 811
*	Data	: 20/10/2011
*	YIM     : kaka163
*/


 
$user = Commons::getParam("user");
$email = Commons::getparam("email") ; 

$sql = "SELECT idmember 
			FROM ". $CONFIG["db_prefix"] ."members 
			WHERE 1  " ;
			
if($email != "" )
{		
	$sql .= "and  (email = '". $email ."') ";
	$sql.= " and  (idmember != '" . $CONFIG["session"]["idmember"] ."') "; //Kiem tra khi change profile 
}

if($user != "" )		
	$sql .= "and  username = '". $user ."' ";

$result = $CONFIG["db"]->GetOne( 0, $sql ) ; 

if( $result != "" )
	echo "Yes" ; 
else
	echo"No";	
 
?>