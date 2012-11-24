<?php
/**
*	Platform   : LAMP & WAMP
*	Email	: kaka163@yahoo.com  , vanhoc@gmail.com
*	Mobile  : (84)908 411 811
*	Data	: 20/10/2011
*	YIM     : kaka163
*/

@session_start();
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); 

function _generateRandom($length=4)
{
	$_rand_src = array(
		array(48,57) //digits
		//, array(97,122) //lowercase chars
		//, array(65,90) //uppercase chars
	);
	//srand ((double) microtime() * 1000000);
	$random_string = "";
	for($i=0;$i<$length;$i++){
		$i1=rand(0,sizeof($_rand_src)-1);
		$random_string .= chr(rand($_rand_src[$i1][0],$_rand_src[$i1][1]));
	}

	return $random_string;
}

//$im = @imagecreatefromjpeg("captcha.jpg"); 
header("Content-type: image/png");

//init value	
$numchar=4;
$font =  imageloadfont("./3rdparty/font/hootie.gdf");
//$font = 6;
$x=8;
$y=2;

$imagewidth  = imagefontwidth($font)*$numchar  + 2*$x;
$imageheight = imagefontheight($font) + 2*$y;

$im = imagecreate($imagewidth, $imageheight); 
	
//$im =  imagecreate(75, 26) or die("Cannot Initialize new GD image stream");
//$background_color = imagecolorallocate($im, 255, 255, 255);
//$textcolor = imagecolorallocate($im, 0, 0, 255); //imagecolorallocate ($im, 0, 0, 0)

// make gird 
$background_color = imagecolorallocate($im, 180, 180, 180);
$text_color = imagecolorallocate($im, 80, 80, 80);
$line_color = imagecolorallocate($im, 120, 130, 192);

for ($i=0;$i<ceil(($imagewidth+$imageheight)/5);$i++) {
	imageline($im, $i*5-$imageheight, 0, $i*5, $imageheight, $line_color);
	imageline($im, $i*5-$imageheight, $imageheight, $i*5, 0, $line_color);
} 

// create random code 	
$rand = _generateRandom(4);
$_SESSION['captcha'] = $rand;

//imagestring($im, 4, 0, 5, " " . $rand[0]. " " . $rand[1]." ".$rand[2]." ".$rand[3] ,$textcolor );
imagestring($im, $font, $x, $y, $rand, $text_color);

//imagejpeg($im,NULL,100);
imagepng($im);

imagedestroy($im);

