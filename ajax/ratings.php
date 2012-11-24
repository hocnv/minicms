<?php
/**
*	Platform   : LAMP & WAMP
*	Email	: kaka163@yahoo.com  , vanhoc@gmail.com
*	Mobile  : (84)908 411 811
*	Data	: 20/10/2011
*	YIM     : kaka163
*/


$idratings = ""; 
$ref_id = Commons::getparam("ref_id");
$ref_module = Commons::getparam("ref_module");
$rating_value = Commons::getparam("value");
$rater_ip = ""; 
$rating_counter = ""; 
//echo "$ref_module $ref_id $value ";

ratings_Model::updateData($idratings, $ref_id , $ref_module , $rating_counter , $rating_value , $rater_ip);


//echo "Thanks for rating ". $rating_value  ." !" ; 
//echo "Thanks" ; 
?>
<img src="<?php Commons::output( $CONFIG["short_url"]  . 'images/ok.png' ); ?>" title="<?php Commons::output("Thanks for rating!") ?>" border="0"/> 